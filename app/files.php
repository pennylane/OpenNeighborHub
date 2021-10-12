<?php

$confdir = 'config';
$config = get_config();

function get_config() {
    $config = yaml_parse_file($GLOBALS['confdir'].'/config.yaml');

    if ( (count($config) < 1) ) {
        error_log('[ERROR] Unknown configuration error', 0);
        header("Location: errors/500.html");
        exit;
    }

	$flatconf = Array();
	foreach ($config as &$sub) {
		foreach ($sub as $key => $val) {
			$flatconf[$key] = $val;
		}
	}
	$config = $flatconf;
		
	$cleanconf = Array();

    if ( !array_key_exists('database', $config) ) {
        error_log('[ERROR] No database configuration specified', 0);
        header("Location: errors/500.html");
        exit;
    }
	$cleanconf['database'] = get_db_config($config);

    if ( array_key_exists('site', $config) && get_site_config($config) ) {
		$cleanconf['site'] = get_site_config($config);
    } else {
        error_log('[WARNING] No site configuration specified', 0);
	}

	return $cleanconf;
}

function get_db_config($config) {

	$config = $config['database'];
    
	if ( count($config) < 1 ) {
        error_log('[ERROR] No database configuration specified', 0);
        header("Location: errors/500.html");
        exit;
    }
	
	$cleanconf = Array();

	if (!array_key_exists('db_name', $config) || empty($config['db_name']) ) {
        error_log('[ERROR] Unknown error in database configuration: No database name specified', 0);
        header("Location: errors/500.html");
        exit;
    }
	$cleanconf['db_name'] = strval($config['db_name']);

	if (!array_key_exists('db_user', $config) || empty($config['db_user']) ) {
        error_log('[ERROR] Unknown error in database configuration: No database user specified', 0);
        header("Location: errors/500.html");
        exit;
    }
	$cleanconf['db_user'] = strval($config['db_user']);

	if (!array_key_exists('db_pass', $config) || empty($config['db_pass']) ) {
        error_log('[ERROR] Unknown error in database configuration: No database password specified', 0);
        header("Location: errors/500.html");
        exit;
    }
	$cleanconf['db_pass'] = strval($config['db_pass']);

	return $cleanconf;
}

function get_site_config($config) {

	$config = $config['site'];

    if ( count($config) < 1 ) {
        error_log('[WARNING] No site configuration specified', 0);
		return NULL;
    }

	$cleanconf = Array();

	if (array_key_exists('site_name', $config)) {
		$cleanconf['site_name'] = strval($config['site_name']);
    }

	if (array_key_exists('site_title', $config)) {
		$cleanconf['site_title'] = strval($config['site_title']);
    }

	return $cleanconf;
}



