-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 24 2019 г., 17:05
-- Версия сервера: 10.2.22-MariaDB
-- Версия PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `proeqti_mas23`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_ge` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name_ru` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name_ge`, `name_ru`, `name_en`, `url`, `img`) VALUES
(7, 'ორი სართული და მეტი', 'Современные дома', 'Modern houses', 'categories', ''),
(8, 'ერთსართულიანი სახლები', 'Одноэтажные дома', 'One-story houses', 'categories', '');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address_en` varchar(255) NOT NULL,
  `address_ru` varchar(255) NOT NULL,
  `address_ge` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `text_en` text NOT NULL,
  `text_ru` text NOT NULL,
  `text_ge` text NOT NULL,
  `keywords_en` text NOT NULL,
  `keywords_ru` text NOT NULL,
  `keywords_ge` text NOT NULL,
  `keywords_tr` text NOT NULL,
  `description_en` text NOT NULL,
  `description_ru` text NOT NULL,
  `description_ge` text NOT NULL,
  `description_tr` text NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`id`, `url`, `web`, `email`, `img`, `phone`, `address_en`, `address_ru`, `address_ge`, `title_en`, `title_ru`, `title_ge`, `text_en`, `text_ru`, `text_ge`, `keywords_en`, `keywords_ru`, `keywords_ge`, `keywords_tr`, `description_en`, `description_ru`, `description_ge`, `description_tr`, `views`) VALUES
(2, 'contact', '+995 555 77 92 44', 'proeqti.ge@gmail.com', '', '+995 555 77 92 44', '#35 G.Babilodze str.Tbilisi', 'Тбилиси, ул. Г.Бабилодзе №35', 'თბილისი, გ.ბაბილოძის #35', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `itemID`, `filename`) VALUES
(21, 56, '190206050045Marble_11_seamless_1024.jpg'),
(22, 56, '190206050045Marble_114_seamless_1024.jpg'),
(23, 56, '190206050045Marble_122_seamless_1024.jpg'),
(27, 63, '190211095259kuki 1 - Рисунок1.jpg'),
(28, 63, '190211095346Foto 4.jpeg'),
(29, 63, '190211040223WH_Schwarz_Isometrie_SO.jpg'),
(40, 71, '190220095614S 4-1.1.jpg'),
(42, 70, '190224043941F1.jpg'),
(44, 68, '190224055005ff.jpg'),
(45, 68, '190224055409s 4-2.1.jpg'),
(46, 67, '190224062912f1.jpg'),
(47, 78, '190224063519k1.jpg'),
(48, 78, '190224063519k2.jpg'),
(49, 78, '190224063519s7-1.1.jpg'),
(50, 78, '190224063519s7-1.2.jpg'),
(57, 76, '190224065609Без имени-1.jpg'),
(58, 76, '190224065833k1.jpg'),
(59, 76, '190224065833k2.jpg'),
(60, 76, '190224065833k3.jpg'),
(61, 76, '190224065833k4.jpg'),
(62, 76, '190224070009s 11-2.1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `header`
--

CREATE TABLE `header` (
  `id` int(1) NOT NULL,
  `header_en` varchar(255) NOT NULL,
  `header_ru` varchar(255) NOT NULL,
  `header_ge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `header`
--

INSERT INTO `header` (`id`, `header_en`, `header_ru`, `header_ge`) VALUES
(1, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `text_en` text NOT NULL,
  `text_ru` text NOT NULL,
  `text_ge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `url`, `type`, `hidden`, `parent`, `title_en`, `title_ru`, `title_ge`, `text_en`, `text_ru`, `text_ge`) VALUES
(1, 'projects', 'pages', 1, 0, 'Home', 'Главная', 'მთავარი', '', '', ''),
(2, 'projects', 'pages', 0, 0, 'Projects', 'Проекты', 'პროექტები', '', '', ''),
(3, 'videos', 'videos', 0, 0, 'Video', 'Видео', 'ვიდეო', '', '', ''),
(4, 'building', 'one', 0, 0, 'Building', 'Строительство', 'მშენებლობა', '<p>http://www.ajaymatharu.com/gridview-client-side-sorting-and-paging/, http://www.mindfiresolutions.com/Paging-and-Sorting-a-GridView-without-Refreshing-a-Page-115.php</p>\r\n', '<p>http://www.ajaymatharu.com/gridview-client-side-sorting-and-paging/, http://www.mindfiresolutions.com/Paging-and-Sorting-a-GridView-without-Refreshing-a-Page-115.php</p>\r\n', '<p>http://www.ajaymatharu.com/gridview-client-side-sorting-and-paging/, http://www.mindfiresolutions.com/Paging-and-Sorting-a-GridView-without-Refreshing-a-Page-115.php</p>\r\n'),
(5, 'individual', 'one', 0, 0, 'Individual', 'Индивидуальный проект', 'ინდივიდუალური პროექტი', '', '', ''),
(7, 'slides', 'slides', 1, 0, 'Slideshow', 'Slideshow', 'სლაიდშოუ', '', '', ''),
(100, 'contact', 'contact', 0, 0, 'Contact', 'Контакт', 'კონტაქტი', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `menutypes`
--

CREATE TABLE `menutypes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `menutypes`
--

INSERT INTO `menutypes` (`id`, `type`, `title`) VALUES
(1, 'one', 'ერთი გვერდი'),
(2, 'pages', 'კატეგორია'),
(3, 'videos', 'ვიდეო'),
(5, 'contact', 'კონტაქტი'),
(7, 'slides', 'SLIDESHOW');

-- --------------------------------------------------------

--
-- Структура таблицы `one`
--

CREATE TABLE `one` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `text_en` text NOT NULL,
  `text_ru` text NOT NULL,
  `text_ge` text NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `key_en` text NOT NULL,
  `key_ru` text NOT NULL,
  `key_ge` text NOT NULL,
  `desc_en` text NOT NULL,
  `desc_ru` text NOT NULL,
  `desc_ge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `one`
--

INSERT INTO `one` (`id`, `url`, `img`, `views`, `title_en`, `title_ru`, `title_ge`, `text_en`, `text_ru`, `text_ge`, `youtube`, `key_en`, `key_ru`, `key_ge`, `desc_en`, `desc_ru`, `desc_ge`) VALUES
(42, 'building', '190209021749individ_proek.jpg', 0, 'Construction of cottages and turnkey houses', 'Строительство коттеджей и домов под ключ', 'კოტეჯებისა და ანაზრაურების სახლების მშენებლობა', '<p>You have become the happy owner of the project of home from , and now the question has arisen of choosing a reliable construction company that would be able to accurately implement the House of Your Dreams.<br />\r\n<br />\r\nWe offer the most complete range of services for the construction of turnkey country houses based on our projects, we provide technical and architectural supervision of the construction process - we guarantee the quality of the work performed.<br />\r\n<br />\r\nWhen building a country house with us, you save yourself the hassle of turning to different performers, which ultimately leads to additional costs, loss of time and nerves.&nbsp;dNZb_KtKhTc</p>\r\n', '<p>Вы стали счастливым обладателем проекта дома от , а теперь возник вопрос выбора надежной строительной компании, которая смогла бы в точности воплотить в жизнь &quot;Дом Вашей Мечты&quot;.</p>\r\n\r\n<p>Мы предлагаем максимально полный комплекс услуг по строительству загородных домов под ключ на основании наших проектов, обеспечиваем технический и авторский надзор строительного процесса &mdash; гарантируем качество выполненных работ.</p>\r\n\r\n<p>При строительстве загородного дома с нами, Вы избавляете себя от хлопот обращения к разным исполнителям, что в итоге приводит к дополнительным затратам, потере времени и нервов.</p>\r\n', '<p>თქვენ გახდით ბედნიერი მფლობელი პროექტის სახლში , და ახლა კითხვა წარმოიშვა არჩევის საიმედო სამშენებლო კომპანია, რომელიც შეძლებს ზუსტად განახორციელოს სახლი შენი სიზმრები.<br />\r\n<br />\r\nჩვენ გთავაზობთ ყველაზე სრულ სპექტრს მომსახურებას ანაზრაურების ქვეყნის სახლების მშენებლობასთან დაკავშირებით ჩვენს პროექტებზე დაყრდნობით, ჩვენ ვუზრუნველყოფთ მშენებლობის პროცესის ტექნიკურ და არქიტექტურულ ზედამხედველობას - ჩვენ ვუზრუნველყოფთ მუშაობის ხარისხის გარანტიას.<br />\r\n<br />\r\nჩვენთან ერთად აგარაკზე აგებისას, თქვენ გადარჩევენ თავს სხვადასხვა შემსრულებლებს, რომლებიც საბოლოო ჯამში იწვევს დამატებით ხარჯებს, დროის დაკარგვას და ნერვებს.</p>\r\n', 'qlTPQaBBXwc', '', '', '', '', '', ''),
(43, 'individual', '190209022348671_ithumb17.gif.jpg', 0, 'Order an individual project', 'Заказать индивидуальный проект', 'დაალაგე ინდივიდუალური პროექტი', '<p>Individual design of houses and cottages in Kiev and throughout Ukraine from Architectural company&nbsp; is the most demanded service among our clients, since individual development is a personal and one-of-a-kind vision of your future home. The customer, together with architects and engineers, create a radically new building and a comfortable space in it. We design and implement the most daring ideas!</p>\r\n', '<p>Индивидуальное проектирование домов и коттеджей в Киеве и по всей Украине от Архитектурной компании&nbsp; &mdash; наиболее востребованная услуга среди наших клиентов, так как индивидуальная разработка &mdash; это личное и единственное в своем роде видение своего будущего дома. Заказчик, совместно с архитекторами и инженерами, создают кардинально новое здание и комфортное пространство в нем. Мы проектируем и воплощаем в жизнь самые смелые идеи!</p>\r\n', '<p>არქიტექტურული კომპანია - სგან კიევის და უკრაინის მთელ კორპუსში ინდივიდუალური დიზაინი და კოტეჯები ჩვენს კლიენტებს შორის ყველაზე მოთხოვნად მომსახურებას წარმოადგენს, რადგან ინდივიდუალური განვითარება არის თქვენი მომავალი სახლის პირადი და ერთი სახის ხედვა. მომხმარებელს, არქიტექტორებთან და ინჟინერებთან ერთად, ქმნის რადიკალურად ახალ შენობაში და მასში კომფორტული სივრცე. ჩვენ ვამზადებთ და განახორციელებთ ყველაზე გამბედავ იდეებს!</p>\r\n', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `sm` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `co` int(11) NOT NULL,
  `garage` tinyint(1) NOT NULL DEFAULT 2,
  `price` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `text_en` text NOT NULL,
  `text_ru` text NOT NULL,
  `text_ge` text NOT NULL,
  `desc_ge` text NOT NULL,
  `desc_ru` text NOT NULL,
  `desc_en` text NOT NULL,
  `key_ge` text NOT NULL,
  `key_ru` text NOT NULL,
  `key_en` text NOT NULL,
  `views` int(11) NOT NULL,
  `imgdest` tinyint(1) NOT NULL,
  `pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `url`, `catID`, `img`, `sm`, `length`, `width`, `co`, `garage`, `price`, `date`, `youtube`, `title_en`, `title_ru`, `title_ge`, `text_en`, `text_ru`, `text_ge`, `desc_ge`, `desc_ru`, `desc_en`, `key_ge`, `key_ru`, `key_en`, `views`, `imgdest`, `pdf`) VALUES
(55, 'projects', 7, '190206043640House-vs-Condo-Blog-Feature.jpg', 234, 324, 32432, 32342, 1, 0, '0000-00-00', '', '435423', '43252345', '4354325', '', '', '', '', '', '', '', '', '', 23, 0, ''),
(56, 'projects', 7, '190206050045tra.jpg', 55, 100, 100, 5000, 0, 500, '0000-00-00', '', 'P34', 'P34', 'P34', '<p><img alt=\"\" src=\"/photos/content/537-f5e41b4992f2c2773ea8b01cb93337e4.jpg\" style=\"border-style:solid; border-width:0px; float:left; margin:10px; width:40%\" />I have a small <samp><strong>doubt </strong></samp>in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.reaI have a small doubt in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.reaI have a small doubt in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.rea</p>\r\n', '', '', '', '', '', '', '', '', 35, 1, ''),
(60, 'projects', 7, '190206043640House-vs-Condo-Blog-Feature.jpg', 234, 324, 32432, 32342, 1, 0, '0000-00-00', '', '435423', '43252345', '4354325', '', '', '', '', '', '', '', '', '', 10, 0, ''),
(61, 'projects', 7, '190206043640House-vs-Condo-Blog-Feature.jpg', 234, 324, 32432, 32342, 1, 0, '0000-00-00', '', '435423', '43252345', '4354325', '', '', '', '', '', '', '', '', '', 9, 0, ''),
(62, 'projects', 7, '190206043640House-vs-Condo-Blog-Feature.jpg', 234, 324, 32432, 32342, 1, 0, '0000-00-00', '', '435423', '43252345', '4354325', '', '', '', '', '', '', '', '', '', 9, 0, ''),
(63, 'projects', 7, '190206043640House-vs-Condo-Blog-Feature.jpg', 234, 324, 32432, 32342, 1, 0, '0000-00-00', '', '4354222', '4325222', '4354325', '<p><img alt=\"\" src=\"/photos/content/997-547830671aa753c281d5976ba1c16f02.jpg\" style=\"height:114px; width:200px\" /></p>\r\n\r\n<p style=\"text-align: right;\">78.25 m2</p>\r\n\r\n<hr />\r\n<p style=\"text-align: right;\"><strong>Wohnfl&auml;che OG</strong></p>\r\n\r\n<p style=\"text-align: right;\">76.38 m2</p>\r\n\r\n<hr />\r\n<p style=\"text-align: right;\"><strong>Gesamtwohnfl&auml;che</strong></p>\r\n\r\n<p style=\"text-align: right;\">154.53 m2</p>\r\n\r\n<hr />\r\n<p style=\"text-align: right;\"><strong>Au&szlig;enma&szlig;e</strong></p>\r\n\r\n<p style=\"text-align: right;\">9.42 x 10.04 m</p>\r\n\r\n<p style=\"text-align: right;\"><strong>Verwendung</strong>:&nbsp;Einfamilienhaus</p>\r\n\r\n<p style=\"text-align: right;\"><strong>Haustyp</strong>:&nbsp;Stadtvilla</p>\r\n\r\n<p style=\"text-align: right;\"><strong>Bauweise</strong>:&nbsp;Holzrahmenbauweise, Holztafelbauweise</p>\r\n\r\n<p style=\"text-align: right;\"><strong>Energiestandard</strong>:&nbsp;EnEV 2016, KfW 55, KfW 40, KfW 40 Plus</p>\r\n\r\n<p style=\"text-align: right;\"><strong>Stil</strong>:&nbsp;Klassisch</p>\r\n\r\n<p><img alt=\"\" src=\"/photos/content/244-deff4de0aeef5c6efef7217bf8cecfe0.jpeg\" style=\"height:267px; width:200px\" /></p>\r\n', '', '', '', '', '', '', '', '', 25, 1, ''),
(64, 'projects', 7, '190206050045tra.jpg', 111, 100, 100, 5000, 0, 500, '0000-00-00', '', 'P34', 'P34', 'P34', '<p><img alt=\"\" src=\"/photos/content/537-f5e41b4992f2c2773ea8b01cb93337e4.jpg\" style=\"border-style:solid; border-width:0px; float:left; margin:10px; width:40%\" />I have a small <samp><strong>doubt </strong></samp>in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.reaI have a small doubt in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.reaI have a small doubt in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.rea</p>\r\n', '', '', '', '', '', '', '', '', 22, 1, ''),
(65, 'projects', 7, '190206050045tra.jpg', 222, 100, 100, 5000, 0, 500, '0000-00-00', '', 'P34', 'P34', 'P34', '<p><img alt=\"\" src=\"/photos/content/537-f5e41b4992f2c2773ea8b01cb93337e4.jpg\" style=\"border-style:solid; border-width:0px; float:left; margin:10px; width:40%\" />I have a small <samp><strong>doubt </strong></samp>in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.reaI have a small doubt in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.reaI have a small doubt in this. I declared the <code>target</code> as a global variable and assigned the value as mentioned above. When I first load the page, I get the value(alert) of target as undefined. But, when I change the tab and assign that value to the target, I&#39;m not getting any alert. Not even an error message. What should I do, in order to bring it outside that loop? I&#39;ve declared the variable outside the document.rea</p>\r\n', '', '', '', '', '', '', '', '', 14, 1, ''),
(66, 'projects', 8, '190224064355s 9-1.jpg', 215, 10, 11, 93600, 1, 1300, '0000-00-00', '', 'S 9-1', 'S 9-1', 'S 9-1', '', '<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><strong><samp>Общие характеристики</samp></strong></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;<big>Общая площадь</big></td>\r\n						<td><big>&nbsp;215 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внутренная площадь</big></td>\r\n						<td><big>&nbsp;185 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;<big>Габариты</big></td>\r\n						<td><big>&nbsp;10,35х 10,90 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Высота дома</big></td>\r\n						<td><big>&nbsp;4,70 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внесение изменений&nbsp;</big></td>\r\n						<td><big>&nbsp;возможны</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/912-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/912-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;215 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;185 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;10,35х 10,90 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;4,70 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/912-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/912-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '', '', '', '', '', '', 13, 1, ''),
(67, 'projects', 8, '190224062912s 4-3.jpg', 225, 19, 10, 13000, 0, 1300, '0000-00-00', '', 'S 4-3', 'S 4-3', 'S 4-3', '', '', '', '', '', '', '', '', '', 16, 1, ''),
(68, 'projects', 7, '190224053242s 4-2.jpg', 180, 12, 10, 92600, 2, 1150, '0000-00-00', '', 'S 4-2', 'S 4-2', 'S 4-2', '', '<h2><a href=\"/photos/content/358-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/358-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h2>\r\n\r\n<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong>общие характеристики&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;Общая площадь</big></td>\r\n						<td><big>&nbsp;180 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внутренняя площадь</big></td>\r\n						<td><big>&nbsp;130 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Габариты</big></td>\r\n						<td><big>&nbsp;11,50х 10,0 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Высота дома</big></td>\r\n						<td><big>&nbsp;7,20 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внесение изменений</big></td>\r\n						<td><big>&nbsp;возможны</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/422-e5c6443492bfb6c862cd0a77695ffd1e.jpg\"><img alt=\"\" src=\"/photos/content/422-e5c6443492bfb6c862cd0a77695ffd1e.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '<h2><a href=\"/photos/content/358-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/358-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;180 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;130 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;11,50х 10,0 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;7,20 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/422-e5c6443492bfb6c862cd0a77695ffd1e.jpg\"><img alt=\"\" src=\"/photos/content/422-e5c6443492bfb6c862cd0a77695ffd1e.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '', '', '', '', '', '', 13, 1, ''),
(69, 'projects', 8, '190224052430s 2-1.jpg', 95, 11, 9, 57000, 2, 700, '0000-00-00', '', 'S 2-1', 'S 2-1', 'S 2-1', '', '<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><strong><samp>Общие характеристики</samp></strong></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;<big>Общая площадь</big></td>\r\n						<td><big>&nbsp;95 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внутренная площадь</big></td>\r\n						<td><big>&nbsp;63 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;<big>Габариты</big></td>\r\n						<td><big>&nbsp;11,25х 8,85 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Высота дома</big></td>\r\n						<td><big>&nbsp;5,50 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внесение изменений&nbsp;</big></td>\r\n						<td><big>&nbsp;возможны</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/750-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/750-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;95 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;63 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;11,25х 8,85 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;5,50 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/750-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/750-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '', '', '', '', '', '', 24, 1, ''),
(70, 'projects', 8, '190224025317S 1-1.jpg', 100, 9, 11, 56000, 2, 700, '0000-00-00', '', 'S 1-1', 'S 1-1', 'S 1-1', '', '<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><strong><samp>Общие характеристики</samp></strong></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;<big>Общая площадь</big></td>\r\n						<td><big>&nbsp;100 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внутренная площадь</big></td>\r\n						<td><big>&nbsp;80 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;<big>Габариты</big></td>\r\n						<td><big>&nbsp;9,15х 11,30 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Высота дома</big></td>\r\n						<td><big>&nbsp;6,20 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внесение изменений&nbsp;</big></td>\r\n						<td><big>&nbsp;возможны</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/858-80cfc074045f963998bb476249f16ae3.jpg\"><img alt=\"\" src=\"/photos/content/858-80cfc074045f963998bb476249f16ae3.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '<p>&nbsp;</p>\r\n\r\n<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;100 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;80 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;9,15х 11,30 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;6,20 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/132-80cfc074045f963998bb476249f16ae3.jpg\"><img alt=\"\" src=\"/photos/content/132-80cfc074045f963998bb476249f16ae3.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '', '', '', '', '', '', 15, 1, ''),
(71, 'projects', 7, '190220095614S 4-1.jpg', 186, 12, 10, 93000, 1, 1200, '0000-00-00', '', 'S 4-1', 'S 4-1', 'S 4-1', '', '<h2 style=\"text-align:justify\"><a class=\"thumb\" href=\"/photos/content/377-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/377-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h2>\r\n\r\n<table align=\"right\" border=\"0\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse; width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong>общие характеристики&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" bordercolor=\"#ccc\" cellpadding=\"10\" cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;Общая площадь</big></td>\r\n						<td><big>&nbsp;186 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внутренняя площадь</big></td>\r\n						<td><big>&nbsp;161 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Габариты</big></td>\r\n						<td><big>&nbsp;9,50х 12,0 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Высота дома</big></td>\r\n						<td><big>&nbsp;8,50 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внесение изменений</big></td>\r\n						<td><big>&nbsp;возможны</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/130-e5c6443492bfb6c862cd0a77695ffd1e.jpg\"><img alt=\"\" src=\"/photos/content/130-e5c6443492bfb6c862cd0a77695ffd1e.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '<h2 style=\"text-align:justify\"><a href=\"/photos/content/377-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/377-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"right\" border=\"0\" bordercolor=\"#ccc\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse:collapse; width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" bordercolor=\"#ccc\" cellpadding=\"10\" cellspacing=\"0\" style=\"border-collapse:collapse; width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;186 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;161 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;9,50х 12,0 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;8,50 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/130-e5c6443492bfb6c862cd0a77695ffd1e.jpg\"><img alt=\"\" src=\"/photos/content/130-e5c6443492bfb6c862cd0a77695ffd1e.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '', '', '', '', '', '', 13, 1, ''),
(75, 'projects', 7, '190224114429S 15-17.jpg', 250, 13, 10, 122000, 1, 1600, '0000-00-00', '', 'S 15-17 er', 'S 15-17 er', 'S 15-17 er', '', '<h1><a href=\"/photos/content/373-0412c29576c708cf0155e8de242169b1.jpg\"><img alt=\"\" src=\"/photos/content/373-0412c29576c708cf0155e8de242169b1.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;186 м2</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;161 м2</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;9.50х 12.0 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;8.50 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"/photos/content/825-dfa0e943fd590cb8db900bba6cab25ca.jpg\"><img alt=\"\" src=\"/photos/content/825-dfa0e943fd590cb8db900bba6cab25ca.jpg\" style=\"float:left; margin:20px; width:60%\" /></a></p>\r\n', '<h1><a href=\"/photos/content/373-0412c29576c708cf0155e8de242169b1.jpg\"><img alt=\"\" src=\"/photos/content/373-0412c29576c708cf0155e8de242169b1.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;186 м2</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;161 м2</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;9.50х 12.0 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;8.50 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"/photos/content/825-dfa0e943fd590cb8db900bba6cab25ca.jpg\"><img alt=\"\" src=\"/photos/content/825-dfa0e943fd590cb8db900bba6cab25ca.jpg\" style=\"float:left; margin:20px; width:60%\" /></a></p>\r\n', '', '', '', '', '', '', 115, 1, ''),
(76, 'projects', 7, '190224065426s 11-2.jpg', 148, 8, 11, 86000, 2, 1000, '0000-00-00', '', 'S 11-2', 'S 11-2', 'S 11-2', '', '<h2><a href=\"/photos/content/866-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/866-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h2>\r\n\r\n<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong>общие характеристики&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;Общая площадь</big></td>\r\n						<td><big>&nbsp;148 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внутренняя площадь</big></td>\r\n						<td><big>&nbsp;124 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Габариты</big></td>\r\n						<td><big>&nbsp;8,30х 11,30 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Высота дома</big></td>\r\n						<td><big>&nbsp;8,70 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внесение изменений</big></td>\r\n						<td><big>&nbsp;возможны</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/652-e5c6443492bfb6c862cd0a77695ffd1e.jpg\"><img alt=\"\" src=\"/photos/content/652-e5c6443492bfb6c862cd0a77695ffd1e.jpg\" style=\"margin:20px; width:50%\" /></a></p>\r\n', '<h2><a href=\"/photos/content/866-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/866-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;148 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;124 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;8,30х 11,30 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;8,70 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/652-e5c6443492bfb6c862cd0a77695ffd1e.jpg\"><img alt=\"\" src=\"/photos/content/652-e5c6443492bfb6c862cd0a77695ffd1e.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '', '', '', '', '', '', 0, 1, ''),
(78, 'projects', 8, '190224063518s 7-1.jpg', 175, 16, 14, 109000, 2, 1150, '0000-00-00', '', 'S 7-1', 'S 7-1', 'S 7-1', '', '<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><strong><samp>Общие характеристики</samp></strong></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td>&nbsp;<big>Общая площадь</big></td>\r\n						<td><big>&nbsp;175 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внутренная площадь</big></td>\r\n						<td><big>&nbsp;132 м&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td>&nbsp;<big>Габариты</big></td>\r\n						<td><big>&nbsp;16,40х 14,0 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Высота дома</big></td>\r\n						<td><big>&nbsp;3,85 м</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;Внесение изменений&nbsp;</big></td>\r\n						<td><big>&nbsp;возможны</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/87-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/87-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '<table align=\"right\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:35%\">\r\n	<tbody>\r\n		<tr>\r\n			<th scope=\"col\">\r\n			<h3><big><strong><samp>საერთო მაჩვენებლები</samp>&nbsp;</strong></big></h3>\r\n			</th>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<table align=\"right\" border=\"1\" cellpadding=\"10\" cellspacing=\"0\" style=\"width:100%\">\r\n				<tbody>\r\n					<tr>\r\n						<td><big>&nbsp;მთლიანი ფართი</big></td>\r\n						<td><big>&nbsp;175 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;შიდა ფართი</big></td>\r\n						<td><big>&nbsp;132 მ&sup2;</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;გაბარიტები</big></td>\r\n						<td><big>&nbsp;16,40х 14,0 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;სახლის სიმაღლე</big></td>\r\n						<td><big>&nbsp;3,85 მ</big></td>\r\n					</tr>\r\n					<tr>\r\n						<td><big>&nbsp;ცვლილებების შეტანა</big></td>\r\n						<td><big>&nbsp;შესაძლებელია</big></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><a href=\"/photos/content/87-738b6f713759bde8b043922cb5b60587.jpg\"><img alt=\"\" src=\"/photos/content/87-738b6f713759bde8b043922cb5b60587.jpg\" style=\"float:left; margin:20px; width:50%\" /></a></p>\r\n', '', '', '', '', '', '', 0, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_ge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `link` varchar(555) NOT NULL,
  `url` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `text_ge` varchar(255) NOT NULL,
  `text_en` varchar(255) NOT NULL,
  `text_ru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slides`
--

INSERT INTO `slides` (`id`, `link`, `url`, `img`, `title_ge`, `title_en`, `title_ru`, `text_ge`, `text_en`, `text_ru`) VALUES
(109, 'http://georgia4you.ge/', 'Full set of services', '170221043847slide2.png', 'Full set of services', 'slides', 'Full set of services', 'Make your visit to Georgia enjoyable and easy! ', 'Make your visit to Georgia enjoyable and easy! ', 'Make your visit to Georgia enjoyable and easy! '),
(111, '', 'dfasdf', '170221043833slide2.png', 'sdafdf', 'slides', '', '', '', ''),
(112, '', '', '170221044034Business-and-management.jpg', '', 'slides', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `url`, `status`) VALUES
(1, 'admin', 'proeqti.ge@gmail.com', '8d6652814acec694c755f66dde94cee9eec64169', 'admin', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `yid` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_ge` varchar(255) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `url`, `date`, `yid`, `title_en`, `title_ru`, `title_ge`, `views`) VALUES
(6, 'videos', '0000-00-00', 'qlTPQaBBXwc', 'c', 'c', 'c', 0),
(9, 'videos', '0000-00-00', 'V7FIG6ZxasE', 'gemi', 'gemi', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menutypes`
--
ALTER TABLE `menutypes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `one`
--
ALTER TABLE `one`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT для таблицы `menutypes`
--
ALTER TABLE `menutypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `one`
--
ALTER TABLE `one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
