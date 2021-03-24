<?php
namespace Reloadly\Filter;
use Reloadly\Filter\BaseFilter;
use Reloadly\Validator\ReloadlyValidator;

class QueryFilter extends BaseFilter
{
	/**
	* Filter by page
	*
	* @param pageNumber the page number to retrieve.
	* @param pageSize   the amount of items per page to retrieve.
	* @return this filter instance
	*/
	public function withPage($pageNumber,$pageSize){
		ReloadlyValidator::customValidation($pageNumber,"Page number");
		ReloadlyValidator::customValidation($pageSize,"Amount per page");
		$this->parameters['page'] = $pageNumber;
		$this->parameters['size'] = $pageSize;
		return $this->parameters;
	}
}