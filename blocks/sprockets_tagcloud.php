<?php
/**
 * Overview of all tags available with frequencies
 *
 * This file holds the functions needed to edit/view the 'tag cloud' block
 *
 * @copyright	https://www.davidjanssens.be fiammybe aka David Janssens
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since		1.0
 * @author		fiammybe aka David Janssens <david.j@impresscms.org>
 * @version		$Id$
 */

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

/**
 * Prepares tag cloud block for display
 *
 * @param array $options
 * @return string
 */
function sprockets_tagcloud_show($options) {

    $sprockets_tag_handler = icms_getModuleHandler('tag', 'sprockets', 'sprockets');
    //$sprockets_taglink_handler = icms_getModuleHandler('taglink', 'sprockets', 'sprockets');
    //$script_name = getenv("SCRIPT_NAME");
    $untagged_content = FALSE;

    // Get a tag buffer to minimise queries
    $criteria = icms_buildCriteria(array('label_type' => 0));
    $tagList = $sprockets_tag_handler->getTags();
    print_r($tagList);

}

function sprockets_tagcloud_edit($options) {

}
