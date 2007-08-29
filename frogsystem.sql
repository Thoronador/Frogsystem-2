-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 29, 2007 at 01:24 PM
-- Server version: 5.0.37
-- PHP Version: 5.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `frogsystem`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_admin_cp`
-- 

DROP TABLE IF EXISTS `fs_admin_cp`;
CREATE TABLE `fs_admin_cp` (
  `id` mediumint(8) NOT NULL auto_increment,
  `page_call` varchar(255) NOT NULL default '',
  `page_title` varchar(255) NOT NULL default '',
  `link_title` varchar(255) NOT NULL default '',
  `permission` varchar(255) NOT NULL default '',
  `file` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

-- 
-- Dumping data for table `fs_admin_cp`
-- 

INSERT INTO `fs_admin_cp` (`id`, `page_call`, `page_title`, `link_title`, `permission`, `file`) VALUES 
(1, 'allconfig', 'KONFIGURATION', 'Konfiguration', 'perm_allconfig', 'admin_allconfig.php'),
(2, 'allannouncement', 'ANKÜNDIGUNG', 'Ankündigung', 'perm_allannouncement', 'admin_allannouncement.php'),
(3, 'allphpinfo', 'PHP INFO', 'PHP Info', 'perm_allphpinfo', 'admin_allphpinfo.php'),
(4, 'newsadd', 'NEWS HINZUFÜGEN', 'schreiben', 'perm_newsadd', 'admin_newsadd.php'),
(5, 'newsedit', 'NEWS ARCHIV', 'bearbeiten', 'perm_newsedit', 'admin_newsedit.php'),
(6, 'commentedit', 'KOMMENTAR EDITIEREN', '', 'perm_newsedit', 'admin_commentedit.php'),
(7, 'news_cat_manage', 'KATEGORIE VERWALTEN', 'Kategorien verwalten', 'perm_newscat', 'admin_news_cat_manage.php'),
(8, 'news_cat_create', 'KATEGORIE HINZUFÜGEN', 'Kategorie hinzufügen', 'perm_newscatadd', 'admin_news_cat_create.php'),
(9, 'newsconfig', 'NEWS KONFIGURATION', 'Konfiguration', 'perm_newsconfig', 'admin_newsconfig.php'),
(10, 'dladd', 'DOWNLOAD HINZUFÜGEN', 'hinzufügen', 'perm_dladd', 'admin_dladd.php'),
(11, 'dledit', 'DOWNLOAD BEARBEITEN', 'bearbeiten', 'perm_dledit', 'admin_dledit.php'),
(12, 'dlcat', 'DOWNLOAD KATEGORIEN', 'Kategorien', 'perm_dlcat', 'admin_dlcat.php'),
(13, 'dlnewcat', 'DOWNLOAD KATEGORIE HINZUFÜGEN', 'Neue Kategorie', 'perm_dlcatadd', 'admin_dlnewcat.php'),
(14, 'dlconfig', 'DOWNLOAD KONFIGURATION', 'Konfiguration', 'perm_dlconfig', 'admin_dlconfig.php'),
(15, 'polladd', 'UMFRAGE HINZUFÜGEN', 'hinzufügen', 'perm_polladd', 'admin_polladd.php'),
(16, 'polledit', 'UMFRAGEN ARCHIV', 'bearbeiten', 'perm_polledit', 'admin_polledit.php'),
(17, 'randompic_cat', 'ZUFALLSBILD KATEGORIE AUSWAHL', 'Kategorie Auswahl', 'perm_randomcat', 'admin_randompic_cat.php'),
(19, 'screenadd', 'SCREENSHOT HINZUFÜGEN', 'Bild hinzufügen', 'perm_screenadd', 'admin_screenadd.php'),
(20, 'screenedit', 'SCREENSHOT ÜBERSICHT', 'Übersicht', 'perm_screenedit', 'admin_screenedit.php'),
(21, 'screencat', 'GALERIE KATEGORIEN', 'alle Kategorien', 'perm_gallerycat', 'admin_screencat.php'),
(22, 'screennewcat', 'GALERIE KATEGORIE HINZUFÜGEN', 'neue Kategorie', 'perm_gallerycatadd', 'admin_screennewcat.php'),
(23, 'screenconfig', 'GALERIE KONFIGURATION', 'Konfiguration', 'perm_galleryconfig', 'admin_screenconfig.php'),
(24, 'wallpaperadd', 'WALLPAPER HINZUFÜGEN', 'hinzufügen', 'perm_wpadd', 'admin_wallpaperadd.php'),
(25, 'wallpaperedit', 'WALLPAPER BEARBEITEN', 'bearbeiten', 'perm_wpedit', 'admin_wallpaperedit.php'),
(26, 'shopadd', 'ARTIKEL HINZUFÜGEN', 'Artikel hinzufügen', 'perm_shopadd', 'admin_shopadd.php'),
(27, 'shopedit', 'ARTIKEL ÜBERSICHT', 'Übersicht', 'perm_shopedit', 'admin_shopedit.php'),
(74, 'map', 'COMMUNITY MAP BEARBEITEN', '', 'perm_map', 'admin_map.php'),
(29, 'statview', 'STATISTIK ANZEIGEN', 'anzeigen', 'perm_statview', 'admin_statview.php'),
(30, 'statedit', 'STATISTIK BEARBEITEN', 'bearbeiten', 'perm_statedit', 'admin_statedit.php'),
(31, 'statref', 'REFERRER ANZEIGEN', 'Referrer', 'perm_statref', 'admin_statref.php'),
(32, 'statspace', 'SPEICHERPLATZ STATISTIK', 'Speicherplatz', 'perm_statspace', 'admin_statspace.php'),
(33, 'useradd', 'USER HINZUFÜGEN', 'hinzufügen', 'perm_useradd', 'admin_useradd.php'),
(34, 'useredit', 'USER BEARBEITEN', 'bearbeiten', 'perm_useredit', 'admin_useredit.php'),
(35, 'userrights', 'USER RECHTE', 'Rechte', 'perm_userrights', 'admin_userrights.php'),
(36, 'artikeladd', 'ARTIKEL SCHREIBEN', 'schreiben', 'perm_artikeladd', 'admin_artikeladd.php'),
(37, 'artikeledit', 'ARTIKEL BEARBEITEN', 'editieren', 'perm_artikeledit', 'admin_artikeledit.php'),
(38, 'cimgadd', 'BILDER HOCHLADEN', 'hochladen', 'perm_cimgadd', 'admin_cimg.php'),
(39, 'cimgdel', 'BILDER LÖSCHEN', 'löschen', 'perm_cimgedit', 'admin_cimgdel.php'),
(40, 'artikeltemplate', 'ARTIKEL TEMPLATE BEARBEITEN', 'Artikel', 'perm_template_artikel', 'admin_template_artikel.php'),
(41, 'polltemplate', 'UMFRAGEN TEMPLATE BEARBEITEN', 'Umfragen', 'perm_template_poll', 'admin_template_poll.php'),
(42, 'randompictemplate', 'ZUFALLSBILD TEMPLATE BEARBEITEN', 'Zufallsbild', 'perm_template_random', 'admin_template_randompic.php'),
(43, 'shoptemplate', 'SHOP TEMPLATE BEARBEITEN', 'Shop', 'perm_template_shop', 'admin_template_shop.php'),
(44, 'newstemplate', 'NEWS TEMPLATE BEARBEITEN', 'News', 'perm_template_news', 'admin_template_news.php'),
(45, 'alltemplate', 'ALLGEMEINE TEMPLATES BEARBEITEN', 'Allgemein', 'perm_template_all', 'admin_template_all.php'),
(46, 'dltemplate', 'DOWNLOAD TEMPLATE BEARBEITEN', 'Downloads', 'perm_template_dl', 'admin_template_dl.php'),
(47, 'screenshottemplate', 'SCREENSHOT TEMPLATE BEARBEITEN', 'Screenshots', 'perm_template_gallery', 'admin_template_screenshot.php'),
(48, 'usertemplate', 'USER TEMPLATE BEARBEITEN', 'User', 'perm_template_user', 'admin_template_user.php'),
(49, 'csstemplate', 'CSS DATEI BEARBEITEN', 'CSS bearbeiten', 'perm_template_css', 'admin_template_css.php'),
(50, 'template_manage', 'DESIGNS VERWALTEN', 'verwalten', 'perm_designedit', 'admin_template_manage.php'),
(51, 'template_create', 'DESIGN ERSTELLEN', 'erstellen', 'perm_designadd', 'admin_template_create.php'),
(52, 'emailtemplate', 'E-MAILS BEARBEITEN', 'E-Mails', 'perm_template_email', 'admin_template_email.php'),
(53, 'profil', 'PROFIL BEARBEITEN', 'bearbeiten', 'perm_profiledit', 'admin_profil.php'),
(54, 'partneradd', 'PARTNER HINZUFÜGEN', 'hinzufügen', 'perm_partneradd', 'admin_partneradd.php'),
(55, 'partneredit', 'PARTNER EDITIEREN', 'bearbeiten', 'perm_partneredit', 'admin_partneredit.php'),
(56, 'partnerconfig', 'PARTNERSEITEN EINSTELLUNGEN', 'Konfiguration', 'perm_partnerconfig', 'admin_partnerconfig.php'),
(57, 'partnertemplate', 'PARTNER TEMPLATE BEARBEITEN', 'Partnerseiten', 'perm_template_partner', 'admin_template_partner.php'),
(58, 'includes_new', 'INCLUDE HINZUFÜGEN', 'hinzufügen', 'perm_includesadd', 'admin_includes_new.php'),
(59, 'includes_edit', 'INCLUDES BEARBEITEN', 'bearbeiten', 'perm_includesedit', 'admin_includes_edit.php'),
(60, 'zone_create', 'ZONE ERSTELLEN', 'erstellen', 'perm_zoneadd', 'admin_zone_create.php'),
(61, 'zone_manage', 'ZONEN VERWALTEN', 'verwalten', 'perm_zoneedit', 'admin_zone_manage.php'),
(62, 'zone_config', 'ZONEN EINSTELLUNGEN', 'Konfiguration', 'perm_zoneconfig', 'admin_zone_config.php'),
(63, 'press_add', 'PRESSEVERÖFFENTLICHUNG EINTRAGEN', 'eintragen', 'perm_pressadd', 'admin_press_add.php'),
(64, 'press_edit', 'PRESSEVERÖFFENTLICHUNG EDITIEREN', 'bearbeiten', 'perm_pressedit', 'admin_press_edit.php'),
(65, 'randompic_time', 'ZEITGESTEUERTE ZUFALLSBILDER  ÜBERSICHT', 'zeitgest. ZBs bearbeiten', 'perm_randomedit', 'admin_randompic_time.php'),
(66, 'randompic_time_add', 'ZEITGESTEUERTES ZUFALLSBILD HINZUF&Uuml;GEN', 'Zeitgesteuerte ZBs', 'perm_randomadd', 'admin_randompic_time_add.php'),
(67, 'randompic_config', 'ZUFALLSBILD KONFIGURATION', 'Konfiguration', 'perm_randomconfig', 'admin_randompic_config.php'),
(68, 'userlist', 'MITGLIEDERLISTE KONFIGURIEREN', 'Mitgliederliste', 'perm_userlistconfig', 'admin_userlist.php'),
(69, 'map&amp;landid=1', '', 'Deutschland', 'perm_map', ''),
(70, 'map&amp;landid=2', '', 'Schweiz', 'perm_map', ''),
(75, 'logout', 'LOGOUT', 'Logout', '1', 'admin_logout.php'),
(71, 'map&amp;landid=3', '', 'Österreich', 'perm_map', ''),
(76, 'editorsmilies', 'SMILIES VERWALTEN', 'Smilies', 'perm_editorsmilies', 'admin_editor_smilies.php'),
(73, 'login', 'LOGIN', 'Login', '1', 'admin_login.php'),
(77, 'editorconfig', 'EDITOR KONFIGURATION', 'Konfiguration', 'perm_editorconfig', 'admin_editor_config.php'),
(78, 'editordesign', 'EDITOR DARSTELLUNG', 'Darstellung', 'perm_editordesign', 'admin_editor_design.php'),
(79, 'editorfscode', 'FS CODE VERWALTUNG', 'FS-Codes', 'perm_editorfscodes', 'admin_editor_fscode.php'),
(80, 'wallpapertemplate', 'WALLPAPER TEMPLATE BEARBEITEN  ', 'Wallpaper', 'perm_template_wp', 'admin_template_wallpaper.php'),
(81, 'language', 'SPRACHVERWALTUNG', 'Sprachverwaltung', 'perm_langconfig', 'admin_language.php'),
(82, 'press_cat', 'KATEGORIENVERWALTUNG', 'Kategorien', 'perm_presscat', 'admin_press_cat.php'),
(83, 'game', 'SPIELVERWALTUNG', 'Spiele', 'perm_gameconfig', 'admin_game.php');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_announcement`
-- 

DROP TABLE IF EXISTS `fs_announcement`;
CREATE TABLE `fs_announcement` (
  `text` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_announcement`
-- 

INSERT INTO `fs_announcement` (`text`) VALUES 
('Dies ist eine Test-Ankündigung!');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_artikel`
-- 

DROP TABLE IF EXISTS `fs_artikel`;
CREATE TABLE `fs_artikel` (
  `artikel_url` varchar(100) NOT NULL default '',
  `artikel_title` varchar(100) default NULL,
  `artikel_date` int(11) default NULL,
  `artikel_user` varchar(100) default NULL,
  `artikel_text` mediumtext,
  `artikel_index` tinyint(4) default NULL,
  `artikel_fscode` tinyint(4) default NULL,
  PRIMARY KEY  (`artikel_url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_artikel`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_cmap_user`
-- 

DROP TABLE IF EXISTS `fs_cmap_user`;
CREATE TABLE `fs_cmap_user` (
  `user_id` mediumint(8) NOT NULL auto_increment,
  `land_id` tinyint(2) default NULL,
  `user_name` char(100) default NULL,
  `x_pos` smallint(5) default NULL,
  `y_pos` smallint(5) default NULL,
  `user_ort` char(100) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_cmap_user`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_counter`
-- 

DROP TABLE IF EXISTS `fs_counter`;
CREATE TABLE `fs_counter` (
  `visits` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `user` mediumint(8) unsigned NOT NULL default '0',
  `artikel` smallint(6) unsigned NOT NULL default '0',
  `news` smallint(6) unsigned NOT NULL default '0',
  `comments` mediumint(8) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_counter`
-- 

INSERT INTO `fs_counter` (`visits`, `hits`, `user`, `artikel`, `news`, `comments`) VALUES 
(2, 421, 2, 0, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_counter_ref`
-- 

DROP TABLE IF EXISTS `fs_counter_ref`;
CREATE TABLE `fs_counter_ref` (
  `ref_url` char(255) default NULL,
  `ref_count` int(11) default NULL,
  `ref_date` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_counter_ref`
-- 

INSERT INTO `fs_counter_ref` (`ref_url`, `ref_count`, `ref_date`) VALUES 
('http://localhost/fs/', 6, 1188241983),
('http://localhost/fs/admin/', 2, 1188241989),
('http://localhost/fs/admin/?mid=general', 24, 1188241991),
('http://localhost/fs/admin/?mid=general&go=emailtemplate', 1, 1188241995),
('http://localhost/fs/admin/?mid=general&go=editorfscode', 2, 1188241996),
('http://localhost/fs/admin/?mid=general&go=editorsmilies', 2, 1188241997),
('http://localhost/fs/admin/?mid=general&go=statview', 1, 1188242105),
('http://localhost/fs/admin/?mid=content', 17, 1188242107),
('http://localhost/fs/admin/?mid=content&go=press_edit', 5, 1188242108),
('http://localhost/fs/admin/?mid=content&go=press_add', 13, 1188242778),
('http://localhost/fs/admin/?mid=user', 1, 1188243413),
('http://localhost/fs/admin/?mid=user&go=userrights', 1, 1188243444),
('http://localhost/fs/admin/?mid=general&go=language', 45, 1188245780),
('http://localhost/fs/admin/?mid=general&go=allconfig', 1, 1188245857),
('http://localhost/fs/admin/?mid=general&go=editorconfig', 1, 1188245859),
('http://localhost/fs/admin/?mid=content&go=artikeledit', 1, 1188246157),
('http://localhost/fs/admin/?PHPSESSID=', 2, 1188317608),
('http://localhost/fs/admin/?go=press_add', 3, 1188319083),
('http://localhost/fs/admin/index.php', 116, 1188319193),
('http://localhost/fs/admin/index.php?mid=content', 28, 1188319213),
('http://localhost/fs/admin/index.php?mid=content&go=press_add', 22, 1188319215),
('http://localhost/fs/admin/index.php?mid=content&go=press_edit', 25, 1188319544),
('http://localhost/fs/admin/index.php?mid=general', 5, 1188320917),
('http://localhost/fs/admin/index.php?mid=general&go=language', 5, 1188320920),
('http://localhost/fs/admin/index.php?go=press_edit&mid=content', 1, 1188380964),
('http://localhost/fs/admin/index.php?go=press_edit&mid=content&PHPSESSID=&catid=1', 1, 1188380981),
('http://localhost/fs/admin/index.php?mid=user', 1, 1188381796),
('http://localhost/fs/admin/index.php?mid=user&go=useradd', 2, 1188381803),
('http://localhost/fs/admin/index.php?mid=user&go=userrights', 1, 1188381855),
('http://localhost/fs/admin/index.php?mid=user&go=userlist', 2, 1188381857),
('http://localhost/fs/admin/index.php?mid=content&go=press_cat', 10, 1188382309),
('http://localhost/fs/admin/index.php?mid=content&go=press_game', 11, 1188382312),
('http://localhost/fs/admin/index.php?mid=content&PHPSESSID=', 2, 1188384370),
('http://localhost/fs/admin/index.php?mid=media', 1, 1188384558),
('http://localhost/fs/admin/index.php?mid=media&go=screencat', 1, 1188385229),
('http://localhost/fs/admin/index.php?mid=content&go=language', 3, 1188385233),
('http://localhost/fs/admin/index.php?mid=content&go=game', 13, 1188385334);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_counter_stat`
-- 

DROP TABLE IF EXISTS `fs_counter_stat`;
CREATE TABLE `fs_counter_stat` (
  `s_year` int(4) default NULL,
  `s_month` int(2) default NULL,
  `s_day` int(2) default NULL,
  `s_visits` int(11) default NULL,
  `s_hits` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_counter_stat`
-- 

INSERT INTO `fs_counter_stat` (`s_year`, `s_month`, `s_day`, `s_visits`, `s_hits`) VALUES 
(2007, 8, 27, 1, 88),
(2007, 8, 28, 0, 105),
(2007, 8, 29, 1, 228);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_dl`
-- 

DROP TABLE IF EXISTS `fs_dl`;
CREATE TABLE `fs_dl` (
  `dl_id` mediumint(8) NOT NULL auto_increment,
  `cat_id` mediumint(8) default NULL,
  `user_id` mediumint(8) default NULL,
  `dl_date` int(11) default NULL,
  `dl_name` varchar(100) default NULL,
  `dl_text` text,
  `dl_autor` varchar(100) default NULL,
  `dl_autor_url` varchar(255) default NULL,
  `dl_open` tinyint(4) default NULL,
  PRIMARY KEY  (`dl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_dl`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_dl_cat`
-- 

DROP TABLE IF EXISTS `fs_dl_cat`;
CREATE TABLE `fs_dl_cat` (
  `cat_id` mediumint(8) NOT NULL auto_increment,
  `subcat_id` mediumint(8) NOT NULL default '0',
  `cat_name` char(100) default NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `fs_dl_cat`
-- 

INSERT INTO `fs_dl_cat` (`cat_id`, `subcat_id`, `cat_name`) VALUES 
(1, 0, 'Downloads');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_dl_config`
-- 

DROP TABLE IF EXISTS `fs_dl_config`;
CREATE TABLE `fs_dl_config` (
  `screen_x` int(11) default NULL,
  `screen_y` int(11) default NULL,
  `thumb_x` int(11) default NULL,
  `thumb_y` int(11) default NULL,
  `quickinsert` varchar(255) NOT NULL default '',
  `dl_rights` tinyint(1) NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_dl_config`
-- 

INSERT INTO `fs_dl_config` (`screen_x`, `screen_y`, `thumb_x`, `thumb_y`, `quickinsert`, `dl_rights`) VALUES 
(1024, 768, 120, 90, 'http://ftp.worldofplayers.net/frogsystem/', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_dl_files`
-- 

DROP TABLE IF EXISTS `fs_dl_files`;
CREATE TABLE `fs_dl_files` (
  `dl_id` mediumint(8) default NULL,
  `file_id` mediumint(8) NOT NULL auto_increment,
  `file_count` mediumint(8) NOT NULL default '0',
  `file_name` varchar(100) default NULL,
  `file_url` varchar(255) default NULL,
  `file_size` mediumint(8) NOT NULL default '0',
  `file_is_mirror` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_dl_files`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_editor_config`
-- 

DROP TABLE IF EXISTS `fs_editor_config`;
CREATE TABLE `fs_editor_config` (
  `id` tinyint(1) NOT NULL default '1',
  `smilies_rows` int(2) NOT NULL,
  `smilies_cols` int(2) NOT NULL,
  `textarea_width` int(3) NOT NULL,
  `textarea_height` int(3) NOT NULL,
  `bold` tinyint(1) NOT NULL default '0',
  `italic` tinyint(1) NOT NULL default '0',
  `underline` tinyint(1) NOT NULL default '0',
  `strike` tinyint(1) NOT NULL default '0',
  `center` tinyint(1) NOT NULL default '0',
  `font` tinyint(1) NOT NULL default '0',
  `color` tinyint(1) NOT NULL default '0',
  `size` tinyint(1) NOT NULL default '0',
  `list` tinyint(1) NOT NULL,
  `numlist` tinyint(1) NOT NULL,
  `img` tinyint(1) NOT NULL default '0',
  `cimg` tinyint(1) NOT NULL default '0',
  `url` tinyint(1) NOT NULL default '0',
  `home` tinyint(1) NOT NULL default '0',
  `email` tinyint(1) NOT NULL default '0',
  `code` tinyint(1) NOT NULL default '0',
  `quote` tinyint(1) NOT NULL default '0',
  `noparse` tinyint(1) NOT NULL default '0',
  `smilies` tinyint(1) NOT NULL default '0',
  `do_bold` tinyint(1) NOT NULL,
  `do_italic` tinyint(1) NOT NULL,
  `do_underline` tinyint(1) NOT NULL,
  `do_strike` tinyint(1) NOT NULL,
  `do_center` tinyint(1) NOT NULL,
  `do_font` tinyint(1) NOT NULL,
  `do_color` tinyint(1) NOT NULL,
  `do_size` tinyint(1) NOT NULL,
  `do_list` tinyint(1) NOT NULL,
  `do_numlist` tinyint(1) NOT NULL,
  `do_img` tinyint(1) NOT NULL,
  `do_cimg` tinyint(1) NOT NULL,
  `do_url` tinyint(1) NOT NULL,
  `do_home` tinyint(1) NOT NULL,
  `do_email` tinyint(1) NOT NULL,
  `do_code` tinyint(1) NOT NULL,
  `do_quote` tinyint(1) NOT NULL,
  `do_noparse` tinyint(1) NOT NULL,
  `do_smilies` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_editor_config`
-- 

INSERT INTO `fs_editor_config` (`id`, `smilies_rows`, `smilies_cols`, `textarea_width`, `textarea_height`, `bold`, `italic`, `underline`, `strike`, `center`, `font`, `color`, `size`, `list`, `numlist`, `img`, `cimg`, `url`, `home`, `email`, `code`, `quote`, `noparse`, `smilies`, `do_bold`, `do_italic`, `do_underline`, `do_strike`, `do_center`, `do_font`, `do_color`, `do_size`, `do_list`, `do_numlist`, `do_img`, `do_cimg`, `do_url`, `do_home`, `do_email`, `do_code`, `do_quote`, `do_noparse`, `do_smilies`) VALUES 
(1, 5, 2, 357, 120, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_game`
-- 

DROP TABLE IF EXISTS `fs_game`;
CREATE TABLE `fs_game` (
  `game_id` smallint(6) unsigned NOT NULL auto_increment,
  `game_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`game_id`),
  UNIQUE KEY `game_name` (`game_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `fs_game`
-- 

INSERT INTO `fs_game` (`game_id`, `game_name`) VALUES 
(1, 'Spiel1'),
(2, 'Spiel2');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_global_config`
-- 

DROP TABLE IF EXISTS `fs_global_config`;
CREATE TABLE `fs_global_config` (
  `id` tinyint(1) NOT NULL default '1',
  `virtualhost` varchar(255) NOT NULL default '',
  `admin_mail` varchar(100) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `keywords` varchar(255) NOT NULL default '',
  `author` varchar(100) NOT NULL default '',
  `show_favicon` tinyint(1) NOT NULL default '1',
  `design` tinyint(4) NOT NULL default '0',
  `allow_other_designs` tinyint(1) NOT NULL default '1',
  `show_announcement` tinyint(1) NOT NULL default '0',
  `date` varchar(255) NOT NULL,
  `page` text NOT NULL,
  `page_next` varchar(255) NOT NULL,
  `page_prev` varchar(255) NOT NULL,
  `registration_antispam` tinyint(1) NOT NULL,
  `random_timed_deltime` int(12) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_global_config`
-- 

INSERT INTO `fs_global_config` (`id`, `virtualhost`, `admin_mail`, `title`, `description`, `keywords`, `author`, `show_favicon`, `design`, `allow_other_designs`, `show_announcement`, `date`, `page`, `page_next`, `page_prev`, `registration_antispam`, `random_timed_deltime`) VALUES 
(1, '', '', 'Frogsystem 2', 'Frogsystem 2 - Your Way to Nature', 'CMS, Content, Management, System, Frog, Alix', 'Kermit, Sweil, rockfest, Wal, Don-Esteban, Fizzban', 1, 0, 1, 2, 'd.m.Y', '{prev}Seite {page_number} von {total_pages}{next}', '<a href=\\"{url}\\"> »</a>', '<a href=\\"{url}\\">« </a>', 1, 604800);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_includes`
-- 

DROP TABLE IF EXISTS `fs_includes`;
CREATE TABLE `fs_includes` (
  `id` mediumint(8) NOT NULL auto_increment,
  `replace_string` varchar(255) NOT NULL default '',
  `replace_thing` text NOT NULL,
  `include_type` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_includes`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_iplist`
-- 

DROP TABLE IF EXISTS `fs_iplist`;
CREATE TABLE `fs_iplist` (
  `deltime` int(20) default NULL,
  `ip` varchar(18) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_iplist`
-- 

INSERT INTO `fs_iplist` (`deltime`, `ip`) VALUES 
(1188377998, '127.0.0.1');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_language`
-- 

DROP TABLE IF EXISTS `fs_language`;
CREATE TABLE `fs_language` (
  `lang_id` smallint(6) unsigned NOT NULL auto_increment,
  `lang_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`lang_id`),
  UNIQUE KEY `lang_name` (`lang_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `fs_language`
-- 

INSERT INTO `fs_language` (`lang_id`, `lang_name`) VALUES 
(9, 'English'),
(2, 'German'),
(4, 'Spanish'),
(5, 'Polish'),
(7, 'Greek'),
(8, 'Italian');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_news`
-- 

DROP TABLE IF EXISTS `fs_news`;
CREATE TABLE `fs_news` (
  `news_id` mediumint(8) NOT NULL auto_increment,
  `cat_id` smallint(6) default NULL,
  `user_id` mediumint(8) default NULL,
  `news_date` int(11) default NULL,
  `news_title` varchar(100) default NULL,
  `news_text` text,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `fs_news`
-- 

INSERT INTO `fs_news` (`news_id`, `cat_id`, `user_id`, `news_date`, `news_title`, `news_text`) VALUES 
(1, 1, 1, 1187550600, 'Herzlich Willkommen!', '[b]Hallo Webmaster![/b]\r\n\r\nDiese News möchte dich herzlichst in deinem frisch installierten Frogsystem 2 (Alix1-Release) Willkommen heißen! Viel Spaß damit! :-)');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_news_cat`
-- 

DROP TABLE IF EXISTS `fs_news_cat`;
CREATE TABLE `fs_news_cat` (
  `cat_id` smallint(6) NOT NULL auto_increment,
  `cat_name` varchar(100) default NULL,
  `cat_description` text NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `fs_news_cat`
-- 

INSERT INTO `fs_news_cat` (`cat_id`, `cat_name`, `cat_description`) VALUES 
(1, 'Neuigkeiten', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_news_comments`
-- 

DROP TABLE IF EXISTS `fs_news_comments`;
CREATE TABLE `fs_news_comments` (
  `comment_id` mediumint(8) NOT NULL auto_increment,
  `news_id` mediumint(8) default NULL,
  `comment_poster` varchar(32) default NULL,
  `comment_poster_id` mediumint(8) default NULL,
  `comment_date` int(11) default NULL,
  `comment_title` varchar(100) default NULL,
  `comment_text` text,
  PRIMARY KEY  (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_news_comments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_news_config`
-- 

DROP TABLE IF EXISTS `fs_news_config`;
CREATE TABLE `fs_news_config` (
  `num_news` int(11) default NULL,
  `num_head` int(11) default NULL,
  `html_code` tinyint(4) default NULL,
  `fs_code` tinyint(4) default NULL,
  `para_handling` tinyint(4) default NULL,
  `cat_pic_x` mediumint(4) NOT NULL default '0',
  `cat_pic_y` mediumint(4) NOT NULL default '0',
  `com_rights` tinyint(1) NOT NULL default '1',
  `com_antispam` tinyint(1) NOT NULL default '1',
  `com_sort` varchar(40) NOT NULL default 'DESC'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_news_config`
-- 

INSERT INTO `fs_news_config` (`num_news`, `num_head`, `html_code`, `fs_code`, `para_handling`, `cat_pic_x`, `cat_pic_y`, `com_rights`, `com_antispam`, `com_sort`) VALUES 
(10, 6, 2, 4, 2, 150, 150, 2, 1, 'desc');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_news_links`
-- 

DROP TABLE IF EXISTS `fs_news_links`;
CREATE TABLE `fs_news_links` (
  `news_id` mediumint(8) default NULL,
  `link_id` mediumint(8) NOT NULL auto_increment,
  `link_name` varchar(100) default NULL,
  `link_url` varchar(255) default NULL,
  `link_target` tinyint(4) default NULL,
  PRIMARY KEY  (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_news_links`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_partner`
-- 

DROP TABLE IF EXISTS `fs_partner`;
CREATE TABLE `fs_partner` (
  `partner_id` smallint(3) unsigned NOT NULL auto_increment,
  `partner_name` varchar(150) NOT NULL default '',
  `partner_link` varchar(250) NOT NULL default '',
  `partner_beschreibung` text NOT NULL,
  `partner_permanent` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`partner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_partner`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_partner_config`
-- 

DROP TABLE IF EXISTS `fs_partner_config`;
CREATE TABLE `fs_partner_config` (
  `partner_anzahl` tinyint(2) NOT NULL default '0',
  `small_x` int(11) NOT NULL default '0',
  `small_y` int(11) NOT NULL default '0',
  `small_allow` tinyint(1) NOT NULL default '0',
  `big_x` int(11) NOT NULL default '0',
  `big_y` int(11) NOT NULL default '0',
  `big_allow` tinyint(1) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_partner_config`
-- 

INSERT INTO `fs_partner_config` (`partner_anzahl`, `small_x`, `small_y`, `small_allow`, `big_x`, `big_y`, `big_allow`) VALUES 
(5, 88, 31, 1, 468, 60, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_permissions`
-- 

DROP TABLE IF EXISTS `fs_permissions`;
CREATE TABLE `fs_permissions` (
  `user_id` mediumint(8) NOT NULL,
  `perm_allannouncement` tinyint(1) NOT NULL default '0',
  `perm_allconfig` tinyint(1) NOT NULL default '0',
  `perm_allphpinfo` tinyint(1) NOT NULL default '0',
  `perm_artikeladd` tinyint(1) NOT NULL default '0',
  `perm_artikeledit` tinyint(1) NOT NULL default '0',
  `perm_cimgadd` tinyint(1) NOT NULL default '0',
  `perm_cimgedit` tinyint(1) NOT NULL default '0',
  `perm_designadd` tinyint(1) NOT NULL default '0',
  `perm_designedit` tinyint(1) NOT NULL default '0',
  `perm_dladd` tinyint(1) NOT NULL default '0',
  `perm_dlcat` tinyint(1) NOT NULL default '0',
  `perm_dlcatadd` tinyint(1) NOT NULL default '0',
  `perm_dlconfig` tinyint(1) NOT NULL default '0',
  `perm_dledit` tinyint(1) NOT NULL default '0',
  `perm_editorconfig` tinyint(1) NOT NULL default '0',
  `perm_editordesign` tinyint(1) NOT NULL default '0',
  `perm_editorfscodes` tinyint(1) NOT NULL default '0',
  `perm_editorsmilies` tinyint(1) NOT NULL default '0',
  `perm_gallerycat` tinyint(1) NOT NULL default '0',
  `perm_gallerycatadd` tinyint(1) NOT NULL default '0',
  `perm_galleryconfig` tinyint(1) NOT NULL default '0',
  `perm_includesadd` tinyint(1) NOT NULL default '0',
  `perm_includesedit` tinyint(1) NOT NULL default '0',
  `perm_map` tinyint(1) NOT NULL default '0',
  `perm_newsadd` tinyint(1) NOT NULL default '0',
  `perm_newscat` tinyint(1) NOT NULL default '0',
  `perm_newscatadd` tinyint(1) NOT NULL default '0',
  `perm_newsconfig` tinyint(1) NOT NULL default '0',
  `perm_newsedit` tinyint(1) NOT NULL default '0',
  `perm_partneradd` tinyint(1) NOT NULL default '0',
  `perm_partnerconfig` tinyint(1) NOT NULL default '0',
  `perm_partneredit` tinyint(1) NOT NULL default '0',
  `perm_polladd` tinyint(1) NOT NULL default '0',
  `perm_polledit` tinyint(1) NOT NULL default '0',
  `perm_pressadd` tinyint(1) NOT NULL default '0',
  `perm_pressedit` tinyint(1) NOT NULL default '0',
  `perm_profiledit` tinyint(1) NOT NULL default '0',
  `perm_randomadd` tinyint(1) NOT NULL default '0',
  `perm_randomcat` tinyint(1) NOT NULL default '0',
  `perm_randomconfig` tinyint(1) NOT NULL default '0',
  `perm_randomedit` tinyint(1) NOT NULL default '0',
  `perm_screenadd` tinyint(1) NOT NULL default '0',
  `perm_screenedit` tinyint(1) NOT NULL default '0',
  `perm_shopadd` tinyint(1) NOT NULL default '0',
  `perm_shopedit` tinyint(1) NOT NULL default '0',
  `perm_statedit` tinyint(1) NOT NULL default '0',
  `perm_statref` tinyint(1) NOT NULL default '0',
  `perm_statspace` tinyint(1) NOT NULL default '0',
  `perm_statview` tinyint(1) NOT NULL default '0',
  `perm_template_all` tinyint(1) NOT NULL default '0',
  `perm_template_artikel` tinyint(1) NOT NULL default '0',
  `perm_template_css` tinyint(1) NOT NULL default '0',
  `perm_template_dl` tinyint(1) NOT NULL default '0',
  `perm_template_email` tinyint(1) NOT NULL default '0',
  `perm_template_gallery` tinyint(1) NOT NULL default '0',
  `perm_template_news` tinyint(1) NOT NULL default '0',
  `perm_template_partner` tinyint(1) NOT NULL default '0',
  `perm_template_poll` tinyint(1) NOT NULL default '0',
  `perm_template_random` tinyint(1) NOT NULL default '0',
  `perm_template_shop` tinyint(1) NOT NULL default '0',
  `perm_template_user` tinyint(1) NOT NULL default '0',
  `perm_template_wp` tinyint(1) NOT NULL default '0',
  `perm_useradd` tinyint(1) NOT NULL default '0',
  `perm_useredit` tinyint(1) NOT NULL default '0',
  `perm_userlistconfig` tinyint(1) NOT NULL default '0',
  `perm_userrights` tinyint(1) NOT NULL default '0',
  `perm_wpadd` tinyint(1) NOT NULL default '0',
  `perm_wpedit` tinyint(1) NOT NULL default '0',
  `perm_langconfig` tinyint(1) NOT NULL default '0',
  `perm_presscat` tinyint(1) NOT NULL,
  `perm_gameconfig` tinyint(1) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_permissions`
-- 

INSERT INTO `fs_permissions` (`user_id`, `perm_allannouncement`, `perm_allconfig`, `perm_allphpinfo`, `perm_artikeladd`, `perm_artikeledit`, `perm_cimgadd`, `perm_cimgedit`, `perm_designadd`, `perm_designedit`, `perm_dladd`, `perm_dlcat`, `perm_dlcatadd`, `perm_dlconfig`, `perm_dledit`, `perm_editorconfig`, `perm_editordesign`, `perm_editorfscodes`, `perm_editorsmilies`, `perm_gallerycat`, `perm_gallerycatadd`, `perm_galleryconfig`, `perm_includesadd`, `perm_includesedit`, `perm_map`, `perm_newsadd`, `perm_newscat`, `perm_newscatadd`, `perm_newsconfig`, `perm_newsedit`, `perm_partneradd`, `perm_partnerconfig`, `perm_partneredit`, `perm_polladd`, `perm_polledit`, `perm_pressadd`, `perm_pressedit`, `perm_profiledit`, `perm_randomadd`, `perm_randomcat`, `perm_randomconfig`, `perm_randomedit`, `perm_screenadd`, `perm_screenedit`, `perm_shopadd`, `perm_shopedit`, `perm_statedit`, `perm_statref`, `perm_statspace`, `perm_statview`, `perm_template_all`, `perm_template_artikel`, `perm_template_css`, `perm_template_dl`, `perm_template_email`, `perm_template_gallery`, `perm_template_news`, `perm_template_partner`, `perm_template_poll`, `perm_template_random`, `perm_template_shop`, `perm_template_user`, `perm_template_wp`, `perm_useradd`, `perm_useredit`, `perm_userlistconfig`, `perm_userrights`, `perm_wpadd`, `perm_wpedit`, `perm_langconfig`, `perm_presscat`, `perm_gameconfig`) VALUES 
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_poll`
-- 

DROP TABLE IF EXISTS `fs_poll`;
CREATE TABLE `fs_poll` (
  `poll_id` mediumint(8) NOT NULL auto_increment,
  `poll_quest` char(255) default NULL,
  `poll_start` int(11) default NULL,
  `poll_end` int(11) default NULL,
  `poll_type` tinyint(4) default NULL,
  `poll_participants` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`poll_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_poll`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_poll_answers`
-- 

DROP TABLE IF EXISTS `fs_poll_answers`;
CREATE TABLE `fs_poll_answers` (
  `poll_id` mediumint(8) default NULL,
  `answer_id` mediumint(8) NOT NULL auto_increment,
  `answer` varchar(255) default NULL,
  `answer_count` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`answer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_poll_answers`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_poll_voters`
-- 

DROP TABLE IF EXISTS `fs_poll_voters`;
CREATE TABLE `fs_poll_voters` (
  `voter_id` mediumint(8) unsigned NOT NULL auto_increment,
  `poll_id` mediumint(8) unsigned NOT NULL default '0',
  `ip_address` varchar(15) NOT NULL default '0.0.0.0',
  `time` int(32) NOT NULL default '0',
  PRIMARY KEY  (`voter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_poll_voters`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_press`
-- 

DROP TABLE IF EXISTS `fs_press`;
CREATE TABLE `fs_press` (
  `press_id` smallint(6) NOT NULL auto_increment,
  `press_title` varchar(150) NOT NULL,
  `press_url` varchar(255) NOT NULL,
  `press_date` int(12) NOT NULL,
  `press_text` text NOT NULL,
  `press_lang` int(11) NOT NULL,
  `press_game` tinyint(2) NOT NULL,
  `press_cat` tinyint(2) NOT NULL,
  `press_rating` varchar(100) default NULL,
  PRIMARY KEY  (`press_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `fs_press`
-- 

INSERT INTO `fs_press` (`press_id`, `press_title`, `press_url`, `press_date`, `press_text`, `press_lang`, `press_game`, `press_cat`, `press_rating`) VALUES 
(1, 'test', 'test', 2007, 'tets', 1, 1, 1, '10/10'),
(6, 'test2', 'http://www.computerandvideogames.com/article.php?id=165133', 1165878000, 'asdf', 9, 1, 2, NULL),
(5, 'test', 'a', 1165878000, 'a', 2, 1, 1, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_press_cat`
-- 

DROP TABLE IF EXISTS `fs_press_cat`;
CREATE TABLE `fs_press_cat` (
  `press_cat_id` smallint(6) NOT NULL auto_increment,
  `press_cat_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`press_cat_id`),
  UNIQUE KEY `press_cat_name` (`press_cat_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `fs_press_cat`
-- 

INSERT INTO `fs_press_cat` (`press_cat_id`, `press_cat_name`) VALUES 
(1, 'Cat1'),
(2, 'Cat2');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_screen`
-- 

DROP TABLE IF EXISTS `fs_screen`;
CREATE TABLE `fs_screen` (
  `screen_id` mediumint(8) NOT NULL auto_increment,
  `cat_id` smallint(6) unsigned default NULL,
  `screen_name` char(100) default NULL,
  PRIMARY KEY  (`screen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_screen`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_screen_cat`
-- 

DROP TABLE IF EXISTS `fs_screen_cat`;
CREATE TABLE `fs_screen_cat` (
  `cat_id` smallint(6) unsigned NOT NULL auto_increment,
  `cat_name` char(100) default NULL,
  `cat_type` tinyint(1) NOT NULL default '0',
  `cat_visibility` tinyint(1) NOT NULL default '1',
  `cat_date` int(11) NOT NULL default '0',
  `randompic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `fs_screen_cat`
-- 

INSERT INTO `fs_screen_cat` (`cat_id`, `cat_name`, `cat_type`, `cat_visibility`, `cat_date`, `randompic`) VALUES 
(1, 'Screenshots', 1, 1, 1187549776, 0),
(2, 'Wallpaper', 2, 1, 1187549782, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_screen_config`
-- 

DROP TABLE IF EXISTS `fs_screen_config`;
CREATE TABLE `fs_screen_config` (
  `screen_x` int(11) default NULL,
  `screen_y` int(11) default NULL,
  `thumb_x` int(11) default NULL,
  `thumb_y` int(11) default NULL,
  `max_size` int(11) NOT NULL default '0',
  `pics_per_row` tinyint(1) NOT NULL,
  `pics_per_page` tinyint(2) NOT NULL,
  `sort` varchar(4) NOT NULL,
  `show_img_x` int(4) NOT NULL,
  `show_img_y` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_screen_config`
-- 

INSERT INTO `fs_screen_config` (`screen_x`, `screen_y`, `thumb_x`, `thumb_y`, `max_size`, `pics_per_row`, `pics_per_page`, `sort`, `show_img_x`, `show_img_y`) VALUES 
(5000, 5000, 120, 90, 2048, 3, 6, 'desc', 800, 600);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_screen_random`
-- 

DROP TABLE IF EXISTS `fs_screen_random`;
CREATE TABLE `fs_screen_random` (
  `random_id` int(10) unsigned NOT NULL auto_increment,
  `screen_id` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  PRIMARY KEY  (`random_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_screen_random`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_screen_random_config`
-- 

DROP TABLE IF EXISTS `fs_screen_random_config`;
CREATE TABLE `fs_screen_random_config` (
  `id` mediumint(9) NOT NULL default '1',
  `active` tinyint(1) NOT NULL default '1',
  `type_priority` tinyint(1) NOT NULL default '1',
  `use_priority_only` tinyint(1) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_screen_random_config`
-- 

INSERT INTO `fs_screen_random_config` (`id`, `active`, `type_priority`, `use_priority_only`) VALUES 
(1, 1, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_shop`
-- 

DROP TABLE IF EXISTS `fs_shop`;
CREATE TABLE `fs_shop` (
  `artikel_id` smallint(6) unsigned NOT NULL auto_increment,
  `artikel_name` varchar(100) default NULL,
  `artikel_url` varchar(255) default NULL,
  `artikel_text` text,
  `artikel_preis` varchar(10) default NULL,
  `artikel_hot` tinyint(4) default NULL,
  PRIMARY KEY  (`artikel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_shop`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_smilies`
-- 

DROP TABLE IF EXISTS `fs_smilies`;
CREATE TABLE `fs_smilies` (
  `id` mediumint(6) NOT NULL auto_increment,
  `replace_string` varchar(15) NOT NULL,
  `order` int(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `fs_smilies`
-- 

INSERT INTO `fs_smilies` (`id`, `replace_string`, `order`) VALUES 
(1, ':-)', 1),
(2, ':-(', 2),
(3, ';-)', 3),
(4, ':-P', 4),
(5, 'xD', 5),
(6, ':-o', 6),
(7, '^_^', 7),
(8, ':-/', 8),
(9, ':-]', 9),
(10, '&gt;-(', 10);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_template`
-- 

DROP TABLE IF EXISTS `fs_template`;
CREATE TABLE `fs_template` (
  `id` tinyint(4) NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `indexphp` text NOT NULL,
  `artikel_body` text NOT NULL,
  `artikel_autor` text NOT NULL,
  `randompic_body` text NOT NULL,
  `randompic_nobody` text NOT NULL,
  `shop_body` text NOT NULL,
  `shop_hot` text NOT NULL,
  `news_link` text NOT NULL,
  `news_related_links` text NOT NULL,
  `news_headline` text NOT NULL,
  `main_menu` text NOT NULL,
  `news_comment_body` text NOT NULL,
  `news_comment_autor` text NOT NULL,
  `news_comment_form` text NOT NULL,
  `news_comment_form_name` text NOT NULL,
  `news_comment_form_spam` text NOT NULL,
  `news_comment_form_spamtext` text NOT NULL,
  `news_search_form` text NOT NULL,
  `error` text NOT NULL,
  `news_headline_body` text NOT NULL,
  `user_mini_login` text NOT NULL,
  `shop_main_body` text NOT NULL,
  `shop_artikel` text NOT NULL,
  `dl_navigation` text NOT NULL,
  `dl_search_field` text NOT NULL,
  `dl_body` text NOT NULL,
  `dl_datei_preview` text NOT NULL,
  `dl_file_body` text NOT NULL,
  `dl_file` text NOT NULL,
  `dl_file_is_mirror` text NOT NULL,
  `dl_stats` text NOT NULL,
  `dl_quick_links` text NOT NULL,
  `screenshot_pic` text NOT NULL,
  `screenshot_body` text NOT NULL,
  `screenshot_cat` text NOT NULL,
  `screenshot_cat_body` text NOT NULL,
  `wallpaper_pic` text NOT NULL,
  `wallpaper_sizes` text NOT NULL,
  `pic_viewer` text NOT NULL,
  `user_user_menu` text NOT NULL,
  `user_admin_link` text NOT NULL,
  `user_login` text NOT NULL,
  `user_profiledit` text NOT NULL,
  `user_memberlist_body` text NOT NULL,
  `user_memberlist_userline` text NOT NULL,
  `user_memberlist_adminline` text NOT NULL,
  `user_spam` text NOT NULL,
  `user_spamtext` text NOT NULL,
  `community_map` text NOT NULL,
  `poll_body` text NOT NULL,
  `poll_line` text NOT NULL,
  `poll_main_body` text NOT NULL,
  `poll_main_line` text NOT NULL,
  `poll_result` text NOT NULL,
  `poll_result_line` text NOT NULL,
  `poll_list` text NOT NULL,
  `poll_list_line` text NOT NULL,
  `poll_no_poll` text NOT NULL,
  `user_profil` text NOT NULL,
  `statistik` text NOT NULL,
  `user_register` text NOT NULL,
  `news_body` text NOT NULL,
  `announcement` text NOT NULL,
  `email_register` text NOT NULL,
  `email_passchange` text NOT NULL,
  `partner_eintrag` text NOT NULL,
  `partner_main_body` text NOT NULL,
  `partner_navi_eintrag` text NOT NULL,
  `partner_navi_body` text NOT NULL,
  `code_tag` text NOT NULL,
  `quote_tag` text NOT NULL,
  `quote_tag_name` text NOT NULL,
  `editor_design` text NOT NULL,
  `editor_css` text NOT NULL,
  `editor_button` text NOT NULL,
  `editor_seperator` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=1;

-- 
-- Dumping data for table `fs_template`
-- 

INSERT INTO `fs_template` (`id`, `name`, `indexphp`, `artikel_body`, `artikel_autor`, `randompic_body`, `randompic_nobody`, `shop_body`, `shop_hot`, `news_link`, `news_related_links`, `news_headline`, `main_menu`, `news_comment_body`, `news_comment_autor`, `news_comment_form`, `news_comment_form_name`, `news_comment_form_spam`, `news_comment_form_spamtext`, `news_search_form`, `error`, `news_headline_body`, `user_mini_login`, `shop_main_body`, `shop_artikel`, `dl_navigation`, `dl_search_field`, `dl_body`, `dl_datei_preview`, `dl_file_body`, `dl_file`, `dl_file_is_mirror`, `dl_stats`, `dl_quick_links`, `screenshot_pic`, `screenshot_body`, `screenshot_cat`, `screenshot_cat_body`, `wallpaper_pic`, `wallpaper_sizes`, `pic_viewer`, `user_user_menu`, `user_admin_link`, `user_login`, `user_profiledit`, `user_memberlist_body`, `user_memberlist_userline`, `user_memberlist_adminline`, `user_spam`, `user_spamtext`, `community_map`, `poll_body`, `poll_line`, `poll_main_body`, `poll_main_line`, `poll_result`, `poll_result_line`, `poll_list`, `poll_list_line`, `poll_no_poll`, `user_profil`, `statistik`, `user_register`, `news_body`, `announcement`, `email_register`, `email_passchange`, `partner_eintrag`, `partner_main_body`, `partner_navi_eintrag`, `partner_navi_body`, `code_tag`, `quote_tag`, `quote_tag_name`, `editor_design`, `editor_css`, `editor_button`, `editor_seperator`) VALUES 
(0, 'default', '<body>\r\n    <div id="head_shadow"></div>\r\n    <div id="head">\r\n        <img src="images/icons/logo.gif" alt="Frogsystem 2 - your way to nature" style="padding:3px;" />\r\n    </div>\r\n\r\n    <div id="menu_l_shadow">\r\n        <div id="menu_l">\r\n{main_menu}\r\n        </div>\r\n    </div>\r\n    <div id="main_container">\r\n        <div id="main_shadow">\r\n            <div id="main">\r\n{announcement}\r\n{content}\r\n            </div>\r\n        </div>\r\n        <p>\r\n    </div>\r\n\r\n    <div id="menu_r_shadow">\r\n        <div id="menu_r">\r\n{user}<br><br>\r\n{randompic}\r\nShop:<br>\r\n{shop}<br><br>\r\nUmfrage:<br>\r\n{poll}<br><br>\r\nPartner:<br>\r\n{partner}<br><br>\r\nStatistik:<br>\r\n{stats}<br><br>\r\nNetzwerk:<br>\r\n[%netzwerk%]\r\n<br><br>\r\n        </div>\r\n    </div>\r\n</body>', '<div class="news_head" style="height:10px;">\r\n   <span style="float:left;">\r\n       <b>{titel}</b>\r\n   </span>\r\n   <span class="small" style="float:right;">\r\n       <b>{datum}</b>\r\n   </span>\r\n</div>\r\n<div>\r\n   {text}\r\n</div>\r\n<div>\r\n   <span class="small" style="float:right;">\r\n       {autor}\r\n   </span>\r\n</div>\r\n<p></p>', 'geschrieben von <a class="small" href="{profillink}">{username}</a>', '<img class=\\"thumb\\" onClick=\\"open(\\''{link}\\'',\\''Picture\\'',\\''width=900,height=710,screenX=0,screenY=0\\'')\\" src=\\"{thumb}\\" alt=\\"{titel}\\">', '<div class=\\"small\\" align=\\"center\\">\r\n     Kein Zufallsbild aktiv\r\n</div>', '{hotlinks}', '<div align="center">\r\n    <a style="font-weight:bold;" class="small" target="_blank" href="{link}">{titel}</a>\r\n</div>', '<li><a href="{url}" target="{target}">{name}</a></li>', '<p>\r\n<b>Related Links:</b>\r\n<ul>\r\n    {links}\r\n</ul>', '<span class="small">{datum} </span><a class="small" href="{url}">{titel}</a><br>', '<b>Allgemein</b><br>\r\n<a class="small" href="{virtualhost}?go=news">- News</a><br>\r\n<a class="small" href="{virtualhost}?go=newsarchiv">- News Archiv</a><br>\r\n<a class="small" href="{virtualhost}?go=pollarchiv">- Umfragen Archiv</a><br>\r\n<a class="small" href="{virtualhost}?go=shop">- Shop</a><br>\r\n<a class="small" href="{virtualhost}?go=screenshots">- Screenshots</a><br>\r\n<a class="small" href="{virtualhost}?go=map">- Community Map</a><br>\r\n<a class="small" href="{virtualhost}?go=members">- Mitgliederliste</a><br>\r\n<a class="small" href="{virtualhost}?go=download">- Downloads</a><br>', '<div class="news_head" style="height:10px;">\r\n    <span style="float:left;">\r\n        <b>{titel}</b>\r\n    </span>\r\n    <span class="small" style="float:right;">\r\n        <b>{datum}</b>\r\n    </span>\r\n</div>\r\n<div style="padding:3px;">\r\n    <table border="0" cellpadding="0" cellspacing="0" width="100%">\r\n        <tr>\r\n            <td align="left" valign="top">\r\n                {autor_avatar}\r\n            </td>\r\n            <td valign="top" align="left">\r\n                {text}\r\n            </td>\r\n        </tr>\r\n    </table>\r\n</div>\r\n<div class="news_footer">\r\n    <span class="small" style="float:right;">\r\n        geschrieben von: {autor}</a>\r\n    </span>\r\n</div>\r\n<br /><br /><br />', '<a class="small" href="{url}">{name}</a>', '<script type="text/javascript"> \r\n<!-- \r\n    function chkFormular() \r\n    {\r\n        if((document.getElementById("name").value == "") ||\r\n           (document.getElementById("title").value == "") ||\r\n           (document.getElementById("text").value == ""))\r\n        {\r\n            alert ("Du hast nicht alle Felder ausgefüllt"); \r\n            return false;\r\n        }\r\n    } \r\n//--> \r\n</script> \r\n\r\n<b id="add">Kommentar hinzufügen</b><p>\r\n<div>\r\n    <form action="" method="post" onSubmit="return chkFormular()">\r\n        <input type="hidden" name="go" value="comments">\r\n        <input type="hidden" name="addcomment" value="1">\r\n        <input type="hidden" name="id" value="{newsid}">\r\n        <table width="100%"> \r\n            <tr>\r\n                <td align="left">\r\n                    <b>Name: </b>\r\n                </td>\r\n                <td align="left">\r\n                    {name_input}\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td align="left">\r\n                    <b>Titel: </b>\r\n                </td>\r\n                <td align="left">\r\n                    <input class="text" name="title" id="title" size="32" maxlength="32">\r\n                </td>\r\n            </tr>\r\n{antispam}\r\n            <tr>\r\n                <td align="left" valign="top">\r\n                    <b>Text:</b><br />\r\n                      <font class="small">Html ist {html}.<br />\r\n                      FScode ist {fs_code}.</font>\r\n                </td>\r\n                <td align="left">\r\n                    {textarea}\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td></td>\r\n                <td align="left">\r\n                    <input class="button" type="submit" value="Absenden">\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td></td>\r\n                <td align="left">\r\n                   {antispamtext}\r\n                </td>\r\n            </tr>\r\n        </table>\r\n    </form>\r\n</div><p>', '<input class="text" name="name" id="name" size="32" maxlength="25">\r\n<span class="small"> Willst du dich </span>\r\n<a class="small" href="?go=login">einloggen?</a>', '<tr>\r\n                <td align="left">\r\n                    <img src="{captcha_url}">\r\n                </td>\r\n                <td align="left">\r\n                    <input class="text" name="spam" id="spam" size="32" maxlength="25">\r\n<span class="small">Bitte löse diese kleine Rechenaufgabe.</span> <a class="small" href="#antispam">Warum? *</a>\r\n                </td>\r\n            </tr>', '<br /><br />\r\n <table border="0" cellspacing="0" cellpadding="0" width="60%">\r\n  <tr>\r\n   <td valign="top" align="left">\r\n<div id="antispam"><font size="1">* Auf dieser Seite kann jeder einen Kommentar zu einer News abgeben. Leider ist sie dadurch ein beliebtes Ziel von sog. Spam-Bots - speziellen Programmen, die automatisiert und zum Teil massenhaft Links zu anderen Internetseiten platziern. Um das zu verhindern müssen nicht registrierte User eine einfache Rechenaufgabe lösen, die für die meisten Spam-Bots aber nicht lösbar ist. Wenn du nicht jedesmal eine solche Aufgabe lösen möchtest, kannst du dich einfach bei uns <a href="?go=register">registrieren</a>.</font></div>\r\n   </td>\r\n  </tr>\r\n </table>', '<script type="text/javascript"> \r\n<!-- \r\n    function chkFormular() \r\n    {\r\n        if (document.getElementById("keyword").value.length < "4")\r\n        {\r\n            alert("Es müssen mehr als 3 Zeichen sein"); \r\n            return false;\r\n        }\r\n    } \r\n//--> \r\n</script> \r\n\r\n<b>NEWSARCHIV</b><p>\r\n<div>\r\n    <form action="" method="post">\r\n        <input type="hidden" name="go" value="newsarchiv">\r\n        <b>News aus dem: </b>\r\n        <select class="text" name="monat">\r\n            <option value="1">Januar</option>\r\n            <option value="2">Februar</option>\r\n            <option value="3">März</option>\r\n            <option value="4">April</option>\r\n            <option value="5">Mai</option>\r\n            <option value="6">Juni</option>\r\n            <option value="7">Juli</option>\r\n            <option value="8">August</option>\r\n            <option value="9">September</option>\r\n            <option value="10">Oktober</option>\r\n            <option value="11">November</option>\r\n            <option value="12">Dezember</option>\r\n        </select>\r\n        <select class="text" name="jahr">\r\n            {years}\r\n        </select>\r\n        <input class="button" type="submit" value="Anzeigen">\r\n    </form>\r\n    <p>\r\n    oder\r\n    <p>\r\n    <form action="" method="post" onSubmit="return chkFormular()">\r\n        <input type="hidden" name="go" value="newsarchiv">\r\n        <b>Nach: </b>\r\n        <input class="text" id="keyword" name="keyword" size="30" maxlength="20">\r\n        <input class="button" type="submit" value="Suchen">\r\n    </form>\r\n</div>\r\n<p></p>', '<b>{titel}</b><br>\r\n{meldung}\r\n<p></p>', '<b>NEWS</b><p>\r\n<div>\r\n    <b>Headlines:</b><br>\r\n    {headlines}\r\n</div>\r\n<div>\r\n    <b>Downloads:</b><br>\r\n    {downloads}\r\n</div>\r\n<p>', '<tr>\r\n    <b>Einloggen</b>\r\n</tr>\r\n<tr>\r\n    <td align="center">\r\n        <form action="" method="post">\r\n            <input type="hidden" name="go" value="login">\r\n            <input type="hidden" name="login" value="1">\r\n            <table align="center" border="0" cellpadding="0" cellspacing="0" width="120">\r\n                <tr>\r\n                    <td align="right">\r\n                        <font class="small">Name:</font>\r\n                    </td>\r\n                    <td>\r\n                        <input class="text" size="10" name="username" maxlength="100">\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td align="right">\r\n                        <font class="small">Pass:</font>\r\n                    </td>\r\n                    <td>\r\n                        <input class="text" size="10" type="password" name="userpassword" maxlength="16">\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td align="center" colspan="2">\r\n                        <input type="checkbox" name="stayonline" value="1" checked>\r\n                        <font class="small">eingeloggt bleiben</font>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td align="center" colspan="2">\r\n                        <input class="button" type="submit" value="Anmelden">\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td colspan="2" align="center">\r\n                        <a class="small" href="?go=register">Noch nicht registriert?</a>\r\n                    </td>\r\n                </tr>\r\n            </table>\r\n        </form>\r\n    </td>\r\n</tr>', '<b>SHOP</b><p>\r\n<table width="100%">\r\n    {artikel}\r\n</table>', '<tr>\r\n    <td align="left" valign="top" width="60" rowspan="4">\r\n        <img border="0" style="cursor:pointer;" onClick=open(''showimg.php?pic={bild}'',''Picture'',''width=900,height=710,screenX=0,screenY=0'') src="{thumbnail}">\r\n    </td>\r\n    <td align="left" width="100">\r\n        <b>Titel:</b>\r\n    </td>\r\n        <td align="left">\r\n            {titel}\r\n        </td>\r\n    </tr>\r\n<tr>\r\n    <td align="left" valign="top">\r\n        <b>Beschreibung:</b>\r\n    </td>\r\n    <td align="left" valign="top">\r\n        {beschreibung}</td>\r\n    </tr>\r\n<tr>\r\n    <td align="left">\r\n        <b>Preis:</b>\r\n    </td>\r\n    <td align="left">\r\n        {preis} ¤\r\n    </td>\r\n</tr>\r\n<tr>\r\n    <td align="left"></td>\r\n    <td align="left">\r\n        <a href="{bestell_url}" target="_blank">Jetzt bestellen!</a>\r\n    </td>\r\n</tr>\r\n<tr>\r\n    <td colspan="3">\r\n         \r\n    </td>\r\n</tr>', '<img border="0" src="images/design/{icon}">\r\n<a href="{kategorie_url}">{kategorie_name}</a><br>', '<form action="" method="get">\r\n<tr>\r\n  <td colspan="3" align="right"><br /> <b>Kategorie durchsuchen:</b></td>\r\n  <td colspan="1" align="left"><br /> \r\n    <input class="text" size="20" name="keyword" value="{keyword}">\r\n    <input class="button" type="submit" value="Go">\r\n    <input class="button" type="button" value="Alle anzeigen" onclick="location=''{all_url}''">\r\n    <input type="hidden" name="go" value="download">\r\n    {input_cat}</td>\r\n</tr>\r\n\r\n</form>', '<b>DOWNLOADS</b><p>\r\n{navigation}\r\n<table border="0" cellpadding="0" cellspacing="2" width="100%">\r\n<tr>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><strong>Titel</strong></td>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><strong>Kategorie</strong></td>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><strong>Uploaddatum</strong></td>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><strong>Beschreibung</strong></td>\r\n </tr>\r\n{dateien}\r\n{suchfeld}\r\n</table>', '<tr>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><a href="{url}"><b>{name}</b></a></td>\r\n  <td style="border: 1px solid #000000; padding: 3px;" align="center" valign="middle">{cat}</td>\r\n  <td style="border: 1px solid #000000; padding: 3px;" align="center" valign="middle">{datum}</td>\r\n  <td style="border: 1px solid #000000; padding: 3px;">{text}</td>\r\n </tr>', '<b>DOWNLOADS -> {titel}</b><p>\r\n{navigation}\r\n    <table width="100%">\r\n        <tr>\r\n            <td align="left" width="130" rowspan="6" valign="top">\r\n                <img class="thumb" onClick=open(''showimg.php?pic={bild}'',''Picture'',''width=900,height=710,screenX=0,screenY=0'') src="{thumbnail}">\r\n            </td>\r\n        </tr>\r\n         <tr>\r\n            <td align="left" colspan="2" height="20" valign="top">\r\n                <b>{titel}</b>\r\n            </td>\r\n        </tr>\r\n       <tr>\r\n            <td align="left" width="75">\r\n                <b>Kategorie:</b>\r\n            </td>\r\n            <td align="left">\r\n                {cat}\r\n            </td>\r\n        </tr>\r\n       <tr>\r\n            <td align="left" width="75">\r\n                <b>Datum:</b>\r\n            </td>\r\n            <td align="left">\r\n                {datum}\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td align="left" width="75">\r\n                <b>Uploader:</b>\r\n            </td>\r\n            <td align="left">\r\n                <a href="{uploader_url}">{uploader}</a>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td align="left" width="75">\r\n                <b>Autor:</b>\r\n            </td>\r\n            <td align="left">\r\n                {autor_link}\r\n            </td>\r\n        </tr>\r\n    </table>\r\n    <br>\r\n    <table width="100%">\r\n        <tr>\r\n            <td align="left" valign="top" width="130">\r\n                <b>Beschreibung:</b>\r\n            </td>\r\n            <td align="left" valign="top">{text}\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="2"></td>\r\n        </tr>\r\n        <tr>\r\n             <td align="left" valign="top">\r\n                 <b>Dateien:</b>\r\n             </td>\r\n             <td align="left">{messages}\r\n             </td>\r\n         </tr>\r\n         <tr>\r\n             <td colspan="2"></td>\r\n         </tr>\r\n    </table>\r\n\r\n<table border="0" cellpadding="0" cellspacing="2" width="100%">\r\n<tr>\r\n  <td style="border: 1px solid #000000; padding: 3px;" colspan="2" ><strong>Datei (Download)</strong></td>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><strong>Größe</strong></td>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><strong>Traffic</strong></td>\r\n  <td style="border: 1px solid #000000; padding: 3px;"><strong>Downloads</strong></td>\r\n</tr>\r\n{files}\r\n<tr>\r\n  <td colspan="5" style="border: 1px solid #000000; padding: 3px;"><img alt="" src="images/design/null.gif"></td>\r\n</tr>\r\n{stats}\r\n</table>', '<tr>\r\n  <td style="border: 1px solid #000000; padding: 3px;"{mirror_col}><a target="_blank" href="{url}"><b>{name}</b></a></td>{mirror_ext}\r\n  <td style="border: 1px solid #000000; padding: 3px;">{size}</td>\r\n  <td style="border: 1px solid #000000; padding: 3px;">{traffic}</td>\r\n  <td style="border: 1px solid #000000; padding: 3px;">{hits}</td>\r\n</tr>', '<td style="border: 1px solid #000000; padding: 3px;" align="center" valign="middle"><b>Mirror!</b></td>', '<tr>\r\n              <td style="border: 1px solid #000000; padding: 3px;" colspan="2" >{number}</strong></td>\r\n              <td style="border: 1px solid #000000; padding: 3px;">{size}</td>\r\n              <td style="border: 1px solid #000000; padding: 3px;">{traffic}</td>\r\n              <td style="border: 1px solid #000000; padding: 3px;">{hits}</td>\r\n              </tr>', '<span class="small">{datum} </span><a class="small" href="{url}">{name}</a><br>', '<td class="small" align="center" valign="top">\r\n    <img class="thumb" onClick="open(''{url}'',''Picture'',''width=950,height=710,screenX=0,screenY=0'')" src="{thumbnail}" alt="{text}"><br>\r\n    {text}\r\n</td>', '<b>SCREENSHOT KATEGORIEN</b><p>\r\n<table width="100%">\r\n{cats}\r\n</table>', '<tr>\r\n    <td align="left">\r\n        <a href="{url}">{name}</a>\r\n    </td>\r\n    <td align="left">\r\n        erstellt am {datum}\r\n    </td>\r\n    <td align="left">\r\n        {menge} Bilder\r\n    </td>\r\n</tr>', '<b>SCREENSHOTS: {title}</b><p>\r\n<center>{page}</center><br />\r\n<table border="0" cellpadding="" cellspacing="10" width="100%">\r\n{screenshots}\r\n</table>', '<td align="center" valign="top">\r\n  <b>{text}</b><br />\r\n  <img src="{thumb_url}" alt="" />\r\n  <br /><br />\r\n  <b>Verfügbare Größen:</b>\r\n  {sizes}\r\n  <br />\r\n</td>', '<br />- <a href="{url}" target="_blank">{size}</a>', '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">\r\n<html>\r\n<head>\r\n    <title>DSA-Drakensang</title>\r\n    <link rel="stylesheet" type="text/css" href="inc/fs.css">\r\n    <LINK REL="SHORTCUT ICON" HREF="images/design/dsa.ico">\r\n</head>\r\n<body style="background-image:url(images/design/bg.jpg); background-position:center top;" leftmargin="0" topmargin="0">\r\n<center>\r\n{bannercode}\r\n<table style="border-width:2px; border-style:solid; border-color:#774C1F;" cellspacing="0" cellpadding="3">\r\n <tr align="center">\r\n  <td>\r\n   <a href="{bild_url}" target="_blank">{bild}</a><br><b>{text}</b>\r\n  </td>\r\n </tr>\r\n <tr>\r\n</table>\r\n<table cellspacing="0" cellpadding="3">\r\n <tr>\r\n  <td width="33%" align="right">\r\n   <b>{weiter_grafik}</b>\r\n  </td>\r\n  <td width="33%" align="center">\r\n   <b>{close}</b>\r\n  </td>\r\n  <td width="33%" align="left">\r\n   <b>{zurück_grafik}</b>\r\n  </td>\r\n </tr>\r\n</table>\r\n</center>\r\n\r\n</body>\r\n</html>', '<b>Willkommen {username}</b><br>\r\n<a class="small" href="{virtualhost}?go=editprofil">- Mein Profil</a><br>\r\n{admin}\r\n<a class="small" href="{logout}">- Logout</a>', '<a class=''small'' href=''{adminlink}'' target="_self">- Admin-CP</a><br />', '<div class="field_head" style="padding-left:60px; width:516px;">\r\n    <font class="h1" style="float:left; padding-top:14px;">Login</font>\r\n</div>\r\n<div class="field_middle" align="left">\r\n    <form action="" method="post">\r\n        <input type="hidden" name="go" value="login">\r\n        <input type="hidden" name="login" value="1">\r\n        <table align="center" border="0" cellpadding="4" cellspacing="0">\r\n            <tr>\r\n                <td align="right">\r\n                    <b>Name:</b>\r\n                </td>\r\n                <td>\r\n                    <input class="text" size="33" name="username" maxlength="100">\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td align="right">\r\n                    <b>Passwort:</b>\r\n                </td>\r\n                <td>\r\n                    <input class="text" size="33" type="password" name="userpassword" maxlength="16">\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td align="right">\r\n                    <b>Angemeldet bleiben:</b>\r\n                </td>\r\n                <td>\r\n                    <input type="checkbox" name="stayonline" value="1" checked>\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td colspan="2" align="center">\r\n                    <input class="button" type="submit" value="Login">\r\n                </td>\r\n            </tr>\r\n        </table>\r\n    </form>\r\n    <p>\r\n    Du hast dich noch nicht registriert? Dann wirds jetzt aber Zeit ;) -> \r\n    <a href="?go=register">registrieren</a>\r\n    <p>\r\n</div>\r\n<div class="field_footer"></div>\r\n<p></p>', '<b>PROFIL ÄNDERN ({username})</b><p>\r\n<form action="" method="post" enctype="multipart/form-data">\r\n    <input type="hidden" name="go" value="editprofil">\r\n    <table align="center" border="0" cellpadding="4" cellspacing="0">\r\n        <tr>\r\n            <td width="50%" valign="top">\r\n                <b>Benutzerbild:</b>\r\n            </td>\r\n            <td width="50%">\r\n                {avatar}\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <b>Benutzerbild hochladen:</b><br>\r\n                <font class="small">Nur wenn das alte überschrieben werden soll (max 110x110 px)</font>\r\n            </td>\r\n            <td>\r\n                <input class="text" size="16" type="file" name="userpic">\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <b>E-Mail:</b><br>\r\n                <font class="small">Deine E-Mail Adresse</font>\r\n            </td>\r\n            <td>\r\n                <input class="text" size="34" value="{email}" name="usermail" maxlength="100">\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <b>E-Mail zeigen:</b><br>\r\n                <font class="small">Zeige die E-Mail im öffentlichen Profil</font>\r\n            </td>\r\n            <td>\r\n                <input value="1" name="showmail" type="checkbox" {email_zeigen}>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <b>Neues Passwort:</b><br>\r\n                <font class="small">Nur eintragen, wenn du ein neues Passwort erstellen willst</font>\r\n            </td>\r\n            <td>\r\n                <input class="text" size="33" type="password" name="userpassword" maxlength="16" autocomplete="off">\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="2" align="center">\r\n                <input class="button" type="submit" value="Absenden">\r\n            </td>\r\n        </tr>\r\n    </table>\r\n</form>', '<b>Members List</b><br /><br />\r\n<table width="100%" border="0">\r\n<tr>\r\n  <td><b>Avatar</b></td>\r\n  <td><a href="?go=members&sort=name_{order_name}" style="color:#000;"><b>Benutzername</b> {arrow_name}</a></td>\r\n  <td><b>E-Mail</b></td>\r\n  <td><a href="?go=members&sort=regdate_{order_regdate}" style="color:#000;"><b>Registriert seit</b> {arrow_regdate}</a></td>\r\n  <td><a href="?go=members&sort=news_{order_news}" style="color:#000;"><b>News</b> {arrow_news}</a></td>\r\n  <td><a href="?go=members&sort=articles_{order_articles}" style="color:#000;"><b>Artikel</b> {arrow_articles}</a></td>\r\n  <td><a href="?go=members&sort=comments_{order_comments}" style="color:#000;"><b>Kommentare</b> {arrow_comments}</a></td>\r\n</tr>\r\n{members}\r\n</table><br /><br />\r\n<center>{page}</center>', '<tr>\r\n  <td align="center">{avatar}</td>\r\n  <td><a href="{userlink}" class="small">{username}</a></td>\r\n  <td>{email}</td>\r\n  <td align="center">{reg_date}</td>\r\n  <td align="center">{news}</td>\r\n  <td align="center">{articles}</td>\r\n  <td align="center">{comments}</td>\r\n</tr>', '<tr>\r\n  <td align="center">{avatar}</td>\r\n  <td><a href="{userlink}" class="small"><b><i>{username}</i></b></a></td>\r\n  <td>{email}</td>\r\n  <td align="center">{reg_date}</td>\r\n  <td align="center">{news}</td>\r\n  <td align="center">{articles}</td>\r\n  <td align="center">{comments}</td>\r\n</tr>', '<tr>\r\n                <td align="right">\r\n                    <img src="{captcha_url}">\r\n                </td>\r\n                <td>\r\n                    <input class="text" name="spam" id="spam" size="30" maxlength="25"><br />\r\n<span class="small">Bitte löse diese kleine Rechenaufgabe.</span>\r\n                </td>\r\n            </tr>', '<br /><br />\r\n <table border="0" cellspacing="0" cellpadding="0" width="60%">\r\n  <tr>\r\n   <td valign="top" align="left">\r\n<div id="antispam"><font size="1">* Auf dieser Seite kann jeder einen Kommentar zu einer News abgeben. Leider ist sie dadurch ein beliebtes Ziel von sog. Spam-Bots - speziellen Programmen, die automatisiert und zum Teil massenhaft Links zu anderen Internetseiten platzieren. Um das zu verhindern müssen nicht registrierte User eine einfache Rechenaufgabe lösen, die für die meisten Spam-Bots aber nicht lösbar ist. Wenn du nicht jedesmal eine solche Aufgabe lösen möchtest, kannst du dich einfach bei uns <a href="?go=register">registrieren</a>.</font></div>\r\n   </td>\r\n  </tr>\r\n </table>', '<div class="field_head" style="padding-left:60px; width:516px;">\r\n    <font class="h1" style="float:left; padding-top:14px;">Community Map</font>\r\n</div>\r\n<div class="field_middle" align="left">\r\n    {karte}\r\n    <div align="right">\r\n        <font class="small">Zum betrachten der Karte wird Flash benötigt: </font><br>\r\n        <img border="0" src="images/design/flash_rune.gif" align="middle">\r\n        <a target="_blank" href="http://www.adobe.com/go/getflashplayer">\r\n            <img border="0" src="images/design/flash_download_now.gif" align="middle">\r\n        </a>\r\n    </div>\r\n</div>\r\n<div class="field_footer"></div>\r\n<p></p>', '<form name=\\"poll\\" action=\\"\\" method=\\"post\\">\r\n    <input type=\\"hidden\\" name=\\"pollid\\" value=\\"{poll_id}\\">\r\n    <table align=\\"center\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" width=\\"100%\\">\r\n        <tr>\r\n            <td class=\\"small\\" colspan=\\"2\\" align=\\"center\\">\r\n                <b>{question}</b>\r\n            </td>\r\n        </tr>\r\n{answers}\r\n        <tr>\r\n            <td colspan=\\"2\\" align=\\"center\\" ><br />\r\n                <input class=\\"button\\" type=\\"submit\\" value=\\"Abstimmen\\" {button_state}><br />\r\n<a class=\\"small\\" href=\\"?go=pollarchiv&pollid={poll_id}\\"><b>Ergebnis anzeigen!</b></a>\r\n            </td>\r\n        </tr>\r\n    </table>\r\n</form>', '<tr>\r\n    <td valign=\\"top\\">\r\n        <input type=\\"{type}\\" name=\\"answer{multiple}\\" value=\\"{answer_id}\\">\r\n    </td>\r\n    <td align=\\"left\\" class=\\"small\\">\r\n        {answer}\r\n    </td>\r\n</tr>', '<b>UMFRAGEN ARCHIV</b><p>\r\n<b>{frage}</b><p>\r\n<table width=\\"100%\\">\r\n{antworten}\r\n   <tr><td> </td></tr>\r\n   <tr><td align=\\"left\\">Anzahl der Teilnehmer: </td><td align=\\"left\\" colspan=\\"2\\"><b>{participants}</b></td></tr>\r\n   <tr><td align=\\"left\\">Anzahl der Stimmen: </td><td align=\\"left\\" colspan=\\"2\\"><b>{stimmen}</b></td></tr>\r\n   <tr><td align=\\"left\\">Art der Umfrage: </td><td align=\\"left\\" colspan=\\"2\\">{typ}</td></tr>\r\n   <tr><td align=\\"left\\">Umfragedauer:</td><td align=\\"left\\" colspan=\\"2\\">{start_datum} bis {end_datum}</td></tr>\r\n</table>', '<tr>\r\n    <td align=\\"left\\">{antwort}</td>\r\n    <td align=\\"left\\">{stimmen}</td>\r\n    <td align=\\"left\\">\r\n        <div style=\\"width:{balken_breite}px; height:4px; font-size:1px; background-color:#00FF00;\\">\r\n    </td>\r\n</tr>', '<table align=\\"center\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" width=\\"100%\\">\r\n    <tr>\r\n        <td class=\\"small\\" colspan=\\"2\\" align=\\"center\\">\r\n            <b>{question}</b>\r\n        </td>\r\n    </tr>\r\n{answers}\r\n</table>\r\n<div class=\\"small\\">Teilnehmer: {participants}</div>\r\n<b>Bereits abgestimmt!</b>', '<tr>\r\n    <td align=\\"left\\" class=\\"small\\" colspan=\\"2\\">\r\n        {answer}\r\n    </td>\r\n</tr>\r\n<tr>\r\n    <td align=\\"left\\" class=\\"small\\">\r\n        {percentage}\r\n    </td>\r\n    <td align=\\"left\\">\r\n        <div style=\\"width:{bar_width}px; height:4px; font-size:1px; background-color:#00FF00;\\">\r\n    </td>\r\n</tr>', '<b>UMFRAGEN ARCHIV</b><p>\r\n<table border=\\"0\\" width=\\"100%\\" cellpadding=\\"2\\" cellspacing=\\"0\\">\r\n<tr>\r\n  <td align=\\"left\\"><a href=\\"?go=pollarchiv&sort=name_{order_name}\\" style=\\"color: #000\\"><b>Frage {arrow_name}</b></a></td>\r\n  <td align=\\"left\\" width=\\"100\\"><a href=\\"?go=pollarchiv&sort=voters_{order_voters}\\" style=\\"color: #000\\"><b>Teilnehmer {arrow_voters}</b></a></td>\r\n  <td align=\\"left\\" width=\\"70\\"><a href=\\"?go=pollarchiv&sort=startdate_{order_startdate}\\" style=\\"color: #000\\"><b>von {arrow_startdate}</b></a></td>\r\n  <td align=\\"left\\" width=\\"10\\"></td>\r\n  <td align=\\"left\\" width=\\"70\\"><a href=\\"?go=pollarchiv&sort=enddate_{order_enddate}\\" style=\\"color: #000\\"><b>bis {arrow_enddate}</b></a></td>\r\n</tr>\r\n{umfragen}\r\n</table>\r\n<p>', '  <tr>\r\n   <td align=\\"left\\"><a href=\\"{url}\\">{frage}</a></td>\r\n   <td align=\\"left\\">{voters}</td>\r\n   <td align=\\"left\\" class=\\"small\\">{start_datum}</td>\r\n   <td align=\\"left\\" class=\\"small\\">-</td>\r\n   <td align=\\"left\\" class=\\"small\\">{end_datum}</td>\r\n  </tr>', '<div class=\\"small\\" align=\\"center\\">\r\n    Zur Zeit keine<br>Umfrage aktiv\r\n</div>', '<b>PROFIL VON {username}</b><p>\r\n<table align="center" border="0" cellpadding="4" cellspacing="0">\r\n    <tr>\r\n        <td width="50%" valign="top">\r\n            <b>Benutzerbild:</b>\r\n        </td>\r\n        <td width="50%">\r\n            {avatar}\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n        <td>\r\n            <b>E-Mail:</b>\r\n        </td>\r\n        <td>\r\n            {email}\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n        <td>\r\n            <b>Registriert seit:</b>\r\n        </td>\r\n        <td>\r\n            {reg_datum}\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n        <td>\r\n            <b>Geschriebene Kommentare:</b>\r\n        </td>\r\n        <td>\r\n            {kommentare}\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n        <td>\r\n            <b>Geschriebene News:</b>\r\n        </td>\r\n        <td>\r\n            {news}\r\n        </td>\r\n    </tr>\r\n    <tr>\r\n        <td>\r\n            <b>Geschriebene Artikel:</b>\r\n        </td>\r\n        <td>\r\n            {artikel}\r\n        </td>\r\n    </tr>\r\n</table>', '- <b>{visits}</b> Visits<br>\r\n- <b>{visits_heute}</b> Visits heute<br>\r\n- <b>{hits}</b> Hits<br>\r\n- <b>{hits_heute}</b> Hits heute<br>\r\n- <b>{user_online}</b> Besucher online<p>\r\n- <b>{user}</b> registrierte User<br>\r\n- <b>{news}</b> News<br>\r\n- <b>{kommentare}</b> Kommentare<br>\r\n- <b>{artikel}</b> Artikel', '<script type="text/javascript"> \r\n<!-- \r\nfunction chkFormular() \r\n{\r\n    if((document.getElementById("username").value == "") ||\r\n       (document.getElementById("usermail").value == "") ||\r\n       (document.getElementById("userpass1").value == "") ||\r\n       (document.getElementById("userpass2").value == ""))\r\n    {\r\n        alert("Du hast nicht alle Felder ausgefüllt"); \r\n        return false;\r\n    }\r\n    if(document.getElementById("userpass1").value != document.getElementById("userpass2").value)\r\n    {\r\n        alert("Passwöter sind verschieden"); \r\n        return false;\r\n    }\r\n} \r\n//--> \r\n</script> \r\n\r\n<b>REGISTRIEREN</b><p>\r\n<div>\r\n    Registriere dich im Frog System, um in den Genuss erweiterter Features zu kommen. Dazu zählen bisher:\r\n    <ul>\r\n        <li>Zugriff auf unsere Downloads</li>\r\n        <li>Hochladen eines eigenen Benutzerbildes, für die von dir geschriebenen Kommentare</li>\r\n    </ul>\r\n    Weitere Features werden folgen.\r\n    <p>\r\n    <form action="" method="post" onSubmit="return chkFormular()">\r\n        <input type="hidden" value="register" name="go">\r\n        <table border="0" cellpadding="2" cellspacing="0" align="center">\r\n            <tr>\r\n                <td align="right">\r\n                    <b>Name:</b>\r\n                </td>\r\n                <td>\r\n                    <input class="text" size="30" name="username" id="username" maxlength="100">\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td align="right">\r\n                    <b>Passwort:</b>\r\n                </td>\r\n                <td>\r\n                    <input class="text" size="30" name="userpass1" id="userpass1" type="password" maxlength="16" autocomplete="off">\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td align="right">\r\n                    <b>Passwort wiederholen:</b>\r\n                </td>\r\n                <td>\r\n                    <input class="text" size="30" name="userpass2" id="userpass2" type="password" maxlength="16" autocomplete="off">\r\n                </td>\r\n            </tr>\r\n            <tr>\r\n                <td align="right">\r\n                    <b>E-Mail:</b>\r\n                </td>\r\n                <td>\r\n                    <input class="text" size="30" name="usermail" id="usermail" maxlength="100">\r\n                </td>\r\n            </tr>\r\n{antispam}\r\n            <tr>\r\n                <td colspan="2" align="center">\r\n                    <input type="submit" class="button" value="Registrieren">\r\n                </td>\r\n            </tr>\r\n        </table>\r\n    </form>\r\n    <p>\r\n</div>', '<div class="news_head" style="height:10px;" id ="{newsid}">\r\n    <span style="float:left;">\r\n       <b>[{kategorie_name}] {titel}</b>\r\n    </span>\r\n    <span class="small" style="float:right;">\r\n        <b>{datum}</b>\r\n    </span>\r\n</div>\r\n<div style="padding:3px;">\r\n    {text}\r\n    {related_links}\r\n</div>\r\n<div class="news_footer">\r\n    <span class="small" style="float:left;">\r\n        <a class="small" href="{kommentar_url}">Kommentare ({kommentar_anzahl})</a>\r\n    </span>\r\n    <span class="small" style="float:right;">\r\n        geschrieben von: <a class="small" href="{autor_profilurl}">{autor}</a>\r\n    </span>\r\n</div>\r\n<br><br>', '<b>Ankündigung:</b>\r\n<br><br>\r\n    {meldung}\r\n<br><br>', 'Hallo {username}\r\n\r\nDu hast dich im Frog System registriert. Deine Logindaten sind:\r\nUsername: {username}\r\nPasswort: {passwort}', 'Hallo {username}\r\n\r\nDein Passwort im Frog System wurde geändert.\r\nDas neue Lautet: {passwort}', '<div align="center">\r\n  <a href="{url}" target="_blank">\r\n    <img src="{bild}" border="0" alt="{name}"  title="{name}">\r\n  </a>\r\n  <br>\r\n</div>', 'Partner:\r\n{partner}', '<div align="center">\r\n  <a href="{url}" target="_blank">\r\n    <img src="{bild}" border="0" alt="{name}"  title="{name}">\r\n  </a>\r\n  <br>\r\n</div>', '{permanents}\r\n\r\n<div align="center"><br><b>\r\nZufallsauswahl:</b><br>\r\n\r\n{non-permanents}\r\n\r\n<a href="?go=partner">alle Partner</a></div><br>', '<table cellpadding="5" align="center" border="0" width="90%">\r\n<tr><td><b><font face="verdana" size="2">Code:</font></b></td></tr>\r\n<tr><td style="border-collapse: collapse; border-style: dotted; border-color:#000000; border-width: 1"><font face="Courier New">{text}</font>\r\n</td></tr></table>', '<table cellpadding="5" align="center" border="0" width="90%">\r\n<tr><td><b><font face="verdana" size="2">Zitat:</font></b></td></tr>\r\n<tr><td style="border-collapse: collapse; border-style: dotted; border-color:#000000; border-width: 1">{text}\r\n</td></tr></table>', '<table cellpadding="5" align="center" border="0" width="90%">\r\n<tr><td><b><font face="verdana" size="2">Zitat von {author}:</font></b></td></tr>\r\n<tr><td style="border-collapse: collapse; border-style: dotted; border-color:#000000; border-width: 1">{text}\r\n</td></tr></table>', '<table cellpadding="0" cellspacing="0" border="0" style="padding-bottom:4px">\r\n  <tr valign="bottom">\r\n    {buttons}\r\n  </tr>\r\n</table>\r\n\r\n<table cellpadding="0" cellspacing="0" border="0">\r\n  <tr valign="top">\r\n    <td>\r\n      <textarea {style}>{text}</textarea>\r\n    </td>\r\n    <td style="width:4px; empty-cells:show;">\r\n    </td>\r\n    <td>\r\n      {smilies}\r\n    </td>\r\n  </tr>\r\n</table>\r\n<br />', '.editor_button {\r\n  font-size:8pt;\r\n  font-family:Verdana;\r\n  border:1px solid #000000;\r\n  background-color:#B7B7B7;\r\n  width:20px;\r\n  height:20px;\r\n  cursor:pointer;\r\n  text-align:center;\r\n}\r\n.editor_button:hover {\r\n  background-color:#A5E5A5;\r\n}\r\n.editor_td {\r\n  width:24px;\r\n  height:23px;\r\n  vertical-align:bottom;\r\n  text-align:left;\r\n}\r\n.editor_td_seperator {\r\n  width:5px;\r\n  height:23px;\r\n  background-image:url("images/icons/separator.gif");\r\n  background-repeat:no-repeat;\r\n  background-position:top left;\r\n}\r\n.editor_smilies {\r\n  cursor:pointer;\r\n  padding:0px;\r\n}', '<td class="editor_td">\r\n    <div class="editor_button" {javascript}>\r\n      <img src="{img_url}" alt="{alt}" title="{title}" />\r\n    </div>\r\n  </td>', '<td class="editor_td_seperator"></td>');

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_user`
-- 

DROP TABLE IF EXISTS `fs_user`;
CREATE TABLE `fs_user` (
  `user_id` mediumint(8) NOT NULL auto_increment,
  `user_name` char(100) default NULL,
  `user_password` char(32) default NULL,
  `user_mail` char(100) default NULL,
  `is_admin` tinyint(4) NOT NULL default '0',
  `reg_date` int(11) default NULL,
  `show_mail` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `fs_user`
-- 

INSERT INTO `fs_user` (`user_id`, `user_name`, `user_password`, `user_mail`, `is_admin`, `reg_date`, `show_mail`) VALUES 
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.de', 1, 1207260000, 0),
(2, 'test', 'd07ab2e877d04b50a5177eafd5f33465', 'test@domain.local', 0, 1188381796, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_userlist_config`
-- 

DROP TABLE IF EXISTS `fs_userlist_config`;
CREATE TABLE `fs_userlist_config` (
  `id` tinyint(1) NOT NULL,
  `user_per_page` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_userlist_config`
-- 

INSERT INTO `fs_userlist_config` (`id`, `user_per_page`) VALUES 
(1, 50);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_useronline`
-- 

DROP TABLE IF EXISTS `fs_useronline`;
CREATE TABLE `fs_useronline` (
  `ip` varchar(30) default NULL,
  `host` varchar(200) default NULL,
  `date` int(30) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_useronline`
-- 

INSERT INTO `fs_useronline` (`ip`, `host`, `date`) VALUES 
('127.0.0.1', NULL, 1188386405);

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_wallpaper`
-- 

DROP TABLE IF EXISTS `fs_wallpaper`;
CREATE TABLE `fs_wallpaper` (
  `wallpaper_id` mediumint(8) NOT NULL auto_increment,
  `wallpaper_name` varchar(255) NOT NULL default '',
  `wallpaper_title` varchar(255) NOT NULL default '',
  `cat_id` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`wallpaper_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_wallpaper`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_wallpaper_sizes`
-- 

DROP TABLE IF EXISTS `fs_wallpaper_sizes`;
CREATE TABLE `fs_wallpaper_sizes` (
  `size_id` mediumint(8) NOT NULL auto_increment,
  `wallpaper_id` mediumint(8) NOT NULL default '0',
  `size` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`size_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_wallpaper_sizes`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fs_zones`
-- 

DROP TABLE IF EXISTS `fs_zones`;
CREATE TABLE `fs_zones` (
  `id` mediumint(8) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `design_id` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fs_zones`
-- 


