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
 * View Helper which creates a simple checkbox (<input type="checkbox">). Preselect the checkox if the values matches searched or is in array searched
 *
 * = Examples =
 *
 * <code title="Example">
 * <helper:searchForm.checkbox name="search[technologies][]" value="{technology.uid}" searched="{search.technologies}" id="technologies{technology.uid}" class="search" />
 * </code>
 *
 * Output:
 * <input class="search" id="technologies1" type="checkbox" name="tx_maritreferences_pi1[search][technologies][]" value="1" />
 *
 *
 * @version $Id: CheckboxViewHelper.php 1734 2009-11-25 21:53:57Z stucki $
 * @package Fluid
 * @subpackage ViewHelpers\Form
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @api
 * @scope prototype
 */
class Tx_MaritReferences_ViewHelpers_SearchForm_CheckboxViewHelper extends Tx_Fluid_ViewHelpers_Form_CheckboxViewHelper {

	/**
	 * Initialize the arguments.
	 *
	 * @return void
	 * @author Marco Huber <marco.huber@marit.ag>
	 * @api
	 */
	public function initializeArguments() {
		parent::initializeArguments();
	}

	/**
	 * Renders the checkbox.
	 *
	 * @param boolean $checked Specifies that the input element should be preselected
	 * @param array $searched Specifies that the input element should be preselected
	 *
	 * @return string
	 * @author Marco Huber <marco.huber@marit.ag>
	 * @api
	 */
	public function render($checked = NULL, $searched = NULL) {
		parent::render($checked);
		$valueAttribute = $this->getValue();
		if($searched){
			if(is_array($searched)){
				if(in_array($valueAttribute, $searched)){
					$this->tag->addAttribute('checked', 'checked');
				}
			} else {
				if($valueAttribute == $searched){
					$this->tag->addAttribute('checked', 'checked');
				}
			}
		}
		return $this->tag->render();
	}
}

?>