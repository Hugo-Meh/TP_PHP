-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Août 2017 à 05:35
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`) VALUES
(1, 'Fiction'),
(2, 'Uthopie'),
(3, 'Théatre'),
(4, 'Tragédie Grecque'),
(5, 'Roman Realiste'),
(6, 'Littérature Française'),
(7, 'Compte philosophique'),
(8, 'Fable'),
(9, 'Tragédie'),
(10, 'Fantastique'),
(11, 'Aventure'),
(12, 'Traité Millitaire'),
(13, 'Receuil de nouvelle'),
(14, 'Poésie'),
(15, 'Historique'),
(16, 'Epopée'),
(17, 'Policier'),
(18, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_livre`
--

CREATE TABLE `categorie_livre` (
  `id_livre` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie_livre`
--

INSERT INTO `categorie_livre` (`id_livre`, `id_cat`) VALUES
(1, 1),
(9, 1),
(10, 1),
(14, 1),
(1, 2),
(2, 3),
(6, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 6),
(5, 6),
(4, 7),
(5, 8),
(11, 8),
(6, 9),
(7, 10),
(12, 10),
(7, 11),
(9, 11),
(12, 11),
(18, 11),
(10, 12),
(8, 13),
(13, 14),
(16, 14),
(14, 15),
(15, 16),
(16, 16),
(17, 17),
(19, 17),
(20, 18);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id_livre` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `url_img` text,
  `alt_img` text,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`id_livre`, `titre`, `auteur`, `description`, `url_img`, `alt_img`, `prix`, `qte`) VALUES
(1, '1984', 'George Orwell', 'Roman essentiel de science-fiction, «1984» touche à la surveillance façon «Big Brother», \r\nmais aussi à la délation, à la propagande et à l’étouffement de tout sens critique. En bref, \r\ntout ce qui est, encore aujourd\'hui, utilisé pour la mise en place d’une pensée unique. \r\nModerne et troublant.', 'image/book_cover/1984.jpg', 'book cover Roman science-fiction 1984 ', 10, 100),
(2, 'Antigone', 'Anouhil', 'Antigone d’Anouilh est inspirée par le mythe antique, \r\nrompant avec la tradition de la tragédie grecque. ‘L’Antigone de Sophocle, lu et relu, et \r\nje connaissais par cœur a toujours été un choc soudain pour moi pendant la guerre, les jours de petits panneaux rouges. \r\nJ’ai réécrit mon chemin, avec la résonance de la tragédie nous étions alors éprouver.', 'image/book_cover/Antigone.jpg', 'book cover roman ANTIGONE', 10, 100),
(3, 'Bel-Ami', 'Guy de Maupassant', 'Georges Duroy, surnommé Bel-Ami, doit son ascension sociale aux femmes qui succombent à son \r\ncharme irrésistible. Une peinture féroce du milieu journalistique parisien du XIXe siècle, accompagnée de \r\nrepères historiques et littéraires ainsi que de documents permettant de mieux comprendre l\'oeuvre.\r\n', 'image/book_cover/Bel-Ami.jpg', 'book cover roman Bel-Ami', 10, 100),
(4, 'Candide ou l\'optimisme', 'Voltaire', 'Que signifie ce nom «Candide» : innocence de celui qui ne connait pas le mal ou illusion du naïf qui n\'a pas fait \r\nl\'expérience du monde ? Voltaire joue en 1759, après le tremblement de terre de Lisbonne, sur ce double sens. \r\nIl nous fait partager les épreuves fictives d\'un jeune homme simple, confronté aux leurres de l\'optimisme, \r\nmais qui n\'entend pas désespérer et qui en vient à une sagesse finale, mesurée et mystérieuse.\r\n', 'image/book_cover/Candide.jpg', 'book cover roman Candide', 10, 100),
(5, 'Fables', 'Jean de La Fontaine', 'Découvrez dans ces deux livres en papiers découpés seize fables \r\nde Jean de La Fontaine mises en scène avec finesse et malice. \r\nÀ la manière d\'une pièce de théâtre du XVIIe siècle, chaque animal joue son rôle \r\nafin de restituer l\'atmosphère et l\'esprit uniques de ces fables.\r\n', 'image/book_cover/Fables.jpg', 'book cover roman Fables', 10, 100),
(6, 'Hamlet ', 'William Shakespear', 'Mort à peine depuis deux mois, non, pas autant, pas deux, \r\nUn si excellent roi, qui était à celui-ci \r\nCe qu\'Hypérion est à un satyre, si tendre pour ma mère \r\nQu\'il ne permettait pas aux vents du ciel \r\nDe toucher trop rudement son visage. Ciel et terre, \r\nEst-ce à moi de m\'en souvenir ? Oh ! Elle se pendait à lui \r\nComme si son appétit de lui croissait \r\nDe s\'en repaître, et pourtant en un mois, \r\nN\'y pensons plus : fragilité, ton nom est femme. \r\nUn petit mois, les souliers n\'étaient pas même usés \r\nAvec lesquels elle suivait le corps de mon pauvre père, \r\nComme Niobé, tout en larmes, elle, oui, elle - \r\nÔ Dieu, une bête à qui manque la faculté de raison \r\nAurait pleuré plus longtemps ! - se mariait à mon oncle, \r\nLe frère de mon père, mais qui ne ressemble pas plus à mon père \r\nQue moi à Hercule...\r\n', 'image/book_cover/Hamlet.jpg', 'book cover roman Hamlet', 10, 100),
(7, 'Harry Potter tome 5 : L\'ordre du phoenix', 'Joanne Kathleen Rowling', 'À quinze ans, Harry entre en cinquième année à Poudlard, mais il n\'a jamais été si anxieux. \r\nL\'adolescence, la perspective des examens et ces étranges cauchemars... Car Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom est de retour.\r\n Le ministère de la Magie semble ne pas prendre cette menace au sérieux, contrairement à Dumbledore. \r\nLa résistance s\'organise alors autour de Harry qui va devoir compter sur le courage et la fidélité de ses amis de toujours... \r\n\r\n\r\nD\'une inventivité et d\'une virtuosité rares, découvrez le cinquième tome de cette saga que son auteur a su hisser au rang de \r\nvéritable phénomène littéraire.\r\n\r\n', 'image/book_cover/Harry_Potter.jpg', 'book cover roman Harry Potter Tome 5', 10, 100),
(8, 'Histoire extraordinaire', 'Allan Edgar Poe', 'L\'homme est lui-même et ce qu\'il cache. Ce secret hanta Edgar Poe. Le descendant de la maison Usher qui croit sa soeur morte, l\'assassin du \r\nchat noir et William Wilson sont victimes de leur double, le cousin de Bérénice l\'est de sa névrose obsessionnelle, le peintre du portrait ovale, de son art.\r\n     Dans ces nouvelles fantastiques, prolongement des Histoires extraordinaires, les cadavres se promènent, un sourire ironique aux lèvres, les femmes sont « belles comme un rêve de pierre », \r\net la mort clôt chaque récit. L\'envoûtement est total, l\'horreur atteint son point culminant et pourtant la réalité est là, \r\ntangible, pour chasser l\'irrationnel. Fasciné par cette oeuvre américaine, Baudelaire l\'a traduite admirablement et rendue \r\ncélèbre dans le monde entier.\r\n\r\n', 'image/book_cover/Histoire_extraordinaire.jpg', 'book cover roman Histoire extraordinaire', 10, 100),
(9, 'The Hunger Games', 'Suzanne Collins', 'Dans un futur sombre, sur les ruines des États-Unis, un jeu télévisé est créé pour contrôler le peuple par la terreur.\r\nDouze garçons et douze filles tirés au sort participent à cette sinistre téléréalité, que tout le monde est forcé de regarder en direct.\r\nUne seule règle dans l\'arène : survivre, à tout prix.', 'image/book_cover/Hunger_games.jpg', 'book cover roman Hunger games', 10, 100),
(10, 'L\'art de la guerre', 'Sun Tzu', 'Au cours de l\'histoire, nombreuses sont les guerres qui changèrent le paysage politique et culturel du monde. \r\nSource de bouleversements, de destructions et de violences, elles contribuèrent néanmoins à l\'évolution de la \r\ncréation artistique. En effet, malgré les événements traumatisants qu\'elles engendrent, les guerres inspirent les \r\nartistes depuis toujours. Ces derniers immortalisent ces moments dramatiques en des ouvres qui sont autant de précieux \r\ntémoignages pour toutes les générations. Ce livre offre au lecteur les illustrations des batailles les plus connues et \r\nautres scènes de guerre.\r\n', 'image/book_cover/art_de_la_guerre.jpg', 'book cover roman l\'art de la guerre', 10, 100),
(11, 'Le petit prince', 'Antoine de Saint-Exupéry', 'J\'ai ainsi vécu seul, sans personne avec qui parler véritablement, jusqu\'à une panne dans le désert du Sahara, il y a six ans. \r\nQuelque chose s\'était cassé dans mon moteur. Et comme je n\'avais avec moi ni mécanicien, ni passagers, je me préparai à essayer \r\nde réussir, tout seul, une réparation difficile. C\'était pour moi une question de vie ou de mort. J\'avais à peine de l\'eau à \r\nboire pour huit jours. Le premier soir je me suis donc endormi sur le sable à mille milles de toute terre habitée. \r\nJ\'étais bien plus isolé qu\'un naufragé sur un radeau au milieu de l\'océan. Alors vous imaginez ma surprise, au lever du jour, \r\nquand une drôle de petite voix m\'a réveillé. Elle disait : ... " S\'il vous plaît... dessine-moi un mouton ! "\r\n', 'image/book_cover/le_petit_prince.jpg', 'book cover du romanle petit prince', 10, 100),
(12, 'Le seigneur des anneaux', 'John Ronald Reuel Tolkien', 'THE LORD OF THE RING est un livre fort curieux, à l\'époque du Nouveau Roman et du délire technicitaire chez les romanciers. \r\nL\'auteur a, de toute évidence, voulu ressusciter le récit d\'aventures fabuleuses, proche du conte de fées dans la mesure où \r\nle merveilleux y joue un grand rôle, proche aussi des chroniques imaginaires (voyages, utopies, etc) \r\nqui ont fleuri en Angleterre aux XVe et XVIe siècles. \r\n', 'image/book_cover/le_seigneur_des_anneaux.jpg', 'book cover du roman le seigneur des anneaux', 10, 100),
(13, 'Les fleurs du mal', 'Charles Baudelaire', 'Avec Les Fleurs du Mal commence la poésie moderne : le lyrisme subjectif s\'efface devant cette « impersonnalité volontaire »\r\n que Baudelaire a lui-même postulée ; la nature et ses retours cycliques cèdent la place au décor urbain et à ses changements \r\nmarqués par l\'Histoire, et il arrive que le poète accède au beau par l\'expérience de la laideur. Quant au mal affiché dès le titre \r\ndu recueil, s\'il nous apporte la preuve que l\'art ici se dénoue de la morale, il n\'en préserve pas moins la profonde \r\nspiritualité des poèmes. \r\n', 'image/book_cover/les_fleurs_du_mal.jpg', 'book cover du romanles fleurs du mal', 10, 100),
(14, 'Les Misérables', 'Victor Hugo', 'Je m\'appelle Jean Valjean. Je suis un galérien. J\'ai passé dix-neuf ans au bagne. Je suis libéré depuis \r\nquatre jours et en route pour Pontarlier qui est ma destination. Quatre jours que je marche depuis Toulon. \r\nAujourd\'hui j\'ai fait douze lieues à pied. Ce soir en arrivant dans ce pays, j\'ai été dans une auberge, on m\'a renvoyé à cause \r\nde mon passeport jaune que j\'avais montré à la mairie. J\'ai été à une autre auberge. On m\'a dit : - Va-t\'en ! Chez l\'un, chez l\'autre.\r\nPersonne n\'a voulu de moi. J\'ai été à la prison, le guichetier ne m\'a pas ouvert. J\'ai été dans la niche d\'un chien. \r\nCe chien m\'a mordu et m\'a chassé, comme s\'il avait été un homme. On aurait dit qu\'il savait qui j\'étais\r\n', 'image/book_cover/les_miserable.jpg', 'book cover du roman les miserable', 10, 100),
(15, 'L\'Odyssée', 'Homère', '« Ô Muse, conte-moi l\'aventure de l\'inventif : celui qui pilla Troie, qui pendant des années erra, voyant beaucoup de villes, \r\ndécouvrant beaucoup d\'usages, souffrant beaucoup d\'angoisse dans son âme sur la mer pour défendre sa vie et le retour de ses \r\nmarins sans en pouvoir sauver un seul, quoi qu\'il en eût : par leur propre fureur ils lurent perdus en effet, \r\nces enfants qui touchèrent aux troupeaux du dieu d\'En-Haut, le Soleil qui leur prit le bonheur du retour... \r\nÀ nous aussi, Fille de Zeus, conte un peu ces exploits ! » \r\nAinsi s\'ouvre le premier des vingt-quatre chants de L\'Odyssée \r\n', 'image/book_cover/Odyssée.jpg', 'book cover du roman L\'Odyssée', 10, 100),
(16, 'L\'Iliade', 'Homère', 'Depuis neuf ans, Grecs et Troyens luttent sous le regard des dieux, arbitres des destinées humaines. La beauté d\'une femme et \r\nles richesses d\'une cité sont l\'enjeu de la guerre. Mais le sort est fixé d\'avance : Troie doit tomber aux mains des Achéens. \r\nCependant, voici qu\'une terrible querelle éclate au sein de l\'armée grecque entre le chef d\'expédition Agamemnon et \r\nle vaillant héros Achille : permettra-t-elle aux Troyens et à leurs alliés divins de retenir le cours inévitable de l\'histoire \r\net de repousser encore le jour fatal de la défaite ?\r\n', 'image/book_cover/illyade.jpg', 'book cover du roman l\'illyade', 10, 100),
(17, 'Millenium. vol1 Les hommes qui n\'aimait pas les femmes', 'Stieg Larsson', 'Après avoir perdu un procès en diffamation, Mikael Blomkvist, brillant journaliste d\'investigation, démissionne \r\nde la revue Millénium et ressasse son dépit. Il est contacté par un magnat de l\'industrie qui lui confie une enquête vieille \r\nde quarante ans : sur l\'île abritant l\'imposante propriété familiale, sa nièce, Harriet Vanger, a naguère disparu, et\r\nil reste persuadé qu\'elle a été assassinée. Si ce n\'est pas exactement le hasard qui réunit Mikael Blomkvist et\r\nLisbeth Salander, réchappée des services sociaux et génie de l\'informatique, c\'est une vraie chance, \r\ncar la jeune femme va bien vite s\'imposer comme le meilleur atout du journaliste pour élucider l\'affaire. \r\n', 'image/book_cover/millenium_tome_1_les_hommes_qui_n_aimaient_pas_les_femmes_780918.jpg', 'book cover du roman millenium tome 1', 10, 100),
(18, 'Moby Dick', 'Herman Melville', 'Moby Dick (1851), le chef-d\'oeuvre de \r\nMelville, est l\'histoire d\'une obsession : \r\ndepuis qu\'un féroce cachalot a emporté \r\nla jambe du capitaine Achab, celui-ci le \r\npoursuit sans relâche de sa haine. Ismaël, \r\nmatelot embarqué à bord du baleinier \r\nle Péquod, se trouve pris peu à peu dans \r\nle tourbillon de cette folle vengeance : c\'est \r\npar sa voix que se fera entendre l\'affrontement final de \r\nl\'homme et du grand Léviathan blanc. \r\n', 'image/book_cover/moby_dick.jpg', 'book cover du roman moby dick', 10, 100),
(19, 'Mort sur le nil', 'Agatha Christie', 'Ce n\'est pas très joli de voler son fiancé à sa meilleure amie pour se marier \r\navec lui. Et même si l\'amie en question semble se résigner, la ravissante et riche \r\nLinnet Ridgeway a bien des raisons d\'être inquiète... Surtout quand le hasard les\r\nrassemble, pour une croisière sur le Nil, avec d\'inquiétants personnages, dans \r\nune atmosphère lourde de sensualité et de cupidité. \r\nUn petit revolver, un crime étrange, une énigme de plus à résoudre pour un \r\npassager pas comme les autres : Hercule Poirot.\r\n', 'image/book_cover/mort_sur_le_nil.jpg', 'book cover du roman mort sur le nil', 10, 100),
(20, 'Starters', 'Lissa Price', 'Après les ravages d\'un virus mortel, seules ont survécu les populations très jeunes ou très âgées\r\n : les Starters et les Enders. Réduite à la misère, la jeune Callie tente de survivre dans la rue avec son petit frère.\r\n Elle prend alors la décision de louer son corps à un mystérieux institut scientifique, la Banque des Corps. \r\nC\'est le premier volet d\'un thriller d\'anticipation qui vous plongera au coeur d\'une société fascinée par les apparences.', 'image/book_cover/starters.jpg', 'book cover du roman starters', 10, 100);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_livre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `is_sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `mail`, `password`, `adresse`, `tel`) VALUES
(1, 'nefzi', 'mohamed', 'mohamednefzi.1985@gmail.com', 'php2017', 'henri bourassa', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `categorie_livre`
--
ALTER TABLE `categorie_livre`
  ADD PRIMARY KEY (`id_livre`,`id_cat`),
  ADD UNIQUE KEY `id_livre_2` (`id_livre`,`id_cat`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_livre`,`id_user`,`is_sold`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie_livre`
--
ALTER TABLE `categorie_livre`
  ADD CONSTRAINT `categorie_cat_livre` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livre_cat_livre` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id_livre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `livre_panier` FOREIGN KEY (`id_livre`) REFERENCES `livres` (`id_livre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_panier` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
