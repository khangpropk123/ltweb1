<?php
	session_start();
	//Change these configs according to your MySQL server
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "testdb"; 		 
	$table = "students_info";
	echo(json_encode($_POST));
	// Create connection
		// Check connection
	$fullname='';
	$mssv='';
	$phonenumber='';
	$email='';
	$birthday='';
	$gender='';
	$address='';
	$note='';
	if(isset($_POST)){
		$fullname= $_POST['name'];
		$mssv = $_POST['student_id'];
		$phonenumber = $_POST['phone'];
		$email = $_POST['email'];
		$birthday = $_POST['dob'];
		$gender =$_POST['gender'];
		$address = $_POST['address'];
		$note = $_POST['note'];
			// 2 ways to get fields in form, the later is more secure
			// $name = $_POST['name'];
			// $name = mysqli_real_escape_string($conn, $_POST['name']);
			
			//Create SQL command to insert data to database
			

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_command = "INSERT INTO $table(fullname,mssv,phonenumber,email,birthday,gender,address,note)
			 VALUES ('$fullname','$mssv','$phonenumber','$email','$birthday','$gender','$address','$note')";
    // use exec() because no results are returned
    $conn->exec($sql_command);
    echo "<div><h2>New record created successfully by PDO</h2></div>";
    }
catch(PDOException $e)
    {
    }

$conn = null;
    }
	else echo("Fail")

		
?>
<html>
<head>
	<title>Form Submit Confirmation</title>
	<style>
	    body{
	    	font-family: Arial
	    }
		.label {
			width: 10%;
			float: left;
		}
		.info{
			padding: 5px;
		}
		form{
			padding-left: 30px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php
		if (isset($_SESSION['msg']))
			echo $_SESSION['msg'];
	?>
</body>
</html>