<?php
include('include/dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>KashiIT | Library Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
   
<style>


html { 
  background: url(images/background.jpg) no-repeat center fixed;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}
#overlay{
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(0,0,0,0.2);



}
 input {
 
    font-family: FontAwesome, "Open Sans", Verdana;
}
</style>
</head>

<body id="overlay">
<div class="container" style="padding-left: 100px">
    <div class="row row-style">
        <div class="col-md-3 col-md-push-4">
            <div class="panel panel-primary" style="margin-top: 120px;margin-left: 10px">
                 <div class="panel-heading" align="center" style="font-family:Georgia;letter-spacing:2px">WELCOME</div>
                 <div class="panel-body">
                        <form method="post" action="">
                        <div class="form-group">
                            <div >
                            <input type="text" class="form-control" name="username" placeholder="&#xf007;  Username" autofocus='autofocus' style="border-radius: 20px;" required />
                            </div>
                        </div>
                <div class="form-group">
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="&#xf084;  Password" style="border-radius: 20px;" onmouseover="this.type='text'" onmousedown="this.type='password'" onmouseout="this.type='password'" required />
                    </div>
                 </div>

                            <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                            </div>
                             <div>
                                <button class="btn btn-primary submit btn-block" type="submit" name="login" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; SIGN IN</button>
                                <?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
                            </div>
               
                        </form>
<?php
if (isset($_POST['login'])){

$username=$_POST['username'];
$password=$_POST['password'];

$login_query=mysqli_query($con,"select * from admin where username='$username' and password='$password'");
$count=mysqli_num_rows($login_query);
$row=mysqli_fetch_array($login_query);

if (($count > 0)){
$_SESSION['id']=$row['admin_id'];

mysqli_query($con,"insert into user_log (firstname, middlename, lastname,admin_type, date_log) values ('".$row['firstname']."', '".$row['middlename']."', 
    '".$row['lastname']."','".$row['admin_type']."',NOW())") or die(mysqli_error($con));

header("location:home.php");
}else{ 
echo 
   $error = "<span class='red'>Incorrect Login Details </span>";
   header('location: index.php?error=' . $error);

}
}
?>
                 </div>
                 
                 <div class="panel-footer">
                    
                    <a href="forgot_password.php" class="text-primary" style="text-decoration: none;"> Forgot Password?</a>
                   
                 </div>  
               
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
<div style="background: rgba(0,0,0,0.6);" align="center">
    <h1 style="color:white; font-family:Georgia;"><i class="fa fa-university" style="font-size: 30px;color:white;"></i>&nbsp; Kashi Institute Of Technology
    </h1>

    <p style="color:white; font-family:Georgia;word-spacing: 1px;">© <?php echo date('Y'); ?> &nbsp;&nbsp;
        <i class="fa fa-book"></i> Library Management System
    </p>
</div>
</body>

</html>
