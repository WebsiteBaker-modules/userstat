<?php
/**
 * @category     Addons
 * @package      Admin tool: User Statistics
 * @copyright    Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @author       Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.0.3
 * @lastmodified $Date: $
 * @since        File available since 2016-03-24
 * @description  german language file for wysiwyg editor
 *
/**
 * DE.php
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Illegale file access /'.basename(__DIR__).'/'.basename(__FILE__).''); }
/* -------------------------------------------------------- */

// German module description
$module_description = 'Diese Modul erstellt eine Liste der registrierten Benutzer und zeigt deren letzten Login an.';

        // normal text outputs
$MOD_USERSTATS['TXT_HEADING'] = 'Benutzerstatistik';
$MOD_USERSTATS['TXT_DESCRIPTION'] = 'Nachfolgende Liste gibt die registrierten Benutzer, sowie deren letzten Login aus.';
$MOD_USERSTATS['TXT_TH_USER'] = 'Benutzer';
$MOD_USERSTATS['TXT_TH_EMAIL'] = 'Email';
$MOD_USERSTATS['TXT_TH_LAST_LOGIN'] = 'Letzter Login';
$MOD_USERSTATS['TXT_TH_DAYS_INACTIVE'] = 'Letzter Login vor';
$MOD_USERSTATS['TXT_ERROR_DATABASE'] = 'Datenbankfehler. Benutzerdaten konnten nicht ermittelt werden.';
$MOD_USERSTATS['TXT_MAILTO'] = 'Email an';
$MOD_USERSTATS['TXT_ACTIVE'] = 'Account ist';
$MOD_USERSTATS['TXT_HOURS']  = 'Stunden';
$MOD_USERSTATS['TXT_MINUTES'] = 'Minuten';
$MOD_USERSTATS['TXT_DAYS'] = 'Tagen';
$MOD_USERSTATS['TXT_VOR'] = 'vor ';
$MOD_USERSTATS['TXT_AT'] = ' um ';
$MOD_USERSTATS['ACC_ACTIVE'] = 'aktiv';
$MOD_USERSTATS['ACC_INACTIVE'] = 'inaktiv';
$MOD_USERSTATS['TXT_TH_GROUPS'] = 'Gruppe';
        // date format (see PHP date function for information)
$MOD_USERSTATS['DATE_FORMAT'] = 'd.m.Y | H:i';


// end of file