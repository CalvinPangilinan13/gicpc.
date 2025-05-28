<style>
    /* Import the font in your CSS */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

    .navbar-dark.bg-dark {
        background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
    }

    .navbar-dark.bg-dark .nav-link {
        color: black !important;
        /* Ensure the text is readable */
        font-family: 'Poppins', sans-serif;
        /* Apply the modern font */
        font-size: 16px;
        /* Adjust size for modern styling */
        font-weight: 500;
        /* Medium weight for clarity */
        transition: color 0.3s ease;
        /* Add smooth hover effect */
    }

    .navbar-dark.bg-dark .nav-link:hover {
        color: #d53369 !important;
        /* Add a hover effect matching the gradient */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('Welcome'); ?>">
            <img src="<?php echo base_url('assets/images/g.png'); ?>" alt="Logo" style="height: 80px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Welcome'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('admin/Login'); ?>">Admin Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>