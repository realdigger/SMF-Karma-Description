<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005Ч2017 Grek.Kamchatka
 * @license GPLv3
 * @file Viewkarma.template.php
 * @version 2.8
 */

function template_main()
{
    global $context, $txt, $member, $user_info, $scripturl, $settings, $modSettings, $ID_MEMBER;

    $WhatPage = '';
    if ($_GET['action'] == 'ownkarma') {
        $WhatPage = 'ownkarma;u=' . $_REQUEST['u'];
    } elseif ($_GET['action'] == 'otherkarma') {
        $WhatPage = 'otherkarma;u=' . $_REQUEST['u'];
    } else {
        $WhatPage = 'viewkarma';
    }

    $alternate = 0;

    //ќтображение лога кармы дл€ всех пользователей, кроме админа, кому разрешено смотреть лог. ƒл€ админа код лога ниже, там добавлены строки удалени€.
    if (!empty($modSettings['karmapermiss']) && (!$member['is_guest']) && (!$user_info['is_admin'])) {
        echo '
       			<div class="main_section" id="viewkarma">
                <form action="', $scripturl, '?action=viewkarma" method="post" accept-charset="', $context['character_set'], '">
                	<div class="title_bar">
                        	<h4 class="titlebg margin_lower centertext">', $txt['karmaview'], '</h4>
                 	</div>
                <table class="table_grid" cellspacing="0" width="100%">

                        <thead>
                        <tr class="catbg">
                                        <th scope="col" class="centertext first_th" width="14%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=exec', $context['sort_direction'] == 'down' && $context['sort_by'] == 'exec' ? ';asc' : '', '">', $txt['karmawho'], '', $context['sort_by'] == 'exec' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext" width="14%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=targ', $context['sort_direction'] == 'down' && $context['sort_by'] == 'targ' ? ';asc' : '', '">', $txt['karmawhos'], '', $context['sort_by'] == 'targ' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext" width="10%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=action', $context['sort_direction'] == 'down' && $context['sort_by'] == 'action' ? ';asc' : '', '">', $txt['karmawhat'], '', $context['sort_by'] == 'action' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext" width="31%">', $txt['karmadesc'], '</th>';
        if (!empty($modSettings['karmaurl'])) {
            echo '<th scope="col" class="centertext" width="9%">', $txt['karmawhere'], '</th>';
        }
        echo '
                                        <th scope="col" class="centertext last_th" width="22%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=time', $context['sort_direction'] == 'down' && $context['sort_by'] == 'time' ? ';asc' : '', '">', $txt['karmatime'], '', $context['sort_by'] == 'time' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>

                        </tr>
                        </thead>
                        <tbody>';


        //Output all reseived data from viewkarma.php to table form
        foreach ($context['karma_changes'] as $member) {
            $member['action'] == '+' ? $button = 'kdm_up.png' : $button = 'kdm_down.png';
            echo '
                        <tr class="windowbg', $alternate ? '2' : '', '">
                                <td width="14%" align="center"><a href="' . $scripturl . '?action=profile;u=' . $member['id_exec'] . '" title="' . $txt['karma_profile_of'] . ' ' . $member['executor'] . '">' . $member['executor'] . '</a>';
            if (!empty($modSettings['karmakarma'])) {
                if ($modSettings['karmaMode'] == '1') {
                    echo ' <span class="smalltext">(', $member['executorkarmagood'] - $member['executorkarmabad'], ')</span>';
                } else {
                    echo ' <span class="smalltext">(+', $member['executorkarmagood'], '/-', $member['executorkarmabad'], ')</span>';
                }
            }
            echo '</td>
                                <td width="14%" align="center"><a href="' . $scripturl . '?action=profile;u=' . $member['id_targ'] . '" title="' . $txt['karma_profile_of'] . ' ' . $member['target'] . '">' . $member['target'] . '</a>';
            if (!empty($modSettings['karmakarma'])) {
                if ($modSettings['karmaMode'] == '1') {
                    echo ' <span class="smalltext">(', $member['targetkarmagood'] - $member['targetkarmabad'], ')</span>';
                } else {
                    echo ' <span class="smalltext">(+', $member['targetkarmagood'], '/-', $member['targetkarmabad'], ')</span>';
                }
            }
            echo '</td>
                                <td width="10%" align="center">';
            if (!empty($modSettings['karmapictureinlog'])) {
                echo ' <img src="' . $settings['default_images_url'] . '/' . $button . '" />';
            } else {
                echo $member['action'];
            }

            echo '</td>
                                <td width="31%" align="center">', $member['Description'], '</td>';
            if (!empty($modSettings['karmaurl'])) {
                echo '<td width="9%" class="centertext">', $member['link'] != 'PM' ? '<a href="' . $scripturl . '?topic=' . $member['link'] . '" target="_blank">' . $txt['karmawhereurl'] . '</a>' : $txt['karmawhereurl2'], '</td>';
            }
            echo '                  <td width="22%" align="center">', $member['time'], '</td>
                        </tr>';
            $alternate = !$alternate;
        }

        echo '
  				</table>
  				<div class="pagesection">
							<div class="pagelinks floatleft">', $txt['pages'], ': ', $context['page_index'], '</div></div>
					</div>';
    }


    //ќтображение лога дл€ админа
    if ($user_info['is_admin']) {
        echo '
       			<div class="main_section" id="viewkarma_admin">
                <form action="', $scripturl, '?action=viewkarma" accept-charset="', $context['character_set'], '" method="post" onsubmit="if (lastClicked == \'remove_selection\' && !confirm(\'', $txt['sure_about_karma_remove'], '\')) return false; else return true;">';
        echo '
        			<script language="JavaScript1.2" type="text/javascript">
        			<!-- var lastClicked = ""; // -->
        			</script>';
        echo '
                	<div class="title_bar">
                        	<h4 class="titlebg margin_lower centertext">', $txt['karmaview'], '</h4>
                 	</div>

                <table class="table_grid" cellspacing="0" width="100%">
                        <thead>
                        <tr class="catbg">
                                        <th scope="col" class="centertext first_th" width="14%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=exec', $context['sort_direction'] == 'down' && $context['sort_by'] == 'exec' ? ';asc' : '', '">', $txt['karmawho'], '', $context['sort_by'] == 'exec' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext" width="14%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=targ', $context['sort_direction'] == 'down' && $context['sort_by'] == 'targ' ? ';asc' : '', '">', $txt['karmawhos'], '', $context['sort_by'] == 'targ' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext" width="10%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=action', $context['sort_direction'] == 'down' && $context['sort_by'] == 'action' ? ';asc' : '', '">', $txt['karmawhat'], '', $context['sort_by'] == 'action' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext" width="28%">', $txt['karmadesc'], '</th>';
        if (!empty($modSettings['karmaurl'])) {
            echo '<th scope="col" class="centertext" width="9%">', $txt['karmawhere'], '</th>';
        }
        echo '
                                        <th scope="col" class="centertext" width="20%"><a href="' . $scripturl . '?action=' . $WhatPage . ';start=', $context['start'], ';sort=time', $context['sort_direction'] == 'down' && $context['sort_by'] == 'time' ? ';asc' : '', '">', $txt['karmatime'], '', $context['sort_by'] == 'time' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext last_th" width="5%"><label for="check_all1"><input type="checkbox" id="check_all1" onclick="invertAll(this, this.form, \'delete[]\'); this.form.check_all2.checked = this.checked;" class="check" /> </label></th>
                        </tr>
                        </thead>
                        <tbody>';

        //Output all reseived data from viewkarma.php to table form
        foreach ($context['karma_changes'] as $member) {
            $member['action'] == '+' ? $button = 'kdm_up.png' : $button = 'kdm_down.png';

            echo '
                        <tr class="windowbg', $alternate ? '2' : '', '">
                                <td width="14%" align="center"><a href="' . $scripturl . '?action=profile;u=' . $member['id_exec'] . '" title="' . $txt['karma_profile_of'] . ' ' . $member['executor'] . '">' . $member['executor'] . '</a>';
            if (!empty($modSettings['karmakarma'])) {
                if ($modSettings['karmaMode'] == '1') {
                    echo ' <span class="smalltext">(', $member['executorkarmagood'] - $member['executorkarmabad'], ')</span>';
                } else {
                    echo ' <span class="smalltext">(+', $member['executorkarmagood'], '/-', $member['executorkarmabad'], ')</span>';
                }
            }
            echo '</td>
                                <td width="14%" align="center"><a href="' . $scripturl . '?action=profile;u=' . $member['id_targ'] . '" title="' . $txt['karma_profile_of'] . ' ' . $member['target'] . '">' . $member['target'] . '</a>';
            if (!empty($modSettings['karmakarma'])) {
                if ($modSettings['karmaMode'] == '1') {
                    echo ' <span class="smalltext">(', $member['targetkarmagood'] - $member['targetkarmabad'], ')</span>';
                } else {
                    echo ' <span class="smalltext">(+', $member['targetkarmagood'], '/-', $member['targetkarmabad'], ')</span>';
                }
            }

            echo '</td>
                                <td width="10%" align="center">';
            if (!empty($modSettings['karmapictureinlog'])) {
                echo ' <img src="' . $settings['default_images_url'] . '/' . $button . '" />';
            } else {
                echo $member['action'];
            }

            echo '</td>
                                <td width="28%" align="center">', $member['Description'], '</td>';
            if (!empty($modSettings['karmaurl'])) {
                echo '<td width="9%" align="center">', $member['link'] != 'PM' ? '<a href="' . $scripturl . '?topic=' . $member['link'] . '" target="_blank">' . $txt['karmawhereurl'] . '</a>' : $txt['karmawhereurl2'], '</td>';
            }
            echo '                  <td width="20%" align="center">', $member['time'], '</td>
        						<td width="5%" align="center"><input type="checkbox" name="delete[]" value="', $member['logtime'], '" class="check" /></td>
                        </tr>';
            $alternate = !$alternate;
        }

        echo '
  				</table>
  				<div class="pagesection">
							<div class="pagelinks floatleft">', $txt['pages'], ': ', $context['page_index'], '</div>';
        if ($user_info['is_admin']) {
            echo ' <td align="center"><div class="floatright"><input type="submit" name="delete_selection" value="', $txt['karma_delete'], '" onclick="lastClicked = \'remove_selection\';" /> </div></td></form>';
        }
        echo '
						</div>
					</div>';
    }


    //Other statistic
    if (!empty($modSettings['karmaotherstat'])) {
        echo '
        			<div class="title_bar">
                        	<h4 class="titlebg margin_lower centertext">', $txt['karma_stat'], '</h4>
                 	</div>


        <div class="flow_hidden">
			<div id="stats_centre">
				<div class="title_bar">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img src="', $settings['images_url'], '/stats_posters.gif" class="icon" alt="" /> ', $txt['karma_other_stat'], '
						</span>
					</h4>
				</div>
				<div class="windowbg2">
					<span class="topslice"><span></span></span>
					<div class="content top_row">
						<dl class="stats">
							<dt>', $txt['karma_max_appl'], '</dt>
							<dd>', $context['memidappl'], ' [' . $context['memidapplcount'] . ']</dd>
							<dt>', $txt['karma_max_smit'], '</dt>
							<dd>', $context['memidsmit'], ' [' . $context['memidsmitcount'] . ']</dd>
							<dt>', $txt['karma_today'], '</dt>
							<dd>', $context['today_point'], '</dd>
							<dt>', $txt['karma_today_plus'], '</dt>
							<dd>', $context['today_plus'], '</dd>
							<dt>', $txt['karma_today_minus'], '</dt>
							<dd>', $context['today_minus'], '</dd>
						</dl>
						<div class="clear"></div>
					</div>
					<span class="botslice"><span></span></span>
				</div>
			</div>

			<div id="stats_left">
			<div class="title_bar">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img src="', $settings['images_url'], '/stats_board.gif" class="icon" alt="" /> ', $txt['karma_top_applaud'], '
						</span>
					</h4>
				</div>
				<div class="windowbg2">
					<span class="topslice"><span></span></span>
					<div class="content top_row">
						<dl class="stats">';
        foreach ($context['top_applaud'] as $applauder) {
            echo '
                         <dt>
                         	', $applauder['link'], '
                         </dt>
                         <dd class="statsbar">
                         		<div class="bar" style="width: ', $applauder['karma_percent'] + 4, 'px;">
									<div style="width: ', $applauder['karma_percent'], 'px;"></div>
								</div>
						<span class="righttext">', $applauder['num_karma'], '</span>
						</dd>';
        }
        echo '
						</dl>
						<div class="clear"></div>
					</div>
					<span class="botslice"><span></span></span>
				</div>
			</div>

			<div id="stats_right">
			<div class="title_bar">
					<h4 class="titlebg">
						<span class="ie6_header floatleft">
							<img src="', $settings['images_url'], '/stats_board.gif" class="icon" alt="" /> ', $txt['karma_top_smite'], '
						</span>
					</h4>
				</div>
				<div class="windowbg2">
					<span class="topslice"><span></span></span>
					<div class="content top_row">
						<dl class="stats">';
        foreach ($context['top_smite'] as $smiter) {
            echo '
                         <dt>
                         	', $smiter['link'], '
                         </dt>
                         <dd class="statsbar">
                	      		<div class="bar" style="width: ', $smiter['karma_percent'] + 4, 'px;">
									<div style="width: ', $smiter['karma_percent'], 'px;"></div>
								</div>
						<span class="righttext">', $smiter['num_karma'], '</span>
						</dd>';
        }
        echo '
						</dl>
						<div class="clear"></div>
					</div>
					<span class="botslice"><span></span></span>
				</div>
			</div>
		</div>';

        echo '</table>';

    }


}
