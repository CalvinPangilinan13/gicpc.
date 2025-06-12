<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TBTayo! | About Us</title>
    <link rel="icon" href="<?php echo base_url('assets/images/head.png.png'); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background: linear-gradient(to right, #f0f4f8, #e0eafc);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            padding: 40px 15px;
            animation: fadeIn 1s ease-in-out;
        }

        .main-container {
            background: #ffffff;
            border-radius: 2rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            padding: 2.5rem 3rem;
            width: 100%;
            max-width: 1000px;
            opacity: 0;
            animation: fadeUp 0.8s ease-out forwards;
            animation-delay: 0.3s;
        }

        .main-container h4 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #34495e;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 1.5rem;
            padding: 0.65rem 1.2rem;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            border-radius: 2rem;
            padding: 0.6rem 2rem;
            font-weight: 600;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #003f88);
            transform: scale(1.03);
        }

        .form-section {
            margin-bottom: 1.5rem;
        }

        .alert {
            border-radius: 1rem;
            font-size: 0.95rem;
            padding: 0.75rem 1.25rem;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeUp {
            0% {
                transform: translateY(30px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <?php include APPPATH . 'views/admin/include/header.php'; ?>
        <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="main-container">
                <h4>👥 About Us Information</h4>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success text-center">✅ <?= $this->session->flashdata('success'); ?></div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger text-center">❌ <?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <?php echo form_open_multipart('admin/Aboutus/save'); ?>
                <input type="hidden" name="id" value="<?= isset($about->id) ? $about->id : ''; ?>">

                <div class="row">
                    <?php
                    $fields = [
                        ['📌 Title', 'title'],
                        ['📝 Subtitle', 'subtitle'],
                        ['👤 Founder Name', 'founder_name'],
                        ['📅 Founded Date', 'founded_date', 'date'],
                        ['📍 Location', 'location'],
                        ['✉️ Contact Email', 'contact_email', 'email']
                    ];
                    foreach ($fields as $f) {
                        [$label, $name, $type] = array_pad($f, 3, 'text');
                        echo "<div class='col-md-6 form-section'>
                              <label class='form-label'>{$label}</label>
                              <input type='{$type}' name='{$name}' class='form-control' value='" . (isset($about->$name) ? $about->$name : '') . "'>
                           </div>";
                    }
                    ?>

                    <div class="col-md-6 form-section">
                        <label class="form-label">🖼️ Image</label>
                        <input type="file" name="image_url" class="form-control">
                        <?php if (!empty($about->image_url)): ?>
                            <img src="<?= base_url('uploads/' . $about->image_url); ?>" class="img-fluid mt-2 rounded"
                                style="max-width: 200px;">
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 form-section">
                        <label class="form-label">⚙️ Status</label>
                        <select name="status" class="form-control">
                            <option value="Active" <?= (isset($about->status) && $about->status == 'Active') ? 'selected' : ''; ?>>Active</option>
                            <option value="Inactive" <?= (isset($about->status) && $about->status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </div>

                    <?php
                    $textareas = [
                        ['📖 Content', 'content', 5],
                        ['🎯 Vision', 'vision', 3],
                        ['🚀 Mission', 'mission', 3],
                        ['🌐 Social Links (JSON)', 'social_links', 2],
                    ];
                    foreach ($textareas as [$label, $name, $rows]) {
                        echo "<div class='col-md-12 form-section'>
                              <label class='form-label'>{$label}</label>
                              <textarea name='{$name}' class='form-control' rows='{$rows}'>" . (isset($about->$name) ? $about->$name : '') . "</textarea>
                           </div>";
                    }
                    ?>

                    <div class="col-md-12 d-flex justify-content-center mt-3">
                        <button class="btn btn-primary" type="submit">💾 Save Info</button>
                    </div>
                </div>

                <?php echo form_close(); ?>
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
        $(function () {
            $('.main-container').css('opacity', '1');
        });
    </script>

</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>