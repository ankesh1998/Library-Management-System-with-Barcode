<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					<small>Home/ </small>Add Members
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    
                    <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Roll Number | ID <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" name="roll_number" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="firstname" placeholder="Enter First Name" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" class="form-control col-md-7 col-xs-12">
                                    </div> <span style="color:red;">Optional</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="lastname" placeholder="Enter Last Name" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Contact <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="tel" autocomplete="off"  maxlength="10" name="contact" id="last-name2" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-3">
                                        <select name="gender" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Member Type <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="Student">Student</option>
                                            <option value="Teacher">Teacher</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Branch <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <select name="branch" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="N/A">N/A</option>
                                            <option value="CSE">CSE</option>
                                            <option value="ME">ME</option>
                                            <option value="EC">EC</option>
                                            <option value="EN">EN</option>
                                            <option value="Civil">Civil</option>
                                            <option value="B-pharma">B-pharma</option>
                                            <option value="BBA">BBA</option>
                                            <option value="MBA">MBA</option>
                                        </select>
                                    </div>
                                </div>		
                                					
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Address<span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="address" id="last-name2" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
                                
                               
                              
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a href="member.php"><button type="button" class="btn btn-primary"><i class="fa fa-times-circle-o"></i> Cancel</button></a>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
							<?php	
							include ('include/dbcon.php');
                if (isset($_POST['submit'])){
				                	$roll_number = $_POST['roll_number'];
									$firstname = $_POST['firstname'];
									$middlename = $_POST['middlename'];
									$lastname = $_POST['lastname'];
									$contact = $_POST['contact'];
									$gender = $_POST['gender'];
                                    $type = $_POST['type'];
                                    $branch = $_POST['branch'];
									$address = $_POST['address'];
								
                        $regex_num = "/^[6789][0-9]{9}$/";
									
								
					
					$result=mysqli_query($con,"select * from user WHERE roll_number='$roll_number' OR contact='$contact'") or die (mysqli_error($con));
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('Roll Number OR Contact <br> already exist!'); window.location='member.php'</script>";
					}else if (!preg_match($regex_num, $contact)) {
                        echo "<script>alert('Not a valid contact number'); window.location='member.php'</script>";
					}else
					{		
						mysqli_query($con,"insert into user (roll_number,firstname, middlename, lastname, contact, gender, address, type, branch, user_added)
						values ('$roll_number','$firstname', '$middlename', '$lastname', '$contact', '$gender', '$address', '$type', '$branch', NOW())")or die(mysqli_error($con));
						echo "<script>alert('User successfully added!'); window.location='member.php'</script>";
					}
							}
								?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>