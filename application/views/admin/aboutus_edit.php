<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TBTayo! | Update About Us</title>
    <link rel="icon" href="<?php echo base_url('assets/images/lakbay.png'); ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #f4f7fa;
        }

        .content-wrapper {
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        .main-container {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
            padding: 2rem 2.5rem;
            width: 100%;
            max-width: 900px;
        }

        .main-container h4 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #333;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border-radius: 1.5rem;
            padding: 0.65rem 1.25rem;
            border: 1px solid #ccc;
            transition: 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.15rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            border-radius: 2rem;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            color: white;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #003f88);
        }

        .alert {
            font-size: 0.95rem;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            text-align: center;
        }

        .form-section {
            margin-bottom: 1.5rem;
        }

        .img-preview {
            margin-top: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body class="sidebar-mini fixed">
    <div class="wrapper">
        <?php include APPPATH . 'views/admin/include/header.php'; ?>
        <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

        <div class="content-wrapper">
            <div class="main-container">
                <h4>👥 Update About Us</h4>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">✅ <?= $this->session->flashdata('success'); ?></div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">❌ <?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <?php echo form_open_multipart('admin/Aboutus/save'); ?>

                <input type="hidden" name="id" value="<?= $about->id; ?>">

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
                           <input type='{$type}' name='{$name}' class='form-control' value='" . htmlspecialchars($about->$name) . "'>
                        </div>";
                    }
                    ?>

                    <div class="col-md-6 form-section">
                        <label class="form-label">🖼️ Upload Image</label>
                        <input class="form-control" type="file" name="image_url">
                        <?php if (!empty($about->image_url)): ?>
                            <img class="img-preview" src="<?= base_url('uploads/files/' . $about->image_url); ?>"
                                alt="Image Preview">
                        <?php else: ?>
                            <img class="img-preview" src="<?= base_url('images/default.png'); ?>" alt="Default Image">
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 form-section">
                        <label class="form-label">⚙️ Status</label>
                        <select name="status" class="form-control">
                            <option value="Active" <?= $about->status == 'Active' ? 'selected' : ''; ?>>Active</option>
                            <option value="Inactive" <?= $about->status == 'Inactive' ? 'selected' : ''; ?>>Inactive
                            </option>
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
                           <textarea name='{$name}' class='form-control' rows='{$rows}'>" . htmlspecialchars($about->$name) . "</textarea>
                        </div>";
                    }
                    ?>

                    <div class="col-md-12 d-flex justify-content-center mt-3">
                        <button class="btn btn-primary" type="submit">💾 Save Changes</button>
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
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>