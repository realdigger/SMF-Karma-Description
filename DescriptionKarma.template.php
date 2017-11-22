<?php
/**
 * @package SMF Karma Description
 * @author Grek.Kamchatka
 * @copyright 2005—2017 Grek.Kamchatka
 * @license GPLv3
 * @file DescriptionKarma.template.php
 * @version 2.8
 */

function template_main()
{
    global $txt, $context, $modSettings, $user_info;
    echo '
		<script type="text/javascript"><!-- // --><![CDATA[
                function formfre(f) {
				if (f.value == "") {
				alert ("Fill this form, please");
				return false;
				}
				else {
				return true;
				}
				}

		// ]]></script>';

    echo '
                <div class="main_section">
                <form name="myForm" method="POST" onSubmit="formfre(myForm.Description)">
                <div class="title_bar">
                        	<h4 class="titlebg margin_lower centertext">', $txt['whykarmamod'], ' ', ($_REQUEST['sa'] == 'applaud') ? $txt['karmadescappl'] : $txt['karmadescsmi'], '</h4>
                </div>
                <table class="table_grid" cellspacing="0" width="100%">
                        <thead>
                        <span class="topslice"><span></span></span>
                        <tr class="windowbg2">
                                        <th scope="col" class="centertext first_th" width="50%">', $txt['karmamoder'], '<br>', $txt['karmarequare'], '</th>
                                        <th scope="col" class="centertext last_th" width="50%"><input type="text" name="Description" size="84" maxlength="62"/></th>

                        </tr>
                        <tr class="windowbg2">
                                        <th scope="col" class="centertext first_th" width="50%"><input type="button" value="', $txt['karma_back'], '" onClick="javascript:history.go(-1)"></th>
                                        <th scope="col" class="centertext last_th" width="50%"><input type="submit" name="submit" value="', $txt['karma_continue'], '" onClick="this.disabled=(disabled)" /></th>

                        </tr>
                        </thead>
                        <div class="clear"></div>
                        <span class="botslice"><span></span></span>

                 </table>
                 <div class="title_bar">';
    if (empty($modSettings['karmaremain']) || $user_info['is_admin']) {
        $context['karma_remain'] = $txt['karma_remain_admin'];
    }
    echo '
                        	<h4 class="titlebg margin_lower centertext">', $txt['karma_remain'] . $context['karma_remain'], '</h4>
                 </div>
                 </form>
                 </div>';


}
