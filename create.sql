CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `image` longblob NOT NULL,
  `target_url` varchar(2083) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;