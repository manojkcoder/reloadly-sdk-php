<?php
namespace Reloadly\Operation;
use Reloadly\Operation\BaseOperation;
use Reloadly\Validator\ReloadlyValidator;

class ReportOperations extends BaseOperation
{
	CONST END_POINT = "topups/reports/transactions";
	private $baseUrl;
	private $apiToken;
	function __construct(
		$baseUrl,
		$apiToken
	){
		$this->baseUrl = $baseUrl;
		$this->apiToken = $apiToken;
	}
	public function transactionsHistory(){
		return $this;
	}
	public function list($filter=''){
		$baseUrl = $this->baseUrl."/".self::END_POINT;
		if($filter){
			$baseUrl = $baseUrl.'?'.http_build_query($filter->getParameters());
		}
		$this->baseUrl = $baseUrl;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function getById($transactionId){
		ReloadlyValidator::assertNotBlank($transactionId,"Transaction Id");

		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".$transactionId;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
}