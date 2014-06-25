CREATE TABLE workout_plan
(
	ID varchar(10),
	description varchar(100),
	PRIMARY KEY (ID)
);

CREATE TABLE workout_type
(
	ID varchar(10),
	`day` varchar(10) not null,
	description varchar(60),
	`type` varchar(15),
	PRIMARY KEY (ID)
);

CREATE TABLE `schedule`
(
	workout_plan_id varchar(10),
	workout_type_id varchar(10),
	PRIMARY KEY (workout_plan_id, workout_type_id),
	FOREIGN KEY (workout_plan_id) REFERENCES workout_plan(ID),
	FOREIGN KEY (workout_type_id) REFERENCES workout_type(ID)
);

CREATE TABLE feedback_message
(
	ID varchar(10),
	`level` varchar(7),
	message varchar(30),
	PRIMARY KEY (ID)
);

CREATE TABLE nurse
(
	ID varchar(10),
	first_name varchar(25),
	last_name varchar(25),
	middle_initial varchar(5),
	location varchar(30),
	phone_number varchar(10),
	PRIMARY KEY (ID)
);

CREATE TABLE pod
(
	ID varchar(10),
	nurse_id varchar(10),
	member_count int(10),
	PRIMARY KEY (ID),
	FOREIGN KEY (nurse_id) REFERENCES nurse(ID)
);

CREATE TABLE user
(
	ID varchar(10) not null,
	pod_id varchar(10) not null,
	workout_id varchar(10) not null,
	message_type varchar(10),
	first_name varchar(25),
	last_name varchar(25),
	middle_initial varchar(5),
	initial_weight int(3),
	goal_weight int(3),
	height int(2),
	sex varchar(1),
	date_of_birth date,
	cell_phone_number varchar(10),
	email_address varchar(50),	
	PRIMARY KEY (ID),
	FOREIGN KEY (pod_id) REFERENCES pod(ID),
	FOREIGN KEY (workout_id) REFERENCES workout_plan(ID),
	FOREIGN KEY (message_type) REFERENCES feedback_message(ID)
);

CREATE TABLE weight_log
(
	date date,
	user_id varchar(10),
	weight int(3),
	PRIMARY KEY (date, user_id),
	FOREIGN KEY (user_id) REFERENCES user(ID)
);

