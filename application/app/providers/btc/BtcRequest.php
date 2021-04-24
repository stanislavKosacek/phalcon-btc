<?php

namespace App\Providers\Btc;

use App\Models\Btc;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BtcRequest
{

	public function getBtc(): Btc
	{
			try {
				$client = new Client(["timeout" => 1000]);
				$response = $client->request("GET", "https://api.coindesk.com/v1/bpi/currentprice.json", [
					'headers' => [
						"content-type" => "application/json",
					],
				]);
				$json = json_decode($response->getBody());

				return Btc::createSelfFromCoindeskJson($json);
			} catch (JsonException $e) {
			} catch (GuzzleException $e) {
			}
		}


}
