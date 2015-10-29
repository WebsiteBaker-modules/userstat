<?php
/**
 * Admin tool: User Statistics
 *
 * This admin tool provides details about registered Website Baker
 * users from the Website Baker users database table.
 *
 * This file contains the German language output.
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @author		Christian Sommer
 * @copyright	Christian Sommer (c) 2006-2009
 * @license		http://www.gnu.org/licenses/gpl.html
 * @version		0.30
 * @platform	Website Baker 2.7
*/

// German module description
$module_description = 'Diese Modul erstellt eine Liste der registrierten Benutzer und zeigt deren letzten Login an.';

// declare module language array
$LANG = array();

// Text outputs for the module backend ("htt/backend_view.htt")
$LANG[0] = array(
	// normal text outputs
	'TXT_HEADING'			=> 'Benutzerstatistik',
	'TXT_DESCRIPTION'		=> 'Nachfolgende Liste gibt die registrierten Benutzer, sowie deren letzten Login aus.',
	'TXT_TH_USER'			=> 'Benutzer',
	'TXT_TH_LAST_LOGIN'		=> 'Letzter Login',
	'TXT_TH_DAYS_INACTIVE'	=> 'In Tagen',
	'TXT_TH_LAST_IP'		=> 'Letzte IP',
	'TXT_TH_IP_CHECK'		=> 'IP Check',
	'TXT_TH_EMAIL'			=> 'Email',
	'TXT_ERROR_DATABASE'	=> 'Datenbankfehler. Benutzerdaten konnten nicht ermittelt werden.',
	'TXT_MAILTO'			=> 'Email an',
	// text outputs for the IP check
	'TXT_RI'				=> 'RI',
	'TXT_RI_COUNTRIES'		=> 'Ripe - (Europe, Middle East, Parts of Africa and Asia)',
	'TXT_LAC'				=> 'LAC',
	'TXT_LAC_COUNTRIES'		=> 'LacNic - Latin America and Carribean region',
	'TXT_AR'				=> 'AR',
	'TXT_AR_COUNTRIES'		=> 'ARIN - North America, parts of Carribean and Saharan Africa',
	'TXT_AF'				=> 'AF',
	'TXT_AF_COUNTRIES'		=> 'AfriNic - Africa',
	'TXT_AP'				=> 'AP',
	'TXT_AP_COUNTRIES'		=> 'APNic - Asia and Pacific Regions',
	// date format (see PHP date function for information)
	'DATE_FORMAT'			=> 'd.m.y | H:i'
);
?>