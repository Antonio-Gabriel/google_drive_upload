create database google_drive_upload;
use google_drive_upload;

CREATE TABLE `drive_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_drive_file_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

drop table drive_files;

SELECT *FROM drive_files;
DELETE FROM drive_files WHERE id between 1 AND 20;