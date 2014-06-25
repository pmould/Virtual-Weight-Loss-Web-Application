<?php

// Create connection
$con=mysqli_connect("127.0.0.1","root","","login");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$ID = mysqli_real_escape_string($con, $_POST['ID']);
$pod_id = mysqli_real_escape_string($con, $_POST['pod_id']);
$workout_id = mysqli_real_escape_string($con, $_POST['workout_id']);
$message_type = mysqli_real_escape_string($con, $_POST['message_type']);
$first_name = mysqli_real_escape_string($con, $_POST['first_name']);
$middle_initial = mysqli_real_escape_string($con, $_POST['middle_initial']);
$last_name = mysqli_real_escape_string($con, $_POST['last_name']);
$initial_weight = mysqli_real_escape_string($con, $_POST['initial_weight']);
$goal_weight = mysqli_real_escape_string($con, $_POST['goal_weight']);
$height = mysqli_real_escape_string($con, $_POST['height']);
$sex = mysqli_real_escape_string($con, $_POST['sex']);
$date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
$cell_phone_number = mysqli_real_escape_string($con, $_POST['cell_phone_number']);
$cell_phone_carrier = mysqli_real_escape_string($con, $_POST['cell_phone_carrier']); 
$email_address = mysqli_real_escape_string($con, $_POST['email_address']);

$sql="INSERT INTO user (ID, LastName, Age)
VALUES ('$firstname', '$lastname', '$age')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

?>