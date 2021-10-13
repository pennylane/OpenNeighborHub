<?php

function throw_400() {
    $source = '';
    $backtrace = debug_backtrace();

    if (array_key_exists('1', $backtrace)) {
        $source = debug_backtrace()[1]['function'];
    } else { 
        $source = debug_backtrace()[0]['file'].", line ".debug_backtrace()[0]['line'];
    }

    error_log('[ERROR] Request error in '.$source, 0);
    header("Location: errors/".$GLOBALS['config']['site']['site_lang']."/400.html");
    exit;
}

function throw_403() {
    $source = '';
    $backtrace = debug_backtrace();

    if (array_key_exists('1', $backtrace)) {
        $source = debug_backtrace()[1]['function'];
    } else { 
        $source = debug_backtrace()[0]['file'].", line ".debug_backtrace()[0]['line'];
    }

    error_log('[ERROR] Tried to execute non-permitted action in '.$source, 0);
    header("Location: errors/".$GLOBALS['config']['site']['site_lang']."/403.html");
    exit;
}

function throw_405() {
    $source = '';
    $backtrace = debug_backtrace();

    if (array_key_exists('1', $backtrace)) {
        $source = debug_backtrace()[1]['function'];
    } else { 
        $source = debug_backtrace()[0]['file'].", line ".debug_backtrace()[0]['line'];
    }

    error_log('[ERROR] Invalid method for '.$source, 0);
    header("Location: errors/".$GLOBALS['config']['site']['site_lang']."/405.html");
    exit;
}

function throw_422() {
    $source = '';
    $backtrace = debug_backtrace();

    if (array_key_exists('1', $backtrace)) {
        $source = debug_backtrace()[1]['function'];
    } else { 
        $source = debug_backtrace()[0]['file'].", line ".debug_backtrace()[0]['line'];
    }

    error_log('[ERROR] Invalid data supplied in '.$source, 0);
    header("Location: errors/".$GLOBALS['config']['site']['site_lang']."/422.html");
    exit;
}

function throw_500() {
    $source = '';
    $backtrace = debug_backtrace();

    if (array_key_exists('1', $backtrace)) {
        $source = debug_backtrace()[1]['function'];
    } else { 
        $source = debug_backtrace()[0]['file'].", line ".debug_backtrace()[0]['line'];
    }

    error_log('[ERROR] Unexpected error in '.$source, 0);
    header("Location: errors/".$GLOBALS['config']['site']['site_lang']."/500.html");
    exit;
}

