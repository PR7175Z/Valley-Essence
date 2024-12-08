<?php include('../config/init.php'); 
include('../functions.php');
// session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/splide.min.css">
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/style.css">
</head>

<body class="logged-in dashboard">


    <header class="dashboard-header site-header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="site-logo">
                        <a href="<?php echo $_SERVER['REQUEST_URI']; ?>">
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
                <div class="side-panel">
                    <ul>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li>
                            <a href="#">Add Blog</a>
                        </li>
                        <li>
                            <a href="#">Add Blog</a>
                        </li>
                        <li>
                            <a href="#">ADd Category</a>
                        </li>
                    </ul>
                    <div class="logout-btn">
                        <a href="logout.php" class="btn btn-secondary">logout</a>
                    </div>
                </div>
                <div class="main-panel">
                    <div class="dashboard-main">

                    </div>
                </div>
            </div>
        </div>
    </section>