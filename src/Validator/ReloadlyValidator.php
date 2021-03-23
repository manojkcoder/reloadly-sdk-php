<?php
namespace Reloadly\Validator;
use Reloadly\Exception\ReloadlyException;

class ReloadlyValidator
{
	public static function assertNotNull($value,$name){
		if($value == null || empty($value)){
			throw new ReloadlyException($name." cannot be null!",423);
		}
	}
	public static function assertGreaterThanZero($value,$name){
		if($value <= 0 || empty($value)){
			throw new ReloadlyException($name." must be greater than zero!",423);
		}
	}
	public static function assertNotBlank($value,$name){
		if($value == null || empty($value)){
			throw new ReloadlyException($name." cannot be null or empty!",423);
		}
	}
	public static function customValidation($value,$name){
		if($value == null || empty($value)){
			throw new ReloadlyException($name." cannot be null or empty!",423);
		}
		if($value <= 0){
			throw new ReloadlyException($name." must be greater than zero!",423);
		}
	}
}