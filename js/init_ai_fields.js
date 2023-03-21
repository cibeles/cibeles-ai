				
jQuery("#titlediv").prepend(jQuery('#div_group_button_titlediv'));
jQuery('#div_group_button_titlediv').show();

document.addEventListener("DOMContentLoaded", () => {	
	jQuery("#div_group_button_tagsdiv").insertBefore(jQuery('#tagsdiv-post_tag'));
	jQuery('#div_group_button_tagsdiv').show();
	jQuery("#titlediv").prepend(jQuery('#div_group_button_postdiv'));
	jQuery("#div_group_button_postdiv").insertAfter(jQuery('#wp-content-media-buttons'));
	jQuery('#div_group_button_postdiv').show();
	
});

let caip_functions;

let caip_titular;
let caip_titularcorto;
let caip_clickbait;
let caip_tags;
let caip_autotags;
let caip_resumen;


document.addEventListener("DOMContentLoaded", () => {	
	
	caip_functions = new caip_Functions();
	
	jQuery('#div_button_titular').click(function() {
		caip_titular = new caip_Titular();
		if(!caip_titular.launched){
			caip_titular.launch();
		}
	});
	jQuery('#div_button_titularcorto').click(function() {
		caip_titularcorto = new caip_Titularcorto();
		if(!caip_titularcorto.launched){
			caip_titularcorto.launch();
		}
	});
	jQuery('#div_button_clickbait').click(function() {
		caip_clickbait = new caip_Clickbait();
		if(!caip_clickbait.launched){
			caip_clickbait.launch();
		}
	});
	
	jQuery('#div_button_tags').click(function() {
		caip_tags = new caip_Tags();
		if(!caip_tags.launched){
			caip_tags.launch();
		}
	});
	
	jQuery('#div_button_autotags').click(function() {
		caip_autotags = new caip_Autotags();
		if(!caip_autotags.launched){
			caip_autotags.launch();
		}
	});
	
	jQuery('#div_button_resumen').click(function() {
		caip_resumen = new caip_Resumen();
		if(!caip_resumen.launched){
			caip_resumen.launch();
		}
	});
	
	jQuery('#div_button_autoexcerpt').click(function() {
		caip_autoexcerpt = new caip_Autoexcerpt();
		if(!caip_autoexcerpt.launched){
			caip_autoexcerpt.launch();
		}
	});
	
	
});

