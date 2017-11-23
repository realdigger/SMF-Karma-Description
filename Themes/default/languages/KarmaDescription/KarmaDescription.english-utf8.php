<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005—2017 Grek.Kamchatka
 * @license GPLv3
 * @file KarmaDescription.english-utf8.php
 * @version 2.8
 */

global $helptxt, $settings, $context, $scripturl;

// ManageMaintenance
$txt['maintain_karmalog'] = 'Empty out Karma Description log';
$txt['maintain_karmalog_info'] = 'Erase all karma description log';
$txt['maintain_karma_points'] = 'Set all karma points to 0 to all members';
$txt['maintain_karma_points_info'] = 'Set all karma points to 0 to all members';
$txt['maintain_karma_points_info2'] = 'and erase all karma description log';

// ManageSettings
$txt['karmadescmod'] = 'Enable Karma Description Mod';
$txt['karmamaxmembers'] = 'Amount of lines per one page in Karma Description log';
$txt['karmalogview'] = 'Use member names as link to their profiles';
$txt['karmapermiss'] = 'Allow users view Karma Description log (See Permissions)';
$txt['karmalinks'] = 'Enable karma links in users profiles';
$txt['karmaisowner'] = 'Disable whole karma log for users but enable own karma log';
$txt['karmakarma'] = 'Display users karma(+/-) in Karma Description Log';
$txt['karmaurl'] = 'Enable "Where" field in Karma Description Log';
$txt['karmaotherstat'] = 'Show other Karma Statistics';
$txt['karmasurv'] = 'Applaud or smite users without explanation';
$txt['karmawhatwrite'] = 'Write this in the log, when explanation is disabled';
$txt['karmacensor'] = 'Censor karma explanation';
$txt['karmatopicstarter'] = 'Users can change only topic\'s starter karma';
$txt['karmanotifier'] = 'Enable karma notification';
$txt['karmaidmember'] = 'Send PM from this Member ID (1 by default)';
$txt['karma_pm_send_changelink'] = 'Send link in personal message to message where karma was changed';
$txt['karma_pm_send_link'] = 'Send link in personal message to own karma log';
$txt['karmacantmodify'] = 'User ID\'s, whose karma can\'t be changed. <div class="smalltext">Comma separated, without spaces. For example: 1,13,27</div>';
$txt['karmacantmodify2'] = 'User ID\'s, who can\'t modify karma. <div class="smalltext">For example: 2,412,88</div>';
$txt['karmabuttons'] = 'Show small images instead of karma applaud and smite text labels <img src="' . $settings['default_images_url'] . '/kdm_up.png" /><img src="' . $settings['default_images_url'] . '/kdm_down.png" />';
$txt['karmapictureinlog'] = 'Show small images in karma description log instead of + or - in action field <img src="' . $settings['default_images_url'] . '/kdm_up.png" /><img src="' . $settings['default_images_url'] . '/kdm_down.png" />';
$txt['karmadelete'] = 'Delete user karma points when i delete descriptions of changing in Karma Description log';
$txt['karmalabellink'] = 'Use karma label as link to members karma description log';
$txt['karmalastchange'] = 'Enable last karma change on BoardIndex';
$txt['karmalastchangenum'] = 'Number of descriptions on BoardIndex';
$txt['karmadescfieldnum'] = 'How much symbols will be in Description field on BoardIndex';
$txt['karmaremain'] = 'Amount of karma, which user can put for 24h <div class="smalltext">0 = no limit</div>';
$txt['karmainmessage'] = 'Display karma points in messages that users has got for ther messages';
$txt['karmainmessagelink'] = 'Allow users to watch karma changes for concrete message';

// Who
$txt['whoadmin_viewkarma'] = 'Viewing <a href="' . $scripturl . '?action=viewkarma">Karmachange Description log</a>.';
$txt['whoall_modifykarma'] = 'Changing karma.';

// Help
$helptxt['karmapermiss'] = 'By default this option is switched off and Karma Log can look only admins. If you want to do Karma Log available for other users or moderators, etc, enable this option and give the right that group, which can look Log in "Permissions" section.';
$helptxt['karmaotherstat'] = 'Show other karma statistics like Max applauded users or Max smited users and so on in whole karma log.';
$helptxt['karmalinks'] = 'If you enable this feauture, users will see two links in their profiles (Own or other users). They can see who change their karma and whom they change it. Karma Description Mod must be enabled';
$helptxt['karmakarma'] = 'It\'s display users karma in Karma log opposit the usernames. For example: Username (+12/-8)';
$helptxt['karmaurl'] = 'If you enable this option, you and your users can view where their karma was change.';
$helptxt['karmaisowner'] = 'If you enable this option, only profile owner will see two links to his own karma log. By the way, your users will resieve an error if they input an url adress (like http://your_forum.com/index.php?action=ownkarma;u=other_user) by the hand if you don\'t want your users can view other users karma log. Whole karma log will be disabled too. ONLY OWN KARMA LOG.';
$helptxt['karmanotifier'] = 'If you enable this function, your users will see another one field in their profiles in \'Notifications\' section. It give an opportunity to notify users when their karma will be changed by two way notify: Popup Message and Personal Message.';
$helptxt['karmaidmember'] = 'If your users enabled Karma Notify function and choose Personal Message notify, they will recieve a Peronal Message from this member id. For example, if you have ID_MEMBER=1 they will recieve PM from you and so on. If you set member id = 0 your users will recieve a message from Admin Guest.';
$helptxt['karma_pm_send_link'] = 'If your users enabled Karma Notify function and choose Personal Message notify, in Personal Message they will see a link to their own karma log.';
$helptxt['karma_pm_send_desc'] = 'If your users enabled Karma Notify function and choose Personal Message notify, in Personal Message they will see the reason of karma change.';
$helptxt['karma_pm_send_changelink'] = 'If your users enabled Karma Notify function and choose Personal Message notify, in Personal Message they will see a link to message where their karma was changed.';
$helptxt['karmacantmodify'] = 'Comma separated, without any spaces.';
$helptxt['karmacantmodify2'] = 'Comma separated, without any spaces.';
$helptxt['karmaremain'] = '0 - no limit';

// index
$txt['karmaview'] = 'Karma Change Description';
$txt['whykarmamod'] = 'Karma change';
$txt['Description'] = 'No Description';
$txt['karmamoder'] = 'Reason for changing the karma of this user';
$txt['karmarequare'] = '(Required field)';
$txt['karmawho'] = 'Who';
$txt['karmawhos'] = 'Whom';
$txt['karmawhat'] = 'What';
$txt['karmadesc'] = 'Reason';
$txt['karmatime'] = 'When';
$txt['karmanumb'] = 'Values: ';
$txt['statkarma'] = '[Karma Stats]';
$txt['viewkarma_title'] = 'Karma Change Description';
$txt['deletekarma'] = 'Delete';
$txt['clearkarma'] = 'Clear';
$txt['karma_delete_confirm'] = 'Are you sure you want to delete this record?';
$txt['karma_back'] = '< Back';
$txt['karma_continue'] = 'Continue >';
$txt['karmadescappl'] = ' (Applaud)';
$txt['karmadescsmi'] = ' (Smite)';
$txt['karmawhere'] = 'Where';
$txt['karmawhereurl'] = 'In topic';
$txt['karmawhereurl2'] = 'In PM';
$txt['karma_delete'] = 'Delete';
$txt['karma_pages'] = 'Pages';
$txt['karma_profile_of'] = 'View the profile of';
$txt['sure_about_karma_remove'] = 'Are you sure you want to delete this record?';
$txt['karma_stat'] = 'Karma Statistic';
$txt['karma_top_applaud'] = 'Top 5 applauded users';
$txt['karma_top_smite'] = 'Top 5 smited users';
$txt['karma_other_stat'] = 'General Statistics';
$txt['karma_max_appl'] = 'User MAX applauding other users';
$txt['karma_max_smit'] = 'User MAX smiting other users';
$txt['karma_today'] = 'Karma points today';
$txt['karma_today_plus'] = 'Today "+"';
$txt['karma_today_minus'] = 'Today "-"';
$txt['karma_notifier'] = 'Your karma was changed on ';
$txt['karma_notifier2'] = ' points. Do you want to see the karma description log?';
$txt['karma_pm_subject'] = 'Karma Notification';
$txt['karma_pm_body'] = 'Dear user. Your karma was changed. ';
$txt['karma_pm_body2'] = 'You can see the log if follow this link:<br />' . $scripturl . '?action=ownkarma;u=' . '';
$txt['karma_pm_send_desc'] = 'Send the reason in personal message';
$txt['karma_pm_send_desc2'] = '<br /><br />The reason of changing was: ';
$txt['karma_pm_send_changelink'] = '<br /><br />Your karma was changed on this message:<br />';
$txt['karma_last_change'] = 'Last karma change';
$txt['karma_last_change1'] = 'Last ';
$txt['karma_last_change2'] = ' karma changes';
$txt['karma_remain'] = 'Amount of karma points: ';
$txt['karma_remain_admin'] = '&infin;';
$txt['karma_count'] = ' karm for this message';

$txt['karmamessage'] = 'Karma reasons for concrete message';
$txt['karmamessage_executor'] = 'Changed';
$txt['karmamessage_description'] = 'Reason';
$txt['karmamessage_date'] = 'Date';
$txt['karmamessage_what'] = 'Change';
$txt['karmamessage_author'] = 'Message';

// ManagePermissions
$txt['permissionname_karmalog_view'] = 'View Karma Log';
$txt['permissionhelp_karmalog_view'] = 'Karma Description Log shows all members karma and description of applauding or smiting. This permission will only work if you also have enabled it in \'Features and Options\'. You can access the Karma Description screen by clicking the link in the \'Karma Stat\' section of the board index.';

// Errors
$txt['cannot_karmalog_view'] = 'Sorry - you don\'t have the proper permissions to view the Karma Description list.';
$txt['viewkarma_error'] = 'User ID must be a number';
$txt['karma_not_topic_starter'] = 'Sorry, he(she) is not a topic\'s starter.';
$txt['karma_cant_modify'] = 'Sorry, you can\'t modify karma to this user.';
$txt['karma_cant_modify2'] = 'Sorry, you can\'t modify karma to other users.';
$txt['kdm_error'] = 'Karma Description Mod is disabled';
$txt['kdm_remain_error'] = 'Sorry, you have reached a 24h limit of karma changes. You can change only ' . isset($modSettings['karmaremain']) . ' times in 24 h. <br>Next karma change will be available on ' . isset($context['nextKarma']) . '';

// Profile
$txt['who_change_my_karma'] = 'Who changed my karma';
$txt['whom_i_change_karma'] = 'Whose karma have I changed';
$txt['enable_notify'] = 'Notify me when my karma will be changed';
$txt['enable_notify_none'] = 'don\'t notify';
$txt['enable_notify_popup'] = 'Popup window';
$txt['enable_notify_pm'] = 'Personal Message';
$txt['display_karma_settings'] = 'Change Karma notify';
