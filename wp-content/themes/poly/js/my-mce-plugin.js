(function() {
	tinymce.create('tinymce.plugins.my_mce_plugin', {
        init: function(editor, url) {
            editor.addButton('my_mce_plugin', {
            	type: 'menubutton',
            	text: 'Polycrol shortcode',
                icon: false,
                menu: [
                	{
	                	text: 'Recent Video',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('recentvideo'); }
                	},
                	{
	                	text: 'Poly Product',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('poly_product'); }
                	},
                	{
	                	text: 'Adress and Map',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('poly_address'); }
                	},
                	{
	                	text: 'Recent Post',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('homerecentpost'); }
                	},
                	{
	                	text: 'Home Category',
	                	onclick: function() { tinyMCE.activeEditor.execCommand('home_category'); }
                	}
                ]
            });

            data = {};

            editor.addCommand('home_category', function() {
    		var data = {
        		title1 : 'Title Category 1',
        		img1: 'image url 1 from media library',
        		link1 : 'Url Category 1',
        		title2 : 'Title Category 2',
        		img2: 'image url 2 from media library',
        		link2 : 'Url Category 2',
        		title3 : 'Title Category 3',
        		img3: 'image url 3 from media library',
        		link3 : 'Url Category 3',
    			}
   			editor.windowManager.open({
        	title: 'Insert Product Detail',
        	data: data,
        	body: [
            		            		{
                		name: 'title1',
                		type: 'textbox',
                		label: 'Title 1',
                		value: data.title1,
                		onchange: function() { data.title1 = this.value(); }
            		},
            		{
                		name: 'title2',
                		type: 'textbox',
                		label: 'Title 2',
                		value: data.title2,
                		onchange: function() { data.title2 = this.value(); }
            		},
            		{
                		name: 'title3',
                		type: 'textbox',
                		label: 'Title 3',
                		value: data.title3,
                		onchange: function() { data.title3 = this.value(); }
            		},
            		{
                		name: 'img1',
                		type: 'textbox',
                		label: 'Image 1',
                		value: data.img1,
                		onchange: function() { data.img1 = this.value(); }
            		},
            		{
                		name: 'img2',
                		type: 'textbox',
                		label: 'Image 2',
                		value: data.img2,
                		onchange: function() { data.img2 = this.value(); }
            		},
            		{
                		name: 'img3',
                		type: 'textbox',
                		label: 'Image 3',
                		value: data.img3,
                		onchange: function() { data.img3 = this.value(); }
            		},
            		{
                		name: 'link1',
                		type: 'textbox',
                		label: 'link 1',
                		value: data.link1,
                		onchange: function() { data.link1 = this.value(); }
            		},
            		{
                		name: 'link2',
                		type: 'textbox',
                		label: 'link 2',
                		value: data.link2,
                		onchange: function() { data.link2 = this.value(); }
            		},
            		{
                		name: 'link3',
                		type: 'textbox',
                		label: 'link 3',
                		value: data.link3,
                		onchange: function() { data.link3 = this.value(); }
            		},
        		],
        			onSubmit: function(e) {
            		var shortcode = '[home_category';
            			data = tinymce.extend(data, e.data);

            			shortcode += ' img1="' + data.img1 + '"';
            			shortcode += ' img2="' + data.img2 + '"';
            			shortcode += ' img3="' + data.img3 + '"';
            			shortcode += ' title1="' + data.title1 + '"';
            			shortcode += ' title2="' + data.title2 + '"';
            			shortcode += ' title3="' + data.title3 + '"';
            			shortcode += ' link1="' + data.link1 + '"';
            			shortcode += ' link2="' + data.link2 + '"';
            			shortcode += ' link3="' + data.link3 + '"';
            			shortcode += ']';

            			tinymce.execCommand('mceInsertContent', false, shortcode);
        			}
    			});
			});

            editor.addCommand('homerecentpost', function() {
                tinymce.execCommand('mceInsertContent', false, '[homerecentpost]');
            });	

            editor.addCommand('recentvideo', function() {
                tinymce.execCommand('mceInsertContent', false, '[recentvideo]');
            });

			editor.addCommand('poly_product', function() {
    		var data = {
        		img1: 'image url from media library',
        		img2: 'image url from media library',
        		pr1 : 'Product Description',
        		pr2 : 'Product Description'
    			}
   			editor.windowManager.open({
        	title: 'Insert Product Detail',
        	data: data,
        	body: [
            		{
                		name: 'img1',
                		type: 'textbox',
                		label: 'Image 1',
                		value: data.img1,
                		onchange: function() { data.img1 = this.value(); }
            		},
            		{
                		name: 'img2',
                		type: 'textbox',
                		label: 'Image 2',
                		value: data.img2,
                		onchange: function() { data.img2 = this.value(); }
            		},
            		{
                		name: 'pr1',
                		type: 'textbox',
                		label: 'Product 1',
                		value: data.map,
                		onchange: function() { data.pr1 = this.value(); }
            		},
            		{
                		name: 'pr2',
                		type: 'textbox',
                		label: 'Product 2',
                		value: data.map,
                		onchange: function() { data.pr2 = this.value(); }
            		},
        		],
        			onSubmit: function(e) {
            		var shortcode = '[poly_product';
            			data = tinymce.extend(data, e.data);

            			shortcode += ' img1="' + data.img1 + '"';
            			shortcode += ' img2="' + data.img2 + '"';
            			shortcode += ' pr1="' + data.pr1 + '"';
            			shortcode += ' pr2="' + data.pr2 + '"';

            			shortcode += ']';

            			tinymce.execCommand('mceInsertContent', false, shortcode);
        			}
    			});
			});

			editor.addCommand('poly_address', function() {
    		var data = {
        		title: 'Default Title',
        		address: 'Default Address',
        		map : 'frame url from google maps'
    			}
   			editor.windowManager.open({
        	title: 'Insert Address and map',
        	data: data,
        	body: [
            		{
                		name: 'title',
                		type: 'textbox',
                		label: 'Title',
                		value: data.title,
                		onchange: function() { data.title = this.value(); }
            		},
            		{
                		name: 'address',
                		type: 'textbox',
                		label: 'Address',
                		value: data.address,
                		onchange: function() { data.address = this.value(); }
            		},
            		{
                		name: 'map',
                		type: 'textbox',
                		label: 'Map',
                		value: data.map,
                		onchange: function() { data.map = this.value(); }
            		},
        		],
        			onSubmit: function(e) {
            		var shortcode = '[poly_address';
            			data = tinymce.extend(data, e.data);

            			shortcode += ' title="' + data.title + '"';
            			shortcode += ' address="' + data.address + '"';
            			shortcode += ' map="' + data.map + '"';

            			shortcode += ']';

            			tinymce.execCommand('mceInsertContent', false, shortcode);
        			}
    			});
			});


        },
        createControl: function(n, cm) {
            return null;
        },
        getInfo: function() {
            return {
                longname : 'My MCE Plugin',
                author : 'laubsterboy',
                authorurl : 'http://laubsterboy.com',
                infourl : 'http://laubsterboy.com',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('my_mce_plugin', tinymce.plugins.my_mce_plugin);
})();

