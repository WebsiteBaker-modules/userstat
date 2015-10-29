<?php
/**
 * Admin tool: User Statistics
 *
 * This admin tool provides details about registered Website Baker
 * users from the Website Baker users database table.
 *
 * This file displays the user information in the Website Baker admin panel.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @author		Christian Sommer
 * @copyright	Christian Sommer (c) 2006-2009
 * @license		http://www.gnu.org/licenses/gpl.html
 * @version		0.30
 * @platform	Website Baker 2.7
 *
*/
if (PHP_VERSION >= "5.1") {date_default_timezone_set("Europe/Berlin");}
// prevent this file from being accessed directly
if (!defined('WB_PATH')) die(header('Location: ../../index.php'));

// load module language file
$lang = (dirname(__FILE__)) . '/languages/' . LANGUAGE . '.php';
require_once(!file_exists($lang) ? (dirname(__FILE__)) . '/languages/EN.php' : $lang );

// include Website Baker module functions introduced with WB 2.7
if (!file_exists(WB_PATH . '/framework/module.functions.php')) {
	echo '<div class="' .strtolower(basename(dirname(__FILE__))) . ' warning">';
	echo $LANG[1]['TXT_REQUIRES_WB27'] . '</div>';
	return;
};
require_once(WB_PATH . '/framework/module.functions.php');

/**
 * Include Website Baker template parser and configure it
 */
// include template class and initiate object (set template folder: "./htt")
require_once(WB_PATH . '/include/phplib/template.inc');
$tpl = new Template(dirname(__FILE__) . '/htt');

// configure handling of unknown {variables} (remove:=default, keep, comment)
$tpl->set_unknowns('remove');

// configure debug mode (0:= default, 1:=variable assignments, 2:=calls to get variable, 4:=show internals)
$tpl->debug = 0;

// set template file (assign file "backend_view.htt" to variable/handle "page")
$tpl->set_file('page', 'backend_view.htt');

// set blocks (NOTE: always start with the inner most block first)
// parameters: file variable/handle of file containing the block, block name in the file, new variable/handle for the block)
$tpl->set_block('page', 'user_list', 'user_list_handle');
$tpl->set_block('page', 'user_table', 'user_table_handle');

/**
 * Output the user list details
 */
// replace all placeholder {xxx} of the template file with values from language file
foreach($LANG[0] as $placeholder => $value) {
	$tpl->set_var($placeholder, $value);
}

// access database and obtain users table
$sql = "SELECT * FROM `" . TABLE_PREFIX . "users`";
$results = $database->query($sql);

if (!$results || $results && $results->numRows() == 0) {
	// database query failed or no users in database
	$tpl->set_var('TXT_MESSAGE', $LANG[0]['TXT_ERROR_DATABASE']);

	// clear the blocks not required
	$tpl->set_var('user_list_handle', '');
	$tpl->set_var('user_table_handle', '');

} else {
	$tpl->set_var('TXT_MESSAGE', $LANG[0]['TXT_DESCRIPTION']);

	// loop over all users and add one row per user to the template
	$i = 0;
	while($row = $results->fetchRow()) {
		// replace dynamic template placeholders with values from database
		$tpl->set_var(
			array(
				'TR_CLASS'		=> ($i % 2 == 0) ? '' : 'class="even"',
				'USERNAME'		=> htmlentities(ucwords($row['username'])),
				'LAST_LOGIN'	=> date((($row['login_when'] == 0) ? '-' : $LANG[0]['DATE_FORMAT']), (int) $row['login_when']),
//				'DAYS_INACTIVE'	=> ($row['login_when'] == 0) ? '-' : round((mktime() - (int) $row['login_when']) / (3600 * 24)),
				'DAYS_INACTIVE'	=> ($row['login_when'] == 0) ? '-' : round((time() - (int) $row['login_when']) / (3600 * 24)),
				'LAST_IP'		=> htmlentities($row['login_ip']),
				'USER_EMAIL'	=> htmlentities($row['email'])
			)
		);
	   
		// add template values in append mode (add per loop)
		$tpl->parse('user_list_handle', 'user_list', true);
		$i++;
	}
	// parse the final template block
	$tpl->parse('user_table_handle', 'user_table');
}

// ouput the final template
$tpl->pparse('output', 'page');

?>