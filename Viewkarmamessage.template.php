<?php
// Version: 2.0; Viewkarma


function template_main()
{
        global $context, $txt, $member, $user_info, $user_profile, $scripturl, $settings, $modSettings, $ID_MEMBER;

        $alternate = 0;

        $modSettings['karmaMode'] == 1 ? $context['karma']=$context['karma_good']-$context['karma_bad'] : $context['karma']= "+".$context['karma_good']."/-".$context['karma_bad'];
		        echo '
       			<div class="main_section" id="karmamessage">
                <form action="', $scripturl, '?action=viewkarma" method="post" accept-charset="', $context['character_set'], '">
                	<div class="title_bar">
                        	<h4 class="titlebg margin_lower centertext">', $txt['karmamessage'], '</h4>
                 	</div>
                <span class="topslice"><span></span></span>

                 <div id="profileview" class="flow_auto">
					<div class="cat_bar">
						<h3 class="catbg">
							<span class="ie6_header floatleft"><img src="', $settings['images_url'], '/icons/profile_sm.gif" alt="" class="icon" />', $txt['karmamessage_author'], '</span>
						</h3>
					</div>
                       <div id="basicinfo">
							<div class="windowbg">
								<span class="topslice"><span></span></span>
									<div class="content flow_auto">
										<div class="poster">';
										 foreach ($context['karmamessage'] as $member)
										 	{    $arr = explode("#", $member['stars']);

										 		 echo '
										 		 <h4><a href="', $scripturl, '?action=profile;u='.$member['id_member'].'">', $member['poster_name'],'</a></h4>
										 		 <ul class="ie6_header floatleft">
										 		 <div class="membergroup smalltext">', $context['member_group'], '</div>';
										 		 if (empty($settings['hide_post_group'])) echo '
										 		 <div class="membergroup smalltext">', $context['post_group'], '</div>';
										 		 echo '
										 		 <div class="stars">';
										 		 	for ($i=1; $i<=$arr[0]; $i++)
										 		 		{
										 		 			echo '<img src="', $settings['images_url'], '/',$arr[1],'" />';
										 		 		}
										 		 echo '</div><br>
										 		 <div class="avatar">',$context['avatar'],'</div><br>
										 		 <div class="postcount smalltext">', $txt['posts'],': ',$context['posts'], '</a></div>
										 		 <li class="postcount smalltext">', $modSettings['karmaLabel'],' ',$context['karma'], '</li>
										 		 </ul>
										 		 ';
											}

								echo '</div>
									</div>
								<span class="botslice"><span></span></span>
							</div>
                        </div>

                 <div id="detailedinfo">
					<div class="windowbg2">
						<span class="topslice"><span></span></span>
							<div class="content">';
								 foreach ($context['karmamessage'] as $member)
								 	{
								 		 echo '<div><h5><a href="'. $scripturl . '?topic='. $_REQUEST['topic'].".msg".$_REQUEST['m']."#msg".$_REQUEST['m'].'" target="_blank">'.$member['subject'] .'</a></h5></div><br><div>'.
								 		 	$member['body'].'</div>';
									}

							echo '</div>
						<span class="botslice"><span></span></span>
					</div>

					</div>
				</div>

				<div class="clear"></div>



                <table class="table_grid" cellspacing="0" width="100%">

                        <thead>
                        <tr class="catbg">
                                        <th scope="col" class="centertext first_th" width="20%">', $txt['karmamessage_executor'], '</th>
                                        <th scope="col" class="centertext" width="10%"><a href="' . $scripturl . '?action=karmamessage;u=',$_REQUEST['u'],';topic=',$_REQUEST['topic'],';m=',$_REQUEST['m'],';start=', $context['start'], ';sort=action', $context['sort_direction'] == 'down' && $context['sort_by'] == 'action' ? ';asc' : '', '">', $txt['karmamessage_what'],'', $context['sort_by'] == 'action' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>
                                        <th scope="col" class="centertext" width="45%">', $txt['karmamessage_description'],'</th>
                                        <th scope="col" class="centertext last_th" width="25%"><a href="' . $scripturl . '?action=karmamessage;u=',$_REQUEST['u'],';topic=',$_REQUEST['topic'],';m=',$_REQUEST['m'],';start=', $context['start'], ';sort=time', $context['sort_direction'] == 'down' && $context['sort_by'] == 'time' ? ';asc' : '', '">', $txt['karmamessage_date'],'', $context['sort_by'] == 'time' ? '<img src="' . $settings['images_url'] . '/sort_' . $context['sort_direction'] . '.gif" alt="" border="0" />' : '', '</a></th>

                        </tr>
                        </thead>
                        <tbody>
                 ';


                 foreach ($context['karma_changes'] as $member)
                 {
                 	 $member['action']=='+' ? $button='kdm_up.png' : $button='kdm_down.png';

				     echo '
                        <tr class="windowbg', $alternate ? '2' : '', '">
                                <td width="20%" align="center"><a href="'. $scripturl . '?action=profile;u=' . $member['id_exec'] . '" title="' . $txt['karma_profile_of'] . ' ' . $member['executor'] . '">' . $member['executor'] . '</a></td>
                     		    <td width="10%" align="center">'; if (!empty($modSettings['karmapictureinlog']))
                                	echo ' <img src="'.$settings['default_images_url'].'/'.$button.'" />';
                                else
                                	echo $member['action'];

                                echo '</td>
                                <td width="45%" align="center">', $member['Description'], '</td>
        		                <td width="22%" align="center">', $member['time'], '</td>
                        </tr>';
                        $alternate = !$alternate;
			}

             echo ' </table>
  					<div class="pagesection">
							<div class="pagelinks floatleft">', $txt['pages'], ': ', $context['page_index'], '</div>
					</div>
				</div>';




}
?>
