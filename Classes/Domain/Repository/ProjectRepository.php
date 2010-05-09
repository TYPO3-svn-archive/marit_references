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
 * A repository for Projects
 */
class Tx_MaritReferences_Domain_Repository_ProjectRepository extends Tx_MaritReferences_Domain_Repository_BaseRepository {
	
	
	/**
	 * build the query by with search values
	 * 
	 * @param array $search the search parameters
	 * @return array $searchResults
	 *
	 */	
	public function findBySearchValues($search){
		$query = $this->createQuery();
		$queries = $this->createSearchQuery($query, $search);
		$query->matching($queries);		
		$searchResults = $query->execute();
		return $searchResults;
	}

	/**
	 * build the query by with search values and limit the output
	 * 
	 * @param array $search the search parameters
	 * @param integer $limit 
	 * @param integer $offset
	 * @return array $searchResults
	 *
	 */	
	public function findBySearchValuesLimited($search, $limit, $offset = 0){
		$query = $this->createQuery();
		$queries = $this->createSearchQuery($query, $search);
		$query = $query->setOffset((int) $offset);
		$query = $query->setLimit((int) $limit);
		$query->matching($queries);		
		
		$searchResults = $query->execute();
		return $searchResults;
	}

	/**
	 * build the query by with search values and count items
	 * 
	 * @param array $search the search parameters
	 * @return integer $result
	 *
	 */	
	public function countItemsBySearchValues($search){
		$query = $this->createQuery();
		$queries = $this->createSearchQuery($query, $search);
		$query->matching($queries);		
		
		$result = $query->count();
		return $result;
	}
	
	/**
	 * loop through the searchparams and build a query
	 * 
	 * @param Tx_Extbase_Persistence_QueryInterface $query
	 * @param array $search the search parameters
	 * @return object $queries
	 *
	 */
	public function createSearchQuery(Tx_Extbase_Persistence_QueryInterface $query, $search) {		
		foreach($search as $field => $searchValue){
			//var_dump($field);
			//var_dump($searchValue);	
			if($searchValue!=''){
				if($field == 'maxYear'){			
					$field = strtolower(ltrim($field, 'max'));		
					if($queries){
						$queries = $query->logicalAnd($queries, $query->lessThanOrEqual($field, $searchValue));
					} else {
						$queries = $query->lessThanOrEqual($field, $searchValue);
					} 
				} elseif($field == 'minYear'){			
					$field = strtolower(ltrim($field, 'min'));	
					if($queries){
						$queries = $query->logicalAnd($queries, $query->greaterThanOrEqual($field, $searchValue));
					} else {
						$queries = $query->greaterThanOrEqual($field, $searchValue);
					} 
				} else {
					if($field == 'technologies'){
						$field = 'uid';
						$projects = $this->findByMmTechnologies($searchValue);
						unset($searchValue);
						foreach($projects as $project){
							$searchValue[] = $project->getUid();
						}
					}
					if($queries){
						$queries = $query->logicalAnd($queries, $query->equals($field, $searchValue));
					} else {
						$queries = $query->equals($field, $searchValue);
					} 
				}
			}
		}
		return $queries;			
	}

}
?>
