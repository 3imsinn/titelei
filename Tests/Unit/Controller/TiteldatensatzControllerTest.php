<?php
namespace Titelei\Titelei\Tests\Unit\Controller;
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
 * Test case for class Titelei\Titelei\Controller\TiteldatensatzController.
 *
 * @author Michael Schneider <Michael Schneider>
 */
class TiteldatensatzControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Titelei\Titelei\Controller\TiteldatensatzController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Titelei\\Titelei\\Controller\\TiteldatensatzController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTiteldatensatzsFromRepositoryAndAssignsThemToView() {

		$allTiteldatensatzs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$titeldatensatzRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$titeldatensatzRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTiteldatensatzs));
		$this->inject($this->subject, 'titeldatensatzRepository', $titeldatensatzRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('titeldatensatzs', $allTiteldatensatzs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTiteldatensatzToView() {
		$titeldatensatz = new \Titelei\Titelei\Domain\Model\Titeldatensatz();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('titeldatensatz', $titeldatensatz);

		$this->subject->showAction($titeldatensatz);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenTiteldatensatzToView() {
		$titeldatensatz = new \Titelei\Titelei\Domain\Model\Titeldatensatz();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newTiteldatensatz', $titeldatensatz);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($titeldatensatz);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTiteldatensatzToTiteldatensatzRepository() {
		$titeldatensatz = new \Titelei\Titelei\Domain\Model\Titeldatensatz();

		$titeldatensatzRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$titeldatensatzRepository->expects($this->once())->method('add')->with($titeldatensatz);
		$this->inject($this->subject, 'titeldatensatzRepository', $titeldatensatzRepository);

		$this->subject->createAction($titeldatensatz);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTiteldatensatzToView() {
		$titeldatensatz = new \Titelei\Titelei\Domain\Model\Titeldatensatz();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('titeldatensatz', $titeldatensatz);

		$this->subject->editAction($titeldatensatz);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTiteldatensatzInTiteldatensatzRepository() {
		$titeldatensatz = new \Titelei\Titelei\Domain\Model\Titeldatensatz();

		$titeldatensatzRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$titeldatensatzRepository->expects($this->once())->method('update')->with($titeldatensatz);
		$this->inject($this->subject, 'titeldatensatzRepository', $titeldatensatzRepository);

		$this->subject->updateAction($titeldatensatz);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTiteldatensatzFromTiteldatensatzRepository() {
		$titeldatensatz = new \Titelei\Titelei\Domain\Model\Titeldatensatz();

		$titeldatensatzRepository = $this->getMock('', array('remove'), array(), '', FALSE);
		$titeldatensatzRepository->expects($this->once())->method('remove')->with($titeldatensatz);
		$this->inject($this->subject, 'titeldatensatzRepository', $titeldatensatzRepository);

		$this->subject->deleteAction($titeldatensatz);
	}
}
