<?php include ('header.php'); ?>
        <div class="clearfix"></div>
		
                <!-- top tiles -->
                <div class="row tile_count" style="margin-right:-245px;">
					 <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT admin_type FROM admin where admin_type='librarian'");
							$num_rows = mysqli_num_rows($result);
							?>
				
                            <span class="count_top"><i class="fa fa-user"></i> Librarian</span>
				
                            <div class="count green"><?php echo $num_rows; ?></div>
							<span class="count_bottom"> Total of librarian</span>

                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT user_id FROM user");
							$num_rows = mysqli_num_rows($result);
							?>
							
                            <span class="count_top"><i class="fa fa-male"></i> <i class="fa fa-female"></i> Student & Teacher</span>
							
                            <div class="count green"><?php echo $num_rows; ?></div>
							<span class="count_bottom">Total of Members</span>							
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT book_id FROM book");
							$num_rows = mysqli_num_rows($result);
							?>
				
                            <span class="count_top"><i class="fa fa-book"></i> Books</span>
				
                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total of Books</span>                     
					  </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM borrow_book");
							$num_rows = mysqli_num_rows($result);
							?>

                            <span class="count_top"><i class="fa fa-book"></i> Book Borrowed</span>

                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total of Book Borrowed</span>
                        </div>
                    </div>
					<div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                      <div class="left"></div>
                        <div class="right">
							<?php
							$result = mysqli_query($con,"SELECT * FROM return_book");
							$num_rows = mysqli_num_rows($result);
							?>

                            <span class="count_top"><i class="fa fa-book"></i> Book Returned</span>

                            <div class="count green"><?php echo $num_rows; ?></div>
							 <span class="count_bottom ">Total of Book Returned</span>							
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->
				
				

<?php include('slide.php'); ?>
<?php include ('footer.php'); ?>