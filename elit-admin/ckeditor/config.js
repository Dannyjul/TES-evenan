/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
    //var halaman = 'http://evenan.trendyfashion.id/elit-admin/ckeditor/kcfinder/';
    var halaman = 'http://evenan.trendyfashion.id/elit-admin/ckeditor/kcfinder/';
	config.filebrowserBrowseUrl = halaman+'browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = halaman+'browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = halaman+'browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = halaman+'upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = halaman+'upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = halaman+'upload.php?opener=ckeditor&type=flash';
    config.filebrowserUploadMethod = 'form';

    /*

   config.filebrowserBrowseUrl = CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'kcfinder' ) + 'browse.php?type=files' );
   config.filebrowserImageBrowseUrl = CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'kcfinder' ) + 'browse.php?type=images' );
   config.filebrowserFlashBrowseUrl = CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'kcfinder' ) + 'browse.php?type=flash' );
   config.filebrowserUploadUrl = CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'kcfinder' ) + 'upload.php?type=files' );
   config.filebrowserImageUploadUrl = CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'kcfinder' ) + 'upload.php?type=images' );
   config.filebrowserFlashUploadUrl = CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'kcfinder' ) + 'upload.php?type=flash' );
   config.filebrowserUploadMethod = 'form';
   */
	


            
	
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
