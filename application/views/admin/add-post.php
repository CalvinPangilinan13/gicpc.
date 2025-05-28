<!DOCTYPE html>
<html lang="en">
<head>
   <title>News Portal | Add Post</title>

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
                  <h4>Add News</h4>
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
                        <?php echo form_open_multipart('admin/News/add');?>

                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>New Title</label>
                                            <input class="form-control" type="text" name="title" id="title" placeholder="Add Category">
                                         </div>

                                          <div class="col-sm-6 form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" id="category">
                                               <option value="">--select--</option>
                                            <?php
                                             foreach($viewdetails as $row)
                                             {
                                             echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                             }
                                             ?>
                                           </select>
                                         </div>

                                         <div class="col-sm-6 form-group">
                                            <label>Sub Category</label>
                                            <select class="form-control" name="subcategory" id="subcategory">
                                            <option value="NA">--select--</option>
                                           </select>
                                         </div>


                                         <div class="col-sm-6 form-group">
                                            <label>Upload Image</label>
                                            <input class="form-control" type="file" name="image" id="image" placeholder="Add Category">
                                         </div>

                                           <div class="col-sm-12 form-group">
                                            <label>Description</label>
                                           <textarea name="description" id="description" class="form-control" cols="5" rows="10"></textarea>
                                         </div>

                                   <div class="col-sm-4 form-group">
                                         <button class="btn btn-default" type="submit">Submit</button>
                                     </div>
                              </form>
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
<script>
   $(document).ready(function(){
      $('#category').change(function(){
  var category_name = $('#category').val();
  if(category_name != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>admin/News/fetch_subcategory",
    method:"POST",
    data:{category_name:category_name},
    success:function(data)
    
    {
     $('#subcategory').html(data);
    }
   });
  }
  else
  {
   $('#subcategory').html('<option value="">Select Subcategory</option>');
  
  }
      });
   });
</script>

 