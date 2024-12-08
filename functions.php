<?php
function get_blogs($conn, $id = null) {
    if ($id !== null) {
        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM blog WHERE id = ?");
        $stmt->bind_param("i", $id); // 'i' specifies that $id is an integer
    } else {
        // Fetch all blogs if no $id is provided
        $stmt = $conn->prepare("SELECT * FROM blog");
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $blogs = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative arrays
        return $blogs; // Return the array of blogs
    } else {
        // Return an error message
        return ['error' => 'Query failed: ' . $conn->error];
    }
}

function get_user($conn, $id) {
    $sql = "SELECT * FROM userdata where id=$id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $blogs = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $blogs[] = $row; // Add each row to the blogs array
        }
        return $blogs; // Return the array of blogs
    } else {
        // Return an error message or handle the error
        return 'Query failed: ' . mysqli_error($conn);
    }
}

function get_category($conn) {
    $sql = "SELECT * FROM category";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $categories = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $categories[] = $row; // Add each row to the categories array
        }
        return $categories; // Return the array of blogs
    } else {
        // Return an error message or handle the error
        return 'Query failed: ' . mysqli_error($conn);
    }
}

function session_message($message){
    $_SESSION['message'] = $message;
    $_SESSION['message_creation_time'] = time();
}

function kill_session(){
    if (time() - intval($_SESSION['message_creation_time']) > 2) {
        unset($_SESSION['message']);
    }
}

function test(){
    echo 'test';
}