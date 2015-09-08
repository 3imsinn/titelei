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
 * Test case for class \Titelei\Titelei\Domain\Model\Titeldatensatz.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Schneider <Michael Schneider>
 */
class TiteldatensatzTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Titelei\Titelei\Domain\Model\Titeldatensatz
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Titelei\Titelei\Domain\Model\Titeldatensatz();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueFor() {	}

	/**
	 * @test
	 */
	public function setTitelForSetsTitel() {	}

	/**
	 * @test
	 */
	public function getIsbnReturnsInitialValueFor() {	}

	/**
	 * @test
	 */
	public function setIsbnForSetsIsbn() {	}

	/**
	 * @test
	 */
	public function getVerlagsnameReturnsInitialValueForBasisdatensatz() {
		$this->assertEquals(
			NULL,
			$this->subject->getVerlagsname()
		);
	}

	/**
	 * @test
	 */
	public function setVerlagsnameForBasisdatensatzSetsVerlagsname() {
		$verlagsnameFixture = new \Titelei\Titelei\Domain\Model\Basisdatensatz();
		$this->subject->setVerlagsname($verlagsnameFixture);

		$this->assertAttributeEquals(
			$verlagsnameFixture,
			'verlagsname',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getApReturnsInitialValueForBasisdatensatz() {
		$this->assertEquals(
			NULL,
			$this->subject->getAp()
		);
	}

	/**
	 * @test
	 */
	public function setApForBasisdatensatzSetsAp() {
		$apFixture = new \Titelei\Titelei\Domain\Model\Basisdatensatz();
		$this->subject->setAp($apFixture);

		$this->assertAttributeEquals(
			$apFixture,
			'ap',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getApemailReturnsInitialValueForBasisdatensatz() {
		$this->assertEquals(
			NULL,
			$this->subject->getApemail()
		);
	}

	/**
	 * @test
	 */
	public function setApemailForBasisdatensatzSetsApemail() {
		$apemailFixture = new \Titelei\Titelei\Domain\Model\Basisdatensatz();
		$this->subject->setApemail($apemailFixture);

		$this->assertAttributeEquals(
			$apemailFixture,
			'apemail',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVerlagsnummerReturnsInitialValueForBasisdatensatz() {
		$this->assertEquals(
			NULL,
			$this->subject->getVerlagsnummer()
		);
	}

	/**
	 * @test
	 */
	public function setVerlagsnummerForBasisdatensatzSetsVerlagsnummer() {
		$verlagsnummerFixture = new \Titelei\Titelei\Domain\Model\Basisdatensatz();
		$this->subject->setVerlagsnummer($verlagsnummerFixture);

		$this->assertAttributeEquals(
			$verlagsnummerFixture,
			'verlagsnummer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSeitenzahlReturnsInitialValueFor() {	}

	/**
	 * @test
	 */
	public function setSeitenzahlForSetsSeitenzahl() {	}
}
