<?php
namespace Reloadly\Request;

class TopupRequest
{
	protected $parameters = array();
	public function builder(){
		return $this->parameters;
	}
	public function amount($amount){
		$this->parameters['amount'] = $amount;
		return $this->parameters;
	}
	public function operatorId($operatorId){
		$this->parameters['operatorId'] = $operatorId;
		return $this->parameters;
	}
	public function useLocalAmount($useLocalAmount){
		$this->parameters['useLocalAmount'] = $useLocalAmount;
		return $this->parameters;
	}
	public function customIdentifier($customIdentifier){
		$this->parameters['customIdentifier'] = $customIdentifier;
		return $this->parameters;
	}
	public function senderPhone($number,$countryCode){
		$this->parameters['senderPhone']['number'] = $number;
		$this->parameters['senderPhone']['countryCode'] = $countryCode;
		return $this->parameters;
	}
	public function build(){
		return $this->parameters;
	}
	public function getParameters(){
		return $this->parameters;
	}
}