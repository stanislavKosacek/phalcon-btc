<?php

namespace App\Models;

class Btc
{

	private float $usdPrice;

	private float $eurPrice;



	public function __construct(float $usdPrice, float $eurPrice)
	{
		$this->usdPrice = $usdPrice;
		$this->eurPrice = $eurPrice;
	}



	/**
	 * @return float
	 */
	public function getUsdPrice(): float
	{
		return $this->usdPrice;
	}



	/**
	 * @return float
	 */
	public function getEurPrice(): float
	{
		return $this->eurPrice;
	}


	public static function createSelfFromCoindeskJson(object $json)
	{
		return new Btc($json->bpi->USD->rate_float, $json->bpi->EUR->rate_float);
	}
}
