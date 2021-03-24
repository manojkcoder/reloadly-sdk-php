<?php
namespace Reloadly\Filter;
use Reloadly\Filter\QueryFilter;
use Reloadly\Validator\ReloadlyValidator;

class TransactionHistoryFilter extends QueryFilter
{
	CONST END_DATE = "endDate";
	CONST START_DATE = "startDate";
	CONST OPERATOR_ID = "operatorId";
	CONST COUNTRY_CODE = "countryCode";
	CONST OPERATOR_NAME = "operatorName";
	CONST CUSTOM_IDENTIFIER = "customIdentifier";

	/**
	* @param operatorId - Operator id to filter by
	* @return - TransactionHistoryFilter
	*/
	public function operatorId($operatorId){
		ReloadlyValidator::customValidation($operatorId,"Operator Id");
		$this->parameters[self::OPERATOR_ID] = $operatorId;
		return $this->parameters;
	}

	/**
	* @param countryCode - Country code to filter by
	* @return - TransactionHistoryFilter
	*/
	public function countryCode($countryCode){
		ReloadlyValidator::assertNotBlank($countryCode,"Country code");
		$this->parameters[self::COUNTRY_CODE] = $countryCode;
		return $this->parameters;
	}

	/**
	* @param operatorName - Operator name to filter by
	* @return - TransactionHistoryFilter
	*/
	public function operatorName($operatorName){
		ReloadlyValidator::assertNotBlank($operatorName,"Operator name");
		$this->parameters[self::OPERATOR_NAME] = $operatorName;
		return $this->parameters;
	}

	/**
	* @param customIdentifier - Custom identifier to filter by
	* @return - TransactionHistoryFilter
	*/
	public function customIdentifier($customIdentifier){
		ReloadlyValidator::assertNotBlank($customIdentifier,"Custom identifier");
		$this->parameters[self::CUSTOM_IDENTIFIER] = $customIdentifier;
		return $this->parameters;
	}

	/**
	* @param startDate - Date range start date to filter by
	* @return - TransactionHistoryFilter
	*/
	public function startDate($startDate){
		ReloadlyValidator::assertNotBlank($startDate,"Start date");
		$this->parameters[self::START_DATE] = date("Y-m-d H:i:s",strtotime($startDate));
		return $this->parameters;
	}

	/**
	* @param endDate - Date range end date to filter by
	* @return - TransactionHistoryFilter
	*/
	public function endDate($endDate){
		ReloadlyValidator::assertNotBlank($endDate,"End date");
		$this->parameters[self::END_DATE] = date("Y-m-d H:i:s",strtotime($endDate));
		return $this->parameters;
	}
}