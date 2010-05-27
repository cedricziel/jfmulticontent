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

require_once (PATH_t3lib . 'class.t3lib_page.php');

/**
 * 'tx_ttnews_extend' for the 'jfmulticontent' extension.
 *
 * @author     Juergen Furrer <juergen.furrer@gmail.com>
 * @package    TYPO3
 * @subpackage tx_jfmulticontent
 */
class tx_ttnews_extend
{
	var $conf = array();
	var $cObj = null;
	var $extKey = 'jfmulticontent';

	function extraCodesProcessor($newsObject)
	{
		$content = null;
		$this->cObj = $newsObject->cObj;
		$this->conf = $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_jfmulticontent_pi1.'];
		switch ($newsObject->theCode) {
			case 'LIST_ACCORDION': {
				$content .= $newsObject->displayList();
				// Add all CSS and JS files
				if (T3JQUERY === true) {
					tx_t3jquery::addJqJS();
				} else {
					$this->addJsFile($this->conf['jQueryLibrary']);
					$this->addJsFile($this->conf['jQueryEasing']);
					$this->addJsFile($this->conf['jQueryUI']);
				}
				$this->addCssFile($this->conf['jQueryUIstyle']);
				break;
			}
			case 'LIST_SLIDER': {
				$content .= $newsObject->displayList();
				// Add all CSS and JS files
				if (T3JQUERY === true) {
					tx_t3jquery::addJqJS();
				} else {
					$this->addJsFile($this->conf['jQueryLibrary']);
					$this->addJsFile($this->conf['jQueryEasing']);
				}
				$this->addJsFile($this->conf['sliderJS']);
				$this->addCssFile($this->conf['sliderCSS']);
				break;
			}
			default: {
				$content .= 'CODE "'.$newsObject->theCode.'" not known';
				break;
			}
		}
		$this->addResources();
		return $content;
	}

	/**
	 * Include all defined resources (JS / CSS)
	 *
	 * @return void
	 */
	function addResources()
	{
		// add all defined JS files
		if (count($this->jsFiles) > 0) {
			foreach ($this->jsFiles as $jsToLoad) {
				if (T3JQUERY === true) {
					tx_t3jquery::addJS('', array('jsfile' => $this->getPath($jsToLoad)));
				} else {
					// Add script only once
					if (! preg_match("/".preg_quote($this->getPath($jsToLoad), "/")."/", $GLOBALS['TSFE']->additionalHeaderData['jsFile_'.$this->extKey])) {
						$GLOBALS['TSFE']->additionalHeaderData['jsFile_'.$this->extKey] .= ($this->getPath($jsToLoad) ? '<script src="'.$this->getPath($jsToLoad).'" type="text/javascript"></script>'.chr(10) :'');
					}
				}
			}
		}
		// add all defined JS script
		if (count($this->js) > 0) {
			foreach ($this->js as $jsToPut) {
				$temp_js .= $jsToPut;
			}
			if ($this->conf['jsMinify']) {
				$temp_js = t3lib_div::minifyJavaScript($temp_js);
			}
			$conf = array();
			$conf['jsdata'] = $temp_js;
			if (T3JQUERY === true && t3lib_div::int_from_ver($this->getExtensionVersion('t3jquery')) >= 1002000) {
				if ($this->conf['jsInFooter']) {
					$conf['tofooter'] = true;
					tx_t3jquery::addJS('', $conf);
				} else {
					$conf['tofooter'] = false;
					tx_t3jquery::addJS('', $conf);
				}
			} else {
				if ($this->conf['jsInFooter']) {
					$GLOBALS['TSFE']->additionalFooterData['js_'.$this->extKey] .= t3lib_div::wrapJS($temp_js, true);
				} else {
					$GLOBALS['TSFE']->additionalHeaderData['js_'.$this->extKey] .= t3lib_div::wrapJS($temp_js, true);
				}
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

	/**
	 * Returns the version of an extension (in 4.4 its possible to this with t3lib_extMgm::getExtensionVersion)
	 * @param string $key
	 * @return string
	 */
	function getExtensionVersion($key)
	{
		if (! t3lib_extMgm::isLoaded($key)) {
			return '';
		}
		$_EXTKEY = $key;
		include(t3lib_extMgm::extPath($key) . 'ext_emconf.php');
		return $EM_CONF[$key]['version'];
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/lib/class.tx_ttnews_extend.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jfmulticontent/lib/class.tx_ttnews_extend.php']);
}
?>