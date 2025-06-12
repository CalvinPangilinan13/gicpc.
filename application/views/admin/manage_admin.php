<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TBTayo! | Manage Admin Account</title>
    <link rel="icon" href="<?php echo base_url('assets/images/head.png.png'); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

    <style>
        table th,
        table td {
            vertical-align: middle !important;
        }

        .table-hover tbody tr:hover {
            background-color: #f2f6fc;
        }

        .main-header h4 {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include APPPATH . 'views/admin/include/header.php'; ?>
        <!-- Sidebar -->
        <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="main-header">
                        <h4>👨‍💼 Manage Admin Account</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow-sm">
                            <div class="card-block">
                                <div class="row">
                                    <?php if ($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <table
                                        class="table table-bordered table-hover table-striped align-middle text-center">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($viewdetails)):
                                                $cnt = 1;
                                                foreach ($viewdetails as $row): ?>
                                                    <tr>
                                                        <td><?php echo $cnt++; ?></td>
                                                        <td class="text-start"><?php echo htmlspecialchars($row->name); ?>
                                                        </td>
                                                        <td class="text-start"><?php echo htmlspecialchars($row->email); ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo site_url("admin/Admin/delete/{$row->id}"); ?>"
                                                                class="btn btn-sm btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to delete this Admin Account?')">
                                                                🗑️ Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;
                                            else: ?>
                                                <tr>
                                                    <td colspan="3" class="text-danger text-center">No Record found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Required JS -->
    <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>