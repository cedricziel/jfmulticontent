
<!-- ###TEMPLATE_TAB_JS### begin -->
jQuery(document).ready(function(){
	<!-- ###FIX_HREF### -->
	jQuery('####KEY### ul li a').each(function(id, item){
		var temp = item.href.split('#');
		var temp_last = temp[temp.length-1];
		var search = /^###PREG_QUOTE_KEY###/;
		if (search.test(temp[temp.length-1])){
			item.href = '#'+temp_last;
		}
	});
	<!-- ###FIX_HREF### -->
	jQuery('####KEY###').tabs({
		###OPTIONS###
	})###ROTATE###;
});
<!-- ###TEMPLATE_TAB_JS### end -->





<!-- ###TEMPLATE_ACCORDION_JS### begin -->
jQuery(document).ready(function(){
	jQuery('####KEY###').accordion({
		###OPTIONS###
	});
	<!-- ###SETTIMEOUT### -->
	setTimeout("tx_jfmulticontent_next_accordion(jQuery('####KEY###'),###CONTENT_COUNT###)", ###DELAY_DURATION###);
	<!-- ###SETTIMEOUT### -->
	<!-- ###CONTINUING### -->
	jQuery('####KEY###').click(function(){
		jQuery('####KEY###').accordion('option','change','');
	});
	<!-- ###CONTINUING### -->
});
<!-- ###AUTO_PLAY### -->
function tx_jfmulticontent_next_accordion(id, max) {
	if (jQuery(id).accordion('option', 'change') != '') {
		active = jQuery(id).accordion('option', 'active') + 1;
		active = (active >= max ? 0 : active);
		jQuery(id).accordion('activate', active);
	}
}
<!-- ###AUTO_PLAY### -->
<!-- ###EASING_ANIMATION### -->
jQuery.ui.accordion.animations.###KEY### = function(options) {
	this.slide(options, {
		easing: '###EASING###',
		duration: '###TRANS_DURATION###'
	});
};
<!-- ###EASING_ANIMATION### -->
<!-- ###TEMPLATE_ACCORDION_JS### end -->





<h2>TEMPLATE_SLIDER_JS:</h2>

<!-- ###TEMPLATE_SLIDER_JS### begin -->
jQuery(document).ready(function(){
	jQuery('####KEY###').anythingSlider({
		###OPTIONS###
	});
});
<!-- ###TEMPLATE_SLIDER_JS### end -->





<h2>TEMPLATE_SLIDEDECK_JS:</h2>

<!-- ###TEMPLATE_SLIDEDECK_JS### begin -->
jQuery(document).ready(function(){
	jQuery('####KEY###').parent().css({height: ###HEIGHT###});
	jQuery('####KEY###').slidedeck({
		###OPTIONS###
	});
});
<!-- ###TEMPLATE_SLIDEDECK_JS### end -->

