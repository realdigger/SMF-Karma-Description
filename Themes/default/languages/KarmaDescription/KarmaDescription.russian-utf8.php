<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005—2017 Grek.Kamchatka
 * @license GPLv3
 * @file KarmaDescription.russian-utf8.php
 * @version 2.8
 */

global $helptxt, $settings, $context, $scripturl;

// ManageMaintenance
$txt['maintain_karmalog'] = 'Очистить лог кармы';
$txt['maintain_karmalog_info'] = 'Удалить все описания изменений кармы';
$txt['maintain_karma_points'] = 'Сбросить карму всех пользователей на ноль';
$txt['maintain_karma_points_info'] = 'Данная опция сбрасывает все значения кармы на ноль у каждого пользователя';
$txt['maintain_karma_points_info2'] = 'а, также, удалить все описания изменений кармы';

// ManageSettings
$txt['karmadescmod'] = 'Включить Karma Description Mod';
$txt['karmamaxmembers'] = 'Количество строк на одну страницу в логе кармы';
$txt['karmalogview'] = 'Использовать имена пользователей как ссылки в профиль';
$txt['karmapermiss'] = 'Позволить пользователям смотреть лог кармы (См. права)';
$txt['karmalinks'] = 'Отображать ссылки на карму в профилях пользователей';
$txt['karmaisowner'] = 'Запретить просмотр общего лога кармы для пользователей, но разрешить им просмотр собственной кармы';
$txt['karmakarma'] = 'Отображать в логе кол-во кармы пользователей';
$txt['karmaurl'] = 'Отображать поле "Где" в логе кармы';
$txt['karmaotherstat'] = 'Отображать остальную статистику кармы';
$txt['karmasurv'] = 'Изменять карму без объяснений';
$txt['karmawhatwrite'] = 'При выключенном объяснении заносить в лог следующее';
$txt['karmacensor'] = 'Проверять цензуру объяснений';
$txt['karmatopicstarter'] = 'Пользователи могут изменять карму только автору темы';
$txt['karmanotifier'] = 'Включить возможность уведомления об изменении кармы';
$txt['karmaidmember'] = 'Отправлять приватное сообщение от этого ID пользователя (1 по умолчанию)';
$txt['karma_pm_send_changelink'] = 'Отправлять ссылку в личном сообщение на сообщение, в котором была изменена карма';
$txt['karma_pm_send_link'] = 'Отправлять ссылку в личном сообщении на собственный лог кармы';
$txt['karmacantmodify'] = 'ID пользователей, чья карма не может быть изменена. <div class="smalltext">Через запятую, без пробелов, например: 1,13,27</div>';
$txt['karmacantmodify2'] = 'ID пользователей, которые не могут изменять карму. <div class="smalltext">Например: 2,412,88</div>';
$txt['karmabuttons'] = 'Показывать небольшие кнопки вместо текстовых названий изменения кармы <img src="' . $settings['default_images_url'] . '/kdm_up.png" /><img src="' . $settings['default_images_url'] . '/kdm_down.png" />';
$txt['karmapictureinlog'] = 'Показывать небольшое изображение в логе кармы, вместо плюсов и минусов <img src="' . $settings['default_images_url'] . '/kdm_up.png" /><img src="' . $settings['default_images_url'] . '/kdm_down.png" />';
$txt['karmadelete'] = 'Удалять карму у пользователя, если удаляется ее описание в логе кармы';
$txt['karmalabellink'] = 'Использовать метку кармы в сообщениях пользователя как ссылку на описание изменений его кармы';
$txt['karmalastchange'] = 'Показывать последнее изменение кармы на главной странице';
$txt['karmalastchangenum'] = 'Количество изменений, которые будут показаны на главной странице';
$txt['karmadescfieldnum'] = 'Количество символов, отображаемых в описании изменения кармы на главной странице';
$txt['karmaremain'] = 'Количество кармы, которое пользователь может поставить за сутки <div class="smalltext">0 = без ограничений</div>';
$txt['karmainmessage'] = 'Отображать в сообщениях пользователей количество кармы, которое они получили за данное сообщение';
$txt['karmainmessagelink'] = 'Позволить просматривать изменения кармы за конкретное сообщение. В каждом сообщении появляется ссылка';

// Who
$txt['whoadmin_viewkarma'] = 'Просматривает <a href="' . $scripturl . '?action=viewkarma">лог кармы</a>.';
$txt['whoall_modifykarma'] = 'Изменяет карму.';

// Help
$helptxt['karmapermiss'] = 'По умолчанию эта опция выключена и лог кармы может посмотреть только администратор форума. Если Вы хотите, чтобы лог кармы был доступен всем остальным, включите эту опцию и раздайте права группам в разделе Права пользователей.';
$helptxt['karmaotherstat'] = 'Отображение остальной статистики, в общем логе кармы.';
$helptxt['karmalinks'] = 'Если Вы включите данную опцию, пользователи увидят в своих профилях две ссылки. ОНи могут посмотреть кому они изменили карму и кто им ее изменил. Мод должен быть включен.';
$helptxt['karmakarma'] = 'Данная опция отображает в логе кармы кол-во плюсов и минусов напротив имени пользователя. Например: Admin (+12/-8)';
$helptxt['karmaurl'] = 'Данная опция позволяет увидеть в логе кармы ссылку на сообщение, в котором была изменена карма.';
$helptxt['karmaisowner'] = 'Если Вы включите данную опцию, ссылки в профиле на карму увидит только сам обладатель профиля. Общий лог кармы будет недоступен.';
$helptxt['karmanotifier'] = 'Если Вы включите данную опцию, пользователи смогут назначить уведомление об изменении их кармы. Изменяется это все в настройках профиля.';
$helptxt['karmaidmember'] = 'Если Вы включили функцию уведомления изменения кармы и Ваши пользователи выбрали пункт уведомления \"Личное сообщение\" они получат личное сообщение от имени пользователя, чей ID номер Вы указали. Например, если Вы указали номер 1 (ID_MEMBER=1) пользователи получат сообщение от Вас, если Вы первый пользователь на форуме. Если укажете id = 0 сообщение прийдет от Admin-Гость.';
$helptxt['karma_pm_send_link'] = 'Отправляет ссылку на личный лог кармы.';
$helptxt['karma_pm_send_desc'] = 'Отправляет объяснение за что была изменена карма.';
$helptxt['karma_pm_send_changelink'] = 'Отправляет ссылку на сообщение, в котором была изменена карма.';
$helptxt['karmacantmodify'] = 'Через запятую, без пробелов.';
$helptxt['karmacantmodify2'] = 'Через запятую, без пробелов.';
$helptxt['karmaremain'] = '0 - без ограничений';

// index
$txt['karmaview'] = 'Просмотр изменения кармы пользователей';
$txt['whykarmamod'] = 'Изменение кармы';
$txt['Description'] = 'Нет описания';
$txt['karmamoder'] = 'Пожалуйста, напишите за что вы изменяете карму этому пользователю';
$txt['karmarequare'] = '(Обязательно для заполнения)';
$txt['karmawho'] = 'Кто';
$txt['karmawhos'] = 'Кому';
$txt['karmawhat'] = 'Что';
$txt['karmadesc'] = 'Описание';
$txt['karmatime'] = 'Когда';
$txt['karmanumb'] = 'Значений: ';
$txt['statkarma'] = '[Карма лог]';
$txt['viewkarma_title'] = 'Изменение кармы';
$txt['deletekarma'] = 'Удалить';
$txt['clearkarma'] = 'Очистить';
$txt['karma_delete_confirm'] = 'Вы уверены, что хотите удалить эти записи?';
$txt['karma_back'] = '< Назад';
$txt['karma_continue'] = 'Продолжить >';
$txt['karmadescappl'] = ' (Прибавить)';
$txt['karmadescsmi'] = ' (Отнять)';
$txt['karmawhere'] = 'Где';
$txt['karmawhereurl'] = 'В теме';
$txt['karmawhereurl2'] = 'В ЛС';
$txt['karma_delete'] = 'Удалить';
$txt['karma_pages'] = 'Страниц';
$txt['karma_profile_of'] = 'Смотреть профиль';
$txt['sure_about_karma_remove'] = 'Вы уверены, что хотите удалить эти записи?';
$txt['karma_stat'] = 'Статистика кармы';
$txt['karma_top_applaud'] = '5 самых положительных';
$txt['karma_top_smite'] = '5 самых отрицательных';
$txt['karma_other_stat'] = 'Общая статистика';
$txt['karma_max_appl'] = 'Чаще всех повышает репутацию';
$txt['karma_max_smit'] = 'Чаще всех понижает репутацию';
$txt['karma_today'] = 'Сегодня поставлено кармы';
$txt['karma_today_plus'] = 'Сегодня "+"';
$txt['karma_today_minus'] = 'Сегодня "-"';
$txt['karma_notifier'] = 'Внимание! Ваша карма была изменена ';
$txt['karma_notifier2'] = ' раз(а). Вы хотите посмотреть лог кармы?';
$txt['karma_pm_subject'] = 'Уведомление кармы';
$txt['karma_pm_body'] = 'Здравствуйте! Ваша карма была изменена. ';
$txt['karma_pm_body2'] = 'Вы можете просмотреть лог по этой ссылке:<br />' . $scripturl . '?action=ownkarma;u=' . '';
$txt['karma_pm_send_desc'] = 'Отправлять объяснение изменения кармы в личном сообщении';
$txt['karma_pm_send_desc2'] = '<br /><br />Объяснение было следующим: ';
$txt['karma_pm_send_changelink'] = '<br /><br />Ваша карма была изменена в этом сообщении:<br />';
$txt['karma_last_change'] = 'Последнее изменение кармы';
$txt['karma_last_change1'] = 'Последние ';
$txt['karma_last_change2'] = '  изменений кармы';
$txt['karma_remain'] = 'У вас осталось изменений: ';
$txt['karma_remain_admin'] = '&infin;';
$txt['karma_count'] = ' к карме за данное сообщение';

$txt['karmamessage'] = 'Просмотр изменения кармы за конкретное сообщение';
$txt['karmamessage_executor'] = 'Изменил';
$txt['karmamessage_description'] = 'Описание изменения';
$txt['karmamessage_date'] = 'Дата изменения';
$txt['karmamessage_what'] = 'Изменение';
$txt['karmamessage_author'] = 'Сообщение';

// ManagePermissions
$txt['permissionname_karmalog_view'] = 'Просмотр Лога Кармы';
$txt['permissionhelp_karmalog_view'] = 'Лог Кармы показывает пользователям изменения и описания за что была изменена карма. Данное разрешение будет работать только тогда, когда вы включите мод кармы в настройках форума. На главной странице форума появляется ссылка для просмотра.';

// Errors
$txt['cannot_karmalog_view'] = 'Извините - у Вас нет права просмотра лога кармы.';
$txt['viewkarma_error'] = 'ID пользователя должен иметь числовой тип';
$txt['karma_not_topic_starter'] = 'Извините, Вы можете изменить карму только автору темы.';
$txt['karma_cant_modify'] = 'Извините, Вы не можете изменить карму этого пользователя.';
$txt['karma_cant_modify2'] = 'Извините, Вы не можете изменять карму другим пользователям.';
$txt['kdm_error'] = 'Karma Description Mod выключен';

$txt['kdm_remain_error'] = 'Извините, на сегодня Ваш лимит изменений кармы закончился. Всего разрешено сделать ' . isset($modSettings['karmaremain']) . ' изменений за 24 часа. <br>Следующее изменение будет доступно ' . isset($context['nextKarma']) . '';

// Profile
$txt['who_change_my_karma'] = 'Кто изменил мою карму';
$txt['whom_i_change_karma'] = 'Кому я изменил карму';
$txt['enable_notify'] = 'Уведомлять меня, когда моя карма будет изменена';
$txt['enable_notify_none'] = 'не уведомлять';
$txt['enable_notify_popup'] = 'Всплывающее окно';
$txt['enable_notify_pm'] = 'Личное сообщение';
$txt['display_karma_settings'] = 'Изменить метод уведомления при изменении кармы';
