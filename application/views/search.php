<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TBTayo!</title>
    <link rel="icon" href="assets/images/lakbay.png" type="image/png">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
    .new-background {
        background: #4E7145;
    }

    .card-header {
        background-color: #4E7145 !important;
        color: white;
        font-weight: 600;
    }

    .btn-primary {
        background-color: #4E7145 !important;
    }
</style>

<body>
    <!-- Responsive navbar-->
    <?php include APPPATH . 'views/includes/header.php'; ?>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">

    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <?php
                if (count($sresult)):
                    $cnt = 1;
                    foreach ($sresult as $row):
                        ?>
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top"
                                    src="<?php echo base_url('uploads/files/' . $row->Upload_Image); ?>" alt="..." /></a>

                            <div class="card-body">
                                <?php
                                $input = $row->create_date;
                                $date = strtotime($input);

                                ?>
                                <div class="small text-muted"><?php echo date('M d, Y', $date); ?></div>
                                <h2 class="card-title"><?php echo $row->newtitle; ?></h2>
                                <p class="card-text"><?php echo substr($row->Description, 0, 200); ?>...</p>
                                <?php echo anchor("Welcome/post/{$row->id}", 'Read more →', 'class="btn btn-outline-primary btn-sm"'); ?>
                            </div>
                        </div>
                    <?php endforeach; else: ?>
                    <p class="text-center text-danger">No Record found</p>
                <?php endif; ?>

                <!-- Nested row for non-featured blog posts-->

                <!-- Pagination-->

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
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
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php include APPPATH . 'views/includes/footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
</body>

</html>