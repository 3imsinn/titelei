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
 * Test case for class Titelei\Titelei\Controller\TitelController.
 *
 * @author Michael Schneider <Michael Schneider>
 */
class TitelControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Titelei\Titelei\Controller\TitelController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Titelei\\Titelei\\Controller\\TitelController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTitelsFromRepositoryAndAssignsThemToView() {

		$allTitels = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$titelRepository = $this->getMock('Titelei\\Titelei\\Domain\\Repository\\TitelRepository', array('findAll'), array(), '', FALSE);
		$titelRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTitels));
		$this->inject($this->subject, 'titelRepository', $titelRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('titels', $allTitels);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTitelToView() {
		$titel = new \Titelei\Titelei\Domain\Model\Titel();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('titel', $titel);

		$this->subject->showAction($titel);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenTitelToView() {
		$titel = new \Titelei\Titelei\Domain\Model\Titel();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newTitel', $titel);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($titel);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTitelToTitelRepository() {
		$titel = new \Titelei\Titelei\Domain\Model\Titel();

		$titelRepository = $this->getMock('Titelei\\Titelei\\Domain\\Repository\\TitelRepository', array('add'), array(), '', FALSE);
		$titelRepository->expects($this->once())->method('add')->with($titel);
		$this->inject($this->subject, 'titelRepository', $titelRepository);

		$this->subject->createAction($titel);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTitelToView() {
		$titel = new \Titelei\Titelei\Domain\Model\Titel();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('titel', $titel);

		$this->subject->editAction($titel);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTitelInTitelRepository() {
		$titel = new \Titelei\Titelei\Domain\Model\Titel();

		$titelRepository = $this->getMock('Titelei\\Titelei\\Domain\\Repository\\TitelRepository', array('update'), array(), '', FALSE);
		$titelRepository->expects($this->once())->method('update')->with($titel);
		$this->inject($this->subject, 'titelRepository', $titelRepository);

		$this->subject->updateAction($titel);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTitelFromTitelRepository() {
		$titel = new \Titelei\Titelei\Domain\Model\Titel();

		$titelRepository = $this->getMock('Titelei\\Titelei\\Domain\\Repository\\TitelRepository', array('remove'), array(), '', FALSE);
		$titelRepository->expects($this->once())->method('remove')->with($titel);
		$this->inject($this->subject, 'titelRepository', $titelRepository);

		$this->subject->deleteAction($titel);
	}
}
