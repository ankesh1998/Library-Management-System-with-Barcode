<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Books
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
							<a href="book_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books List</button>
							</a>
							<a href="print_barcode_book.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books Barcode</button>
							</a>
							<br />
							<br />
                    <div class="x_title">
                        <h2><i class="fa fa-book"></i> Book List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="add_book.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Book</button>
							</a>
							</li>
                        </ul>
                        <div class="clearfix"></div>
							<ul class="nav nav-pills">
								<li role="presentation" class="active"><a href="book.php">All</a></li>
								<li role="presentation"><a href="lost_books.php">Lost Books</a></li>
							</ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                        <div class="row">
                        	
                        		<form method="post" action="">
                        			<div class="col-md-2">
                                        <select name="book_title" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select Title</option>
										<?php
										$result= mysqli_query($con,"select distinct book_title from book") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['book_id'];
										?>
                                            <option value="<?php echo $row['book_title']; ?>"><?php echo $row['book_title']; ?></option>
										<?php } ?>
                                        </select>  
                                    </div>
              <!--
                                    <div class="col-md-2" style="margin-left: 5px">

                                         <select name="category" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select category</option>
										<?php
										$result= mysqli_query($con,"select distinct category from book") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['book_id'];
										?>
                                            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
										<?php } ?>
                                        </select>  
                                    </div>

                                     <div class="col-md-2" style="margin-left: 5px">

                                         <select name="author" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select author</option>
										<?php
										$result= mysqli_query($con,"select distinct author from book") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['book_id'];
										?>
                                            <option value="<?php echo $row['author']; ?>"><?php echo $row['author']; ?></option>
										<?php } ?>
                                        </select>  
                                    </div>

-->
                                     <div class="col-md-2" style="margin-left: 5px">

                                         <select name="book_pub" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select Publisher</option>
										<?php
										$result= mysqli_query($con,"select distinct book_pub from book") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['book_id'];
										?>
                                            <option value="<?php echo $row['book_pub']; ?>"><?php echo $row['book_pub']; ?></option>
										<?php } ?>
                                        </select>  
                                    </div>
							
										<button name="submit" type="submit" class="btn btn-primary" style=""><i class="glyphicon glyphicon-log-in"></i> Submit</button>
								</form>
                        	
                        </div>
                        
						<?php
                        $book_title = $_POST['book_title'];
						//		$category = $_POST['category'];
						//		$author = $_POST['author'];
						$book_pub = $_POST['book_pub'];
                    	$result= mysqli_query($con,"SELECT COUNT(book_id) AS total from book where book_title='$book_title' AND book_pub='$book_pub' ") OR die (mysqli_error($con));
                    	$row=mysqli_fetch_assoc($result);
                    	$count=$row['total'];
                    	echo "<span style='color:red;font-size:16px;font-weight:bold;Times New Roman, Times, serif';>Total Numbers of Book is = ".$count."</span";
                        ?>
                        <br><br><br>


                        <!-- Showing Search Result of books -->
                        <div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Title</th>
									<th>Authors</th>
									<th>Publisher</th>
									<th>Category</th>
									<th>Status</th>
									<th>Remarks</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
<?php 
								$_SESSION['book_title'] = $_POST['book_title'];
							//	$_SESSION['category'] = $_POST['category'];
							//	$_SESSION['author'] = $_POST['author'];
								$_SESSION['book_pub'] = $_POST['book_pub'];
?>
								
							
							<?php
									
							$result= mysqli_query($con,"SELECT * from book where book_title='$book_title' AND book_pub='$book_pub' order by book_id DESC ") OR die (mysqli_error($con));
						

							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['book_id'];
							?>
							<tr>
								<td><a target="_blank" href="print_barcode_individual.php?code=<?php echo $row['book_barcode']; ?>"><?php echo $row['book_barcode']; ?></a></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['book_title']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']."<br />".$row['author_2']."<br />".$row['author_3']."<br />".$row['author_4']."<br />".$row['author_5']; ?></td>
								<td><?php echo $row['book_pub']; ?></td> 
								<td><?php echo $row['category']; ?></td> 
								<td><?php echo $row['status']; ?></td> 
								<td><?php echo $row['remarks']; ?></td> 
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_book.php<?php echo '?book_id='.$id; ?>">
										<i class="fa fa-search"></i>
									</a>
								
									<a class="btn btn-warning" for="ViewAdmin" href="edit_book.php<?php echo '?book_id='.$id; ?>">
									<i class="fa fa-edit"></i>
									</a>
									<?php
									$user_query=mysqli_query($con,"select *  from admin where admin_id='$id_session'")or die(mysqli_error($con));
										$row=mysqli_fetch_array($user_query);


									if($row['admin_type']=='Admin') { ?>
									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
										<i class="glyphicon glyphicon-trash icon-white"></i>
									</a>
									<?php } ?>
			
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
												<a href="delete_book.php<?php echo '?book_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
										</div>
										</div>
									</div>
									</div>
								</td> 
							</tr>
							<?php  }?>
							</tbody>
							</table>
						</div>
						
                        <!-- books end -->

						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>