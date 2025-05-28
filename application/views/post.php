<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $viewdetails->newtitle; ?> | GICPC Updates</title>
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .blog-paragraph {
            font-size: 1.1rem;
            line-height: 2;
            color: #343a40;
            margin-bottom: 1.8rem;
            text-align: justify;
        }

        .tag-badge {
            font-size: 0.875rem;
            padding: 0.5rem 0.9rem;
            border-radius: 2rem;
            margin-right: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .cover-image-wrapper {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .form-control,
        .btn {
            border-radius: 12px;
        }

        .btn-primary {
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #5a67d8, #6b46c1);
        }
    </style>
</head>

<body>
    <?php include APPPATH . 'views/includes/header.php'; ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8 animate__animated animate__fadeIn">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bold display-5 text-dark mb-1"><?php echo $viewdetails->newtitle; ?></h1>
                        <p class="fst-italic text-muted mb-3"><?php echo $viewdetails->newtitle; ?></p>
                        <div class="mb-4">
                            <span class="badge bg-primary tag-badge"><?php echo $viewdetails->category; ?></span>
                            <span class="badge bg-secondary tag-badge"><?php echo $viewdetails->subcategory; ?></span>
                        </div>
                    </header>

                    <div class="cover-image-wrapper mb-0 text-center">
                        <img class="img-fluid"
                            src="<?php echo base_url('uploads/files/' . $viewdetails->Upload_Image); ?>"
                            alt="Article Image">
                    </div>
                    <section class="mb-5 px-2 px-md-3 py-2">
                        <?php
                        $paragraphs = explode("\n", trim($viewdetails->Description));
                        foreach ($paragraphs as $paragraph) {
                            if (!empty($paragraph)) {
                                echo '<p class="blog-paragraph">' . htmlspecialchars($paragraph) . '</p>';
                            }
                        }
                        ?>
                    </section>
                </article>

                <section class="mb-5">
                    <div class="card border-0 shadow-sm rounded-4 animate__animated animate__fadeIn">
                        <div class="card-body">

                            <?php if (!empty($comment)): ?>
                                <?php foreach ($comment as $row): ?>
                                    <div class="d-flex mb-4 border-bottom pb-3">
                                        <div class="flex-shrink-0">
                                            <img class="rounded-circle comment-avatar"
                                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="Avatar">
                                        </div>
                                        <div class="ms-3 w-100">
                                            <div class="fw-semibold text-dark"><?php echo $row->name; ?></div>
                                            <p class="mb-0 text-muted"><?php echo $row->comment; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted">No comments yet. Be the first to comment!</p>
                            <?php endif; ?>

                            <h5 class="mt-4 fw-bold text-dark">Leave a Comment</h5>

                            <?php $success = isset($_GET['success']) && $_GET['success'] == 1; ?>

                            <?php if ($success): ?>
                                <div class="alert alert-success alert-dismissible fade show mt-4">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    Your comment has been submitted successfully.
                                </div>
                            <?php elseif (isset($error)): ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-4">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="<?= base_url('Welcome/comment') ?>" novalidate>
                                <div class="row gx-3 gy-3">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name"
                                            value="<?= set_value('name') ?>">
                                        <input type="hidden" name="postid" value="<?php echo $viewdetails->id; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="<?= set_value('email') ?>">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <textarea name="comment" class="form-control" rows="4"
                                        placeholder="Enter your comment..."><?= set_value('comment') ?></textarea>
                                </div>
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4 py-2">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include APPPATH . 'views/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>