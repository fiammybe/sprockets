<?php
/**
* English language constants related to module information
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		sprockets
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Module Info
define("_MI_SPROCKETS_MD_NAME", "Sprockets");
define("_MI_SPROCKETS_MD_DESC", "Utilities module providing shared components for IPF modules.");
define("_MI_SPROCKETS_TAGS", "Tags");
define("_MI_SPROCKETS_TAGLINKS", "Tag links");
define("_MI_SPROCKETS_CATEGORIES", "Global categories");
define("_MI_SPROCKETS_RIGHTS", "Rights");
define("_MI_SPROCKETS_ARCHIVE", "Archives");
define("_MI_SPROCKETS_TEMPLATES", "Templates");
define("_MI_SPROCKETS_CSS_EDITOR", "CSS editor");

// preferences
define("_MI_SPROCKETS_DISPLAY_BREADCRUMB", "Display breadcrumb?");
define("_MI_SPROCKETS_DISPLAY_BREADCRUMB_DSC", "Show or hide the horizontal breadcrumb navigation
	at the top of the module.");
define("_MI_SPROCKETS_NUMBER_RSS_ITEMS", "Number of items in RSS feeds?");
define("_MI_SPROCKETS_NUMBER_RSS_ITEMS_DSC", "Recommended (sane) range is 5-10 items. This is query
	intensive, so be careful.");
define("_MI_SPROCKETS_RESUMPTION_TOKEN_CURSOR_OFFSET", "OAIMPH resumption token offset (records)");
define("_MI_SPROCKETS_RESUMPTION_TOKEN_CURSOR_OFFSET_DSC", "The maximum number of records to return 
	in response to an OAIPMH ListRecords or ListIdentifiers request. Such requests generate a large
	number of queries. If your OAI repository has a large number of records (hundreds or thousands),
	it is best to return a partial result set in order to prevent script timeouts and database 
	overload. The response will include a 'resumption token' that allows the client to re-issue the 
	request starting at the point where it left off. The entire repository can thus be harvested 
	in a series of smaller transactions without overloading the server. Sites on shared web hosting 
	should keep this value low (<100), sites with dedicated servers can consider increasing it. To 
	disable partial harvesting (ie. return all records), set this value to 0.");
define("_MI_SPROCKETS_RESUMPTION_TOKEN_EXPIRATION", "OAIPMH resumption token expiration (seconds)");
define("_MI_SPROCKETS_RESUMPTION_TOKEN_EXPIRATION_DSC", "The time that a resumption 
	token will remain valid. Expired tokens are refused. 30 minutes (1800 seconds) is a reasonable 
	value.");
define("_MI_SPROCKETS_RESUMPTION_TOKEN_THROTTLE", "OAIPMH throttle (seconds)");
define("_MI_SPROCKETS_RESUMPTION_TOKEN_THROTTLE_DSC", "To reduce server load from OAIPMH ListRecords 
	and ListIdentifiers requests you can ask clients to wait for a while before submitting 
	their next partial harvest request. Requests made within the moratorium period will be ignored 
	and clients will be given aa HTTP 503 status code with a Retry-after value set. One minute is 
	a reasonable value. If your server is heavily loaded, increase this value. You can consider 
	reducing it a bit if you have dedicated server resources. Set it at zero to disable the 
	throttle");

// New in V2.01
define("_MI_SPROCKETS_THUMBNAIL_WIDTH", "Thumbnail width");
define("_MI_SPROCKETS_THUMBNAIL_WIDTHDSC", "Thumbnails are the teaser images accompanying a content 
	item (except for 'image' type publications, which are displayed at a considerably larger size 
	by default). This value is used to scale the width that images are displayed at. Aspect ratio 
	will be preserved, so it will be the largest of the width and height preferences that is the 
	constraint.");
define("_MI_SPROCKETS_THUMBNAIL_HEIGHT", "Thumbnail height");
define("_MI_SPROCKETS_THUMBNAIL_HEIGHTDSC", "Thumnails are the teaser images accompanying a content 
	item (except for 'image' type publications, which are displayed at a considerably larger size 
	by default). This value is used to scale the width that images are displayed at. Aspect ratio 
	will be preserved, so it will be the largest of the width and height preferences that is the 
	constraint.");
define("_MI_SPROCKETS_IMAGE_WIDTH", "Image width");
define("_MI_SPROCKETS_IMAGE_WIDTHDSC", "The width that image-type content items will be displayed at. 
	Images will be scaled with aspect ratio preserved, according to the largest dimension specified 
	(width or height). So in reality, image scaling will be constrained by either the width or 
	height you have specified, but not both.");
define("_MI_SPROCKETS_IMAGE_HEIGHT", "Image height");
define("_MI_SPROCKETS_IMAGE_HEIGHTDSC", "The height that image-type content items will be displayed 
	at. Images will be scaled with aspect ratio preserved, according to the largest dimension 
	specified (width or height). So in reality, image scaling will be constrained by either the 
	width or height you have specified, but not both.");
define("_MI_SPROCKETS_ALLOWED_CLIENT_OBJECTS", "Active client modules");
define("_MI_SPROCKETS_ALLOWED_CLIENT_OBJECTS_DSC", "Select which module objects you wish to include 
	results from in in the cross-module content page tag.php and the alternative site index page 
	available from the /extras folder. If you do not select any modules, all will be included by 
	default. IMPORTANT! To minimise database query load, select only those objects you actually 
	need.");
define("_MI_SPROCKETS_PAGINATION", "Pagination limit on tag.php");
define("_MI_SPROCKETS_PAGINATION_DSC", "Number of results to display per page on tag.php");
define("_MI_SPROCKETS_CMS_PAGES", "CMS pages");
define("_MI_SPROCKETS_CATALOGUE_ITEMS", "Catalogue items");
define("_MI_SPROCKETS_EVENTS", "Events");
define("_MI_SPROCKETS_LIBRARY_PUBLICATIONS", "Library publications");
define("_MI_SPROCKETS_NEWS_ARTICLES", "News articles");
define("_MI_SPROCKETS_PARTNERS", "Partners");
define("_MI_SPROCKETS_PODCAST_PROGRAMMES", "Podcasts (programmes)");
define("_MI_SPROCKETS_PODCAST_SOUNDTRACKS", "Podcasts (soundtracks)");
define("_MI_SPROCKETS_PROJECTS", "Projects");
define("_MI_SPROCKETS_DATE_FORMAT", "Date format on tag.php");
define("_MI_SPROCKETS_DATE_FORMAT_DSC", "Controls the format of the date. See the date() function in
	the PHP Manual for formatting options.");
define("_MI_SPROCKETS_CONTENT_TEASERS_CATS", "Recent content (categories)");
define("_MI_SPROCKETS_CONTENT_TEASERS_CATSDSC", "Displays the description (teaser for content across 
	compatible modules for a selected category.");
define("_MI_SPROCKETS_ENABLE_USER_SIDE", "Enable user side pages?");
define("_MI_SPROCKETS_ENABLE_USER_SIDE_DSC", "Enables the tag.php and alternative site index page 
	(see the extras folder) which display cross-module content from Gone Native modules. If you 
	select 'no' these pages will be non-functional.");

// Updated in V2.01
define("_MI_SPROCKETS_CONTENT_TEASERS", "Recent content (tagged)");
define("_MI_SPROCKETS_CONTENT_TEASERSDSC", "Displays the description (teaser) for content across 
	compatible modules for a selected tag.");
define("_MI_SPROCKETS_ENABLE_TAG_SELECT_BOX", "Enable user side tag select box?");
define("_MI_SPROCKETS_ENABLE_TAG_SELECT_BOX_DSC", "Displays a tag selection box on the cross-module"
		. " content page.");

// New in V2.01
define("_MI_SPROCKETS_THUMBNAIL_WIDTH", "Thumbnail width");
define("_MI_SPROCKETS_THUMBNAIL_WIDTHDSC", "Thumbnails are the teaser images accompanying a content 
	item (except for 'image' type publications, which are displayed at a considerably larger size 
	by default). This value is used to scale the width that images are displayed at. Aspect ratio 
	will be preserved, so it will be the largest of the width and height preferences that is the 
	constraint.");
define("_MI_SPROCKETS_THUMBNAIL_HEIGHT", "Thumbnail height");
define("_MI_SPROCKETS_THUMBNAIL_HEIGHTDSC", "Thumnails are the teaser images accompanying a content 
	item (except for 'image' type publications, which are displayed at a considerably larger size 
	by default). This value is used to scale the width that images are displayed at. Aspect ratio 
	will be preserved, so it will be the largest of the width and height preferences that is the 
	constraint.");
define("_MI_SPROCKETS_IMAGE_WIDTH", "Image width");
define("_MI_SPROCKETS_IMAGE_WIDTHDSC", "The width that image-type content items will be displayed at. 
	Images will be scaled with aspect ratio preserved, according to the largest dimension specified 
	(width or height). So in reality, image scaling will be constrained by either the width or 
	height you have specified, but not both.");
define("_MI_SPROCKETS_IMAGE_HEIGHT", "Image height");
define("_MI_SPROCKETS_IMAGE_HEIGHTDSC", "The height that image-type content items will be displayed 
	at. Images will be scaled with aspect ratio preserved, according to the largest dimension 
	specified (width or height). So in reality, image scaling will be constrained by either the 
	width or height you have specified, but not both.");
define("_MI_SPROCKETS_ALLOWED_CLIENT_OBJECTS", "Active client modules");
define("_MI_SPROCKETS_ALLOWED_CLIENT_OBJECTS_DSC", "Select which module objects you wish to include 
	results from in in the cross-module content page tag.php and the alternative site index page 
	available from the /extras folder. If you do not select any modules, all will be included by 
	default. IMPORTANT! To minimise database query load, select only those objects you actually 
	need.");
define("_MI_SPROCKETS_PAGINATION", "Pagination limit on tag.php");
define("_MI_SPROCKETS_PAGINATION_DSC", "Number of results to display per page on tag.php");
define("_MI_SPROCKETS_CMS_PAGES", "CMS pages");
define("_MI_SPROCKETS_CATALOGUE_ITEMS", "Catalogue items");
define("_MI_SPROCKETS_EVENTS", "Events");
define("_MI_SPROCKETS_LIBRARY_PUBLICATIONS", "Library publications");
define("_MI_SPROCKETS_NEWS_ARTICLES", "News articles");
define("_MI_SPROCKETS_PARTNERS", "Partners");
define("_MI_SPROCKETS_PODCAST_PROGRAMMES", "Podcasts (programmes)");
define("_MI_SPROCKETS_PODCAST_SOUNDTRACKS", "Podcasts (soundtracks)");
define("_MI_SPROCKETS_PROJECTS", "Projects");
define("_MI_SPROCKETS_DATE_FORMAT", "Date format on tag.php");
define("_MI_SPROCKETS_DATE_FORMAT_DSC", "Controls the format of the date. See the date() function in
	the PHP Manual for formatting options.");
define("_MI_SPROCKETS_CONTENT_TEASERS_CATS", "Recent content (categories)");
define("_MI_SPROCKETS_CONTENT_TEASERS_CATSDSC", "Displays the description (teaser for content across 
	compatible modules for a selected category.");
define("_MI_SPROCKETS_ENABLE_USER_SIDE", "Enable user side pages?");
define("_MI_SPROCKETS_ENABLE_USER_SIDE_DSC", "Enables the tag.php and alternative site index page 
	(see the extras folder) which display cross-module content from Gone Native modules. If you 
	select 'no' these pages will be non-functional.");

// Updated in V2.01
define("_MI_SPROCKETS_CONTENT_TEASERS", "Recent content (tagged)");
define("_MI_SPROCKETS_CONTENT_TEASERSDSC", "Displays the description (teaser) for content across 
	compatible modules for a selected tag.");
define("_MI_SPROCKETS_ENABLE_TAG_SELECT_BOX", "Enable user side tag select box?");
define("_MI_SPROCKETS_ENABLE_TAG_SELECT_BOX_DSC", "Displays a tag selection box on the cross-module"
    . " content page.");
