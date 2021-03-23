<?php
namespace Reloadly\Airtime;
use Reloadly\Authentication\AuthenticationAPI;
use Reloadly\Operation\AccountOperations;
use Reloadly\Operation\CountryOperations;
use Reloadly\Operation\OperatorOperations;
use Reloadly\Operation\DiscountOperations;
use Reloadly\Operation\PromotionOperations;
use Reloadly\Operation\TopupOperations;
use Reloadly\Operation\ReportOperations;

class AirtimeAPI
{
	private $baseUrl;
	private $clientId;
	private $clientSecret;
	private $accessToken;

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
	public function environment($baseUrl){
		$this->baseUrl = $baseUrl;
		return $this;
	}
	public function build(){
		return $this;
	}
	public function accounts(){
		return new AccountOperations($this->baseUrl,$this->retrieveAccessToken());
	}
	public function countries(){
		return new CountryOperations($this->baseUrl,$this->retrieveAccessToken());
	}
	public function discounts(){
		return new DiscountOperations($this->baseUrl,$this->retrieveAccessToken());
	}
	public function operators(){
		return new OperatorOperations($this->baseUrl,$this->retrieveAccessToken());
	}
	public function promotions(){
		return new PromotionOperations($this->baseUrl,$this->retrieveAccessToken());
	}
	public function reports(){
		return new ReportOperations($this->baseUrl,$this->retrieveAccessToken());
	}
	public function topups(){
		return new TopupOperations($this->baseUrl,$this->retrieveAccessToken());
	}
	private function retrieveAccessToken(){
		$authApi = new AuthenticationAPI();
		if(empty($this->accessToken)){
			$response = $authApi->builder()
						->clientId($this->clientId)
						->clientSecret($this->clientSecret)
						->service($this->baseUrl)
						->build()
						->clientCredentials()
						->getAccessToken()
						->execute();
			$this->accessToken = $response->access_token;
		}
		return $this->accessToken;
	}
}