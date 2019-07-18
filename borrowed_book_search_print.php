<?php include ('include/dbcon.php');
include('session.php');
?>
<html>

<head>
		<title>Library Management System</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
		
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		</style>
		
<script>
function printPage() {
    window.print();
}
</script>
</head>


<body>
<div class = "container">
		<div id = "header">
	<center><h5 style = "font-style:Calibri"></h5>&nbsp; &nbsp;&nbsp; Kashi Institute Of Technology - 428 &nbsp;	&nbsp; </center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5> &nbsp; &nbsp;Kashi Institute Of Pharmacy - 551</center>
				<center><h5 style = "font-style:Calibri; margin-top:-14px;"></h5>  Library Management System</center>
					
				</div><hr style="border: solid black 1px">
	<button type="submit" id="print" onclick="printPage()">Print</button>	
			<p style = "margin-left:30px; margin-top:5px; margin-bottom: 0px;font-size:14pt; font-style: italic; ">Borrowed book Lists&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php //include('currentdate.php');
		echo date("l,d-m-Y"); ?>
        </div>			
		<br/>
						<table class="table table-striped">
						  <thead>
								<tr>
									<th>Members Name</th>
                                    <th>Book Title</th>
                                    <th>Task</th>
                                    <th>Person In Charge</th>
                                    <th>Date Transaction</th>
								</tr>
						  </thead>   
						  <tbody>
<?php 
							
							$result= mysqli_query($con,"select * from report 
                            LEFT JOIN book ON report.book_id = book.book_id 
                            LEFT JOIN user ON report.user_id = user.user_id 
							where date_transaction BETWEEN '".$_SESSION['datefrom']." 00:00:01' and '".$_SESSION['dateto']." 23:59:59' and detail_action='Borrowed Book' order by report.report_id DESC ") or die (mysqli_error($con));
							
							
							while ($row= mysqli_fetch_array ($result) ){
                            $id=$row['report_id'];
                            $book_id=$row['book_id'];
                            $user_name=$row['firstname']." ".$row['middlename']." ".$row['lastname'];
                            
                            ?>
                            <tr>
                                <td><?php echo $user_name; ?></td>
                                <td><?php echo $row['book_title']; ?></td>
                                <td><?php echo $row['detail_action']; ?></td>
                                <td><?php echo $row['admin_name']; ?></td> 
                                <td><?php echo date("M d, Y h:m:s a",strtotime($row['date_transaction'])); ?></td>
                            </tr>
                            <?php } ?>
							</tbody>
					  </table> 

<br />
<br />
							<?php
								$user_query=mysqli_query($con,"select * from admin where admin_id='$id_session'")or die(mysqli_error($con));
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>