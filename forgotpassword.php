<?php include('theme-parts/header.php') ?>

<section class="customer password-section section-gaps">
    <div class="container section-gaps">
        <form id="loginform" method="post" autocomplete="off">
            <h2 class="mb-4">Forgot Password</h2>

            <div class="input-field">
            <input type="email" name="email" placeholder="Your Email" required>

            </div>
            <div class="input-field">
                <input type="password" name="newPassword" placeholder="New Password" required>
            </div>
            <div class="input-field">
                <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            </div>
            <div class="login-info">
                <p>Back to <a href="/phpsite/blogsite/login.php">Log In</a>.</p>
            </div>
            <div class="submit-field">
            <input type="submit" name="submit" value="Change Password">
            </div>
        </form>
    </div>
</section>

<?php include('theme-parts/footer.php') ?>