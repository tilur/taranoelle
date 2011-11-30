/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.toolbar_Tara =
	[
		{ name: 'document',		items : [ 'Source' ] },
		{ name: 'clipboard',	items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing',		items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		'/',
		{ name: 'basicstyles',	items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph',	items : [ 'NumberedList','BulletedList','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'links',		items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',		items : [ 'Image','Flash','Table','HorizontalRule' ] },
		{ name: 'styles',		items : [ 'Format','Font','FontSize' ] },
		{ name: 'colors',		items : [ 'TextColor','BGColor' ] },
	];

	config.toolbar = 'Tara';
};
