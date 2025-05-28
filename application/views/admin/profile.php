<!DOCTYPE html>
<html lang="en">
<head>
   <title>News Portal |  Profile</title>

   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
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
                  <h4>User Profile Update</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
           <div class="row">
                  <!--Inline Form starts-->
                  <div class="col-lg-12 inline-forms">
                     <div class="card">
                    <!--success message -->
<?php if($this->session->flashdata('success')){?>
<p style="color:green"><?php  echo $this->session->flashdata('success');?></p>	
<?php } ?>

<!--error message -->
<?php if($this->session->flashdata('error')){?>
<p style="color:red"><?php  echo $this->session->flashdata('error');?></p>	
<?php } ?>	
                        <div class="card-block">
                        <?php echo form_open('admin/Profile/updateprofile',['name'=>'signup']);?>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Name</label>
                                            <?php echo form_input(['name'=>'name','id'=>'name','class'=>'form-control','placeholder'=>'Enter your Name','value'=>set_value('fromdate',$profile->name)]);?>
                         <span style="color:red;"><?php echo form_error('name')?></span>
                                         </div>

                                          <div class="col-sm-6 form-group">
                                            <label>Email id</label>
                                            <?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('fromdate',$profile->email)]);?>
                       <span style="color:red;"><?php echo form_error('email')?></span>
                                         </div>
                                  
                                   <div class="col-sm-4 form-group">
                                   <?php echo form_submit(['name'=>'submit','id'=>'submit','class'=>'btn btn-primary','value'=>'update']);?>

                                     </div>
                                     <?php echo form_close();?>
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
