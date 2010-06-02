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
 * ContactPerson
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_MaritReferences_Domain_Model_ContactPerson extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * gender
	 * @var int
	 */
	protected $gender;
	
	/**
	 * firstName
	 * @var string
	 */
	protected $firstName;
	
	/**
	 * lastName
	 * @var string
	 */
	protected $lastName;
	
	/**
	 * email
	 * @var string
	 */
	protected $email;
	
	/**
	 * phone
	 * @var string
	 */
	protected $phone;
	
	/**
	 * company
	 * @var string
	 */
	protected $company;
	
	/**
	 * department
	 * @var string
	 */
	protected $department;
	
	/**
	 * images
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_MaritDam_Domain_Model_Dam>
	 * @lazy	 
	 */
	protected $images;
	

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
	}
	
	
	
	/**
	 * Setter for gender
	 *
	 * @param int $gender gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * Getter for gender
	 *
	 * @return int gender
	 */
	public function getGender() {
		return $this->gender;
	}
	
	/**
	 * Setter for firstName
	 *
	 * @param string $firstName firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Getter for firstName
	 *
	 * @return string firstName
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 * Setter for lastName
	 *
	 * @param string $lastName lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * Getter for lastName
	 *
	 * @return string lastName
	 */
	public function getLastName() {
		return $this->lastName;
	}
	
	/**
	 * Setter for email
	 *
	 * @param string $email email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Getter for email
	 *
	 * @return string email
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * Setter for phone
	 *
	 * @param string $phone phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Getter for phone
	 *
	 * @return string phone
	 */
	public function getPhone() {
		return $this->phone;
	}
	
	/**
	 * Setter for company
	 *
	 * @param string $company company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * Getter for company
	 *
	 * @return string company
	 */
	public function getCompany() {
		return $this->company;
	}
	
	/**
	 * Setter for department
	 *
	 * @param string $department department
	 * @return void
	 */
	public function setDepartment($department) {
		$this->department = $department;
	}

	/**
	 * Getter for department
	 *
	 * @return string department
	 */
	public function getDepartment() {
		return $this->department;
	}
	
	/**
	 * Setter for images
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritDam_Domain_Model_Dam> $images images
	 * @return void
	 */
	public function setImages(Tx_Extbase_Persistence_ObjectStorage $images) {
		$this->images = $images;
	}

	/**
	 * Getter for images
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_MaritDam_Domain_Model_Dam> images
	 */
	public function getImages() {
		return $this->images;
	}
	
}
?>