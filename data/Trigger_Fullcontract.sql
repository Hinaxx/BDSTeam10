DELIMITER //
CREATE TRIGGER TG_Full_Contract_INSERT_AUTOCODE
BEFORE INSERT ON `dbo.full_contract` FOR EACH ROW
BEGIN 
    DECLARE NAMHT VARCHAR(2);
    DECLARE THANGHT VARCHAR(2);
    DECLARE MSBDS VARCHAR(11);
    DECLARE MAX_VAL INT;

    SET NAMHT = CONVERT(RIGHT(YEAR(CURDATE()), 2), UNSIGNED);
    SET THANGHT = CONVERT(LPAD(MONTH(CURDATE()), 2, '0'), UNSIGNED);

    IF EXISTS (SELECT 1 FROM `dbo.Full_Contract` WHERE SUBSTRING(Full_Contract_Code, 5, 2) = NAMHT) THEN
        SET MAX_VAL = (SELECT MAX(RIGHT(Full_Contract_Code, 4)) FROM `dbo.Full_Contract` WHERE SUBSTRING(Full_Contract_Code, 5, 2) = NAMHT) + 1;
    ELSE
        SET MAX_VAL = 1;
    END IF;

    SET MSBDS = CONCAT('HD', THANGHT, NAMHT, LPAD(MAX_VAL, 4, '0'));

    SET NEW.Full_Contract_Code = MSBDS;

END;
//
DELIMITER ;