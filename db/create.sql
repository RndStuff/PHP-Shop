
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `PHP_Shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE IF NOT EXISTS `tbl_artikel` (
  `id` int(11) NOT NULL,
  `titel` varchar(40) NOT NULL,
  `preis` varchar(10) NOT NULL,
  `text` text NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE IF NOT EXISTS `tbl_data` (
  `data_ID` int(11) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `emil` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `zusatz` varchar(500) NOT NULL,
  `str` varchar(40) NOT NULL,
  `plz` int(11) NOT NULL,
  `ort` varchar(40) NOT NULL,
  KEY `data_ID` (`data_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vm`
--

CREATE TABLE IF NOT EXISTS `tbl_vm` (
  `sid` varchar(40) NOT NULL,
  `vart` varchar(100) NOT NULL,
  `zm` varchar(100) NOT NULL,
  `preis` varchar(8) NOT NULL,
  `produkte` varchar(100) NOT NULL,
  `datetime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;