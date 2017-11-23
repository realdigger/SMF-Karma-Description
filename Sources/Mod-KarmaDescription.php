<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005—2017 Grek.Kamchatka
 * @copyright 2017 digger <http://mysmf.ru>
 * @license GPLv3
 * @file Mod-KarmaDescription.php
 * @version 2.8
 */

if (!defined('SMF')) {
    die('Hacking attempt...');
}


/**
 * Load all needed hooks
 */
function loadKarmaDescriptionHooks()
{
    add_integration_function('integrate_menu_buttons', 'addKarmaDescriptionCopyright', false);
    loadLanguage('KarmaDescription/KarmaDescription');
}

/**
 * Add mod copyright to the forum credit's page
 */
function addKarmaDescriptionCopyright()
{
    global $context;

    if ($context['current_action'] == 'credits') {
        $context['copyrights']['mods'][] = '<a href="https://custom.simplemachines.org/mods/index.php?mod=192" target="_blank">Karma Description</a> &copy; 2005-2017, Grek.Kamchatka';
    }
}

function ViewKarma()
{
    global $db_prefix, $context, $scripturl, $modSettings, $txt, $user_info, $smcFunc;

    // If mod is disabled, give me error please.
    if (empty($modSettings['karmadescmod'])) {
        fatal_lang_error('kdm_error', false);
    }

    // Users can't view karma log if you want it.
    if (empty($modSettings['karmapermiss']) && ($user_info['is_admin']) != 1) {
        fatal_lang_error('kdm_error', false);
    }

    if (!empty($modSettings['karmaisowner']) && ($user_info['is_admin']) != 1) {
        fatal_lang_error('cannot_karmalog_view', false);
    }

    //Permissions
    isAllowedTo('karmalog_view');

    loadTemplate('Viewkarma');

    // Sorting...
    $sort_methods = array(
        'exec' => 'lk.id_executor',
        'targ' => 'lk.id_target',
        'action' => 'lk.action',
        'time' => 'lk.log_time'
    );

    // By default, sorting by time
    if (!isset($_REQUEST['sort']) || !isset($sort_methods[$_REQUEST['sort']])) {
        $context['sort_by'] = 'time';
        $_REQUEST['sort'] = 'lk.log_time';
    } // DESC, ASC
    else {
        $context['sort_by'] = $_REQUEST['sort'];
        $_REQUEST['sort'] = $sort_methods[$_REQUEST['sort']];
    }

    $context['sort_direction'] = isset($_REQUEST['asc']) ? 'up' : 'down';

    // All values
    $request = $smcFunc['db_query']('', "
                SELECT COUNT(action)
                FROM {$db_prefix}log_karma
                ");
    list ($totalActions) = $smcFunc['db_fetch_row']($request);
    $smcFunc['db_free_result']($request);


    // Context variables, like title, etc
    $context['page_title'] = $txt['viewkarma_title'];
    $context['linktree'][] = array(
        'url' => $scripturl . '?action=viewkarma',
        'name' => $txt['viewkarma_title']
    );
    $context['page_index'] = constructPageIndex($scripturl . '?action=viewkarma', $_REQUEST['start'], $totalActions,
        $modSettings['karmamaxmembers']);
    $context['start'] = $_REQUEST['start'];
    $context['totalActions'] = $totalActions;

    //Main DB Query
    $result = $smcFunc['db_query']('', "
                             SELECT lk.id_target, lk.id_executor, lk.log_time, lk.action, lk.description, lk.link, memt.real_name AS target_name, meme.real_name AS executor_name, memt.karma_good AS target_karma_good, memt.karma_bad AS target_karma_bad, meme.karma_good AS executor_karma_good, meme.karma_bad AS executor_karma_bad
                             FROM {$db_prefix}log_karma AS lk, {$db_prefix}members AS memt, {$db_prefix}members AS meme
                             WHERE memt.id_member = lk.id_target
                             AND meme.id_member = lk.id_executor
                             ORDER BY $_REQUEST[sort] " . (isset($_REQUEST['asc']) ? 'ASC' : 'DESC') . "
                             LIMIT $context[start], $modSettings[karmamaxmembers]");

    $num_results = $smcFunc['db_num_rows']($result);
    $context['num_results'] = $num_results;

    //All recieve values to context variables please.
    $context['karma_changes'] = array();
    while ($row = $smcFunc['db_fetch_assoc']($result)) {
        $context['karma_changes'][] = array(
            'executor' => stripslashes($row['executor_name']),
            'target' => stripslashes($row['target_name']),
            'action' => ($row['action'] == 1) ? '+' : '-',
            'Description' => stripslashes($row['description']),
            'time' => timeformat($row['log_time']),
            'id_exec' => stripslashes($row['id_executor']),
            'id_targ' => stripslashes($row['id_target']),
            'targetkarmagood' => stripslashes($row['target_karma_good']),
            'targetkarmabad' => stripslashes($row['target_karma_bad']),
            'executorkarmagood' => stripslashes($row['executor_karma_good']),
            'executorkarmabad' => stripslashes($row['executor_karma_bad']),
            'link' => stripslashes($row['link']),
            'logtime' => stripslashes($row['log_time']),
        );
    }
    $smcFunc['db_free_result']($result);

    // Delete specific karma?
    if (isset($_POST['delete'])) {
        deleteKarma();
    }

    // Clear Get variable.
    if (!isset($_GET['start']) || $_GET['start'] < 0) {
        $_GET['start'] = 0;
    }

    //Show other karma statistic if needed
    if (!empty($modSettings['karmaotherstat'])) {
        show_other_stat();
    }


}

function OwnKarma()
{
    global $db_prefix, $context, $scripturl, $modSettings, $txt, $user_info, $smcFunc;

    // If mod disable, give me error please.
    if (empty($modSettings['karmadescmod'])) {
        fatal_lang_error('kdm_error', false);
    }
    if (!empty($modSettings['karmaisowner']) && $_REQUEST['u'] != $user_info['id'] && ($user_info['is_admin'] != 1)) {
        fatal_lang_error('cannot_karmalog_view', false);
    }


    //Permissions
    isAllowedTo('karmalog_view');


    loadTemplate('Viewkarma');

    // Sorting...
    $sort_methods = array(
        'exec' => 'lk.id_executor',
        'targ' => 'lk.id_target',
        'action' => 'lk.action',
        'time' => 'lk.log_time'
    );

    // Sortinf by time by default
    if (!isset($_REQUEST['sort']) || !isset($sort_methods[$_REQUEST['sort']])) {
        $context['sort_by'] = 'time';
        $_REQUEST['sort'] = 'lk.log_time';
    } // DESC, ASC
    else {
        $context['sort_by'] = $_REQUEST['sort'];
        $_REQUEST['sort'] = $sort_methods[$_REQUEST['sort']];
    }

    $context['sort_direction'] = isset($_REQUEST['asc']) ? 'up' : 'down';

    //Request['u'] must be unique.
    $_REQUEST['u'] = isset($_REQUEST['u']) ? (int)$_REQUEST['u'] : 0;
    if (empty($_REQUEST['u'])) {
        fatal_lang_error('viewkarma_error', false);
    }

    // Count all fields
    $request = $smcFunc['db_query']('', "
                SELECT COUNT(action)
                FROM {$db_prefix}log_karma
                WHERE id_target=" . $_REQUEST['u'] . "
                ");
    list ($totalActions) = $smcFunc['db_fetch_row']($request);
    $smcFunc['db_free_result']($request);

    // To centext variable
    $context['page_title'] = $txt['viewkarma_title'];
    $context['linktree'][] = array(
        'url' => $scripturl . '?action=ownkarma;u=' . $_REQUEST['u'] . '',
        'name' => $txt['viewkarma_title']
    );
    $context['page_index'] = constructPageIndex($scripturl . '?action=ownkarma;u=' . $_REQUEST['u'] . '',
        $_REQUEST['start'], $totalActions, $modSettings['karmamaxmembers']);
    $context['start'] = $_REQUEST['start'];
    $context['totalActions'] = $totalActions;

    //Main db query
    $result = $smcFunc['db_query']('', "
                             SELECT lk.id_target, lk.id_executor, lk.log_time, lk.action, lk.description, lk.link, memt.real_name AS target_name, meme.real_name AS executor_name, memt.karma_good AS target_karma_good, memt.karma_bad AS target_karma_bad, meme.karma_good AS executor_karma_good, meme.karma_bad AS executor_karma_bad
                             FROM {$db_prefix}log_karma AS lk, {$db_prefix}members AS memt, {$db_prefix}members AS meme
                             WHERE memt.id_member = lk.id_target
                             AND meme.id_member = lk.id_executor
                             AND lk.id_target = " . $_REQUEST['u'] . "
                             ORDER BY $_REQUEST[sort] " . (isset($_REQUEST['asc']) ? 'ASC' : 'DESC') . "
                             LIMIT $context[start], $modSettings[karmamaxmembers]");

    $num_results = $smcFunc['db_num_rows']($result);
    $context['num_results'] = $num_results;

    //All resieved values to array.
    $context['karma_changes'] = array();
    while ($row = $smcFunc['db_fetch_assoc']($result)) {
        $context['karma_changes'][] = array(
            'executor' => stripslashes($row['executor_name']),
            'target' => stripslashes($row['target_name']),
            'action' => ($row['action'] == 1) ? '+' : '-',
            'Description' => stripslashes($row['description']),
            'time' => timeformat($row['log_time']),
            'id_exec' => stripslashes($row['id_executor']),
            'id_targ' => stripslashes($row['id_target']),
            'targetkarmagood' => stripslashes($row['target_karma_good']),
            'targetkarmabad' => stripslashes($row['target_karma_bad']),
            'executorkarmagood' => stripslashes($row['executor_karma_good']),
            'executorkarmabad' => stripslashes($row['executor_karma_bad']),
            'link' => stripslashes($row['link']),
            'logtime' => stripslashes($row['log_time']),
        );
    }
    $smcFunc['db_free_result']($result);

    // Deleting specific karma?
    if (isset($_POST['delete'])) {
        deleteKarma();
    }

    // Clean up start.
    if (!isset($_GET['start']) || $_GET['start'] < 0) {
        $_GET['start'] = 0;
    }

    if (!empty($modSettings['karmaotherstat'])) {
        show_other_stat();
    }
}

function OtherKarma()
{
    global $db_prefix, $context, $scripturl, $modSettings, $txt, $user_info, $smcFunc;

    // If mod disable, give me error please.
    if (empty($modSettings['karmadescmod'])) {
        fatal_lang_error('kdm_error', false);
    }
    if (!empty($modSettings['karmaisowner']) && $_REQUEST['u'] != $user_info['id'] && ($user_info['is_admin'] != 1)) {
        fatal_lang_error('cannot_karmalog_view', false);
    }


    //Permissions
    isAllowedTo('karmalog_view');

    loadTemplate('Viewkarma');

    // Sorting...
    $sort_methods = array(
        'exec' => 'lk.id_executor',
        'targ' => 'lk.id_target',
        'action' => 'lk.action',
        'time' => 'lk.log_time'
    );

    //Sorting by time by default
    if (!isset($_REQUEST['sort']) || !isset($sort_methods[$_REQUEST['sort']])) {
        $context['sort_by'] = 'time';
        $_REQUEST['sort'] = 'lk.log_time';
    } // DESC, ASC
    else {
        $context['sort_by'] = $_REQUEST['sort'];
        $_REQUEST['sort'] = $sort_methods[$_REQUEST['sort']];
    }

    $context['sort_direction'] = isset($_REQUEST['asc']) ? 'up' : 'down';

    //Request['u'] должен быть указан.
    $_REQUEST['u'] = isset($_REQUEST['u']) ? (int)$_REQUEST['u'] : 0;
    if (empty($_REQUEST['u'])) {
        fatal_lang_error('viewkarma_error', false);
    }

    // Count all values
    $request = $smcFunc['db_query']('', "
                SELECT COUNT(action)
                FROM {$db_prefix}log_karma
                WHERE id_executor=" . $_REQUEST['u'] . "
                ");
    list ($totalActions) = $smcFunc['db_fetch_row']($request);
    $smcFunc['db_free_result']($request);

    // All resieved values to context variables
    $context['page_title'] = $txt['viewkarma_title'];
    $context['linktree'][] = array(
        'url' => $scripturl . '?action=otherkarma;u=' . $_REQUEST['u'] . '',
        'name' => $txt['viewkarma_title']
    );
    $context['page_index'] = constructPageIndex($scripturl . '?action=otherkarma;u=' . $_REQUEST['u'] . '',
        $_REQUEST['start'], $totalActions, $modSettings['karmamaxmembers']);
    $context['start'] = $_REQUEST['start'];
    $context['totalActions'] = $totalActions;

    //Main db query
    $result = $smcFunc['db_query']('', "
                             SELECT lk.id_target, lk.id_executor, lk.log_time, lk.action, lk.description, lk.link, memt.real_name AS target_name, meme.real_name AS executor_name, memt.karma_good AS target_karma_good, memt.karma_bad AS target_karma_bad, meme.karma_good AS executor_karma_good, meme.karma_bad AS executor_karma_bad
                             FROM {$db_prefix}log_karma AS lk, {$db_prefix}members AS memt, {$db_prefix}members AS meme
                             WHERE memt.id_member = lk.id_target
                             AND meme.id_member = lk.id_executor
                             AND lk.id_executor = " . $_REQUEST['u'] . "
                             ORDER BY $_REQUEST[sort] " . (isset($_REQUEST['asc']) ? 'ASC' : 'DESC') . "
                             LIMIT $context[start], $modSettings[karmamaxmembers]");

    $num_results = $smcFunc['db_num_rows']($result);
    $context['num_results'] = $num_results;

    //All resieved values to array
    $context['karma_changes'] = array();
    while ($row = $smcFunc['db_fetch_assoc']($result)) {
        $context['karma_changes'][] = array(
            'executor' => stripslashes($row['executor_name']),
            'target' => stripslashes($row['target_name']),
            'action' => ($row['action'] == 1) ? '+' : '-',
            'Description' => stripslashes($row['description']),
            'time' => timeformat($row['log_time']),
            'id_exec' => stripslashes($row['id_executor']),
            'id_targ' => stripslashes($row['id_target']),
            'targetkarmagood' => stripslashes($row['target_karma_good']),
            'targetkarmabad' => stripslashes($row['target_karma_bad']),
            'executorkarmagood' => stripslashes($row['executor_karma_good']),
            'executorkarmabad' => stripslashes($row['executor_karma_bad']),
            'link' => stripslashes($row['link']),
            'logtime' => stripslashes($row['log_time']),
        );
    }
    $smcFunc['db_free_result']($result);

    // Deleting specific karma?
    if (isset($_POST['delete'])) {
        deleteKarma();
    }

    // Clean up start.
    if (!isset($_GET['start']) || $_GET['start'] < 0) {
        $_GET['start'] = 0;
    }

    if (!empty($modSettings['karmaotherstat'])) {
        show_other_stat();
    }
}

function KarmaMessage()
{
    global $db_prefix, $context, $scripturl, $user_profile, $modSettings, $txt, $user_info, $smcFunc;

    // If mod disable, give me error please.
    if (empty($modSettings['karmadescmod'])) {
        fatal_lang_error('kdm_error', false);
    }
    if (!empty($modSettings['karmaisowner']) && $_REQUEST['u'] != $user_info['id'] && ($user_info['is_admin'] != 1)) {
        fatal_lang_error('cannot_karmalog_view', false);
    }


    //Permissions
    isAllowedTo('karmalog_view');


    loadTemplate('Viewkarmamessage');

    // Sorting...
    $sort_methods = array(
        'action' => 'lk.action',
        'time' => 'lk.log_time'
    );

    // Sorting by time by default
    if (!isset($_REQUEST['sort']) || !isset($sort_methods[$_REQUEST['sort']])) {
        $context['sort_by'] = 'time';
        $_REQUEST['sort'] = 'lk.log_time';
    } // DESC, ASC
    else {
        $context['sort_by'] = $_REQUEST['sort'];
        $_REQUEST['sort'] = $sort_methods[$_REQUEST['sort']];
    }

    $context['sort_direction'] = isset($_REQUEST['asc']) ? 'up' : 'down';

    //Request['u'] must be unique.
    $_REQUEST['u'] = isset($_REQUEST['u']) ? (int)$_REQUEST['u'] : 0;
    if (empty($_REQUEST['u'])) {
        fatal_lang_error('viewkarma_error', false);
    }

    loadMemberData($_REQUEST['u']);


    $context['posts'] = $user_profile[$_REQUEST['u']]['posts'];
    $context['member_group'] = $user_profile[$_REQUEST['u']]['member_group'];
    $context['id_group'] = $user_profile[$_REQUEST['u']]['id_group'];
    $context['post_group'] = $user_profile[$_REQUEST['u']]['post_group'];
    $context['stars'] = $user_profile[$_REQUEST['u']]['stars'];
    $context['karma_good'] = $user_profile[$_REQUEST['u']]['karma_good'];
    $context['karma_bad'] = $user_profile[$_REQUEST['u']]['karma_bad'];


    //Avatar
    if (!empty($user_profile[$_REQUEST['u']]['avatar']) && (substr($user_profile[$_REQUEST['u']]['avatar'], 0,
                7) != 'http://')) {
        $context['avatar'] = '<img src="' . $modSettings['avatar_url'] . '/' . $user_profile[$_REQUEST['u']]['avatar'] . '" />';
    } elseif (substr($user_profile[$_REQUEST['u']]['avatar'], 0, 7) == 'http://') {
        $context['avatar'] = '<img src="' . $user_profile[$_REQUEST['u']]['avatar'] . '" />';
    } elseif (empty($user_profile[$_REQUEST['u']]['avatar'])) {
        $request = $smcFunc['db_query']('', "
                SELECT id_attach
                FROM {$db_prefix}attachments
                WHERE id_member=" . $_REQUEST['u'] . "
                AND id_msg = 0
                ");

        list ($context['avatar_local']) = $smcFunc['db_fetch_row']($request);
        $smcFunc['db_free_result']($request);
        if (!empty($context['avatar_local'])) {
            $context['avatar'] = '<img src="' . $scripturl . '?action=dlattach;attach=' . $context['avatar_local'] . ';type=avatar" />';
        } else {
            $context['avatar'] = '';
        }
    }

    //Main db query
    $result = $smcFunc['db_query']('', "
                             SELECT mes.body, mes.poster_name, mes.subject, mes.id_member, mg.stars
                             FROM {$db_prefix}messages AS mes, {$db_prefix}membergroups AS mg
                             WHERE mes.id_topic = " . $_REQUEST['topic'] . "
                             AND mes.id_msg = " . $_REQUEST['m'] . "
                             LIMIT 1
                             ");

    //All resieved values to array.
    $context['karmamessage'] = array();
    while ($row = $smcFunc['db_fetch_assoc']($result)) {
        $context['karmamessage'][] = array(
            'body' => stripslashes(parse_bbc($row['body'])),
            'poster_name' => stripslashes($user_profile[$_REQUEST['u']]['real_name']),
            'subject' => stripslashes($row['subject']),
            'id_member' => stripslashes($row['id_member']),
            'stars' => stripslashes($context['stars']),

        );
    }

    $smcFunc['db_free_result']($result);

    // Count all values
    $request = $smcFunc['db_query']('', "
                SELECT COUNT(action)
                FROM {$db_prefix}log_karma
                WHERE id_executor=" . $_REQUEST['u'] . "
                ");
    list ($totalActions) = $smcFunc['db_fetch_row']($request);
    $smcFunc['db_free_result']($request);

    // To centext variable
    $context['page_title'] = $txt['viewkarma_title'];
    $context['linktree'][] = array(
        'url' => $scripturl . '?action=karmamessage;u=' . $_REQUEST['u'] . '',
        'name' => $txt['viewkarma_title']
    );
    $context['page_index'] = constructPageIndex($scripturl . '?action=karmamessage;u=' . $_REQUEST['u'] . ';topic=' . $_REQUEST['topic'] . ';m=' . $_REQUEST['m'] . '',
        $_REQUEST['start'], $totalActions, $modSettings['karmamaxmembers']);
    $context['start'] = $_REQUEST['start'];
    $context['totalActions'] = $totalActions;

    $link = $_REQUEST['topic'] . ".msg" . $_REQUEST['m'] . "#msg" . $_REQUEST['m'];


    //Main DB Query
    $request = $smcFunc['db_query']('', '
                 SELECT  lk.id_executor, lk.log_time, lk.action, lk.description, lk.link, mem.real_name AS executor_name
                 FROM {db_prefix}log_karma AS lk, {db_prefix}members AS mem
                 WHERE mem.id_member = lk.id_executor
                 AND lk.link = {text:link}
                 ORDER BY ' . $_REQUEST['sort'] . ' ' . (isset($_REQUEST['asc']) ? "ASC" : "DESC") . '
                 LIMIT ' . $context['start'] . ', ' . $modSettings['karmamaxmembers'],
        array(
            'link' => $link,
        )
    );

    $num_results = $smcFunc['db_num_rows']($request);
    $context['num_results'] = $num_results;

    //All recieve values to context variables please.
    $context['karma_changes'] = array();
    while ($row = $smcFunc['db_fetch_assoc']($request)) {
        $context['karma_changes'][] = array(
            'executor' => stripslashes($row['executor_name']),
            'action' => ($row['action'] == 1) ? '+' : '-',
            'Description' => stripslashes($row['description']),
            'time' => timeformat($row['log_time']),
            'id_exec' => stripslashes($row['id_executor']),
            'link' => stripslashes($row['link']),
            'logtime' => stripslashes($row['log_time']),

        );
    }
    $smcFunc['db_free_result']($request);


}


// Delete checked karma entries from the database.
function deleteKarma()
{
    global $db_prefix, $context, $smcFunc, $modSettings;

    // Just specific karma?
    if (!empty($_POST['delete'])) {
        if (!empty($modSettings['karmadelete'])) {
            $request = $smcFunc['db_query']('', "
                        SELECT * FROM {$db_prefix}log_karma
                        WHERE log_time IN (" . implode(',', array_unique($_POST["delete"])) . ')');

            while ($a = $smcFunc['db_fetch_assoc']($request)) {
                updateMemberData($a['id_target'], array($a['action'] == 1 ? 'karma_good' : 'karma_bad' => '-'));
            }

            $smcFunc['db_free_result']($request);
        }

        $smcFunc['db_query']('', "
                        DELETE FROM {$db_prefix}log_karma
                        WHERE log_time IN (" . implode(',', array_unique($_POST["delete"])) . ')');

        // Go back to where we were.
        redirectexit('action=viewkarma;start=' . $_GET['start'] . ';sort=' . $_GET['sort'] . ';' . (isset($_GET['desc']) ? 'desc' : 'asc') . '');
    }

    // Back to the karma log!
    redirectexit('action=viewkarma');


}

function show_other_stat()
{
    global $db_prefix, $context, $scripturl, $modSettings, $txt, $user_info, $smcFunc;

    $date = strftime('%Y%m%d', forum_time(false));

    //User, MAX applauded other users
    $user_max_appl_result = $smcFunc['db_query']('', "
                SELECT COUNT(*) AS cnt, mem.real_name
                FROM {$db_prefix}log_karma AS lk, {$db_prefix}members AS mem
                WHERE lk.action = 1
                AND mem.id_member = lk.id_executor
                GROUP BY lk.id_executor
                ORDER BY cnt DESC
                LIMIT 1");
    $row = $smcFunc['db_fetch_row']($user_max_appl_result);
    $context['memidappl'] = stripslashes($row[1]);
    $context['memidapplcount'] = stripslashes($row[0]);
    $smcFunc['db_free_result']($user_max_appl_result);

    //User, MAX smited other users.
    $user_max_smit_result = $smcFunc['db_query']('', "
                SELECT COUNT(*) AS cnt, mem.real_name
                FROM {$db_prefix}log_karma AS lk, {$db_prefix}members AS mem
                WHERE lk.action = -1
                AND mem.id_member = lk.id_executor
                GROUP BY lk.id_executor
                ORDER BY cnt DESC
                LIMIT 1");
    $row = $smcFunc['db_fetch_row']($user_max_smit_result);
    $context['memidsmit'] = stripslashes($row[1]);
    $context['memidsmitcount'] = stripslashes($row[0]);
    $smcFunc['db_free_result']($user_max_smit_result);

    //Today karma points
    $today_karma_points = $smcFunc['db_query']('', "
                SELECT COUNT(*)
                FROM {$db_prefix}log_karma
                WHERE FROM_UNIXTIME( log_time, '%Y%m%d' ) = $date
                ");
    $row = $smcFunc['db_fetch_row']($today_karma_points);
    $context['today_point'] = stripslashes($row[0]);
    $smcFunc['db_free_result']($today_karma_points);

    //Today plus
    $today_plus_points = $smcFunc['db_query']('', "
                SELECT COUNT(*)
                FROM {$db_prefix}log_karma
                WHERE FROM_UNIXTIME( log_time, '%Y%m%d' ) = $date
                AND action = 1
                ");
    $row = $smcFunc['db_fetch_row']($today_plus_points);
    $context['today_plus'] = stripslashes($row[0]);
    $context['today_minus'] = $context['today_point'] - $context['today_plus'];
    $smcFunc['db_free_result']($today_plus_points);


    //Top 5 max applauded users.
    $applaud_result = $smcFunc['db_query']('', "
                SELECT id_member, real_name, karma_good
                FROM {$db_prefix}members
                WHERE karma_good >= 0
                ORDER BY karma_good DESC
                LIMIT 5");
    $context['top_applaud'] = array();
    $max_num_posts = 1;
    while ($row_applaud = $smcFunc['db_fetch_assoc']($applaud_result)) {
        $context['top_applaud'][] = array(
            'name' => $row_applaud['real_name'],
            'id' => $row_applaud['id_member'],
            'num_karma' => $row_applaud['karma_good'],
            'href' => $scripturl . '?action=profile;u=' . $row_applaud['id_member'],
            'link' => '<a href="' . $scripturl . '?action=profile;u=' . $row_applaud['id_member'] . '">' . $row_applaud['real_name'] . '</a>'
        );

        if ($max_num_posts < $row_applaud['karma_good']) {
            $max_num_posts = $row_applaud['karma_good'];
        }
    }
    $smcFunc['db_free_result']($applaud_result);

    foreach ($context['top_applaud'] as $i => $applauder) {
        $context['top_applaud'][$i]['karma_percent'] = round(($applauder['num_karma'] * 100) / $max_num_posts);
    }

    //Top 5 smited users.
    $smite_result = $smcFunc['db_query']('', "
                SELECT id_member, real_name, karma_bad
                FROM {$db_prefix}members
                WHERE karma_bad >= 0
                ORDER BY karma_bad DESC
                LIMIT 5");
    $context['top_smite'] = array();
    $max_num_posts = 1;
    while ($row_smite = $smcFunc['db_fetch_assoc']($smite_result)) {
        $context['top_smite'][] = array(
            'name' => $row_smite['real_name'],
            'id' => $row_smite['id_member'],
            'num_karma' => $row_smite['karma_bad'],
            'href' => $scripturl . '?action=profile;u=' . $row_smite['id_member'],
            'link' => '<a href="' . $scripturl . '?action=profile;u=' . $row_smite['id_member'] . '">' . $row_smite['real_name'] . '</a>'
        );

        if ($max_num_posts < $row_smite['karma_bad']) {
            $max_num_posts = $row_smite['karma_bad'];
        }
    }
    foreach ($context['top_smite'] as $i => $smiter) {
        $context['top_smite'][$i]['karma_percent'] = round(($smiter['num_karma'] * 100) / $max_num_posts);
    }

    $smcFunc['db_free_result']($smite_result);
}
