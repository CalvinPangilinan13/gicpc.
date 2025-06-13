<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding-top: 80px;
        background-color: #F0F4F8;
    }

    .navbar-modern {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1030;
        background-color: #13341E;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        padding: 0.5rem 1rem;
        transition: transform 0.3s ease-in-out;
        animation: slideDown 0.6s ease-out;
    }

    .navbar-hidden {
        transform: translateY(-100%);
    }

    @keyframes slideDown {
        0% {
            transform: translateY(-100%);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .navbar-modern .navbar-brand img {
        height: 50px;
        transition: transform 0.3s ease;
    }

    .navbar-modern .navbar-brand:hover img {
        transform: scale(1.05);
    }

    .navbar-modern .nav-link {
        color: #FFFFFF !important;
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
        background-color: #FFFFFF;
        transition: 0.3s ease-in-out;
    }

    .navbar-modern .nav-link:hover::after {
        width: 80%;
    }

    .navbar-modern .nav-link:hover {
        color: #FFFFFF !important;
        transform: translateY(-1px);
    }

    .navbar-modern .nav-link i {
        margin-right: 0.5rem;
    }

    .navbar-toggler {
        border: none;
        color: white;
        /* This changes the icon lines to white */
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
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

<nav class="navbar navbar-expand-lg navbar-dark navbar-modern">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('Welcome'); ?>">
            <img src="<?php echo base_url('assets/images/lakbay.png.png'); ?>" alt="Logo" style="height: 80px;">
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
                    <a class="nav-link" href="<?php echo site_url('admin/About'); ?>">
                        👥 About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('admin/Shop'); ?>">
                        🛒 Shop
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


<script>
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar-modern');

    window.addEventListener('scroll', function () {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            navbar.classList.add('navbar-hidden');
        } else {
            navbar.classList.remove('navbar-hidden');
        }

        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
</script>