                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Allowed Books <small>per User</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
<?php	// 	include ('add_modal_example.php'); ?>
                                <div class="x_content">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
							<?php
							$allowed_book_query= mysqli_query($con,"select * from allowed_book order by allowed_book_id DESC ") or die (mysql_error());
							while ($row11= mysqli_fetch_array ($allowed_book_query) ){
							$id=$row11['allowed_book_id'];
							?>
                                            <tr>
                                                <td><?php echo $row11['qntty_books']; ?></td>
                                                <td>
													<a class="btn btn-primary" for="ViewAdmin" href="#edit<?php echo $id; ?>" data-toggle="modal" data-target="#edit<?php echo $id;?>">
														<i class="fa fa-edit"></i> Edit
													</a>
													
												</td>
									<!-- edit modal -->
									<div class="modal fade" id="edit<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Edit</h4>
										</div>
										<div class="modal-body">
												<?php
												$query1=mysqli_query($con,"select * from allowed_book where allowed_book_id='$id'")or die(mysql_error());
												$row22=mysqli_fetch_array($query1);
												?>
												<form method="post" enctype="multipart/form-data" class="form-horizontal">
													<div class="form-group" style="margin-left:170px;">
														<label class="control-label col-md-4" for="first-name">Quantity <span class="required">*</span>
														</label>
														<div class="col-md-3">
															<input type="number" min="0" max="100" step="1" name="qntty_books" value="<?php echo $row22['qntty_books']; ?>" id="first-name2" class="form-control">
														</div>
													</div>
													<div class="modal-footer" style="margin-top:50px;">
													<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
													<button type="submit" style="margin-bottom:5px;" name="update1" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
													</div>
												</form>
												
												<?php
													if (isset($_POST['update1'])) {
													
													$qntty_books = $_POST['qntty_books'];
													
													{
														mysqli_query ($con," UPDATE allowed_book SET qntty_books='$qntty_books' ") or die (mysql_error());
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