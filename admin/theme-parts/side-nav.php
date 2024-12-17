<div class="side-panel">
    <?php if($userrole == 1){ ?>
    <ul>
        <li>
            <a href="/phpsite/blogsite/admin">Dashboard</a>
        </li>
        <li>
            <a href="/phpsite/blogsite/admin/blog.php">Blogs</a>
            <ul class="sub-panel">
                <li>
                    <a href="/phpsite/blogsite/admin/addblog.php">Add Blog</a>
                </li>
                <li>
                    <a href="/phpsite/blogsite/admin/addcategory.php">Add Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Category</a>
        </li>
        <li>
            <a href="#">Authors</a>
        </li>
        <li>
            <a href="#">Users</a>
        </li>
    </ul>
    <?php }elseif($userrole == 2){?>
    <ul>
        <li>
            <a href="/phpsite/blogsite/admin">Dashboard</a>
        </li>
        <li>
            <a href="/phpsite/blogsite/admin/blog.php">Blogs</a>
            <ul class="sub-panel">
                <li>
                    <a href="/phpsite/blogsite/admin/addblog.php">Add Blog</a>
                </li>
                <li>
                    <a href="/phpsite/blogsite/admin/addcategory.php">Add Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Category</a>
        </li>
        <li>
            <a href="/phpsite/blogsite/admin/account.php">Account Setting</a>
        </li>
    </ul>
    <?php }else{?>
    <ul>
        <li>
            <a href="/phpsite/blogsite/admin/account.php">Account Setting</a>
        </li>
        <li>
            <a href="/phpsite/blogsite/admin/blog.php">Blogs</a>
            <ul class="sub-panel">
                <li>
                    <a href="/phpsite/blogsite/admin/addblog.php">Add Blog</a>
                </li>
                <li>
                    <a href="/phpsite/blogsite/admin/addcategory.php">Add Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Category</a>
        </li>
        <li>
            <a href="#">Authors</a>
        </li>
        <li>
            <a href="#">Users</a>
        </li>
    </ul>
    <?php }?>
</div>
<script>
    // Get the current path and normalize (remove trailing slash)
    const currentPath = window.location.pathname.replace(/\/$/, "");
    const navLinks = document.querySelectorAll('.side-panel a');

    // Add active class to matching link
    navLinks.forEach(link => {
        if (link.getAttribute('href').replace(/\/$/, "") === currentPath) {
            link.classList.add('active');
        }
    });
</script>