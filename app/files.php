<?php

require_once 'errors.php';

$confdir = 'config';
$config = get_config();

function get_config() {
    $config = yaml_parse_file($GLOBALS['confdir'].'/config.yaml');

    if ( (count($config) < 1) ) {
        error_log('[ERROR] Unknown configuration error', 0);
        throw_500();
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
        throw_500();
    }
	$cleanconf['database'] = get_db_config($config);

    if ( !array_key_exists('site', $config) ) {
        error_log('[WARNING] No site configuration specified', 0);
		$cleanconf['site'] = ['site_lang' => 'en'];
    } else {
		$cleanconf['site'] = get_site_config($config);
	}

	return $cleanconf;
}

function get_db_config($config) {

	$config = $config['database'];
    
	if ( count($config) < 1 ) {
        error_log('[ERROR] No database configuration specified', 0);
        throw_500();
    }
	
	$cleanconf = Array();

	if (!array_key_exists('db_name', $config) || empty($config['db_name']) ) {
        error_log('[ERROR] Unknown error in database configuration: No database name specified', 0);
        throw_500();
    }
	$cleanconf['db_name'] = strval($config['db_name']);

	if (!array_key_exists('db_user', $config) || empty($config['db_user']) ) {
        error_log('[ERROR] Unknown error in database configuration: No database user specified', 0);
        throw_500();
    }
	$cleanconf['db_user'] = strval($config['db_user']);

	if (!array_key_exists('db_pass', $config) || empty($config['db_pass']) ) {
        error_log('[ERROR] Unknown error in database configuration: No database password specified', 0);
        throw_500();
    }
	$cleanconf['db_pass'] = strval($config['db_pass']);

	return $cleanconf;
}

function get_site_config($config) {

	$config = $config['site'];
	
	$cleanconf = Array();
	$cleanconf['site'] = ['site_lang' => 'en'];

    if ( count($config) < 1 ) {
        error_log('[WARNING] No site configuration specified', 0);
		return $cleanconf;
    }

	if (array_key_exists('site_name', $config)) {
		$cleanconf['site_name'] = strval($config['site_name']);
    }

	if (array_key_exists('site_title', $config)) {
		$cleanconf['site_title'] = strval($config['site_title']);
    }

	if (array_key_exists('site_lang', $config)) {
		$lang = strtolower(strval($config['site_lang']));

		if ($lang === 'de') {
			$cleanconf['site_lang'] = 'de';
		} else {
			$cleanconf['site_lang'] = 'en';
		}
	}

	return $cleanconf;
}



