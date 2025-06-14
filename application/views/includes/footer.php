<style>
    .site-footer {
        background-color: #C4501B;
        color: #ccc;
        padding: 2rem 1rem;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.05);
    }

    .site-footer .footer-content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }

    .site-footer .footer-content p {
        margin: 0.25rem 0;
    }

    .site-footer .footer-content .brand {
        color: #fff;
        font-weight: 600;
        font-size: 16px;
    }

    @media (min-width: 768px) {
        .site-footer .footer-content {
            flex-direction: row;
            justify-content: space-between;
            text-align: left;
        }

        .site-footer .footer-content p {
            margin: 0;
        }

        .site-footer .footer-content .brand {
            font-size: 16px;
        }
    }
</style>

<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <p class="brand">&copy; Lakbay <?php echo date('Y'); ?></p>
            <p>All rights reserved.</p>
        </div>
    </div>
</footer>