<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Marit AG <typo3-extension@marit.ag>
*  			Marco Huber <marco.huber@marit.ag>, Marit AG
*  			Markus Kleinhenz <markus.kleinhenz@marit.ag>, Marit AG
*  			Goran Stefanovic <goran.stefanovic@marit.ag>, Marit AG
*  			
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
 * DAM
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_MaritReferences_Domain_Model_DAM extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * title
	 * @var string
	 */
	protected $title;
	
	/**
	 * fileName
	 * @var string
	 */
	protected $fileName;
	
	/**
	 * filePath
	 * @var string
	 */
	protected $filePath;
	
	/**
	 * fileSize
	 * @var int
	 */
	protected $fileSize;
	
	/**
	 * fileHash
	 * @var string
	 */
	protected $fileHash;
	
	/**
	 * fileDlName
	 * @var string
	 */
	protected $fileDlName;
	
	/**
	 * altText
	 * @var string
	 */
	protected $altText;
	

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
	}
	
	
	
	/**
	 * Setter for title
	 *
	 * @param string $title title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Getter for title
	 *
	 * @return string title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Setter for fileName
	 *
	 * @param string $fileName fileName
	 * @return void
	 */
	public function setFileName($fileName) {
		$this->fileName = $fileName;
	}

	/**
	 * Getter for fileName
	 *
	 * @return string fileName
	 */
	public function getFileName() {
		return $this->fileName;
	}
	
	/**
	 * Setter for filePath
	 *
	 * @param string $filePath filePath
	 * @return void
	 */
	public function setFilePath($filePath) {
		$this->filePath = $filePath;
	}

	/**
	 * Getter for filePath
	 *
	 * @return string filePath
	 */
	public function getFilePath() {
		return $this->filePath;
	}
	
	/**
	 * Setter for fileSize
	 *
	 * @param int $fileSize fileSize
	 * @return void
	 */
	public function setFileSize($fileSize) {
		$this->fileSize = $fileSize;
	}

	/**
	 * Getter for fileSize
	 *
	 * @return int fileSize
	 */
	public function getFileSize() {
		return $this->fileSize;
	}
	
	/**
	 * Setter for fileHash
	 *
	 * @param string $fileHash fileHash
	 * @return void
	 */
	public function setFileHash($fileHash) {
		$this->fileHash = $fileHash;
	}

	/**
	 * Getter for fileHash
	 *
	 * @return string fileHash
	 */
	public function getFileHash() {
		return $this->fileHash;
	}
	
	/**
	 * Setter for fileDlName
	 *
	 * @param string $fileDlName fileDlName
	 * @return void
	 */
	public function setFileDlName($fileDlName) {
		$this->fileDlName = $fileDlName;
	}

	/**
	 * Getter for fileDlName
	 *
	 * @return string fileDlName
	 */
	public function getFileDlName() {
		return $this->fileDlName;
	}
	
	/**
	 * Setter for altText
	 *
	 * @param string $altText altText
	 * @return void
	 */
	public function setAltText($altText) {
		$this->altText = $altText;
	}

	/**
	 * Getter for altText
	 *
	 * @return string altText
	 */
	public function getAltText() {
		return $this->altText;
	}
	
}
?>