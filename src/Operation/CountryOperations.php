<?php
namespace Reloadly\Operation;
use Reloadly\Operation\BaseOperation;
use Reloadly\Validator\ReloadlyValidator;

class CountryOperations extends BaseOperation
{
	CONST END_POINT = "countries";
	private $baseUrl;
	private $apiToken;
	function __construct(
		$baseUrl,
		$apiToken
	){
		$this->baseUrl = $baseUrl;
		$this->apiToken = $apiToken;
	}
	public function list(){
		$this->baseUrl = $this->baseUrl."/".self::END_POINT;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
	public function getByCode($code){
		ReloadlyValidator::assertNotBlank($code,"Country Code");
		$this->baseUrl = $this->baseUrl."/".self::END_POINT."/".$code;
		return $this->createGetRequest($this->baseUrl,$this->apiToken);
	}
}