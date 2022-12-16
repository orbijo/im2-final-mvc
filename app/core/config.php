<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    /** If Local Host */
    /** Database Config **/
    define('DBNAME', 'construction_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');

    /** Root Config **/
    define('ROOT', 'http://localhost/im2-final-mvc/public');

} else {
    /** If Hosting **/
    /** Database Config **/
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');


    define('ROOT', 'https://www.sitename.com');

}

define('APP_NAME', 'App Name');
define('APP_DESC', 'App Description');

/** true means show errors */
define('DEBUG', true);
