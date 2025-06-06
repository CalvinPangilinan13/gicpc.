<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>TBTayo! | Category View</title>
    <link rel="icon" type="image/png" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
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
            background-color: #0074D9;
            color: white;
            font-weight: 600;
        }

        .blog-card img {
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php include APPPATH . 'views/includes/header.php'; ?>

    <header class="main-header">
        <div class="container">
            <h1>TBTayo!</h1>
            <p>Category Specific Posts</p>
        </div>
    </header>

    <main class="container my-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <?php if (count($getwebsitedetailscategory)):
                    foreach ($getwebsitedetailscategory as $row): ?>
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
                    <p class="text-center text-danger">No Record found</p>
                <?php endif; ?>
            </div>

            <aside class="col-lg-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
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
                    <div class="card-header bg-primary text-white">
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
                                                <i class="bi bi-folder-fill me-2 text-primary"></i>
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
                    <div class="card-header bg-primary text-white">
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
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
</body>

</html>