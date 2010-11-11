<?php
require_once($GLOBALS['BACK_PATH'] . 'template.php');

class Tx_Workspaces_Controller_AbstractController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var t3lib_PageRenderer
	 */
	var $pageRenderer;

	public function initializeAction() {
		$id = t3lib_div::_GP('id');
		$this->pageRenderer->addInlineSetting('Workspaces', 'id', $id);
		$this->pageRenderer->addInlineSetting('Workspaces', 'depth', $id == 0 ? 999 : 1);

		$this->pageRenderer->disableCompressJavascript();
		$this->pageRenderer->disableConcatenateFiles();

		$this->pageRenderer->addCssFile(t3lib_extMgm::extRelPath('workspaces') . 'Resources/Public/StyleSheet/module.css');

		$this->pageRenderer->addInlineLanguageLabelArray(array(
			'title'			=> $GLOBALS['LANG']->getLL('title'),
			'path'			=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.path'),
			'table'			=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.table'),
			'depth'			=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_mod_web_perm.xml:Depth'),
			'depth_0'		=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.depth_0'),
			'depth_1'		=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.depth_1'),
			'depth_2'		=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.depth_2'),
			'depth_3'		=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.depth_3'),
			'depth_4'		=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.depth_4'),
			'depth_infi'	=> $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.xml:labels.depth_infi'),
		));

		$this->pageRenderer->addInlineLanguageLabelFile('EXT:workspaces/Resources/Private/Langauge/locallang.xml', $GLOBALS['LANG']->lang);

	}

	/**
	 * Processes a general request. The result can be returned by altering the given response.
	 *
	 * @param Tx_Extbase_MVC_Request $request The request object
	 * @param Tx_Extbase_MVC_Response $response The response, modified by this handler
	 * @return void
	 * @throws Tx_Extbase_MVC_Exception_UnsupportedRequestType if the controller doesn't support the current request type
	 * @api
	 */
	public function processRequest(Tx_Extbase_MVC_Request $request, Tx_Extbase_MVC_Response $response) {
		$this->template = t3lib_div::makeInstance('template');
		$this->pageRenderer = $this->template->getPageRenderer();

		$GLOBALS['SOBE'] = new stdClass();
		$GLOBALS['SOBE']->doc = $this->template;

		parent::processRequest($request, $response);

		$pageHeader = $this->template->startpage($GLOBALS['LANG']->sL('LLL:EXT:workspaces/Resources/Private/Language/locallang.xml:module.title'));
		$pageEnd	= $this->template->endPage();

		$response->setContent($pageHeader . $response->getContent() . $pageEnd);
	}

}


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/workspaces/Classes/Controller/AbstractController.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/workspaces/Classes/Controller/AbstractController.php']);
}
?>