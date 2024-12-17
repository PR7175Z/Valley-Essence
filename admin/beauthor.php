<?php include('theme-parts/header.php');?>

<div class="dashboard-acoount">
    <div class="dashboard-head">
        <h2>Request Authorship</h2>
        <p>Manage your general information, includinf phone number and email address where you can be contacted.</p>
    </div>
    <div class="dashboard-form-sty">
        <form action="" id="becomeauthorform">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-field">
                        <input type="text" name="firstname" placeholder="First Name" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-field">
                        <input type="text" name="lastname" placeholder="Last Name" required="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-field">
                        <input type="email" name="email" placeholder="example@gamil.com" required="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-field">
                        <input type="text" name="username" placeholder="username" required="">
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