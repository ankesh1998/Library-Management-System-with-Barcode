<?php 
ob_start();
include ('header.php'); 
?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home /</small> Borrow
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

<div class="container-fluid">
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-3">
	
						<form method="post" action="">
                                        <select name="roll_number" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select Roll Number</option>
										<?php
										$result= mysqli_query($con,"select * from user") or die (mysqli_error($con));
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['user_id'];
										?>
                                            <option value="<?php echo $row['roll_number']; ?>"><?php echo $row['roll_number']; ?> - <?php echo $row['firstname']; ?></option>
										<?php } ?>
                                        </select>  
				<br />
				<br />
						<button name="submit" type="submit" class="btn btn-primary" style="margin-left:110px;"><i class="glyphicon glyphicon-log-in"></i> Submit</button>
						</form>
 
<?php
	include ('include/dbcon.php');

	if (isset($_POST['submit'])) {

	$roll_number = $_POST['roll_number'];

	$sql = mysqli_query($con,"SELECT * FROM user WHERE roll_number = '$roll_number' ");
	$count = mysqli_num_rows($sql);
	$row = mysqli_fetch_array($sql);

		if($count <= 0){
			echo "<div class='alert alert-success'>".'No match found for the School ID Number'."</div>";
		}else{
			$roll_number = $_POST['roll_number'];
			header('location: borrow_book.php?roll_number='.$roll_number);
		}
	}
?>

	</div>
	<div class="col-md-4"></div>
</div>
</div>			
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); 
ob_end_flush();
?>
