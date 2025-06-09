<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>TBTayo! | Manage Blog</title>
   <link rel="icon" href="<?php echo base_url('assets/images/head.png.png'); ?>" type="image/png">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css') ?>">

   <style>
      table th,
      table td {
         vertical-align: middle !important;
         text-align: center;
      }

      .table-hover tbody tr:hover {
         background-color: #f2f6fc;
      }

      .main-header h4 {
         font-weight: 600;
         font-size: 1.5rem;
      }

      .modal-content {
         border-radius: 12px;
         overflow: hidden;
      }

      .btn-outline-primary:hover {
         background-color: #007bff;
         color: white;
      }

      .badge-status {
         font-size: 0.9rem;
         padding: 0.4em 0.8em;
      }
   </style>
</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <?php include APPPATH . 'views/admin/include/header.php'; ?>
      <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

      <div class="content-wrapper">
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>✍️ Manage Blog Post</h4>
               </div>
            </div>

            <div class="row">
               <div class="col-sm-12">
                  <div class="card shadow-sm">
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <?php if ($this->session->flashdata('success')): ?>
                                 <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                 </div>
                              <?php endif; ?>

                              <table class="table table-bordered table-hover table-striped align-middle">
                                 <thead class="bg-primary text-white">
                                    <tr>
                                       <th>ID</th>
                                       <th>Title</th>
                                       <th>Category</th>
                                       <th>Sub Category</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if (count($viewdetails)):
                                       $cnt = 1;
                                       foreach ($viewdetails as $row): ?>
                                          <tr>
                                             <td><?php echo $cnt++; ?></td>
                                             <td class="text-start">📝 <?php echo $row->newtitle; ?></td>
                                             <td><?php echo $row->category; ?></td>
                                             <td><?php echo $row->subcategory; ?></td>
                                             <td>
                                                <a href="<?php echo site_url("admin/News/delete/{$row->id}"); ?>"
                                                   class="btn btn-sm btn-outline-danger">🗑️ Delete</a>
                                                <a href="<?php echo site_url("admin/News/editdata/{$row->id}"); ?>"
                                                   class="btn btn-sm btn-outline-warning">✏️ Edit</a>
                                                <button class="btn btn-sm btn-outline-info" data-toggle="modal"
                                                   data-target="#myModal" onclick="load_marks(<?php echo $row->id; ?>)">👁️
                                                   View</button>
                                             </td>
                                          </tr>
                                       <?php endforeach;
                                    else: ?>
                                       <tr>
                                          <td colspan="5" class="text-danger text-center">No Record found</td>
                                       </tr>
                                    <?php endif; ?>
                                 </tbody>
                              </table>

                              <nav aria-label="Pagination">
                                 <hr class="my-0" />
                                 <div class="d-flex justify-content-center">
                                    <?php echo $links; ?>
                                 </div>
                              </nav>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade displaycontent" id="myModal">
      <?php include APPPATH . 'views/admin/modal.php'; ?>
   </div>

   <!-- Required Scripts -->
   <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>

   <script>
      function load_marks(id) {
         $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/news/getmarks'); ?>",
            data: { id: id },
            success: function (response) {
               $(".displaycontent").html(response);
            }
         });
      }
   </script>
</body>

</html>