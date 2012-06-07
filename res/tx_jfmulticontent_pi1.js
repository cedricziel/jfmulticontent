<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<TITLE>Multi Content JS-Template</TITLE>
</head>
<body>

<h1>Multi Content JS-Template</h1>

<br />
<br />
<br />

<em>Common markers:</em>
KEY - Unique key of the multicontent
OPTIONS - Set the JS-options defined in FlexForm

<em>Tabs markers:</em>
OPEN_EXTERNAL_LINK - Subpart for the JS to open the url in the rel-attribute (only if openExternalLink is set in EXT-Config)
PREG_QUOTE_KEY - Unique key of the multicontent preg_quoted
FIX_HREF - Subpart to fix hrefs when config.prefixLocalAnchors is set
ROTATE - Set the JS for autoplay

<em>Accordion markers:</em>
OPEN_EXTERNAL_LINK - Subpart for the JS to open the url in the rel-attribute (only if openExternalLink is set in EXT-Config)
CONTENT_COUNT - Count of the contents
EASING_ANIMATION - Subpart for the easing definition
EASING - Used easing transition
TRANS_DURATION - Duration of the transition
DELAY_DURATION - Delay of the autolpay
AUTO_PLAY - Subpart for the autoplay
SETTIMEOUT - Subpart for timer of autoplay
CONTINUING - Subpart to stop the autoplay in case of user action

<em>Slidedeck markers:</em>
HEIGHT - Set the defined height of the easyaccordion

<em>Easyaccordion markers:</em>
WIDTH - Set the defined width of the easyaccordion





<!-- ###TEMPLATE_TAB_JS### begin -->
jQuery(document).ready(function(){
	<!-- ###FIX_HREF### -->
	jQuery('####KEY### > ul li a').each(function(id, item){
		var temp = item.href.split('#');
		var temp_last = temp[temp.length-1];
		if (jQuery('####KEY### #'+temp_last).length) {
			item.href = '#'+temp_last;
		}
	});
	<!-- ###FIX_HREF### -->
	jQuery('####KEY###').tabs({
		###OPTIONS###
	})###ROTATE###;
	<!-- ###OPEN_EXTERNAL_LINK### -->
	jQuery('####KEY###').bind('tabsselect', function(e, ui) {
		var rel = jQuery(ui.tab).attr('rel');
		if (typeof(rel) != 'undefined' && rel.length > 0) {
			document.location.href = rel;
		}
	});
	<!-- ###OPEN_EXTERNAL_LINK### -->
});
<!-- ###TEMPLATE_TAB_JS### end -->





<!-- ###TEMPLATE_ACCORDION_JS### begin -->
jQuery(document).ready(function(){
	jQuery('####KEY###').accordion({
		###OPTIONS###
	});
	<!-- ###OPEN_EXTERNAL_LINK### -->
	jQuery('####KEY###').bind('accordionchangestart', function(e, ui) {
		var rel = jQuery(ui.newHeader).find('a').attr('rel');
		if (typeof(rel) != 'undefined' && rel.length > 0) {
			document.location.href = rel;
		}
	});
	<!-- ###OPEN_EXTERNAL_LINK### -->
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
	jQuery('####KEY###').css({height: '###HEIGHT###px'});
	jQuery('####KEY###').slidedeck({
		###OPTIONS###
	});
});
<!-- ###TEMPLATE_SLIDEDECK_JS### end -->





<h2>TEMPLATE_EASYACCORDION_JS:</h2>

<!-- ###TEMPLATE_EASYACCORDION_JS### begin -->
jQuery(document).ready(function(){
	jQuery('####KEY###, ####KEY### dl').css({width: '###WIDTH###px'});
	jQuery('####KEY###').easyAccordion({
		###OPTIONS###
	});
});
<!-- ###TEMPLATE_EASYACCORDION_JS### end -->





<h2>TEMPLATE_BOOKLET_JS:</h2>

<!-- ###TEMPLATE_BOOKLET_JS### begin -->
jQuery(document).ready(function(){
	jQuery('####KEY###').booklet({
		###OPTIONS###
	});
});
<!-- ###TEMPLATE_BOOKLET_JS### end -->





</pre>


</body>
</html>
