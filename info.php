<?php
/**
 * Admin tool: User Statistics
 *
 * This admin tool provides details about registered Website Baker
 * users from the Website Baker users database table.
 *
 * This file defines the variables required for Website Baker.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @author		Christian Sommer
 * @copyright	Christian Sommer (c) 2006-2009
 * @license		http://www.gnu.org/licenses/gpl.html
 * @version		0.32
 * @platform	Website Baker 2.8
 *
 * ------------------------------------------------------------------------------------------------
 *	MODULE VERSION HISTORY
 * ------------------------------------------------------------------------------------------------
*	v0.32 stable (evaki: Sep 15, 2012)
 *	+ fixed E_STRICT-Notice in tool.php [function.mktime] (since php 5.1) changed to time() 
 * 
 *	v0.30 stable (doc: Mar 13, 2009)
 *	+ updated module according guidelines introduced in the "Module Primer"
 *	+ removed support for WB 2.6.x (only supports WB 2.7 or higher)
 *
 *	v0.21 stable (doc: Sep 28, 2008)
 *	+ applied module functions introduced with WB 2.7 (/framework/module.functions.php)
 *	+ added module variable $module_requirements to info.php
 *
 *	v0.20 stable (doc: Sep 27, 2008)
 *	+ seperated HTML / CSS and PHP by using the phplib template class
 *	+ moved CSS styles to backend.css file
 *	+ introduction of Zend coding guidelines (http://framework.zend.com/manual/de/coding-standard.html)
 *
 *	v0.14 stable  (doc: Dec 07, 2007)
 *	+ fixed bug in tool.php (displayed wrong login information for users never logged in so far)
 *	+ applied common WB version numbering to index.php
 *
 *	v0.13 beta  (davon: Dec 06, 2007)
 *	+ added IP Check (including quick mouseover (title tag) infos)
 *	+ small changes at the information layout
 *	+ changed displaying of the full email adress into simple "Mailto" with mouseover title tag
 *
 *	v0.12 beta (doc: Dec 01, 2006)
 *	+ changed module function from page to tool (thanks to ruebenwurzel)
 *	+ added language support via language files (GERMAN and ENGLISH available so far)
 *	+ added some CSS styles to format the output table
 *
 *	v0.11 alpha  (doc: Nov 30, 2006)
 *	+ added output of days inactive and mailto: link (posted in forum as: "User Infos")
 *
 *	v0.10 alpha (doc: Nov 30, 2006)
 *	+ initial release of the module (posted in forum as: "User Infos")
 * ------------------------------------------------------------------------------------------------
*/

// OBLIGATORY WEBSITE BAKER VARIABLES
$module_directory		= 'userstat';
$module_name			= 'User Statistics';
$module_function		= 'tool';
$module_version			= '0.30';
$module_status			= 'stable';
$module_platform		= '2.7';
$module_author			= 'Christian Sommer (doc)';
$module_license			= '<a href="http://www.gnu.org/licenses/gpl.html">GNU General Public Licencse 3.0</a>';
$module_license_terms	= '-';
$module_requirements	= '-';
$module_description		= 'This module creates a list of registered users with their last login details.';

?>