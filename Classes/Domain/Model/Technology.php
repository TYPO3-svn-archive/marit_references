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
 * Technology
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_MaritReferences_Domain_Model_Technology extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * title
	 * @var string
	 */
	protected $title;
	
	/**
	 * description
	 * @var string
	 */
	protected $description;
	
	/**
	 * images
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_DAM>
	 */
	protected $images;
	
	/**
	 * contactPerson
	 * @var Tx_MaritReferences_Domain_Model_ContactPerson
	 */
	protected $contactPerson;
	

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
	 * Setter for description
	 *
	 * @param string $description description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 *
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Setter for images
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_DAM> $images images
	 * @return void
	 */
	public function setImages(Tx_Extbase_Persistence_ObjectStorage $images) {
		$this->images = $images;
	}

	/**
	 * Getter for images
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_DAM> images
	 */
	public function getImages() {
		return $this->images;
	}
	
	/**
	 * Setter for contactPerson
	 *
	 * @param Tx_MaritReferences_Domain_Model_ContactPerson $contactPerson contactPerson
	 * @return void
	 */
	public function setContactPerson(Tx_MaritReferences_Domain_Model_ContactPerson $contactPerson) {
		$this->contactPerson = $contactPerson;
	}

	/**
	 * Getter for contactPerson
	 *
	 * @return Tx_MaritReferences_Domain_Model_ContactPerson contactPerson
	 */
	public function getContactPerson() {
		return $this->contactPerson;
	}
	
}
?>