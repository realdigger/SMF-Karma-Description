<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005�2017 Grek.Kamchatka
 * @license GPLv3
 * @file KarmaDescription.russian.php
 * @version 2.8
 */

global $helptxt, $settings, $context, $scripturl;

// ManageMaintenance
$txt['maintain_karmalog'] = '�������� ��� �����';
$txt['maintain_karmalog_info'] = '������� ��� �������� ��������� �����';
$txt['maintain_karma_points'] = '�������� ����� ���� ������������� �� ����';
$txt['maintain_karma_points_info'] = '������ ����� ���������� ��� �������� ����� �� ���� � ������� ������������';
$txt['maintain_karma_points_info2'] = '�, �����, ������� ��� �������� ��������� �����';

// ManageSettings
$txt['karmadescmod'] = '�������� Karma Description Mod';
$txt['karmamaxmembers'] = '���������� ����� �� ���� �������� � ���� �����';
$txt['karmalogview'] = '������������ ����� ������������� ��� ������ � �������';
$txt['karmapermiss'] = '��������� ������������� �������� ��� ����� (��. �����)';
$txt['karmalinks'] = '���������� ������ �� ����� � �������� �������������';
$txt['karmaisowner'] = '��������� �������� ������ ���� ����� ��� �������������, �� ��������� �� �������� ����������� �����';
$txt['karmakarma'] = '���������� � ���� ���-�� ����� �������������';
$txt['karmaurl'] = '���������� ���� "���" � ���� �����';
$txt['karmaotherstat'] = '���������� ��������� ���������� �����';
$txt['karmasurv'] = '�������� ����� ��� ����������';
$txt['karmawhatwrite'] = '��� ����������� ���������� �������� � ��� ���������';
$txt['karmacensor'] = '��������� ������� ����������';
$txt['karmatopicstarter'] = '������������ ����� �������� ����� ������ ������ ����';
$txt['karmanotifier'] = '�������� ����������� ����������� �� ��������� �����';
$txt['karmaidmember'] = '���������� ��������� ��������� �� ����� ID ������������ (1 �� ���������)';
$txt['karma_pm_send_changelink'] = '���������� ������ � ������ ��������� �� ���������, � ������� ���� �������� �����';
$txt['karma_pm_send_link'] = '���������� ������ � ������ ��������� �� ����������� ��� �����';
$txt['karmacantmodify'] = 'ID �������������, ��� ����� �� ����� ���� ��������. <div class="smalltext">����� �������, ��� ��������, ��������: 1,13,27</div>';
$txt['karmacantmodify2'] = 'ID �������������, ������� �� ����� �������� �����. <div class="smalltext">��������: 2,412,88</div>';
$txt['karmabuttons'] = '���������� ��������� ������ ������ ��������� �������� ��������� ����� <img src="' . $settings['default_images_url'] . '/kdm_up.png" /><img src="' . $settings['default_images_url'] . '/kdm_down.png" />';
$txt['karmapictureinlog'] = '���������� ��������� ����������� � ���� �����, ������ ������ � ������� <img src="' . $settings['default_images_url'] . '/kdm_up.png" /><img src="' . $settings['default_images_url'] . '/kdm_down.png" />';
$txt['karmadelete'] = '������� ����� � ������������, ���� ��������� �� �������� � ���� �����';
$txt['karmalabellink'] = '������������ ����� ����� � ���������� ������������ ��� ������ �� �������� ��������� ��� �����';
$txt['karmalastchange'] = '���������� ��������� ��������� ����� �� ������� ��������';
$txt['karmalastchangenum'] = '���������� ���������, ������� ����� �������� �� ������� ��������';
$txt['karmadescfieldnum'] = '���������� ��������, ������������ � �������� ��������� ����� �� ������� ��������';
$txt['karmaremain'] = '���������� �����, ������� ������������ ����� ��������� �� ����� <div class="smalltext">0 = ��� �����������</div>';
$txt['karmainmessage'] = '���������� � ���������� ������������� ���������� �����, ������� ��� �������� �� ������ ���������';
$txt['karmainmessagelink'] = '��������� ������������� ��������� ����� �� ���������� ���������. � ������ ��������� ���������� ������';

// Who
$txt['whoadmin_viewkarma'] = '������������� <a href="' . $scripturl . '?action=viewkarma">��� �����</a>.';
$txt['whoall_modifykarma'] = '�������� �����.';

// Help
$helptxt['karmapermiss'] = '�� ��������� ��� ����� ��������� � ��� ����� ����� ���������� ������ ������������� ������. ���� �� ������, ����� ��� ����� ��� �������� ���� ���������, �������� ��� ����� � �������� ����� ������� � ������� ����� �������������.';
$helptxt['karmaotherstat'] = '����������� ��������� ����������, � ����� ���� �����.';
$helptxt['karmalinks'] = '���� �� �������� ������ �����, ������������ ������ � ����� �������� ��� ������. ��� ����� ���������� ���� ��� �������� ����� � ��� �� �� �������. ��� ������ ���� �������.';
$helptxt['karmakarma'] = '������ ����� ���������� � ���� ����� ���-�� ������ � ������� �������� ����� ������������. ��������: Admin (+12/-8)';
$helptxt['karmaurl'] = '������ ����� ��������� ������� � ���� ����� ������ �� ���������, � ������� ���� �������� �����.';
$helptxt['karmaisowner'] = '���� �� �������� ������ �����, ������ � ������� �� ����� ������ ������ ��� ���������� �������. ����� ��� ����� ����� ����������.';
$helptxt['karmanotifier'] = '���� �� �������� ������ �����, ������������ ������ ��������� ����������� �� ��������� �� �����. ���������� ��� ��� � ���������� �������.';
$helptxt['karmaidmember'] = '���� �� �������� ������� ����������� ��������� ����� � ���� ������������ ������� ����� ����������� \"������ ���������\" ��� ������� ������ ��������� �� ����� ������������, ��� ID ����� �� �������. ��������, ���� �� ������� ����� 1 (ID_MEMBER=1) ������������ ������� ��������� �� ���, ���� �� ������ ������������ �� ������. ���� ������� id = 0 ��������� ������� �� Admin-�����.';
$helptxt['karma_pm_send_link'] = '���������� ������ �� ������ ��� �����.';
$helptxt['karma_pm_send_desc'] = '���������� ���������� �� ��� ���� �������� �����.';
$helptxt['karma_pm_send_changelink'] = '���������� ������ �� ���������, � ������� ���� �������� �����.';
$helptxt['karmacantmodify'] = '����� �������, ��� ��������.';
$helptxt['karmacantmodify2'] = '����� �������, ��� ��������.';
$helptxt['karmaremain'] = '0 - ��� �����������';

// index
$txt['karmaview'] = '�������� ��������� ����� �������������';
$txt['whykarmamod'] = '��������� �����';
$txt['Description'] = '��� ��������';
$txt['karmamoder'] = '����������, �������� �� ��� �� ��������� ����� ����� ������������';
$txt['karmarequare'] = '(����������� ��� ����������)';
$txt['karmawho'] = '���';
$txt['karmawhos'] = '����';
$txt['karmawhat'] = '���';
$txt['karmadesc'] = '��������';
$txt['karmatime'] = '�����';
$txt['karmanumb'] = '��������: ';
$txt['statkarma'] = '[����� ���]';
$txt['viewkarma_title'] = '��������� �����';
$txt['deletekarma'] = '�������';
$txt['clearkarma'] = '��������';
$txt['karma_delete_confirm'] = '�� �������, ��� ������ ������� ��� ������?';
$txt['karma_back'] = '< �����';
$txt['karma_continue'] = '���������� >';
$txt['karmadescappl'] = ' (���������)';
$txt['karmadescsmi'] = ' (������)';
$txt['karmawhere'] = '���';
$txt['karmawhereurl'] = '� ����';
$txt['karmawhereurl2'] = '� ��';
$txt['karma_delete'] = '�������';
$txt['karma_pages'] = '�������';
$txt['karma_profile_of'] = '�������� �������';
$txt['sure_about_karma_remove'] = '�� �������, ��� ������ ������� ��� ������?';
$txt['karma_stat'] = '���������� �����';
$txt['karma_top_applaud'] = '5 ����� �������������';
$txt['karma_top_smite'] = '5 ����� �������������';
$txt['karma_other_stat'] = '����� ����������';
$txt['karma_max_appl'] = '���� ���� �������� ���������';
$txt['karma_max_smit'] = '���� ���� �������� ���������';
$txt['karma_today'] = '������� ���������� �����';
$txt['karma_today_plus'] = '������� "+"';
$txt['karma_today_minus'] = '������� "-"';
$txt['karma_notifier'] = '��������! ���� ����� ���� �������� ';
$txt['karma_notifier2'] = ' ���(�). �� ������ ���������� ��� �����?';
$txt['karma_pm_subject'] = '����������� �����';
$txt['karma_pm_body'] = '������������! ���� ����� ���� ��������. ';
$txt['karma_pm_body2'] = '�� ������ ����������� ��� �� ���� ������:<br />' . $scripturl . '?action=ownkarma;u=' . '';
$txt['karma_pm_send_desc'] = '���������� ���������� ��������� ����� � ������ ���������';
$txt['karma_pm_send_desc2'] = '<br /><br />���������� ���� ���������: ';
$txt['karma_pm_send_changelink'] = '<br /><br />���� ����� ���� �������� � ���� ���������:<br />';
$txt['karma_last_change'] = '��������� ��������� �����';
$txt['karma_last_change1'] = '��������� ';
$txt['karma_last_change2'] = '  ��������� �����';
$txt['karma_remain'] = '� ��� �������� ���������: ';
$txt['karma_remain_admin'] = '&infin;';
$txt['karma_count'] = ' � ����� �� ������ ���������';

$txt['karmamessage'] = '�������� ��������� ����� �� ���������� ���������';
$txt['karmamessage_executor'] = '�������';
$txt['karmamessage_description'] = '�������� ���������';
$txt['karmamessage_date'] = '���� ���������';
$txt['karmamessage_what'] = '���������';
$txt['karmamessage_author'] = '���������';

// ManagePermissions
$txt['permissionname_karmalog_view'] = '�������� ���� �����';
$txt['permissionhelp_karmalog_view'] = '��� ����� ���������� ������������� ��������� � �������� �� ��� ���� �������� �����. ������ ���������� ����� �������� ������ �����, ����� �� �������� ��� ����� � ���������� ������. �� ������� �������� ������ ���������� ������ ��� ���������.';

// Errors
$txt['cannot_karmalog_view'] = '�������� - � ��� ��� ����� ��������� ���� �����.';
$txt['viewkarma_error'] = 'ID ������������ ������ ����� �������� ���';
$txt['karma_not_topic_starter'] = '��������, �� ������ �������� ����� ������ ������ ����.';
$txt['karma_cant_modify'] = '��������, �� �� ������ �������� ����� ����� ������������.';
$txt['karma_cant_modify2'] = '��������, �� �� ������ �������� ����� ������ �������������.';
$txt['kdm_error'] = 'Karma Description Mod ��������';

$txt['kdm_remain_error'] = '��������, �� ������� ��� ����� ��������� ����� ����������. ����� ��������� ������� ' . isset($modSettings['karmaremain']) . ' ��������� �� 24 ����. <br>��������� ��������� ����� �������� ' . isset($context['nextKarma']) . '';

// Profile
$txt['who_change_my_karma'] = '��� ������� ��� �����';
$txt['whom_i_change_karma'] = '���� � ������� �����';
$txt['enable_notify'] = '���������� ����, ����� ��� ����� ����� ��������';
$txt['enable_notify_none'] = '�� ����������';
$txt['enable_notify_popup'] = '����������� ����';
$txt['enable_notify_pm'] = '������ ���������';
$txt['display_karma_settings'] = '�������� ����� ����������� ��� ��������� �����';
