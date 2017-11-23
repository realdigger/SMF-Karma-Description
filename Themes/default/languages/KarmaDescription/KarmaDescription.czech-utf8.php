<?php
/**
 * @package SMF Karma Description
 * @author MaXiForum.cz
 * @copyright 2009 MaXiForum.cz
 * @license GPLv3
 * @file KarmaDescription.czech-utf8.php
 * @version 2.8
 */

global $helptxt, $settings, $context, $scripturl;

// ManageMaintenance
$txt['maintain_karmalog'] = 'Vyprázdnit karma log';
$txt['maintain_karmalog_info'] = 'Smazat všechny popisy z logu';
$txt['maintain_karma_points'] = 'Nastavit všem uživatelům karma 0';
$txt['maintain_karma_points_info'] = 'Nastaví všem uživatelům hodnotu karmy na 0';
$txt['maintain_karma_points_info2'] = 'a smaže všechny popisy z logu.';

// ManageSettings
$txt['karmadescmod'] = 'Povolit Karma Description Mod';
$txt['karmamaxmembers'] = 'Uživatelů na stránku v logu';
$txt['karmalogview'] = 'Použít nick uživatele jako odkaz na jeho profil';
$txt['karmapermiss'] = 'Povolit uživatelům vidět karma log';
$txt['karmalinks'] = 'Povolit odkazy na karmu v profilu';
$txt['karmaisowner'] = 'Uživatelé smějí vidět v karma logu jen vlastní změny';
$txt['karmakarma'] = 'Zobrazovat (+/-) karma v logu';
$txt['karmaurl'] = 'Povolit pole "Kde" v karma logu';
$txt['karmaotherstat'] = 'Zobrazit další karma statistiky';
$txt['karmasurv'] = 'Udělovat pozitivní i negativní karmu bez vysvětlení';
$txt['karmawhatwrite'] = 'Pokud je zakázána nutnost vysvětlení, vkládat do logu toto';
$txt['karmacensor'] = 'Cenzurovat karma vysvětlení';
$txt['karmatopicstarter'] = 'Uživatelé mohou změnit karmu pouze autorům témat';
$txt['karmanotifier'] = 'Povolit upozornění';
$txt['karmaidmember'] = 'Poslat SZ jako uživatel s ID (1 = výchozí)';
$txt['karma_pm_send_changelink'] = 'Poslat odkaz na zprávu, kde došlo ke změně karmy v soukromé zprávě';
$txt['karma_pm_send_link'] = 'Poslat odkaz na karma log vlastních změn v soukromé zprávě';
$txt['karmacantmodify'] = 'ID uživatele jehož karma nemůže být změněna. <div class="smalltext">Odděleno čárkami bez mezer. Například: 1,13,27</div>';
$txt['karmacantmodify2'] = 'ID uživatele u něhož nelze měnit karmu. <div class="smalltext">Například: 2,412,88</div>';
$txt['karmabuttons'] = 'Zobrazit obrázky místo textového pole kladného a záporného hodnocení';
$txt['karmapictureinlog'] = 'Zobrazit obrázky v karma logu místo + a -';
$txt['karmadelete'] = 'Odstranit karmu při smazání nebo změně popisu v karma logu';
$txt['karmalabellink'] = 'Použít karma pole jako odkaz do karma logu';
$txt['karmalastchange'] = 'Povolit poslední karmu na BoardIndex';
$txt['karmalastchangenum'] = 'Počet uvedených na BoardIndex';
$txt['karmadescfieldnum'] = 'Kolik symbolů bude zobrazeno v poli na BoardIndex';

// Who
$txt['whoadmin_viewkarma'] = 'Prohlíží <a href="' . $scripturl . '?action=viewkarma">seznam zněmy karmy</a>.';
$txt['whoall_modifykarma'] = 'Mění karmu.';

// Help

// index
$txt['karmaview'] = 'Výpis změn karmy';
$txt['whykarmamod'] = 'Změna karmy';
$txt['Description'] = 'Bez popisu';
$txt['karmamoder'] = 'Důvod pro změnu karmy tohoto uživatele';
$txt['karmarequare'] = '(Povinné)';
$txt['karmawho'] = 'Kdo';
$txt['karmawhos'] = 'Komu';
$txt['karmawhat'] = 'Co (+/-)';
$txt['karmadesc'] = 'Za co';
$txt['karmatime'] = 'Kdy';
$txt['karmanumb'] = 'Položky: ';
$txt['statkarma'] = '[Karma status]';
$txt['viewkarma_title'] = 'Popis změny karmy';
$txt['deletekarma'] = 'Smazat';
$txt['clearkarma'] = 'Vyčistit';
$txt['karma_delete_confirm'] = 'Jste si jisti, že chcete smazat tento záznam?';
$txt['karma_back'] = '< Zpět';
$txt['karma_continue'] = 'Pokračovat >';
$txt['karmadescappl'] = ' (kladné hodnocení)';
$txt['karmadescsmi'] = ' (záporné hodnocení)';
$txt['karmawhere'] = 'Kde';
$txt['karmawhereurl'] = 'V tématu';
$txt['karmawhereurl2'] = 'V SZ';
$txt['karma_delete'] = 'Smazat';
$txt['karma_pages'] = 'Stránky';
$txt['karma_profile_of'] = 'Zobrazit profil';
$txt['sure_about_karma_remove'] = 'Jste si jisti, že chcete smazat tento záznam?';
$txt['karma_stat'] = 'Statistika';
$txt['karma_top_applaud'] = 'Top 5 kladně ohodnocených';
$txt['karma_top_smite'] = 'Top 5 záporně ohodnocených';
$txt['karma_other_stat'] = 'Hlavní statistika';
$txt['karma_max_appl'] = 'Nejčastěji kladně hodnotící uživatel';
$txt['karma_max_smit'] = 'Nejčastěji záporně hodnotící uživatel';
$txt['karma_today'] = 'Stav karmy dnes';
$txt['karma_today_plus'] = 'Dnes "+"';
$txt['karma_today_minus'] = 'Dnes "-"';
$txt['karma_notifier'] = 'Vaše karma byla změněna na ';
$txt['karma_notifier2'] = ' bodů. Chcete si prohlédnout LOG karmy?';
$txt['karma_pm_subject'] = 'Oznámení karmy';
$txt['karma_pm_body'] = 'Vážený uživateli. Vaše karma byla změněna. ';
$txt['karma_pm_body2'] = 'Pro více informací pokračujte na násleující odkaz:\\n' . $scripturl . '?action=ownkarma;u=' . '';
$txt['karma_pm_send_desc'] = 'Poslat důvod v soukromé zprávě';
$txt['karma_pm_send_desc2'] = '<br /><br />Důvod pro změnu byl: ';
$txt['karma_pm_send_changelink'] = '<br /><br />Vaše karma byla změněna s následující zprávou:<br />';
$txt['karma_last_change'] = 'Poslední změna karmy';
$txt['karma_last_change1'] = 'Poslední ';
$txt['karma_last_change2'] = ' změny karmy';

// ManagePermissions
$txt['permissionname_karmalog_view'] = 'Zobrazit karma log';
$txt['permissionhelp_karmalog_view'] = 'Karma log zobrauje popis kladné a záporné karmy všech členů fóra. Do karma logu můžete přistupovat kliknutím na odkaz na hlavní stránce ve spodí části.';

// Errors
$txt['cannot_karmalog_view'] = 'Lituji, ale nemáte oprávnění vidět karma log.';
$txt['viewkarma_error'] = 'ID uživatele musí být číslený údaj.';
$txt['karma_not_topic_starter'] = 'Lituji, ale nejde o autora tématu.';
$txt['karma_cant_modify'] = 'Lituji, ale nemůžete měnit karmu tomuto uživateli.';
$txt['karma_cant_modify2'] = 'Lituji, ale nemůžete měnit karmu jiným uživatelům.';
$txt['kdm_error'] = 'Karma Description Mod je zakázán';

//Profile
$txt['who_change_my_karma'] = 'Kdo mi změnil karmu';
$txt['whom_i_change_karma'] = 'Komu jsem já změnil karum';
$txt['enable_notify'] = 'Upozornit při změně karmy';
$txt['enable_notify_none'] = 'Neupozornit';
$txt['enable_notify_popup'] = 'Popup okno';
$txt['enable_notify_pm'] = 'Soukromou zprávou';
