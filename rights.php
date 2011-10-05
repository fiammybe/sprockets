<?php
/**
* Rights page
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		sprockets
* @version		$Id$
*/

include_once 'header.php';

$xoopsOption['template_main'] = 'sprockets_rights.html';
include_once ICMS_ROOT_PATH . '/header.php';

$sprockets_rights_handler = icms_getModuleHandler('rights');

// sanitise rights_id
$clean_rights_id = isset($_GET['rights_id']) ? intval($_GET['rights_id']): 0 ;

$rightsObj = $sprockets_rights_handler->get($clean_rights_id);

// display one rights object
if($rightsObj && !$rightsObj->isNew()) {
	$icmsTpl->assign('sprockets_rights', $rightsObj->toArray());
	/**
	 * Generating meta information for this page
	 */
	$icms_metagen = new IcmsMetagen($rightsObj->getVar('title'),
		$rightsObj->getVar('meta_keywords','n'), $rightsObj->getVar('meta_description', 'n'));
	$icms_metagen->createMetaTags();

} else {

	// display a table listing all rights
	include_once ICMS_ROOT_PATH."/kernel/icmspersistabletable.php";

	$icmsTpl->assign('sprockets_title', _MD_SPROCKETS_ALL_RIGHTS);

	$objectTable = new IcmsPersistableTable($sprockets_rights_handler, $criteria = null, array(),
			true);
	$objectTable->isForUserSide();
	$objectTable->addColumn(new IcmsPersistableColumn('title'));
	$icmsTpl->assign('sprockets_rights_table', $objectTable->fetch());
}

$icmsTpl->assign('sprockets_module_home', sprockets_getModuleName(true, true));
$icmsTpl->assign('sprockets_display_breadcrumb', $sprocketsConfig['display_breadcrumb']);

include_once 'footer.php';