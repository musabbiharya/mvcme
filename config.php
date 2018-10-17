<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://localhost/~satria.persada/btb/office/');
define('LIBS', 'libs/');
define('LOG_PATH', '/Users/satria.persada/Sites/btb/office/log/logfile_' . date('dMY') . '.txt');
define('DB_TYPE', 'mysql');
define('DB_HOST', '103.253.107.191');
define('DB_NAME', 'dms');
define('DB_USER', 'root');
define('DB_PASS', 'bonsai212');
define('BACKEND_TEMPLATE', URL.'public/backend_template/');
define('PUBLIC_IMAGE', URL.'public/images/');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');