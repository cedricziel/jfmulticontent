<?php

########################################################################
# Extension Manager/Repository config file for ext "jfmulticontent".
#
# Auto generated 22-05-2010 12:17
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Multiple Content',
	'description' => 'Arranges multiple contents into one content element with multiple columns, accordeons, tabs or slider. This extension will also extend tt_news with two new lists. Use t3jquery for better integration with other jQuery extensions.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.5.1',
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
			'typo3' => '4.1.0-4.3.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:79:{s:20:"class.ext_update.php";s:4:"ce6e";s:21:"ext_conf_template.txt";s:4:"fca8";s:12:"ext_icon.gif";s:4:"2231";s:17:"ext_localconf.php";s:4:"f99d";s:14:"ext_tables.php";s:4:"5810";s:14:"ext_tables.sql";s:4:"37fb";s:15:"flexform_ds.xml";s:4:"7bdd";s:13:"locallang.xml";s:4:"f0b3";s:16:"locallang_db.xml";s:4:"3e45";s:48:"selicon_tt_content_tx_jfmulticontent_style_0.gif";s:4:"1f44";s:48:"selicon_tt_content_tx_jfmulticontent_style_1.gif";s:4:"7caf";s:48:"selicon_tt_content_tx_jfmulticontent_style_2.gif";s:4:"0e60";s:48:"selicon_tt_content_tx_jfmulticontent_style_3.gif";s:4:"8484";s:48:"selicon_tt_content_tx_jfmulticontent_style_4.gif";s:4:"0f67";s:48:"selicon_tt_content_tx_jfmulticontent_style_5.gif";s:4:"f2cb";s:12:"t3jquery.txt";s:4:"4855";s:24:"compat/flashmessages.css";s:4:"4e2c";s:20:"compat/gfx/error.png";s:4:"e4dd";s:26:"compat/gfx/information.png";s:4:"3750";s:21:"compat/gfx/notice.png";s:4:"a882";s:17:"compat/gfx/ok.png";s:4:"8bfe";s:22:"compat/gfx/warning.png";s:4:"c847";s:14:"doc/manual.sxw";s:4:"a335";s:45:"lib/class.tx_jfmulticontent_itemsProcFunc.php";s:4:"ffff";s:43:"lib/class.tx_jfmulticontent_tsparserext.php";s:4:"ff36";s:30:"lib/class.tx_ttnews_extend.php";s:4:"c129";s:14:"pi1/ce_wiz.gif";s:4:"ada0";s:35:"pi1/class.tx_jfmulticontent_pi1.php";s:4:"5521";s:43:"pi1/class.tx_jfmulticontent_pi1_wizicon.php";s:4:"ac72";s:13:"pi1/clear.gif";s:4:"cc11";s:17:"pi1/locallang.xml";s:4:"adc8";s:16:"pi1/tt_news.tmpl";s:4:"9a6b";s:29:"pi1/tx_jfmulticontent_pi1.css";s:4:"1abf";s:28:"pi1/tx_jfmulticontent_pi1.js";s:4:"d933";s:30:"pi1/tx_jfmulticontent_pi1.tmpl";s:4:"3464";s:49:"res/anythingslider/jquery.anythingslider-1.2.1.js";s:4:"503a";s:47:"res/anythingslider/jquery.anythingslider-1.2.js";s:4:"706c";s:28:"res/anythingslider/style.css";s:4:"1549";s:36:"res/anythingslider/images/arrows.png";s:4:"a233";s:39:"res/anythingslider/images/cellshade.png";s:4:"a492";s:54:"res/jquery/css/custom-theme/jquery-ui-1.7.2.custom.css";s:4:"f978";s:76:"res/jquery/css/custom-theme/images/ui-bg_diagonals-thick_18_b81900_40x40.png";s:4:"1c7f";s:76:"res/jquery/css/custom-theme/images/ui-bg_diagonals-thick_20_666666_40x40.png";s:4:"f040";s:66:"res/jquery/css/custom-theme/images/ui-bg_flat_10_000000_40x100.png";s:4:"c18c";s:67:"res/jquery/css/custom-theme/images/ui-bg_glass_100_f6f6f6_1x400.png";s:4:"5f18";s:67:"res/jquery/css/custom-theme/images/ui-bg_glass_100_fdf5ce_1x400.png";s:4:"d26e";s:66:"res/jquery/css/custom-theme/images/ui-bg_glass_65_ffffff_1x400.png";s:4:"e5a8";s:73:"res/jquery/css/custom-theme/images/ui-bg_gloss-wave_35_9f2614_500x100.png";s:4:"946d";s:76:"res/jquery/css/custom-theme/images/ui-bg_highlight-soft_100_eeeeee_1x100.png";s:4:"384c";s:75:"res/jquery/css/custom-theme/images/ui-bg_highlight-soft_75_ffe45c_1x100.png";s:4:"b806";s:62:"res/jquery/css/custom-theme/images/ui-icons_222222_256x240.png";s:4:"9129";s:62:"res/jquery/css/custom-theme/images/ui-icons_228ef1_256x240.png";s:4:"8d4d";s:62:"res/jquery/css/custom-theme/images/ui-icons_65160b_256x240.png";s:4:"9f31";s:62:"res/jquery/css/custom-theme/images/ui-icons_ef8c08_256x240.png";s:4:"47fc";s:62:"res/jquery/css/custom-theme/images/ui-icons_ffd27a_256x240.png";s:4:"f224";s:62:"res/jquery/css/custom-theme/images/ui-icons_ffffff_256x240.png";s:4:"2cc8";s:49:"res/jquery/css/theme-1.8/jquery-ui-1.8.custom.css";s:4:"4387";s:73:"res/jquery/css/theme-1.8/images/ui-bg_diagonals-thick_18_b81900_40x40.png";s:4:"95f9";s:73:"res/jquery/css/theme-1.8/images/ui-bg_diagonals-thick_20_666666_40x40.png";s:4:"f040";s:63:"res/jquery/css/theme-1.8/images/ui-bg_flat_10_000000_40x100.png";s:4:"c18c";s:64:"res/jquery/css/theme-1.8/images/ui-bg_glass_100_f6f6f6_1x400.png";s:4:"5f18";s:64:"res/jquery/css/theme-1.8/images/ui-bg_glass_100_fdf5ce_1x400.png";s:4:"d26e";s:63:"res/jquery/css/theme-1.8/images/ui-bg_glass_65_ffffff_1x400.png";s:4:"e5a8";s:70:"res/jquery/css/theme-1.8/images/ui-bg_gloss-wave_35_9f2614_500x100.png";s:4:"946d";s:73:"res/jquery/css/theme-1.8/images/ui-bg_highlight-soft_100_eeeeee_1x100.png";s:4:"384c";s:72:"res/jquery/css/theme-1.8/images/ui-bg_highlight-soft_75_ffe45c_1x100.png";s:4:"b806";s:59:"res/jquery/css/theme-1.8/images/ui-icons_222222_256x240.png";s:4:"ebe6";s:59:"res/jquery/css/theme-1.8/images/ui-icons_228ef1_256x240.png";s:4:"79f4";s:59:"res/jquery/css/theme-1.8/images/ui-icons_65160b_256x240.png";s:4:"27ac";s:59:"res/jquery/css/theme-1.8/images/ui-icons_ef8c08_256x240.png";s:4:"ef9a";s:59:"res/jquery/css/theme-1.8/images/ui-icons_ffd27a_256x240.png";s:4:"ab8c";s:59:"res/jquery/css/theme-1.8/images/ui-icons_ffffff_256x240.png";s:4:"342b";s:33:"res/jquery/js/jquery-1.3.2.min.js";s:4:"7d91";s:33:"res/jquery/js/jquery-1.4.2.min.js";s:4:"1009";s:43:"res/jquery/js/jquery-ui-1.7.2.custom.min.js";s:4:"fca3";s:41:"res/jquery/js/jquery-ui-1.8.custom.min.js";s:4:"2ede";s:34:"res/jquery/js/jquery.easing-1.3.js";s:4:"a6f7";s:20:"static/constants.txt";s:4:"91e7";s:16:"static/setup.txt";s:4:"a28c";}',
	'suggests' => array(
	),
);

?>