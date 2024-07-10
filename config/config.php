<?php
/**
 * This file contains the configuration of the database and the global arrays
 */

/**
 * Database configuration 
*/
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'musiccorner');
define('DB_USER', 'root');
define('DB_PASS', '');
define('SQL_FILE_PATH', 'musiccorner.sql');


/**
 * The formats of the music sold
 */
define('Format', array(
    'CD',
    'LP'
    ));