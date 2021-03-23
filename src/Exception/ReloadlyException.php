<?php
namespace Reloadly\Exception;
use \Exception;
class ReloadlyException extends Exception
{
	protected $message;
	protected $errorCode;
	protected $statusCode;
	protected $path;
	protected $timeStamp;

	public function __construct($message,$errorCode="",$statusCode="",$path=""){
		$this->message = $message;
		$this->errorCode = $errorCode;
		$this->statusCode = $statusCode;
		$this->path = $path;
		$this->timeStamp = strtotime('now');
		parent::__construct($message,$errorCode);
	}
	public function __toString(){
		return __CLASS__.": [{$this->errorCode}]: {$this->message}\n";
	}
}