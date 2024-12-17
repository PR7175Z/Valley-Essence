<?php include('theme-parts/header.php'); ?>
<section class="dashboard-userlist">
    <div class="user-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">ALl</button>
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
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="blog-list approved-list">
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
                            <tr>
                                <td class="user-id">1</td>
                                <td class="user-name">Admin</td>
                                <td class="user-name">John Doe</td>
                                <td class="user-email">johndoe@eample.com</td>
                                <td class="user-role">Admin</td>
                            </tr>
                            <tr>
                                <td class="user-id">1</td>
                                <td class="user-name">Admin</td>
                                <td class="user-name">John Doe</td>
                                <td class="user-email">johndoe@eample.com</td>
                                <td class="user-role">Admin</td>
                            </tr>
                            <tr>
                                <td class="user-id">1</td>
                                <td class="user-name">Admin</td>
                                <td class="user-name">John Doe</td>
                                <td class="user-email">johndoe@eample.com</td>
                                <td class="user-role">Admin</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            </div>
            <div class="tab-pane fade" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab" tabindex="0">
            </div>
        </div>
    </div>

</section>

<?php include('theme-parts/footer.php') ?>