<?php include ('header.php'); ?>
<?php 
	$roll_number = $_GET['roll_number'];
	
	$user_query = mysqli_query($con,"SELECT * FROM user WHERE roll_number = '$roll_number' ");
	$user_row = mysqli_fetch_array($user_query);
?>
        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Borrow Book
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
					
					<?php
						$sql = mysqli_query($con,"SELECT * FROM user WHERE roll_number = '$roll_number' ");
						$row = mysqli_fetch_array($sql);
					?>
					<h2>
					Borrower Name : <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span>
					</h2>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
						
						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Title</th>
									<th>Author</th>
									<th>ISBN</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Penalty</th>
									<th>Action</th>
							<?php 
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysqli_error($con));
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$due_date= $borrow_row['due_date'];
								
								$timezone = "Asia/Manila";
								if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
								$cur_date = date("Y-m-d H:i:s");
								$date_returned = date("Y-m-d H:i:s");
								//$due_date = strtotime($cur_date);
								//$due_date = strtotime("+3 day", $due_date);
								//$due_date = date('F j, Y g:i a', $due_date);
								///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
								
									$penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error($con));
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
							?>
								</tr>
							</thead>
							<tbody>
							
							<tr>
								
								<td><?php echo $borrow_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['book_title']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['author']; ?></td>
								<td><?php echo $borrow_row['isbn']; ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
								<td><?php echo date('M d, Y h:m:s a',strtotime($borrow_row['due_date']));?></td>
								<td><?php echo $penalty; ?></td>	
								<td>


								<form method="post" action="">
								<input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10"  />
								<input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
								<input type="hidden" name="borrow_book_id" value="<?php echo $borrow_row['borrow_book_id']; ?>">
								<input type="hidden" name="book_id" value="<?php echo $borrow_row['book_id']; ?>">
								<input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
								<input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
								<button name="return" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Return</button>
								</form>
								</td>
								
							</tr>
							
							<?php 
							}
							if ($borrow_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No books borrowed</td>
										</tr>
									</table>
								';
							} 							
							?>
							<?php
								if (isset($_POST['return'])) {
									$user_id= $_POST['user_id'];
									$borrow_book_id= $_POST['borrow_book_id'];
									$book_id= $_POST['book_id'];
									$date_borrowed= $_POST['date_borrowed'];
									$due_date= $_POST['due_date'];
									$date_returned_now = $_POST['date_returned'];

									
									mysqli_query($con,"UPDATE book SET remarks = 'Available' where book_id = '$book_id' ") or die (mysqli_error($con));
								
									
									mysqli_query ($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error($con));
									
									mysqli_query ($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error($con));
									
									$report_history1=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysqli_error($con));
									$report_history_row1=mysqli_fetch_array($report_history1);
									$admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];	
									
									mysqli_query($con,"INSERT INTO report 
									(book_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error($con));
									
							?>
									<script>
										window.location="borrow_book.php?roll_number=<?php echo $roll_number ?>";
									</script>
							<?php 
																}
							?>
							
							</tbody>
							</table>
						</div>
						
						<div class="row" style="margin-top: 50px">
							<div class="col-md-3">
							<form method="post" action="">
                                        <select name="book_barcode" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Enter Book Barcode</option>
										<?php
										$result= mysqli_query($con,"select distinct book_barcode,book_title from book") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['book_id'];
										?>
                                            <option value="<?php echo $row['book_barcode']; ?>"><?php echo $row['book_barcode'];?> - <?php echo $row['book_title']; ?></option>
										<?php } ?>
                                        </select>
                            </div>
		
							<div>	
								<button name="submit" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-log-in" ></i> Submit</button>
							</div>
					
					
							</form>
						</div>
					<br>
						<table class="table table-bordered">
							<form method="post" action="">
							<th style="width:100px;">Book Image</th>
							<th>Barcode</th>
							<th>Title</th>
							<th>Author</th>
							<th>ISBN</th>
							<th>Status</th>
							<th>Action</th>
							<?php 
								if (isset($_POST['submit'])){
									$book_barcode = $_POST['book_barcode'];
									
									$book_query = mysqli_query($con,"SELECT * FROM book WHERE book_barcode = '$book_barcode' ") or die (mysqli_error($con));
							//		$book_count = mysqli_num_rows($book_query);
									$book_row = mysqli_fetch_array($book_query);
									
									if ($book_row['book_barcode'] != $book_barcode){
										echo '
											<table>
												<tr>
													<td class="alert alert-info">No match for the book_barcode entered!</td>
												</tr>
											</table>
										';
									} elseif ($book_barcode == '') {
										echo '
											<table>
												<tr>
													<td class="alert alert-info">Enter the correct details!</td>
												</tr>
											</table>
										';
									}else{
							?>
							<tr>
							<input type="hidden" name="user_id" value="<?php echo $user_row['user_id'] ?>">
							<input type="hidden" name="book_id" value="<?php echo $book_row['book_id'] ?>">

							<td>
							<?php if($book_row['book_image'] != ""): ?>
							<img src="upload/<?php echo $book_row['book_image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
							<?php else: ?>
							<img src="images/book_image.jpg" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
							<?php endif; ?>
							</td> 
							<td><?php echo $book_row['book_barcode'] ?></td>
							<td style="text-transform: capitalize"><?php echo $book_row['book_title'] ?></td>
							<td style="text-transform: capitalize"><?php echo $book_row['author'] ?></td>
							<td><?php echo $book_row['isbn'] ?></td>
							<td><?php echo $book_row['status'] ?></td>
							<td><button name="borrow" class="btn btn-info"><i class="fa fa-check"></i> Borrow</button></td>
							</tr>
							<?php } }?>

							<?php
							
							$allowable_days_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysqli_error($con));
							$allowable_days_row = mysqli_fetch_assoc($allowable_days_query);
							
							$timezone = "Asia/Manila";
							if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
							$cur_date = date("Y-m-d H:i:s");
							$date_borrowed = date("Y-m-d H:i:s");
							$due_date = strtotime($cur_date);
							$due_date = strtotime("+".$allowable_days_row['no_of_days']." day", $due_date);
							$due_date = date('Y-m-d H:i:s', $due_date);
							///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
							?>
							<input type="hidden" name="due_date" class="new_text" id="sd" value="<?php echo $due_date ?>" size="16" maxlength="10"  />
							<input type="hidden" name="date_borrowed" class="new_text" id="sd" value="<?php echo $date_borrowed ?>" size="16" maxlength="10"  />
							
							<?php 
								if (isset($_POST['borrow'])){
									$user_id =$_POST['user_id'];
									$book_id =$_POST['book_id'];
									$date_borrowed =$_POST['date_borrowed'];
									$due_date =$_POST['due_date'];

									
									
									$trapBookCount= mysqli_query ($con,"SELECT count(*) as books_allowed from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed'") or die (mysqli_error($con));
									
									$countBorrowed = mysqli_fetch_assoc($trapBookCount);
									
									$bookCountQuery= mysqli_query ($con,"SELECT count(*) as book_count from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed' and book_id = $book_id") or die (mysqli_error($con));
									
									$bookCount = mysqli_fetch_assoc($bookCountQuery);
									
									$allowed_book_query= mysqli_query($con,"select * from allowed_book order by allowed_book_id DESC ") or die (mysqli_error($con));
									$allowed = mysqli_fetch_assoc($allowed_book_query);
									$result2= mysqli_query ($con,"SELECT status from book where book_id = $book_id") or die (mysqli_error($con));
									
									$bookStatus2 = mysqli_fetch_array($result2);
									$result= mysqli_query ($con,"SELECT remarks from book where book_id = $book_id") or die (mysqli_error($con));
									
									$bookStatus = mysqli_fetch_array($result);
									
									
									if ($countBorrowed['books_allowed'] == $allowed['qntty_books']){
										echo "<script>alert(' ".$allowed['qntty_books']." ".'Books Allowed per User!'." '); window.location='borrow_book.php?roll_number=".$roll_number."'</script>";
									}elseif ($bookCount['book_count'] == 1){
										echo "<script>alert('Book Already Borrowed!'); window.location='borrow_book.php?roll_number=".$roll_number."'</script>";
									}elseif ($bookStatus2['status'] == "Lost"){
										echo "<script>alert('This book is LOST!'); window.location='borrow_book.php?roll_number=".$roll_number."'</script>";
									}elseif ($bookStatus['remarks'] == "Not Available"){
										echo "<script>alert('Book Already Issued to Someone!'); window.location='borrow_book.php?roll_number=".$roll_number."'</script>";
									}else{
										
									mysqli_query($con,"UPDATE book SET remarks = 'Not Available' where book_id = '$book_id' ") or die (mysqli_error($con));
									
									mysqli_query($con,"INSERT INTO borrow_book(user_id,book_id,date_borrowed,due_date,borrowed_status)
									VALUES('$user_id','$book_id','$date_borrowed','$due_date','borrowed')") or die (mysqli_error($con));
									
									$report_history=mysqli_query($con,"select * from admin where admin_id = $id_session ") or die (mysqli_error($con));
									$report_history_row=mysqli_fetch_array($report_history);
									$admin_row=$report_history_row['firstname']." ".$report_history_row['middlename']." ".$report_history_row['lastname'];	
									
									mysqli_query($con,"INSERT INTO report 
									(book_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$book_id','$user_id','$admin_row','Borrowed Book',NOW())") or die(mysqli_error($con));
									
									}
									
							?>
									<script>
										window.location="borrow_book.php?roll_number=<?php echo $roll_number ?>";
									</script>
							<?php	
								}
							?>
							</form>
						</table>
						
					</div>
				</div>
						
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>

<?php include ('footer.php'); ?>