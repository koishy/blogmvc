<?php 

\Vendor\Migration::migrate(
    'CREATE TABLE `users` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(256),
        password TEXT,
        is_admin BOOLEAN DEFAULT 0
    ) CHARACTER SET utf8 COLLATE utf8_unicode_ci'
);

 ?>