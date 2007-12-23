CREATE TABLE `smartdynamic_template` (
  `templateid` int(11) NOT NULL auto_increment,
  `swffile` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `description` TEXT NOT NULL,
  `width` int(11) NOT NULL default '0',
  `height` int(11) NOT NULL default '0',
  PRIMARY KEY  (`templateid`)
) TYPE=MyISAM COMMENT='SmartDynamic by The SmartFactory <www.smartfactory.ca>' AUTO_INCREMENT=1 ;

CREATE TABLE `smartdynamic_banner` (
  `bannerid` int(11) NOT NULL auto_increment,
  `templateid` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` TEXT NOT NULL,
  `border_color` varchar(7) NOT NULL default '#000000',
  `border_size` int(2) NOT NULL default 0,
  PRIMARY KEY  (`bannerid`)
) TYPE=MyISAM COMMENT='SmartDynamic by The SmartFactory <www.smartfactory.ca>' AUTO_INCREMENT=1 ;

CREATE TABLE `smartdynamic_frame` (
  `frameid` int(11) NOT NULL auto_increment,
  `bannerid` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `text` TEXT NOT NULL,
  `image` varchar(255) NOT NULL default '',
  `face` varchar(255) NOT NULL default '',
  `color` varchar(7) NOT NULL default '',
  `size` int(11) NOT NULL default '0',
  `pagedelay` int(11) NOT NULL default '0',
  `transition` varchar(20) NOT NULL default '',
  `align` varchar(255) NOT NULL default 'center',
  `url` varchar(255) NOT NULL default '',
  `weight` int(11) NOT NULL default '0',
  PRIMARY KEY  (`frameid`)
) TYPE=MyISAM COMMENT='SmartDynamic by The SmartFactory <www.smartfactory.ca>' AUTO_INCREMENT=1 ;


CREATE TABLE `smartdynamic_meta` (
  `metakey` varchar(50) NOT NULL default '',
  `metavalue` varchar(255) NOT NULL default '',
  PRIMARY KEY (`metakey`)
) TYPE=MyISAM COMMENT='SmartDynamic by The SmartFactory <www.smartfactory.ca>' ;

INSERT INTO `smartdynamic_meta` VALUES ('version','1.0');