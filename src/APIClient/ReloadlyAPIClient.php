<?php
namespace Reloadly\APIClient;
use Reloadly\Exception\ReloadlyException;
use GuzzleHttp\Client;

class ReloadlyAPIClient
{
	public function sendRequest($url,$type,$data){
		$client = new Client();
		$response = $client->request($type,$url,$data);
		if($response->getStatusCode() !== 200){
			throw new ReloadlyException($response->getBody()->getMessage(),$response->getStatusCode());
		}
		$body = $response->getBody();
		return json_decode($body);
	}
}