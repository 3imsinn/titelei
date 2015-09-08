<?php
namespace Titelei\Titelei\Domain\Model;


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
 * Titel
 */
class Titel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 * 
	 * @var string
	 */
	protected $title = '';

	/**
	 * description
	 * 
	 * @var string
	 */
	protected $description = '';

	/**
	 * language
	 * 
	 * @var integer
	 */
	protected $language = 0;

	/**
	 * author
	 * 
	 * @var string
	 */
	protected $author = '';

	/**
	 * publisher
	 * 
	 * @var string
	 */
	protected $publisher = '';

	/**
	 * copyrights
	 * 
	 * @var string
	 */
	protected $copyrights = '';

	/**
	 * tags
	 * 
	 * @var string
	 */
	protected $tags = '';

	/**
	 * isbn
	 * 
	 * @var string
	 */
	protected $isbn = '';

	/**
	 * cover
	 * 
	 * @var string
	 */
	protected $cover = '';

	/**
	 * content
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Titelei\Titelei\Domain\Model\Chapter>
	 * @cascade remove
	 */
	protected $content = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 * 
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->content = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 * 
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 * 
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 * 
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 * 
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the language
	 * 
	 * @return integer $language
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * Sets the language
	 * 
	 * @param integer $language
	 * @return void
	 */
	public function setLanguage($language) {
		$this->language = $language;
	}

	/**
	 * Returns the author
	 * 
	 * @return string $author
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * Sets the author
	 * 
	 * @param string $author
	 * @return void
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * Returns the publisher
	 * 
	 * @return string $publisher
	 */
	public function getPublisher() {
		return $this->publisher;
	}

	/**
	 * Sets the publisher
	 * 
	 * @param string $publisher
	 * @return void
	 */
	public function setPublisher($publisher) {
		$this->publisher = $publisher;
	}

	/**
	 * Returns the copyrights
	 * 
	 * @return string $copyrights
	 */
	public function getCopyrights() {
		return $this->copyrights;
	}

	/**
	 * Sets the copyrights
	 * 
	 * @param string $copyrights
	 * @return void
	 */
	public function setCopyrights($copyrights) {
		$this->copyrights = $copyrights;
	}

	/**
	 * Returns the tags
	 * 
	 * @return string $tags
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * Sets the tags
	 * 
	 * @param string $tags
	 * @return void
	 */
	public function setTags($tags) {
		$this->tags = $tags;
	}

	/**
	 * Returns the isbn
	 * 
	 * @return string $isbn
	 */
	public function getIsbn() {
		return $this->isbn;
	}

	/**
	 * Sets the isbn
	 * 
	 * @param string $isbn
	 * @return void
	 */
	public function setIsbn($isbn) {
		$this->isbn = $isbn;
	}

	/**
	 * Returns the cover
	 * 
	 * @return string $cover
	 */
	public function getCover() {
		return $this->cover;
	}

	/**
	 * Sets the cover
	 * 
	 * @param string $cover
	 * @return void
	 */
	public function setCover($cover) {
		$this->cover = $cover;
	}

	/**
	 * Adds a Chapter
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Chapter $content
	 * @return void
	 */
	public function addContent(\Titelei\Titelei\Domain\Model\Chapter $content) {
		$this->content->attach($content);
	}

	/**
	 * Removes a Chapter
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Chapter $contentToRemove The Chapter to be removed
	 * @return void
	 */
	public function removeContent(\Titelei\Titelei\Domain\Model\Chapter $contentToRemove) {
		$this->content->detach($contentToRemove);
	}

	/**
	 * Returns the content
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Titelei\Titelei\Domain\Model\Chapter> $content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Sets the content
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Titelei\Titelei\Domain\Model\Chapter> $content
	 * @return void
	 */
	public function setContent(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $content) {
		$this->content = $content;
	}

}