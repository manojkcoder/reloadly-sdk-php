<?php
namespace Reloadly\Operation;
use Reloadly\Operation\BaseOperation;
use Reloadly\Validator\ReloadlyValidator;

class TopupOperations extends BaseOperation
{
	CONST END_POINT = "topups";
	private $baseUrl;
	private $apiToken;
	function __construct(
		$baseUrl,
		$apiToken
	){
		$this->baseUrl = $baseUrl;
		$this->apiToken = $apiToken;
	}
	public function send($body){
		$this->baseUrl = $this->baseUrl."/".self::END_POINT;
		return $this->createPostRequest($this->baseUrl,$this->apiToken,$body->getParameters());
	}
}