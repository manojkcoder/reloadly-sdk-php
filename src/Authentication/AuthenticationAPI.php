<?php
namespace Reloadly\Authentication;
use Reloadly\APIClient\ReloadlyAPIClient;
use Reloadly\Constant\Auth;
use Reloadly\Constant\GrantType;
use Reloadly\Constant\HttpHeader;
use Reloadly\Constant\MediaType;

class AuthenticationAPI extends ReloadlyAPIClient
{
	private $baseUrl = "https://auth.reloadly.com";
	private $clientId;
	private $clientSecret;
	private $service;
	private $body;

	public function builder(){
		return $this;
	}
	public function clientId($clientId){
		$this->clientId = $clientId;
		return $this;
	}
	public function clientSecret($clientSecret){
		$this->clientSecret = $clientSecret;
		return $this;
	}
	public function service($service){
		$this->service = $service;
		return $this;
	}
	public function build(){
		return $this;
	}
	public function clientCredentials(){
		$this->body['headers'] = array(
			HttpHeader::ACCEPT => MediaType::APPLICATION_JSON,
			HttpHeader::CONTENT_TYPE => MediaType::APPLICATION_JSON
		);
		return $this;
	}
	public function getAccessToken(){
		$this->baseUrl = $this->baseUrl."/".Auth::PATH_OAUTH."/".Auth::PATH_TOKEN;
		$bodyArg = array(
			Auth::KEY_CLIENT_ID => $this->clientId,
			Auth::KEY_CLIENT_SECRET => $this->clientSecret,
			Auth::KEY_GRANT_TYPE => GrantType::CLIENT_CREDENTIALS,
			Auth::KEY_AUDIENCE => $this->service
		);
		$this->body['body'] = json_encode($bodyArg);
		return $this;
	}
	public function execute(){
		return $this->sendRequest($this->baseUrl,'POST',$this->body);
	}
}