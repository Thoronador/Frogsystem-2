
-- create the table for the feedback issues

CREATE TABLE `fs2_feedback_issues` (
  `issue_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `content_type` VARCHAR( 255 ) NOT NULL,
  `content_id` MEDIUMINT NOT NULL,
  `status` TINYINT UNSIGNED NOT NULL
) ENGINE = MYISAM;


-- table for issue-related notes

CREATE TABLE `fs2_feedback_notes` (
  `note_id` MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `issue_id` MEDIUMINT UNSIGNED NOT NULL,
  `note_poster` VARCHAR( 32 ) NOT NULL,
  `note_poster_id` MEDIUMINT NOT NULL,
  `note_poster_ip` VARCHAR( 16 ) NOT NULL,
  `note_date` INT NOT NULL,
  `note_title` VARCHAR( 255 ) NOT NULL,
  `note_text` TEXT NOT NULL,
  `is_starter` TINYINT UNSIGNED NOT NULL,
  INDEX ( `issue_id` )
) ENGINE = MYISAM;


-- new admin CP category (might need to be modified, if you already have a group_id of 29)

INSERT INTO `fs2_admin_groups` (`group_id`, `group_title`, `menu_id`, `group_pos`)
VALUES (29 , 'Feedback', 'interactive', 3);

-- admin CP entry (might need to be modified)

INSERT INTO `fs2_admin_cp` (`page_id`, `group_id`, `page_title`, `page_link`, `page_file`, `page_pos`, `page_int_sub_perm`)
VALUES ('feedback_browse', 29, 'Liste der R&uuml;ckmeldungen', 'R&uuml;ckmeldungen', 'admin_feedback_browse.php', 1, 0);