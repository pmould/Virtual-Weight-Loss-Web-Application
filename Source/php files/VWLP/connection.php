<?php
// Create connection to a mysql server with no databases
$con=mysqli_connect("127.0.0.1","root","","");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br>";
}
else
{
	echo "Estbalished connection to the MySQL Server"."<br>";
}


// Create database
$sql = "CREATE DATABASE VWLP";
if (mysqli_query($con,$sql)) {
  echo "Database VWLP created successfully"."<br>";
} else {
  echo "Error creating database: " . mysqli_error($con)."<br>";
}


//Close connection to MySQL Server
mysqli_close($con);
echo "Disconnected to the MySQL Server"."<br>";

//Create a connection to the VWLP database in the MySQL Server
$con=mysqli_connect("127.0.0.1","root","","VWLP");

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to VWLP database: " . mysqli_connect_error()."<br>";
}
else
{
	echo "Estbalished connection to the VWLP database in MySQL Server"."<br>";
}

$sql = "CREATE TABLE workout_plan
(
	ID INT(10) auto_increment,
	description varchar(15),
	PRIMARY KEY (ID)
		
)";

if (mysqli_query($con,$sql)) {
	echo "workout_plan TABLE created successfully"."<br>";
} else {
	echo "Error creating workout_plan TABLE: " . mysqli_error($con)."<br>";
}
$sql = "CREATE TABLE workout_type
(
	ID INT(10) not null auto_increment,
	`day` varchar(10) not null,
	description varchar(15),
	`type` varchar(15),
	PRIMARY KEY (ID)
)";

if (mysqli_query($con,$sql)) {
	echo "workout_type TABLE created successfully"."<br>";
} else {
	echo "Error creating workout_type TABLE: " . mysqli_error($con)."<br>";
}

$sql = "CREATE TABLE `schedule`
(
	workout_plan_id varchar(10),
	workout_type_id varchar(10),
	PRIMARY KEY (workout_plan_id, workout_type_id),
	FOREIGN KEY (workout_plan_id) REFERENCES workout_plan(ID),
	FOREIGN KEY (workout_type_id) REFERENCES workout_type(ID)
)";

if (mysqli_query($con,$sql)) {
	echo "schedule TABLE created successfully"."<br>";
} else {
	echo "Error creating schedule TABLE: " . mysqli_error($con)."<br>";
}

$sql = "CREATE TABLE feedback_message
(
	ID INT(10) not null auto_increment,
	`level` varchar(6),
	message varchar(30),
	PRIMARY KEY (ID)
)";

if (mysqli_query($con,$sql)) {
	echo "feedback_message TABLE created successfully"."<br>";
} else {
	echo "Error creating feedback_message TABLE: " . mysqli_error($con)."<br>";
}

$sql = "CREATE TABLE nurse
(
	ID INT(10) not null auto_increment,
	first_name varchar(10),
	last_name varchar(10),
	middle_initial varchar(5),
	location varchar(10),
	phone_number int(10),
	PRIMARY KEY (ID)
)";

if (mysqli_query($con,$sql)) {
	echo "nurse TABLE created successfully"."<br>";
} else {
	echo "Error creating nurse TABLE: " . mysqli_error($con)."<br>";
}

$sql = "CREATE TABLE pod
(
	ID INT(10) not null auto_increment,
	nurse_id INT(10),
	member_count int(10),
	PRIMARY KEY (ID),
	FOREIGN KEY (nurse_id) REFERENCES nurse(ID)
)";

if (mysqli_query($con,$sql)) {
	echo "pod TABLE created successfully"."<br>";
} else {
	echo "Error creating pod TABLE: " . mysqli_error($con)."<br>";
}
$sql = "CREATE TABLE user_login
(
	ID INT(10) not null auto_increment,
	username varchar(30) not null,
	password varchar(30) not null,
	email_address varchar(45) not null,
	join_date datetime not null default current_timestamp,
	PRIMARY KEY (ID)
)";

if (mysqli_query($con,$sql)) {
	echo "user_login TABLE created successfully"."<br>";
} else {
	echo "Error creating user_login TABLE: " . mysqli_error($con)."<br>";
}

$sql = "CREATE TABLE user
(
	ID INT(10) not null auto_increment,
	user_login_id INT(10),
	pod_id INT(10),
	workout_id INT(10),
	message_type varchar(10),
	first_name varchar(10),
	last_name varchar(10),
	middle_initial varchar(5),
	initial_weight int(3),
	goal_weight int(3),
	height int(3),
	sex varchar(1),
	date_of_birth date,
	cell_phone_number int(10),
	cell_phone_carrier varchar(20),	
	PRIMARY KEY (ID),
	FOREIGN KEY (user_login_id) REFERENCES user_login(ID),
	FOREIGN KEY (workout_id) REFERENCES workout_plan(ID),
	FOREIGN KEY (message_type) REFERENCES feedback_message(ID)
)";

if (mysqli_query($con,$sql)) {
	echo "user TABLE created successfully"."<br>";
} else {
	echo "Error creating user TABLE: " . mysqli_error($con)."<br>";
}

$sql = "CREATE TABLE weight_log
(
	date date,
	user_id INT(10),
	weight int(3),
	PRIMARY KEY (date, user_id),
	FOREIGN KEY (user_id) REFERENCES user(ID)
)";

if (mysqli_query($con,$sql)) {
	echo "weight_log TABLE created successfully"."<br>";
} else {
	echo "Error creating weight_log TABLE: " . mysqli_error($con)."<br>";
}

//Close connection to VWLP database on MySQL Server
mysqli_close($con);
echo "Disconnected to the MySQL Server"."<br>";

?>