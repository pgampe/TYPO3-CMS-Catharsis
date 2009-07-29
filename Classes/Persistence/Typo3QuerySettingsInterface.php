<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
*  All rights reserved
*
*  This class is a backport of the corresponding class of FLOW3. 
*  All credits go to the v5 team.
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
 * TYPO3 Query settings interface. This interfaceis NOT part of the FLOW3 API.
 * It reflects the settings unique to TYPO3 4.x.
 *
 * @package Extbase
 * @subpackage Persistence
 * @version $Id: QueryInterface.php 658 2009-05-16 13:54:16Z jocrau $
 */
interface Tx_Extbase_Persistence_Typo3QuerySettingsInterface extends Tx_Extbase_Persistence_QuerySettingsInterface {

	/**
	 * Sets the flag if the storage page should be respected for the query.
	 * 
	 * @param $respectStoragePage If TRUE the storage page ID will be determined and the statement will be extended accordingly.
	 * @return $this (fluent interface)
	 */
	public function setRespectStoragePageState($respectStoragePage);
	
	/**
	 * Returns the state, if the storage page should be respected for the query.
	 * 
	 * @return boolean TRUE, if the storage page should be respected; otherwise FALSE.
	 */
	public function respectStoragePage();
	
	/**
	 * Sets the flag if the visibility in the frontend should be respected.
	 * 
	 * @param $checkVisibility TRUE if the visibility in the frontend should be respected. If TRUE, the "enable fields" of TYPO3 will be added to the query statement.
	 * @return $this (fluent interface)
	 */
	public function setCheckVisibilityState($checkVisibility);
	
	/**
	 * Returns the state, if the visibility settings for the frontend should be respected for the query.
	 * 
	 * @return boolean TRUE, if the visibility settings for the frontend should should be respected; otherwise FALSE.
	 */
	public function doVisibilityCheck();
	
}
?>