<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', '/');
define('LIBS', 'libs/');
define('LOG_PATH', '/Users/satria.persada/Sites/btb/office/log/logfile_' . date('dMY') . '.txt');
define('DB_TYPE', 'mysql');
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
define('BACKEND_TEMPLATE', URL.'public/backend_template/');
define('PUBLIC_IMAGE', URL.'public/images/');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');