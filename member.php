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
                    <div class="row">
                             <a href="member_print.php" target="_blank" style="background:none;">
                            <button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print All Members List</button>
                            </a>
                      
                    
                        
							<a href="add_member.php" style="background:none;">
							<button class="btn btn-primary btn-outline pull-right"><i class="fa fa-plus"></i> Add Member</button>
							</a>
						
                            
                       
                        
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
								<form method="post" action="member_search.php">
                        			<div class="col-md-3">
                                        <select name="roll_number" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Search Member</option>
										<?php
										$result= mysqli_query($con,"select * from user") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['user_id'];
										?>
                                            <option value="<?php echo $row['roll_number']; ?>"><?php echo $row['roll_number']; ?> - <?php echo $row['firstname']; ?></option>
										<?php } ?>
                                        </select>  
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-log-in"></i> Submit</button>
						</form>

						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>