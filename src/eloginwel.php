<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 $sql1 = "SELECT * FROM `employee` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
	 $empName = ($employeen['firstName']);

	$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
	$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

	$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

	$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>



<html>
<head>
	<title>Employee Panel | Employee Management System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="icon.png" type="image/png" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="animation.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
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
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4  active">
										<a class="nav-link" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="myprofile.php?id=<?php echo $id?>"">My Profile</a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="empproject.php?id=<?php echo $id?>"">My Projects</a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a>
									</li>
									<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
										<a class="nav-link" href="elogin.html">Log Out</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
	</div>
		<!-- <h2>Welcome <?php echo "$empName"; ?> </h2> -->

    	<table  style="margin-top:100px; ">
		   <tr class= "tbl">
            <td colspan = "4" class="title"> &#124 <span class="name">EMPLOYEE LEADERBOARD</td>
			</tr>
			<tr>
				<th align = "center">Seq.</th>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Points</th>
				

			</tr>

			

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$employee['id']."</td>";
					
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['points']."</td>";
					
					$seq+=1;
				}


			?>

		</table>
<br>
    	<table>
            <tr class= "tbl">
            <td colspan = "4" class="title"> &#124 <span class="name">DUE PROJECTS</td>
			</tr>
			<tr>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				
			</tr>

			

			<?php
				while ($employee1 = mysqli_fetch_assoc($result1)) {
					echo "<tr>";
					
					echo "<td>".$employee1['pname']."</td>";
					
					echo "<td>".$employee1['duedate']."</td>";

				}


			?>

		</table>
<br>
    	<table>
            <tr class= "tbl">
            <td colspan = "4" class="title"> &#124 <span class="name">SALARY STATUS</td>
			</tr>
			<tr>
				<th align = "center">Base Salary</th>
				<th align = "center">Bonus</th>
				<th align = "center">Total Salary</th>
				
			</tr>

			

			<?php
				while ($employee = mysqli_fetch_assoc($result3)) {
					

					echo "<tr>";
					
					
					echo "<td>".$employee['base']."</td>";
					echo "<td>".$employee['bonus']." %</td>";
					echo "<td>".$employee['total']."</td>";
					
				}


				


			?>

		</table>
<br>
    	<table>
            <tr class= "tbl">
            <td colspan = "5" class="title"> &#124 <span class="name">LEAVE STATUS</td>
			</tr>
			<tr>
				
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>

			

			<?php
				while ($employee = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
				}

			?>

		</table>
</body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
	<script src="./script.js"></script>

</body>
</html>