
<?php

require_once ('process/dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = (isset($_GET['pid']) ? $_GET['pid'] : '');
$sql = "SELECT pid, project.eid, pname, duedate, subdate, mark, points, firstName, lastName, base, bonus, total FROM project,rank ,employee,salary WHERE project.eid ='$id' AND pid = '$pid'";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

  $eid = mysqli_real_escape_string($conn, $_POST['eid']);
  $pid = mysqli_real_escape_string($conn, $_POST['pid']);
  

  $mark = mysqli_real_escape_string($conn, $_POST['mark']);
  $points = mysqli_real_escape_string($conn, $_POST['points']);
  $base = mysqli_real_escape_string($conn, $_POST['base']);
  $bonus = mysqli_real_escape_string($conn, $_POST['bonus']);
  $total = mysqli_real_escape_string($conn, $_POST['total']);

  $upPoint = $points+$mark;
  
  $upBonus = $bonus +  $mark;
  $upSalary = $base + ($upBonus*$base)/100; 
  echo "$upBonus";
  echo "string";
  echo "$upSalary";
 
 $result = mysqli_query($conn, "UPDATE `project` SET `mark`='$mark' WHERE eid=$eid and pid = $pid");

 $result = mysqli_query($conn, "UPDATE `rank` SET `points`='$upPoint' WHERE eid=$eid");
 $result = mysqli_query($conn, "UPDATE `salary` SET `bonus`='$upBonus' ,`total`='$upSalary' WHERE id=$eid");




 echo ("<SCRIPT LANGUAGE='JavaScript'>
   
    window.location.href='assignproject.php  ';
    </SCRIPT>");

  
}
?>




<?php
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $pid = (isset($_GET['pid']) ? $_GET['pid'] : '');
  $sql1 = "SELECT pid, project.eid, project.pname, project.duedate, project.subdate, project.mark, rank.points, employee.firstName, employee.lastName, salary.base, salary.bonus, salary.total FROM `project` , `rank` ,`employee`, `salary`  WHERE project.eid = $id AND project.pid = $pid AND project.eid = rank.eid AND salary.id = project.eid AND employee.id = project.eid AND employee.id = rank.eid";
  $result1 = mysqli_query($conn, $sql1);
  if($result1){
  while($res = mysqli_fetch_assoc($result1)){
  $pname = $res['pname'];
  $duedate = $res['duedate'];
  $subdate = $res['subdate'];
  $firstName = $res['firstName'];
  $lastName = $res['lastName'];
  $mark = $res['mark'];
  $points = $res['points'];
  $base = $res['base'];
  $bonus = $res['bonus'];
  $total = $res['total'];
  
}
}

?>

<html>
<head>
  <title>Project Mark | Employee Management System</title>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="icon.png" type="image/png" />
     <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="animation.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
<body class="hero-anime">
		<div class="navigation-wrap bg-light start-header start-style">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<nav class="navbar navbar-expand-md navbar-light">
							<a class="navbar-brand" href="index.html"><img src="logo.svg" alt=""></a>
							<button class="navbar-toggler" type="button" data-toggle="collapse"
								data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ml-auto py-4 py-md-0">
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
										<a class="nav-link" href="aloginwel.php">HOME</a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="addemp.php">Add Employee</a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="viewemp.php">View Employee</a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
										<a class="nav-link" href="assign.php">Assign Project</a>
									</li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
										<a class="nav-link" href="assignproject.php">Project Status</a>
									</li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="salaryemp.php">Salary Table</a>
									</li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="empleave.php">Employee Leave</a>
									</li>
                                    <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="alogin.html">Logout</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                   <h2 class="title"> &#124 <span class="name">PROJECT MARK</h2>
                    <form id = "registration" action="mark.php" method="POST">



                        <div class="input-group">
                          <p>Project Name</p>
                            <input class="input--style-1" type="text"  name="pname" value="<?php echo $pname;?>" readonly>
                        </div>
                       
                        
                        <div class="input-group">
                          <p>Employee Name</p>
                            <input class="input--style-1" type="text" name="firstName" value="<?php echo $firstName;?> <?php echo $lastName;?>" readonly>
                        </div>

                       


                        <div class="row row-space">
                            <div class="col-4">
                                <div class="input-group">
                                  <p>Due Date</p>
                                     <input class="input--style-1" type="text" name="duedate" value="<?php echo $duedate;?>" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                  <p>Submission Date</p>
                                    <input class="input--style-1" type="text"  name="subdate" value="<?php echo $subdate;?>" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="input-group">
                          <p>Assign Mark</p>
                            <input class="input--style-1" type="text"  name="mark" value="<?php echo $mark;?>">
                        </div>

                       
                        <input type="hidden" name="eid" id="textField" value="<?php echo $id;?>" required="required">
                        <input type="hidden" name="pid" id="textField" value="<?php echo $pid;?>" required="required">
                         <input type="hidden" name="points" id="textField" value="<?php echo $points;?>" required="required">
                        <input type="hidden" name="base" id="textField" value="<?php echo $base;?>" required="required">
                        <input type="hidden" name="bonus" id="textField" value="<?php echo $bonus;?>" required="required">
                        <input type="hidden" name="total" id="textField" value="<?php echo $total;?>" required="required">
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Assign Mark</button>
                        </div>
                        
                    </form>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
 </body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
	<script src="./script.js"></script>
</body>
</html>
