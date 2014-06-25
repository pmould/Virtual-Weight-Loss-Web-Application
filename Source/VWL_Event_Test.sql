delimiter &&
CREATE EVENT send_workout ON SCHEDULE EVERY 15 SECOND STARTS '2014-04-21 17:04:30'
DO
	BEGIN
		INSERT INTO user VALUES 
		(3, 1, 1, 1, 'John', 'Dixon', 'M', 220, 180, 73, 'M', '1991-11-23', '7069830', 'josh.deremer@gmail.com');
		INSERT INTO nurse VALUES 
		(5, 'Susan', 'Anthony', 'B', '6 Feet Under', '8876554'); 
	END &&
delimiter ;