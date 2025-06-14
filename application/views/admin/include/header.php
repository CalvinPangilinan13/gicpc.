<?php
date_default_timezone_set('Asia/Manila'); // adjust if needed
$currentDate = date('F d, Y'); // e.g. June 04, 2025
$currentTime = date('h:i A'); // e.g. 12:40 PM
?>


<header class="main-header-top hidden-print">
   <a href="<?= base_url('admin/dashboard'); ?>" class="logo">Lakbay</a>
   <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>

      <!-- Navbar Right Menu-->
      <div class="navbar-custom-menu f-right">
         <?php $userid = $this->session->userdata('fname'); ?>

         <ul class="top-nav">
            <!--Notification Menu-->



            <!-- User Menu-->
            <li class="dropdown">
               <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                  class="dropdown-toggle drop icon-circle drop-image flex items-center gap-2 text-white">

                  <!-- Avatar -->
                  <span>
                     <img class="img-circle" src="<?php echo base_url('assets/images/lakbay.png.png'); ?>"
                        style="width:40px;" alt="User Image">
                  </span>

                  <!-- User Greeting + Date/Time -->
                  <span class="flex flex-col leading-tight">
                     <span><b>Hi, <?php echo $userid; ?> &nbsp; | &nbsp; </b> <i class="icofont icofont-simple-down"></i></span>
                     <span class="text-xs text-gray-300"><?php echo $currentDate . ' - ' . $currentTime; ?></span>
                  </span>
               </a>
               <ul class="dropdown-menu settings-menu">
                  <li><a href="<?php echo base_url('admin/Changepassword'); ?>"><i class="icon-settings"></i> Change
                        Password</a></li>
                  <li><a href="<?php echo base_url('admin/Profile'); ?>"><i class="icon-user"></i> Profile</a></li>
                  <li><a href="<?php echo base_url('admin/Logout') ?>"><i class="icon-logout"></i> Logout</a></li>

               </ul>
            </li>
         </ul>
      </div>
   </nav>
</header>