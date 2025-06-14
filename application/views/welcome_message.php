<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lakbay | Adventures and Stories</title>
    <link rel="icon" href="assets/images/lakbay.png.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }

        .carousel-container {
            background-color: #ffffff;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
        }

        .carousel-inner img {
            height: 400px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .carousel-caption {
            background-color: rgba(255, 255, 255, 0.85);
            color: #212529;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .main-header {
            background-color: #ffffff;
            padding: 2.5rem 0;
            border-bottom: 1px solid #dee2e6;
            text-align: center;
        }

        .main-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-header {
            background-color: #4E7145;
            color: white;
            font-weight: 600;
        }

        .blog-card img {
            height: 250px;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #4E7145 !important;
        }

        .custom-folder-icon {
            color: #EB9C35;
        }
    </style>
</head>

<body>
    <?php include APPPATH . 'views/includes/header.php'; ?>

    <header class="main-header">
        <div class="container">
            <h1>Lakbay</h1>
            <p>Tara, Libot Tayo!</p>
        </div>
    </header>

    <?php if (count($viewdetails)): ?>
        <div class="container carousel-container">
            <h5 class="mb-3">Top Stories</h5>
            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $active = true;
                    foreach ($viewdetails as $row): ?>
                        <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                            <img src="<?php echo base_url('uploads/files/' . $row->Upload_Image); ?>" class="d-block w-100"
                                alt="Slide">
                            <div class="carousel-caption">
                                <h5><?php echo $row->newtitle; ?></h5>
                                <p class="mb-0 small"><?php echo substr($row->Description, 0, 100); ?>...</p>
                            </div>
                        </div>
                        <?php $active = false; endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <main class="container my-4">
        <div class="row g-5">
            <div class="col-lg-8">
                <?php if (count($viewdetails)):
                    foreach ($viewdetails as $row): ?>
                        <div class="card mb-4 blog-card">
                            <img src="<?php echo base_url('uploads/files/' . $row->Upload_Image); ?>" class="card-img-top"
                                alt="Post Image">
                            <div class="card-body">
                                <small
                                    class="text-muted d-block mb-2"><?php echo date('M d, Y', strtotime($row->create_date)); ?></small>
                                <h5 class="card-title"><?php echo $row->newtitle; ?></h5>
                                <p class="card-text"><?php echo substr($row->Description, 0, 200); ?>...</p>
                                <?php echo anchor("Welcome/post/{$row->id}", 'Read more →', 'class="btn btn-outline-primary btn-sm"'); ?>
                            </div>
                        </div>
                    <?php endforeach; else: ?>
                    <p class="text-center text-danger">No posts available.</p>
                <?php endif; ?>

                <nav class="mt-4" aria-label="Pagination">
                    <p><?php echo $links; ?></p>
                </nav>
            </div>

            <aside class="col-lg-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header text-white">
                        <i class="bi bi-search me-2"></i> Search
                    </div>
                    <div class="card-body">
                        <?php echo form_open('Search/index'); ?>
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchdata" placeholder="Type a keyword..."
                                aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-arrow-right-circle"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header text-white">
                        <i class="bi bi-list-ul me-2"></i> Categories
                    </div>
                    <div class="card-body">
                        <?php if (count($category)): ?>
                            <div class="row row-cols-2 g-2">
                                <?php foreach ($category as $row): ?>
                                    <div class="col">
                                        <a href="<?php echo base_url("Category/index/{$row->id}"); ?>"
                                            class="text-decoration-none text-dark">
                                            <div class="border rounded p-2 d-flex align-items-center hover-shadow-sm">
                                                <i class="bi bi-folder-fill me-2 custom-folder-icon"
                                                    style="color: #EB9C35;"></i>
                                                <span><?php echo $row->name; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-muted text-center mb-0">No categories available.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header text-white">
                        <i class="bi bi-newspaper me-2"></i> Recent Updates
                    </div>
                    <div class="card-body">
                        <?php if (count($resentlypost)): ?>
                            <ul class="list-group list-group-flush">
                                <?php foreach ($resentlypost as $row): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-semibold">
                                                <?php echo anchor("Welcome/post/{$row->id}", $row->newtitle); ?>
                                            </div>
                                        </div>
                                        <i class="bi bi-chevron-right text-muted"></i>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted text-center mb-0">No recent updates found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <?php include APPPATH . 'views/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>