

DELIMITER $$
DROP FUNCTION IF EXISTS `drawOnOrAfter`$$
CREATE FUNCTION `drawOnOrAfter` (
  drawClosed date
) RETURNS datetime DETERMINISTIC
BEGIN
  -- From the next day (if other conditions are met)
  RETURN TIMESTAMP(DATE_ADD(drawClosed,INTERVAL 1 DAY))
  ;
END$$

