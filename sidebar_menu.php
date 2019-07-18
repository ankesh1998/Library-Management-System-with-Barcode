            <!-- sidebar navigation -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="home.php" class="site_title"><i class="fa fa-university"></i> <span>Kashi -IT</span></a>
                    </div>
                    <div class="clearfix" style="margin-bottom: 0px"></div>

                    <!-- menu prile quick info -->
					
<?php
	include('include/dbcon.php');
	$user_query=mysqli_query($con,"select *  from admin where admin_id='$id_session'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($user_query); {
?>
                        <a href='profile.php<?php echo '?admin_id='.$row['admin_id']; ?>'>
                        <div class="profile">
                        <div class="profile_pic" style="margin-left: 0px">
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" style="height:85px; width:80px;border: 1px solid white;padding: 1px">
                                    <?php else: ?>
                                    <img src="images/user.png" style="height:85px; width:80px;" class="img-circle profile_img">
                                    <?php endif; ?>  
                        </div>

                        <div class="profile_info" align="center">
                            <span>Welcome</span>
                            <h2><?php echo $row['firstname']; ?></h2>
                        </div>
<?php } ?>
                    </div>
					</a>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
							<h3 style="margin-top:85px;">File Information</h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li>
									<a href="home.php"><i class="fa fa-home"></i> Home</a>
                                </li>
                                <li>
									<a href="member.php"><i class="fa fa-users"></i> Members</a>
                                </li>
                                <?php if($row['admin_type']=='Admin') { ?>
                                <li>
                                    <a href="admin.php"><i class="fa fa-user"></i> Admin /Librarian</a>
                                </li>
                                <?php }?>
                                <li>
									<a href="book.php"><i class="fa fa-book"></i> Books</a>
                                </li>
                                <?php if($row['admin_type']=='librarian') { ?>
						        <li>
                                    <a href="librarian.php"><i class="fa fa-user"></i> librarian</a>
                                </li>
                                <?php }?>
                                 <?php if($row['admin_type']=='Admin') { ?>
                                <li>
									<a href="user_log_in.php"><i class="fa fa-history"></i> Members Record</a>
                                </li>
                                 <?php }?>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Transaction Information</h3>
							<div class="separator"></div>
                            <ul class="nav side-menu">
                                <li>
									<a href="borrow.php"><i class="fa fa-edit"></i> Borrow / Return</a>
                                </li>

                                <li>
                                    <a href="report.php"><i class= "fa fa-file"></i> Reports</a>
                                </li>
                                <li>
                                    <a href="individual_report.php"><i class= "fa fa-file"></i> Individual Report</a>
                                </li>

                                 <li>
                                    <a href="borrowed_book.php"><i class= "fa fa-book"></i> Borrowed books</a>
                                </li>
                                 <li>
                                    <a href="returned_book.php"><i class= "fa fa-book"></i> Returned books</a>
                                </li>
                                <?php if($row['admin_type']=='Admin') { ?>
                                <li>
									<a href="settings.php"><i class= "fa fa-cog"></i> Settings</a>
                                </li>
                                <?php } ?>
                                <li>
									<a href="about_us.php"><i class= "fa fa-info"></i> About Us</a>
                                </li>
                               <!--- <li>
									<a href="activity_log.php"><i class="fa fa-history"></i> Activity Log</a>
                                </li>-->
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div> -->
                </div>
            </div>
            <!-- end of sidebar navigation -->