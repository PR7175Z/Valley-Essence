<?php include('theme-parts/header.php') ?>

<section class="register-form-section section-gaps">
    <div class="container section-gaps">
            
        <form id="registerform" method="post">
            <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="user_email" placeholder="Email" required>
            <input type="text" name="username" placeholder="username" autocomplete="off" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Submit">
        </form>

    </div>
</section>

<?php 
    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
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
            $insert_query = "INSERT INTO `userdata`(`first_name`, `last_name`, `username`, `email`, `password`) VALUES ('$first_name', '$last_name', '$username','$user_email','$password')";
            $result = mysqli_query($conn, $insert_query);

            if( mysqli_affected_rows($conn)){
                //User AVailable and Login Success
                $_SESSION['login'] = "<div class='success'>Registration Successful.</div>";
                $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

                //REdirect to HOme Page/Dashboard
                header('location:'.SITEURL.'login.php/');
            }else{
                $_SESSION['login'] = "<div class='error'>Registration Failed.</div>";
            }
        }
    }
?>

<?php include('theme-parts/footer.php') ?>