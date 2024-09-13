<?php include('../config/init.php'); 
// session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user'])){
        echo "welcome " . $_SESSION['user'];
    }else{
        header('location:'.SITEURL.'login.php/');
    }
    ?>

    <div>
        <a href="logout.php" class="btn btn-secondary">logout</a>
    </div>