<?php
// -----------articles_ru--------------------------
CREATE TABLE `articles_ru` (  `id` int(11) NOT NULL,  `user_id` int(200) NOT NULL,  `moderator_id` int(200) NOT NULL,  `name` varchar(250) NOT NULL,  `nik_name` varchar(250) DEFAULT NULL,  `birth_day` date DEFAULT NULL,  `d_day` date DEFAULT NULL,  `place_of_birth` varchar(250) DEFAULT NULL,  `article_status` tinyint(1) NOT NULL DEFAULT 0,  `number_of_views` int(200) DEFAULT NULL,  `publication_date` timestamp NULL DEFAULT NULL,  `updated_date` timestamp NULL DEFAULT NULL,  `created_date` timestamp NOT NULL DEFAULT current_timestamp()) ENGINE=InnoDB DEFAULT CHARSET=utf8

?>