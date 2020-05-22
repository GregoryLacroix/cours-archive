-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 26 mars 2020 à 08:46
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rev39301`
--

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `idArchive` int(11) NOT NULL,
  `folder` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `communication` varchar(150) NOT NULL,
  `evaluation` varchar(150) NOT NULL,
  `example` varchar(150) NOT NULL,
  `plan` varchar(150) NOT NULL,
  `support` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`idArchive`, `folder`, `color`, `communication`, `evaluation`, `example`, `plan`, `support`) VALUES
(4, 'AJAX', 'danger', 'https://cours-archive.fr/FOLDER/AJAX/communication_evogue_ajax.zip', 'https://cours-archive.fr/FOLDER/AJAX/evaluation_evogue_ajax.zip', 'https://cours-archive.fr/FOLDER/AJAX/exemples_evogue_ajax.zip', 'https://cours-archive.fr/FOLDER/AJAX/plans_evogue_ajax.zip', 'https://cours-archive.fr/FOLDER/AJAX/support_evogue_ajax.zip'),
(6, 'JAVASCRIPT', 'warning', 'https://cours-archive.fr/FOLDER/JAVASCRIPT/communication_evogue_javascript.zip', 'https://cours-archive.fr/FOLDER/JAVASCRIPT/evaluation_evogue_javascript.zip', 'https://cours-archive.fr/FOLDER/JAVASCRIPT/exemples_evogue_javascript.zip', 'https://cours-archive.fr/FOLDER/JAVASCRIPT/plans_evogue_javascript.zip', 'https://cours-archive.fr/FOLDER/JAVASCRIPT/support_evogue_javascript.zip'),
(7, 'BOOTSTRAP', 'success', 'https://cours-archive.fr/FOLDER/BOOTSTRAP/communication_evogue_bootstrap.zip', 'https://cours-archive.fr/FOLDER/BOOTSTRAP/evaluation_evogue_bootstrap.zip', 'https://cours-archive.fr/FOLDER/BOOTSTRAP/exemples_evogue_bootstrap.zip', 'https://cours-archive.fr/FOLDER/BOOTSTRAP/plan_evogue_bootstrap.zip', 'https://cours-archive.fr/FOLDER/BOOTSTRAP/support_evogue_bootstrap.zip'),
(8, 'XML', 'dark', 'https://cours-archive.fr/FOLDER/XML/communication_evogue_xml.zip', 'https://cours-archive.fr/FOLDER/XML/evaluations_evogue_xml.zip', 'https://cours-archive.fr/FOLDER/XML/exemples_evogue_xml.zip', 'https://cours-archive.fr/FOLDER/XML/plan_evogue_xml.zip', 'https://cours-archive.fr/FOLDER/XML/support_evogue_xml.zip'),
(9, 'GIT-GITHUB', 'dark', 'https://cours-archive.fr/FOLDER/GIT-GITHUB/communication_git.zip', 'https://cours-archive.fr/FOLDER/GIT-GITHUB/evaluation_git.zip', 'https://cours-archive.fr/FOLDER/GIT-GITHUB/exemple_git.zip', 'https://cours-archive.fr/FOLDER/GIT-GITHUB/plan_git.zip', 'https://cours-archive.fr/FOLDER/GIT-GITHUB/support_git.zip'),
(10, 'WORDPRESS', 'primary', 'https://cours-archive.fr/FOLDER/WORDPRESS/communication_evogue_wordpress.zip', 'https://cours-archive.fr/FOLDER/WORDPRESS/evaluation_evogue_wordpress.zip', 'https://cours-archive.fr/FOLDER/WORDPRESS/exemples_evogue_wordpress.zip', 'https://cours-archive.fr/FOLDER/WORDPRESS/plan_evogue_wordpress.zip', 'https://cours-archive.fr/FOLDER/WORDPRESS/support_evogue_wordpress.zip'),
(11, 'HTML-CSS', 'success', 'https://cours-archive.fr/FOLDER/HTML-CSS/communication_evogue_HtmlCss.zip', 'https://cours-archive.fr/FOLDER/HTML-CSS/evaluation_evogue_HtmlCss.zip', 'https://cours-archive.fr/FOLDER/HTML-CSS/exemples_evogue_HtmlCss.zip', 'https://cours-archive.fr/FOLDER/HTML-CSS/plan_evogue_HtmlCss.zip', 'https://cours-archive.fr/FOLDER/HTML-CSS/support_evogue_HtmlCss.zip'),
(12, 'PHP', 'info', 'https://cours-archive.fr/FOLDER/PHP/communication_evogue_php.zip', 'https://cours-archive.fr/FOLDER/PHP/evaluation_evogue_php.zip', 'https://cours-archive.fr/FOLDER/PHP/exemples_evogue_php.zip', 'https://cours-archive.fr/FOLDER/PHP/plans_evogue_php.zip', 'https://cours-archive.fr/FOLDER/PHP/support_evogue_php.zip'),
(13, 'SQL', 'info', 'https://cours-archive.fr/FOLDER/SQL/communication_evogue_sql.zip', 'https://cours-archive.fr/FOLDER/SQL/evaluation_evogue_sql.zip', 'https://cours-archive.fr/FOLDER/SQL/exemples_evogue_sql.zip', 'https://cours-archive.fr/FOLDER/SQL/plans_evogue_sql.zip', 'https://cours-archive.fr/FOLDER/SQL/support_evogue_sql.zip'),
(14, 'POO', 'info', 'https://cours-archive.fr/FOLDER/POO/communication_evogue_phpoo.zip', 'https://cours-archive.fr/FOLDER/POO/evaluation_evogue_phpoo.zip', 'https://cours-archive.fr/FOLDER/POO/exemples_evogue_phpoo.zip', 'https://cours-archive.fr/FOLDER/POO/plan_evogue_phpoo.zip', 'https://cours-archive.fr/FOLDER/POO/support_evogue_phpoo.zip'),
(15, 'JQUERY', 'warning', 'https://cours-archive.fr/FOLDER/JQUERY/communication_evogue_jquery.zip', 'https://cours-archive.fr/FOLDER/JQUERY/evaluation_evogue_jquery.zip', 'https://cours-archive.fr/FOLDER/JQUERY/exemples_evogue_jquery.zip', 'https://cours-archive.fr/FOLDER/JQUERY/plans_evogue_jquery.zip', 'https://cours-archive.fr/FOLDER/JQUERY/support_evogue_jquery.zip'),
(16, 'RWD', 'success', 'https://cours-archive.fr/FOLDER/RWD/communication_evogue_responsive.zip', 'https://cours-archive.fr/FOLDER/RWD/evaluation_evogue_responsive.zip', 'https://cours-archive.fr/FOLDER/RWD/exemples_evogue_responsive.zip', 'https://cours-archive.fr/FOLDER/RWD/plans_evogue_responsive.zip', 'https://cours-archive.fr/FOLDER/RWD/support_evogue_responsive.zip'),
(17, 'WOOCOMERCE', 'primary', 'https://cours-archive.fr/FOLDER/WOOCOMERCE/woocommerce.zip', 'https://cours-archive.fr/FOLDER/WOOCOMERCE/woocommerce.zip', 'https://cours-archive.fr/FOLDER/WOOCOMERCE/woocommerce.zip', 'https://cours-archive.fr/FOLDER/WOOCOMERCE/woocommerce.zip', 'https://cours-archive.fr/FOLDER/WOOCOMERCE/woocommerce.zip'),
(18, 'ENVIRONNEMENT', 'secondary', 'https://cours-archive.fr/FOLDER/ENVIRONNEMENT/EVOGUE_Comprendre_le_web.zip', 'https://cours-archive.fr/FOLDER/ENVIRONNEMENT/EVOGUE_Comprendre_le_web.zip', 'https://cours-archive.fr/FOLDER/ENVIRONNEMENT/EVOGUE_Comprendre_le_web.zip', 'https://cours-archive.fr/FOLDER/ENVIRONNEMENT/EVOGUE_Comprendre_le_web.zip', 'https://cours-archive.fr/FOLDER/ENVIRONNEMENT/EVOGUE_Comprendre_le_web.zip'),
(19, 'NEWSLETTER', 'warning', 'https://cours-archive.fr/FOLDER/NEWSLETTER/communication_evogue_newsletter.rar', 'https://cours-archive.fr/FOLDER/NEWSLETTER/evaluation_evogue_newsletter.rar', 'https://cours-archive.fr/FOLDER/NEWSLETTER/exemples_evogue_newsletter.rar', 'https://cours-archive.fr/FOLDER/NEWSLETTER/plans_evogue_newsletter.rar', 'https://cours-archive.fr/FOLDER/NEWSLETTER/support_evogue_newsletter.rar');

-- --------------------------------------------------------

--
-- Structure de la table `connected`
--

CREATE TABLE `connected` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connected`
--

INSERT INTO `connected` (`id`, `pseudo`, `ip`, `date`) VALUES
(1, 'GregFormateur', '::1', 1585208317),
(2, 'azazaz', '::1', 1585168539);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `statut` enum('admin','student') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `email`, `mdp`, `nom`, `prenom`, `statut`) VALUES
(5, 'etudiant@gmail.com', '$2y$10$9wUxx8R0kdYQpUNOcMdqeO.uuEFvuyH/chb8kf09W258tnf3xgcPe', 'ETUDIANT', 'Etudiant', 'student'),
(6, 'gregorylacroix78@gmail.com', '$2y$10$uR8YBfqQL0muvF20jJh6tOyA8jFkmMA/1dJkQDBNJzLBYlfWJs5la', 'LACROIX', 'Grégory', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `pseudo`, `message`, `date`) VALUES
(19, 'GregFormateur', 'Hello !!!', '2020-03-25 17:22:50'),
(20, 'GregFormateur', 'Hello !!!', '2020-03-25 19:28:07'),
(21, 'GregFormateur', 'Comment &ccedil;a va ?', '2020-03-25 21:20:44'),
(22, 'GregFormateur', 'Comment ça va ?', '2020-03-25 21:21:28'),
(23, 'GregFormateur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quis justo ac libero rutrum maximus eu eu dui. Quisque lobortis lectus leo, vel tincidunt mi lacinia nec. Fusce ipsum lectus, ullamcorper ac est in, lacinia venenatis eros. Mauris volutpat turpis', '2020-03-25 21:22:45'),
(24, 'GregFormateur', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quis justo ac libero rutrum maximus eu eu dui. Quisque lobortis lectus leo, vel tincidunt mi lacinia nec. Fusce ipsum lectus, ullamcorper ac est in, lacinia venenatis eros. Mauris volutpat turpis vel magna sollicitudin, eu commodo nibh viverra. Sed quis lacus felis. Cras gravida metus at elit euismod, eget fermentum ante auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer posuere est quam, eget pellentesque metus fermentum sed. Sed cursus libero ac tempor mattis. Nullam consectetur vulputate sapien, eu pretium odio consectetur ac. Curabitur eu mattis tellus. Vestibulum tincidunt leo id blandit hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.  Duis dictum sem eros, a congue eros cursus auctor. Vestibulum odio nisi, ultricies sed auctor vel, placerat eget ante. Donec id ornare ipsum, condimentum commodo nisl. Proin lacinia sagittis maximus. Cras mattis blandit lacus, id rhoncus massa dapibus sed. Donec a fringilla mi, non commodo magna. Nulla suscipit dictum turpis quis consequat. Donec cursus erat nisi, rhoncus scelerisque dui sagittis in. Sed egestas urna a eros imperdiet hendrerit. Sed porttitor ex ipsum, nec molestie lorem dapibus eu. Maecenas odio ligula, dignissim et nunc tincidunt, interdum finibus arcu. Vestibulum vehicula, risus eget malesuada ultrices, libero leo consectetur sem, in placerat urna velit sit amet est. Ut vitae risus eu dui volutpat tempus. Nullam id tristique risus. Praesent eu leo neque. Donec massa nulla, luctus a magna pharetra, ornare cursus dui.  Phasellus porta rutrum ipsum ac faucibus. Integer in turpis tempor, viverra sem ac, egestas libero. In vehicula turpis diam, finibus posuere urna congue at. Suspendisse sit amet est vitae ligula malesuada efficitur. Vestibulum in dolor et lacus pulvinar suscipit. Integer viverra ac magna quis lacinia. Maecenas ut ligula viverra, feugiat ipsum sit amet, eleifend ante. Duis sagittis orci id arcu interdum, vel consectetur mauris porta.', '2020-03-25 21:24:04'),
(25, 'GregFormateur', 'if(!preg_match(\'#^[a-zA-Z0-9]{2,20}+$#\', $_POST[\'pseudo\']))         {             $errorPseudo = \'Caractères autorisés : [a-zA-Z0-9] (entre 2 et 20 max)\';         }', '2020-03-25 21:47:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`idArchive`);

--
-- Index pour la table `connected`
--
ALTER TABLE `connected`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `archive`
--
ALTER TABLE `archive`
  MODIFY `idArchive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `connected`
--
ALTER TABLE `connected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
