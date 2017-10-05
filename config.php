<?php

/** Inicio Configuração da base de dados */
define('DB_NAME', 'hostel');

define('DB_USER','root');

define('DB_PASSWORD','');

define('DB_HOST','localhost');

if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__). '/');

if ( !defined('BASEURL') )
    define('BASEURL', '/hostel/');
    
if( !defined('DBAPI') )
    define('DBAPI', ABSPATH . 'inc/database.php');    

/** Fim da configuração da base de dados */

/** Inicio teamplate */
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');    

/** Fim Teamplate */

/** Inicio file upload */
if( !defined('UPLOAD') )
    define('UPLOAD', ABSPATH . 'upload/');
/** Fim file upload */