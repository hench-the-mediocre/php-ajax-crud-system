<?php
header('Content-Type: application/json');
require_once '../connection.php';

try {
    // Get search term if provided
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    if ($searchTerm) {
        // Search in username, display_name, and user_type
        $stmt = $conn->prepare("SELECT user_id, username, display_name, user_type, date_created
                                FROM users
                                WHERE username LIKE ?
                                OR display_name LIKE ?
                                OR user_type LIKE ?
                                ORDER BY user_id DESC");
        $searchPattern = "%$searchTerm%";
        $stmt->execute([$searchPattern, $searchPattern, $searchPattern]);
    } else {
        // If no search term, return all users
        $stmt = $conn->prepare("SELECT user_id, username, display_name, user_type, date_created
                                FROM users
                                ORDER BY user_id DESC");
        $stmt->execute();
    }

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>