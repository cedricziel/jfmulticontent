<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Juergen Furrer <juergen.furrer@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');

if (t3lib_extMgm::isLoaded('t3jquery')) {
	require_once(t3lib_extMgm::extPath('t3jquery').'class.tx_t3jquery.php');
}


/**
 * Plugin 'Multiple Content' for the 'jfmulticontent' extension.
 *
 * @author     Juergen Furrer <juergen.furrer@gmail.com>
 * @package    TYPO3
 * @subpackage tx_jfmulticontent
 */
class tx_jfmulticontent_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_jfmulticontent_pi1';               // Same as class name
	var $scriptRelPath = 'pi1/class.tx_jfmulticontent_pi1.php'; // Path to this script relative to the extension dir.
	var $extKey        = 'jfmulticontent';                     // The extension key.
	var $pi_checkCHash = true;
	var $lConf = array();
	var $templateFile = null;
	var $templatePart = null;
	var $contentKey = null;
	var $contentCount = null;
	var $contentClass = array();
	var $contentWrap = array();
	var $jsFiles = array();
	var $js = array();
	var $cssFiles = array();
	var $css = array();
	var $titles = array();
	var $attributes = array();
	var $cElements = array();

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf)
	{
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		// Set the Flexform information
		$this->pi_initPIflexForm();
		$piFlexForm = $this->cObj->data['pi_flexform'];
		foreach ($piFlexForm['data'] as $sheet => $data) {
			foreach ($data as $lang => $value) {
				foreach ($value as $key => $val) {
					$this->lConf[$key] = $this->pi_getFFvalue($piFlexForm, $key, $sheet);
				}
			}
		}

		// The template
		if ($this->conf['templateFile']) {
			$this->templateFile = $this->cObj->fileResource($this->conf['templateFile']);
		} else {
			return "<p>NO TEMPLATE FOUND!</p>";
		}

		// get the content ID's
		$this->cElements = t3lib_div::trimExplode(",", $this->cObj->data['tx_jfmulticontent_contents']);
		if ($this->contentCount === null) {
			$this->contentCount = count($this->cElements);
		}

		// add the CSS file
		$this->addCssFile($this->conf['cssFile']);

		// define the key of the element
		$this->contentKey = "jfmulticontent_c" . $this->cObj->data['uid'];

		// define the titles to overwrite
		if ($this->lConf['titles']) {
			$this->titles = t3lib_div::trimExplode(chr(10), $this->lConf['titles']);
		}

		// define the attributes
		if ($this->lConf['attributes']) {
			$this->attributes = t3lib_div::trimExplode(chr(10), $this->lConf['attributes']);
		}

		// define the jQuery mode and function
		if ($this->conf['jQueryNoConflict']) {
			$jQueryNoConflict = "jQuery.noConflict();";
		} else {
			$jQueryNoConflict = "";
		}

		// style
		switch ($this->lConf['style']) {
			case "2colomn" : {
				$this->templatePart = "TEMPLATE_COLUMNS";
				$this->contentCount = 2;
				$this->contentClass = t3lib_div::trimExplode("|*|", $this->conf['2columnClasses']);
				$this->contentWrap = t3lib_div::trimExplode("|*|", $this->conf['columnWrap.']['wrap']);
				break;
			}
			case "3colomn" : {
				$this->templatePart = "TEMPLATE_COLUMNS";
				$this->contentCount = 3;
				$this->contentClass = t3lib_div::trimExplode("|*|", $this->conf['3columnClasses']);
				$this->contentWrap = t3lib_div::trimExplode("|*|", $this->conf['columnWrap.']['wrap']);
				break;
			}
			case "4colomn" : {
				$this->templatePart = "TEMPLATE_COLUMNS";
				$this->contentCount = 4;
				$this->contentClass = t3lib_div::trimExplode("|*|", $this->conf['4columnClasses']);
				$this->contentWrap = t3lib_div::trimExplode("|*|", $this->conf['columnWrap.']['wrap']);
				break;
			}
			case "tab" : {
				$this->templatePart = "TEMPLATE_TAB";
				$this->contentWrap = t3lib_div::trimExplode("|*|", $this->conf['tabWrap.']['wrap']);
				// the id attribute is not permitted in tabs-style
				if (count($this->attributes) > 0) {
					foreach ($this->attributes as $key => $attribute) {
						if (preg_match("/id=[\"|\'](.*?)[\"|\']/i", $attribute, $preg)) {
							$this->attributes[$key] = trim(str_replace($preg[0], "", $attribute));
						}
					}
				}
				// jQuery Tabs
				$this->addJS(chr(10).$jQueryNoConflict);
				$fx = array();
				if ($this->lConf['tabFxHeight']) {
					$fx[] = "height: 'toggle'";
				}
				if ($this->lConf['tabFxOpacity']) {
					$fx[] = "opacity: 'toggle'";
				}
				if ($this->lConf['tabFxDuration'] > 0) {
					$fx[] = "duration: '{$this->lConf['tabFxDuration']}'";
				}
				if ($this->lConf['delayDuration'] > 0) {
					$rotate = ".tabs('rotate' , {$this->lConf['delayDuration']}, ".($this->lConf['autoplayContinuing'] ? 'true' : 'false').")";
				}
				$options = array();
				if (count($fx) > 0) {
					$options[] = "fx:{".implode(",", $fx)."}";
				}
				if ($this->lConf['tabCollapsible']) {
					$options[] = "collapsible:true";
				}
				if ($this->lConf['tabRandomContent']) {
					$options[] = "selected:Math.floor(Math.random()*{$this->contentCount})";
				} elseif (is_numeric($this->lConf['tabOpen'])) {
					$options[] = "selected:".($this->lConf['tabOpen'] - 1);
				}
				if (T3JQUERY === true) {
					tx_t3jquery::addJqJS();
				} else {
					$this->addJsFile($this->conf['jQueryLibrary']);
					$this->addJsFile($this->conf['jQueryUI']);
				}
				// Fix the href problem (optimizing)
				if ($this->conf['jQueryFixTabHref']) {
					$fixTabHref = "
	jQuery('#{$this->contentKey} ul li a').each(function(id, item) {
		if (item.href.indexOf('{$this->contentKey}')) {
			temp = item.href.split('#');
			item.href = '#'+temp[temp.length-1];
		}
	});";
				} else {
					$fixTabHref = null;
				}
				$this->addCssFile($this->conf['jQueryUIstyle']);
				$this->addJS("
jQuery(document).ready(function() { {$fixTabHref}
	jQuery('#{$this->contentKey}').tabs(".(count($options) ? "{".implode(", ", $options)."}" : "")."){$rotate};
});");
				break;
			}
			case "accordion" : {
				$this->templatePart = "TEMPLATE_ACCORDION";
				$this->contentWrap = t3lib_div::trimExplode("|*|", $this->conf['accordionWrap.']['wrap']);
				$this->addJS(chr(10).$jQueryNoConflict);
				$options = array();
				if (! $this->lConf['accordionAutoHeight']) {
					$options['autoHeight'] = "autoHeight:false";
				}
				if ($this->lConf['accordionCollapsible']) {
					$options['collapsible'] = "collapsible:true";
				}
				if ($this->lConf['accordionClosed']) {
					$options['active'] = "active:false";
					$options['collapsible'] = "collapsible:true";
				} elseif ($this->lConf['accordionRandomContent']) {
					$options['active'] = "active:Math.floor(Math.random()*{$this->contentCount})";
				} elseif (is_numeric($this->lConf['accordionOpen'])) {
					$options['active'] = "active:".($this->lConf['accordionOpen'] - 1);
				}
				if ($this->lConf['accordionEvent']) {
					$options['event'] = "event:'{$this->lConf['accordionEvent']}'";
				}
				if ($this->lConf['accordionTransition']) {
					$options['animated'] = "animated:'{$this->contentKey}'";
					$this->addJS("
jQuery.ui.accordion.animations.{$this->contentKey} = function(options) {
	this.slide(options, {
		easing: '".(in_array($this->lConf['accordionTransition'], array("swing", "linear")) ? "" : "ease{$this->lConf['accordionTransitiondir']}")."{$this->lConf['accordionTransition']}',
		duration: ".(is_numeric($this->lConf['accordionTransitionduration']) ? $this->lConf['accordionTransitionduration'] : 1000)."
	});
};");
				} else if ($this->lConf['accordionAnimated']) {
					$options['animated'] = "animated:'{$this->lConf['accordionAnimated']}'";
				}
				$continuing = "";
				if ($this->lConf['delayDuration'] > 0) {
					// does not work if (! $this->lConf['autoplayContinuing']) {}
					$continuing = "
	jQuery('#{$this->contentKey}').click(function(){jQuery('#{$this->contentKey}').accordion('option', 'change', '');});";
					$settimeout = "setTimeout(\"tx_jfmulticontent_next_accordion(jQuery('#{$this->contentKey}'),{$this->contentCount})\", {$this->lConf['delayDuration']});";
					$this->addJS(chr(10).$settimeout);
					$options['change'] = "change:function(event,ui){{$settimeout}}";
					$this->addJS("
function tx_jfmulticontent_next_accordion(id, max) {
	if (jQuery(id).accordion('option', 'change') != '') {
		active = jQuery(id).accordion('option', 'active') + 1;
		active = (active >= max ? 0 : active);
		jQuery(id).accordion('activate', active);
	}
}");
				}
				// jQuery Accordion
				if (T3JQUERY === true) {
					tx_t3jquery::addJqJS();
				} else {
					$this->addJsFile($this->conf['jQueryLibrary']);
					$this->addJsFile($this->conf['jQueryEasing']);
					$this->addJsFile($this->conf['jQueryUI']);
				}
				$this->addCssFile($this->conf['jQueryUIstyle']);
				$this->addJS("
jQuery(document).ready(function() {
	jQuery('#{$this->contentKey}').accordion(".(count($options) ? "{".implode(", ", $options)."}" : "").");{$continuing}
});");
				break;
			}
			default: {
				return "<p>NO VALID TEMPLATE SELECTED!</p>";
			}
		}

		// Add the ressources
		$this->addResources();

		// Render the Template
		$content = $this->renderTemplate();

		return $this->pi_wrapInBaseClass($content);
	}

	/**
	 * Render the template with the defined contents
	 * 
	 * @return string
	 */
	function renderTemplate()
	{
		$markerArray = array();
		// get the template
		$templateCode = $this->cObj->getSubpart($this->templateFile, "###{$this->templatePart}###");
		// Replace default values
		$markerArray["KEY"] = $this->contentKey;
		$templateCode = $this->cObj->substituteMarkerArray($templateCode, $markerArray, '###|###', 0);
		// Get the title template
		$titleCode = $this->cObj->getSubpart($templateCode, "###TITLES###");
		// Get the column template
		$columnCode = $this->cObj->getSubpart($templateCode, "###COLUMNS###");
		// Define the contentWrap
		switch (count($this->contentWrap)) {
			case 1 : {
				$contentWrap_array = array(
					$this->contentWrap[0],
					$this->contentWrap[0],
					$this->contentWrap[0],
				);
				break;
			}
			case 2 : {
				$contentWrap_array = array(
					$this->contentWrap[0],
					$this->contentWrap[0],
					$this->contentWrap[1],
				);
				break;
			}
			case 3 : {
				$contentWrap_array = $this->contentWrap;
				break;
			}
			default: {
				$contentWrap_array = array(
					null,
					null,
					null
				);
				break;
			}
		}
		// fetch all contents
		for ($a=0; $a < $this->contentCount; $a++) {
			$markerArray = array();
			// get the attribute if exist
			$markerArray["ATTRIBUTE"] = "";
			if ($this->attributes[$a] != '') {
				$markerArray["ATTRIBUTE"] .= ' ' . $this->attributes[$a];
			}
			// if the attribute does not have a class entry, the class will be wraped for yaml (c33l, c33l, c33r)
			if ($this->lConf["column".($a+1)] > 0 && isset($this->contentClass[$a]) && ! preg_match("/class\=/i", $markerArray["ATTRIBUTE"])) {
				// wrap the class
				$markerArray["ATTRIBUTE"] .= $this->cObj->stdWrap($this->lConf["column".($a+1)], array("wrap" => ' class="'.$this->contentClass[$a].'"', "required" => 1));
			}
			// render the content
			$markerArray["ID"] = $a+1;
			$markerArray["TITLE"] = null;
			// Title will be selected if not COLUMNS (TAB / ACCORDION)
			if ($this->templatePart != "TEMPLATE_COLUMNS") {
				// overwrite the title if set in $this->titles
				if ($this->titles[$a] != '') {
					$markerArray["TITLE"] = $this->titles[$a];
				} else {
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('header','tt_content','uid='.intval($this->cElements[$a]),'','',1);
					$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
					$markerArray["TITLE"] = $row['header'];
				}
			}
			// define the used wrap
			if ($a == 0) {
				$wrap = $contentWrap_array[0];
			} elseif (($a+1) == $this->contentCount) {
				$wrap = $contentWrap_array[2];
			} else {
				$wrap = $contentWrap_array[1];
			}
			// define content conf
			// TODO: Remove the title from content
			$cConf = array(
				'tables' => 'tt_content',
				'source' => $this->cElements[$a],
				'dontCheckPid' => 1,
			);
			// wrap the content
			$markerArray["CONTENT"] = $this->cObj->stdWrap($this->cObj->RECORDS($cConf), array('wrap' => $wrap));;
			if ($markerArray["CONTENT"]) {
				// add content to COLUMNS
				$columns .= $this->cObj->substituteMarkerArray($columnCode, $markerArray, '###|###', 0);
				// add content to TITLE
				$titles .= $this->cObj->substituteMarkerArray($titleCode, $markerArray, '###|###', 0);
			}
		}

		$return_string = $templateCode;
		$return_string = $this->cObj->substituteSubpart($return_string, '###TITLES###', $titles, 0);
		$return_string = $this->cObj->substituteSubpart($return_string, '###COLUMNS###', $columns, 0);
		
		return $return_string;
	}

	/**
	 * Include all defined resources (JS / CSS)
	 *
	 * @return void
	 */
	function addResources() {
		// add all defined JS files
		if (count($this->jsFiles) > 0) {
			foreach ($this->jsFiles as $jsToLoad) {
				// Add script only once
				if (! preg_match("/".preg_quote($this->getPath($jsToLoad), "/")."/", $GLOBALS['TSFE']->additionalHeaderData['jsFile_'.$this->extKey])) {
					$GLOBALS['TSFE']->additionalHeaderData['jsFile_'.$this->extKey] .= ($this->getPath($jsToLoad) ? '<script src="'.$this->getPath($jsToLoad).'" type="text/javascript"></script>'.chr(10) :'');
				}
			}
		}
		// add all defined JS script
		if (count($this->js) > 0) {
			foreach ($this->js as $jsToPut) {
				$temp_js .= $jsToPut;
			}
			if ($this->conf['jsInFooter']) {
				$GLOBALS['TSFE']->additionalFooterData['js_'.$this->extKey] .= t3lib_div::wrapJS($temp_js, true);
			} else {
				$GLOBALS['TSFE']->additionalHeaderData['js_'.$this->extKey] .= t3lib_div::wrapJS($temp_js, true);
			}
		}
		// add all defined CSS files
		if (count($this->cssFiles) > 0) {
			foreach ($this->cssFiles as $cssToLoad) {
				// Add script only once
				if (! preg_match("/".preg_quote($this->getPath($cssToLoad), "/")."/", $GLOBALS['TSFE']->additionalHeaderData['cssFile_'.$this->extKey])) {
					$GLOBALS['TSFE']->additionalHeaderData['cssFile_'.$this->extKey] .= ($this->getPath($cssToLoad) ? '<link rel="stylesheet" href="'.$this->getPath($cssToLoad).'" type="text/css" />'.chr(10) :'');
				}
			}
		}
		// add all defined CSS script
		if (count($this->css) > 0) {
			foreach ($this->css as $cssToPut) {
				$temp_css .= $cssToPut;
			}
			$GLOBALS['TSFE']->additionalHeaderData['css_'.$this->extKey] .= '
<style type="text/css">
' . $temp_css . '
</style>';
		}
	}

	/**
	 * Return the webbased path
	 * 
	 * @param string $path
	 * return string
	 */
	function getPath($path="")
	{
		return $GLOBALS['TSFE']->tmpl->getFileName($path);
	}

	/**
	 * Add additional JS file
	 * 
	 * @param string $script
	 * @param boolean $first
	 * @return void
	 */
	function addJsFile($script="", $first=false)
	{
		if ($this->getPath($script) && ! in_array($script, $this->jsFiles)) {
			if ($first === true) {
				$this->jsFiles = array_merge(array($script), $this->jsFiles);
			} else {
				$this->jsFiles[] = $script;
			}
		}
	}

	/**
	 * Add JS to header
	 * 
	 * @param string $script
	 * @return void
	 */
	function addJS($script="")
	{
		if (! in_array($script, $this->js)) {
			$this->js[] = $script;
		}
	}

	/**
	 * Add additional CSS file
	 * 
	 * @param string $script
	 * @return void
	 */
	function addCssFile($script="")
	{
		if ($this->getPath($script) && ! in_array($script, $this->cssFiles)) {
			$this->cssFiles[] = $script;
		}
	}

	/**
	 * Add CSS to header
	 * 
	 * @param string $script
	 * @return void
	 */
	function addCSS($script="")
	{
		if (! in_array($script, $this->css)) {
			$this->css[] = $script;
		}
	}
}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/pi1/class.tx_jfmulticontent_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/pi1/class.tx_jfmulticontent_pi1.php']);
}
?>