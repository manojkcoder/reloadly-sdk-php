<?php
namespace Reloadly\Request;
use Reloadly\Request\TopupRequest;

class EmailTopupRequest extends TopupRequest
{
	public function recipientEmail($recipientEmail){
		$this->parameters['recipientEmail'] = $recipientEmail;
		return $this->parameters;
	}
}