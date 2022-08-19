<?php 
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$hospital_name =$_REQUEST['hospital_name'];
$h_type = $_REQUEST['h_type'];
$equipment_name = $_REQUEST['equipment_name'];
$equipment_make = $_REQUEST['equipment_make'];
$equipment_model = $_REQUEST['equipment_model'];
$location   = $_REQUEST['location'];
$s_id		= $_REQUEST['s_id'];
$submittedby = $_SESSION["username"];
$ins_query="insert into job_card (`trn_date`,`hospital_name`,`h_type`,`equipment_name`,`equipment_make`,`equipment_model`,`location`,`s_id`,`submittedby`) values ('$trn_date','$hospital_name','$h_type','$equipment_name','$equipment_make','$equipment_model','$location','$s_id','$submittedby')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<!-- <link rel="stylesheet" href="css/style.css" /> -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Job Card</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0"> 
	<style>

.btn {
  background: #b4c9d4;
  background-image: -webkit-linear-gradient(top, #b4c9d4, #769db3);
  background-image: -moz-linear-gradient(top, #b4c9d4, #769db3);
  background-image: -ms-linear-gradient(top, #b4c9d4, #769db3);
  background-image: -o-linear-gradient(top, #b4c9d4, #769db3);
  background-image: linear-gradient(to bottom, #b4c9d4, #769db3);
  -webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  -webkit-box-shadow: 0px 1px 5px #666666;
  -moz-box-shadow: 0px 1px 5px #666666;
  box-shadow: 0px 1px 5px #666666;
  font-family: Georgia;
  color: #030003;
  font-size: 12px;
  padding: 8px 10px 8px 10px;
  border: solid #5f8ba1 1px;
  text-decoration: none;
}

.btn:hover {
  background: #1f72a3;
  background-image: -webkit-linear-gradient(top, #1f72a3, #387aa3);
  background-image: -moz-linear-gradient(top, #1f72a3, #387aa3);
  background-image: -ms-linear-gradient(top, #1f72a3, #387aa3);
  background-image: -o-linear-gradient(top, #1f72a3, #387aa3);
  background-image: linear-gradient(to bottom, #1f72a3, #387aa3);}
  </style>
  


</head>
<div class="card text-center">
	  <div class="card-header">
	  <div class="card-footer text-muted">
	  <!-- <p style= color:blue > DEPARTMENT OF HEALTH SERVICES </p>  -->
	  <p class="text-primary">DEPARTMENT OF HEALTH SERVICES</p>
	  
	  <!-- <p class="text-info bg-dark">DEPARTMENT OF HEALTH SERVICES</p> -->
		<!-- <a class="btn btn-primary" target="blank" href="http://localhost/eldb/jobcardnew/fpdf/index.php" role="button">PRINT LAST JOB</a>
		<a class="btn btn-primary" href="http://localhost/eldb/JobCardNew/spare_parts.php" role="button">ADD SPARE PARTS</a>
		<a class="btn btn-primary" href="http://localhost/eldb/JobCardNew/table.php" role="button">VIEW ALL JOBS</a>
		<a class="btn btn-primary" href="http://localhost/eldb/JobCardNew/elworkform.php" role="button">OPEN NEW JOB CARD</a>
		<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></p> -->
	</div>
 <div class="card-body">
<body>
<div id="main">
	<div id="header">
	  <div id="logo">
		<div id="logo_text">
		  <!-- class="logo_colour", allows you to change the colour of the text -->
		  <h1><a href="home.php"> <span class="logo_colour"> </span></a></h1>
		  <!-- <h2> <p style= color:blue > Division of Biomedical Engineering Services</p> </h2> -->
		  <h3><p class="text-dark">Division of Biomedical Engineering Services</p> </h3>
		<!-- <h3><div>DEPARTMENT OF HEALTH SERVICES &nbsp; &nbsp; &nbsp; &nbsp; <span class="a">Job Number</span> <span class="a"></span> . </div> </h3> -->
		    
		  <!-- <h4> DEPARTMENT OF HEALTH SERVICES  </h4> -->
		  <p></p>
		  <p></p>
		
		  <div class="container overflow-hidden">
            <div class="row gx-5">
                <div class="col">
                <div class="p-3 border bg-light">
                <?php	  
                //$con = mysqli_connect("localhost","root","123","eldb");
                $result = mysqli_query($con, "SELECT id FROM job_card ORDER BY id DESC LIMIT 1 ");
                if ($result->num_rows > 0) {
			    // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Job Number:   EL / " . (str_pad($row["id"],4,0,STR_PAD_LEFT)+1). " / 22 / W     ";
                }
                } else {
                    echo "0 results";
		                }	?>
                </div>
                </div>

                <div class="col">
                <div class="p-3 border bg-light">

                <?php
                $result = mysqli_query($con, "SELECT trn_date FROM job_card ORDER BY trn_date DESC LIMIT 1 ");
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo " &nbsp;&nbsp;Date  : " . $row["trn_date"];
                    }
                } else {
                    echo "0 results";
                }	?>
                </div>
                </div>
            </div>
        </div>
		<p></p>
<!-- <div class="form"> -->

<!-- <h1>Insert New Record</h1> -->

<form name="form" method="post" action="" class="row g-3"> 

<input type="hidden" name="new" value="1" />
<div class="col-md-6">
<label class="form-label" >Institute Name</label>
<p><input type="text" name="hospital_name" placeholder="Enter Hospital Name" class="form-control" required /></p>
</div>

<!-- <p><input type="text" name="h_type" placeholder="Type" required /></p> -->
<div class="col-md-2">
                <label for="inputState" class="form-label">Type</label>    
                <select name="h_type" class="form-select">       
                    <option selected>Choose...</option>
                    <option> TH   </option>
                    <option> GH   </option>
                    <option> BH   </option>
                    <option> DGH   </option>
                </select>
</div>

<div class="col-md-2">  
<label class="form-label" >Location</label>
<p><input type="text" name="location" placeholder="Location" class="form-control" required /></p>
</div>

<div class="col-12">
<label for="inputAddress" class="form-label"></label>
<p><input type="text" name="equipment_name" placeholder="Equipment Name" class="form-control" required /></p>
</div>

<div class="col-sm-7">
<p><input type="text" name="equipment_make" placeholder="Equipment Make" class="form-control"  required /></p>
</div>

<div class="col-sm">
<p><input type="text" name="equipment_model" placeholder="Equipment Model" class="form-control" required /></p>
</div>
<div class="col-sm">
                <!-- <input type="text" class="form-control" placeholder="Serial No" aria-label="Zip"> -->
            </div>
        
            <div class="col-md-8">
            </div>

            <div class="col-md-2">
                <!-- <label for="inputState" class="form-label"></label>
                <select id="inputState" class="form-select">
                <option selected>Massage recived by</option>
                <option> TH            </option>
                <option> GH           </option>
                </select> -->
            </div>
<!-- <p><input type="text" name="s_id" placeholder="Staff_ID" required /></p> -->
<div class="col-md-2">
            <label for="inputState" class="form-label"> </label>
                <select name="s_id" class="form-select">
                    <option selected>staff</option>
                    <option> 882        </option>
                    <option> 902         </option>
                </select>
               <!-- connect to DB  -->
 </div>

<p><input name="submit" type="submit" value="Submit" /></p>
</form>

<p style="color:#FF0000;"><?php echo $status; ?></p>

<br /><br /><br /><br />

</div>
</div>
</body>
<div class="caard-text center">
	<div class="card-footer ">
	<div class="card-footer text-muted">
	<!-- <p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></p> -->
	
		<a class="btn btn-primary" target="blank" href="http://localhost/eldb/jobcardnew/fpdf/index.php" role="button">PRINT LAST JOB</a>
		<a class="btn btn-primary" href="http://localhost/eldb/JobCardNew/spare_parts.php" role="button">ADD SPARE PARTS</a>
		<a class="btn btn-primary" href="http://localhost/eldb/JobCardNew/table.php" role="button">VIEW ALL JOBS</a>
		<a class="btn btn-primary" href="http://localhost/eldb/JobCardNew/elworkform.php" role="button">OPEN NEW JOB CARD</a>

		<a class="btn btn-primary" href="dashboard.php"role="button">DASHBOARD</a>
		<a class="btn btn-primary" href="view.php" role="button">VIEW JOB CARDS</a>
		<a class="btn btn-primary" href="logout.php" role="button">LOGOUT</a>
	</div>
	</div>
	</div>
</html>
