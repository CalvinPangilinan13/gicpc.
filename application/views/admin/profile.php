<!DOCTYPE html>
<html lang="en">

<head>
   <title>TBTayo! | Admin Profile</title>
   <link rel="icon" href="<?php echo base_url('assets/images/head.png.png'); ?>" type="image/png">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
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
         max-width: 600px;
         width: 100%;
         background: #ffffff;
         border-radius: 1rem;
         box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
         padding: 2.5rem;
      }

      .main-container h4 {
         font-size: 1.8rem;
         font-weight: 700;
         margin-bottom: 1.5rem;
         color: #333;
         text-align: center;
      }

      .form-label {
         font-weight: 600;
         margin-bottom: 0.5rem;
         color: #333;
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
         justify-content: center;
      }

      .btn-primary:hover {
         background: linear-gradient(135deg, #0056b3, #003f88);
      }
   </style>
</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <?php include APPPATH . 'views/admin/include/header.php'; ?>
      <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

      <div class="content-wrapper">
         <div class="main-container">
            <h4>👤 Update Admin Profile</h4>

            <?php if ($this->session->flashdata('success')) { ?>
               <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')): ?>
               <div class="alert alert-danger">
                  <?php echo $this->session->flashdata('error'); ?>
               </div>
            <?php endif; ?>
            <?php echo form_open('admin/Profile/updateprofile', ['name' => 'signup']); ?>

            <div class="mb-3">
               <label class="form-label">Name</label>
               <?php echo form_input(['name' => 'name', 'id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter your Name', 'value' => set_value('fromdate', $profile->name)]); ?>
               <span style="color:red;"><?php echo form_error('name') ?></span>
            </div>

            <div class="mb-3">
               <label class="form-label">Email ID</label>
               <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'value' => set_value('fromdate', $profile->email)]); ?>
               <span style="color:red;"><?php echo form_error('email') ?></span>
            </div>
            <br>
            <div class="d-grid">
               <?php echo form_submit(['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary', 'value' => '💾 Update']); ?>
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
   <script src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>