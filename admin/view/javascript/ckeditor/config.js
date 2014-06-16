/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
// Comment out or remove the 2 lines below if you want to enable the Advanced Content Filter	
config.allowedContent = true;
config.extraAllowedContent = '*{*}';		
config.toolbar = 'Custom';	

	config.toolbar_Custom = [
		['Source'],
		['Maximize'],
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript','RemoveFormat'],
		['NumberedList','BulletedList','-','Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['SpecialChar'],
		'/',
		['Undo','Redo'],
		['Font','FontSize','Styles','Format'],
		['TextColor','BGColor'],
		['Link','Unlink','Anchor'],
		['Image','Iframe','Table','HorizontalRule']
	];
};