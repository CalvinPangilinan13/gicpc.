<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TBTayo! | Manage About</title>
    <link rel="icon" href="<?php echo base_url('assets/images/lakbay.png.png'); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

    <style>
        table th,
        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        .main-header h4 {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .table-hover tbody tr:hover {
            background-color: #f2f6fc;
        }

        .badge-status {
            font-size: 0.9rem;
            padding: 0.4em 0.8em;
            border-radius: 12px;
        }

        .badge-active {
            background-color: #28a745;
            color: white;
        }

        .badge-inactive {
            background-color: #dc3545;
            color: white;
        }

        img.thumb {
            height: 50px;
            width: 50px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <?php include APPPATH . 'views/admin/include/header.php'; ?>
        <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>👥 Manage About Us Entries</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow-sm">
                            <div class="card-block">
                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Founder</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($viewdetails)):
                                                $cnt = 1;
                                                foreach ($viewdetails as $row): ?>
                                                    <tr>
                                                        <td><?php echo $cnt++; ?></td>
                                                        <td class="text-start">📌 <?php echo $row->title; ?></td>
                                                        <td>👤 <?php echo $row->founder_name; ?></td>
                                                        <td>
                                                            <?php if (!empty($row->image_url)): ?>
                                                                <img class="thumb"
                                                                    src="<?php echo base_url('uploads/files/' . $row->image_url); ?>">
                                                            <?php else: ?>
                                                                <span class="text-muted">No Image</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="badge badge-status <?php echo ($row->status == 'Active') ? 'badge-active' : 'badge-inactive'; ?>">
                                                                <?php echo $row->status; ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo site_url("admin/Aboutus/delete/{$row->id}"); ?>"
                                                                class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to delete this entry?')">🗑️
                                                                Delete</a>
                                                            <a href="<?php echo site_url("admin/Aboutus/editdata/{$row->id}"); ?>"
                                                                class="btn btn-sm btn-outline-warning">✏️ Edit</a>
                                                            <button class="btn btn-sm btn-outline-info" data-toggle="modal"
                                                                data-target="#myModal"
                                                                onclick="load_marks(<?php echo $row->id; ?>)">👁️
                                                                View</button>
                                                        </td>


                                                    </tr>
                                                <?php endforeach;
                                            else: ?>
                                                <tr>
                                                    <td colspan="6" class="text-danger text-center">No About Us records
                                                        found.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <!-- Modal Container -->
                                    <div class="modal fade displaycontent" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="aboutModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <div class="spinner-border text-primary" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        function load_marks(id) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/aboutus/getaboutmodal'); ?>",
                data: { id: id },
                success: function (response) {
                    $(".displaycontent").html(response);
                }
            });
        }
    </script>
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>