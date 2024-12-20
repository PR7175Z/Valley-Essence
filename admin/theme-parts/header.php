<?php include('../config/init.php'); 
include('../functions.php');

//if user not logged in redirect to login page
if( !$_SESSION['user_id']){
    header("Location: ". SITEURL . "login.php");
    exit();
}

$current_userid = $_SESSION['user_id'];
$user = get_user($conn, $current_userid)[0];
$userrole = $user['userrole'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/splide.min.css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/style.css">
</head>

<body class="logged-in dashboard">
    <header class="dashboard-header site-header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="site-logo">
                        <a href="<?php echo SITEURL.'admin'; ?>">
                            Valley Essence
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="nav-menu">
                        <div class="account-wrapper">
                            <div class="account-field">
                                
                                <div>
                                    <a href="logout.php" class="btn btn-secondary">logout</a>
                                    <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user'])){
                                        echo "<span>welcome " . $_SESSION['user'] . "</span>";
                                        }else{
                                            header('location:'.SITEURL.'login.php/');
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="dashboard-layout-section section-gaps">
        <div class="container">
            <div class="dashboard-layout">
                <?php include('theme-parts/side-nav.php') ?>
                <div class="main-panel">
                    <div class="dashboard-main">