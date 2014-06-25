Delimiter $$
CREATE TRIGGER vwl.update_pod_count AFTER INSERT ON vwl.user
FOR EACH ROW

BEGIN
	UPDATE pod
		SET pod.member_count = (SELECT count(*) FROM user WHERE user.pod_id = pod.ID)
		WHERE pod.id = NEW.pod_id;
END $$
Delimiter ;

