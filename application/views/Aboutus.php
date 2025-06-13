<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TBTayo! | About Us</title>
    <link rel="icon" href="assets/images/lakbay.png.png" type="images/lakbay.png.png">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">


    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom right, #f0f4f8, #ffffff);
            color: #222;
        }

        .about-container {
            max-width: 960px;
            margin: 80px auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 1rem;
            animation: fadeIn 0.8s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .about-logo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 3px solid #dee2e6;
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .about-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #004085;
        }

        .about-subtitle {
            font-size: 1.1rem;
            font-weight: 400;
            color: #6c757d;
            margin-bottom: 1.5rem;
        }

        .about-section {
            margin-bottom: 2rem;
            animation: fadeInUp 0.6s ease;
        }

        .section-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .divider {
            height: 1px;
            background-color: #dee2e6;
            margin: 2rem 0;
        }

        .social-links a {
            color: #343a40;
            /* darker, always visible */
            margin: 0 0.5rem;
            font-size: 1.4rem;
            transition: transform 0.2s, color 0.2s;
        }

        .social-links a:hover {
            transform: scale(1.2);
            color: #0d6efd;
            /* bright blue on hover */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <?php include APPPATH . 'views/includes/header.php'; ?>

    <div class="container">
        <?php if (!empty($about)): ?>
            <?php foreach ($about as $entry): ?>
                <div class="about-container text-center mb-5">
                    <img src="<?= base_url('uploads/files/' . $entry->image_url); ?>" alt="Founder" class="about-logo">
                    <h1 class="about-title"><?= $entry->title; ?></h1>
                    <p class="about-subtitle"><?= $entry->subtitle; ?></p>

                    <div class="divider"></div>

                    <div class="about-section">
                        <h5 class="section-title">📖 About Me</h5>
                        <p><?= nl2br($entry->content); ?></p>
                    </div>

                    <div class="about-section">
                        <h5 class="section-title">🎯 My Vision</h5>
                        <p><?= nl2br($entry->vision); ?></p>
                    </div>

                    <div class="about-section">
                        <h5 class="section-title">🚀 My Mission</h5>
                        <p><?= nl2br($entry->mission); ?></p>
                    </div>

                    <div class="divider"></div>

                    <div class="about-section">
                        <h5 class="section-title">👤 Author Name</h5>
                        <p><?= $entry->founder_name; ?> — <?= date('F d, Y', strtotime($entry->founded_date)); ?></p>
                    </div>

                    <div class="about-section">
                        <h5 class="section-title">📍 Location</h5>
                        <p><?= $entry->location; ?></p>
                    </div>

                    <div class="about-section">
                        <h5 class="section-title">📬 Contact Email</h5>
                        <?php if (!empty($entry->contact_email)): ?>
                            <p>
                                <a href="mailto:<?= htmlspecialchars($entry->contact_email); ?>" class="text-dark">
                                    <?= htmlspecialchars($entry->contact_email); ?>
                                </a>
                            </p>
                        <?php else: ?>
                            <p class="text-muted">No contact email provided.</p>
                        <?php endif; ?>
                    </div>

                    <div class="about-section social-links">
                        <h5 class="section-title">🌐 Follow Me</h5>
                        <?php
                        $socials = json_decode($entry->social_links);
                        if (!empty($socials)) {
                            foreach ($socials as $platform => $url) {
                                switch (strtolower($platform)) {
                                    case 'facebook':
                                        $icon = 'fab fa-facebook-f';
                                        break;
                                    case 'instagram':
                                        $icon = 'fab fa-instagram';
                                        break;
                                    case 'youtube':
                                        $icon = 'fab fa-youtube';
                                        break;
                                    case 'twitter':
                                        $icon = 'fab fa-twitter';
                                        break;
                                    case 'linkedin':
                                        $icon = 'fab fa-linkedin-in';
                                        break;
                                    default:
                                        $icon = 'fas fa-link';
                                }
                                echo "<a href='$url' target='_blank' aria-label='$platform'><i class='$icon'></i></a>";
                            }
                        } else {
                            echo '<p class="text-muted">No social links provided.</p>';
                        }
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center mt-5">
                <h3>No About Us information available yet.</h3>
            </div>
        <?php endif; ?>
    </div>

    <?php include APPPATH . 'views/includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>