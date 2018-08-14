
CREATE OR REPLACE VIEW  `view_facilitys` AS
 (select `facilitys`.`id`,`facilitys`.`originalID`,`facilitys`.`longitude`,`facilitys`.`latitude`,
 	`facilitys`.`DHIScode`,`facilitys`.`facilitycode`,`facilitys`.`name`,`facilitys`.`newname`,`facilitys`.`burden`,
 	`facilitys`.`totalartmar`,`facilitys`.`totalartsep17`,`facilitys`.`asofdate`,`facilitys`.`totalartsep15` AS `totalartsep15`,
 	`facilitys`.`smsprinter`,`facilitys`.`Flag`,`facilitys`.`ART`,

 	`facilitys`.`is_viremia`, `facilitys`.`is_dsd`, `facilitys`.`is_otz`, `facilitys`.`is_men_clinic`,

 	`facilitys`.`ward_id`, `wards`.`name` AS `wardname`,`wards`.`WardDHISCode`,`wards`.`WardMFLCode`, 

 	`facilitys`.`district`, `facilitys`.`subcounty_id`,`districts`.`name` AS `subcounty`,
 	`districts`.`SubCountyDHISCode`,`districts`.`SubCountyMFLCode`,

 	`facilitys`.`partner`,`partners`.`name` AS `partnername`,`facilitys`.`partner2`,`partners`.`mech_id`,

 	`partners`.`funding_agency_id`, `funding_agencies`.`name` AS `funding_agency`,

 	`districts`.`county`,`countys`.`name` AS `countyname`,`countys`.`CountyDHISCode`,`countys`.`CountyMFLCode`,
 	`districts`.`province` AS `province`
 	
 	FROM `facilitys` 
 	LEFT JOIN `partners` on `facilitys`.`partner` = `partners`.`id`
 	LEFT JOIN `funding_agencies` on `partners`.`funding_agency_id` = `funding_agencies`.`id`
 	LEFT JOIN `districts` on `facilitys`.`subcounty_id` = `districts`.`id`
 	LEFT JOIN `wards` on `facilitys`.`ward_id` = `wards`.`id`
 	LEFT JOIN `countys` on `districts`.`county` = `countys`.`id`
 	WHERE `facilitys`.`Flag` = 1);
 