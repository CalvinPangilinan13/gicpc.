<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>TBTayo! | Change Password</title>
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
         max-width: 480px;
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

      .form-label {
         font-weight: 600;
         text-align: left;
         display: block;
         margin-bottom: 0.5rem;
         color: #333;
      }

      .form-label::before {
         content: '📌 ';
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

      #password-requirements {
         text-align: left !important;
         padding-left: 0.5rem;
      }

      .is-invalid {
         border-color: #dc3545;
         box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.25);
      }

      .note-password {
         font-size: 0.9rem;
         color: #6c757d;
         text-align: left;
         margin-bottom: 0.5rem;
         padding-left: 0.25rem;
      }
   </style>
</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <?php include APPPATH . 'views/admin/include/header.php'; ?>
      <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>
      <div class="content-wrapper">
         <div class="main-container">
            <h4>🔐 Change Password</h4>
            <?php if ($this->session->flashdata('success')) { ?>
               <div class="alert alert-success">✅ <?php echo $this->session->flashdata('success'); ?></div>
            <?php } ?>

            <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger">❌ <?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>

            <?php echo form_open('admin/Changepassword', ['name' => 'changepass']); ?>

            <div class="mb-3 text-start">
               <label class="form-label">Current Password</label>
               <?php echo form_password(['name' => 'currentpassword', 'id' => 'currentpassword', 'class' => 'form-control', 'placeholder' => 'Enter Current password']); ?>
               <span style="color:red;"> <?php echo form_error('currentpassword') ?> </span>
            </div>

            <div class="mb-3 text-start">
               <label class="form-label">New Password</label>
               <div class="note-password">Your password must meet the following requirements:</div>
               <?php echo form_password(['name' => 'newpassword', 'id' => 'newpassword', 'class' => 'form-control', 'placeholder' => 'Enter new password']); ?>
               <span style="color:red;"> <?php echo form_error('newpassword') ?> </span>
               <ul id="password-requirements" class="list-unstyled mt-2 text-start small">
                  <li id="length" class="text-danger">❌ Minimum 8 characters</li>
                  <li id="lowercase" class="text-danger">❌ At least one lowercase letter</li>
                  <li id="uppercase" class="text-danger">❌ At least one uppercase letter</li>
                  <li id="number" class="text-danger">❌ At least one number</li>
                  <li id="special" class="text-danger">❌ At least one special character</li>
               </ul>
            </div>

            <div class="mb-3 text-start">
               <label class="form-label">Confirm Password</label>
               <?php echo form_password(['name' => 'confirmpassword', 'id' => 'confirmpassword', 'class' => 'form-control', 'placeholder' => 'Confirm new password']); ?>
               <span style="color:red;"> <?php echo form_error('confirmpassword') ?> </span>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">🔁 Change</button>

            <?php echo form_close(); ?>
         </div>
      </div>
   </div>

   <!-- ✅ jQuery must come FIRST -->
   <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
   <script>
      $(document).ready(function () {
         $('#newpassword').on('keyup', function () {
            var password = $(this).val();

            function update(id, valid, text) {
               $('#' + id)
                  .toggleClass('text-success', valid)
                  .toggleClass('text-danger', !valid)
                  .text((valid ? '✅' : '❌') + ' ' + text);
            }

            update('length', password.length >= 8, 'Minimum 8 characters');
            update('lowercase', /[a-z]/.test(password), 'At least one lowercase letter');
            update('uppercase', /[A-Z]/.test(password), 'At least one uppercase letter');
            update('number', /[0-9]/.test(password), 'At least one number');
            update('special', /[!@#$%^&*(),.?":{}|<>]/.test(password), 'At least one special character');
         });
      });
   </script>

   <!-- Other scripts AFTER jQuery-dependent script -->
   <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>