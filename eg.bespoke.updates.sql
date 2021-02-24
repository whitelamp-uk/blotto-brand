

USE `{{BLOTTO_MAKE_DB}}`
;


-- Order and squidge updates into a bespoke format for ABC -> Harlequin


DROP TABLE IF EXISTS `Updates_ABC`
;


CREATE TABLE `Updates_ABC` AS
  SELECT
    `updated`
   ,`supporter_id`
   ,`updater`
   ,`milestone`
   ,`created`
   ,`canvas_code`
   ,`canvas_ref`
   ,`client_ref_orig`
   ,`last_collected`
   ,`client_ref` AS `Client Ref`
   ,`canvas_code` AS `Acquisition Partner`
   ,`title` AS `Title`
   ,`name_first` AS `Forename`
   ,`name_last` AS `Surname`
   ,CONCAT_WS(' ','Dear',`name_first`,`name_last`) AS `Salutation`
   ,`dob` AS `DOB`
   ,`address_1` AS `Address1`
   ,`address_2` AS `Address2`
   ,`address_3` AS `Address3`
   ,`town` AS `City`
   ,`county` AS `County`
   ,`postcode` AS `Postcode`
   ,`telephone` AS `Telephone`
   ,`mobile` AS `Mobile`
   ,`email` AS `Email`
   ,`tickets` AS `Chances`
   ,`ticket_numbers` AS `Ticket Numbers`
   ,`signed` AS `SignUp date`
   ,`first_collected` AS `First Collection date`
   ,`first_draw` AS `First Draw date`
   ,`mandate_status` AS `Mandate Status`
   ,`cancelled` AS `Cancelation Date`
   ,IF(`p2`='?',IF(`p0`='?','',IF(`p0`='Y','N','Y')),`p2`) AS `Yes Post`
   ,IF(`p3`='?','',`p3`) AS `Yes Email`
   ,IF(`p5`='?',IF(`p1`='?','',IF(`p1`='Y','N','Y')),`p5`) AS `Yes Winner Name`
   ,IF(`p4`='?','',`p4`) AS `Yes Telephone`
   ,'' AS `Yes Sms`
  FROM `Updates`
  ORDER BY `updated`,`client_ref_orig`,`Client Ref`
;


ALTER TABLE `Updates_ABC`
ADD PRIMARY KEY (`updated`,`client_ref_orig`,`milestone`,`Client Ref`)
;

