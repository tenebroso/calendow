(function() {
	tinymce.PluginManager.add('cae_mce_button', function( editor, url ) {
		editor.addButton( 'cae_mce_button', {
/*			text: 'Pullquote',*/
			title: 'Add a Pullquote',
			icon: 'cae-icon',
			onclick: function() {
					editor.insertContent('[pullquote]...[/pullquote]');
				}
		});
	});
})();