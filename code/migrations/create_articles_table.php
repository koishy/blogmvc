<?php 

\Vendor\Migration::migrate(
    'CREATE TABLE `articles` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        title VARCHAR(256),
        content TEXT
    ) CHARACTER SET utf8 COLLATE utf8_unicode_ci'
);

 ?>