<?php
	/* =========================================================
	 * SYS INIT
	 * ====================================================== */
	session_start();

	mb_internal_encoding("UTF-8");
	mb_http_output("UTF-8");
	ini_set('default_charset', 'UTF-8');
	header('Content-Type: text/html; charset=UTF-8');

	date_default_timezone_set('Europe/Amsterdam');
	setlocale(LC_TIME, 'nl_NL');

	/* =========================================================
	 * CONFIG
	 *
	 * Because we're not using virtual hosts, we'll have to set
	 * the documentroot manually
	 * ====================================================== */
	define ('DOC_ROOT', 			__DIR__);
	define ('PUBLIC_FOLDER',		DOC_ROOT . '/public');

	/* =========================================================
	 * SETTINGS
	 * ====================================================== */
	set_include_path(DOC_ROOT);


	/* =========================================================
	 * DATABASE
	 * ====================================================== */
	define('DB_HOST', 		'localhost');
	define('DB_DATABASE', 	'test');
	define('DB_USERNAME', 	'root');
	define('DB_PASSWORD', 	'caviakooi');
	define('DB_CHARSET', 	'utf8');

	/* =========================================================
	 * INCLUDES
	 * ====================================================== */
	include ('functions.inc.php');

	/* =========================================================
	 * INCLUDES SERVICES
	 * ====================================================== */

	include ('/services/Database.php');

	/* =========================================================
	 * DATABASE CONNECTION
	 * ====================================================== */
	try {
		myMvc\Services\Database::connect(DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_CHARSET);
	} catch (PDOException $e) {
		trigger_error($e->getMessage(), E_USER_ERROR);
	}