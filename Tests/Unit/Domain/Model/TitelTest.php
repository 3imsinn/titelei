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
 * Test case for class \Titelei\Titelei\Domain\Model\Titel.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Michael Schneider <Michael Schneider>
 */
class TitelTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Titelei\Titelei\Domain\Model\Titel
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Titelei\Titelei\Domain\Model\Titel();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() {
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLanguageReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getLanguage()
		);
	}

	/**
	 * @test
	 */
	public function setLanguageForIntegerSetsLanguage() {
		$this->subject->setLanguage(12);

		$this->assertAttributeEquals(
			12,
			'language',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAuthorReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getAuthor()
		);
	}

	/**
	 * @test
	 */
	public function setAuthorForStringSetsAuthor() {
		$this->subject->setAuthor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'author',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPublisherReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getPublisher()
		);
	}

	/**
	 * @test
	 */
	public function setPublisherForStringSetsPublisher() {
		$this->subject->setPublisher('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'publisher',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCopyrightsReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getCopyrights()
		);
	}

	/**
	 * @test
	 */
	public function setCopyrightsForStringSetsCopyrights() {
		$this->subject->setCopyrights('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'copyrights',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTagsReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTags()
		);
	}

	/**
	 * @test
	 */
	public function setTagsForStringSetsTags() {
		$this->subject->setTags('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'tags',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIsbnReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getIsbn()
		);
	}

	/**
	 * @test
	 */
	public function setIsbnForStringSetsIsbn() {
		$this->subject->setIsbn('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'isbn',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCoverReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getCover()
		);
	}

	/**
	 * @test
	 */
	public function setCoverForStringSetsCover() {
		$this->subject->setCover('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'cover',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContentReturnsInitialValueForChapter() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getContent()
		);
	}

	/**
	 * @test
	 */
	public function setContentForObjectStorageContainingChapterSetsContent() {
		$content = new \Titelei\Titelei\Domain\Model\Chapter();
		$objectStorageHoldingExactlyOneContent = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneContent->attach($content);
		$this->subject->setContent($objectStorageHoldingExactlyOneContent);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneContent,
			'content',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addContentToObjectStorageHoldingContent() {
		$content = new \Titelei\Titelei\Domain\Model\Chapter();
		$contentObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$contentObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($content));
		$this->inject($this->subject, 'content', $contentObjectStorageMock);

		$this->subject->addContent($content);
	}

	/**
	 * @test
	 */
	public function removeContentFromObjectStorageHoldingContent() {
		$content = new \Titelei\Titelei\Domain\Model\Chapter();
		$contentObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$contentObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($content));
		$this->inject($this->subject, 'content', $contentObjectStorageMock);

		$this->subject->removeContent($content);

	}
}
