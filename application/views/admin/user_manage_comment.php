<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>TBTayo! | Manage User Comment</title>
   <link rel="icon" href="<?php echo base_url('assets/images/lakbay.png.png'); ?>" type="image/png">
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
   <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css'); ?>">

   <style>
      table th,
      table td {
         vertical-align: middle !important;
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
   </style>
</head>

<body class="sidebar-mini fixed">
   <div class="wrapper">
      <!-- Navbar-->
      <?php include APPPATH . 'views/admin/include/header.php'; ?>
      <!-- Side-Nav-->
      <?php include APPPATH . 'views/admin/include/sidebar.php'; ?>

      <div class="content-wrapper">
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>🗨️ Manage Blogs Comment</h4>
               </div>
            </div>

            <div class="row">
               <div class="col-sm-12">
                  <div class="card shadow-sm">
                     <div class="card-block">
                        <div class="row">
                           <div class="col-sm-12 table-responsive">
                              <table class="table table-bordered table-hover table-striped align-middle text-center">
                                 <thead class="bg-primary text-white">
                                    <tr>
                                       <th>#</th>
                                       <th>Post ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>User Comment</th>
                                       <th>Status</th>
                                       <th>Reply</th>
                                       <th>Post ID Ref</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if (count($managecomment)):
                                       $cnt = 1;
                                       foreach ($managecomment as $row): ?>
                                          <tr>
                                             <td><?php echo $cnt++; ?></td>
                                             <td><?php echo $row->postid; ?></td>
                                             <td><?php echo $row->name; ?></td>
                                             <td><?php echo $row->emailid; ?></td>
                                             <td class="text-start"><?php echo $row->comment; ?></td>
                                             <td>
                                                <?php if ($row->status == '1'): ?>
                                                   <span class="badge bg-success">🔓</span>
                                                <?php else: ?>
                                                   <span class="badge bg-danger">🔐</span>
                                                <?php endif; ?>
                                             </td>
                                             <td><?php echo $row->reply; ?></td>
                                             <td><?php echo $row->postid; ?></td>
                                             <td>
                                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                   data-target="#myModal" data-id="<?php echo $row->id; ?>"
                                                   data-reply="<?php echo htmlspecialchars($row->reply ?? '', ENT_QUOTES); ?>">
                                                   👁️ View
                                                </button>
                                             </td>
                                          </tr>
                                       <?php endforeach;
                                    else: ?>
                                       <tr>
                                          <td colspan="8" class="text-danger text-center">No Record found</td>
                                       </tr>
                                    <?php endif; ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg">
               <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="commentModalLabel">📝 Comment Action</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>

               <div class="modal-body">
                  <?php echo form_open_multipart('admin/Usercomment/commetApproved'); ?>

                  <div class="form-group mb-3">
                     <label for="status" class="form-label">🔒 Status:</label>
                     <select name="status" id="status" class="form-control">
                        <option value="1">✅ Publish</option>
                        <option value="0">❌ Not Approved</option>
                     </select>
                     <input type="hidden" name="comment_id" id="modal_comment_id">
                  </div>

                  <div class="form-group mb-3">
                     <label for="reply" class="form-label">💬 Reply:</label>
                     <textarea name="reply" id="reply" class="form-control" rows="4"
                        placeholder="Write your response..."></textarea>
                  </div>

                  <div class="text-end">
                     <button type="submit" class="btn btn-success">✔️ Submit</button>
                  </div>

                  </form>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

   </div>

   <!-- Required JS -->
   <script src="<?php echo base_url('assets/plugins/Jquery/dist/jquery.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/tether/dist/js/tether.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/main.min.js'); ?>"></script>
   <script src="<?php echo base_url('assets/js/menu.min.js'); ?>"></script>

   <!-- Modal Logic -->
   <script>
      $('#myModal').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget);
         var commentId = button.data('id');
         var reply = button.data('reply');
         $('#modal_comment_id').val(commentId);
         $('#reply').val(reply);
      });
   </script>
</body>
<?php include APPPATH . 'views/admin/include/footer.php'; ?>

</html>