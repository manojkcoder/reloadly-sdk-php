<?php
namespace Reloadly\Operation;
use Reloadly\Operation\BaseOperation;
use Reloadly\Validator\ReloadlyValidator;

class OperatorOperations extends BaseOperation
{
	CONST END_POINT = "operators";
	CONST PATH_SEGMENT_FX_RATE = "fx-rate";
	CONST PATH_SEGMENT_COUNTRIES = "countries";
	CONST PATH_SEGMENT_AUTO_DETECT = "auto-detect";
	CONST PATH_SEGMENT_AUTO_DETECT_PHONE = "phone";
	private $baseUrl;
	private $apiToken;
	function __construct(
		$baseUrl,
		$apiToken
	){
		$this->baseUrl = $baseUrl;
		$this->apiToken = $apiToken;
	}
	public function list($filter=''){
		$baseUrl = $this->baseUrl."/".self::END_POINT;
		if($filter){
			$baseUrl = $baseUrl.'?'.http_build_query($filter->getParameters());
		}
		$this->baseUrl = $baseUrl;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function getById($operatorId,$filter=''){
		ReloadlyValidator::assertNotBlank($operatorId,"Operator Id");

		$baseUrl = $this->baseUrl."/".self::END_POINT."/".$operatorId;
		if($filter){
			$baseUrl = $baseUrl.'?'.http_build_query($filter->getParameters());
		}
		$this->baseUrl = $baseUrl;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function autoDetect($phone,$countryCode,$filter=''){
		ReloadlyValidator::assertNotBlank($phone,"Phone");
		ReloadlyValidator::assertNotBlank($countryCode,"Country Code");

		$baseUrl = $this->baseUrl."/".self::END_POINT."/".self::PATH_SEGMENT_AUTO_DETECT."/".self::PATH_SEGMENT_AUTO_DETECT_PHONE."/".$phone."/".self::PATH_SEGMENT_COUNTRIES."/".$countryCode;
		if($filter){
			$baseUrl = $baseUrl.'?'.http_build_query($filter->getParameters());
		}
		$this->baseUrl = $baseUrl;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function listByCountryCode($countryCode,$filter=''){
		ReloadlyValidator::assertNotBlank($countryCode,"Country Code");

		$baseUrl = $this->baseUrl."/".self::END_POINT."/".self::PATH_SEGMENT_COUNTRIES."/".$countryCode;
		if($filter){
			$baseUrl = $baseUrl.'?'.http_build_query($filter->getParameters());
		}
		$this->baseUrl = $baseUrl;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function calculateFxRate($operatorId,$amount){
		ReloadlyValidator::assertNotBlank($operatorId,"Operator Id");
		ReloadlyValidator::assertNotBlank($amount,"Amount");

		$bodyArg = array(
			"operatorId" => $operatorId,
			"amount" => $amount
		);
		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".self::PATH_SEGMENT_FX_RATE;
		return $this->createPostRequest($this->baseUrl,$this->apiToken,$bodyArg);
	}
}