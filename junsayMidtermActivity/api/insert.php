<?php
    header('Content-Type: application/json');
    require_once '../connection.php';

    // Get the posted data
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['username']) || !isset($data['password']) || !isset($data['display_name']) || !isset($data['user_type'])) {
        echo json_encode(['success' => false, 'message' => 'Missing required fields']);
        exit;
    }

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, password, display_name, user_type, date_created) VALUES (?, ?, ?, ?, NOW())");

        // Hash the password
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt->execute([
            $data['username'],
            $hashedPassword,
            $data['display_name'],
            $data['user_type']
        ]);

        echo json_encode(['success' => true, 'message' => 'User added successfully']);
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
?>