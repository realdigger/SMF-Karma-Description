<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005—2017 Grek.Kamchatka
 * @copyright 2017 digger <http://mysmf.ru>
 * @license GPLv3
 * @file hooks.php
 * @version 2.8
 */

global $context, $user_info;

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) {
    require_once(dirname(__FILE__) . '/SSI.php');
} else {
    if (!defined('SMF')) {
        die('<b>Error:</b> Cannot install - please verify that you put this file in the same place as SMF\'s index.php and SSI.php files.');
    }
}

if ((SMF == 'SSI') && !$user_info['is_admin']) {
    die('Admin privileges required.');
}

$hooks = array(
    'integrate_pre_include' => '$sourcedir/Mod-KarmaDescription.php',
    'integrate_pre_load' => 'loadKarmaDescriptionHooks',
);

if (!empty($context['uninstalling'])) {
    $call = 'remove_integration_function';
} else {
    $call = 'add_integration_function';
}

foreach ($hooks as $hook => $function) {
    $call($hook, $function);
}

if (SMF == 'SSI') {
    echo 'Database changes are complete! <a href="/">Return to the main page</a>.';
}
