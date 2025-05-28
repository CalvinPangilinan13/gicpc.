<!DOCTYPE html>
<html lang="en">
<head>
   <title>News Portal | Manage Post</title>

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
                  <h4>Manage News</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
           <div class="row">
               <div class="col-sm-12">
                
                 
                  <div class="card">
                  
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                           <?php if($this->session->flashdata('success')){?>
<p style="color:red"><?php  echo $this->session->flashdata('success');?></p>	
<?php } ?>
                              <table class="table">
                              <thead>
                                    <tr>
                                       <th>Sr.No</th>
                                       <th>Title</th>
                                       <th>Category</th>
                                       <th>Sub Category</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <?php
                  if(count($viewdetails)):
                  $cnt=1;
                  foreach($viewdetails as $row):
                  ?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row->newtitle;?></td>
                  <td><?php  echo $row->category;?></td>
                  <td><?php  echo $row->subcategory;?></td>
                 <td><?php echo anchor("admin/News/delete/{$row->id}",'Delete'); ?>
                 | <?php echo anchor("admin/News/editdata/{$row->id}",'Edit'); ?> | 
                <a data-toggle="modal" data-target="#myModal" 
                  onclick="javascript:load_marks(<?php echo $row->id; ?>)">View</a>
                </td>               
               </td>
                </tr>
                <?php 
                    $cnt=$cnt+1;
                    endforeach;
                    else:
                    ?>
                    <tr>
                    <td colspan="5" style="color:red; text-align:center">No Record found</td>
                    </tr>
                    <?php endif;?>
                              </table>
                           </div>
                        </div>
                     </div>
                     </div>
                    <!-- Pagination-->
                <nav aria-label="Pagination">
                        <hr class="my-0" />
                      <p><?php echo $links; ?></p>
                    </nav>
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


  <div class="modal fade displaycontent" id="myModal">
<?php include APPPATH.'views/admin/modal.php';?>

<script type="text/javascript">
//$(".modal-dialog").hide();
function load_marks(id)
{
    $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/news/getmarks');?>",
                data: "id="+id,
                success: function (response) {
                  // alert(response);
                $(".displaycontent").html(response);
                  
                }
            });
}
</script>
