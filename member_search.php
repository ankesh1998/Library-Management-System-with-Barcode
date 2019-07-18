<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home/ </small>Members
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
							<a href="member_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print All Members List</button>
							</a>
						
							<br />
							<br />
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Members Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="add_member.php" style="background:none;">
							<button class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Add Member</button>
							</a>
							</li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Roll number / ID</th>
									<th>Member Full Name</th>
							<!--		<th>Gender</th>  -->
									<th>Member Type</th>
									<th>Branch</th>
									<th>Contact</th>
									<th>Address</th>
									<th>Member Added</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
<?php 
								 $roll_number = $_POST['roll_number'];
								
?>
							
							<?php

							$result= mysqli_query($con,"SELECT * from user where roll_number='$roll_number'") OR die (mysqli_error($con));
						
							$row= mysqli_fetch_array ($result);
							$id=$row['user_id'];
							?>
							<tr>
				
								<td><?php echo $row['roll_number']; ?></td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td> 
						<!--	<td><?php echo $row['gender']; ?></td>     -->
								<td><?php echo $row['type']; ?></td> 
								<td><?php echo $row['branch']; ?></td> 
								<td><?php echo $row['contact']; ?></td> 
								<td><?php echo $row['address']; ?></td> 
								<td><?php echo $row['user_added']; ?></td> 
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_member.php<?php echo '?user_id='.$id; ?>">
										<i class="fa fa-search"></i>
									</a>
									<?php
										include('include/dbcon.php');
										$user_query=mysqli_query($con,"select *  from admin where admin_id='$id_session'")or die(mysqli_error($con));
										$row=mysqli_fetch_array($user_query); {
									?>
									<?php if($row['admin_type']=='Admin') { ?>
									<a class="btn btn-warning" href="edit_member.php<?php echo '?user_id='.$id; ?>">
									<i class="fa fa-edit"></i>
									</a>
									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
										<i class="glyphicon glyphicon-trash icon-white"></i>
									</a>
									<?php } ?><?php } ?>
									<!-- delete modal user -->
									<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> User</h4>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
													Are you sure you want to delete?
												</div>
												<div class="modal-footer">
												<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
												<a href="delete_member.php<?php echo '?user_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
										</div>
										</div>
									</div>
									</div>
								</td> 
							</tr>
							
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>