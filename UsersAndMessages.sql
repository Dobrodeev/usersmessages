-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.38 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица usersAndMessages.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `id_user` int(50) unsigned NOT NULL DEFAULT '0',
  `surname` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы usersAndMessages.messages: ~35 rows (приблизительно)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT IGNORE INTO `messages` (`id_message`, `message`, `id_user`, `surname`, `email`) VALUES
	(2, 'nine', 4, 'Dobrodeev', 'dobrod@meta.ua'),
	(3, 'nine', 5, 'Martines', 'martines@bk.ru'),
	(5, 'nine', 7, 'Manovich', 'man@bk.ru'),
	(6, 'nine', 8, 'Actrosovich', 'actros@bk.ru'),
	(7, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(8, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(12, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(13, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(14, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(15, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(16, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(17, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(18, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(19, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(20, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(21, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(22, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(23, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(24, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(25, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(26, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(27, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(28, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(29, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(30, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(31, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(32, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(33, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(34, 'poker omaha', 4, 'Dobrodeev', 'dobrod@meta.ua'),
	(35, 'poker texas holdem', 4, 'Dobrodeev', 'dobrod@meta.ua'),
	(36, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(37, 'some message last Zero', 9, 'Zerovich', 'zero@bk.ru'),
	(38, 'Text for Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(39, 'message out to you ZERO last message', 9, 'Zerovich', 'zero@bk.ru'),
	(40, 'New Zero message for testing', 9, 'Zerovich', 'zero@bk.ru'),
	(41, 'New message for friend Cutler', 10, 'Cutler', 'cutler@bk.ru'),
	(42, 'first commit from Angelus', 11, 'Angelusovich', 'angelus@bk.ru'),
	(43, 'second commit', 11, 'Angelusovich', 'angelus@bk.ru');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Дамп структуры для таблица usersAndMessages.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы usersAndMessages.users: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id_user`, `name`, `surname`, `email`, `phone`) VALUES
	(4, 'Valera', 'Dobrodeev', 'dobrod@meta.ua', 958266324),
	(5, 'Victor', 'Martines', 'martines@bk.ru', 978304318),
	(6, 'Daf', 'Dafovich', 'daf@bk.ru', 1234567890),
	(7, 'Man', 'Manovich', 'man@bk.ru', 1111111111),
	(8, 'Actros', 'Actrosovich', 'actros@bk.ru', 2222222222),
	(9, 'Zero', 'Zerovich', 'zero@bk.ru', 4294967295),
	(10, 'Jay', 'Cutler', 'cutler@bk.ru', 4294967295),
	(11, 'Angelus', 'Angelusovich', 'angelus@bk.ru', 4294967295);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
