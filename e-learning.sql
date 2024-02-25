-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 24 jan. 2021 à 18:37
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-learning`
--

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `catg` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `section_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `catg`, `content`, `created_at`, `updated_at`, `section_id`) VALUES
(5, 'html', 'Ce chapitre présente les notions de base du langage HTML', 'course', '<h2>Les &eacute;l&eacute;ments et les balises</h2>\r\n\r\n<h3>Les &eacute;l&eacute;ments</h3>\r\n\r\n<p>HTML est un&nbsp;<cite>markup language</cite>&nbsp;(langage de marquage ?). Il permet d&#39;enrichir un texte avec des informations structurelles, s&eacute;mantiques et de pr&eacute;sentation. Le principe de HTML, commun &agrave; ce type de langages (SGML pour&nbsp;<cite>Standart Generalized Mark-up Language</cite>), consiste &agrave; utiliser des&nbsp;<em>&eacute;l&eacute;ments</em>&nbsp;d&eacute;limit&eacute;s par des&nbsp;<em>balises</em>.</p>\r\n\r\n<blockquote>En fait,&nbsp;<strong>HTML</strong>&nbsp;est un langage de type&nbsp;<strong>SGML</strong>, correspondant &agrave; un ensemble particulier d&#39;&eacute;l&eacute;ments pour d&eacute;crire des pages destin&eacute;es au World Wide Web.</blockquote>\r\n\r\n<p>Les&nbsp;<strong>&eacute;l&eacute;ments</strong>&nbsp;permettent d&#39;associer &agrave; diff&eacute;rents blocs (texte, images...) les informations structurelles, s&eacute;mantiques et de pr&eacute;sentation d&eacute;sir&eacute;es. Les principaux &eacute;l&eacute;ments HTML permettent de d&eacute;finir des liens hypertextes, des titres, des paragraphes, des listes, des tableaux, des images, et c&aelig;tera...<a name=\"balises\"></a></p>\r\n\r\n<h3>Les balises</h3>\r\n\r\n<p>Les &eacute;l&eacute;ments sont d&eacute;limit&eacute;s par des&nbsp;<strong>balises</strong>. On place une balise de d&eacute;but avant le contenu de l&#39;&eacute;l&eacute;ment et une balise de fin apr&egrave;s. Mais dans certains cas, la balise de fin n&#39;est pas n&eacute;cessaire.</p>\r\n\r\n<p>Une balise est form&eacute;e en encadrant le nom de l&#39;&eacute;l&eacute;ment avec les symboles&nbsp;<code>&lt;</code>&nbsp;et&nbsp;<code>&gt;</code>&nbsp;(soit&nbsp;<code>&lt;element&gt;</code>&nbsp;o&ugrave;&nbsp;<em>element</em>&nbsp;est le nom de l&#39;&eacute;l&eacute;ment). Pour une balise de fin on ajoute le caract&egrave;re&nbsp;<code>/</code>&nbsp;avant le nom de l&#39;&eacute;l&eacute;ment (soit&nbsp;<code>&lt;/element&gt;</code>. Dans l&#39;exemple suivant on d&eacute;finit un titre ou en-t&ecirc;te principal (&eacute;l&eacute;ment&nbsp;<code>H1</code>). Seul le texte balis&eacute; constitue l&#39;&eacute;l&eacute;ment H1. Les navigateurs courants utilisent pour ce genre d&#39;&eacute;l&eacute;ments une typographie plus forte.</p>\r\n\r\n<pre>\r\n&lt;H1&gt;L&#39;estuaire de Seine&lt;/H1&gt;\r\nLieu magique, rencontre du fleuve et de la mer, un environnement unique,\r\nl&#39;estuaire de Seine est aussi un lieu de communication important... \r\n</pre>\r\n\r\n<p>Ce code produit l&#39;affichage suivant dans un navigateur graphique :</p>\r\n\r\n<h1>L&#39;estuaire de Seine</h1>\r\n\r\n<p>Lieu magique, rencontre du fleuve et de la mer, un environnement unique, l&#39;estuaire de Seine est aussi un lieu de communication important...</p>\r\n\r\n<p>Enfin, un certain nombre de balises n&#39;ont pas besoin de marqueur de fin. La fin de l&#39;&eacute;l&eacute;ment sera d&eacute;termin&eacute;e automatiquement par le logiciel de navigation. C&#39;est le cas en particulier de l&#39;&eacute;l&eacute;ment&nbsp;<code>P</code>&nbsp;qui indique un nouveau paragraphe. Le code pr&eacute;c&eacute;dent serait d&#39;ailleurs plus correct en ajoutant une balise&nbsp;<code>&lt;P&gt;</code>&nbsp;apr&egrave;s le titre :</p>\r\n\r\n<pre>\r\n&lt;H1&gt;L&#39;estuaire de Seine&lt;/H1&gt;\r\n&lt;P&gt;Lieu magique, rencontre du fleuve et de la mer, un environnement unique,\r\nl&#39;estuaire de Seine est aussi un lieu de communication important... \r\n</pre>\r\n\r\n<p><a name=\"attributs\"></a></p>\r\n\r\n<h3>Les attributs</h3>\r\n\r\n<p>Les attributs permettent d&#39;apporter certaines pr&eacute;cisions &agrave; des &eacute;l&eacute;ments. Il peut s&#39;agir par exemple d&#39;un nom de fichier (pour placer une image) ou d&#39;une r&eacute;f&eacute;rence &agrave; une adresse HTML (lorsqu&#39;on cr&eacute;e un lien). On place les attributs dans la balise de d&eacute;but de l&#39;&eacute;l&eacute;ment concern&eacute;. La syntaxe est simple : &quot;nom de l&#39;attribut&quot;=&quot;valeur de l&#39;attribut&quot;.</p>\r\n\r\n<p>Dans l&#39;exemple suivant, on&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/textes/images.html\">place une image</a>&nbsp;(&eacute;l&eacute;ment&nbsp;<code>IMG</code>). Deux attributs permettent l&#39;un de d&eacute;terminer le nom du fichier contenant l&#39;image et l&#39;autre de placer une br&egrave;ve description de cette image.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<pre>\r\n&lt;IMG src=&quot;bateau01.jpg&quot; alt=&quot;Un bateau&quot;&gt;\r\n</pre>\r\n\r\n<p>Remarque 1 : l&#39;&eacute;l&eacute;ment&nbsp;<code>IMG</code>&nbsp;n&#39;a pas besoin de balise de fin.</p>\r\n\r\n<p>Remarque 2 : l&#39;attribut&nbsp;<code>alt</code>&nbsp;de l&#39;&eacute;l&eacute;ment&nbsp;<code>IMG</code>&nbsp;est indispensable pour construire des pages accessibles. Il a d&#39;ailleurs &eacute;t&eacute; rendu obligatoire par la norme HTML&nbsp;4.0.<a name=\"conventions\"></a></p>\r\n\r\n<h3>Conventions</h3>\r\n\r\n<p>Les noms des balises comme les attributs peuvent &ecirc;tre &eacute;crits indiff&eacute;remment en majuscule ou en minuscules. Cependant, pour plus de clart&eacute; dans ce cours, j&#39;essayerai d&#39;&eacute;crire syst&eacute;matiquement les noms d&#39;&eacute;l&eacute;ments en majuscules et en minuscules.</p>\r\n\r\n<p>[&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/index.html\">Cours HTML</a>&nbsp;] [&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/textes/bases.html#sommaire\">Sommaire</a>&nbsp;]</p>\r\n\r\n<hr />\r\n<p><a name=\"jeucar\"></a></p>\r\n\r\n<h2>Jeu de caract&egrave;res</h2>\r\n\r\n<p>Pour diff&eacute;rentes raisons le jeu de caract&egrave;re utilis&eacute; pour stocker les documents HTML est le code ASCII standard sur 7 bits. Ce code permet de d&eacute;crire le jeu de 128 caract&egrave;res de base comprenant les lettres majuscules et minuscules, les chiffres et les signes de ponctuation. Les caract&egrave;res accentu&eacute;s sont cod&eacute;s dans des jeux de caract&egrave;res &eacute;tendus &agrave; 8 bits.</p>\r\n\r\n<p>La principale raison qui aujourd&#39;hui oblige &agrave; continuer d&#39;utiliser le code ASCCI 7 bit et non un code &eacute;tendu est que tous les ordinateurs n&#39;utilisent pas les m&ecirc;mes codes &eacute;tendus (caract&egrave;res 128 &agrave; 255). Les machines sous Windows et la plupart des machines Unix utilisent maintenant le code dit ISO-LATIN1, mais les PC sous DOS, les MACintosh et diff&eacute;rents autres types d&#39;ordinateurs utilisent d&#39;autres codes.</p>\r\n\r\n<p>Pour &eacute;crire des documents susceptibles d&#39;&ecirc;tre consult&eacute;s sans probl&egrave;mes quelque soit le type de syst&egrave;me du client, il est n&eacute;cessaire de coder les caract&egrave;res accentu&eacute;s en utilisant un codage un peu particulier. On indique entre des caract&egrave;res&nbsp;<code>&amp;</code>&nbsp;et&nbsp;<code>;</code>&nbsp;la lettre et l&#39;accent. Ainsi le caract&egrave;re&nbsp;<code>&eacute;</code>&nbsp;doit-il &ecirc;tre repr&eacute;sent&eacute; par la chaine&nbsp;<code>&amp;eacute;</code>.</p>\r\n\r\n<p>Mais les caract&egrave;res accentu&eacute;s ne sont pas les seuls &agrave; &ecirc;tre cod&eacute;s de cette fa&ccedil;on. Le caract&egrave;re &amp; lui m&ecirc;me doit &ecirc;tre cod&eacute; de fa&ccedil;on particuli&egrave;re sinon comment diff&eacute;rencier les cas o&ugrave; on l&#39;utilise pour lui m&ecirc;me de ceux o&ugrave; il d&eacute;bute un caract&egrave;re sp&eacute;cial ? De m&ecirc;me les&nbsp;<code>&lt;</code>&nbsp;et&nbsp;<code>&gt;</code>&nbsp;pourraient &ecirc;tre confondus avec le d&eacute;but o&ugrave; la fin d&#39;une balise.</p>\r\n\r\n<p>Vous trouverez en annexe une&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/ressources/caracteres.html\">liste de tous les caract&egrave;res accentu&eacute;s et sp&eacute;ciaux</a>&nbsp;reconnus par les navigateurs. Voici quelques exemples parmi les plus fr&eacute;quement utilis&eacute;s.</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"5\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>\r\n			<td><code>&amp;eacute;</code></td>\r\n			<td><code>&eacute;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td rowspan=\"5\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>\r\n			<td><code>&amp;agrave;</code></td>\r\n			<td><code>&agrave;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td rowspan=\"5\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>\r\n			<td><code>&amp;lt;</code></td>\r\n			<td><code>&lt;</code></td>\r\n		</tr>\r\n		<tr>\r\n			<td><code>&amp;egrave;</code></td>\r\n			<td><code>&egrave;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;acirc;</code></td>\r\n			<td><code>&acirc;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;gt;</code></td>\r\n			<td><code>&gt;</code></td>\r\n		</tr>\r\n		<tr>\r\n			<td><code>&amp;ecirc;</code></td>\r\n			<td><code>&ecirc;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;ugrave;</code></td>\r\n			<td><code>&ugrave;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;quot;</code></td>\r\n			<td><code>&quot;</code></td>\r\n		</tr>\r\n		<tr>\r\n			<td><code>&amp;euml;</code></td>\r\n			<td><code>&euml;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;ccedil;</code></td>\r\n			<td><code>&ccedil;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;amp;</code></td>\r\n			<td><code>&amp;</code></td>\r\n		</tr>\r\n		<tr>\r\n			<td><code>&amp;Eacute;</code></td>\r\n			<td><code>&Eacute;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;Ccedil;</code></td>\r\n			<td><code>&Ccedil;</code></td>\r\n			<td>&nbsp;</td>\r\n			<td><code>&amp;nbsp;</code></td>\r\n			<td><code>espace ins&eacute;cable</code></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>[&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/index.html\">Cours HTML</a>&nbsp;] [&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/textes/bases.html#sommaire\">Sommaire</a>&nbsp;]</p>\r\n\r\n<hr />\r\n<p><a name=\"squelette\"></a></p>\r\n\r\n<h2>Squelette d&#39;un document</h2>\r\n\r\n<p>Un document HTML&nbsp;4.0 comporte 2 parties, encadr&eacute;es par des balises&nbsp;<code>&lt;HTML&gt;</code>&nbsp;et&nbsp;<code>&lt;/HTML&gt;</code>&nbsp;:</p>\r\n\r\n<ul>\r\n	<li>Un en-t&ecirc;te de d&eacute;claration (d&eacute;limit&eacute; par des balises&nbsp;<code>&lt;HEAD&gt;</code>)</li>\r\n	<li>Le corps du document, dans lequel on placera le contenu de celui-ci (d&eacute;limit&eacute; par des balises&nbsp;<code>&lt;BODY&gt;</code>, ou bien par des balises&nbsp;<code>&lt;FRAMESET&gt;</code>&nbsp;dans le cas d&#39;un document multi-frames).</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>D&#39;autre part, la version HTML utilis&eacute;e doit &ecirc;tre pr&eacute;cis&eacute;e dans la premi&egrave;re ligne, en utilisant une balise&nbsp;<code>&lt;!DOCTYPE ...&gt;</code>.</p>\r\n\r\n<p>EXEMPLE</p>\r\n\r\n<pre>\r\n&lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.0//EN&quot;\r\n   &quot;http://www.w3.org/TR/REC-html40/strict.dtd&quot;&gt;\r\n&lt;HTML&gt;\r\n  &lt;HEAD&gt;\r\n    &lt;TITLE&gt;Bienvenue dans l&#39;estuaire de Seine&lt;/TITLE&gt;\r\n  &lt;/HEAD&gt;\r\n  &lt;BODY&gt;\r\n    &lt;H1&gt;L&#39;estuaire de Seine&lt;/H1&gt;\r\n    &lt;P&gt;Lieu magique, rencontre du fleuve et de la mer, un environnement unique,\r\n    l&#39;estuaire de Seine est aussi un lieu de communication important... \r\n  &lt;/BODY&gt;\r\n&lt;/HTML&gt;</pre>\r\n\r\n<p><a href=\"http://www.snv.jussieu.fr/archambault/cours/html/exemples/bases01.html\">VOIR CET EXEMPLE</a></p>\r\n\r\n<p>Remarquez dans l&#39;exemple la position du texte marqu&eacute; par l&#39;&eacute;l&eacute;ment&nbsp;<code>&lt;TITLE&gt;</code>.<a name=\"version\"></a></p>\r\n\r\n<h3>Versions de HTML</h3>\r\n\r\n<p>Il existe 3 versions de HTML&nbsp;4.0, correspondant &agrave; 3 DTD (Document Type Declaration) :</p>\r\n\r\n<ul>\r\n	<li>HTML 4.0 Strict DTD<br />\r\n	Il s&#39;agit de code HTML ne contenant aucun &eacute;l&eacute;ment ni attribut &quot;d&eacute;pr&eacute;ci&eacute;&quot;, ni l&#39;utilisation de cadres (frames).\r\n	<pre>\r\n&lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.0//EN&quot;\r\n   &quot;http://www.w3.org/TR/REC-html40/strict.dtd&quot;&gt;</pre>\r\n	</li>\r\n	<li>HTML 4.0 Transitional DTD<br />\r\n	On ajoute les &eacute;l&eacute;ments et attributs d&eacute;pr&eacute;ci&eacute;s.\r\n	<pre>\r\n&lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.0 Transitional//EN&quot;\r\n   &quot;http://www.w3.org/TR/REC-html40/loose.dtd&quot;&gt;</pre>\r\n	</li>\r\n	<li>HTML 4.0 Frameset DTD<br />\r\n	Cette DTD correspond aux documents multi-frames.\r\n	<pre>\r\n&lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.0 Frameset//EN&quot;\r\n   &quot;http://www.w3.org/TR/REC-html40/frameset.dtd&quot;&gt;</pre>\r\n	</li>\r\n</ul>\r\n\r\n<p><a name=\"entete\"></a></p>\r\n\r\n<h3>L&#39;en-t&ecirc;te d&#39;un document HTML</h3>\r\n\r\n<p>L&#39;en-t&ecirc;te sert &agrave; indiquer un certain nombre d&#39;informations relatives au document dont le logiciel de navigation ou tout autre agent logiciel peut tirer partie. En g&eacute;n&eacute;ral ses informations ne sont pas affich&eacute;es directement. Quelques exemples :</p>\r\n\r\n<ul>\r\n	<li><em>Indiquer une feuille de style</em>. Cette information sera utilis&eacute;e par les logiciels de navigation pour construire la mise en page du document.</li>\r\n	<li><em>Fournir des mots-cl&eacute;s</em>. Ceux-ci sont tr&egrave;s utiles aux moteurs de recherche.</li>\r\n	<li><em>Donner un titre au document</em>. Ce que HTML appelle titre du document n&#39;est pas comme beaucoup s&#39;y attendent un paragraphe plac&eacute; en haut de la page en gros caract&egrave;res et s&eacute;par&eacute; du texte suivant par un espacement important. Il s&#39;agit en fait du nom du document, qui est souvent utilis&eacute; par les navigateurs comme titre de fen&ecirc;tre.\r\n	<p>&lt;TITLE&gt;Bienvenue dans l&#39;estuaire de Seine&lt;/TITLE&gt;</p>\r\n\r\n	<p>Voici ce qu&#39;affiche le navigateur Netscape :</p>\r\n\r\n	<p>&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><a name=\"corps\"></a></p>\r\n\r\n<h3>Le corps d&#39;un document HTML</h3>\r\n\r\n<p>Il s&#39;agit du contenu du document &agrave; proprement parler, de ce qui sera pr&eacute;sent&eacute; &agrave; l&#39;utilisateur. C&#39;est un &eacute;l&eacute;ment HTML d&eacute;limit&eacute; par des balises&nbsp;<code>&lt;BODY&gt;</code>.</p>\r\n\r\n<p>Dans les pr&eacute;c&eacute;dentes versions de HTML on indiquait la couleur des fonds, du texte, des liens... dans des attributs de la balise&nbsp;<code>&lt;BODY&gt;</code>. Cette fa&ccedil;on de faire est obsol&egrave;te avec HTML&nbsp;4.0. La technique valide est d&#39;utiliser des feuilles de style.</p>\r\n\r\n<blockquote>Plus g&eacute;n&eacute;ralement, on &eacute;vitera d&#39;utiliser les &eacute;l&eacute;ments HTML ou les&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/notes/obsoletes.html\">attributs obsol&egrave;tes</a>. Tout d&#39;abord ces &eacute;l&eacute;ments sont remplac&eacute;s par des propri&eacute;t&eacute;s de feuilles de styles, qui offrent des possibilit&eacute;s bien plus &eacute;tendues. Mais ces &eacute;l&eacute;ments posent en plus des probl&egrave;mes d&#39;accessibilit&eacute;.</blockquote>\r\n\r\n<p>[&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/index.html\">Cours HTML</a>&nbsp;] [&nbsp;<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/textes/bases.html#sommaire\">Sommaire</a>&nbsp;]</p>\r\n\r\n<hr />\r\n<p><a name=\"styles\"></a></p>\r\n\r\n<h2>Les styles</h2>\r\n\r\n<p>Reprenons l&#39;exemple du chapitre pr&eacute;c&eacute;dent (<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/exemples/intro01.html\">voir cet exemple</a>).</p>\r\n\r\n<p>L&#39;utilisation de feuilles de style permet d&#39;am&eacute;liorer la pr&eacute;sentation de ce document sans le modifier. Il suffit de d&eacute;crire la fa&ccedil;on dont doivent &ecirc;tre pr&eacute;sent&eacute;s chacun des &eacute;l&eacute;ments.</p>\r\n\r\n<p>Voici un lien vers le m&ecirc;me code une fois les styles ajout&eacute;s (<a href=\"http://www.snv.jussieu.fr/archambault/cours/html/seine/index.html\">voir l&#39;exemple avec une feuille de style</a>).</p>\r\n\r\n<p>On peut associer &agrave; chaque &eacute;l&eacute;ment HTML un style dans lequel seront d&eacute;crites toutres les caract&eacute;ristiques concernant la mise en forme de cet &eacute;l&eacute;ment. Ainsi on pourra choisir la police de caract&egrave;res, la taille, la couleur et la graisse du texte, les marges, les encadrements et bien d&#39;autres traits.</p>', '2020-12-16 21:05:40', '2020-12-16 21:05:40', 11),
(6, 'Objectif de HTML', 'Ce chapitre présente les objectf du langage HTML', 'course', '<h2>Objectifs du cours HTML et CSS et pr&eacute;requis</h2>\r\n\r\n<p>Bienvenue &agrave; tous dans ce cours complet traitant de deux langages informatiques incontournables : le HTML et CSS.</p>\r\n\r\n<p>Le but de ce tutoriel est d&rsquo;explorer les diff&eacute;rentes fonctionnalit&eacute;s du HTML et du CSS et de vous apprendre &agrave; les utiliser pas &agrave; pas.</p>\r\n\r\n<p>Le HTML et le CSS sont des langages web de base ; on commence donc g&eacute;n&eacute;ralement par leur apprentissage car ils sont assez simples &agrave; comprendre et car ils sont incontournables.</p>\r\n\r\n<p>Ce cours n&rsquo;est pas qu&rsquo;un simple empilage de connaissances&nbsp; : l&rsquo;id&eacute;e est au contraire de vous accompagner un maximum afin que vous compreniez &agrave; quoi correspond chaque notion, quand utiliser tel &eacute;l&eacute;ment de langage plut&ocirc;t que tel autre, comment s&rsquo;imbriquent les diff&eacute;rents &eacute;l&eacute;ments de langage et les langages ensemble pour qu&rsquo;&agrave; la fin du cours vous soyez totalement autonomes et sachiez r&eacute;soudre des probl&eacute;matiques relativement complexes.</p>\r\n\r\n<p>Le cours se veut progressif dans la complexit&eacute; des notions et s&rsquo;adresse donc &agrave; tous, des plus parfaits d&eacute;butants aux personnes disposant d&eacute;j&agrave; d&rsquo;un bagage informatique.</p>\r\n\r\n<p>Nous nous int&eacute;resserons dans ce cours aux derni&egrave;res versions stables de ces langages, &agrave; savoir le HTML5 et le CSS3.</p>', '2020-12-16 21:06:54', '2020-12-16 21:06:54', 11);

-- --------------------------------------------------------

--
-- Structure de la table `exam`
--

CREATE TABLE `exam` (
  `id` bigint(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `duree` int(30) NOT NULL,
  `catg` varchar(20) NOT NULL,
  `idSection` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exam`
--

INSERT INTO `exam` (`id`, `name`, `description`, `duree`, `catg`, `idSection`, `created_at`, `updated_at`) VALUES
(7, 'Examen n1', 'examen de compréhension', 30, 'exam', 11, '2020-12-16 21:53:05', '2020-12-16 21:53:05');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `name`, `created_at`, `updated_at`) VALUES
(17, 'dsi31', '2020-12-16 15:50:49', '2020-12-16 15:50:49'),
(18, 'RSI31', '2020-12-16 21:09:42', '2020-12-16 21:10:04'),
(19, 'SEM31', '2020-12-16 21:09:57', '2020-12-16 21:09:57'),
(20, 'info12', '2020-12-16 21:10:21', '2020-12-16 21:10:21'),
(21, 'info13', '2020-12-16 21:10:30', '2020-12-16 21:10:30');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `option_question_examen`
--

CREATE TABLE `option_question_examen` (
  `id` bigint(20) NOT NULL,
  `options` text NOT NULL,
  `is_correct` tinyint(4) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  `idExam` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `option_question_examen`
--

INSERT INTO `option_question_examen` (`id`, `options`, `is_correct`, `idQuestion`, `idExam`, `created_at`, `updated_at`) VALUES
(29, '<h6></h6>', 0, 13, 7, '2020-12-16 21:54:04', '2020-12-16 21:54:04'),
(30, '<head></head>', 0, 13, 7, '2020-12-16 21:54:04', '2020-12-16 21:54:04'),
(31, '<heading>', 0, 13, 7, '2020-12-16 21:54:04', '2020-12-16 21:54:04'),
(32, '<h1>', 1, 13, 7, '2020-12-16 21:54:04', '2020-12-16 21:54:04'),
(33, '<break>', 0, 14, 7, '2020-12-16 21:55:21', '2020-12-16 21:55:21'),
(34, '<lb>', 0, 14, 7, '2020-12-16 21:55:21', '2020-12-16 21:55:21'),
(35, '<br>', 1, 14, 7, '2020-12-16 21:55:21', '2020-12-16 21:55:21'),
(36, '<p>', 0, 14, 7, '2020-12-16 21:55:21', '2020-12-16 21:55:21'),
(37, '<body bg=\"yellow\">', 0, 15, 7, '2020-12-16 21:57:02', '2020-12-16 21:57:02'),
(38, '<background>yellow</background>', 0, 15, 7, '2020-12-16 21:57:02', '2020-12-16 21:57:02'),
(39, '<body style=\"background-color:yellow;\">', 1, 15, 7, '2020-12-16 21:57:02', '2020-12-16 21:57:02'),
(40, '<body css=\"background-color:yellow;\">', 0, 15, 7, '2020-12-16 21:57:02', '2020-12-16 21:57:02'),
(41, '<i>', 0, 16, 7, '2020-12-16 21:58:13', '2020-12-16 21:58:13'),
(42, '<strong>', 1, 16, 7, '2020-12-16 21:58:13', '2020-12-16 21:58:13'),
(43, '<important>', 0, 16, 7, '2020-12-16 21:58:13', '2020-12-16 21:58:13'),
(44, '<b>', 0, 16, 7, '2020-12-16 21:58:13', '2020-12-16 21:58:13'),
(45, '<i>', 0, 17, 7, '2020-12-16 21:59:07', '2020-12-16 21:59:07'),
(46, '<italic>', 0, 17, 7, '2020-12-16 21:59:07', '2020-12-16 21:59:07'),
(47, '<em>', 1, 17, 7, '2020-12-16 21:59:07', '2020-12-16 21:59:07'),
(48, '<h1>', 0, 17, 7, '2020-12-16 21:59:07', '2020-12-16 21:59:07'),
(49, '<a>http://www.w3schools.com</a>', 0, 18, 7, '2020-12-16 22:00:15', '2020-12-16 22:00:15'),
(50, '<a name=\"http://www.w3schools.com\">W3Schools.com</a>', 0, 18, 7, '2020-12-16 22:00:15', '2020-12-16 22:00:15'),
(51, '<a url=\"http://www.w3schools.com\">W3Schools.com</a>', 0, 18, 7, '2020-12-16 22:00:15', '2020-12-16 22:00:15'),
(52, '<a href=\"http://www.w3schools.com\">W3Schools</a>', 1, 18, 7, '2020-12-16 22:00:15', '2020-12-16 22:00:15');

-- --------------------------------------------------------

--
-- Structure de la table `option_question_test`
--

CREATE TABLE `option_question_test` (
  `id` bigint(20) NOT NULL,
  `options` text NOT NULL,
  `is_correct` tinyint(4) NOT NULL,
  `idQuestion` bigint(20) NOT NULL,
  `idTest` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `option_question_test`
--

INSERT INTO `option_question_test` (`id`, `options`, `is_correct`, `idQuestion`, `idTest`, `created_at`, `updated_at`) VALUES
(21, '<', 0, 6, 5, '2020-12-16 23:06:23', '2020-12-16 22:06:23'),
(22, '$', 0, 6, 5, '2020-12-16 23:06:23', '2020-12-16 22:06:23'),
(23, '/', 1, 6, 5, '2020-12-16 23:06:23', '2020-12-16 22:06:23'),
(24, '*', 0, 6, 5, '2020-12-16 23:06:23', '2020-12-16 22:06:23'),
(25, '<a href=\"url\" target=\"_blank\">', 1, 7, 5, '2020-12-16 23:11:49', '2020-12-16 22:11:49'),
(26, '<a href=\"url\" new>', 0, 7, 5, '2020-12-16 23:11:49', '2020-12-16 22:11:49'),
(27, '<a href=\"url\" target=\"new\">', 0, 7, 5, '2020-12-16 23:11:49', '2020-12-16 22:11:49'),
(28, '<a href=\"url\" target>', 0, 7, 5, '2020-12-16 23:11:50', '2020-12-16 22:11:50'),
(29, '<input datalist=\"fruits\"><list id=\"fruits\"><option value=\"Kiwi\"><option value=\"Orange\"><option value=\"Mangue\"></list>', 0, 8, 5, '2020-12-17 08:25:52', '2020-12-17 07:25:52'),
(30, '<input list=\"fruits\"><datalist id=\"fruits\"><option>Kiwi</option><option>Orange</option><option>Mangue</option></datalist>', 1, 8, 5, '2020-12-17 08:25:52', '2020-12-17 07:25:52'),
(31, '<input list=\"fruits\"><select><datalist id=\"fruits\" values=\"Kiwi,Orange,Mangue\" /></select>', 0, 8, 5, '2020-12-17 08:25:52', '2020-12-17 07:25:52'),
(32, '<select><datalist id=\"fruits\" values=\"Kiwi,Orange,Mangue\" /></select>', 0, 8, 5, '2020-12-17 08:25:52', '2020-12-17 07:25:52'),
(33, '<video preview=\"apercu.jpg\">', 1, 9, 5, '2020-12-17 08:27:03', '2020-12-17 07:27:03'),
(34, '<video><param name=\"thumbnail\" value=\"apercu.jpg\" /></video>', 0, 9, 5, '2020-12-17 08:27:04', '2020-12-17 07:27:04'),
(35, '<video poster=\"apercu.jpg\">', 0, 9, 5, '2020-12-17 08:27:04', '2020-12-17 07:27:04'),
(36, '<track src=\"apercu.jpg\">', 0, 9, 5, '2020-12-17 08:27:04', '2020-12-17 07:27:04');

-- --------------------------------------------------------

--
-- Structure de la table `question_examen`
--

CREATE TABLE `question_examen` (
  `id` int(200) NOT NULL,
  `question` text NOT NULL,
  `idExamen` bigint(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question_examen`
--

INSERT INTO `question_examen` (`id`, `question`, `idExamen`, `created_at`, `updated_at`) VALUES
(13, 'Choose the correct HTML element for the largest heading:', 7, '2020-12-16 21:54:03', '2020-12-16 21:54:03'),
(14, 'Quel est l\'élément HTML correct pour insérer un saut de ligne?', 7, '2020-12-16 21:55:21', '2020-12-16 21:55:21'),
(15, 'Quel est le code HTML correct pour ajouter une couleur d\'arrière-plan?', 7, '2020-12-16 21:57:02', '2020-12-16 21:57:02'),
(16, 'Choisissez l\'élément HTML correct pour définir le texte important', 7, '2020-12-16 21:58:13', '2020-12-16 21:58:13'),
(17, 'Choisissez l\'élément HTML correct pour définir le texte mis en valeur', 7, '2020-12-16 21:59:07', '2020-12-16 21:59:07'),
(18, 'Quel est le code HTML correct pour créer un lien hypertexte?', 7, '2020-12-16 22:00:15', '2020-12-16 22:00:15');

-- --------------------------------------------------------

--
-- Structure de la table `question_test`
--

CREATE TABLE `question_test` (
  `id` bigint(20) NOT NULL,
  `question` text NOT NULL,
  `idTest` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `question_test`
--

INSERT INTO `question_test` (`id`, `question`, `idTest`, `created_at`, `updated_at`) VALUES
(6, 'Quel caractère est utilisé pour indiquer une balise de fin?', 5, '2020-12-16 22:06:23', '2020-12-16 22:06:23'),
(7, 'Comment ouvrir un lien dans un nouvel onglet / fenêtre de navigateur?', 5, '2020-12-16 22:11:49', '2020-12-16 22:11:49'),
(8, 'Comment associer une liste de choix/suggestions à un champ d\'entrée texte ?', 5, '2020-12-17 07:25:52', '2020-12-17 07:25:52'),
(9, 'Quel attribut permet d\'afficher une image par défaut pour l\'élément <video> ?', 5, '2020-12-17 07:27:03', '2020-12-17 07:27:03');

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `moyen` int(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idUser` bigint(20) NOT NULL,
  `idSection` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`id`, `name`, `categorie`, `moyen`, `created_at`, `updated_at`, `idUser`, `idSection`) VALUES
(6, 'Test N1', 'test', 3, '2020-05-11 08:58:26', '2020-05-13 08:58:26', 2, 11),
(7, 'Examen n1', 'exam', 6, '2020-05-18 09:13:59', '2020-05-12 09:13:59', 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id` bigint(20) NOT NULL,
  `namesection` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`id`, `namesection`, `description`, `group_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(11, 'Html', 'Le HTML n\'est en aucun cas un langage de programmation : son but est de décrire et structurer des informations', 17, 3, '2020-12-16 16:37:48', '2020-12-16 16:37:48'),
(13, 'css', 'permet de décrire la présentation des documents HTML et XML.', 17, 4, '2020-12-16 16:41:59', '2020-12-16 16:41:59'),
(14, 'php', 'Le PHP est un langage de programmation impératif, orientée objet et fonctionnel, généralement interprété par un serveur', 17, 3, '2020-12-16 21:00:44', '2020-12-16 21:00:44'),
(15, 'jee', 'Java est une technique informatique développée initialement par Sun Microsystems puis acquise par Oracle suite au rachat de l\'entreprise', 17, 3, '2020-12-16 21:02:04', '2020-12-16 21:02:04'),
(16, 'Soap', 'SOAP est un protocole d\'échange d\'information structurée dans l\'implémentation de services web bâti sur XML', 17, 3, '2020-12-16 21:02:42', '2020-12-16 21:02:42');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `duree` int(30) NOT NULL,
  `catg` varchar(30) NOT NULL,
  `idSection` bigint(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `name`, `description`, `duree`, `catg`, `idSection`, `created_at`, `updated_at`) VALUES
(5, 'Test N1', 'tests de connaissances en HTML', 30, 'test', 11, '2020-12-16 22:02:23', '2020-12-16 22:02:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `category` tinyint(1) DEFAULT NULL,
  `idGroup` int(30) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `category`, `idGroup`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hatem slimani', 'admin@gmail.com', NULL, 1, NULL, '$2y$10$H9GnJ5Xdw2r32bal.7rOXu.qm/FztHK5Jw7ElFMmORjFQIZu3QEmC', NULL, '2020-11-06 17:25:00', '2020-11-10 19:48:29'),
(2, 'Mohamed ', 'user@gmail.com', NULL, 3, 17, '$2y$10$Gqy1m668ic.VQZfxluZSm.uWEbtgaAAOoFIZX3eaP8cmnWVW5WFIS', NULL, '2020-11-07 14:14:21', '2020-12-16 15:50:49'),
(3, 'Mounir', 'teacher@gmail.com', NULL, 2, NULL, '$2y$10$5mSnZrL5X3POXAmF/gGqK.3N3C8hH2BZe05AZJhTjL67ufh9qV6fy', NULL, '2020-11-07 14:15:11', '2020-12-16 15:52:38'),
(4, 'Malek', 'hatemslimani2021@gmail.com', NULL, 2, NULL, '$2y$10$CbIxFfvp4Xvila7jftl20e5G9ks3vvYK3S5J/ILrHAnvWXHC2q3MG', NULL, '2020-11-07 15:54:56', '2020-12-16 21:39:30'),
(9, 'ff', 'refr@gmail.com', NULL, 3, NULL, '', NULL, NULL, '2020-12-16 21:40:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_ibfk_1` (`section_id`);

--
-- Index pour la table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `exam_ibfk_1` (`idSection`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `option_question_examen`
--
ALTER TABLE `option_question_examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_question_examen_ibfk_1` (`idQuestion`),
  ADD KEY `option_question_examen_ibfk_2` (`idExam`);

--
-- Index pour la table `option_question_test`
--
ALTER TABLE `option_question_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_question_test_ibfk_1` (`idQuestion`),
  ADD KEY `option_question_test_ibfk_2` (`idTest`);

--
-- Index pour la table `question_examen`
--
ALTER TABLE `question_examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_examen_ibfk_1` (`idExamen`);

--
-- Index pour la table `question_test`
--
ALTER TABLE `question_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTest` (`idTest`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_ibfk_1` (`group_id`),
  ADD KEY `section_ibfk_2` (`teacher_id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_ibfk_1` (`idSection`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_ibfk_1` (`idGroup`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `option_question_examen`
--
ALTER TABLE `option_question_examen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `option_question_test`
--
ALTER TABLE `option_question_test`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `question_examen`
--
ALTER TABLE `question_examen`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `question_test`
--
ALTER TABLE `question_test`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`idSection`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `option_question_examen`
--
ALTER TABLE `option_question_examen`
  ADD CONSTRAINT `option_question_examen_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question_examen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `option_question_examen_ibfk_2` FOREIGN KEY (`idExam`) REFERENCES `exam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `option_question_test`
--
ALTER TABLE `option_question_test`
  ADD CONSTRAINT `option_question_test_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question_test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `option_question_test_ibfk_2` FOREIGN KEY (`idTest`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `question_examen`
--
ALTER TABLE `question_examen`
  ADD CONSTRAINT `question_examen_ibfk_1` FOREIGN KEY (`idExamen`) REFERENCES `exam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `question_test`
--
ALTER TABLE `question_test`
  ADD CONSTRAINT `question_test_ibfk_1` FOREIGN KEY (`idTest`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groupe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`idSection`) REFERENCES `section` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `groupe` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
