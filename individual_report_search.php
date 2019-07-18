<?php include ('header.php'); ?>
<?php 
	$roll_number = $_GET['roll_number'];
	
	$user_query = mysqli_query($con,"SELECT * FROM user WHERE roll_number = '$roll_number' ");
	$user_row = mysqli_fetch_array($user_query);
?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Individual Book Report
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
					Borrower Name : <span style="color:maroon;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']." (".$row['branch'].")";?></span>
					</h2>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
                        <?php
                        $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysqli_error($con));
								$borrow_count = mysqli_num_rows($borrow_query); 
                        
                    	echo "<span style='color:red;font-size:16px;font-weight:bold;font-family:Times New Roman, Times, serif;'>Total Number of Books Borrowed is = ".$borrow_count."</span";



                        ?>
					<br>
						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Title</th>
									<th>Publisher</th>
									<th>Copyright Year</th>
									<th>Date Borrowed</th>
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
								
									
							?>
								</tr>
							</thead>
							<tbody>
							
							<tr>
								
								<td><?php echo $borrow_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['book_title']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['book_pub']; ?></td>
								<td><?php echo $borrow_row['copyright_year']; ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
								
						
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
							
							</tbody>
							</table>
						</div>
						
						
					
						
								
				</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
       
<?php include ('footer.php'); ?>