
DELIMITER //
CREATE DEFINER=`root`@`localhost`
EVENT delete_booking ON SCHEDULE EVERY 5 SECOND
STARTS '2019-11-30 23:00:00' ENDS '2025-12-31 00:00:00' 
ON COMPLETION PRESERVE ENABLE 
DO 
	BEGIN 
    	DELETE FROM booking WHERE booking_date < (NOW() - INTERVAL 2 DAY); 
    END;
//