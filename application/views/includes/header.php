<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }

    .navbar-modern {
        background-color: #ffffff;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        padding: 0.8rem 1rem;
        transition: all 0.3s ease;
    }

    .navbar-modern .navbar-brand img {
        height: 50px;
        transition: transform 0.3s ease;
    }

    .navbar-modern .navbar-brand:hover img {
        transform: scale(1.05);
    }

    .navbar-modern .nav-link {
        color: #333 !important;
        font-weight: 500;
        font-size: 16px;
        margin-left: 1rem;
        margin-right: 1rem;
        position: relative;
        transition: color 0.3s ease, transform 0.3s ease;
        display: flex;
        align-items: center;
    }

    .navbar-modern .nav-link::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 0%;
        height: 2px;
        background-color: #007bff;
        transition: 0.3s ease-in-out;
    }

    .navbar-modern .nav-link:hover::after {
        width: 80%;
    }

    .navbar-modern .nav-link:hover {
        color: #007bff !important;
        transform: translateY(-1px);
    }

    .navbar-modern .nav-link i {
        margin-right: 0.5rem;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    @media (max-width: 991.98px) {
        .navbar-modern .nav-link {
            margin: 0.5rem 0;
            padding: 0.5rem 1rem;
        }

        .navbar-modern {
            padding: 1rem;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light navbar-modern">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('Welcome'); ?>">
            <img src="<?php echo base_url('assets/images/g.png'); ?>" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Welcome'); ?>">
                        🏠 Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('admin/Login'); ?>">
                        🔐 Admin Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>