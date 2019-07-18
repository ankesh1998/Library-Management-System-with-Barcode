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
                        	
                        		<form method="post" action="book_search.php">
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
                        <br>

						
                        <!-- books end -->

						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>