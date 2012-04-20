<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2012 Oliver Klee <typo3-coding@oliverklee.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Testcase for the Tx_Belog_Domain_Repository_BackEndUserRepository class.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 * @package TYPO3
 * @subpackage belog
 */
class Tx_Belog_Domain_Repository_BackendUserRepositoryTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	public function setUp() {
		$this->objectManager = $this->getMock('Tx_Extbase_Object_ObjectManagerInterface');
	}

	public function tearDown() {
		unset($this->objectManager);
	}

	/**
	 * @test
	 */
	public function classCanBeInstantiated() {
	}

	/**
	 * @test
	 */
	public function initializeObjectSetsRespectStoragePidToFalse() {
		$this->assertInstanceOf(
			'Tx_Belog_Domain_Repository_BackendUserRepository',
			new Tx_Belog_Domain_Repository_BackendUserRepository($this->objectManager)
		);
	}
}
?>