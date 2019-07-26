/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) 
{

	config.language = 'en';   
	config.width = '100%';
	config.height = '80%';	
	config.removePlugins = 'elementspath';	
	config.removePlugins = 'uploadimage';	
	config.toolbarCanCollapse = true;
	config.allowedContent = true;
	config.autoParagraph = false;
	config.forcePasteAsPlainText = true;
	config.pasteFromWordRemoveFontStyles = false;
	
	config.toolbarGroups = 
	[
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'savebtn' },
		// { name: 'youtube' },
		// { name: 'fegd' }
	];

	config.removeButtons 	= 'Form,Radio,TextField,Textarea,Select,Button,HiddenField,Checkbox,About,Iframe,Flash,Anchor,CreateDiv';

	// config.extraPlugins = 'autogrow';
	// config.autoGrow_minHeight = 200;
	// config.autoGrow_maxHeight = 600;
	// config.autoGrow_bottomSpace = 50;
	
	config.extraPlugins 	= 'language';

	// config.extraPlugins 	= 'youtube';

	config.extraPlugins 	= 'savebtn';//savebtn is the plugins name
	
	// for online
	config.saveSubmitURL 	= 'http://gowebphilippines.xyz/vendor/unisharp/laravel-ckeditor/process.php'; //link to serverside script to handle the post
	// config.extraPlugins		= 'fegd';

	
};
