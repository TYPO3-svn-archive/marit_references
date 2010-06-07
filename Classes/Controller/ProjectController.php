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
 * Controller for the Project object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_MaritReferences_Controller_ProjectController extends Tx_MaritReferences_Controller_BaseController {
	/**
	 * @var Tx_MaritReferences_Domain_Model_ProjectRepository
	 */
	protected $projectRepository;
	/**
	 * @var Tx_MaritReferences_Domain_Repository_IndustrialSectorRepository
	 */
	protected $industrialSectorRepository;
	/**
	 * @var Tx_MaritReferences_Domain_Repository_TechnologyRepository
	 */
	protected $technologyRepository;
	/**
	 * @var Tx_MaritReferences_Domain_Repository_TechnologyRepository
	 */
	protected $customerRepository;

	/**
	 * @return void
	 */
	public function initializeAction() {
		parent::initializeAction();
		$this->projectRepository = t3lib_div::makeInstance('Tx_MaritReferences_Domain_Repository_ProjectRepository');
		$this->industrialSectorRepository = t3lib_div::makeInstance('Tx_MaritReferences_Domain_Repository_IndustrialSectorRepository');
		$this->technologyRepository = t3lib_div::makeInstance('Tx_MaritReferences_Domain_Repository_TechnologyRepository');
		$this->customerRepository = t3lib_div::makeInstance('Tx_MaritReferences_Domain_Repository_CustomerRepository');
	}

	/**
	 * list action
	 *
	 * @param array $search search
	 * @param  integer $currentPage The current page
	 * @return string The rendered list action
	 */
	public function listAction(array $search = NULL, $currentPage = 0) {
		$this->initCSS($this->settings['project']['list']['cssFile']);
		$this->initJS($this->settings['project']['list']['jsFile']);

		$this->view->assign('settings', $this->settings);
		//t3lib_div::debug($this->technologyRepository->findByUid(4));
		//t3lib_div::debug($this->projectRepository->findByTechnologies(1)); // should find project ratiopharm
		//var_dump($this->projectRepository->findByMmTechnologies(array(4), 'Tx_MaritReferences_Domain_Model_Project')); // should find project ratiopharm
		//exit();
		if($search) {
			$this->view->assign('search', $search);
			if($this->settings['project']['list']['pageBrowser']){
				$this->view->assign('projects', $this->projectRepository->findBySearchValuesLimited($search, $this->settings['project']['list']['pageBrowser']['maxItems'], ($currentPage*$this->settings['project']['list']['pageBrowser']['maxItems'])));
				$this->view->assign('projectCounter', $this->projectRepository->countItemsBySearchValues($search));
			} else {
				$this->view->assign('projects', $this->projectRepository->findBySearchValues($search));
			}
		} else {
			if($this->settings['project']['list']['pageBrowser']){
				$this->view->assign('projects', $this->projectRepository->findLimited($this->settings['project']['list']['pageBrowser']['maxItems'], ($currentPage*$this->settings['project']['list']['pageBrowser']['maxItems'])));
				$this->view->assign('projectCounter', $this->projectRepository->countItems());
			} else {
				$this->view->assign('projects', $this->projectRepository->findAll());
			}
		}
	}

	/**
	 * show action
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_Project> $project project
	 * @return string The rendered single view
	 */
	public function showAction(Tx_MaritReferences_Domain_Model_Project $project) {
		$this->initCSS($this->settings['project']['show']['cssFile']);
		$this->initJS($this->settings['project']['show']['jsFile']);

		$this->view->assign('settings', $this->settings);
		$this->view->assign('project', $project);
	}

	/**
	 * search action
	 *
	 * @param array $search search
	 * @return string The rendered search view
	 */
	public function searchAction(array $search = array('industrialSector'=>array(), 'technologies'=>array())) {
		$this->initCSS($this->settings['project']['search']['cssFile']);
		$this->initJS($this->settings['project']['search']['jsFile']);

		$this->view->assign('settings', $this->settings);
		$this->view->assign('search', $search);
		$this->view->assign('industrialSectors', $this->industrialSectorRepository->findAll());
		$this->view->assign('technologies', $this->technologyRepository->findAll());

		$yearSliderMin = $this->projectRepository->findMinYear()->getYear() > 1000 ? $this->projectRepository->findMinYear()->getYear() : $this->settings['project']['search']['yearSliderMin'];
		$this->view->assign('yearSliderMin', $yearSliderMin);
		$yearSliderMax = $this->projectRepository->findMaxYear()->getYear() > 1000 ? $this->projectRepository->findMaxYear()->getYear() : $this->settings['project']['search']['yearSliderMax'];
		$this->view->assign('yearSliderMax', $yearSliderMax);
		$minYear = $search['minYear'] ?  $search['minYear'] : $yearSliderMin;
		$this->view->assign('minYear', $minYear);
		$maxYear = $search['maxYear'] ? $search['maxYear'] : $yearSliderMax;
		$this->view->assign('maxYear', $maxYear);
	}

	/**
	 * doublebox action render a random project and a random technology
	 *
	 * @return string The rendered single view
	 */
	public function doubleboxAction() {
		$this->initCSS($this->settings['project']['doublebox']['cssFile']);
		$this->initJS($this->settings['project']['doublebox']['jsFile']);

		$this->view->assign('settings', $this->settings);
		$project = $this->projectRepository->findRandom();
		$this->view->assign('project', $project);
		$technologies = $project->getTechnologies();
		$i = 0;
		$rand =  rand(0, (count($technologies)-1));
		foreach($technologies as $technology){
			if($i == $rand){
				$randTech = $technology;
				break;
			}
			$i++;
		}
		if($randTech){
			$this->view->assign('technology', $randTech);
		} else {
			$this->view->assign('technology', $this->technologyRepository->findRandom());
		}
		
		if($GLOBALS['TSFE']->type == $GLOBALS['TSFE']->tmpl->setup['maritReferences.']['typeNum']){
			$this->view->assign('doAjax', 0);
		} else {
			$this->view->assign('doAjax', 1);
		}
		//$this->view->assign('project', $this->projectRepository->findByUid(7));
		//$this->view->assign('technology', $this->technologyRepository->findByUid(1));
	}

	/**
	 * contextbox action render a random project from a list of projects configured in flexform. if no projects are selected in backend, then a random project from all projects is chosen
	 *
	 * @return string The rendered single view
	 */
	public function contextboxAction() {
		$this->initCSS($this->settings['project']['contextbox']['cssFile']);
		$this->initJS($this->settings['project']['contextbox']['jsFile']);

		$this->view->assign('settings', $this->settings);
		if(strlen(trim($this->settings['project']['contextbox']['projects']))>0) {
			$selectedProjects = explode(',', $this->settings['project']['contextbox']['projects']);
			$this->view->assign('project', $this->projectRepository->findRandom($selectedProjects));
		} else {
			$this->view->assign('project', $this->projectRepository->findRandom());
		}
		
		if($GLOBALS['TSFE']->type == $GLOBALS['TSFE']->tmpl->setup['maritReferences.']['typeNum']){
			$this->view->assign('doAjax', 0);
		} else {
			$this->view->assign('doAjax', 1);
		}
	}
}
?>
