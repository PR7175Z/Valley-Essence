<?php include('theme-parts/header.php'); 

$users = get_user($conn);

if($users){
?>
<section class="dashboard-userlist">
    <div class="user-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Admins</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Authors</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane"
                    type="button" role="tab" aria-controls="user-tab-pane" aria-selected="false">Users</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane"
                    type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="false">Pending Authors</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="user-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user){?>
                            <tr>
                                <td class="user-id"><?php echo $user['id']; ?></td>
                                <td class="user-name"><?php echo $user['username']; ?></td>
                                <td class="user-name"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></td>
                                <td class="user-email"><?php echo $user['email']; ?></td>
                                <td class="user-role"><?php echo get_userrole($conn, $user['userrole'])[0]['Name']; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="user-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user){
                                if($user['userrole'] == 1){?>
                                <tr>
                                    <td class="user-id"><?php echo $user['id']; ?></td>
                                    <td class="user-name"><?php echo $user['username']; ?></td>
                                    <td class="user-name"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></td>
                                    <td class="user-email"><?php echo $user['email']; ?></td>
                                    <td class="user-role"><?php echo get_userrole($conn, $user['userrole'])[0]['Name']; ?></td>
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="user-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user){
                                if($user['userrole'] == 2){?>
                                <tr>
                                    <td class="user-id"><?php echo $user['id']; ?></td>
                                    <td class="user-name"><?php echo $user['username']; ?></td>
                                    <td class="user-name"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></td>
                                    <td class="user-email"><?php echo $user['email']; ?></td>
                                    <td class="user-role"><?php echo get_userrole($conn, $user['userrole'])[0]['Name']; ?></td>
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab" tabindex="0">
                <div class="user-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user){
                                if($user['userrole'] == 3){?>
                                <tr>
                                    <td class="user-id"><?php echo $user['id']; ?></td>
                                    <td class="user-name"><?php echo $user['username']; ?></td>
                                    <td class="user-name"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></td>
                                    <td class="user-email"><?php echo $user['email']; ?></td>
                                    <td class="user-role"><?php echo get_userrole($conn, $user['userrole'])[0]['Name']; ?></td>
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="pending-tab-pane" role="tabpanel" aria-labelledby="user-tab" tabindex="0">
                <div class="user-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Role</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user){
                                if($user['status'] == 1){?>
                                <tr>
                                    <td class="user-id"><?php echo $user['id']; ?></td>
                                    <td class="user-name"><?php echo $user['username']; ?></td>
                                    <td class="user-name"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></td>
                                    <td class="user-email"><?php echo $user['email']; ?></td>
                                    <td class="user-role"><?php echo get_userrole($conn, $user['userrole'])[0]['Name']; ?></td>
                                    <td>
                                        <button class="approved status" data-action="approve" data-uid="<?php echo $user['id']; ?>">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                            </span>
                                        </button>
                                        <button class="reject status" data-action="reject" data-uid="<?php echo $user['id']; ?>">
                                            <span class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <?php }
                            }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
document.querySelectorAll('.status').forEach(button => {
    button.addEventListener('click', function () {
        const action = this.dataset.action;
        const userid = this.dataset.uid;

        fetch('ajax-handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ action, userid }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`User role updated to ${action === 'approve' ? '1' : 'rejected'}`);
            } else {
                alert('Failed to update user role.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
<?php }
include('theme-parts/footer.php') ?>