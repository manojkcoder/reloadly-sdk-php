<?php
namespace Reloadly\Operation;
use Reloadly\Operation\BaseOperation;
use Reloadly\Validator\ReloadlyValidator;

class DiscountOperations extends BaseOperation
{
	CONST END_POINT = "operators";
	CONST PATH_SEGMENT_DISCOUNT = "commissions";
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
		$baseUrl = $this->baseUrl."/".self::END_POINT."/".self::PATH_SEGMENT_DISCOUNT;
		if($filter){
			$baseUrl = $baseUrl.'?'.http_build_query($filter->getParameters());
		}
		$this->baseUrl = $baseUrl;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function getByOperatorId($operatorId){
		ReloadlyValidator::assertNotBlank($operatorId,"Operator Id");
		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".$operatorId."/".self::PATH_SEGMENT_DISCOUNT;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
}