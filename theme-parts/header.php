<?php include('config/init.php');
include('functions.php');

$userrole = '';

if(isset($_SESSION['user_id'])){
    $current_userid = $_SESSION['user_id'];
    $user = get_user($conn, $current_userid)[0];
    $userrole = $user['userrole'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valley Essence</title>
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/splide.min.css">
    <link rel="stylesheet" href="http://localhost/phpsite/blogsite/assets/css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="site-logo">
                        <a href="<?php echo SITEURL; ?>">
                            Valley Essence
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="nav-menu">
                        <nav>
                            <ul class="primary-menu nav">
                                <li>
                                    <a href="#">Information</a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL.'blog.php' ?>">Blogs</a>
                                </li>
                                <li>
                                    <a href="#">Events</a>
                                </li>
                                <li>
                                    <a href="#">Gallery</a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL.'getintouch.php' ?>" class="primary-btn">COntact Us</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header-search">
                            <div class="search-field">
                                <input type="text" name="search" placeholder="Search Here" class="input-field">
                            </div>
                            <div class="search-icon-wrapper">
                                <span class="search-btn">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.2818 14.2731L21 21M16.5556 8.77778C16.5556 13.0733 13.0733 16.5556 8.77778 16.5556C4.48223 16.5556 1 13.0733 1 8.77778C1 4.48223 4.48223 1 8.77778 1C13.0733 1 16.5556 4.48223 16.5556 8.77778Z" stroke="#05060F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>                                        
                                </span>
                            </div>
                        </div>
                        <div class="account-wrapper">
                            <div class="account-field">
                                <a href="/phpsite/blogsite/admin">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" heihgt="20" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>