-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fs_team`
--

DROP TABLE IF EXISTS `fs_team`;
CREATE TABLE `fs_team` (
  `user_id` MEDIUMINT NOT NULL,
  `position` VARCHAR(255) NOT NULL,
  `tasks` TEXT NOT NULL,
  `is_ex_member` TINYINT NOT NULL,
  `sort_order` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `is_ex_member` (`is_ex_member`)
  KEY `sort_order` (`sort_order`),
) ENGINE = MyISAM;
