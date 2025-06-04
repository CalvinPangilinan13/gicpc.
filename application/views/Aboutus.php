<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tara Libot Tayo! About us Coming Soon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0074D9, #00BFFF);
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .coming-soon-box {
            text-align: center;
            margin: auto;
            animation: fadeInUp 1s ease-out forwards;
            opacity: 0;
        }

        .coming-soon-box h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .coming-soon-box p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .shop-logo {
            width: 100px;
            height: 100px;
            margin-bottom: 1.5rem;
            animation: spin 3s linear infinite;
        }

        @keyframes fadeInUp {
            0% {
                transform: translateY(50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <?php include APPPATH . 'views/includes/header.php'; ?>

    <div class="coming-soon-box">
        <img src="<?php echo base_url('assets/images/head.png.png'); ?>" alt="Logo" class="shop-logo">
        <h1>Tara Libot Tayo!</h1>
        <p class="lead">About us is <strong>Coming Soon</strong>... Get Ready to know us!</p>
    </div>

    <?php include APPPATH . 'views/includes/footer.php'; ?>
</body>

</html>