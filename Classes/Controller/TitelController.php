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

$epubPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('titelei').'Resources/Private/Libraries/Epub/';


	include $epubPath.'vendor/autoload.php';
	use PHPePub\Core\EPub;
	use PHPePub\Core\Structure\OPF\DublinCore;
	use PHPePub\Core\Structure\Ncx;
	use PHPePub\Core\Structure\NCX\NavPoint;
	use PHPePub\Core\Structure\Opf;
	use PHPePub\Core\Structure\OPF\MarcCode;
	use PHPePub\Core\Structure\OPF\Reference;
	

/**
 * TitelController
 */
class TitelController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * titelRepository
	 * 
	 * @var \Titelei\Titelei\Domain\Repository\TitelRepository
	 * @inject
	 */
	protected $titelRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$titels = $this->titelRepository->findAll();		
		$this->view->assign('titels', $titels);
	}

	/**
	 * action show
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Titel $titel
	 * @return void
	 */
	public function showAction(\Titelei\Titelei\Domain\Model\Titel $titel) {
		$this->view->assign('titel', $titel);
	}

	/**
	 * action new
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Titel $newTitel
	 * @ignorevalidation $newTitel
	 * @return void
	 */
	public function newAction(\Titelei\Titelei\Domain\Model\Titel $newTitel = NULL) {
		$this->view->assign('newTitel', $newTitel);
	}

	/**
	 * action create
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Titel $newTitel
	 * @return void
	 */
	public function createAction(\Titelei\Titelei\Domain\Model\Titel $newTitel) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->titelRepository->add($newTitel);
		$this->redirect('list');
	}

	/**
	 * action edit
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Titel $titel
	 * @ignorevalidation $titel
	 * @return void
	 */
	public function editAction(\Titelei\Titelei\Domain\Model\Titel $titel) {
		$this->view->assign('titel', $titel);
	}

	/**
	 * action update
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Titel $titel
	 * @return void
	 */
	public function updateAction(\Titelei\Titelei\Domain\Model\Titel $titel) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->titelRepository->update($titel);
		$this->redirect('list');
	}

	/**
	 * action delete
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Titel $titel
	 * @return void
	 */
	public function deleteAction(\Titelei\Titelei\Domain\Model\Titel $titel) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->titelRepository->remove($titel);
		$this->redirect('list');
	}


	/**
	 * action epub
	 * 
	 * @param \Titelei\Titelei\Domain\Model\Titel $callEpub
	 * @ignorevalidation $epubAction
	 * @return void
	 */
	public function epubAction(\Titelei\Titelei\Domain\Model\Titel $titel) {
	
	// Path to external epub-lib	
	$epubPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('titelei').'Resources/Private/Libraries/Epub/';

	// Fetch all titel-data into @titels
	$title = $this->titelRepository->findByUid($this->request->getArgument('titel'));
	$chapter = $titel->getContent(); 

	
		$epup_title = $title->getTitle();
		$nameEbook = $title->getTitle();
		$epub_isbn = $title->getISBN(); 
		$epub_description = $title->getDescription(); 
		$epub_author = $title->getAuthor(); 
		$epub_publisher = $title->getPublisher(); 
		$epubCover = $title->getCover(); 

		//var_dump($title);
	
###########################################################################

	// ePub uses XHTML 1.1, preferably strict.
	$content_start =
	"<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"
	. "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\n"
	. "    \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n"
	. "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n"
	. "<head>"
	. "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n"
	. "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\" />\n"
	. "<title>".$epup_title."</title>\n"
	. "</head>\n"
	. "<body>\n";

	$bookEnd = "</body>\n</html>\n";

	date_default_timezone_set('Europe/Berlin');

	$fileDir = './PHPePub';
	$book = new EPub(); // no arguments gives us the default ePub 2, lang=en and dir="ltr"

	// Title and Identifier are mandatory!
	$book->setTitle($epup_title);
	$book->setIdentifier("http://www.titelei.de/", EPub::IDENTIFIER_URI); // Could also be the ISBN number, preferrd for published books, or a UUID.
	$book->setLanguage("de"); // Not needed, but included for the example, Language is mandatory, but EPub defaults to "en". Use RFC3066 Language codes, such as "en", "da", "fr" etc.
	$book->setDescription($epub_description);
	$book->setAuthor($epub_author, $epub_author);
	$book->setPublisher($epub_publisher, $epub_publisher); // I hope this is a non existent address :)
	$book->setDate(time()); // Strictly not needed as the book date defaults to time().
	$book->setRights("Copyright and licence information specific for the book."); // As this is generated, this _could_ contain the name or licence information of the user who purchased the book, if needed. If this is used that way, the identifier must also be made unique for the book.
	$book->setSourceURL("http://www.titelei.de");
	
	$cssData = "body {\n  margin-left: .5em;\n  margin-right: .5em;\n  text-align: justify;\n}\n\np {\n  font-family: serif;\n  font-size: 10pt;\n  text-align: justify;\n  text-indent: 1em;\n  margin-top: 0px;\n  margin-bottom: 1ex;\n}\n\nh1, h2 {\n  font-family: sans-serif;\n  font-style: italic;\n  text-align: center;\n  background-color: #6b879c;\n  color: white;\n  width: 100%;\n}\n\nh1 {\n    margin-bottom: 2px;\n}\n\nh2 {\n    margin-top: -2px;\n    margin-bottom: 2px;\n}\n";
	$book->addCSSFile("styles.css", "css1", $cssData);

	// This test requires you have an image, change "demo/cover-image.jpg" to match your location.
	if(!$epubCover)
	{
		$book->setCoverImage("Cover.jpg", file_get_contents($epubPath."/tests/demo/cover-image.jpg"), "image/jpeg");
	}
	else
	{
		$book->setCoverImage("Cover.jpg", file_get_contents(PATH_site."/".$epubCover), "image/jpeg");
	}
	$cover = $content_start . "<h1>".$epub_title."</h1>\n<h2>".$epub_author."</h2>\n" . $bookEnd;
	$book->addChapter("Notices", "Cover.html", $cover);
	
	$i = 0;
	While($i < count($chapter))
	{
		$chapters = ""; 
		foreach($chapter as $chapt){	
		//var_dump($chapt->getTitle());
			$title = $chapt->getTitle();
		$chapters = $content_start."<h1>".$title."</h1>".$chapt->getText().$bookend; 
		$book->addChapter($title, "Chapter_".$i.".html", $chapters, true, EPub::EXTERNAL_REF_ADD);
		}
		$i++;
	}



$book->finalize(); // Finalize the book, and build the archive.

// Send the book to the client. ".epub" will be appended if missing.
$zipData = $book->sendBook($nameEbook);


// After this point your script should call exit. If anything is written to the output,
// it'll be appended to the end of the book, causing the epub file to become corrupt.
	



		$this->view->assign('titels', $titels);

	}


}