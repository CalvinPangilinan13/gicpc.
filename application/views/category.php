
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GICPC UPDATES</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url('assets/css/styles.css');?>" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
   <?php include APPPATH.'views/includes/header.php';?>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
           
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
					<?php
					if(count($getwebsitedetailscategory)):
                  $cnt=1;
                  foreach($getwebsitedetailscategory as $row):
                  ?>
                    <div class="card mb-4">
                        <a href="#!"><img height="300" src="<?php echo base_url('uploads/files/'. $row->Upload_Image);?>" alt="..." width="100%" /></a>
						
                        <div class="card-body">
							<?php 
							$input= $row->create_date;
							$date = strtotime($input);
							
							?>
                            <div class="small text-muted"><?php echo date('M d, Y', $date);?></div>
                            <h2 class="card-title"><?php  echo $row->newtitle;?></h2>
                            <p class="card-text"><?php echo substr($row->Description,0,200);?></p>
                            <?php echo anchor("Welcome/post/{$row->id}",'Read more →'); ?>
                        </div>
                    </div>
					<?php 
                    $cnt=$cnt+1;
                    endforeach;
                    else:
                    ?>
                    <tr>
                    <td colspan="5" style="color:red; text-align:center">No Record found</td>
                    </tr>
                    <?php endif;?>
					
                    <!-- Nested row for non-featured blog posts-->
                    
                    <!-- Pagination-->
                   
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header" >Search</div>
                        <div class="card-body">
                        <?php echo form_open('Search/index',['class'=>'php-email-form']);?>
                        
                        <div class="input-group">
                            <input class="form-control" type="text" name="searchdata" id="searchdata" placeholder="Enter search term..."
                             aria-label="Enter search term..." aria-describedby="button-search" />
                             <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Go!">
                            <!-- <button class="btn btn-primary" id="button-search" type="button">Go!</button> -->
                        </div>
                </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                            <?php
                  if(count($category)):
                  $cnt=1;
                  foreach($category as $row):
                  ?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                    <?php $cat= $row->name;?>
                                    <li> <?php echo anchor("Category/index/{$row->id}",$cat); ?></li>
                                    </ul>
                                </div>
                                <?php 
                    $cnt=$cnt+1;
                    endforeach;
                    else:
                    ?>
                    <tr>
                    <td colspan="5" style="color:red; text-align:center">No Record found</td>
                    </tr>
                    <?php endif;?>
  
                            </div>
                        </div>
                    </div>

                  
                                 <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Recent News</div>

                        <div class="card-body">
                        <?php
					if(count($resentlypost)):
                  $cnt=1;
                  foreach($resentlypost as $row):
                  ?>
                            <ul>
                                
                                <?php  $shiv= $row->newtitle;?>

                                <li><?php echo anchor("Welcome/post/{$row->id}",$shiv); ?></li>
                            
                            </ul>
                            <?php 
                    $cnt=$cnt+1;
                    endforeach;
                    else:
                    ?>
                    <tr>
                    <td colspan="5" style="color:red; text-align:center">No Record found</td>
                    </tr>
                    <?php endif;?>
                             </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
     <?php include APPPATH.'views/includes/footer.php';?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('assets/js/scripts.js');?>"></script>
    </body>
</html>
