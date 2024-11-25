<?php include('theme-parts/header.php') ?>


<section class="login-section section-gaps">
    <div class="container section-gaps">
        <form id="loginform" method="post">
            <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <input type="text" name="username" placeholder="username" required>
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
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM userdata WHERE username='$username' AND password='$password'";
        //3. Execute the Query
        $res = mysqli_query($conn, $sql);
        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            while($row=mysqli_fetch_assoc($res)) {
                //User AVailable and Login Success
                $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
                $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

                $_SESSION['user_id'] = $row['id'];
                header('location:'.SITEURL.'admin/');
            }
        }
        else
        { ?>
            <div class='error text-center'>Username or Password did not match.</div>
        <?php }
    }
?>

<?php include('theme-parts/footer.php') ?>