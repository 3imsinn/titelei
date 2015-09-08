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
 * Test case for class Titelei\Titelei\Controller\ChapterController.
 *
 * @author Michael Schneider <Michael Schneider>
 */
class ChapterControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Titelei\Titelei\Controller\ChapterController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Titelei\\Titelei\\Controller\\ChapterController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllChaptersFromRepositoryAndAssignsThemToView() {

		$allChapters = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$chapterRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$chapterRepository->expects($this->once())->method('findAll')->will($this->returnValue($allChapters));
		$this->inject($this->subject, 'chapterRepository', $chapterRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('chapters', $allChapters);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenChapterToView() {
		$chapter = new \Titelei\Titelei\Domain\Model\Chapter();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('chapter', $chapter);

		$this->subject->showAction($chapter);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenChapterToView() {
		$chapter = new \Titelei\Titelei\Domain\Model\Chapter();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newChapter', $chapter);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($chapter);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenChapterToChapterRepository() {
		$chapter = new \Titelei\Titelei\Domain\Model\Chapter();

		$chapterRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$chapterRepository->expects($this->once())->method('add')->with($chapter);
		$this->inject($this->subject, 'chapterRepository', $chapterRepository);

		$this->subject->createAction($chapter);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenChapterToView() {
		$chapter = new \Titelei\Titelei\Domain\Model\Chapter();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('chapter', $chapter);

		$this->subject->editAction($chapter);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenChapterInChapterRepository() {
		$chapter = new \Titelei\Titelei\Domain\Model\Chapter();

		$chapterRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$chapterRepository->expects($this->once())->method('update')->with($chapter);
		$this->inject($this->subject, 'chapterRepository', $chapterRepository);

		$this->subject->updateAction($chapter);
	}
}
