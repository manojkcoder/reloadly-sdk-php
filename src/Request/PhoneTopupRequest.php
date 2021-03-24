<?php
namespace Reloadly\Request;
use Reloadly\Request\TopupRequest;

class PhoneTopupRequest extends TopupRequest
{
	public function recipientPhone($number,$countryCode){
		$this->parameters['recipientPhone']['number'] = $number;
		$this->parameters['recipientPhone']['countryCode'] = $countryCode;
		return $this->parameters;
	}
}