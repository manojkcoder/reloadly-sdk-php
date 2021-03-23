<?php
namespace Reloadly\Operation;
use Reloadly\APIClient\ReloadlyAPIClient;
use Reloadly\Constant\HttpHeader;
use Reloadly\Constant\MediaType;

class BaseOperation extends ReloadlyAPIClient
{
	private $baseUrl;
	private $apiToken;
	private $type;
	private $body;

	public function createGetRequest($url,$apiToken){
		$this->baseUrl = $url;
		$this->apiToken = $apiToken;
		$this->type = "GET";
		$this->body['headers'] = array(
			HttpHeader::ACCEPT => MediaType::ACCEPT_APPLICATION_JSON,
			HttpHeader::AUTHORIZATION => "Bearer ".$this->apiToken
		);
		return $this;
	}
	public function createPostRequest($url,$apiToken,$bodyArg){
		$this->baseUrl = $url;
		$this->apiToken = $apiToken;
		$this->type = "POST";
		$this->body['headers'] = array(
			HttpHeader::ACCEPT => MediaType::ACCEPT_APPLICATION_JSON,
			HttpHeader::CONTENT_TYPE => MediaType::APPLICATION_JSON,
			HttpHeader::AUTHORIZATION => "Bearer ".$this->apiToken
		);
		$this->body['body'] = json_encode($bodyArg);
		return $this;
	}
	public function execute(){
		return $this->sendRequest($this->baseUrl,$this->type,$this->body);
	}
}