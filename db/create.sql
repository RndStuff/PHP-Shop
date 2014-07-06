
CREATE TABLE IF NOT EXISTS `tbl_artikel` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `bezeichnung` varchar(30) NOT NULL,
  `beschreibung` text NOT NULL,
  `preis` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bezeichnung` (`bezeichnung`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;


CREATE TABLE IF NOT EXISTS `tbl_artikel_bestellungen` (
  `artikel_id` int(6) NOT NULL,
  `bestellung_id` int(6) NOT NULL,
  PRIMARY KEY (`artikel_id`,`bestellung_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `tbl_bestellung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `zusatz` varchar(100) NOT NULL,
  `str` varchar(50) NOT NULL,
  `ort` varchar(50) NOT NULL,
  `land` varchar(40) NOT NULL,
  `plz` int(5) NOT NULL,
  `versandArt` varchar(40) NOT NULL,
  `zahlungsMethode` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;
