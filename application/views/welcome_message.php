<!DOCTYPE html>
<style>
    .new-background {
        background: #FFCD90 !important;
    }
</style>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="assets/images/head.png.png" type="images/head.png.png">
    <title>TBTayo!</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Responsive navbar-->
    <?php include APPPATH . 'views/includes/header.php'; ?>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">

    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <?php if (count($viewdetails)): ?>
                <div id="newsImageCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php for ($i = 0; $i < count($viewdetails); $i++): ?>
                            <button type="button" data-bs-target="#newsImageCarousel" data-bs-slide-to="<?php echo $i; ?>"
                                class="<?php echo $i === 0 ? 'active' : ''; ?>"
                                aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                                aria-label="Slide <?php echo $i + 1; ?>"></button>
                        <?php endfor; ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        $active = true;
                        foreach ($viewdetails as $row):
                            $imgPath = base_url('uploads/files/' . $row->Upload_Image);
                            ?>
                            <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                                <img src="<?php echo $imgPath; ?>" class="d-block w-100" alt="..."
                                    style="height:400px; object-fit:cover;">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                                    <h5><?php echo $row->newtitle; ?></h5>
                                    <p><?php echo substr($row->Description, 0, 100); ?>...</p>
                                </div>
                            </div>
                            <?php
                            $active = false;
                        endforeach;
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#newsImageCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#newsImageCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            <?php endif; ?>
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <?php
                if (count($viewdetails)):
                    $cnt = 1;
                    foreach ($viewdetails as $row):
                        ?>
                        <div class="card mb-4">
                            <a href="#!"><img width="100%" src="<?php echo base_url('uploads/files/' . $row->Upload_Image); ?>"
                                    alt="..." height="400" /></a>

                            <div class="card-body">
                                <?php
                                $input = $row->create_date;
                                $date = strtotime($input);

                                ?>
                                <div class="small text-muted"><?php echo date('M d, Y', $date); ?></div>
                                <h2 class="card-title"><?php echo $row->newtitle; ?></h2>
                                <p class="card-text"><?php echo substr($row->Description, 0, 200); ?></p>
                                <?php echo anchor("Welcome/post/{$row->id}", 'Read more →'); ?>
                            </div>
                        </div>
                        <?php
                        $cnt = $cnt + 1;
                    endforeach;
                else:
                    ?>
                    <tr>
                        <td colspan="5" style="color:red; text-align:center">No Record found</td>
                    </tr>
                <?php endif; ?>

                <!-- Nested row for non-featured blog posts-->

                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <p><?php echo $links; ?></p>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header new-background"> <i class="bi bi-search me-2"></i> Search</div>
                    <div class="card-body">
                        <?php echo form_open('Search/index', ['class' => 'php-email-form']); ?>

                        <div class="input-group">
                            <input class="form-control" type="text" name="searchdata" id="searchdata"
                                placeholder="Enter search term..." aria-label="Enter search term..."
                                aria-describedby="button-search" />
                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Go!">
                            <!-- <button class="btn btn-primary" id="button-search" type="button">Go!</button> -->
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header new-background"><i class="bi bi-list-ul me-2"></i>Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            if (count($category)):
                                $cnt = 1;
                                foreach ($category as $row):
                                    ?>
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <?php $cat = $row->name; ?>
                                            <li> <?php echo anchor("Category/index/{$row->id}", $cat); ?></li>
                                        </ul>
                                    </div>
                                    <?php
                                    $cnt = $cnt + 1;
                                endforeach;
                            else:
                                ?>
                                <tr>
                                    <td colspan="5" style="color:red; text-align:center">No Record found</td>
                                </tr>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>


                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header new-background"> <i class="bi bi-newspaper me-2"></i>Recent Update</div>

                    <div class="card-body">
                        <?php
                        if (count($resentlypost)):
                            $cnt = 1;
                            foreach ($resentlypost as $row):
                                ?>
                                <ul>

                                    <?php $shiv = $row->newtitle; ?>

                                    <li><?php echo anchor("Welcome/post/{$row->id}", $shiv); ?></li>

                                </ul>
                                <?php
                                $cnt = $cnt + 1;
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td colspan="5" style="color:red; text-align:center">No Record found</td>
                            </tr>
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
</html>