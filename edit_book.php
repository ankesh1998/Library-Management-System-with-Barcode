<?php include ('include/dbcon.php');
$ID=$_GET['book_id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home / Books /</small> Edit Book Information
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Book</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from book where book_id='$ID'")or die(mysql_error());
$row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Image
                                    </label>
                                    <div class="col-md-4">
										<?php if($row['book_image'] != ""): ?>
										<img src="upload/<?php echo $row['book_image']; ?>" width="100px" height="100px" style="border:1px solid black; border-radius:5px;">
										<?php else: ?>
										<img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_title" value="<?php echo $row['book_title']; ?>" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 1 <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author" id="first-name2" value="<?php echo $row['author']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 2
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_2" id="first-name2" value="<?php echo $row['author_2']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 3
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_3" id="first-name2" value="<?php echo $row['author_3']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 4
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_4" id="first-name2" value="<?php echo $row['author_4']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 5
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_5" id="first-name2" value="<?php echo $row['author_5']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Publication <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_pub" value="<?php echo $row['book_pub']; ?>" id="last-name2" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Publisher
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="publisher_name" value="<?php echo $row['publisher_name']; ?>" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISBN <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="isbn" id="last-name2" value="<?php echo $row['isbn']; ?>" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Copyright &copy;
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="copyright_year" value="<?php echo $row['copyright_year']; ?>" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Status <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-3">
                                        <select name="status" class="select2_single form-control" tabindex="" >
                                            
											<option value="New">New</option>
											<option value="Lost">Lost</option>											
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Category <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-3">
                                        <select name="category" class="select2_single form-control" tabindex="-1" required="required">
                                            <option value="CSE">CSE</option>
                                            <option value="ME">ME</option>
                                            <option value="EC">EC</option>
                                            <option value="EN">EN</option>
                                            <option value="Civil">Civil</option>
                                            <option value="BBA">BBA</option>
                                            <option value="MBA">MBA</option>
                                            <option value="B-Pharma">B-Pharma</option>
                                       </select>
                                      
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="book.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['book_id'];
if (isset($_POST['update11'])) {
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							


							if ($error > 0){
										
					$book_title=$_POST['book_title'];
					$category=$_POST['category'];
					$author=$_POST['author'];
					$author_2=$_POST['author_2'];
					$author_3=$_POST['author_3'];
					$author_4=$_POST['author_4'];
					$author_5=$_POST['author_5'];
				
					$book_pub=$_POST['book_pub'];
					$publisher_name=$_POST['publisher_name'];
					$isbn=$_POST['isbn'];
					$copyright_year=$_POST['copyright_year'];
					$status=$_POST['status'];
$still_profile1 = $row['book_image'];


					if ($status == 'Lost') {
						$remark = 'Not Available';
					} else {
						$remark = 'Available';
					}


mysqli_query($con," UPDATE book SET book_title='$book_title', category='$category', author='$author', author_2='$author_2', author_3='$author_3', author_4='$author_4', author_5='$author_5', 
book_pub='$book_pub', publisher_name='$publisher_name', isbn='$isbn', copyright_year='$copyright_year', status='$status', book_image='$still_profile1', remarks='$remark' WHERE book_id = '$id' ")or die(mysqli_error($con));
echo "<script>alert('Successfully Updated Book Info!'); window.location='book.php'</script>";	

									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$profile=$_FILES["image"]["name"];

					$book_title=$_POST['book_title'];
					$category=$_POST['category'];
					$author=$_POST['author'];
					$author_2=$_POST['author_2'];
					$author_3=$_POST['author_3'];
					$author_4=$_POST['author_4'];
					$author_5=$_POST['author_5'];
					$book_pub=$_POST['book_pub'];
					$publisher_name=$_POST['publisher_name'];
					$isbn=$_POST['isbn'];
					$copyright_year=$_POST['copyright_year'];
					$status=$_POST['status'];


					if ($status == 'Lost') {
						$remark = 'Not Available';
					} else {
						$remark = 'Available';
					}
					
mysqli_query($con," UPDATE book SET book_title='$book_title', category='$category', author='$author', author_2='$author_2', author_3='$author_3', author_4='$author_4', author_5='$author_5',
book_pub='$book_pub', publisher_name='$publisher_name', isbn='$isbn', copyright_year='$copyright_year', status='$status', book_image='$profile', remarks='$remark' WHERE book_id = '$id' ")or die(mysqli_error($con));
echo "<script>alert('Successfully Updated Book Info!'); window.location='book.php'</script>";	

}
}
?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>