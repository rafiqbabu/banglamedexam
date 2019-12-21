<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group  = 'banglamedexam';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'          => '',
	'hostname'     => 'localhost',
	'username'     => 'root',
	'password'     => 'jnahian',
	'database'     => 'bigm_genesis_online_exam',
	'dbdriver'     => 'mysqli',
	'dbprefix'     => '',
	'pconnect'     => FALSE,
	'db_debug'     => (ENVIRONMENT !== 'production'),
	'cache_on'     => FALSE,
	'cachedir'     => '',
	'char_set'     => 'utf8',
	'dbcollat'     => 'utf8_general_ci',
	'swap_pre'     => '',
	'encrypt'      => FALSE,
	'compress'     => FALSE,
	'stricton'     => FALSE,
	'failover'     => array(),
	'save_queries' => TRUE
);

$db['bigm'] = array(
	'dsn'          => '',
	'hostname'     => '103.78.52.15',
	'username'     => 'root',
	'password'     => 'bigm321##',
	'database'     => 'bigm_genesis_online_exam',
	'dbdriver'     => 'mysqli',
	'dbprefix'     => '',
	'pconnect'     => FALSE,
	'db_debug'     => (ENVIRONMENT !== 'production'),
	'cache_on'     => FALSE,
	'cachedir'     => '',
	'char_set'     => 'utf8',
	'dbcollat'     => 'utf8_general_ci',
	'swap_pre'     => '',
	'encrypt'      => FALSE,
	'compress'     => FALSE,
	'stricton'     => FALSE,
	'failover'     => array(),
	'save_queries' => TRUE
);

$db['banglamedexam'] = array(
	'dsn'          => '',
	'hostname'     => 'localhost',
	'username'     => 'root',
	'password'     => '',
	'database'     => 'banglamedexam',
	'dbdriver'     => 'mysqli',
	'dbprefix'     => '',
	'pconnect'     => FALSE,
	'db_debug'     => (ENVIRONMENT !== 'production'),
	'cache_on'     => FALSE,
	'cachedir'     => '',
	'char_set'     => 'utf8',
	'dbcollat'     => 'utf8_general_ci',
	'swap_pre'     => '',
	'encrypt'      => FALSE,
	'compress'     => FALSE,
	'stricton'     => FALSE,
	'failover'     => array(),
	'save_queries' => TRUE
);