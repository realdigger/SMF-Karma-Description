<?php
/**
 * @package SMF Karma Description
 * @author davidhs
 * @copyright 2010 davidhs
 * @license GPLv3
 * @file KarmaDescription.spanish_es.php
 * @version 2.8
 */

global $helptxt, $settings, $context, $scripturl;

// ManageMaintenance
$txt['maintain_karmalog'] = 'Vaciar el log de Descripción del Karma';
$txt['maintain_karmalog_info'] = 'Elimina todo el log de Descripción del Karma';
$txt['maintain_karma_points'] = 'Establecer todos los puntos de karma a 0 en todos los usuarios';
$txt['maintain_karma_points_info'] = 'Establece todos los puntos de karma a 0 en todos los usuarios';
$txt['maintain_karma_points_info2'] = 'y borra todo el log de Descripción del Karma';

// ManageSettings
$txt['karmadescmod'] = 'Habilita el Mod Karma Description';
$txt['karmamaxmembers'] = 'Usuarios por página en el log de Descripción del Karma';
$txt['karmalogview'] = 'Usa los nombres de los usuarios como enlace a sus perfiles';
$txt['karmapermiss'] = 'Permite a los usuarios ver el log de Descripción del Karma (Ver Permisos)';
$txt['karmalinks'] = 'Habilita los enlaces de karma en los perfiles de usuario';
$txt['karmaisowner'] = 'Inhabilita el log de karma completo a los usuarios, pero habilita el log de karma propio';
$txt['karmakarma'] = 'Muestra el karma(+/-) de los usuarios en el log de Descripción del Karma';
$txt['karmaurl'] = 'Habilita el campo "Dónde" en el log de Descripción del Karma';
$txt['karmaotherstat'] = 'Muestra otras estadísticas de karma';
$txt['karmasurv'] = 'Aplaudir o castigar a usuarios sin explicación';
$txt['karmawhatwrite'] = 'Escribe esto en el log cuando la explicación esta inhabilitada';
$txt['karmacensor'] = 'Censurar la descripción del karma';
$txt['karmatopicstarter'] = 'Los usuarios solo pueden modificar el karma del autor del tema';
$txt['karmanotifier'] = 'Habilita la notificación de karma';
$txt['karmaidmember'] = 'Envía MP desde este ID de usuario (por defecto 1)';
$txt['karma_pm_send_changelink'] = 'Envía por mensaje personal un enlace al mensaje donde se ha cambiado el karma';
$txt['karma_pm_send_link'] = 'Envía enlace al log de karma propio por mensaje personal';
$txt['karmacantmodify'] = 'IDs de usuario cuyo karma no puede ser modificado. <div class="smalltext">Separados por coma, sin espacios. Por ejemplo: 1,13,27</div>';
$txt['karmacantmodify2'] = 'IDs de usuario que no pueden modificar el karma. <div class="smalltext">Por ejemplo: 2,412,88</div>';
$txt['karmabuttons'] = 'Muestra pequeñas imágenes en lugar de las etiquetas de texto de karma de aplaudir y castigar';
$txt['karmapictureinlog'] = 'Muestra pequeñas imágenes en el log de Descripción del Karma en lugar + o - en el campo acción';
$txt['karmadelete'] = 'Elimina los puntos de karma de usuario cuando borre la descripción de los cambios en el log de Descripción del Karma';
$txt['karmalabellink'] = 'Usa etiquetas de karma como enlace al log de Descripción del Karma de los usuarios';
$txt['karmalastchange'] = 'Habilita últimos cambios de karma en el índice del foro';
$txt['karmalastchangenum'] = 'Número de descripciones en el índice del foro';
$txt['karmadescfieldnum'] = 'Cuántos caracteres habrá en el campo descripción en el índice del foro';

// Who
$txt['whoadmin_viewkarma'] = 'Viendo el <a href="' . $scripturl . '?action=viewkarma">log de Cambios en la Descripción del Karma</a>.';
$txt['whoall_modifykarma'] = 'Cambiando el Karma.';

// Help
$helptxt['karmapermiss'] = 'Por defecto esta opción está desactivada y el log de Karma solo lo pueden ver los administradores. Si quieres que el log de Karma disponible esté otros usuarios o moderadores, etc., habilita esta opción y dale el derecho de ver el log a ese grupo modificando los permisos.';
$helptxt['karmaotherstat'] = 'Muestra otras estadísticas de karma, como los usuarios más aplaudidos o los usuarios más castigados, y cosas así, del log de karma completo.';
$helptxt['karmalinks'] = 'Si habilitas esta característica, los usuarios verán dos enlaces en sus perfiles (propios o de otros usuarios). Podrán ver quien cambia su karma y a quienes se lo han cambiado. El Mod Karma Description debe estar habilitado';
$helptxt['karmakarma'] = 'Muestra el karma del usuario en el log de karma frente a su nombre de usuario. Por ejemplo: NombreUsario (+12/-8)';
$helptxt['karmaurl'] = 'Si habilitas esta opción, tu y tus usuarios podrán ver donde se modificó su karma.';
$helptxt['karmaisowner'] = 'Si habilitas esta opción, solo el propietario del perfil podrá ver los dos enlaces a su propio log de karma. Por otra parte, tus usuarios recibirán un error si introducen una dirección url (como http://your_forum.com/index.php?action=ownkarma;u=other_user) a mano si no deseas que tus usuarios puedan ver el log de karma de los demás usuarios. El log de karma completo se inhabilitará también. SOLO EL LOG DE KARMA PROPIO.';
$helptxt['karmanotifier'] = 'Si habilitas esta función, tus usuarios verán un campo más en sus perfiles en la sección \'Notificaciones y email\'. Esto dará la oportunidad de notificar a los usuarios cuando se modifique su karma, a través de dos formas: Mensaje en una ventana emergente y Mensaje Personal.';
$helptxt['karmaidmember'] = 'Si tus usuarios habilitaron la función de Notificación del Karma y eligen notificación por Mensaje Personal, lo recibirán desde este ID de usuario. Por ejemplo, si tienes ID_MEMBER=1 recibirán un MP de tu parte. Si fijas el ID de usuario a 0, tus usuarios recibirán un mensaje de parte del Administrador.';
$helptxt['karma_pm_send_link'] = 'Si tus usuarios habilitan la función de Notificación del Karma y eligen notificación por Mensaje Personal, en el Mensaje Personal verán un enlace a su log de karma propio.';
$helptxt['karma_pm_send_desc'] = 'Si tus usuarios habilitan la función de Notificación del Karma y eligen notificación por Mensaje Personal, en el Mensaje Personal verán la razón del cambio de karma.';
$helptxt['karma_pm_send_changelink'] = 'Si tus usuarios habilitan la función de Notificación de Karma y eligen notificación por Mensaje Personal, en el Mensaje Personal verán enlace al mensaje donde se modificó su karma.';
$helptxt['karmacantmodify'] = 'Separados por comas, sin espacios.';
$helptxt['karmacantmodify2'] = 'Separados por comas, sin espacios.';

// index
$txt['karmaview'] = 'Cambios en la Descripción del Karma';
$txt['whykarmamod'] = 'Cambio de karma';
$txt['Description'] = 'Sin Descripción';
$txt['karmamoder'] = 'Razón para cambiar el karma de este usuario';
$txt['karmarequare'] = '(Campo requerido)';
$txt['karmawho'] = 'Quién';
$txt['karmawhos'] = 'A quién';
$txt['karmawhat'] = 'Qué';
$txt['karmadesc'] = 'Por qué';
$txt['karmatime'] = 'Cuándo';
$txt['karmanumb'] = 'Valores: ';
$txt['statkarma'] = '[Estadísticas de Karma]';
$txt['viewkarma_title'] = 'Cambios en la Descripción del Karma';
$txt['deletekarma'] = 'Eliminar';
$txt['clearkarma'] = 'Limpiar';
$txt['karma_delete_confirm'] = '¿Estás seguro de que quieres eliminar este registro?';
$txt['karma_back'] = '< Volver';
$txt['karma_continue'] = 'Continuar >';
$txt['karmadescappl'] = ' (Aplaudir)';
$txt['karmadescsmi'] = ' (Abuchear)';
$txt['karmawhere'] = 'Dónde';
$txt['karmawhereurl'] = 'En tema/post';
$txt['karmawhereurl2'] = 'En MP';
$txt['karma_delete'] = 'Eliminar';
$txt['karma_pages'] = 'Páginas';
$txt['karma_profile_of'] = 'Ver perfil de';
$txt['sure_about_karma_remove'] = '¿Estás seguro de que quieres eliminar este registro?';
$txt['karma_stat'] = 'Estadísticas de Karma';
$txt['karma_top_applaud'] = 'Los 5 usuarios más aplaudidos';
$txt['karma_top_smite'] = 'Los 5 usuarios más abucheados';
$txt['karma_other_stat'] = 'Estadísticas Generales';
$txt['karma_max_appl'] = 'Usuario que más aplaude a otros usuarios';
$txt['karma_max_smit'] = 'Usuario que más abuchea a otros usuarios';
$txt['karma_today'] = 'Puntos de karma de hoy';
$txt['karma_today_plus'] = 'Hoy "+"';
$txt['karma_today_minus'] = 'Hoy "-"';
$txt['karma_notifier'] = 'Tu karma ha sido cambiado en ';
$txt['karma_notifier2'] = ' puntos. ¿Deseas ver el log de descripción de karma?';
$txt['karma_pm_subject'] = 'Notificación de Karma';
$txt['karma_pm_body'] = 'Estimado usuario. Tu Karma ha sido cambiado. ';
$txt['karma_pm_body2'] = 'Puedes ver el registro siguiendo este enlace:<br />' . $scripturl . '?action=ownkarma;u=' . '';
$txt['karma_pm_send_desc'] = 'Envía la razón en el mensaje personal';
$txt['karma_pm_send_desc2'] = '<br /><br />La razón del cambio fue: ';
$txt['karma_pm_send_changelink'] = '<br /><br />Tu karma fue modificado en este mensaje:<br />';
$txt['karma_last_change'] = 'Últimos cambios de karma';
$txt['karma_last_change1'] = 'Últimos ';
$txt['karma_last_change2'] = ' cambios de karma';

// ManagePermissions
$txt['permissionname_karmalog_view'] = 'Ver el log de karma';
$txt['permissionhelp_karmalog_view'] = 'El log de Descripción del Karma muestra el karma de todos los usuarios, y una descripción sobre los aplausos o abucheos. Este permiso sólo funcionará si también lo tienes activado en \'Características y Opciones\'. Puedes acceder a la pantalla Descripción del Karma haciendo clic en el enlace de la sección \'Estadísticas de Karma\' en el índice del foro.';

// Errors
$txt['cannot_karmalog_view'] = 'Lo siento - no tienes los permisos apropiados para ver la lista de Descripción del Karma.';
$txt['viewkarma_error'] = 'El ID de usuario debe ser un número';
$txt['karma_not_topic_starter'] = 'Lo siento, él no es el autor del tema.';
$txt['karma_cant_modify'] = 'Lo siento, no puedes modificar el karma de este usuario.';
$txt['karma_cant_modify2'] = 'Lo siento, no puedes modificar el karma de otros usuarios.';
$txt['kdm_error'] = 'El Mod Karma Description está inhabilitado';

// Profile
$txt['who_change_my_karma'] = '¿Quién cambió mi Karma?';
$txt['whom_i_change_karma'] = '¿A quienes he cambiado el Karma?';
$txt['enable_notify'] = 'Notificarme cuando mi karma sea cambiado';
$txt['enable_notify_none'] = 'no notificar';
$txt['enable_notify_popup'] = 'Ventana emergente';
$txt['enable_notify_pm'] = 'Mensaje personal';
