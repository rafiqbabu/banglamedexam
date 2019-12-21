SELECT *
FROM `sif_general_info`
ORDER BY `id` DESC
 LIMIT 1 
 Execution Time:0.0003960132598877

SELECT *
FROM `oe_doc_master`
WHERE `id` = '11' 
 Execution Time:0.00031089782714844

SELECT `N`.`id`
FROM `oe_notice` `N`
JOIN `oe_doc_notice` `DN` ON `DN`.`notice_id`=`N`.`id`
WHERE `DN`.`doc_id` = '11'
AND `N`.`status` = 1
AND `DN`.`status` =0
GROUP BY `N`.`id` 
 Execution Time:0.00034904479980469

SELECT *
FROM `oe_doc_purchases`
WHERE `doc_id` = '11'
AND `package_ids` IS NOT NULL
ORDER BY `created_at` DESC 
 Execution Time:0.00094294548034668

SELECT `E`.*, `P`.`name` `package_name`, `P`.`id` `package_id`, `PE`.`id` `pe_id`
FROM `oe_package_exams` `PE`
LEFT JOIN oe_exam E ON E.id = PE.exam_id
LEFT JOIN oe_package P ON P.id = PE.package_id
WHERE `PE`.`package_id` IN('6')
AND `E`.`subject_id` IN('13')
ORDER BY `PE`.`id` ASC 
 Execution Time:0.0015208721160889

SELECT `DE`.`ans_open_timeout`, `DE`.`status` `de_status`, `DE`.`id` `de_id`
FROM `oe_doc_exams` `DE`
WHERE `DE`.`purchase_id` = '703'
AND `DE`.`exam_id` = '604' 
 Execution Time:0.0060570240020752

SELECT `DE`.`ans_open_timeout`, `DE`.`status` `de_status`, `DE`.`id` `de_id`
FROM `oe_doc_exams` `DE`
WHERE `DE`.`purchase_id` = '703'
AND `DE`.`exam_id` = '714' 
 Execution Time:0.0065701007843018

SELECT `DE`.`ans_open_timeout`, `DE`.`status` `de_status`, `DE`.`id` `de_id`
FROM `oe_doc_exams` `DE`
WHERE `DE`.`purchase_id` = '703'
AND `DE`.`exam_id` = '351' 
 Execution Time:0.0069658756256104

SELECT `E`.*, `P`.`name` `package_name`, `P`.`id` `package_id`, `PE`.`id` `pe_id`
FROM `oe_package_exams` `PE`
LEFT JOIN oe_exam E ON E.id = PE.exam_id
LEFT JOIN oe_package P ON P.id = PE.package_id
WHERE `PE`.`package_id` IN('5')
AND `E`.`subject_id` IN('9')
ORDER BY `PE`.`id` ASC 
 Execution Time:0.00068902969360352

SELECT `DE`.`ans_open_timeout`, `DE`.`status` `de_status`, `DE`.`id` `de_id`
FROM `oe_doc_exams` `DE`
WHERE `DE`.`purchase_id` = '702'
AND `DE`.`exam_id` = '291' 
 Execution Time:0.0064291954040527

SELECT `E`.*, `P`.`name` `package_name`, `P`.`id` `package_id`, `PE`.`id` `pe_id`
FROM `oe_package_exams` `PE`
LEFT JOIN oe_exam E ON E.id = PE.exam_id
LEFT JOIN oe_package P ON P.id = PE.package_id
WHERE `PE`.`package_id` IN('6')
AND `E`.`subject_id` IN('37')
ORDER BY `PE`.`id` ASC 
 Execution Time:0.00083804130554199

SELECT `DE`.`ans_open_timeout`, `DE`.`status` `de_status`, `DE`.`id` `de_id`
FROM `oe_doc_exams` `DE`
WHERE `DE`.`purchase_id` = '701'
AND `DE`.`exam_id` = '384' 
 Execution Time:0.0066540241241455

SELECT `DE`.`ans_open_timeout`, `DE`.`status` `de_status`, `DE`.`id` `de_id`
FROM `oe_doc_exams` `DE`
WHERE `DE`.`purchase_id` = '701'
AND `DE`.`exam_id` = '581' 
 Execution Time:0.0065469741821289

SELECT `DE`.`ans_open_timeout`, `DE`.`status` `de_status`, `DE`.`id` `de_id`
FROM `oe_doc_exams` `DE`
WHERE `DE`.`purchase_id` = '701'
AND `DE`.`exam_id` = '691' 
 Execution Time:0.0066430568695068

SELECT `exam_category_name`
FROM `sif_exam_category`
WHERE `id` = '1' 
 Execution Time:0.00024008750915527

SELECT `subject`
FROM `sif_subject`
WHERE `id` = '13' 
 Execution Time:0.00014019012451172

SELECT `exam_category_name`
FROM `sif_exam_category`
WHERE `id` = '1' 
 Execution Time:0.00012111663818359

SELECT `subject`
FROM `sif_subject`
WHERE `id` = '13' 
 Execution Time:0.0001370906829834

SELECT `exam_category_name`
FROM `sif_exam_category`
WHERE `id` = '1' 
 Execution Time:0.00014090538024902

SELECT `subject`
FROM `sif_subject`
WHERE `id` = '13' 
 Execution Time:0.00010204315185547

SELECT `exam_category_name`
FROM `sif_exam_category`
WHERE `id` = '1' 
 Execution Time:0.00010800361633301

SELECT `subject`
FROM `sif_subject`
WHERE `id` = '9' 
 Execution Time:0.00010204315185547

SELECT `exam_category_name`
FROM `sif_exam_category`
WHERE `id` = '1' 
 Execution Time:0.00010085105895996

SELECT `subject`
FROM `sif_subject`
WHERE `id` = '37' 
 Execution Time:9.7990036010742E-5

SELECT `exam_category_name`
FROM `sif_exam_category`
WHERE `id` = '1' 
 Execution Time:9.9897384643555E-5

SELECT `subject`
FROM `sif_subject`
WHERE `id` = '37' 
 Execution Time:0.00012993812561035

SELECT `exam_category_name`
FROM `sif_exam_category`
WHERE `id` = '1' 
 Execution Time:0.00012493133544922

SELECT `subject`
FROM `sif_subject`
WHERE `id` = '37' 
 Execution Time:0.00011610984802246

