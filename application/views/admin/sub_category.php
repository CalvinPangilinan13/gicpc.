<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>TBTayo! | Sub Category</title>
   <link rel="icon" href="<?php echo base_url('assets/images/head.png.png'); ?>" type="image/png">
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>">

   <style>
      body {
         font-family: 'Ubuntu', sans-serif;
         background-color: #f4f7fa;
      }

      .content-wrapper {
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: calc(100vh - 60px);
         padding-top: 30px;
         padding-bottom: 30px;
      }

      .main-container {
         max-width: 500px;
         width: 100%;
         background: #ffffff;
         border-radius: 1rem;
         box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
         padding: 2.5rem;
         text-align: center;
      }

      .main-container h4 {
         font-size: 1.8rem;
         font-weight: 700;
         margin-bottom: 0.5rem;
         color: #333;
      }

      .main-container p {
         font-size: 0.95rem;
         color: #6c757d;
         margin-bottom: 1.5rem;
      }

      .form-label {
         font-weight: 600;
         text-align: left;
         display: block;
         margin-bottom: 0.5rem;
         color: #333;
      }

      .form-label::before {
         content: '🏷️ ';
      }

      .form-control {
         border-radius: 2rem;
         padding: 0.75rem 1.25rem;
         border: 1px solid #ccc;
         transition: border 0.3s ease-in-out;
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
         transition: all 0.3s ease;
         color: #fff;
         display: inline-flex;
         align-items: center;
         gap: 0.4rem;
         justify-content: center;
      }

      .btn-primary:hover {
         background: linear-gradient(135deg, #0056b3, #003f88);
      }

      .alert {
         border-radius: 0.75rem;
         font-size: 0.95rem;
         margin-bottom: 1rem;
         text-align: center;
      }

      .emoji-header {
         font-size: 2rem;
         margin-bottom: 0.25rem;
      }
   </style>
</head>

<body class="sidebar-mini fixed">

   <div class="wrapper">
      <?php include APPPATH . 'views/admin/include/header.php'; ?>
      <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

      <div class="content-wrapper">
         <div class="main-container">

            <h4>🗂️ Sub Category</h4>
            <p>📑 Assign subcategories under an existing category</p>

            <!-- Success Flash Message -->
            <?php if ($this->session->flashdata('success')) { ?>
               <div class="alert alert-success">
                  ✅ <?php echo $this->session->flashdata('success'); ?>
               </div>
            <?php } ?>

            <!-- Error Flash Message -->
            <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger">
                  ❌ <?php echo $this->session->flashdata('error'); ?>
               </div>
            <?php } ?>

            <?php echo form_open('admin/Category/subcategory', ['name' => 'create']); ?>
            <div class="mb-3 text-start">
               <label class="form-label">Select Category</label>
               <select class="form-control" name="category" id="category">
                  <option value="NA">-- select --</option>
                  <?php foreach ($cate as $row) {
                     echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                  } ?>
               </select>
            </div>

            <div class="mb-3 text-start">
               <label class="form-label">Subcategory Name</label>
               <input class="form-control" type="text" name="subcategory" id="subcategory"
                  placeholder="Enter subcategory name">
            </div>
            <br>
            <button class="btn btn-primary" type="submit">➕ Submit</button>
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
</body>

</html>