-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Хост: p110476.mysql.ihc.ru
-- Время создания: Мар 19 2014 г., 19:07
-- Версия сервера: 5.5.35-33.0-log
-- Версия PHP: 5.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `p110476_cas2014`
--

-- --------------------------------------------------------

--
-- Структура таблицы `casino_admin`
--

CREATE TABLE IF NOT EXISTS `casino_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(12) DEFAULT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `pass2` varchar(256) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_last` varchar(30) DEFAULT NULL,
  `ip_last` varchar(30) DEFAULT '0.0.0.0',
  `admin_notes` text,
  `operator_notes` text,
  `status_message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `casino_admin`
--

INSERT INTO `casino_admin` (`id`, `login`, `pass`, `pass2`, `email`, `date_last`, `ip_last`, `admin_notes`, `operator_notes`, `status_message`) VALUES
(1, 'admin', '90664a4f218641ac216b668f7969badf', '90664a4f218641ac216b668f7969badf', 'admin@wm-scripts.ru', '', '0.0.0.0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `casino_messages`
--

CREATE TABLE IF NOT EXISTS `casino_messages` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL DEFAULT '0',
  `date` varchar(30) NOT NULL DEFAULT '',
  `time` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(20) NOT NULL DEFAULT '',
  `message` varchar(1000) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `id_main` varchar(10) NOT NULL DEFAULT '0',
  `route` varchar(10) NOT NULL DEFAULT 'contact',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `casino_messages`
--

INSERT INTO `casino_messages` (`id`, `login`, `date`, `time`, `title`, `message`, `email`, `status`, `id_main`, `route`) VALUES
(6, 'guest', '2013-04-24', '17:34:01', 'привет', 'привет', 'sahka-88@mail.ru', '0', '0', 'contact'),
(7, 'guest', '2013-05-15', '05:44:27', 'вывод денежных средс', 'я вчера в 9 вечера вывел деньги на вебмани.по вашим правилам они должны были прийти в течении 2х часов но их нет до сих пор прошло 13 часов.сколько мне их ожидать', 'vald.m@mail.ru', '0', '0', 'contact'),
(8, 'guest', '2013-05-15', '05:59:09', 'вывод денежных средс', 'здравствуйте.я вчера в 9 вечера вывел деньги на вебмани кошелек.по вашим правилам они должны в течении 2х часов упасть на кошелек но этого не произошло до сихпор.сколько мне ожидать данной опирации.спасибо', 'vald.m@mail.ru', '0', '0', 'contact'),
(9, 'guest', '2013-07-05', '12:30:38', 'Предложение о сотруд', 'Добрый день\r\n\r\nМеня зовут Сергей, я представляю смс биллинг Ru-Биллинг. Мы заинтересованы в сотрудничестве с вашим онлайн-казино по процессингу смс-платежей.\r\n\r\nПредлагаем хорошие отчисления. По номеру стоимостью ~170 руб:\r\nМТС - 95.02 руб\r\nБилайн - 76.86 руб\r\nМегафон - 86.52 руб\r\n\r\nМожно сделать процессинг определенных операторов, отчисления по которым у нас выше. Можно многие другие страны.\r\n\r\nМы работаем 3 года, платим всегда вовремя, будем рады сотрудничеству. Если вам интересно, напишите мне.\r\n\r\n--\r\nСергей Васильев\r\nМенеджер по работе с партнерами\r\nRu-Биллинг', 'sergey@rubilling.com', '0', '0', 'contact');

-- --------------------------------------------------------

--
-- Структура таблицы `casino_news`
--

CREATE TABLE IF NOT EXISTS `casino_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT '0000-00-00',
  `title` varchar(255) NOT NULL DEFAULT '',
  `short_story` text NOT NULL,
  `full_story` text NOT NULL,
  `descr` varchar(200) NOT NULL DEFAULT '',
  `keywords` text NOT NULL,
  `category` varchar(200) NOT NULL DEFAULT '0',
  `alt_name` varchar(200) NOT NULL DEFAULT '',
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `news_read` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tags` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `alt_name` (`alt_name`),
  KEY `category` (`category`),
  KEY `approve` (`approve`),
  KEY `date` (`date`),
  KEY `tags` (`tags`),
  FULLTEXT KEY `short_story` (`short_story`,`full_story`,`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=44 ;

--
-- Дамп данных таблицы `casino_news`
--

INSERT INTO `casino_news` (`id`, `date`, `title`, `short_story`, `full_story`, `descr`, `keywords`, `category`, `alt_name`, `approve`, `news_read`, `tags`) VALUES
(38, '2013-04-25', 'Пополнение счета в онлайн казино', '<p>\r\n	&nbsp;</p>\r\n<h3 style="margin: 0px; padding: 0px; color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 140, 0);"><img alt="" src="http://s52.radikal.ru/i135/1304/69/55efc2e725e4.jpg" style="width: 163px; height: 163px; float: left;" />Пополнение счета в казино megastart-casino</span></h3>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Уважаемые пользователи нашего КАЗИНО &laquo;megastart-casino&raquo;!!! Мы спешим Вам сообщить, что мы снова принимаем около ста возможных вариантов пополнения вашего игрового счета.</p>\r\n', '<p>\r\n	<img alt="" src="http://s52.radikal.ru/i135/1304/69/55efc2e725e4.jpg" style="width: 163px; height: 163px; float: left;" /></p>\r\n<h3 background-color:="" color:="" font-family:="" line-height:="" padding:="" span="" style="\\&quot;margin:">\r\n	&nbsp;</h3>\r\n<h3 style="margin: 0px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 140, 0);">Пополнение счета в казино megastart-casino</span></h3>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Наше казино возобновило пополнение игрового счета.</p>\r\n<div style="margin: 0px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Пополнить Свой игровой счет в нашем казино вы можете ста различными способами не выходя из дома или офиса. К Вашим услугам предоставлены все известные платежные системы начиная от SМS, Терминалов, Электронных валют и заканчивая Пластиковыми картами!\r\n	<div style="margin: 0px; padding: 0px;">\r\n		Мы заботимся о Вашем комфорте и безопасности и не хотим, что бы Вы понесли риски и финансовые потери!!! О всех изменениях в работе нашего казино, будем уведомлять Вас @e-mail рассылкой.\r\n		<div style="margin: 0px; padding: 0px;">\r\n			С уважением, администрация megastart-casino.com</div>\r\n	</div>\r\n</div>\r\n<div .="" background-color:="" color:="" div="" font-family:="" line-height:="" padding:="" style="\\&quot;margin:">\r\n	<p>\r\n		&nbsp;</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '', '', '0', '', 0, 0, ''),
(39, '2013-04-25', 'Партнерская программа казино', '<p>\r\n	&nbsp;</p>\r\n<h3 style="margin: 0px; padding: 0px; color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 140, 0);"><img alt="" src="http://s019.radikal.ru/i639/1304/5c/b445abd3ccfe.jpg" style="width: 144px; height: 144px; float: left;" />Партнерская программа казино megastart-casino</span></h3>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Интернет Казино megastart-casino предоставляет своим игрокам возможность стать нашим партнерам, и дать вам возможность зарабатывать вместе с нами, для того что бы стать партнером в нашем онлайн казино вам нужно &quot;Зарегистрироваться&quot; зайти в раздел &quot;Партнерам&quot; и прочитать инструкцию по работе с партнерской программой.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<h3 style="margin: 0px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 140, 0);"><img alt="" src="http://s019.radikal.ru/i639/1304/5c/b445abd3ccfe.jpg" style="width: 144px; height: 144px; float: left;" />Партнерская программа онлайн казино</span></h3>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Интернет Казино megastart-casino предоставляет своим игрокам возможность стать нашим партнерам, и дать вам возможность зарабатывать вместе с нами, для того что бы стать партнером в нашем онлайн казино вам нужно &quot;Зарегистрироваться&quot; зайти в раздел &quot;Партнерам&quot; и прочитать инструкцию по работе с партнерской программой.<br style="margin: 0px; padding: 0px;" />\r\n	<br style="margin: 0px; padding: 0px;" />\r\n	Мы предоставляем партнерам в казино удобный функционал где вы будете видеть всю статистику по кликам вашего баннера, приведенных игроков, финансы и много другого...<br style="margin: 0px; padding: 0px;" />\r\n	Мы платим партнерам 30% от первого Депозита приведенного вами игрока в онлайн казино megastart-casino.</p>\r\n', '', '', '0', '', 0, 0, ''),
(40, '2013-04-25', 'Программа Лояльности', '<p>\r\n	&nbsp;</p>\r\n<h3 style="margin: 0px; padding: 0px; color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 140, 0);"><img alt="" src="http://s017.radikal.ru/i434/1304/89/8df724204a8f.jpg" style="width: 182px; height: 155px; float: left;" />Программа Лояльности в онлайн казино megastart-casino</span></h3>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(255, 255, 255); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Если Вы активно играете в казино megastart-casino, то Вы имеете возможность получить специальный VIP-статус. И стать участником нашего VIP клуба. Такой статус позволяет Вам пользоваться дополнительными привилегиями и возможностями, которые придадут Вашей игре более увлекательный характер и прибавит стабильности. VIP-статус гарантирует получение дополнительных специальных бонусов и услуг, которые будут Вам максимально оперативно предоставляться для вашего удобства. Статусы VIP-игроков бывают двух типов: GOLDи PLATINUM.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<h3 style="margin: 0px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	<span style="margin: 0px; padding: 0px; color: rgb(255, 140, 0);"><img alt="" src="http://s017.radikal.ru/i434/1304/89/8df724204a8f.jpg" style="width: 182px; height: 155px; float: left;" />Программа Лояльности в онлайн казино megastart-casino</span></h3>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Если Вы активно играете в казино megastart-casino, то Вы имеете возможность получить специальный VIP-статус. И стать участником нашего VIP клуба. Такой статус позволяет Вам пользоваться дополнительными привилегиями и возможностями, которые придадут Вашей игре более увлекательный характер и прибавит стабильности. VIP-статус гарантирует получение дополнительных специальных бонусов и услуг, которые будут Вам максимально оперативно предоставляться для вашего удобства. Статусы VIP-игроков бывают двух типов: GOLDи PLATINUM.</p>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Статус: GOLD</p>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Статус GOLD присваивается по индивидуальному запросу игрока, в том случае если месячная сумма депозитов игрока равна, либо превышает 5000 долларов. Игрок, владеющий статусом GOLD, при совершении депозита автоматически получает индивидуальный бонус на депозит в размере 40% (это в полтора раза больше, чем стандартный бонус на депозит в размере 30%. Данный вид бонусного поощрения будет начисляться GOLDигрокам на постоянной основе автоматически. Максимальный коэффициент отыгрыша для игроков владеющих статусом GOLD равен х40 на все предложения независимо от указанных в условиях и правилах, что значительно увеличивает Ваши шансы на выигрыш. Также будет предоставлен приоритет при выводе выигрыша - игрок получит средства в течении суток (в рабочее время). Игроков, владеющих статусом GOLD, обслуживает специальный VIP менеджер, который будет предоставляться игроку персонально. Персональный менеджер, будучи осведомленным об игровых предпочтениях VIP игрока, может обеспечить максимально высокий комфорт игроку при игре в Казино, решая максимально быстро возникающие у игрока вопросы и предлагая индивидуальные бонусные предложения.</p>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	статус PLATINUM</p>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Статус PLATINUMприсваивается по индивидуальному запросу игрока, в том случае если месячная сумма депозитов игрока равна, либо превышает 10000 долларов. Игрок, владеющий статусом PLATINUM, при совершении депозита автоматически получает индивидуальный бонус на депозит в размере 60% (это в 2 раза больше, чем стандартный бонус на депозит в размере 30%. Данный вид бонусного поощрения будет начисляться PLATINUMигрокам на постоянной основе автоматически, не требуя дополнительной заявки. Максимальный коэффициент отыгрыша для игроков, владеющих статусом PLATINUMравен х40, на все предложения независимо от указанных в условиях и правилах, что значительно увеличивает Ваши шансы на выигрыш. Также игрокам статуса PLATINUMбудет предоставлен приоритет при выводе выигрыша - игрок получает деньги максимум в течение одного часа (в рабочее время). Игроков, владеющих статусом PLATINUM, обслуживает специальный VIP менеджер, который будет предоставляться игроку персонально. Персональный менеджер, будучи осведомленным об игровых предпочтениях VIP игрока, может обеспечить максимально высокий комфорт игроку при игре в Казино, решая максимально быстро возникающие у игрока вопросы и предлагая индивидуальные бонусные предложения. По программе нашего казино всем игрокам владеющим статусом PLATINUM начисляются возврат проигранных средств в размере 25%. Возврат средств производится в течение первых рабочих суток следующего месяца.</p>\r\n<p style="margin: 0px 0px 11px; padding: 0px; color: rgb(174, 174, 174); font-family: Arial, Helvetica, sans-serif; line-height: 16px; background-color: rgb(0, 0, 0);">\r\n	Казино megastart-casino заботится о своих игроках! Самые активные игроки казино megastart-casino, по итогам каждого прошедшего месяца, получают в начале месяца специальный поощрительный бонус. Бонус &ndash; это возврат части суммы депозитов сделанных игроком за месяц. Для нас не важно - выиграл игрок или проиграл на совершенный ним депозит, для нас важна преданность игроков и их неизменная игра в нашем онлайн казино. В бонусе нашего казино величина возврата определяется индивидуально, на неё влияет сумма депозитов совершенных игроком за месяц, количество депозитов за месяц, а также количество игровых раундов и общее время игры в интернет казино megastart-casino .</p>\r\n', '', '', '0', '', 0, 0, ''),
(41, '2013-05-21', 'Снятие выигрыша из игрового казино без ограничений', '<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<table align="center" border="0" cellpadding="4" cellspacing="2" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 13px;" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td valign="top">\r\n				<center>\r\n					<h2 style="font-size: 20px;">\r\n						<span style="color:#ff8c00;">Снятие выигрыша из игрового казино без ограничений</span></h2>\r\n				</center>\r\n			</td>\r\n			<td>\r\n				<span style="color:#ffffff;">В отличие от других заведений&nbsp;<strong><span style="background-color:#000000;">игровое казино&nbsp;</span></strong><strong><span style="background-color:#000000;">Megastart</span></strong><span style="background-color:#000000;">&nbsp;не ставит ограничений на то, когда и сколько игрок может вывести из казино в наличные. Если во многих казино online Вы не можете получить деньги, не отыграв начисленные casino бонусы, то в&nbsp;</span><strong><span style="background-color:#000000;">Megastart</span></strong><span style="background-color:#000000;">&nbsp;выигрыш может быть получен в любой момент и в кратчайшие сроки.&nbsp;</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', '<p style="text-align: center;">\r\n	&nbsp;</p>\r\n<table align="center" border="0" cellpadding="4" cellspacing="2" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 13px;" width="100%">\r\n	<tbody>\r\n		<tr>\r\n			<td valign="top">\r\n				<center>\r\n					<h2 style="font-size: 20px;">\r\n						<span style="color:#ff8c00;">Снятие выигрыша из игрового казино без ограничений</span></h2>\r\n				</center>\r\n			</td>\r\n			<td>\r\n				<span style="color:#ffffff;"><span style="background-color:#000000;">В отличие от других заведений&nbsp;</span><strong><span style="background-color:#000000;">игровое казино Megastart</span></strong><span style="background-color:#000000;">&nbsp;не ставит ограничений на то, когда и сколько игрок может вывести из казино в наличные. Если во многих казино online Вы не можете получить деньги, не отыграв начисленные casino бонусы, то в&nbsp;</span><strong><span style="background-color:#000000;">Megastart</span></strong><span style="background-color:#000000;">&nbsp;выигрыш может быть получен в любой момент и в кратчайшие сроки. Вы можете запросить любую сколь угодно крупную сумму на выплату, у нас нет ограничений типа &quot;не более 10 тыс. долларов в месяц&quot; и т.п., что часто встречается в других интернет казино онлайн. Выплаты производятся на все популярные отечественные и зарубежные платежные системы, работающие с казино.</span></span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', '', '', '0', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `casino_online`
--

CREATE TABLE IF NOT EXISTS `casino_online` (
  `session` char(100) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `casino_online`
--

INSERT INTO `casino_online` (`session`, `time`) VALUES
('ebb10337c66e0a85059ec8eeec5ecd1b', 1395241598);

-- --------------------------------------------------------

--
-- Структура таблицы `casino_settings`
--

CREATE TABLE IF NOT EXISTS `casino_settings` (
  `license` varchar(50) NOT NULL,
  `siteadress` varchar(100) NOT NULL DEFAULT 'http://site.ru',
  `sitename` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `keywords` varchar(2000) NOT NULL,
  `partnerproc` decimal(2,0) NOT NULL DEFAULT '30',
  `partnerprocdomain` decimal(2,0) NOT NULL DEFAULT '50',
  `languagesite` decimal(1,0) NOT NULL DEFAULT '1',
  `languageadmin` decimal(1,0) NOT NULL DEFAULT '1',
  `bonusreg` decimal(10,2) NOT NULL DEFAULT '0.00',
  `bonustuday` decimal(10,2) NOT NULL DEFAULT '0.00',
  `emailcasino` varchar(50) NOT NULL DEFAULT 'example@mail.ru',
  `emailadmin` varchar(50) NOT NULL DEFAULT 'example@mail.ru',
  `icqadmin` varchar(10) NOT NULL DEFAULT '0000000000',
  `notesin` varchar(3) DEFAULT 'yes',
  `notesout` varchar(3) DEFAULT 'yes',
  `notesres` varchar(3) DEFAULT 'yes',
  `fun_reg` int(10) NOT NULL DEFAULT '10000',
  `fun_day` int(10) NOT NULL DEFAULT '1000',
  `jpupdatetime` int(10) NOT NULL DEFAULT '10',
  `newsmain` int(1) NOT NULL DEFAULT '2',
  `version` varchar(10) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `casino_settings`
--

INSERT INTO `casino_settings` (`license`, `siteadress`, `sitename`, `description`, `keywords`, `partnerproc`, `partnerprocdomain`, `languagesite`, `languageadmin`, `bonusreg`, `bonustuday`, `emailcasino`, `emailadmin`, `icqadmin`, `notesin`, `notesout`, `notesres`, `fun_reg`, `fun_day`, `jpupdatetime`, `newsmain`, `version`) VALUES
('LICENSE-0000-0000-0000-0000-0000-0000-0000', 'casino-megastart.wm-scripts.ru', 'Мегастарт-казино', 'Игровые автоматы в онлайн казино, рулетка, бонусы на первый депозит', 'азартные игры, рулетка, покер, карты, карточные игры, слот машины, слот машина играть, игровые автоматы, игры казино, онлайн игры казино, онлайн игры', '5', '10', '1', '1', '5.00', '1.00', 'admin@wm-scripts.ru', 'admin@wm-scripts.ru', '403964898', 'yes', 'yes', 'yes', 1000, 1000, 101, 5, '1.3');

-- --------------------------------------------------------

--
-- Структура таблицы `casino_tickets`
--

CREATE TABLE IF NOT EXISTS `casino_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `priority` int(1) NOT NULL DEFAULT '0',
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `dt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `newforuser` enum('0','1') NOT NULL DEFAULT '0',
  `newforadmin` enum('1','0') NOT NULL DEFAULT '1',
  `userid` int(11) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(12) DEFAULT NULL,
  `pass` varchar(256) DEFAULT NULL,
  `cash` decimal(12,2) DEFAULT '0.00',
  `cashin` decimal(12,2) DEFAULT '0.00',
  `cashout` decimal(12,2) DEFAULT '0.00',
  `cashfun` decimal(12,2) DEFAULT '0.00',
  `cashfunin` decimal(12,2) DEFAULT '0.00',
  `cashfunout` decimal(12,2) DEFAULT '0.00',
  `fun_date` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `check_mail` int(1) unsigned DEFAULT '0',
  `ip_reg` varchar(30) DEFAULT '0.0.0.0',
  `ip_last` varchar(30) DEFAULT '0.0.0.0',
  `admin_notes` text,
  `operator_notes` text,
  `status_message` text,
  `login_block` int(1) unsigned DEFAULT '0',
  `login_number` int(1) unsigned DEFAULT '0',
  `pm_all` mediumint(9) DEFAULT '0',
  `pm_unread` mediumint(9) DEFAULT '0',
  `status` varchar(1) DEFAULT '0',
  `key_reset` varchar(64) NOT NULL,
  `referer` int(11) NOT NULL DEFAULT '-1',
  `cash_ref` float(11,2) NOT NULL DEFAULT '0.00',
  `cash_pending` float(11,2) NOT NULL DEFAULT '0.00',
  `cash_ref_withdrawn` float(11,2) NOT NULL DEFAULT '0.00',
  `partner_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `cash_ref_total` double(11,2) NOT NULL DEFAULT '0.00',
  `hits` bigint(20) unsigned NOT NULL DEFAULT '0',
  `registers` int(10) unsigned NOT NULL DEFAULT '0',
  `holdset` varchar(128) DEFAULT NULL,
  `win_double` decimal(12,2) NOT NULL DEFAULT '0.00',
  `mode` varchar(128) DEFAULT NULL,
  `mode2` varchar(128) DEFAULT NULL,
  `mode3` varchar(128) DEFAULT NULL,
  `mode4` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=151 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `login`, `pass`, `cash`, `cashin`, `cashout`, `cashfun`, `cashfunin`, `cashfunout`, `fun_date`, `email`, `date`, `check_mail`, `ip_reg`, `ip_last`, `admin_notes`, `operator_notes`, `status_message`, `login_block`, `login_number`, `pm_all`, `pm_unread`, `status`, `key_reset`, `referer`, `cash_ref`, `cash_pending`, `cash_ref_withdrawn`, `partner_blocked`, `cash_ref_total`, `hits`, `registers`, `holdset`, `win_double`, `mode`, `mode2`, `mode3`, `mode4`) VALUES
(150, 'admin', '90664a4f218641ac216b668f7969badf', '7.00', '7.00', '0.00', '1000.00', '0.00', '0.00', '2014-03-19', 'admin@wm-scripts.ru', '2014-03-19 14:41:03', 0, '89.146.71.211', '89.146.71.211', 'Заметка Админа', 'Заметка опера', '0', 0, 0, 0, 0, '1', '', -1, 0.00, 0.00, 0.00, 0, 0.00, 0, 0, NULL, '0.00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `altname` varchar(100) NOT NULL,
  `id_bank` varchar(10) DEFAULT '2',
  `id_funbank` varchar(10) DEFAULT '1',
  `id_jp` varchar(10) DEFAULT '1',
  `bonus` varchar(10) NOT NULL,
  `bonus_desc` text NOT NULL,
  `win` text NOT NULL,
  `ddouble` text NOT NULL,
  `mode` char(1) NOT NULL DEFAULT '2',
  `delitel` varchar(2) DEFAULT '81',
  `extended` int(1) NOT NULL DEFAULT '0',
  `extended_table` varchar(50) NOT NULL DEFAULT 'games',
  `desc` varchar(200) NOT NULL,
  `url_game` varchar(500) NOT NULL DEFAULT '/games/',
  `url_image` varchar(500) NOT NULL DEFAULT '/games/_thumbs/',
  `edit` int(1) NOT NULL DEFAULT '1',
  `reserv1` int(10) NOT NULL DEFAULT '0',
  `totalgame` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=458 ;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `name`, `altname`, `id_bank`, `id_funbank`, `id_jp`, `bonus`, `bonus_desc`, `win`, `ddouble`, `mode`, `delitel`, `extended`, `extended_table`, `desc`, `url_game`, `url_image`, `edit`, `reserv1`, `totalgame`) VALUES
(39, 'champ', 'champ', '13', '1', '1', '9|10|11', 'Бонус игра', '12|15|14|13|12', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(38, 'cargame', 'cargame', '2', '1', '1', '9||', '0', '10|11|12|14|15', '11', '0', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(37, 'roulette', 'roulette', '14', '1', '1', '9||', '0', '13|10|11|12|14', '15', '2', '81', 0, 'games', '0', '/games/', '/games/_thumbs/', 1, 0, 0),
(35, 'blackjackgold', 'blackjackgold', '11', '1', '1', '', '', '', '', '', '', 1, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(36, 'blackjackvip', 'blackjackvip', '11', '1', '1', '', '', '', '', '', '81', 1, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(34, 'blackjackclassic', 'blackjackclassic', '11', '1', '1', '', '', '', '', '', '', 1, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(33, 'acesandfaces', 'acesandfaces', '10', '1', '1', '0', '', '0', '0', '2', '81', 1, 'games_poker', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(32, 'jacksorbetter', 'jacksorbetter', '10', '1', '1', '0', '', '0', '0', '2', '81', 1, 'games_poker', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(31, 'tensorbetter', 'tensorbetter', '10', '1', '1', '0', '', '0', '0', '2', '81', 1, 'games_poker', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(30, 'zorro', 'zorro', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(29, 'whathoot', 'whathoot', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(28, 'realdriver', 'realdriver', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(27, 'monster', 'monster', '12', '1', '1', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(26, 'geniesgems', 'geniesgems', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(25, 'bigtop', 'bigtop', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '9|12|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(24, 'reelthunder', 'reelthunder', '12', '1', '1', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(23, 'majormillions', 'majormillions', '12', '1', '1', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(22, 'ladies', 'ladies', '12', '1', '1', '10|12|', 'Скаттер|Бесплатная игра|', '14|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(21, 'sunquest', 'sunquest', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(20, 'cashapillar', 'cashapillar', '12', '1', '1', '10|9|', 'Скаттер|Бесплатная игра|', '12|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(19, 'carnaval', 'carnaval', '12', '1', '1', '10|9|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(18, 'winwiz', 'winwiz', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(17, 'thunders', 'thunders', '12', '1', '1', '10|9|', 'Скаттер|Бесплатная игра|', '11|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(16, 'secretadm', 'secretadm', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '12|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(15, 'ofortune', 'ofortune', '12', '1', '1', '11|10|', 'Скаттер|Бесплатная игра|', '9|15|14|13|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(14, 'gophergold', 'gophergold', '12', '1', '1', '10|12|', 'Скаттер|Бесплатная игра|', '9|15|14|11|9', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(13, 'bigkahuna', 'bigkahuna', '12', '1', '1', '10|11|', 'Скаттер|Бесплатная игра|', '15|14|11|10|9', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(12, 'crazymonkey', 'crazymonkey', '2', '1', '1', '10||', 'Бонус игра|', '9|11|12|15|14', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(11, 'chukcha', 'chukcha', '2', '1', '1', '10|9|11', 'Бонус игра|Бонус игра 2|Идол в бонус игре|', '9|12|13|11|15', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(10, 'cocktail', 'cocktail', '2', '1', '1', '11|10|14', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|13|11|15|9', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(9, 'lucky_haunter', 'lucky_haunter', '2', '1', '1', '12|10|9', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|12|13|15|14', '11', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(8, 'lucky_drink', 'lucky_drink', '2', '1', '1', '11|10|12', 'Бонус игра|', '9|10|13|14|15', '12', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(7, 'rockclimber', 'rockclimber', '2', '1', '1', '11|10|9', 'Бонус игра|', '9|11|13|15|13', '12', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(6, 'fairy_land', 'fairy_land', '2', '1', '1', '9|11|9', 'Бонус игра|', '11|12|13|15|15', '14', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(5, 'garage', 'garage', '2', '1', '1', '10|11|9', 'Бонус игра|Бонус игра 2|Супер бонус игра|', '11|12|13|14|15', '11', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(4, 'gnome', 'gnome', '2', '1', '1', '11|10|9', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '12|13|14|9|15', '9', '5', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(3, 'resident', 'resident', '2', '1', '1', '10|15|13', 'Бонус игра|Супер бонус игра|', '11|9|12|11|13', '12', '1', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(2, 'keks', 'keks', '2', '1', '1', '30|40|50', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '20|30|40|25|26', '20', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(1, 'aztec', 'aztec', '13', '1', '1', '15|13|14', 'Бонус игра', '11|12|15|11|9', '12', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(40, 'deluxe', 'deluxe', '13', '1', '1', '9|10|11', 'Бонус игра', '11|15|14|13|12', '10', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(41, 'pharaon', 'pharaon', '13', '1', '1', '9|10|11', 'Бонус игра', '9|15|14|13|12', '15', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(42, 'pirates', 'pirates', '13', '1', '1', '10|11|9', 'Бонус игра', '11|15|14|13|12', '9', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(43, 'wildwest', 'wildwest', '13', '1', '1', '10|11|9', 'Бонус игра', '10|15|14|13|12', '13', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(44, 'island', 'island', '2', '1', '1', '12|10|15', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|11|12|13|15', '14', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(45, 'alcatraz', 'alcatraz', '2', '1', '1', '12|10|15', 'Бонус игра|Успешное завершение бонус игры|Супер бонус игра|', '9|11|12|13|14', '15', '4', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(46, 'CaptainCavern', 'CaptainCavern', '176', '1', '1', '11||', '', '15|13|14|11|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(47, 'panteron', 'Panteron', '177', '1', '1', '11|10|12', 'Бонус игра', '10|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 229948),
(48, 'ramsesII', 'Ramses II', '177', '1', '1', '11|150|10', 'Бонус игра', '10|9|11|14|12', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 189462),
(49, 'luckylady', 'Lucky Lady', '177', '1', '1', '9|150|10', 'Бонус игра', '11|9|12|14|13', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 1280648),
(50, 'aztectreasure', 'Aztec Treasure', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 737614),
(51, 'dolphins', 'Dolphins', '177', '1', '1', '15|10|11', 'Бонус игра', '10|9|12|14|13', '11', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 1150244),
(52, 'moneygame', 'Money Game', '177', '1', '1', '15|14|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 814651),
(53, 'bananas', 'Bananas', '177', '1', '1', '11|12|10', 'Бонус игра', '10|9|13|14|13', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 1053924),
(54, 'bananasplash', 'BananaSplash', '177', '1', '1', '10|150|11', 'Бонус игра', '10|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 393614),
(55, 'bookofra', 'Book of Ra', '177', '1', '1', '15|10|9', 'Бонус игра', '11|9|12|14|13', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 3191546),
(56, 'columbus', 'Columbus', '177', '1', '1', '10|150|11', 'Бонус игра', '10|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 37),
(57, 'columbusdelux', 'ColumbusDelux', '177', '1', '1', '11|150|10', 'Бонус игра', '10|9|12|14|9', '11', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 333191),
(58, 'pharaohsgoldlll', 'PharaohsGold 2', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 403220),
(59, 'royaltreasures', 'Royal Treasures', '177', '1', '1', '11|150|10', 'Бонус игра', '12|9|13|14|12', '11', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 88870),
(60, 'markopolo', 'MarkoPolo', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|9', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 405900),
(61, 'queenof', 'Queen of Hearts', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|9', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 819106),
(62, 'sharky', 'Sharky', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|13|14|9', '12', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 580),
(63, 'unicorn', 'Unicorn', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 271576),
(64, 'secretforest', 'Secret Forest', '177', '1', '1', '11|150|10', 'Бонус игра', '12|9|13|14|9', '12', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 221130),
(65, 'magicprincess', 'Magic Princess', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 259145),
(66, 'attila', 'Attila', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 866757),
(67, 'dynasty', 'Dynasty of Ming', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '12', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 293949),
(68, 'goldenplanet', 'Golden Planet', '177', '1', '1', '11|150|10', 'Бонус игра', '12|9|13|14|12', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 268036),
(69, 'gryphonsgold', 'Gryphons Gold', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|10', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 143585),
(70, 'wonderfulflute', 'Wonderful Flute', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 159166),
(71, 'pharaohsgoldll', 'PharaohsGold 3', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|9', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 317034),
(72, 'polarfox', 'PolarFox', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 138037),
(73, 'safariheat', 'Safari Heat', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 186706),
(74, 'sparta', 'Sparta', '177', '1', '1', '11|150|10', 'Бонус игра', '9|11|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 263577),
(75, 'mermaidspearl', 'Mermaids Pearl', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|12|14|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 382167),
(76, 'kingofcards', 'King of Сards', '177', '1', '1', '14|150|10', 'Бонус игра', '11|9|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 449360),
(404, 'Cartoons', 'Cartoons', '176', '1', '1', '15||', '', '14|12|13|11|9', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(405, 'JamesBand', 'JamesBand', '176', '1', '1', '13||', '', '12|9|11|14|10', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(406, 'CrazyDoctors', 'CrazyDoctors', '176', '1', '1', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(407, 'Grizzly', 'Grizzly', '176', '1', '1', '11||', '', '12|9|13|14|15', '10', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(408, 'JulesVerne', 'JulesVerne', '176', '1', '1', '11||', '', '10|9|12|13|14', '15', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(409, 'DaVinci', 'DaVinci', '176', '1', '1', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(410, 'HappyChristmas', 'HappyChristmas', '176', '1', '1', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(411, 'IndianaCroft', 'IndianaCroft', '176', '1', '1', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(412, 'LasVegas', 'LasVegas', '176', '1', '1', '11||', '', '12|10|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(413, 'London', 'London', '176', '1', '1', '10||', '', '15|14|12|13|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(414, 'MahJong', 'MahJong', '176', '1', '1', '10||', '', '12|11|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(415, 'NewYearEve', 'NewYearEve', '176', '1', '1', '11||', '', '9|13|11|15|12', '14', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(416, 'New-York', 'New-York', '176', '1', '1', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(417, 'Pantheon', 'Pantheon', '176', '1', '1', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(418, 'Paris', 'Paris', '176', '1', '1', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(419, 'RoyalFruit', 'RoyalFruit', '176', '1', '1', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(420, 'RueDuCommerce', 'RueDuCommerce', '176', '1', '1', '10||', '', '15|14|13|12|10', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(421, 'Safari', 'Safari', '176', '1', '1', '10||', '', '11|15|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(422, 'SergentPepper', 'SergentPepper', '176', '1', '1', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(423, 'Shinobi', 'Shinobi', '176', '1', '1', '10||', '', '15|14|12|11|13', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(424, 'SpaceRunners', 'SpaceRunners', '176', '1', '1', '10||', '', '11|15|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(425, 'SuperHeroes', 'SuperHeroes', '176', '1', '1', '10||', '', '15|13|14|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(426, 'Tokyo', 'Tokyo', '176', '1', '1', '10||', '', '15|14|11|12|9', '13', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(427, 'WorldCup', 'WorldCup', '176', '1', '1', '10||', '', '11|13|12|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(428, 'JustMarried', 'JustMarried', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(429, 'atlantis', 'atlantis', '176', '1', '1', '10||', '', '11|15|14|13|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(430, 'Dartagnan', 'Dartagnan', '176', '1', '1', '10||', '', '11|12|13|14|15', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(431, 'Gladiator', 'Gladiator', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(432, 'devilsbike', 'devilsbike', '176', '1', '1', '10||', '', '12|15|14|13|12', '11', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(433, 'Dracula', 'Dracula', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(434, 'HappyFarm', 'HappyFarm', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(435, 'Jungle', 'Jungle', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(436, 'jurassic', 'jurassic', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(437, 'luke', 'luke', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(438, 'LunaPark', 'LunaPark', '176', '1', '1', '10||', '', '15|14|13|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(439, 'mafia', 'mafia', '176', '1', '1', '10||', '', '14|12|10|8|6', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(440, 'mont-blanc', 'mont-blanc', '176', '1', '1', '10||', '', '11|15|13|12|14', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(441, 'Navy', 'Navy', '176', '1', '1', '10||', '', '15|13|14|12|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(442, 'Numbers', 'Numbers', '176', '1', '1', '10||', '', '15|11|13|14|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(443, 'Small-life', 'Small-life', '176', '1', '1', '10||', '', '13|15|14|11|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(444, 'Zorro', 'Zorro', '176', '1', '1', '10||', '', '13|14|11|15|12', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(445, '25linb2', '25linb2', '162', '1', '1', '10||', '', '15|13|12|14|11', '9', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(446, 'ThreeAces', 'ThreeAces', '165', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(447, 'BlackJackDiamond', 'BlackJackDiamond', '166', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(448, 'BlackJackGold', 'BlackJackGold', '167', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(449, 'BlackJackSilver', 'BlackJackSilver', '168', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(450, 'CaribbeanPokerGold', 'CaribbeanPokerGold', '169', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(451, 'JacksOrBetter', 'JacksOrBetter', '170', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(452, 'JokerPoker', 'JokerPoker', '171', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(453, 'LottoKeno', 'LottoKeno', '172', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(454, 'RouletteSilver', 'RouletteSilver', '14', '1', '1', '0||', '', '0|0|0|0|0', '0', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(455, 'StarsKeno', 'StarsKeno', '174', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(456, 'TreasureHunt', 'TreasureHunt', '175', '1', '1', '', '', '', '', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0),
(457, 'Geniewild', 'Geniewild', '0', '0', '0', '0||', '', '0|0|0|0|0', '0', '2', '81', 0, 'games', '', '/games/', '/games/_thumbs/', 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `games_bank`
--

CREATE TABLE IF NOT EXISTS `games_bank` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `bank` decimal(20,2) NOT NULL DEFAULT '0.00',
  `proc` decimal(3,0) NOT NULL DEFAULT '100',
  `winmax` decimal(12,2) NOT NULL DEFAULT '0.00',
  `income` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonus` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonus2` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusready` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusproc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusmode` decimal(12,2) NOT NULL DEFAULT '0.00',
  `jackpot` decimal(12,2) NOT NULL DEFAULT '0.00',
  `jpotproc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `mode` varchar(128) DEFAULT NULL,
  `mode2` varchar(128) DEFAULT NULL,
  `mode3` varchar(128) DEFAULT NULL,
  `mode4` varchar(128) DEFAULT NULL,
  `incash` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=185 ;

--
-- Дамп данных таблицы `games_bank`
--

INSERT INTO `games_bank` (`id`, `name`, `bank`, `proc`, `winmax`, `income`, `bonus`, `bonus2`, `bonusready`, `bonusproc`, `bonusmode`, `jackpot`, `jpotproc`, `mode`, `mode2`, `mode3`, `mode4`, `incash`) VALUES
(1, 'Главный FUN банк', '2389.40', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(2, 'Игрософт Банк', '0.00', '40', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(10, 'Покер Банк', '0.00', '85', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(11, 'БлэкДжэк Банк', '0.00', '85', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(12, 'Микро Гейминг Банк', '3.89', '85', '0.00', '0.00', '3.60', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.90'),
(13, 'МегаДжек Банк', '0.00', '85', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(14, 'Рулетка Банк', '4.25', '85', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(177, 'Мультигаминатор Банк', '0.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(162, '25linb2', '0.00', '95', '100.00', '5.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.10', '1000000000', '||N|', '|||||', '0', '100.00'),
(178, 'Развлечение Банк', '0.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.00'),
(165, 'ThreeAces', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(166, 'BlackJackDiamond', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(167, 'BlackJackGold', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(168, 'BlackJackSilver', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(169, 'CaribbeanPokerGold', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(170, 'JacksOrBetter', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(171, 'JokerPoker', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(172, 'LottoKeno', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(174, 'StarsKeno', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(175, 'TreasureHunt', '0.00', '50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '9', NULL, NULL, NULL, '0.00'),
(176, 'B3W-Банк', '0.00', '90', '0.00', '0.00', '0.20', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, '0.05'),
(180, 'Rockstar_3D', '0.00', '50', '10.00', '2.00', '0.00', '0.00', '1000.00', '0.00', '0.00', '0.00', '0.00', '1000360034', '0', '300|1000|1||2||1|221|1|1|0.01|0.1|1|||3|1|2|3|4|5|10|15|20|30|40|50|100|2|33|2|high|', '0', '0.00'),
(181, 'Geniewild', '0.20', '50', '12.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1000000024', '30', '3|0|2||0|USD|19|0|1|1|0.01|0.1|1||0|0|100|200|300|400|500|', '0', '0.00'),
(182, 'partnering', '0.00', '50', '12.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1000000001', '0', '', '0', '0.00'),
(183, 'ttuz', '0.00', '50', '12.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1000000001', '0', '', '0', '0.00'),
(184, 'Lines_9', '0.00', '50', '12.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1000000001', '0', '', '0', '0.00');

-- --------------------------------------------------------

--
-- Структура таблицы `games_garage`
--

CREATE TABLE IF NOT EXISTS `games_garage` (
  `g_bon1` int(5) NOT NULL DEFAULT '1',
  `g_bon2` int(5) NOT NULL DEFAULT '1',
  `g_bon3` int(5) NOT NULL DEFAULT '1',
  `g_bon1_1` int(20) NOT NULL DEFAULT '1',
  `g_bon1_2` int(20) NOT NULL DEFAULT '1',
  `g_bon1_3` int(20) NOT NULL DEFAULT '1',
  `g_bon1_fun` int(5) NOT NULL DEFAULT '1',
  `g_bon2_fun` int(5) NOT NULL DEFAULT '3',
  `g_bon3_fun` int(5) NOT NULL DEFAULT '4',
  `g_bon1_1_fun` int(20) NOT NULL DEFAULT '10',
  `g_bon1_2_fun` int(20) NOT NULL DEFAULT '50',
  `g_bon1_3_fun` int(20) NOT NULL DEFAULT '100'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `games_garage`
--

INSERT INTO `games_garage` (`g_bon1`, `g_bon2`, `g_bon3`, `g_bon1_1`, `g_bon1_2`, `g_bon1_3`, `g_bon1_fun`, `g_bon2_fun`, `g_bon3_fun`, `g_bon1_1_fun`, `g_bon1_2_fun`, `g_bon1_3_fun`) VALUES
(3, 2, 2, 363, 28, 5, 3, 3, 2, 181, 163, 181);

-- --------------------------------------------------------

--
-- Структура таблицы `games_jp`
--

CREATE TABLE IF NOT EXISTS `games_jp` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `jp` decimal(20,2) DEFAULT '0.00',
  `proc` decimal(3,0) DEFAULT '0',
  `action` decimal(20,2) DEFAULT '5000.00',
  `jp_up` decimal(20,2) NOT NULL DEFAULT '500.00',
  `jp_down` decimal(20,2) NOT NULL DEFAULT '1000.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `games_jp`
--

INSERT INTO `games_jp` (`id`, `name`, `jp`, `proc`, `action`, `jp_up`, `jp_down`) VALUES
(1, 'Главный Джекпот Банк', '131242.43', '5', '300000.00', '190000.00', '200000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `games_poker`
--

CREATE TABLE IF NOT EXISTS `games_poker` (
  `vp_nomer` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `vp_bank` decimal(20,2) NOT NULL DEFAULT '0.00',
  `vp_proc` decimal(3,0) NOT NULL DEFAULT '100',
  `vp_shanswin1` varchar(255) NOT NULL DEFAULT '3|3|3|3|3|',
  `vp_shanswin2` varchar(255) NOT NULL DEFAULT '3|3|3|3|3|',
  `vp_shansdouble` varchar(255) NOT NULL DEFAULT '2',
  PRIMARY KEY (`vp_nomer`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `games_poker`
--

INSERT INTO `games_poker` (`vp_nomer`, `id`, `vp_bank`, `vp_proc`, `vp_shanswin1`, `vp_shanswin2`, `vp_shansdouble`) VALUES
('tensorbetter', 42, '0.00', '0', '6|5|4|3|2', '6|5|4|3|2', '5'),
('jacksorbetter', 43, '0.00', '0', '6|5|4|3|2', '6|5|4|3|2', '5'),
('acesandfaces', 44, '0.00', '0', '6|5|4|3|2', '6|5|4|3|2', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `games_settings`
--

CREATE TABLE IF NOT EXISTS `games_settings` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `bank` decimal(20,2) NOT NULL DEFAULT '0.00',
  `proc` decimal(3,0) NOT NULL DEFAULT '100',
  `winmax` decimal(12,2) NOT NULL DEFAULT '0.00',
  `income` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonus` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonus2` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusready` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusproc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `bonusmode` decimal(12,2) NOT NULL DEFAULT '0.00',
  `jackpot` decimal(12,2) NOT NULL DEFAULT '0.00',
  `jpotproc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `mode` varchar(128) DEFAULT NULL,
  `mode2` varchar(128) DEFAULT NULL,
  `mode3` varchar(128) DEFAULT NULL,
  `mode4` varchar(128) DEFAULT NULL,
  `incash` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `games_settings`
--

INSERT INTO `games_settings` (`id`, `name`, `bank`, `proc`, `winmax`, `income`, `bonus`, `bonus2`, `bonusready`, `bonusproc`, `bonusmode`, `jackpot`, `jpotproc`, `mode`, `mode2`, `mode3`, `mode4`, `incash`) VALUES
(1, 'Money Game', '13820.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '20|15|2|', '3|4|3|4|3|', '3', '5', '0.00'),
(2, 'Dynasty of Ming', '10267.60', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(3, 'Attila', '14394.10', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(4, 'Magic Princess', '9642.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(5, 'Secret Forest', '9450.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(6, 'Unicorn', '14807.60', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|25|5|', '3|4|3|4|3|', '3', '5', '0.00'),
(7, 'Sharky', '9740.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '15|5|2|', '2|2|2|2|2|', '3', '5', '0.00'),
(8, 'Queen of Hearts', '6729.40', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '15|25|2|', '2|2|2|2|2|', '3', '5', '0.00'),
(9, 'MarkoPolo', '14657.60', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '20|15|10|', '2|2|2|2|2|', '3', '5', '0.00'),
(10, 'Royal Treasures', '14386.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(11, 'PharaohsGold 2', '13270.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(12, 'ColumbusDelux 	', '16974.50', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(13, 'Columbus', '13662.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '15|10|10|', '2|2|2|2|2|', '3', '5', '0.00'),
(14, 'Book of Ra', '19101.20', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10|9|8|7|6|', '5|6|5|4|4|', '3', '5', '0.00'),
(15, 'BananaSplash', '6996.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(16, 'Bananas', '14950.90', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '35|45|2|', '10|9|8|7|6|', '3', '5', '0.00'),
(17, 'Dolphins', '15258.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '15|30|5|', '2|2|2|2|2|', '3', '5', '0.00'),
(18, 'Aztec Treasure', '14382.10', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '15|14|13|12|11|', '3', '5', '0.00'),
(19, 'Lucky Lady', '11816.80', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|25|25|', '2|2|2|2|2|', '3', '5', '0.00'),
(20, 'Ramses II', '2338.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(21, 'Panteron', '12030.60', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(22, 'Golden Planet', '10010.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(23, 'Gryphons Gold', '3125.20', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(24, 'Wonderful Flute', '10070.80', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(25, 'PharaohsGold 3', '11270.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(26, 'PolarFox', '9958.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(27, 'Safari Heat', '16429.60', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(28, 'Sparta', '10552.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(29, 'Mermaids Pearl', '15382.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(30, 'King of Сards', '11356.00', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '25|20|18|', '10|9|8|7|6|', '3', '5', '0.00'),
(31, 'atlantis', '100.74', '95', '100.00', '5.00', '100.20', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.05'),
(32, 'Dartagnan', '100.74', '95', '100.00', '5.00', '100.20', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.05'),
(33, 'Gladiator', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(34, 'devilsbike', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(35, 'Dracula', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(36, 'HappyFarm', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(37, 'Jungle', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(38, 'jurassic', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(39, 'luke', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(40, 'LunaPark', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(41, 'mafia', '1002.22', '95', '100.00', '5.00', '100.60', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.15'),
(42, 'mont-blanc', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(43, 'Navy', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(44, 'Numbers', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(45, 'Small-life', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(46, 'Zorro', '100.00', '95', '100.00', '5.00', '100.00', '0.00', '100.00', '20.00', '0.00', '0.00', '1.00', '1000000014', '1|Ru|Y|', '0.1|0.2|0.3|0.4|0.5|1', '0|_0|', '0.00'),
(47, '25linb2', '100.00', '95', '100.00', '5.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.10', '1000000000', '||N|', '|||||', '0', '100.00'),
(48, 'ttuz', '100.00', '95', '100.00', '5.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.03', '0.10', '1000000000', '||N|', '|||||', '0', '100.00'),
(49, 'chukcha', '-4.60', '90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '10|10|10|', '5|5|5|5|5|', '3', '5', '0.00');

-- --------------------------------------------------------

--
-- Структура таблицы `games_stats`
--

CREATE TABLE IF NOT EXISTS `games_stats` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `data` varchar(8) NOT NULL DEFAULT '',
  `time` time NOT NULL DEFAULT '00:00:00',
  `login` varchar(20) NOT NULL DEFAULT '',
  `cash` varchar(10) NOT NULL DEFAULT '0',
  `bank` varchar(10) NOT NULL DEFAULT '0',
  `bet` varchar(10) NOT NULL,
  `win` varchar(10) NOT NULL,
  `game` varchar(20) NOT NULL DEFAULT '',
  `mode` varchar(10) NOT NULL DEFAULT 'fun',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `games_stats_jp`
--

CREATE TABLE IF NOT EXISTS `games_stats_jp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(30) DEFAULT NULL,
  `jp` varchar(30) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `game` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=715 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pay_deposits`
--

CREATE TABLE IF NOT EXISTS `pay_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(12) DEFAULT NULL,
  `amount` varchar(12) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `ip` varchar(20) DEFAULT '0.0.0.0',
  `type` varchar(50) DEFAULT NULL,
  `type_money` varchar(10) NOT NULL,
  `status` varchar(1) DEFAULT '0',
  `notes` text,
  `referer` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=918 ;

--
-- Дамп данных таблицы `pay_deposits`
--

INSERT INTO `pay_deposits` (`id`, `user`, `amount`, `date`, `time`, `ip`, `type`, `type_money`, `status`, `notes`, `referer`) VALUES
(917, 'admin', '1', '19.03.14', '19:05:30', '89.146.71.211', 'FREEKASSA', '', '1', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', '94.75.230.6'),
(916, 'admin', '1', '19.03.14', '19:04:40', '89.146.71.211', 'FREEKASSA', '', '0', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', ''),
(915, 'admin', '1', '19.03.14', '19:03:29', '89.146.71.211', 'FREEKASSA', '', '0', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', ''),
(914, 'admin', '1', '19.03.14', '18:19:59', '89.146.71.211', 'FREEKASSA', '', '1', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', '94.75.230.6'),
(913, 'admin', '1', '19.03.14', '18:16:30', '89.146.71.211', 'FREEKASSA', '', '1', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', '94.75.230.6'),
(910, 'admin', '1', '19.03.14', '17:52:48', '89.146.71.211', 'FREEKASSA', '', '1', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', '94.75.230.6'),
(911, 'admin', '1', '19.03.14', '17:56:47', '89.146.71.211', 'FREEKASSA', '', '1', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', '94.75.230.6'),
(908, 'admin', '1', '19.03.14', '17:41:11', '89.146.71.211', 'FREEKASSA', '', '1', 'Пополнение счёта payeer для Пользователя:admin , Сумма:1 Кредитов', '94.75.230.6');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_a1pay`
--

CREATE TABLE IF NOT EXISTS `pay_modules_a1pay` (
  `secret` varchar(50) DEFAULT '',
  `key` varchar(50) DEFAULT '',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_a1pay`
--

INSERT INTO `pay_modules_a1pay` (`secret`, `key`, `status`, `version`) VALUES
('qawsedrftgyhujikolp', '', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_freekassa`
--

CREATE TABLE IF NOT EXISTS `pay_modules_freekassa` (
  `mrh_login` varchar(50) DEFAULT 'demotech',
  `mrh_pass1` varchar(50) DEFAULT 'q202202q',
  `mrh_pass2` varchar(50) NOT NULL DEFAULT 'q202202q',
  `shp_item` varchar(50) DEFAULT '3',
  `in_curr` varchar(50) DEFAULT 'PCR',
  `culture` varchar(50) DEFAULT 'ru',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `mode_demo` varchar(1) NOT NULL DEFAULT '0',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0',
  `fk_merchant_id` varchar(50) NOT NULL,
  `fk_merchant_key` varchar(50) NOT NULL,
  `fk_merchant_key2` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_freekassa`
--

INSERT INTO `pay_modules_freekassa` (`mrh_login`, `mrh_pass1`, `mrh_pass2`, `shp_item`, `in_curr`, `culture`, `status`, `mode_demo`, `version`, `fk_merchant_id`, `fk_merchant_key`, `fk_merchant_key2`) VALUES
('8738925', 'exapsS88yz', 'exapsS88yz', '3', 'PCR', 'ru', '1', '0', 'v1.0.0', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_interkassa`
--

CREATE TABLE IF NOT EXISTS `pay_modules_interkassa` (
  `ik_shop_id` varchar(100) DEFAULT '2FFF127C-3B9B-7156-DE78-8D32EA343FAF',
  `ik_key` varchar(100) NOT NULL DEFAULT 'MiHqVefF6mP1iMXm',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `mode_demo` varchar(1) NOT NULL DEFAULT '0',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_interkassa`
--

INSERT INTO `pay_modules_interkassa` (`ik_shop_id`, `ik_key`, `status`, `mode_demo`, `version`) VALUES
('5821E94C-D315-FBB2-CA98-C8D42F134934', 'ltBURk4CKfRPLQNm', '0', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_liqpay`
--

CREATE TABLE IF NOT EXISTS `pay_modules_liqpay` (
  `merchant_id` varchar(50) DEFAULT '',
  `merchant_password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_liqpay`
--

INSERT INTO `pay_modules_liqpay` (`merchant_id`, `merchant_password`, `status`, `version`) VALUES
('i3832965922', 'J8JFZzL5ANkQmBINpjinafdwsTa', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_robokassa`
--

CREATE TABLE IF NOT EXISTS `pay_modules_robokassa` (
  `mrh_login` varchar(50) DEFAULT 'demotech',
  `mrh_pass1` varchar(50) DEFAULT 'q202202q',
  `mrh_pass2` varchar(50) NOT NULL DEFAULT 'q202202q',
  `shp_item` varchar(50) DEFAULT '3',
  `in_curr` varchar(50) DEFAULT 'PCR',
  `culture` varchar(50) DEFAULT 'ru',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `mode_demo` varchar(1) NOT NULL DEFAULT '0',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_robokassa`
--

INSERT INTO `pay_modules_robokassa` (`mrh_login`, `mrh_pass1`, `mrh_pass2`, `shp_item`, `in_curr`, `culture`, `status`, `mode_demo`, `version`) VALUES
('demotech', 'q202202q', 'q202202q', '3', 'PCR', 'ru', '0', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_modules_webmoney`
--

CREATE TABLE IF NOT EXISTS `pay_modules_webmoney` (
  `skey` varchar(50) DEFAULT '',
  `WMR` varchar(13) DEFAULT 'R000000000000',
  `WMZ` varchar(13) DEFAULT 'Z000000000000',
  `WME` varchar(13) DEFAULT 'E000000000000',
  `WMU` varchar(13) DEFAULT 'U000000000000',
  `status` varchar(1) NOT NULL DEFAULT '1',
  `version` varchar(20) NOT NULL DEFAULT 'v1.0.0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_modules_webmoney`
--

INSERT INTO `pay_modules_webmoney` (`skey`, `WMR`, `WMZ`, `WME`, `WMU`, `status`, `version`) VALUES
('zxcvbnmqwertyuiop', 'R325816022181', 'Z000000000000', 'E000000000000', 'U000000000000', '0', 'v1.0.0');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_tariff`
--

CREATE TABLE IF NOT EXISTS `pay_tariff` (
  `USD` decimal(20,2) NOT NULL,
  `EUR` decimal(20,2) NOT NULL,
  `UAH` decimal(20,2) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `pay_tariff`
--

INSERT INTO `pay_tariff` (`USD`, `EUR`, `UAH`, `date`) VALUES
('31.64', '41.31', '3.89', '1270427172');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_withdrawals`
--

CREATE TABLE IF NOT EXISTS `pay_withdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(12) DEFAULT NULL,
  `amount` varchar(12) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `type_purse` varchar(50) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `notes` text,
  `details` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `pay_withdrawals`
--

INSERT INTO `pay_withdrawals` (`id`, `user`, `amount`, `date`, `time`, `type`, `type_purse`, `status`, `notes`, `details`) VALUES
(8, 'admin', '50', '2014-03-19', '18:23:19', 'WMR', 'R303684675881', '1', 'Заказ на вывод WebMoney:WMR', ''),
(9, 'admin', '50', '2014-03-19', '18:24:26', 'WMR', 'R303684675881', '1', 'Заказ на вывод WebMoney:WMR', '');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `key` varchar(20) NOT NULL,
  `val` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`key`, `val`) VALUES
('partner_percentage', '50'),
('partner_switch', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
