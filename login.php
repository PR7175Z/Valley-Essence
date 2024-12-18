<?php include('theme-parts/header.php') ?>


<section class="customer login-section section-gaps">
    <div class="container section-gaps">
        <form id="loginform" method="post">
            <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <h2 class="mb-4">Log In</h2>

            <div class="input-field">
            <input type="text" name="username" placeholder="username" required>

            </div>
            <div class="input-field">
            <input type="password" name="password" placeholder="Password" required>

            </div>
            <div class="login-info">
                <p>Don't Have an account? <a href="/phpsite/blogsite/register.php">Sign Up</a>.</p>
                <p>Forgot <a href="/phpsite/blogsite/forgotpassword.php">Password</a>?</p>
            </div>
            <div class="submit-field">
            <input type="submit" name="submit" value="Login">
            </div>
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
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.SITEURL.'admin/";';
                echo '</script>';
                exit;
            }
        }
        else
        { ?>
            <div class='error text-center'>Username or Password did not match.</div>
        <?php }
    }
?>

<?php include('theme-parts/footer.php') ?>