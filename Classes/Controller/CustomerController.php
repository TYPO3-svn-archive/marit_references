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
 * Controller for the Customer object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_MaritReferences_Controller_CustomerController extends Tx_MaritReferences_Controller_BaseController {
	/**
	 * @var Tx_Marit_references_Domain_Model_CustomerRepository
	 */
	protected $customerRepository;

	/**
	 * @var Tx_Marit_references_Domain_Model_ProjectRepository
	 */
	protected $projectRepository;

	/**
	 * @return void
	 */
	public function initializeAction() {
		parent::initializeAction();
		$this->customerRepository = t3lib_div::makeInstance('Tx_MaritReferences_Domain_Repository_CustomerRepository');
		$this->projectRepository = t3lib_div::makeInstance('TX_MaritReferences_Domain_Repository_ProjectRepository');
	}


	/**
	 * list action
	 *
	 * @param  integer $currentPage The current page
	 * @return string The rendered list action
	 */
	public function listAction($currentPage = 0) {
		$this->initCSS($this->settings['customer']['list']['cssFile']);
		$this->initJS($this->settings['customer']['list']['jsFile']);

		$this->view->assign('settings', $this->settings);


		if($this->settings['customer']['list']['pageBrowser']){
			$customers = $this->customerRepository->findLimited($this->settings['customer']['list']['pageBrowser']['maxItems'], ($currentPage*$this->settings['customer']['list']['pageBrowser']['maxItems']));
			$this->view->assign('customerCounter', $this->customerRepository->countItems());
		} else {
			$customers = $this->customerRepository->findAll();
		}
		foreach($customers as $key => $customer){
			$customers[$key]->projects = $this->projectRepository->findByCustomer($customer);
			$customers[$key]->technologies = $this->getTechnologies($customer->projects);
		}

		$this->view->assign('customers', $customers);
	}

	/**
	 * single action
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_Customer> $customer customer
	 * @return string The rendered single view
	 */
	public function showAction(Tx_MaritReferences_Domain_Model_Customer $customer) {
		$this->initCSS($this->settings['customer']['show']['cssFile']);
		$this->initJS($this->settings['customer']['show']['jsFile']);

		$this->view->assign('settings', $this->settings);

		$customer->projects = $this->projectRepository->findByCustomer($customer);
		$customer->technologies = $this->getTechnologies($customer->projects);
		
		$this->view->assign('customer', $customer);
		$this->view->assign('projects', $customer->projects);
		$this->view->assign('technologies', $customer->technologies);

	}

	/**
	 * get customer technologies
	 *
	 * @param array $projects projects
	 * @return array all customer technologies
	 *
	 */
	public function getTechnologies($projects) {
		foreach($projects as $project){
			$technologies = $project->getTechnologies();
			foreach($technologies as $technology){
				$distinctTechnologies[$technology->getTitle()] = $technology;
			}
		}
		return $distinctTechnologies;
	}

}
?>
