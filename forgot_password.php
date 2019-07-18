<?php
require_once('include/dbcon.php');
?>
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
                            <input type="text" class="form-control" name="username" placeholder="&#xf007;  Enter Username OR Email-Id" autofocus='autofocus' style="border-radius: 20px;" required="" >
                            </div>
                        </div>
                      
                        <button class="btn btn-primary submit btn-block" type="submit" name="forgot_password" style="border-radius: 20px;"><i class="fa fa-check"></i>&nbsp; Forgot Password
                        </button>
                        		<?php 
                                 if(isset($_GET['error'])) {
                                    echo $_GET['error']; }
                                 ?> 
						</form>
<?php 
if(isset($_POST['forgot_password'])){
	$username = mysqli_real_escape_string($con, $_POST['username']);

	$sql = "SELECT username,email_id,password FROM `admin` WHERE username = '$username' OR email_id='$username'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		$password = $r['password'];
		$to = $r['email_id'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login " . $password;
		$headers = "From : ankeshofficial18@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			$success = "<span class='red'>Your password is successfully sent to your Email-Id. </span>";
  			 header('location: forgot_password.php?error=' . $success);
		}else{
			$error = "<span class='red'>Unable to recover your Password. </span>";
  			 header('location: forgot_password.php?error=' . $error);
		}

	}else{
		$error = "<span class='red'>Incorrect Credentials. </span>";
  			 header('location: forgot_password.php?error=' . $error);
		
	}
}


?>

				</div>
 				<div class="panel-footer">
                    
                    <a href="index.php" class="text-primary" style="text-decoration: none;"> Login?</a>
                   
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

      