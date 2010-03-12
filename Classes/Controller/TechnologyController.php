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
 * Controller for the Technology object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_MaritReferences_Controller_TechnologyController extends Tx_MaritReferences_Controller_BaseController {
    /**
     * @var Tx_MaritReferences_Domain_Model_TechnologyRepository
     */
    protected $technologyRepository;
    
    /**
     * @var Tx_MaritReferences_Domain_Model_ProjectRepository
     */
    protected $projectRepository;

    /**
     * @return void
     */
    public function initializeAction() {
        $this->technologyRepository = t3lib_div::makeInstance('Tx_MaritReferences_Domain_Repository_TechnologyRepository');
        $this->projectRepository = t3lib_div::makeInstance('Tx_MaritReferences_Domain_Repository_ProjectRepository');
    }	
	
	/**
	 * list action
	 *
	 * @return string The rendered list action
	 */
	public function listAction() {
		$this->initCSS($this->settings['technology']['list']['cssFile']);
		$this->initJS($this->settings['technology']['list']['jsFile']);
		
		$this->view->assign('settings', $this->settings);
      	$this->view->assign('technologies', $this->technologyRepository->findAll());
	}
	
	/**
     * single action
     *
     * @param Tx_Extbase_Persistence_ObjectStorage<Tx_MaritReferences_Domain_Model_Technology> $technology technology
     * @return string The rendered single view
     */
    public function showAction(Tx_MaritReferences_Domain_Model_Technology $technology) {
		$this->initCSS($this->settings['technology']['show']['cssFile']);
		$this->initJS($this->settings['technology']['show']['jsFile']);
		
    	$this->view->assign('settings', $this->settings);
      	$this->view->assign('technology', $technology);
      	$this->view->assign('projects', $this->projectRepository->findByMmTechnologies(array($technology->getUid()), 'Tx_MaritReferences_Domain_Model_Project'));
    }
	
}
?>
