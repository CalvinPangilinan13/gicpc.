<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>TBTayo! | Add Post</title>
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
         justify-content: center;
         padding: 30px;
      }

      .main-container {
         background: #ffffff;
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
         display: block;
         margin-bottom: 0.5rem;
         color: #333;
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
   </style>
</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <?php include APPPATH . 'views/admin/include/header.php'; ?>
      <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

      <div class="content-wrapper">
         <div class="main-container">
            <h4>📝 Add Blog Post</h4>

            <?php if ($this->session->flashdata('success')) { ?>
               <div class="alert alert-success">✅ <?php echo $this->session->flashdata('success'); ?></div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger">❌ <?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>

            <?php echo form_open_multipart('admin/News/add'); ?>

            <div class="row">
               <div class="col-md-6 form-section">
                  <label class="form-label">📰 News Title</label>
                  <input class="form-control" type="text" name="title" id="title" placeholder="Enter news title">
               </div>

               <div class="col-md-6 form-section">
                  <label class="form-label">📁 Category</label>
                  <select class="form-control" name="category" id="category">
                     <option value="">-- Select --</option>
                     <?php foreach ($viewdetails as $row) {
                        echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                     } ?>
                  </select>
               </div>

               <div class="col-md-6 form-section">
                  <label class="form-label">📂 Sub Category</label>
                  <select class="form-control" name="subcategory" id="subcategory">
                     <option value="NA">-- Select --</option>
                     <?php foreach ($viewdetails as $row) {
                        echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                     } ?>
                  </select>
               </div>

               <div class="col-md-6 form-section">
                  <label class="form-label">🖼️ Upload Image</label>
                  <input class="form-control" type="file" name="image" id="image">
               </div>

               <div class="col-md-12 form-section">
                  <label class="form-label">📝 Description</label>
                  <textarea name="description" id="description" class="form-control" rows="6"
                     placeholder="Write the news description..."></textarea>
               </div>

               <div class="col-md-12 d-flex justify-content-center mt-3">
                  <button class="btn btn-primary" type="submit">➕ Submit</button>
               </div>
            </div>

            <?php echo form_close(); ?>
         </div>
      </div>
   </div>

   <!-- Required JS -->
   <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <script>
      $(document).ready(function () {
         $('#category').change(function () {
            var category_name = $('#category').val();
            if (category_name != '') {
               $.ajax({
                  url: "<?php echo base_url(); ?>admin/News/fetch_subcategory",
                  method: "POST",
                  data: { category_name: category_name },
                  success: function (data) {
                     $('#subcategory').html(data);
                  }
               });
            } else {
               $('#subcategory').html('<option value="">Select Subcategory</option>');
            }
         });
      });
   </script>
</body>

</html>