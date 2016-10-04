<?php
/**
 *
/**
 * @category     Addons
 * @package      Admin tool: User Statistics
 * @copyright    Uwe Jacobsen <webdesign@jacobi22.com>, Dietrich Roland Pehlke
 * @author       Uwe Jacobsen <webdesign@jacobi22.com>, Dietrich Roland Pehlke
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.0.3
 * @lastmodified $Date: $
 * @since        File available since 2016-03-24
 * @description  french language file for wysiwyg editor
 *
/**
 * FR.php
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Illegale file access /'.basename(__DIR__).'/'.basename(__FILE__).''); }
/* -------------------------------------------------------- */

// french module description

$module_description = 'This module creates a list of registered users with their last login details.';

        // normal text outputs
$MOD_USERSTATS['TXT_HEADING'] = 'Statistiques utilisateur';
$MOD_USERSTATS['TXT_DESCRIPTION'] = 'The table provides a list of registered WB users, and the date of their last login.';
$MOD_USERSTATS['TXT_TH_USER'] = 'Utilisateur';
$MOD_USERSTATS['TXT_TH_EMAIL'] = 'Courriel';
$MOD_USERSTATS['TXT_TH_LAST_LOGIN'] = 'Derni&egrave;re connexion';
$MOD_USERSTATS['TXT_TH_DAYS_INACTIVE'] = 'Depuis (jours) ';
$MOD_USERSTATS['TXT_ERROR_DATABASE'] = 'Database error. Unable to fetch user statistics from database.';
$MOD_USERSTATS['TXT_MAILTO'] = 'email to';
$MOD_USERSTATS['TXT_ACTIVE'] = 'account is';
$MOD_USERSTATS['TXT_HOURS']  = 'hours ago';
$MOD_USERSTATS['TXT_MINUTES'] = 'minutes ago';
$MOD_USERSTATS['TXT_DAYS'] = 'days ago';
$MOD_USERSTATS['TXT_VOR'] = '';
$MOD_USERSTATS['TXT_AT'] = ' at ';
$MOD_USERSTATS['ACC_ACTIVE'] = 'active';
$MOD_USERSTATS['ACC_INACTIVE'] = 'inactive';
$MOD_USERSTATS['TXT_TH_GROUPS'] = 'Group';
        // date format (see PHP date function for information)
$MOD_USERSTATS['DATE_FORMAT'] = 'd.m.Y | H:i';