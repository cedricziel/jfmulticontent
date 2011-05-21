<?php

########################################################################
# Extension Manager/Repository config file for ext "jfmulticontent".
#
# Auto generated 21-05-2011 16:17
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Multiple Content',
	'description' => 'Arranges multiple contents into one content element with multiple columns, accordions, tabs, slider, slidedeck, easyAccordion or Booklet (Sponsored by http://www.made-in-nature.de/typo3-agentur.html). This extension will also extend tt_news with two new lists. Use t3jquery for better integration with other jQuery extensions.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '2.4.0',
	'dependencies' => 'cms',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Juergen Furrer',
	'author_email' => 'juergen.furrer@gmail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'php' => '5.0.0-5.3.99',
			'typo3' => '4.3.0-4.5.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:140:{s:20:"class.ext_update.php";s:4:"e410";s:21:"ext_conf_template.txt";s:4:"ac50";s:12:"ext_icon.gif";s:4:"2231";s:17:"ext_localconf.php";s:4:"8ac0";s:14:"ext_tables.php";s:4:"f871";s:14:"ext_tables.sql";s:4:"95ab";s:15:"flexform_ds.xml";s:4:"340f";s:13:"locallang.xml";s:4:"25e0";s:16:"locallang_db.xml";s:4:"383e";s:54:"selicon_tt_content_tx_jfmulticontent_columnOrder_0.gif";s:4:"e7df";s:54:"selicon_tt_content_tx_jfmulticontent_columnOrder_1.gif";s:4:"69da";s:54:"selicon_tt_content_tx_jfmulticontent_columnOrder_2.gif";s:4:"d72a";s:54:"selicon_tt_content_tx_jfmulticontent_columnOrder_3.gif";s:4:"0ac6";s:54:"selicon_tt_content_tx_jfmulticontent_columnOrder_4.gif";s:4:"089e";s:48:"selicon_tt_content_tx_jfmulticontent_style_0.gif";s:4:"1f44";s:48:"selicon_tt_content_tx_jfmulticontent_style_1.gif";s:4:"7caf";s:48:"selicon_tt_content_tx_jfmulticontent_style_2.gif";s:4:"0e60";s:48:"selicon_tt_content_tx_jfmulticontent_style_3.gif";s:4:"8484";s:48:"selicon_tt_content_tx_jfmulticontent_style_4.gif";s:4:"0f67";s:48:"selicon_tt_content_tx_jfmulticontent_style_5.gif";s:4:"f2cb";s:48:"selicon_tt_content_tx_jfmulticontent_style_6.gif";s:4:"1c40";s:48:"selicon_tt_content_tx_jfmulticontent_style_7.gif";s:4:"cb65";s:48:"selicon_tt_content_tx_jfmulticontent_style_8.gif";s:4:"cd58";s:48:"selicon_tt_content_tx_jfmulticontent_style_9.gif";s:4:"a42b";s:12:"t3jquery.txt";s:4:"a385";s:24:"compat/flashmessages.css";s:4:"4e2c";s:20:"compat/gfx/error.png";s:4:"e4dd";s:26:"compat/gfx/information.png";s:4:"3750";s:21:"compat/gfx/notice.png";s:4:"a882";s:17:"compat/gfx/ok.png";s:4:"8bfe";s:22:"compat/gfx/warning.png";s:4:"c847";s:14:"doc/manual.sxw";s:4:"99dc";s:42:"lib/class.tx_jfmulticontent_cms_layout.php";s:4:"4a20";s:45:"lib/class.tx_jfmulticontent_itemsProcFunc.php";s:4:"8060";s:39:"lib/class.tx_jfmulticontent_tceFunc.php";s:4:"9665";s:43:"lib/class.tx_jfmulticontent_tsparserext.php";s:4:"adca";s:45:"lib/class.tx_jfmulticontent_ttnews_extend.php";s:4:"5129";s:14:"pi1/ce_wiz.gif";s:4:"ada0";s:35:"pi1/class.tx_jfmulticontent_pi1.php";s:4:"f23f";s:43:"pi1/class.tx_jfmulticontent_pi1_wizicon.php";s:4:"90bc";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"6c77";s:16:"res/tt_news.tmpl";s:4:"fa4a";s:29:"res/tx_jfmulticontent_pi1.css";s:4:"83c2";s:28:"res/tx_jfmulticontent_pi1.js";s:4:"3de4";s:30:"res/tx_jfmulticontent_pi1.tmpl";s:4:"ea8f";s:50:"res/anythingslider/jquery.anythingslider-1.5.12.js";s:4:"cb91";s:54:"res/anythingslider/jquery.anythingslider-1.5.12.min.js";s:4:"c736";s:31:"res/anythingslider/style-ie.css";s:4:"e469";s:28:"res/anythingslider/style.css";s:4:"f4e5";s:36:"res/anythingslider/images/arrows.png";s:4:"a233";s:39:"res/anythingslider/images/cellshade.png";s:4:"a492";s:48:"res/anythingslider/themes/construction/style.css";s:4:"6055";s:56:"res/anythingslider/themes/construction/images/arrows.gif";s:4:"714b";s:53:"res/anythingslider/themes/construction/images/nav.png";s:4:"668e";s:48:"res/anythingslider/themes/cs-portfolio/style.css";s:4:"248f";s:56:"res/anythingslider/themes/cs-portfolio/images/arrows.jpg";s:4:"58c3";s:52:"res/anythingslider/themes/cs-portfolio/images/bg.jpg";s:4:"6a1b";s:53:"res/anythingslider/themes/cs-portfolio/images/nav.png";s:4:"1b47";s:44:"res/anythingslider/themes/metallic/style.css";s:4:"6291";s:52:"res/anythingslider/themes/metallic/images/arrows.png";s:4:"9f9e";s:52:"res/anythingslider/themes/minimalist-round/style.css";s:4:"0a26";s:60:"res/anythingslider/themes/minimalist-round/images/arrows.png";s:4:"1f16";s:53:"res/anythingslider/themes/minimalist-square/style.css";s:4:"c3d6";s:61:"res/anythingslider/themes/minimalist-square/images/arrows.png";s:4:"1f16";s:36:"res/booklet/jquery.booklet-1.2.0.css";s:4:"9e1d";s:35:"res/booklet/jquery.booklet-1.2.0.js";s:4:"122c";s:39:"res/booklet/jquery.booklet-1.2.0.min.js";s:4:"23c7";s:35:"res/booklet/jquery.booklet.1.1.0.js";s:4:"37e2";s:33:"res/booklet/images/arrow-next.png";s:4:"902b";s:33:"res/booklet/images/arrow-prev.png";s:4:"9a1d";s:33:"res/booklet/images/closedhand.cur";s:4:"a8c8";s:31:"res/booklet/images/openhand.cur";s:4:"b06c";s:38:"res/booklet/images/shadow-top-back.png";s:4:"e990";s:41:"res/booklet/images/shadow-top-forward.png";s:4:"f7db";s:29:"res/booklet/images/shadow.png";s:4:"5a40";s:45:"res/easyaccordion/jquery.easyAccordion-0.1.js";s:4:"c5e0";s:27:"res/easyaccordion/style.css";s:4:"c299";s:38:"res/easyaccordion/skins/blue/style.css";s:4:"6117";s:58:"res/easyaccordion/skins/blue/images/slide-title-active.jpg";s:4:"151d";s:60:"res/easyaccordion/skins/blue/images/slide-title-inactive.jpg";s:4:"f1bf";s:45:"res/easyaccordion/skins/blue/images/slide.jpg";s:4:"fd96";s:40:"res/easyaccordion/skins/orange/style.css";s:4:"1be6";s:60:"res/easyaccordion/skins/orange/images/slide-title-active.jpg";s:4:"39de";s:62:"res/easyaccordion/skins/orange/images/slide-title-inactive.jpg";s:4:"ff42";s:47:"res/easyaccordion/skins/orange/images/slide.jpg";s:4:"fd96";s:55:"res/jquery/css/theme-1.8.13/jquery-ui-1.8.13.custom.css";s:4:"32a9";s:76:"res/jquery/css/theme-1.8.13/images/ui-bg_diagonals-thick_18_b81900_40x40.png";s:4:"95f9";s:76:"res/jquery/css/theme-1.8.13/images/ui-bg_diagonals-thick_20_666666_40x40.png";s:4:"f040";s:66:"res/jquery/css/theme-1.8.13/images/ui-bg_flat_10_000000_40x100.png";s:4:"c18c";s:67:"res/jquery/css/theme-1.8.13/images/ui-bg_glass_100_f6f6f6_1x400.png";s:4:"5f18";s:67:"res/jquery/css/theme-1.8.13/images/ui-bg_glass_100_fdf5ce_1x400.png";s:4:"d26e";s:66:"res/jquery/css/theme-1.8.13/images/ui-bg_glass_65_ffffff_1x400.png";s:4:"e5a8";s:73:"res/jquery/css/theme-1.8.13/images/ui-bg_gloss-wave_35_9f2614_500x100.png";s:4:"da5d";s:76:"res/jquery/css/theme-1.8.13/images/ui-bg_highlight-soft_100_eeeeee_1x100.png";s:4:"384c";s:75:"res/jquery/css/theme-1.8.13/images/ui-bg_highlight-soft_75_ffe45c_1x100.png";s:4:"b806";s:62:"res/jquery/css/theme-1.8.13/images/ui-icons_222222_256x240.png";s:4:"ebe6";s:62:"res/jquery/css/theme-1.8.13/images/ui-icons_228ef1_256x240.png";s:4:"79f4";s:62:"res/jquery/css/theme-1.8.13/images/ui-icons_65160b_256x240.png";s:4:"8250";s:62:"res/jquery/css/theme-1.8.13/images/ui-icons_ef8c08_256x240.png";s:4:"ef9a";s:62:"res/jquery/css/theme-1.8.13/images/ui-icons_ffd27a_256x240.png";s:4:"ab8c";s:62:"res/jquery/css/theme-1.8.13/images/ui-icons_ffffff_256x240.png";s:4:"342b";s:33:"res/jquery/js/jquery-1.6.1.min.js";s:4:"a34f";s:44:"res/jquery/js/jquery-ui-1.8.13.custom.min.js";s:4:"0e9c";s:31:"res/jquery/js/jquery.cookies.js";s:4:"dcd2";s:34:"res/jquery/js/jquery.easing-1.3.js";s:4:"a6f7";s:44:"res/jquery/js/jquery.mousewheel-3.0.2.min.js";s:4:"f753";s:34:"res/slidedeck/jquery.lite-1.2.2.js";s:4:"75ef";s:38:"res/slidedeck/jquery.lite-1.2.2.min.js";s:4:"1cbd";s:39:"res/slidedeck/jquery.lite-1.2.2.pack.js";s:4:"5da1";s:36:"res/slidedeck/skins/default/back.png";s:4:"f3cf";s:38:"res/slidedeck/skins/default/corner.png";s:4:"cb3b";s:39:"res/slidedeck/skins/default/skin-ie.css";s:4:"0591";s:36:"res/slidedeck/skins/default/skin.css";s:4:"9e4e";s:38:"res/slidedeck/skins/default/slides.png";s:4:"55b1";s:38:"res/slidedeck/skins/default/spines.png";s:4:"9406";s:43:"res/slidedeck/skins/invasion/background.jpg";s:4:"306b";s:37:"res/slidedeck/skins/invasion/skin.css";s:4:"5206";s:39:"res/slidedeck/skins/invasion/slides.png";s:4:"9c80";s:39:"res/slidedeck/skins/invasion/spines.jpg";s:4:"2acb";s:46:"res/slidedeck/skins/literally/index_sprite.png";s:4:"de4e";s:38:"res/slidedeck/skins/literally/skin.css";s:4:"cf3e";s:42:"res/slidedeck/skins/literally/skin.ie7.css";s:4:"1d91";s:42:"res/slidedeck/skins/literally/skin.ie8.css";s:4:"aaeb";s:39:"res/slidedeck/skins/literally/slide.png";s:4:"9dac";s:40:"res/slidedeck/skins/literally/spines.png";s:4:"cbea";s:36:"res/slidedeck/skins/ribbons/skin.css";s:4:"a0ad";s:39:"res/slidedeck/skins/ribbons/skin.ie.css";s:4:"ecf5";s:38:"res/slidedeck/skins/ribbons/slides.png";s:4:"7748";s:38:"res/slidedeck/skins/ribbons/spines.png";s:4:"c71d";s:38:"res/slidedeck/skins/stitch/corners.png";s:4:"0fc6";s:35:"res/slidedeck/skins/stitch/skin.css";s:4:"5316";s:36:"res/slidedeck/skins/stitch/slide.png";s:4:"c162";s:37:"res/slidedeck/skins/stitch/spines.jpg";s:4:"896c";s:38:"res/slidedeck/skins/voyager/corner.png";s:4:"4f53";s:36:"res/slidedeck/skins/voyager/skin.css";s:4:"fa55";s:38:"res/slidedeck/skins/voyager/slides.png";s:4:"9195";s:38:"res/slidedeck/skins/voyager/spines.png";s:4:"0e1d";s:20:"static/constants.txt";s:4:"3dfe";s:16:"static/setup.txt";s:4:"6e04";}',
	'suggests' => array(
	),
);

?>