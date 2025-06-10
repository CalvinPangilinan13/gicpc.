<!-- <div class="modal fade" tabindex="-1" id="aboutModal" role="dialog"> -->
<div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         <h4 class="modal-title">👥 About Us Details</h4>
      </div>
      <div class="modal-body">
         <table class="table table-striped">
            <tbody>
               <tr>
                  <td>Title</td>
                  <td><?php echo $data->title; ?></td>
               </tr>
               <tr>
                  <td>Subtitle</td>
                  <td><?php echo $data->subtitle; ?></td>
               </tr>
               <tr>
                  <td>Founder</td>
                  <td><?php echo $data->founder_name; ?></td>
               </tr>
               <tr>
                  <td>Founded Date</td>
                  <td><?php echo date('F d, Y', strtotime($data->founded_date)); ?></td>
               </tr>
               <tr>
                  <td>Image</td>
                  <td>
                     <?php if (!empty($data->image_url)): ?>
                        <img src="<?php echo base_url('uploads/files/' . $data->image_url); ?>" style="width: 100%; max-height: 300px; object-fit: cover;">
                     <?php else: ?>
                        <span class="text-muted">No image available</span>
                     <?php endif; ?>
                  </td>
               </tr>
               <tr>
                  <td>Content</td>
                  <td><?php echo $data->content; ?></td>
               </tr>
               <tr>
                  <td>Vision</td>
                  <td><?php echo $data->vision; ?></td>
               </tr>
               <tr>
                  <td>Mission</td>
                  <td><?php echo $data->mission; ?></td>
               </tr>
               <tr>
                  <td>Location</td>
                  <td><?php echo $data->location; ?></td>
               </tr>
               <tr>
                  <td>Contact Email</td>
                  <td><?php echo $data->contact_email; ?></td>
               </tr>
               <tr>
                  <td>Social Links</td>
                  <td><pre><?php echo $data->social_links; ?></pre></td>
               </tr>
               <tr>
                  <td>Status</td>
                  <td>
                     <span class="badge badge-<?php echo $data->status == 'Active' ? 'success' : 'danger'; ?>">
                        <?php echo $data->status; ?>
                     </span>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
