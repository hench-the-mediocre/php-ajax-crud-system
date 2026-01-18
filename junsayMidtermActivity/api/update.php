<?php
header('Content-Type: application/json');
require_once '../connection.php';

// Get the user ID from the URL
$userId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$userId) {
    echo json_encode(['success' => false, 'message' => 'User ID is required']);
    exit;
}

// Get the posted data
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username']) || !isset($data['display_name']) || !isset($data['user_type'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

try {
    // If password is provided, update it too
    if (!empty($data['password'])) {
        $stmt = $conn->prepare("UPDATE users SET username = ?, password = ?, display_name = ?, user_type = ? WHERE user_id = ?");
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->execute([
            $data['username'],
            $hashedPassword,
            $data['display_name'],
            $data['user_type'],
            $userId
        ]);
    } else {
        $stmt = $conn->prepare("UPDATE users SET username = ?, display_name = ?, user_type = ? WHERE user_id = ?");
        $stmt->execute([
            $data['username'],
            $data['display_name'],
            $data['user_type'],
            $userId
        ]);
    }

    echo json_encode(['success' => true, 'message' => 'User updated successfully']);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>