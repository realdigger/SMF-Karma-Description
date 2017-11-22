<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005—2017 Grek.Kamchatka
 * @license GPLv3
 * @file db_change_2.0.php
 * @version 2.8
 */

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) {
    require_once(dirname(__FILE__) . '/SSI.php');
} else {
    if (!defined('SMF')) {
        die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php and SSI.php files.');
    }
}

if ((SMF == 'SSI') && !$user_info['is_admin']) {
    die('Admin priveleges required.');
}

db_extend('packages');

$result = $smcFunc['db_query']('', "SHOW COLUMNS FROM {db_prefix}log_karma LIKE 'description'");
if ($smcFunc['db_fetch_assoc']($result) == 0) {
    $smcFunc['db_query']('', "
		ALTER TABLE {db_prefix}log_karma
		ADD	description text NOT NULL AFTER action");
}

$result = $smcFunc['db_query']('', "SHOW COLUMNS FROM {db_prefix}log_karma LIKE 'link'");
if ($smcFunc['db_fetch_assoc']($result) == 0) {
    $smcFunc['db_query']('', "
		ALTER TABLE {db_prefix}log_karma
		ADD	link text NOT NULL AFTER description");
}

$result = $smcFunc['db_query']('', "SHOW COLUMNS FROM {db_prefix}log_karma LIKE 'is_read'");
if ($smcFunc['db_fetch_assoc']($result) == 0) {
    $smcFunc['db_query']('', "
		ALTER TABLE {db_prefix}log_karma
		ADD	is_read smallint(1) NOT NULL AFTER link");
}


$smcFunc['db_remove_index']("{db_prefix}log_karma", 'primary');

$smcFunc['db_insert']('ignore',
    '{db_prefix}settings',
    array('variable' => 'string', 'value' => 'string'),
    array(
        array('karmamaxmembers', '10'),
        array('karmawhatwrite', 'Explanation was disabled'),
        array('karmaidmember', '1'),
        array('karmalastchangenum', '1'),
        array('karmadescfieldnum', '25'),
    ),
    array('variable')
);
