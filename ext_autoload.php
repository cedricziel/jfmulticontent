<?php

$extensionPath = t3lib_extMgm::extPath('jfmulticontent');

return array(
	'tx_jfmulticontent_pagerenderer'  => $extensionPath . 'lib/class.tx_jfmulticontent_pagerenderer.php',
	'tx_jfmulticontent_itemsProcFunc' => $extensionPath . 'lib/class.tx_jfmulticontent_itemsProcFunc.php',
);