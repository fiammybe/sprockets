<?php

/**
 * Class representing a Sprockets archive handler object
 *
 * @copyright	Copyright Madfish (Simon Wilkinson) 2010
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
 * @since		1.0
 * @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
 * @package		archive
 * @version		$Id$
 */

class SprocketsArchiveHandler extends icms_ipf_Handler {

	/**
	 * Constructor
	 */
	public function __construct(& $db) {
		parent::__construct($db, 'archive', 'archive_id', 'repository_name',
			'base_url', 'sprockets');
	}
	
	// INITIALISE DEFAULT ARCHIVE VALUES BECAUSE MOST OF THESE ARE FIXED

	/**
	 * Returns options to select which module this archive represents
	 *
	 * @return int
	 */
	
	public function getModuleOptions() {
		
		$module_options = array();
		$module_handler = icms::handler("icms_module");
		
		// need to add something to check that only one archive object is created per module
		
		if (icms_get_module_status("news")) {
			$newsModule = $module_handler->getByDirname("news");
			$module_options[$newsModule->getVar('mid')] = $newsModule->getVar('name');
		}

		if (icms_get_module_status("podcast")) {
			$podcastModule = $module_handler->getByDirname("podcast");
			$module_options[$podcastModule->getVar('mid')] = $podcastModule->getVar('name');
		}
		
		if (icms_get_module_status("library")) {
			$libraryModule = $module_handler->getByDirname("library");
			$module_options[$libraryModule->getVar('mid')] = $libraryModule->getVar('name');
		}
		
		return $module_options;
	}
	
	/**
	 * Returns names of compatible modules installed on the system
	 * 
	 * @return int
	 */
	
	public function getModuleNames() {
		
		$module_names = array();
		$module_handler = icms::handler("icms_module");
		
		// need to add something to check that only one archive object is created per module
		
		if (icms_get_module_status("news")) {
			$newsModule = $module_handler->getByDirname("news");
			$module_names[$newsModule->getVar('mid')] = $newsModule->getVar('dirname');
		}

		if (icms_get_module_status("podcast")) {
			$podcastModule = $module_handler->getByDirname("podcast");
			$module_names[$podcastModule->getVar('mid')] = $podcastModule->getVar('dirname');
		}
		
		if (icms_get_module_status("library")) {
			$libraryModule = $module_handler->getByDirname("library");
			$module_names[$libraryModule->getVar('mid')] = $libraryModule->getVar('dirname');
		}
		
		if (icms_get_module_status("catalogue")) {
			$catalogueModule = $module_handler->getByDirname("catalogue");
			$module_names[$catalogueModule->getVar('mid')] = $catalogueModule->getVar('dirname');
		}
		
		if (icms_get_module_status("partners")) {
			$partnersModule = $module_handler->getByDirname("partners");
			$module_names[$partnersModule->getVar('mid')] = $partnersModule->getVar('dirname');
		}
		
		if (icms_get_module_status("projects")) {
			$projectsModule = $module_handler->getByDirname("projects");
			$module_names[$projectsModule->getVar('mid')] = $projectsModule->getVar('dirname');
		}
		
		// Add support for CMS module
		if (icms_get_module_status("cms")) {
			$cmsModule = $module_handler->getByDirname("cms");
			$module_names[$cmsModule->getVar('mid')] = $cmsModule->getVar('dirname');
		}
		
		return $module_names;
	}
	
	/**
	 * Returns the only metadataprefix supported by this repository (oai_dc)
	 *
	 * @return string
	 */
	public function setMetadataPrefix() {
		return 'oai_dc';
	}

	/**
	 * One of several functions used to build a unique identifier for each record
	 *
	 * @return string
	 */
	public function setNamespace() {
		$namespace = ICMS_URL;
		$namespace = str_replace('http://', '', $namespace);
		$namespace = str_replace('https://', '', $namespace);
		$namespace = str_replace('www.', '', $namespace);
		return $namespace;
	}

	/**
	 * Returns the timestamp granularity supported by this repository in OAIPMH datetime format
	 *
	 * This implementation supports seconds-level granularity, which is the maximum.
	 *
	 * @return string
	 */
	public function setGranularity() {
		return 'YYYY-MM-DDThh:mm:ssZ';
	}

	/**
	 * Returns whether this repository supports deleted record tracking (no)
	 *
	 * @return string
	 */
	public function setDeletedRecord() {
		return 'no';
	}

	/**
	 * Sets the earliest datestamp attribute for this repository, using the Unix epoch as default
	 *
	 * If there are records in the repository, the oldest datestamp will be reported as that of
	 * the oldest record. For safety reasons, this will include offline and non-federated records
	 * so if a records online or federation status changes, nothing will be broken. If there are
	 * no records, the beginning of the Unix epoch will be used as the earliest datestamp value.
	 *
	 * @return string
	 */
	public function setEarliestDatestamp() {
		return '1970-01-01T00:00:00Z';
	}

	/**
	 * Returns the repository's admin email address, as per the OAIPMH spec requirements
	 *
	 * @global mixed $icmsConfig
	 *
	 * @return string
	 */
	public function setAdminEmail() {
		global $icmsConfig;
		return $icmsConfig['adminmail'];
	}

	/**
	 * Returns the OAIPMH version in use by this repository (2.0, the current version)
	 *
	 * @return string
	 */
	public function setProtocolVersion() {
		return '2.0';
	}

	/**
	 * Returns the name of the repository, default value is the site name in global preferences.
	 *
	 * A different respository name can be set within the Archive object.
	 *
	 * @global mixed $icmsConfig
	 *
	 * @return string
	 */
	public function setRepositoryName() {
		global $icmsConfig;
		$repository_name = $icmsConfig['sitename'] . ' - ' . $icmsConfig['slogan'];
		return $repository_name;
	}

	/**
	 * Returns the base URL, which is the URL against which OAIPMH requests should be sent
	 *
	 * @param string $directory
	 *
	 * @return string
	 */
	public function setBaseUrl($directory = FALSE) {

		$base_url = '';

		// with a new archive, $directory will not be set and should default to the first
		// value in the select box. This is ugly but it works.
		if (!$directory) {
			$module_options = $this->getModuleOptions();
			$directory = strtolower(array_shift($module_options));
		}
		$base_url = ICMS_URL . '/modules/' . $directory . '/oaipmh_target.php';
		
		return $base_url;
	}

	/**
	 * Returns the compression scheme(s) supported by this repository (only gzip)
	 *
	 * @return string
	 */
	public function setCompression() {
		return 'gzip';
	}

	/**
	 * Converts a timestamp to the OAIPMH datetime format as per the spec
	 * 
	 * @param string $timestamp
	 * @return string
	 */
	public function timestamp_to_oaipmh_time($timestamp) {
		$format = 'Y-m-d\TH:i:s\Z';
		$oai_date_time = date($format, $timestamp);
		return $oai_date_time;
	}
	
	/**
	 * Toggles a yes/no field on or offline
	 *
	 * @param int $id
	 * @param str $field
	 * @return int $status
	 */
	public function toggleStatus($id, $field) {
		
		$status = $obj = '';
		
		$obj = $this->get($id);
		if ($obj->getVar($field, 'e') == 1) {
			$obj->setVar($field, 0);
			$status = 0;
		} else {
			$obj->setVar($field, 1);
			$status = 1;
		}
		$this->insert($obj, TRUE);
		
		return $status;
	}
	
	/**
	 * Returns a mimetypes but using the ICMS include but NOT using the core mimetype handler
	 *
	 * @param string $format_extension - the filetype extension of a publication object
	 * @return string $mimetype
	 */
	public function get_mimetype($format_extension) {
		// There is a core file that has a nice list of mimetypes, but some podcast clients don't observe the standard
		$mimetype_list = icms_Utils::mimetypes();

		// Need to trim the damn dot off, if present
		$format_extension = ltrim($format_extension, '.');

		// Should probably handle exception where the mimetype isn't in the list, should be a rare event though
		$mimetype = $mimetype_list[$format_extension];
		if ($mimetype) {
			return $mimetype;
		} else {
			return; // Null
		}
	}

	/**
	 * Prevents more than one archive object being created per client module (only one is needed)
	 *
	 * @param object $obj
	 * @return boolean
	 */
	public function beforeSave(& $obj) {

		// check if an archive already exists for this module

		$module_id = '';
		$archive_object_array = $module_id_array = array();
		$valid_target = TRUE;

		$module_id = $obj->getVar('module_id', 'e');
		$archive_object_array = $this->getObjects($criteria = null, TRUE, TRUE);

		foreach ($archive_object_array as $archive) {
			$module_id_array[$archive->id()] = $archive->getVar('module_id', 'e');
		}

		if (in_array($module_id, $module_id_array)) {

			if ($obj->isNew()) {

				// a new archive cannot target the same module as an existing one
				
				$valid_target = FALSE;

			} else {

				// this is an existing archive object, check if current target is already selected
				if (array_key_exists($obj->id(), $module_id_array)) {
					
					// unset this archive object from the ID array
					unset($module_id_array[$obj->id()]);

					// the module ID should not match any of the remaining values
					if (in_array($module_id, $module_id_array)) {

						$valid_target = FALSE;
					}
					
				} else {

					// we cannot change the target module if it is being handled by another archive
					$valid_target = FALSE;
				}

			}
		}

		if ($valid_target) {

			return TRUE;

		} else {

			$obj->setErrors(_CO_SPROCKETS_ONLY_ONE_ARCHIVE);
			return $valid_target;
		}
	}
}