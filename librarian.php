<?php include ('header.php');
?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Librarian Profile
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Librarian Information</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Image</th>
									<th>Full Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from admin where admin_type<>'Admin' order by admin_id ASC") or die (mysqli_error($con));
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['admin_id'];
							?>
							<tr>
								<td>
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
									<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>	
								</td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_librarian.php<?php echo '?admin_id='.$id; ?>">
										<i class="fa fa-search"></i>
									</a>

          <!--
									<?php if ($_SESSION['id'] == $id) { ?>
									<a class="btn btn-warning" for="ViewAdmin" href="edit_librarian.php<?php echo '?admin_id='.$id; ?>">
										<i class="fa fa-edit"></i>
									</a> <?php } 
									 ?>

		-->
								</td> 
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>