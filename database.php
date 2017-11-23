<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005—2017 Grek.Kamchatka
 * @copyright 2017 digger <http://mysmf.ru>
 * @license GPLv3
 * @file db_change_2.0.php
 * @version 2.8
 */

global $modSettings;

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) {
    require_once(dirname(__FILE__) . '/SSI.php');
} else {
    if (!defined('SMF')) {
        die('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php and SSI.php files.');
    }
}

if ((SMF == 'SSI') && !$user_info['is_admin']) {
    die('Admin privileges required.');
}

db_extend('packages');
$tblname = '{db_prefix}log_karma';
$columns = $smcFunc['db_list_columns']($tblname);

// Add new columns
if (!in_array('description', $columns)) {
    $column = array(
        'name' => 'description',
        'type' => 'text',
        'null' => false,
        'default' => '',
    );
    $smcFunc['db_add_column']($tblname, $column);
}

if (!in_array('link', $columns)) {
    $column = array(
        'name' => 'link',
        'type' => 'text',
        'null' => false,
        'default' => '',
    );
    $smcFunc['db_add_column']($tblname, $column);
}

if (!in_array('is_read', $columns)) {
    $column = array(
        'name' => 'is_read',
        'type' => 'smallint',
        'size' => 1,
        'null' => false,
        'default' => 0,
        'unsigned' => true,

    );
    $smcFunc['db_add_column']($tblname, $column);
}

// Remove default index
$smcFunc['db_remove_index']('{db_prefix}log_karma', 'primary');

// Add new indexes
$smcFunc['db_add_index']('{db_prefix}log_karma', array('columns' => array('id_target')));
$smcFunc['db_add_index']('{db_prefix}log_karma', array('columns' => array('id_executor')));
// TODO: $smcFunc['db_add_index']('{db_prefix}log_karma', array('columns' => array('action', 'link')));

// Add mod default options
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

// Enable karma if disabled
$admin_features = explode(',', $modSettings['admin_features']);
if (!in_array('k', $admin_features)) {
    $admin_features[] = 'k';
    updateSettings(array('admin_features' => implode(',', $admin_features)));
}

if (SMF == 'SSI') {
    echo 'Database changes are complete! <a href="/">Return to the main page</a>.';
}
