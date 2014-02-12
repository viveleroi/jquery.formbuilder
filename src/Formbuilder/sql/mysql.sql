CREATE TABLE IF NOT EXISTS `fb_savedforms` (
  `id` int(11) NOT NULL auto_increment,
  `form_structure` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `fb_savedresponses` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `response_json` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;