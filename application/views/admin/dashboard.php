<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TBTayo! | Dashboard</title>
   <link rel="icon" href="<?php echo base_url('assets/images/head.png.png'); ?>" type="image/png">

   <!-- Fonts & Icons -->
   <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>">

   <style>
      body {
         font-family: 'Ubuntu', sans-serif;
         background-color: #f0f4f8;
         color: #2d3748;
      }

      .main-header h4 {
         font-weight: 600;
         margin: 2rem 0 1rem;
         font-size: 1.75rem;
      }

      .dashboard-product {
         border-radius: 16px;
         background-color: rgb(57, 68, 78);
         /* Updated box color */
         padding: 1.75rem;
         box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
         position: relative;
         transition: all 0.3s ease;
         color: #ffffff;
         margin-bottom: 30px;
      }

      .dashboard-product:hover {
         transform: translateY(-6px);
         box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
      }

      .dashboard-total-products {
         font-size: 2.5rem;
         font-weight: 700;
         margin-bottom: 0.5rem;
         color: #ffffff;
      }

      .dashboard-product p {
         margin: 0;
         font-size: 1rem;
         color: #e2e8f0;
         display: flex;
         align-items: center;
         gap: 0.5rem;
      }

      .emoji {
         font-size: 1.3rem;
      }

      .side-box {
         position: absolute;
         top: 1.2rem;
         right: 1.2rem;
         font-size: 2rem;
         opacity: 0.1;
         pointer-events: none;
      }

      .dashboard-product:hover .side-box {
         opacity: 0.2;
      }

      @media (max-width: 768px) {
         .dashboard-product {
            margin-bottom: 1.5rem;
         }
      }
   </style>
</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <!-- Header -->
      <?php include APPPATH . 'views/admin/include/header.php'; ?>
      <!-- Sidebar -->
      <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

      <!-- Main Content -->
      <div class="content-wrapper">
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>📈 Dashboard Overview</h4>
               </div>
            </div>

            <div class="row dashboard-header">
               <!-- Total Blog Post -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="dashboard-product">
                     <h2 class="dashboard-total-products"><?php echo $totalnew; ?></h2>
                     <p><span class="emoji">📝</span>Total Blog Posts</p>
                     <div class="side-box text-warning"><i class="ti-signal"></i></div>
                  </div>
               </div>

               <!-- Total Blog Category -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="dashboard-product">
                     <h2 class="dashboard-total-products"><?php echo $totalcategory; ?></h2>
                     <p><span class="emoji">📂</span>Total Categories</p>
                     <div class="side-box text-primary"><i class="ti-gift"></i></div>
                  </div>
               </div>

               <!-- Total Sub Category -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="dashboard-product">
                     <h2 class="dashboard-total-products"><?php echo $totalsubcategory; ?></h2>
                     <p><span class="emoji">🧷</span>Subcategories</p>
                     <div class="side-box text-success"><i class="ti-direction-alt"></i></div>
                  </div>
               </div>

               <!-- Total Comments -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="dashboard-product">
                     <h2 class="dashboard-total-products"><?php echo $totalcomment; ?></h2>
                     <p><span class="emoji">💬</span>Blog Comments</p>
                     <div class="side-box text-danger"><i class="ti-rocket"></i></div>
                  </div>
               </div>



               <!-- Total Admins -->
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="dashboard-product">
                     <h2 class="dashboard-total-products"><?php echo $totaladmin; ?></h2>
                     <p><span class="emoji">👨‍💼</span>Admin Accounts</p>
                     <div class="side-box text-danger"><i class="ti-rocket"></i></div>
                  </div>
               </div>

            </div>
         </div>

         <!-- JS Scripts -->
         <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
         <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
         <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
         <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
         <script src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
         <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>