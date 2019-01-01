-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 01, 2019 at 08:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `booksellers`
--

CREATE TABLE `booksellers` (
  `id_bookseller` int(11) NOT NULL,
  `name_bookseller` varchar(255) NOT NULL,
  `email_bookseller` varchar(255) NOT NULL,
  `pass_bookseller` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `state_order` tinyint(4) NOT NULL,
  `date_order` datetime(6) NOT NULL,
  `adress_order` varchar(255) NOT NULL,
  `postal_order` tinyint(10) NOT NULL,
  `firstname_order` varchar(255) NOT NULL,
  `lastname_order` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `state_product` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `description_product` text NOT NULL,
  `categorie_product` tinyint(255) NOT NULL,
  `price_product` int(11) NOT NULL,
  `added_product` datetime(6) NOT NULL,
  `editiondate_product` date NOT NULL,
  `editor_product` varchar(255) NOT NULL,
  `author_product` varchar(255) NOT NULL,
  `url_product` varchar(500) DEFAULT 'https://via.placeholder.com/300 '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `state_product`, `name_product`, `description_product`, `categorie_product`, `price_product`, `added_product`, `editiondate_product`, `editor_product`, `author_product`, `url_product`) VALUES
(1, 20, 'Forrest Gump', 'Forrest raconte sa fabuleuse histoire, celle d\'un simple d\'esprit se laissant porter par les événements américains les plus marquants du XXe siècle.', 2, 35, '2018-12-19 00:00:00.000000', '0000-00-00', 'Warner', ' Robert Zemeckis', 'https://media.senscritique.com/media/000012402803/source_big/Forrest_Gump.jpg'),
(2, 12, 'Matrix', 'Thomas est un hacker perdu dans la vie. Il est contacté par Morpheus qui lui montre la réalité, une humanité réduite en esclavage par les machines.', 2, 49, '2018-12-19 00:00:00.000000', '0000-00-00', 'Warner', ' Lilly Wachowski et Lana Wachowski', 'https://media.senscritique.com/media/000005649130/source_big/Matrix.jpg'),
(3, 50, 'L\'École du micro d\'argent', 'L\'album a été enregistré en partie aux États-Unis, avec des influences de RZA, membre du Wu-Tang Clan.\r\n\r\nLes textes de l\'album sont souvent considérés comme d\'une rare finesse par comparaison avec l\'essentiel de la scène du rap français[réf. nécessaire]. Peu de rappeurs sont parvenus à aborder les thèmes sociaux avec autant de justesse. ', 1, 12, '2018-12-19 00:00:00.000000', '1997-08-02', 'Prince Charles Alexander', 'IAM', 'http://3.bp.blogspot.com/_tUfgPtygpW8/TO1XuiaHqQI/AAAAAAAAAAg/1qpMiQ0JZiI/s1600/LECOLE+DU+MICRO+DARGENT.jpg'),
(4, 5, 'Nevermind', 'Nevermind est le deuxième album studio du groupe américain de grunge Nirvana, sorti le 24 septembre 1991 par le label DGC Records. Kurt Cobain écrit et compose seul quasiment toutes les chansons de l\'album et le groupe commence à enregistrer en avril 1990 avec le producteur Butch Vig mais la session est interrompue prématurément. Le batteur Chad Channing quitte ensuite le groupe et est remplacé par Dave Grohl. Le groupe change également de label et reprend l\'enregistrement de l\'album en mai 1991 avec de nouvelles chansons, dont Smells Like Teen Spirit et Come as You Are. ', 1, 19, '2018-12-19 00:00:00.000000', '0000-00-00', 'Butch Vig', 'Nirvana', 'https://i.pinimg.com/originals/84/31/e5/8431e5d486e3ecae021ba5a3b97a9dc7.jpg'),
(5, 32, 'Sings the Blues', 'Sings the Blues est un album de la chanteuse, pianiste et compositrice Nina Simone pour le label RCA Records. Il a été enregistré à New York entre les mois de décembre 1966 et janvier 1967 et a été distribué à partir du mois d\'avril 1967. ', 1, 19, '2018-12-21 10:44:32.532000', '1966-09-14', 'RCA Recors', 'Nina Simone', 'http://musiconvinyl.com/filemanager/images/Nina_Simone_-_Sings_The_Blues.jpg'),
(6, 500, 'Au Marché Des Illusions', 'Babylon Circus est un groupe de musique français anciennement chanson, reggae et rock formé en 1995 à Lyon. Il est aujourd\'hui composé de 9 musiciens, et a donné plus de 1 500 concerts dans 35 pays différents. En 2013, le groupe sort son 5e album studio, Never Stop, confirmant son nouveau style pop, mélangeant ska, rock et chanson française.\n', 1, 15, '2017-04-21 10:48:30.894000', '2007-12-12', 'Bab', 'Babylon Circus', 'http://www.music-bazaar.com/album-images/vol1001/525/525842/2359511-big/Au-March%C3%A9-Des-Illusions-cover.jpg'),
(7, 1200, 'Tout Va Bien (EP)', 'Certaines chansons sont sans texte (Lorenzo par exemple est un enchaînement de solos). Les paroles sont en anglais et en français. Le texte est souvent engagé (Mighty Woman, De la musique et du bruit, Lundi 6h…), en général assez recherché. À noter que l\'album La belle étoile a évolué vis-à-vis des précédents: le style opère un rapprochement avec la chanson française, bien rythmée, avec une prépondérance de la voix et des orchestrations plus sobres s\'ouvrant à d\'autres styles, des nouvelles collaborations, et plus de textes en français, toujours poétiques. ', 1, 15, '2017-12-21 10:51:23.872000', '2016-12-20', 'Bab', 'Babylon Circus', 'https://img.discogs.com/jiGft9KTJegDUwlAaQZ7fJyB4ZM=/fit-in/600x600/filters:strip_icc():format(jpeg):mode_rgb():quality(90)/discogs-images/R-3415646-1363519235-7207.jpeg.jpg'),
(8, 200, 'Musika', 'Babylon Circus est un groupe de musique français anciennement chanson, reggae et rock formé en 1995 à Lyon. Il est aujourd\'hui composé de 9 musiciens, et a donné plus de 1 500 concerts dans 35 pays différents. En 2013, le groupe sort son 5e album studio, Never Stop, confirmant son nouveau style pop, mélangeant ska, rock et chanson française.\n', 1, 15, '2017-12-21 10:51:23.872000', '2018-12-20', 'Bab', 'Babylon Circus', 'http://www.music-bazaar.com/album-images/vol1003/525/525727/2359323-big/Musika-cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `type_user` tinyint(4) NOT NULL,
  `email_user` varchar(400) NOT NULL,
  `adress_user` varchar(500) NOT NULL,
  `postal_user` varchar(200) NOT NULL,
  `pass_user` varchar(500) NOT NULL,
  `firstname_user` varchar(255) NOT NULL,
  `lastname_user` varchar(255) NOT NULL,
  `idconnect_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `type_user`, `email_user`, `adress_user`, `postal_user`, `pass_user`, `firstname_user`, `lastname_user`, `idconnect_user`) VALUES
(4, 2, 'test@test.fr', 'testt', '69140', 'test', 'test', 'test', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
