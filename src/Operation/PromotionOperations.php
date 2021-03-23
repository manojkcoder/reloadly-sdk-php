<?php
namespace Reloadly\Operation;
use Reloadly\Operation\BaseOperation;
use Reloadly\Validator\ReloadlyValidator;

class PromotionOperations extends BaseOperation
{
	CONST END_POINT = "promotions";
	CONST PATH_SEGMENT_COUNTRIES = "countries";
	CONST PATH_SEGMENT_OPERATORS = "operators";
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
	public function getById($promotionId){
		ReloadlyValidator::assertNotBlank($promotionId,"Promotion Id");

		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".$promotionId;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function getByCountryCode($countryCode){
		ReloadlyValidator::assertNotBlank($countryCode,"Country Code");

		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".self::PATH_SEGMENT_COUNTRIES."/".$countryCode;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function getByOperatorId($operatorId){
		ReloadlyValidator::assertNotBlank($operatorId,"Operator Id");

		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".self::PATH_SEGMENT_OPERATORS."/".$operatorId;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
}