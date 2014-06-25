<?php
// Create connection
$con=mysqli_connect("127.0.0.1","root","","login");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql = "CREATE DATABASE login";
if (mysqli_query($con,$sql)) {
  echo "Database login created successfully";
} else {
  echo "Error creating database: " . mysqli_error($con);
}

$sql = "CREATE TABLE workout_plan
(
	ID varchar(10),
	description varchar(15),
	PRIMARY KEY (ID)
)";

$sql = "CREATE TABLE workout_type
(
	ID varchar(10),
	`day` varchar(10) not null,
	description varchar(15),
	`type` varchar(15),
	PRIMARY KEY (ID)
)";

$sql = "CREATE TABLE `schedule`
(
	workout_plan_id varchar(10),
	workout_type_id varchar(10),
	PRIMARY KEY (workout_plan_id, workout_type_id),
	FOREIGN KEY (workout_plan_id) REFERENCES workout_plan(ID),
	FOREIGN KEY (workout_type_id) REFERENCES workout_type(ID)
)";

$sql = "CREATE TABLE feedback_message
(
	ID varchar(10),
	`level` varchar(6),
	message varchar(30),
	PRIMARY KEY (ID)
)";

$sql = "CREATE TABLE nurse
(
	ID varchar(10),
	first_name varchar(10),
	last_name varchar(10),
	middle_initial varchar(5),
	location varchar(10),
	phone_number int(10),
	PRIMARY KEY (ID)
)";

$sql = "CREATE TABLE pod
(
	ID varchar(10),
	nurse_id varchar(10),
	member_count int(10),
	PRIMARY KEY (ID),
	FOREIGN KEY (nurse_id) REFERENCES nurse(ID)
)";

$sql = "CREATE TABLE user
(
	ID varchar(10) not null,
	pod_id varchar(10) not null,
	workout_id varchar(10) not null,
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
	email_address varchar(30),	
	PRIMARY KEY (ID),
	FOREIGN KEY (pod_id) REFERENCES pod(ID),
	FOREIGN KEY (workout_id) REFERENCES workout_plan(ID),
	FOREIGN KEY (message_type) REFERENCES feedback_message(ID)
)";

$sql = "CREATE TABLE weight_log
(
	date date,
	user_id varchar(10),
	weight int(3),
	PRIMARY KEY (date, user_id),
	FOREIGN KEY (user_id) REFERENCES user(ID)
)";


?>