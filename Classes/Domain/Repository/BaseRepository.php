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
 * A base repository for all other repositories
 */
class Tx_MaritReferences_Domain_Repository_BaseRepository extends Tx_Extbase_Persistence_Repository {
	
	/**
	 * build the query by with offset and limit
	 * 
	 * @param integer $limit 
	 * @param integer $offset
	 * @return array $result
	 *
	 */	
	public function findLimited($limit, $offset = 0) {
		$query = $this->createQuery();
		$query = $query->setOffset((int) $offset);
		$query = $query->setLimit((int) $limit);
		$result = $query->execute();
		return $result;
	}
	
	/**
	 * count all items
	 * 
	 * @return int $result
	 *
	 */	
	public function countItems() {
		$query = $this->createQuery();
		$result = $query->count();
		return $result;
	}
	
/**
	 * build the query to find a random entry
	 * 
	 * @return array $result
	 *
	 */	
	public function findRandom() {
		$query = $this->createQuery();
		$query = $query->setLimit(1);
		$query = $query->setOrderings(array('deleted' => 'ASC, RAND()'));
		$result = $query->execute();
		return $result;
	}
	
	/**
	 * Dispatches magic methods
	 *
	 * @param string $methodName The name of the magic method
	 * @param string $arguments The arguments of the magic method
	 * @throws Tx_Extbase_Persistence_Exception_UnsupportedMethod
	 * @return void
	 * @api
	 */
	public function __call($methodName, $arguments) {
		if (substr($methodName, 0, 7) === 'findMax' && strlen($methodName) > 8) {
		
			$propertyName = strtolower(substr(substr($methodName, 7), 0, 1) ) . substr(substr($methodName, 7), 1);
			$query = $this->createQuery()
				->setLimit(1)
				->setOrderings(array($propertyName => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING));
			$result = $query->execute();
			return $result[0];
			
		} elseif (substr($methodName, 0, 7) === 'findMin' && strlen($methodName) > 8) {
		
			$propertyName = strtolower(substr(substr($methodName, 7), 0, 1) ) . substr(substr($methodName, 7), 1);
			$query = $this->createQuery()
				->setLimit(1)
				->setOrderings(array($propertyName => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
			$result = $query->execute();
			return $result[0];
			
		} elseif (substr($methodName, 0, 8) === 'findByMm' && strlen($methodName) > 9) {
		
			$propertyName = strtolower(substr(substr($methodName, 8), 0, 1) ) . substr(substr($methodName, 8), 1);
			$query = $this->createQuery();
			return $query->matching($query->equals($propertyName.'.uid', $arguments[0]))
										//->setOrderings(array('date' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING))
										->execute();

			
		} else {
			return parent::__call($methodName, $arguments);
		}
		throw new Tx_Extbase_Persistence_Exception_UnsupportedMethod('The method "' . $methodName . '" is not supported by the repository.', 1233180480);
	}
	

}
?>
