<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Members</small> / Member Profile
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Individual Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="member.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
							</a>
							</li>
                          
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead>
								<tr>
						
									<th>Full Name</th>
									<th>Gender</th>
									<th>Member Type</th>
									<th>Branch</th>
									<th>Contact</th>
									<th>Address</th>
									<th>Date Added</th>
								</tr>
							</thead>
							<tbody>
<?php
			   
		if (isset($_GET['user_id']))
		$id=$_GET['user_id'];
		$result1 = mysqli_query($con,"SELECT * FROM user WHERE user_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
					
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
								<td><?php echo $row['gender']; ?></td> 
								<td><?php echo $row['type']; ?></td> 
								<td><?php echo $row['branch']; ?></td>
								<td><?php echo $row['contact']; ?></td> 
								<td><?php echo $row['address']; ?></td> 
								<td><?php echo date("M d, Y h:m:s a", strtotime($row['user_added'])); ?></td>
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