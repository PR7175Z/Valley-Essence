<?php
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the incoming JSON payload
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['action']) && isset($input['userid'])) {
        $action = $input['action'];
        $user_id = intval($input['userid']); // Ensure user ID is sanitized

        if ($action === 'approve') {
            // Update user role to '1'
            if (update_user_role($conn, $user_id, 1)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } elseif ($action === 'reject') {
            // Optionally handle the reject logic
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid action']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid input']);
    }
}

function update_user_role($conn, $user_id, $role) {

    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->bind_param("ii", $role, $user_id);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
}
