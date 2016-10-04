<?php
/**
 * @category     Addons
 * @package      Admin tool: User Statistics
 * @copyright    Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @author       Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.0.3
 * @lastmodified $Date: $
 * @since        File available since 2016-04-04
 * @description  english language file for wysiwyg editor
 *
/**
 * NL.php
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Illegale file access /'.basename(__DIR__).'/'.basename(__FILE__).''); }
/* -------------------------------------------------------- */

// dutch module description
$module_description = 'Deze module genereert een lijst van geregistreerde gebruikers en hun laatste login-gegevens.';

        // normal text outputs
$MOD_USERSTATS['TXT_HEADING'] = 'Gebruikersstatistieken';
$MOD_USERSTATS['TXT_DESCRIPTION'] = 'De tabel toont een lijst van geregistreerde WB-gebruikers en de datum van hun laatste login.';
$MOD_USERSTATS['TXT_TH_USER'] = 'gebruiker';
$MOD_USERSTATS['TXT_TH_EMAIL'] = 'e-mail';
$MOD_USERSTATS['TXT_TH_LAST_LOGIN'] = 'laatste login';
$MOD_USERSTATS['TXT_TH_DAYS_INACTIVE'] = 'laatste login ';
$MOD_USERSTATS['TXT_ERROR_DATABASE'] = 'Databasefout. De gebruikersstatistieken kunnen niet uit de database gelezen worden.';
$MOD_USERSTATS['TXT_MAILTO'] = 'e-mail naar';
$MOD_USERSTATS['TXT_ACTIVE'] = 'account is';
$MOD_USERSTATS['TXT_HOURS']  = 'uur geleden';
$MOD_USERSTATS['TXT_MINUTES'] = 'minuten geleden';
$MOD_USERSTATS['TXT_DAYS'] = 'dagen geleden';
$MOD_USERSTATS['TXT_VOR'] = '';
$MOD_USERSTATS['TXT_AT'] = ' op ';
$MOD_USERSTATS['ACC_ACTIVE'] = 'actief';
$MOD_USERSTATS['ACC_INACTIVE'] = 'inactief';
$MOD_USERSTATS['TXT_TH_GROUPS'] = 'Groep';
        // date format (see PHP date function for information)
$MOD_USERSTATS['DATE_FORMAT'] = 'd.m.Y | H:i';