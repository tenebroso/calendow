(function() {
	tinymce.PluginManager.add('cae_mce_button', function( editor, url ) {
		editor.addButton( 'cae_mce_button', {
/*			text: 'Pullquote',*/
			title: 'Add a Pullquote',
			icon: 'fa fa fa-quote-left',
			onclick: function() {
					editor.insertContent('[pullquote]...[/pullquote]');
				}
		});
	});
	tinymce.PluginManager.add('cae_button', function( editor, url ) {
		editor.addButton( 'cae_button', {
/*			text: 'Pullquote',*/
			title: 'Add a Button',
			icon: 'fa fa fa-square',
			onclick: function() {
					editor.windowManager.open( {
				        title: 'Customize this Button. These values can be changed after the shortcode is placed.',
				        body: [{
				            type: 'textbox',
				            name: 'color',
				            label: 'Button Background (hex value)',
				            value: '#1f2233'
				        },
				        {
				            type: 'textbox',
				            name: 'hovercolor',
				            label: 'Button Background Hover Color (hex value)',
				            value: '#3A406D'
				        },
				        {
				            type: 'textbox',
				            name: 'textcolor',
				            label: 'Button Text Color (hex value)',
				            value: '#FFFFFF'
				        },
				        {
				            type: 'textbox',
				            name: 'text',
				            label: 'Button Text'
				        },
				        {
				            type: 'textbox',
				            name: 'link',
				            label: 'Link Destination'
				        }],
				        onsubmit: function( e ) {
				            editor.insertContent( '[button textcolor="' + e.data.textcolor + ' " bgcolor="' + e.data.color + '" bghovercolor="' + e.data.hovercolor + '" text="' + e.data.text + '" link="' + e.data.link + '" /]');
				        }
				    });
				}
		});
	});
})();