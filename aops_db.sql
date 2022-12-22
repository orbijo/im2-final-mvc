
CREATE DATABASE `aops_db`;
USE `aops_db`;

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL DEFAULT '',
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) NOT NULL,
  `min_salary` decimal(19,2) NOT NULL,
  `max_salary` decimal(19,2) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `postal_code` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL DEFAULT '',
  `state_province` varchar(255) NOT NULL DEFAULT '',
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`location_id`),
  UNIQUE KEY `postal_code` (`postal_code`),
  KEY `location_country_fk` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `foreman_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `budget` decimal(19,2) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_id`),
  KEY `project_location_fk` (`location_id`),
  KEY `project_client_fk` (`client_id`),
  KEY `project_foreman_fk` (`foreman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `project_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ps_supplier_fk` (`supplier_id`),
  KEY `ps_project_fk` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `project_workers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pw_worker_fk` (`worker_id`),
  KEY `pw_project_fk` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL DEFAULT '',
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL DEFAULT '',
  `phone_number` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `hire_date` date NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `salary` decimal(19,2) NOT NULL,
  `foreman_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`worker_id`),
  KEY `worker_foreman_fk` (`foreman_id`),
  KEY `worker_job_fk` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `locations`
  ADD CONSTRAINT `location_country_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `projects`
  ADD CONSTRAINT `project_client_fk` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_foreman_fk` FOREIGN KEY (`foreman_id`) REFERENCES `workers` (`worker_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `project_location_fk` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `project_suppliers`
  ADD CONSTRAINT `ps_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ps_supplier_fk` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `project_workers`
  ADD CONSTRAINT `pw_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pw_worker_fk` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `workers`
  ADD CONSTRAINT `worker_foreman_fk` FOREIGN KEY (`foreman_id`) REFERENCES `workers` (`worker_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `worker_job_fk` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON UPDATE CASCADE;

INSERT INTO `users` (`username`, `password`, `date_created`) VALUES
('admin', '$2y$10$KXA6rfxr6uo1RYwfylaaGem5jwcUayiT8VfZc8Lu5tnE8HPH7Yqyi', '2022-12-18');

INSERT INTO `countries` (`country_name`) 
VALUES
('Philippines'),
('United States'),
('Japan'),
('South Korea'),
('Australia'),
('Singapore');

INSERT INTO `locations`(`postal_code`, `city`, `state_province`, `country_id`)
VALUES
('6000', 'Cebu City', 'Cebu', 1),
('1001', 'Manila', 'NCR', 1),
('10001', 'New York', 'New York', 2),
('3000', 'Melbourne', 'Melbourne', 5),
('100-011', 'Seoul', 'Seoul', 4),
('450-0002', 'Nagoya', 'Aichi', 3),
('546080', 'Singapore', 'Singapore', 6),
('100-0003', 'Tokyo', 'Tokyo', 3);

INSERT INTO `jobs` (`job_title`, `min_salary`, `max_salary`) 
VALUES
('Foreman', '20000.0000', '30000.0000'),
('Construction Worker', '10000.0000', '15000.0000'),
('Mason', '10000.0000', '15000.0000'),
('Plumber', '15000.0000', '20000.0000'),
('Electrician', '15000.0000', '20000.0000');

INSERT INTO `workers`(`first_name`, `last_name`, `email`, `phone_number`, `address`, `hire_date`, `job_id`, `salary`, `foreman_id`)
VALUES
('Patrick', 'Mahomes', 'chosen1kc@yahoo.com', '09151515151', '101 Chiefs Lane, Mandaue City', '2017-06-12', 1, 30000, NULL),
('Travis', 'Kelce', 'chiefste1@live.com', '09878787878', '103 Kansas Avenue, Cebu City', '2017-06-12', 2, 12000, 1),
('Andy', 'Reid', 'kcheadcoach@gmail.com', '09514231238', '107 Arrowhead Drive, Talisay City', '2018-03-11', 3, 11000, 1),
('Harrison', 'Butker', 'automatic3@yahoo.com', '09425425421', '293 Chiefs Avenue, Mandaue City', '2014-01-02', 4, 17000, 1),
('Aaron', 'Rodgers', 'gb12forever@yahoo.com', '09121212121', '283 Lombardi Avenue, Mandaue City', '2005-06-11', 1, 30000, NULL),
('Mason', 'Crosby', 'patmaster_02@live.com', '09020202020', '281 Lambeau Street, Mandaue City', '2009-11-01', 5, 19000, 5),
('Davante', 'Adams', 'droppytae17@gmail.com', '09171717171', '277 Green Drive, Mandaue City', '2014-02-10', 2, 14000, 5),
('Matt', 'LaFleur', 'babyfacehc@yahoo.com', '09030303030', '271 Bay Street, Mandaue City', '2018-04-30', 3, 15000, 5),
('Jalen', 'Hurts', 'phillynumber1@yahoo.com', '09111100001', '109 Lincoln Lane, Mandaue City', '2019-10-31', 1, 30000, NULL),
('Jason', 'Kelce', 'center62@live.com', '09626262626', '113 Financial Drive, Mandaue City', '2012-05-01', 4, 20000, 9),
('Nick', 'Sirianni', 'lockedcoty@yahoo.com', '09123654222', '127 Philly Avenue, Mandaue City', '2015-12-12', 5, 15000, 9),
('Nick', 'Foles', 'phillyspecial9@gmail.com', '09999000890', '131 Eagle Drive, Mandaue City', '2012-03-22', 2, 11000, 9),
('Lamar', 'Jackson', 'new8era@yahoo.com', '09808080800', '137 Raven Street, Mandaue City', '2018-08-12', 1, 45000, NULL),
('Mark', 'Andrews', 'bestravente@yahoo.com', '09565655656', '139 Baltimore Avenue, Mandaue City', '2015-06-03', 3, 15000, 13),
('Ray', 'Lewis', 'sacklord52@live.com', '09552222555', '149 Maryland Lane, Mandaue City', '2009-11-11', 4, 20000, 13),
('Ed', 'Reed', 'safetyfirst20@yahoo.com', '09223322442', '269 Bank Drive, Mandaue City', '2013-02-12', 5, 18000, 13),
('Tom', 'Brady', 'tb12@gmail.com', '09454455454', '263 Tampa Lane, Mandaue City', '2008-12-12', 1, 30000, NULL),
('Bill', 'Belichick', 'grumpypat@gmail.com', '09000000001', '257 Gillette Street, Mandaue City', '2010-01-12', 2, 15000, 17),
('Rob', 'Gronkowski', 'baddestte87@yahoo.com', '09533553355', '251 Foxborough Avenue, Mandaue City', '2011-09-30', 3, 15000, 17),
('Mike', 'Evans', 'me13bucs@yahoo.com', '09131313133', '241 Buccaneer Drive, Mandaue City', '2016-06-11', 4, 15000, 17),
('Josh', 'Allen', 'doitall17@live.com', '09117717177', '239 Bills Avenue, Mandaue City', '2017-06-12', 1, 30000, NULL),
('Stephon', 'Diggs', 'catcher14@yahoo.com', '09144111444', '233 Buffalo Drive, Mandaue City', '2014-12-29', 5, 20000, 21),
('Ahmed', 'Gardner', 'lockupsauce1@yahoo.com', '09111101111', '229 Jet Street, Mandaue City', '2020-05-30', 2, 15000, 21),
('Mac', 'Jones', 'sonoftb@yahoo.com', '09200202200', '227 Patriot Lane, Mandaue City', '2017-06-12', 3, 15000, 21),
('Dak', 'Presscot', 'hipdancedak4@gmail.com', '09317317313', '223 Cowboy Drive, Mandaue City', '2016-06-12', 1, 30000, NULL),
('Ceedee', 'Lamb', 'wideout88@gmail.com', '09883883888', '211 Arlington Avenue, Mandaue City', '2019-03-31', 4, 17000, 25),
('Ezekiel', 'Elliot', 'ogsmallrb@live.com', '09152468151', '199 AT&T Street, Mandaue City', '2011-03-10', 5, 20000, 25),
('Mike', 'McCarthy', 'judasofgb@live.com', '09426142162', '197 Dallas Lane, Mandaue City', '2018-11-12', 2, 15000, 25),
('Kirk', 'Cousins', 'overpaid8@yahoo.com', '09890576876', '193 Minnesota Avenue, Mandaue City', '2014-06-30', 1,  20000, NULL),
('Justin', 'Jefferson', 'jj18speed@yahoo.com', '09118818188', '191 Viking Drive, Mandaue City', '2019-09-12', 3, 15000, 29),
('Dalvin', 'Cook', 'vikesrb4@gmail.com', '09123456543', '181 Minneapolis Street, Mandaue City', '2013-02-26', 4, 45000, 29),
('Harrison', 'Smith', 'whitesafety@live.com', '09282536334', '179 North Avenue, Mandaue City', '2014-10-18', 5, 19000, 29),
('Joe', 'Burrow', 'joebrr9@yahoo.com', '09999138401', '128 Cincinnati Avenue, Mandaue City', '2020-08-21', 2, 15000, 1),
('Jamarr', 'Chase', 'jamarrwr1@yahoo.com', '09121314151', '64 Bengal Drive, Mandaue City', '2020-06-12', 3, 14000, 5),
('Nick', 'Chubb', 'rbbull24@yahoo.com', '09242526277', '32 Brown Lane, Mandaue City', '2017-04-11', 4, 15000, 9),
('Kareem', 'Hunt', 'rback27@live.com', '09272829200', '16 Cleveland Avenue, Mandaue City', '2019-11-12', 5, 16000, 13),
('TJ', 'Watt', 'rusher99@live.com', '09153214251', '8A Steeler Street, Mandaue City', '2012-06-22', 2, 15000, 17),
('Najee', 'Harris', 'hurdle22@gmail.com', '09220092151', '4D Pittsburg Avenue, Mandaue City', '2018-12-08', 3, 15000, 21),
('Joey', 'Bosa', 'sackstar97@yahoo.com', '09123321456', '2nd Charge Drive, Mandaue City', '2019-11-30', 4, 19000, 25),
('Austin', 'Ekeler', 'charge30@yahoo.com', '09130303300', 'Zero SoFi Avenue, Mandaue City', '2012-03-12', 5, 18000, 29);

INSERT INTO `clients`(`first_name`, `last_name`, `email`, `phone_number`, `address`)
VALUES
('Za', 'Queen', 'herroyalhighness@royalty.gov.uk', '09112358132', '112B Jupiter Street, Cebu City'),
('Bisdak', 'Siya', 'cebunumbawan@cebu.gov.ph', '09223344556', '358G Uranus Avenue, Mandaue City'),
('Missy', 'Filemon', 'missfile@gmail.com', '09223344356','132C Neptune Drive, Talisay City'),
('Etsy', 'Worms', 'eeworms@live.com', '09223626556','214A Saturn Lane, Cebu City'),
('Orange', 'Lemon', 'citruslover@yahoo.com', '09103258826', '626S Mars Street, Quezon City'),
('Edgar', 'Parokya', 'elbimbo@gmail.com', '09103210556', '51A Earth Avenue, Davao City'),
('Hades', 'Eraser', 'underworld@live.com', '09928346556', '11G Mercury Drive, Dumaguete City'),
('Benjamin', 'Benedict', 'benandben@yahoo.com', '09103314956', '31S Venus Cebu City');

INSERT INTO `suppliers` (`first_name`, `last_name`, `email`, `phone_number`, `address`)
VALUES
('Charles', 'Darwin', 'og_evolution@yahoo.com', '09399314956', '192 Gomez Street, Cebu City'),
('Isaac', 'Newton', 'bigdaddy_gravity@gmail.com', '09972489136', '168 Burgos Avenue, Cagayan de Oro City'),
('Albert', 'Einstein', 'speedoflight300@live.com', '09112325813', '255 Zamora Drive, Davao City'),
('Marie', 'Curie', 'radiation_girl99@live.com', '09612358817', '128 Bonifacio Street, Quezon City'),
('Nikola', 'Tesla', 'godofelectricity@yahoo.com', '09813625341', '224 Mabini Avenue, Mandaue City');

INSERT INTO `projects` (`project_name`, `start_date`, `end_date`, `foreman_id`, `client_id`, `budget`, `location_id`)
VALUES
('Nagoya Concert Hall', '2019-02-11', '2021-04-30', 29, 4, 626214008.23, 6),
('Manila Wetland Park', '2018-07-12', '2020-01-30', 5, 2, 222179000.11, 2),
('Tokyo Drift Race Track', '2014-11-21', '2015-12-31', 9, 8, 512889341.09, 8),
('Talamban Sports Bar', '2017-05-11', '2018-04-21', 13, 1, 14208162.93, 1),
('Cebu Esports Complex', '2019-02-11', '2021-04-30', 17, 5, 77262121.93, 1),
('Manila Student Hub', '2015-07-02', '2016-11-22', 5, 6, 21790200.00, 2),
('New York Law Library', '2013-07-13', '2014-12-01', 25, 3, 429200114.20, 3),
('Korea BBQ Central', '2020-01-06', '2023-11-15', 1,7, 112002359.49, 5),
('Singapore National Academy', '2013-09-22', '2015-05-03', 21, 2, 497209661.71, 7),
('Melbourne Wildlife Center', '2011-03-02', '2012-10-28', 9, 4, 113572235.97, 4),
('Visayas Asylum', '2011-04-19', '2013-01-22', 25, 1, 15662197.03, 1),
('Cebu Cycle Track', '2013-04-11', '2013-12-20', 13, 6, 5351743.36, 1),
('Philippine National Library', '2010-12-11', '2012-03-22', 29, 3, 15662197.03, 2),
('Melbourne Childrens Hospital', '2014-08-12', '2016-10-10', 21, 4, 113572235.97, 4),
('Australia Cultural Center', '2014-11-12', '2022-12-30', 5, 1, 498372235.97, 4),
('Tokyo Pokemon Center', '2019-11-21', '2022-12-25', 29, 3, 512889341.09, 8),
('Cebu Target Center', '2018-09-25', '2022-12-27', 9, 6, 512889341.09, 1),
('Cebu North Road Properties', '2019-11-21', '2023-02-25', 1, 2, 512889341.09, 1);

INSERT INTO `project_workers`(`project_id`, `worker_id`)
VALUES
(1,29),(1,30),(1,31),(1,32),(1,40),
(2,5),(2,6),(2,7),(2,8),(2,34),
(3,9),(3,10),(3,11),(3,12),(3,35),
(4,13),(4,14),(4,15),(4,16),(4,36),
(5,17),(5,18),(5,19),(5,20),(5,37),
(6,5),(6,6),(6,7),(6,8),(6,34),
(7,25),(7,26),(7,27),(7,28),(7,39),
(8,1),(8,2),(8,3),(8,4),(8,33),
(9,21),(9,22),(9,23),(9,24),(9,38),
(10,9),(10,10),(10,11),(10,12),(10,35),
(11,25),(11,26),(11,27),(11,28),(11,39),
(12,13),(12,14),(12,15),(12,16),(12,36),
(13,29),(13,30),(13,31),(13,32),(13,40),
(14,21),(14,22),(14,23),(14,24),(14,38);

INSERT INTO `project_suppliers`(`project_id`, `supplier_id`)
VALUES
(1,5),(1,2),(1,4),(2,3),(3,1),(4,1),(4,3),(5,2),(6,5),(7,3),(8,4),(9,5),(10,2),(10,3),(11,1),(12,4),(13,5),(14,5),(14,4);

