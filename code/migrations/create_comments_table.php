<?php 

\Vendor\Migration::migrate(
    'CREATE TABLE `comments` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        post_id INT(6) UNSIGNED,
        user_id INT(6) UNSIGNED,
        content TEXT
    ) CHARACTER SET utf8 COLLATE utf8_unicode_ci'
);

 ?>