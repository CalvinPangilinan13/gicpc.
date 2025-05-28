<!-- <div class="modal fade" tabindex="-1" id="myModal" role="dialog"> -->
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">News Datails of </h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
        <tbody>
          
               
            <tr>
              <td>Title</td>
              <td><?php echo $data->newtitle; ?></td>
            </tr>
            <tr>
              <td>Category</td>
              <td><?php echo $data->category; ?></td>
            </tr>
            <tr>
              <td>SubCategory</td>
              <td><?php echo $data->subcategory; ?></td>
            </tr>
            <tr>
              <td>Image</td>
              <td><img src="<?php echo base_url('uploads/files/'. $data->Upload_Image);?>" style="width: 750px; height: 300px;"></td>
            </tr>
            <tr>
              <td>Description</td>
              <td><?php echo $data->Description; ?></td>
            </tr>
            
        </tbody>
    </table>
      </div>
    </div>
  </div>
</div>