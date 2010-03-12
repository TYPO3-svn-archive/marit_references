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
 * This view helper implements a pagebrowser
 * 
 * inspired by Susanne Moog <typo3@susanne-moog.de>: viewhelper for "addresses" http://forge.typo3.org/projects/show/extension-addresses
 *
 * @package marit_references
 * @subpackage ViewHelpers
 * @version $Id: $
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 */
class Tx_MaritReferences_ViewHelpers_PageBrowserViewHelper extends Tx_Fluid_Core_ViewHelper_TagBasedViewHelper {
	
	/**
	 * @var string
	 */
	protected $tagName = 'a';

	/**
	 * Constructs this pagebrowser Helper
	 */
	public function __construct() {
	}

	/**
	 * renders a pagebrowser
	 *
	 * @param  int The total item count for calculating the page count
	 * @param  int The maximum amount of items to show per page
	 * @param  string The label for the "previous" link, taken from locallang
	 * @param  string The text in front of the current page count ("Page 3" [see next param])
	 * @param  string The text between the current page and the total page count ("3 out of 6")
	 * @param  string The label for the "next" link, taken from locallang
	 * @param  string a "template" filled with sprintf
	 * @param  string onclick
	 * @return string the rendered string
	 * @author Marco Huberg <marco.huber@marit.ag>
	 */
	public function render($totalCountOfItems=NULL,$maxItemsToDisplay=5, $previousLabel='previous', $pageLabel='Page', $outOfLabel='out of', $nextLabel='next', $template='%1$s %2$s %3$s %4$s %5$s %6$s', $onclick='') {
		$pagesTotal = ceil($totalCountOfItems/$maxItemsToDisplay);
		if($this->controllerContext->getRequest()->hasArgument('currentPage')) {
			$currentPage = $this->controllerContext->getRequest()->getArgument('currentPage');
		} else {
			$currentPage = 0;
		}
		if(($currentPage+1) == $pagesTotal) {
			$next = '';
		} else {
			$next = $this->getLink(($currentPage+1), $nextLabel, $onclick);
		}
		if($currentPage == 0) {
			$previous = '';
		} else {
			$previous = $this->getLink(($currentPage-1), $previousLabel, $onclick);
		}
		$content = sprintf($template, $previous, $pageLabel, ($currentPage+1), $outOfLabel, $pagesTotal, $next);
		return $content;
	}
	
	/**
	 * Uses the typolink function to return a link with the corresponding GET-parameter for page browsing
	 * 
	 * @param int $page = the page to be linked by the pagebrowser (f.e. the next or previous page)
	 * @param string the text of the link (<a>text</a>)
	 * @param string onclick
	 * @return string returns an a-tag with a link to the same page and an additional parameter for the pagebrowser
	 * @author Marco Huberg <marco.huber@marit.ag>
	 */
	private function getLink($page,$linktext='', $onclick='') {
		$uriBuilder = $this->controllerContext->getUriBuilder();
		$arguments = $this->controllerContext->getRequest()->getArguments();
		$arguments['currentPage'] = $page;
		$uri = $uriBuilder
			->reset()
			->uriFor('list', $arguments);		

		$this->tag->addAttribute('href', $uri);
		if($onclick){
			$this->tag->addAttribute('onclick', $onclick);
		}
		$this->tag->setContent($linktext);

		return $this->tag->render(); 
	}
	
}

?>