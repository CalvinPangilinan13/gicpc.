<aside class="main-sidebar custom-sidebar">
    <section class="sidebar" id="sidebar-scroll">
        <ul class="sidebar-menu">

            <!-- Dashboard -->
            <li class="active">
                <a href="<?= base_url('admin/dashboard'); ?>">
                    <i class="icon-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Category -->
            <li class="treeview">
                <a href="#!">
                    <i class="icon-briefcase"></i>
                    <span>Category</span>
                    <i class="icon-arrow-down arrow-indicator"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/Category/add'); ?>"><i class="icon-arrow-right"></i> Add</a></li>
                    <li><a href="<?= base_url('admin/Category/view'); ?>"><i class="icon-arrow-right"></i> Manage</a>
                    </li>
                </ul>
            </li>

            <!-- Subcategory -->
            <li class="treeview">
                <a href="#!">
                    <i class="icon-book-open"></i>
                    <span>Subcategory</span>
                    <i class="icon-arrow-down arrow-indicator"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/Category/subcategory'); ?>"><i class="icon-arrow-right"></i>
                            Add</a></li>
                    <li><a href="<?= base_url('admin/Category/managesubcategory'); ?>"><i class="icon-arrow-right"></i>
                            Manage</a></li>
                </ul>
            </li>

            <!-- Blog -->
            <li class="treeview">
                <a href="#!">
                    <i class="icon-docs"></i>
                    <span>Blog Posts</span>
                    <i class="icon-arrow-down arrow-indicator"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/News/add'); ?>"><i class="icon-arrow-right"></i> Add Blog</a></li>
                    <li><a href="<?= base_url('admin/News/managenews'); ?>" target="_blank"><i
                                class="icon-arrow-right"></i> Manage Blogs</a></li>
                </ul>
            </li>

            <!-- Add Admin -->
            <li class="treeview">
                <a href="#!">
                    <i class="icon-user"></i>
                    <span>Admin Account</span>
                    <i class="icon-arrow-down arrow-indicator"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/Admin/add'); ?>"><i class="icon-arrow-right"></i> Add Admin
                            Account</a></li>
                    <li><a href="<?= base_url('admin/Admin/manageadd'); ?>" target="_blank"><i
                                class="icon-arrow-right"></i> Manage Admin Account</a></li>
                </ul>
            </li>

            <!-- Comments -->
            <li class="treeview">
                <a href="#!">
                    <i class="icon-bubbles"></i>
                    <span>User Comments</span>
                    <i class="icon-arrow-down arrow-indicator"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('admin/Usercomment'); ?>"><i class="icon-arrow-right"></i> Manage
                            Comments</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>