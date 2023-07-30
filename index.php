<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ac_repair";

    //create connection
    $con = mysqli_connect($server, $username, $password, $dbname);

    //check for connection
    if(!$con){
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
    // else{
    //     echo "Success Connecting to database";
    // }
    //connection variables
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $sql = "INSERT INTO `ac_repair` (`name`, `email`, `message`, `dt`) VALUES ('$name', '$email', '$message', current_timestamp());";
    // echo $sql;

    //execute query
    if($con->query($sql)==true){
        //flag for success
        $insert = true;
        // echo "Successful";
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
    //close connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Air Conditioner Repair Services</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>Air Conditioner Repair Services</h1>
		<nav>
			<ul>
				<li><a href="#services">Services</a></li>
				<li><a href="#pricing">Pricing</a></li>
				<li><a href="#contact">Contact Us</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
		<section id="services">
			<h2>Our Services</h2>
			<ul>
				<li>AC Repair</li>
				<li>AC Installation</li>
				<li>AC Maintenance</li>
			</ul>
		</section>
		
		<section id="pricing">
			<h2>Pricing</h2>
			<p>Our pricing is competitive and based on the specific service required. Please contact us for a quote.</p>
		</section>
		
		<section id="contact">
			<h2>Contact Us</h2>
			<form action="index.php" method="post">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
				<label for="message">Message:</label>
				<textarea id="message" name="message"></textarea>
				<input type="submit" value="Submit">
			</form>
		</section>
	</main>
	
	<footer>
		<p>&copy; 2023 Air Conditioner Repair Services</p>
	</footer>
</body>
</html>
