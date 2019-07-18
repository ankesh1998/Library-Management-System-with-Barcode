                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left:276px; float:left;">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Allowable <small>days</small></h2>
                                 
                                    <div class="clearfix"></div>
                                </div>	
<?php //	include ('add_modal_example_3.php'); ?>
                                <div class="x_content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No. of Day/Days</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
							<?php
							$penalty_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysql_error());
							while ($row33= mysqli_fetch_array ($penalty_query) ){
							$allowed_days_id=$row33['allowed_days_id'];
							?>
                                            <tr>
                                                <td><?php echo $row33['no_of_days']; ?></td>
                                                <td>
													<a class="btn btn-primary" for="ViewAdmin" href="#days_edit<?php echo $allowed_days_id; ?>" data-toggle="modal" data-target="#days_edit<?php echo $allowed_days_id;?>">
														<i class="fa fa-edit"></i> Edit
													</a>
												</td>
									<!-- edit modal -->
									<div class="modal fade" id="days_edit<?php  echo $allowed_days_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Edit</h4>
										</div>
										<div class="modal-body">
												<?php
												$query2=mysqli_query($con,"select * from allowed_days where allowed_days_id='$allowed_days_id'")or die(mysql_error());
												$row44=mysqli_fetch_array($query2);
												?>
												<form method="post" enctype="multipart/form-data" class="form-horizontal">
													<div class="form-group" style="margin-left:170px;">
														<label class="control-label col-md-4" for="first-name">Day/Days <span class="required">*</span>
														</label>
														<div class="col-md-3">
															<input type="number" min="0" max="100" step="1" name="no_of_days" value="<?php echo $row44['no_of_days']; ?>" id="first-name2" class="form-control">
														</div>
													</div>
													<div class="modal-footer" style="margin-top:50px;">
													<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
													<button type="submit" style="margin-bottom:5px;" name="update" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
													</div>
												</form>
												
												<?php
													if (isset($_POST['update'])) {
													
													$no_of_days1 = $_POST['no_of_days'];
													
													{
														mysqli_query (" UPDATE allowed_days SET no_of_days='$no_of_days1' ") or die (mysql_error());
													}
													{
														echo "<script>alert('Edit Successfully!'); window.location='settings.php'</script>";
													}
														
													}
												?>
												
										</div>
										</div>
									</div>
									</div>
												
                                            </tr>
							<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
								
                            </div>
                        </div>