<?php
/**
 *
/**
 * @category     Addons
 * @package      Admin tool: User Statistics
 * @copyright    Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @author       Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.0.3
 * @lastmodified $Date: $
 * @since        File available since 2016-03-24
 * @description  settings for wysiwyg editor
 *
/**
 * cmdTool.php
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Illegale file access /'.basename(__DIR__).'/'.basename(__FILE__).''); }
/* -------------------------------------------------------- */

    if( !$admin->get_permission($sAddonName,'module' ) ) {
         $admin->print_error($MESSAGE['ADMIN_INSUFFICIENT_PRIVELLIGES'], $js_back);
    }
    $sort = '';
    $orderby = "active";
    $sGroupOrder = "group_id";
    $ordering = "DESC";
    $sUsersort = 'U1';
    $sUsersortClass = 'indiff';
    $sTimeSort = 'T1';
    $sTimeSortClass = 'indiff';
    $sActiveSort = 'A1';
    $sActiveSortClass = 'indiff';
    $sGroupSort = 'G1';
    $sGroupSortClass = 'indiff';
    if (isset($_POST['U1']))$sort = $_POST['U1'];      // sort by title
    elseif (isset($_POST['U2']))  $sort = $_POST['U2'];      // sort by time stamp
    elseif (isset($_POST['T1']))  $sort = $_POST['T1'];
    elseif (isset($_POST['T2']))  $sort = $_POST['T2'];
    elseif (isset($_POST['A1']))  $sort = $_POST['A1'];
    elseif (isset($_POST['A2']))  $sort = $_POST['A2'];
    elseif (isset($_POST['G1']))  $sort = $_POST['G1'];
    elseif (isset($_POST['G2']))  $sort = $_POST['G2'];

    switch ($sort){

    //displayname
        case 'U1':  $orderby = "display_name";  $ordering = "ASC";  $adtitle = 'asc';        $sUsersort = 'U2'; $sUsersortClass = "asc";  break;
        case 'U2':  $orderby = "display_name";  $ordering = "DESC"; $adtitle = 'desc'; $sUsersortClass = "desc";        break;

    // inactive time
        case 'T1':    $orderby = "login_when";    $ordering = "ASC";  $sTimeSort = 'T2'; $sTimeSortClass = "asc";   break;
        case 'T2':    $orderby = "login_when";    $ordering = "DESC"; $sTimeSortClass = "desc";  break;
    // inactive vs active
        case 'A1':    $orderby = "active";    $ordering = "ASC";  $sActiveSort = 'A2'; $sActiveSortClass = "asc";   break;
        case 'A2':    $orderby = "active";    $ordering = "DESC"; $sActiveSortClass = "desc";  break;
            // inactive vs active
        case 'G1':    $orderby = "group_id";    $ordering = "ASC";  $sGroupSort = 'G2'; $sGroupSortClass = "asc";   break;
        case 'G2':    $orderby = "group_id";    $ordering = "DESC"; $sGroupSortClass = "desc";  break;


}
    // create template object
    $oTpl = new Template($sAddonThemePath);
    $oTpl->set_var($MOD_USERSTATS);

    $oTpl->set_file('page', 'backend_view.htt');
    $oTpl->set_block('page', 'user_list', 'user_list_handle');
    $oTpl->set_block('page', 'user_table', 'user_table_handle');

    $query = 'SELECT `user_id`,`group_id`,`username`,`display_name`,`login_when`,`email`,`active` FROM `'.TABLE_PREFIX.'users` '
            .'ORDER BY `'.$orderby.'` '.$ordering.' '
            .' ';
    $results = $database->query ($query );

    if (!$results || $results && $results->numRows() == 0) {
    // database query failed or no users in database
        $oTpl->set_var('TXT_MESSAGE', $MOD_USERSTATS['TXT_ERROR_DATABASE']);

        // clear the blocks not required
        $oTpl->set_var('user_list_handle', '');
        $oTpl->set_var('user_table_handle', '');

    } else {
        $oTpl->set_var('TXT_MESSAGE', $MOD_USERSTATS['TXT_DESCRIPTION']);

        // loop over all users and add one row per user to the template
        $i = 1;
        while($row = $results->fetchRow(MYSQLI_ASSOC)) {


            // Get Groupname from database
            $sql = 'SELECT `name` FROM `'.TABLE_PREFIX.'groups`'
                  .'WHERE `group_id` = '.$row['group_id'].' ';
            $sGroupName = $database->get_one($sql);

           $sAccountStatus = ( $row['active'] == 1) ? $MOD_USERSTATS['ACC_ACTIVE'] : $MOD_USERSTATS['ACC_INACTIVE'];
           $sSuperUserCSS = ($row['user_id']== 1) ? 'active' : '';
           $sUserActiveCSS = ( $row['active'] == 1) ? ($i % 2 == 0) ? 'aeven' : 'even' : 'inactive';
           $sLastLoginMin = 0;
           $sLastLogin = '';
           $sOnlineTimeMin = (round((time() - (int) $row['login_when']) / (3600 * 24)));
           $sOnlineTime = ($row['login_when'] == 0) ? '-' : $sOnlineTimeMin." ".$MOD_USERSTATS['TXT_DAYS'];


           if($sOnlineTime == 0 && $sLastLoginMin == 0){
           $sLastLoginMin = (round(abs(time() - (int) $row['login_when']) / 60));
           $sLastLogin = $sLastLoginMin.' '.$MOD_USERSTATS['TXT_MINUTES'];
           $sLastLogin =  $MOD_USERSTATS['TXT_VOR'].$sLastLogin;
           }
           if($sOnlineTimeMin == 0 && $sLastLoginMin >=60){
           $sOnTime2 = (round(abs(time() - (int) $row['login_when']) / (3600)));
           $sOnTime2Hours = (floor($sLastLoginMin/60));
           $sOnTime2Mins = (($sLastLoginMin%60)< 10) ? '0'.($sLastLoginMin%60) : ($sLastLoginMin%60);

           $sLastLogin = $sOnTime2Hours.":".$sOnTime2Mins." ".$MOD_USERSTATS['TXT_HOURS'];
           $sLastLogin =  $MOD_USERSTATS['TXT_VOR'].$sLastLogin;
           }
           $sLastLogin = ($row['login_when'] == 0) ? '-' : $sLastLogin;
           $bOnlineTime = ( $sOnlineTime == 0 ) ? $sLastLogin : $sOnlineTime;
        // replace dynamic template placeholders with values from database
           $oTpl->set_var(array(
                   'DISPLAYNAME'   => htmlentities(ucwords($row['display_name'])),
                     'USERNAME'   => htmlentities(($row['username'])),
                     'LAST_LOGIN'    => date((($row['login_when'] == 0) ? '-' : $MOD_USERSTATS['DATE_FORMAT']), (int) $row['login_when']),
                     'LAST_LOGIN_SINCE' => $sLastLogin,
                     'DAYS_INACTIVE' => $bOnlineTime,
                     'USER_EMAIL'        => htmlentities($row['email']),
                     'ACTION_URL' => ADMIN_URL.'/admintools/tool.php?tool=userstat',
                     'USERSORT' => $sUsersort,
                     'USERSORTCSS' => $sUsersortClass,
                     'TIMESORT' => $sTimeSort,
                     'TIMESORTCSS' => $sTimeSortClass,
                     'ACTIVESORT' => $sActiveSort,
                     'ACTIVESORTCSS' => $sActiveSortClass,
                     'ACTIVE' => $sAccountStatus,
                     'UserActiveCSS' => $sUserActiveCSS,
                     'SuperUserCSS' => $sSuperUserCSS,
                     'GROUPSORT' => $sGroupSort,
                     'GROUPSORTCSS' => $sGroupSortClass,
                     'USERGROUP'  => $sGroupName,
                     'TXT_TH_GROUPS' => $MOD_USERSTATS['TXT_TH_GROUPS']
                     )
                );

                // add template values in append mode (add per loop)
                $oTpl->parse('user_list_handle', 'user_list', true);
                $i++;
        }
        // parse the final template block
        $oTpl->parse('user_table_handle', 'user_table');
    }

// ouput the final template
$oTpl->pparse('output', 'page');
// end of file