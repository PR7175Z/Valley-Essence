<?php 
    include('theme-parts/header.php');
    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $userrole = 3;
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_email = $_POST['user_email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT email FROM userdata WHERE email = '$user_email'";
        $duplicateEmail = mysqli_query($conn, $sql);
        $sql = "SELECT username FROM userdata WHERE username = '$username'";
        $duplicateusername = mysqli_query($conn, $sql);

        if(mysqli_num_rows($duplicateEmail) > 0 || mysqli_num_rows($duplicateusername) > 0){?>
            <div class='error'>Invalid user</div>
        <?php }else{
            $insert_query = "INSERT INTO `userdata`(`first_name`, `last_name`, `username`, `email`, `password`, `userrole`) VALUES ('$first_name', '$last_name', '$username','$user_email','$password', '$userrole')";
            $result = mysqli_query($conn, $insert_query);

            if( mysqli_affected_rows($conn)){
                //User AVailable and Login Success
                $_SESSION['login'] = "<div class='success'>Registration Successful.</div>";
                $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

                //REdirect to HOme Page/Dashboard
                header('location:'.SITEURL.'login.php/');
                exit;
            }else{
                $_SESSION['login'] = "<div class='error'>Registration Failed.</div>";
            }
        }
    }
?>

<section class="customer register-form-section section-gaps">
    <div class="container section-gaps">

        <form id="registerform" method="post">
            <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <h2 class="mb-4">Register here</h2>

            <div class="input-field">
                <input type="text" name="first_name" placeholder="First Name" required>

            </div>
            <div class="input-field">
                <input type="text" name="last_name" placeholder="Last Name" required>

            </div>
            <div class="input-field">
                <input type="email" name="user_email" placeholder="Email" required>

            </div>
            <div class="input-field">
                <input type="text" name="username" placeholder="username" autocomplete="off" required>

            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required>

            </div>
            <div class="login-info">
                <p>Already have an account? <a href="/phpsite/blogsite/login.php">Sign In</a>.</p>
            </div>
            <div class="submit-field">
                <input type="submit" name="submit" value="Register">

            </div>
        </form>

    </div>
</section>

<?php include('theme-parts/footer.php') ?>