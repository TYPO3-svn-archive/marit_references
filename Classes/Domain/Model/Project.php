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
 * Project
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_MaritReferences_Domain_Model_Project extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * title
	 * @var string
	 */
	protected $title;
	
	/**
	 * subtitle
	 * @var string
	 */
	protected $subtitle;
	
	/**
	 * teaser
	 * @var string
	 */
	protected $teaser;
	
	/**
	 * description
	 * @var string
	 */
	protected $description;
	
	/**
	 * url
	 * @var string
	 */
	protected $url;
	
	/**
	 * budget
	 * @var string
	 */
	protected $budget;
	
	/**
	 * customerStatement
	 * @var string
	 */
	protected $customerStatement;
	
	/**
	 * year
	 * @var int
	 */
	protected $year;
	
	/**
	 * files
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_DAM>
	 */
	protected $files;
	
	/**
	 * images
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_DAM>
	 */
	protected $images;
	
	/**
	 * industrialSector
	 * @var Tx_MaritReferences_Domain_Model_IndustrialSector
	 */
	protected $industrialSector;
	
	/**
	 * contactPerson
	 * @var Tx_MaritReferences_Domain_Model_ContactPerson
	 */
	protected $contactPerson;
	
	/**
	 * customerContactPerson
	 * @var Tx_MaritReferences_Domain_Model_ContactPerson
	 */
	protected $customerContactPerson;
	
	/**
	 * customer
	 * @var Tx_MaritReferences_Domain_Model_Customer
	 */
	protected $customer;
	
	/**
	 * technologies
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_Technology>
	 */
	protected $technologies;
	

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
	 * Setter for subtitle
	 *
	 * @param string $subtitle subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Getter for subtitle
	 *
	 * @return string subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}
	
	/**
	 * Setter for teaser
	 *
	 * @param string $teaser teaser
	 * @return void
	 */
	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	/**
	 * Getter for teaser
	 *
	 * @return string teaser
	 */
	public function getTeaser() {
		return $this->teaser;
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
	 * Setter for url
	 *
	 * @param string $url url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Getter for url
	 *
	 * @return string url
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 * Setter for budget
	 *
	 * @param string $budget budget
	 * @return void
	 */
	public function setBudget($budget) {
		$this->budget = $budget;
	}

	/**
	 * Getter for budget
	 *
	 * @return string budget
	 */
	public function getBudget() {
		return $this->budget;
	}
	
	/**
	 * Setter for customerStatement
	 *
	 * @param string $customerStatement customerStatement
	 * @return void
	 */
	public function setCustomerStatement($customerStatement) {
		$this->customerStatement = $customerStatement;
	}

	/**
	 * Getter for customerStatement
	 *
	 * @return string customerStatement
	 */
	public function getCustomerStatement() {
		return $this->customerStatement;
	}
	
	/**
	 * Setter for year
	 *
	 * @param int $year year
	 * @return void
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * Getter for year
	 *
	 * @return int year
	 */
	public function getYear() {
		return $this->year;
	}
	
	/**
	 * Setter for files
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_DAM> $files files
	 * @return void
	 */
	public function setFiles(Tx_Extbase_Persistence_ObjectStorage $files) {
		$this->files = $files;
	}

	/**
	 * Getter for files
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_DAM> files
	 */
	public function getFiles() {
		return $this->files;
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
	 * Setter for industrialSector
	 *
	 * @param Tx_MaritReferences_Domain_Model_IndustrialSector $industrialSector industrialSector
	 * @return void
	 */
	public function setIndustrialSector(Tx_MaritReferences_Domain_Model_ContactPerson $industrialSector) {
		$this->industrialSector = $industrialSector;
	}

	/**
	 * Getter for industrialSector
	 *
	 * @return Tx_MaritReferences_Domain_Model_IndustrialSector industrialSector
	 */
	public function getIndustrialSector() {
		return $this->industrialSector;
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
	
	/**
	 * Setter for customerContactPerson
	 *
	 * @param Tx_MaritReferences_Domain_Model_ContactPerson $customerContactPerson customerContactPerson
	 * @return void
	 */
	public function setCustomerContactPerson(Tx_MaritReferences_Domain_Model_ContactPerson $customerContactPerson) {
		$this->customerContactPerson = $customerContactPerson;
	}

	/**
	 * Getter for customerContactPerson
	 *
	 * @return Tx_MaritReferences_Domain_Model_ContactPerson customerContactPerson
	 */
	public function getCustomerContactPerson() {
		return $this->customerContactPerson;
	}
	
	/**
	 * Setter for customer
	 *
	 * @param Tx_MaritReferences_Domain_Model_Customer $customer customer
	 * @return void
	 */
	public function setCustomer(Tx_MaritReferences_Domain_Model_Customer $customer) {
		$this->customer = $customer;
	}

	/**
	 * Getter for customer
	 *
	 * @return Tx_MaritReferences_Domain_Model_Customer customer
	 */
	public function getCustomer() {
		return $this->customer;
	}
	
	/**
	 * Setter for technologies
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_Technology> $technologies technologies
	 * @return void
	 */
	public function setTechnologies(Tx_Extbase_Persistence_ObjectStorage $technologies) {
		$this->technologies = $technologies;
	}

	/**
	 * Getter for technologies
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_Technology >technologies
	 */
	public function getTechnologies() {
		return $this->technologies;
	}
	
}
?>