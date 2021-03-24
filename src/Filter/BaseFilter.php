<?php
namespace Reloadly\Filter;

class BaseFilter
{
	protected $parameters = array();

	public function getParameters(){
		return $this->parameters;
	}
}