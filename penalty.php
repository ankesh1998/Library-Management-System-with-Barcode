                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Penalty <small>per day</small></h2>
                                   
                                    <div class="clearfix"></div>
                                </div>
<?php // 	include ('add_modal_example_2.php'); ?>

                                <div class="x_content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Amount (Rs.)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
							<?php
							$penalty_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysql_error());
							while ($row33= mysqli_fetch_array ($penalty_query) ){
							$penalty_id=$row33['penalty_id'];
							?>
                                            <tr>
                                                <td><?php echo $row33['penalty_amount']."".'.00'; ?></td>
                                                <td>
													<a class="btn btn-primary" for="ViewAdmin" href="#penalty_edit<?php echo $penalty_id; ?>" data-toggle="modal" data-target="#penalty_edit<?php echo $penalty_id;?>">
														<i class="fa fa-edit"></i> Edit
													</a>
												</td>
									<!-- edit modal -->
									<div class="modal fade" id="penalty_edit<?php  echo $penalty_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Edit</h4>
										</div>
										<div class="modal-body">
												<?php
												$query2=mysqli_query($con,"select * from penalty where penalty_id='$penalty_id'")or die(mysql_error());
												$row44=mysqli_fetch_array($query2);
												?>
												<form method="post" enctype="multipart/form-data" class="form-horizontal">
													<div class="form-group" style="margin-left:170px;">
														<label class="control-label col-md-4" for="first-name">Amount <span class="required">*</span>
														</label>
														<div class="col-md-3">
															<input type="number" min="0" max="100" step="1" name="penalty_amount" value="<?php echo $row44['penalty_amount']; ?>" id="first-name2" class="form-control">
														</div>
													</div>
													<div class="modal-footer" style="margin-top:50px;">
													<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
													<button type="submit" style="margin-bottom:5px;" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
													</div>
												</form>
												
												<?php
													if (isset($_POST['submit'])) {
													
													$penalty_amount1 = $_POST['penalty_amount'];
													
													{
														mysqli_query ($con," UPDATE penalty SET penalty_amount='$penalty_amount1' ") or die (mysqli_error());
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