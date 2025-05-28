<!DOCTYPE html>
<html lang="en">
<head>
   <title>News Portal | Category</title>

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
                  <h4>Category</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
           <div class="row">
                  <!--Inline Form starts-->
                  <div class="col-lg-6 inline-forms">
                     <div class="card">
                        <div class="card-block">
                        <form id="contactForm">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>Add Category</label>
                                            <input class="form-control" type="text" name="name" id="name" placeholder="Add Category" autocomplete="">
                                         </div>
                                   
                                   <div class="col-sm-4 form-group">
                                         <button type="submit" class="btn btn-primary" id="butsave">Submit</button>
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


</body>
</html>

<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		var name = $('#name').val();
		if(name!=""){
			$("#butsave").attr("disabled", "disabled");
			$.ajax({
				url: "<?php echo base_url("admin/Category/savedata");?>",
				type: "POST",
				data: {
					type: 1,
					name: name
					
				},
				cache: false,
				success: function(dataResult){
              
					var dataResult = JSON.parse(dataResult);
               $('#contactForm').trigger('reset');
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>