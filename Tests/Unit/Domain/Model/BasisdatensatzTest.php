<?php

namespace Titelei\Titelei\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Michael Schneider <Michael Schneider>, 3imsinn
 *
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
 * Test case for class \Titelei\Titelei\Domain\Model\Basisdatensatz.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Schneider <Michael Schneider>
 */
class BasisdatensatzTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Titelei\Titelei\Domain\Model\Basisdatensatz
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Titelei\Titelei\Domain\Model\Basisdatensatz();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getVerlagsnameReturnsInitialValueFor() {	}

	/**
	 * @test
	 */
	public function setVerlagsnameForSetsVerlagsname() {	}

	/**
	 * @test
	 */
	public function getApReturnsInitialValueFor() {	}

	/**
	 * @test
	 */
	public function setApForSetsAp() {	}

	/**
	 * @test
	 */
	public function getApemailReturnsInitialValueFor() {	}

	/**
	 * @test
	 */
	public function setApemailForSetsApemail() {	}

	/**
	 * @test
	 */
	public function getVerlagsnummerReturnsInitialValueFor() {	}

	/**
	 * @test
	 */
	public function setVerlagsnummerForSetsVerlagsnummer() {	}
}
