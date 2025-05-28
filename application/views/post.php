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
    <title>GICPC UPDATES</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Responsive navbar-->
    <?php include APPPATH . 'views/includes/header.php'; ?>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bold mb-2"><?php echo $viewdetails->newtitle; ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-3"><?php echo $viewdetails->newtitle; ?></div>
                        <!-- Post categories-->
                        <div class="mb-3">
                            <a class="badge bg-primary text-decoration-none link-light me-2"
                                href="#!"><?php echo $viewdetails->category; ?></a>
                            <a class="badge bg-secondary text-decoration-none link-light"
                                href="#!"><?php echo $viewdetails->subcategory; ?></a>
                        </div>
                    </header>

                    <!-- Preview image-->
                    <figure class="mb-4 text-center">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <img class="img-fluid rounded shadow-lg"
                                    src="<?php echo base_url('uploads/files/' . $viewdetails->Upload_Image); ?>"
                                    alt="Article Image" style="width: 100%; height: auto; object-fit: cover;">
                            </div>
                        </div>
                    </figure>

                    <!-- Post content-->
                    <section class="mb-5">
                        <div class="fs-5" style="line-height: 1.8; text-align: justify;">
                            <?php
                            // Split the description into paragraphs using line breaks (if necessary)
                            $paragraphs = explode("\n", trim($viewdetails->Description));
                            foreach ($paragraphs as $paragraph) {
                                if (!empty($paragraph)) {
                                    echo '<p>' . htmlspecialchars($paragraph) . '</p>';
                                }
                            }
                            ?>
                        </div>
                    </section>
                </article>

                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <!-- Comments List -->
                            <?php if (count($comment)): ?>
                                <div class="mb-4">
                                    <?php foreach ($comment as $row): ?>
                                        <div class="d-flex mb-4 border-bottom pb-3">
                                            <!-- Comment Avatar -->
                                            <div class="flex-shrink-0">
                                                <img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                    alt="User Avatar" />
                                            </div>
                                            <div class="ms-3 w-100">
                                                <div class="fw-bold"><?php echo $row->name; ?></div>
                                                <p class="mb-0"><?php echo $row->comment; ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted">No comments yet. Be the first to comment!</p>
                            <?php endif; ?>

                            <!-- Comment Form-->
                            <h5 class="mt-4">Leave a Comment</h5>
                            <form id="contactForm">
                                <div class="row gx-5 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-dark" for="name">Full Name</label>
                                        <input class="form-control" name="name" id="name" type="text"
                                            placeholder="Full Name" required />
                                        <input type="hidden" id="postid" value="1">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-dark" for="email">Email</label>
                                        <input class="form-control" name="email" id="email" type="email"
                                            placeholder="name@example.com" required />
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label text-dark" for="comment">Message</label>
                                    <textarea class="form-control" name="comment" id="comment"
                                        placeholder="Enter your comment..." rows="4" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary mt-4" id="butsave" type="submit">Submit
                                        Comment</button>
                                </div>
                            </form>

                            <!-- Success Message-->
                            <div class="alert alert-success alert-dismissible mt-4" id="success" style="display:none;">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                Your comment has been submitted successfully.
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <?php include APPPATH . 'views/includes/footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</body>

</html>
<script>
    $('#butsave').on('click', function (e) {
        e.preventDefault(); // Prevent default form submission

        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();

        if (name !== "" && email !== "" && comment !== "") {
            $("#butsave").attr("disabled", "disabled");

            $.ajax({
                url: "<?php echo base_url('Welcome/comment'); ?>",
                type: "POST",
                data: {
                    type: 1,
                    name: name,
                    email: email,
                    comment: comment
                },
                cache: false,
                success: function (dataResult) {
                    try {
                        var dataResult = JSON.parse(dataResult);

                        if (dataResult.statusCode === 200) {
                            $("#success").show();
                            $('#contactForm').trigger('reset');
                            $("#butsave").removeAttr("disabled");

                            // Update the postid in the hidden input
                            $('#postid').val(dataResult.new_postid);
                        } else {
                            alert("Error occurred while saving the comment.");
                            $("#butsave").removeAttr("disabled");
                        }
                    } catch (e) {
                        alert("An error occurred while processing the response.");
                        console.error("Error parsing JSON: ", e);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("An error occurred: " + textStatus);
                    console.error("AJAX Error: ", errorThrown);
                    $("#butsave").removeAttr("disabled");
                }
            });
        } else {
            alert('Please fill in all fields!');
        }
    });
</script>