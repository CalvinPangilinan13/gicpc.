<!DOCTYPE html>
<html lang="en">
<head>
   <title>News Portal | Manage User Comment</title>

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
                  <h4>Manage User Comment</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
           <div class="row">
               <div class="col-sm-12">
                
                 
                  <div class="card">
                  
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>PostID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>UserComment</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php
                  if(count($managecomment)):
                  $cnt=1;
                  foreach($managecomment as $row):
                  ?>
                  <?php $dd= $row->postid;?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php echo $row->postid;?></td>
                  <td><?php  echo $row->name;?></td>
                  <td><?php  echo $row->emailid;?></td>
                  <td><?php  echo $row->comment;?></td>
                  <td>
                     <?php  
                     $status=$row->status;
                     if($status=='1'){
                       echo '<button type="button" class="btn btn-success">Approved</button>';
                     }
                     else{
                        echo '<button type="button" class="btn btn-danger">UnApproved</button>';

                     }
                     
                     ?>
                  
                  </td>
               <td>
            <!-- <button class="btn btn-primary>View</button> --> 
            <!-- <li><a  data-toggle="modal" data-target="#myModal<?php echo $row->id;?>" href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a></li> -->
            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
            <td><?php $dd= $row->postid;?></td>
            <td><a data-toggle="modal" data-target="#myModal" 
                  onclick="javascript:load_marks(<?php echo $row->postid; ?>)"><button class="btn btn-primary">View</button></a>
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
                 
               </div>
            </div>
         
      </div>
   </div>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Comment Action</h4>
        </div>
        <div class="modal-body">
        <?php echo form_open_multipart('admin/Usercomment/commetApproved');?>
    <div class="form-group">
      <label for="email">Status:</label>
      <select name="status" id="status" class="form-control">
         <option value="1">Approved</option>
         <option value="0">UnApproved</option>

      </select>
      <input type="hidden" name="postid" value="<?php echo $dd; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Replay:</label>
  <textarea name="replay" id="replay" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
