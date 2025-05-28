<!DOCTYPE html>
<html lang="en">
<head>
   <title>News Portal | Dashboard</title>

   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
<a href="https://icons8.com/icon/BYnvGv84C52t/settings">Settings icon by Icons8</a>
   <!-- themify -->


   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css')?>">
   
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css')?>">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/responsive.css')?>">

</head>

<body class="sidebar-mini fixed">
   
   <div class="wrapper">
      <!-- Navbar-->
   <?php include APPPATH.'views/admin/include/header.php';?>
      <!-- Side-Nav-->
         <?php include APPPATH.'views/admin/include/sidebar.php';?>
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>Dashboard</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row dashboard-header">
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <h2 class="dashboard-total-products"><?php echo $totalnew;?></h2>
                     Total News Post
                     <div class="side-box">
                        <i class="ti-signal text-warning-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <h2 class="dashboard-total-products"><?php echo $totalcategory; ?></h2>
                    Total News Category
                     <div class="side-box ">
                        <i class="ti-gift text-primary-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     
                     <h2 class="dashboard-total-products"><span><?php echo $totalsubcategory; ?></span></h2>
                     Total News Sub Category
                     <div class="side-box">
                        <i class="ti-direction-alt text-success-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <h2 class="dashboard-total-products"><span><?php echo $totalcomment; ?></span></h2>
                     Total News Comment
                     <div class="side-box">
                        <i class="ti-rocket text-danger-color"></i>
                     </div>
                  </div>
               </div>
            </div>
          </div>
         
      </div>
   </div>


  
   <!-- Required Jqurey -->
   <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js');?>"></script>
   <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
   <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js');?>"></script>
   <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.min.js');?>"></script>
   <script src="<?php echo base_url('assets/js/menu.min.js');?>"></script>
</body>
</html>
