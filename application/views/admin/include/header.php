 <header class="main-header-top hidden-print">
         <a href="#" class="logo">News Portel</a>
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
           
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
            <?php  $userid=$this->session->userdata('fname'); ?>

               <ul class="top-nav">
                  <!--Notification Menu-->
                    
                 
                 
                  <!-- User Menu-->
                  <li class="dropdown">
                     <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        <span><img class="img-circle " src="<?php echo base_url('assets/images/avatar-1.png'); ?>" style="width:40px;" alt="User Image"></span>
                        <span><b><?php echo $userid;?></b> <i class=" icofont icofont-simple-down"></i></span>

                     </a>
                     <ul class="dropdown-menu settings-menu">
                        <li><a href="<?php echo base_url('admin/Changepassword');?>"><i class="icon-settings"></i> Change Password</a></li>
                        <li><a href="<?php echo base_url('admin/Profile');?>"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="<?php echo base_url('admin/Logout')?>"><i class="icon-logout"></i> Logout</a></li>

                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>