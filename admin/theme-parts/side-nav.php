<div class="side-panel">
    <ul>
        <li>
            <a href="/phpsite/blogsite/admin">Dashboard</a>
        </li>
        <li>
            <a href="/phpsite/blogsite/admin/blog.php">Blogs</a>
        </li>
        <li>
            <a href="/phpsite/blogsite/admin/addblog.php">Add Blog</a>
        </li>
        <li>
            <a href="/phpsite/blogsite/admin/addcategory.php">Add Category</a>
        </li>
    </ul>
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