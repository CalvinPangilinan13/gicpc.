<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>TBTayo! | Category</title>
   <link rel="icon" href="<?php echo base_url('assets/images/lakbay.png.png'); ?>" type="image/png">
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

      .alert {
         border-radius: 0.75rem;
         font-size: 0.95rem;
         margin-top: 1rem;
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
            <h4>📁 Category</h4>
            <p>📝 Add a new category to organize your content</p>

            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>

            <form id="contactForm">
               <div class="mb-3 text-start">
                  <label class="form-label">Category Name</label>
                  <input class="form-control" type="text" name="name" id="name" placeholder="Enter category name"
                     autocomplete="off">
               </div>
               <br>
               <button type="submit" class="btn btn-primary" id="butsave">➕ Submit</button>
            </form>
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

   <script>
      $(document).ready(function () {
         $('#butsave').on('click', function (e) {
            e.preventDefault();
            var name = $('#name').val();
            if (name != "") {
               $("#butsave").attr("disabled", "disabled");
               $.ajax({
                  url: "<?php echo base_url("admin/Category/savedata"); ?>",
                  type: "POST",
                  data: {
                     type: 1,
                     name: name
                  },
                  cache: false,
                  success: function (dataResult) {
                     var dataResult = JSON.parse(dataResult);
                     $('#contactForm').trigger('reset');
                     if (dataResult.statusCode == 200) {
                        $("#butsave").removeAttr("disabled");
                        $("#success").show();
                        $('#success').html('✅ Data added successfully!');
                     } else if (dataResult.statusCode == 201) {
                        alert("❌ Error occurred!");
                     }
                  }
               });
            } else {
               alert('⚠️ Please fill all the fields!');
            }
         });
      });
   </script>
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>