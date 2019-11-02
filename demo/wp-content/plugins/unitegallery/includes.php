<?php

// no direct access
defined('_JEXEC') or die;

global $uniteGalleryVersion;
$uniteGalleryVersion = "1.7.44";


$currentFile = __FILE__;
$currentFolder = dirname($currentFile);

//include frameword files
require_once $currentFolder . '/inc_php/framework/include_framework.php';

require_once $currentFolder . '/inc_php/unitegallery_globals.class.php';
require_once $currentFolder . '/inc_php/unitegallery_globals_gallery.class.php';
require_once $currentFolder . '/inc_php/unitegallery_operations.class.php';
require_once $currentFolder . '/inc_php/unitegallery_category.class.php';
require_once $currentFolder . '/inc_php/unitegallery_categories.class.php';
require_once $currentFolder . '/inc_php/unitegallery_item.class.php';
require_once $currentFolder . '/inc_php/unitegallery_items.class.php';
require_once $currentFolder . '/inc_php/unitegallery_galleries.class.php';
require_once $currentFolder . '/inc_php/unitegallery_gallery.class.php';
require_once $currentFolder . '/inc_php/unitegallery_gallery_type.class.php';
require_once $currentFolder . '/inc_php/unitegallery_items.class.php';
require_once $currentFolder . '/inc_php/unitegallery_helper.class.php';
require_once $currentFolder . '/inc_php/unitegallery_helper_gallery.class.php';

require_once $currentFolder . '/inc_php/unitegallery_manager.class.php';
require_once $currentFolder . '/inc_php/unitegallery_manager_main.class.php';
require_once $currentFolder . '/inc_php/unitegallery_manager_inline.class.php';


//include all gallery files
$objGalleries = new UniteGalleryGalleries();
$arrGalleries = $objGalleries->getArrGalleryTypes();

foreach($arrGalleries as $gallery){
	$filepathIncludes = $gallery->getPathIncludes();
	$pathGallery = $gallery->getPathGallery();
	if(file_exists($filepathIncludes))
		require $filepathIncludes;
}


?>