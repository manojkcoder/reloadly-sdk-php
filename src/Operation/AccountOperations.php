<?php
namespace Reloadly\Operation;
use Reloadly\Operation\BaseOperation;

class AccountOperations extends BaseOperation
{
	CONST END_POINT = "accounts";
	CONST PATH_BALANCE = "balance";
	private $baseUrl;
	private $apiToken;
	function __construct(
		$baseUrl,
		$apiToken
	){
		$this->baseUrl = $baseUrl;
		$this->apiToken = $apiToken;
	}
	public function getBalance(){
		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".self::PATH_BALANCE;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
}