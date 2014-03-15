-- --------------------------------------------------------

--
-- Table structure for `fs2_team`
--

DROP TABLE IF EXISTS `fs2_team`;
CREATE TABLE `fs2_team` (
  `user_id` MEDIUMINT NOT NULL,
  `position` VARCHAR(255) NOT NULL,
  `tasks` TEXT NOT NULL,
  `is_ex_member` TINYINT NOT NULL,
  `sort_order` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `is_ex_member` (`is_ex_member`),
  KEY `sort_order` (`sort_order`)
) ENGINE = MyISAM;


--
-- insert row into `fs2_admin_cp`
--

INSERT INTO `fs2_admin_cp` (`page_id`, `group_id`, `page_file`, `page_pos`, `page_int_sub_perm`) VALUES
('user_team', 'users', 'admin_user_team.php', 5, 0);
