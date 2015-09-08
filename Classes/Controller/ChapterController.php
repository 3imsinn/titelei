<?php
namespace Titelei\Titelei\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Michael Schneider <Michael Schneider>, 3imsinn
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * ChapterController
 */
class ChapterController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$chapters = $this->chapterRepository->findAll();
		$this->view->assign('chapters', $chapters);
	}

	/**
	 * action show
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Chapter $chapter
	 * @return void
	 */
	public function showAction(\Titelei\Titelei\Domain\Model\Chapter $chapter) {
		$this->view->assign('chapter', $chapter);
	}

	/**
	 * action new
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Chapter $newChapter
	 * @ignorevalidation $newChapter
	 * @return void
	 */
	public function newAction(\Titelei\Titelei\Domain\Model\Chapter $newChapter = NULL) {
		$this->view->assign('newChapter', $newChapter);
	}

	/**
	 * action create
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Chapter $newChapter
	 * @return void
	 */
	public function createAction(\Titelei\Titelei\Domain\Model\Chapter $newChapter) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->chapterRepository->add($newChapter);
		$this->redirect('list');
	}

	/**
	 * action edit
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Chapter $chapter
	 * @ignorevalidation $chapter
	 * @return void
	 */
	public function editAction(\Titelei\Titelei\Domain\Model\Chapter $chapter) {
		$this->view->assign('chapter', $chapter);
	}

	/**
	 * action update
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Chapter $chapter
	 * @return void
	 */
	public function updateAction(\Titelei\Titelei\Domain\Model\Chapter $chapter) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->chapterRepository->update($chapter);
		$this->redirect('list');
	}

}