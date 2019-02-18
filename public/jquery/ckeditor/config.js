CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.extraPlugins = 'wordcount';

    config.wordcount = {

        // Whether or not you want to show the Paragraphs Count
        showParagraphs: true,
        // Whether or not you want to show the Word Count
        showWordCount: true,
        // Whether or not you want to show the Char Count
        showCharCount: true,
        // Whether or not you want to count Spaces as Chars
        countSpacesAsChars: true,
        // Whether or not to include Html chars in the Char Count
        countHTML: false,
        // Maximum allowed Word Count, -1 is default for unlimited
        maxWordCount: -1,
		// Maximum allowed Char Count, -1 is default for unlimited
		maxWordCount: 50,
        maxCharCount: 200
    };
	

	config.removeButtons = 'Save,Templates,Find,SelectAll,Scayt,Form,CopyFormatting,NumberedList,Outdent,Blockquote,JustifyLeft,BidiLtr,Link,Image,Styles,TextColor,Maximize,About,NewPage,Preview,Print,Copy,Cut,Paste,PasteText,PasteFromWord,Replace,Radio,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,Underline,Strike,Subscript,Superscript,RemoveFormat,BulletedList,Indent,CreateDiv,JustifyCenter,JustifyRight,JustifyBlock,BidiRtl,Language,Anchor,Unlink,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Font,FontSize,Format,BGColor,ShowBlocks,Undo,Redo';
};