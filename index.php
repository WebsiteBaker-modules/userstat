<?php
/**
 *
 * @category     Addons
 * @package      Admin tool: User Statistics
 * @copyright    Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @author       Uwe Jacobsen <webdesign@jacobi22.com>, Christian Sommer, Evaki
 * @license      http://www.gnu.org/licenses/gpl.html   GPL License
 * @version      1.0.3
 * @lastmodified $Date: $
 * @since        File available since 2016-03-24
 * @description  folder protection file for userstat
 *
 *
 * index.php
 */
/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(!defined('WB_PATH')) {
    require_once( dirname(dirname(__DIR__)).'/framework/globalExceptionHandler.php');
    throw new IllegalFileException();
}
/* -------------------------------------------------------- */

// end of file