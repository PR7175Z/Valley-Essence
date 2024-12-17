<?php include('theme-parts/header.php');?>

<div class="dashboard-acoount">
    <div class="dashboard-head">
        <h2>Personal Information</h2>
        <p>Manage your general information, includinf phone number and email address where you can be contacted.</p>
    </div>
    <div class="dashboard-form-sty">
        <form action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <input type="text" name="firstname" placeholder="First Name" required="" value="<?php echo $user['first_name']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <input type="text" name="lastname" placeholder="Last Name" required="" value="<?php echo $user['last_name']; ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-field">
                        <input type="email" name="email" placeholder="example@gamil.com" required="" value="<?php echo $user['email']; ?>" disabled>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-field">
                        <input type="text" name="username" placeholder="username" required="" value="<?php echo $user['username']; ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="submit-field">
                        <button id="edit-account-info" class="edit-btn">Edit</button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>

<?php include('theme-parts/footer.php') ?>