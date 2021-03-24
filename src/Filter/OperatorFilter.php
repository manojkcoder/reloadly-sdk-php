<?php
namespace Reloadly\Filter;
use Reloadly\Filter\QueryFilter;
use Reloadly\Validator\ReloadlyValidator;

class OperatorFilter extends QueryFilter
{
	CONST INCLUDE_PIN = "includePin";
	CONST INCLUDE_DATA = "includeData";
	CONST INCLUDE_BUNDLES = "includeBundles";
	CONST INCLUDE_SUGGESTED_AMOUNTS = "suggestedAmounts";
	CONST INCLUDE_RANGE_DENOMINATION_TYPE = "includeRange";
	CONST INCLUDE_FIXED_DENOMINATION_TYPE = "includeFixed";
	CONST INCLUDE_SUGGESTED_AMOUNTS_MAP = "suggestedAmountsMap";

	/**
	* Whether to include pin-based operators in response
	*
	* @param includePin - Whether to include pin-based operators in response
	* @return - OperatorFilter
	*/
	public function includePin($includePin){
		$this->parameters[self::INCLUDE_PIN] = $includePin;
		return $this->parameters;
	}

	/**
	* Whether to include data operators in response
	*
	* @param includeData - Whether to include data operators in response
	* @return - OperatorFilter
	*/
	public function includeData($includeData){
		$this->parameters[self::INCLUDE_DATA] = $includeData;
		return $this->parameters;
	}

	/**
	* Whether to include bundles operators in response
	*
	* @param includeBundles - Whether to include bundles in response
	* @return - OperatorFilter
	*/
	public function includeBundles($includeBundles){
		$this->parameters[self::INCLUDE_BUNDLES] = $includeBundles;
		return $this->parameters;
	}

	/**
	* Whether to include suggestedAmount field in response
	*
	* @param includeSuggestedAmounts - Whether to include suggested amounts in response
	* @return - OperatorFilter
	*/
	public function includeSuggestedAmounts($includeSuggestedAmounts){
		$this->parameters[self::INCLUDE_SUGGESTED_AMOUNTS] = $includeSuggestedAmounts;
		return $this->parameters;
	}

	/**
	* Whether to include suggestedAmountsMap field in response
	*
	* @param includeSuggestedAmountsMap - Whether to include suggested amounts map in response
	* @return - OperatorFilter
	*/
	public function includeSuggestedAmountsMap($includeSuggestedAmountsMap){
		$this->parameters[self::INCLUDE_SUGGESTED_AMOUNTS_MAP] = $includeSuggestedAmountsMap;
		return $this->parameters;
	}

	/**
	* Whether to include operators where denomination type is RANGE in response
	*
	* @param includeRangeDenominationType - Whether to include range denomination type
	* @return - OperatorFilter
	*/
	public function includeRangeDenominationType($includeRangeDenominationType){
		$this->parameters[self::INCLUDE_RANGE_DENOMINATION_TYPE] = $includeRangeDenominationType;
		return $this->parameters;
	}

	/**
	* Whether to include operators where denomination type is FIXED in response
	*
	* @param includeFixedDenominationType - Whether to include fixed denomination type
	* @return - OperatorFilter
	*/
	public function includeFixedDenominationType($includeFixedDenominationType){
		$this->parameters[self::INCLUDE_FIXED_DENOMINATION_TYPE] = $includeFixedDenominationType;
		return $this->parameters;
	}
}