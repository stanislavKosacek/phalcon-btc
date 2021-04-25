<?php

use App\Providers\Btc\BtcRequest;
use Phalcon\Mvc\Controller;

class ApiController extends Controller
{

	public function btcAction()
	{
		$this->view->disable();

		$btcRequest = new BtcRequest($this->config->btc->coindeskApiUrl);
		$btc = $btcRequest->getBtc();

		$data = [
			"usd" => $btc->getUsdPrice(),
			"eur" => $btc->getEurPrice(),
		];

		$this->response->setContentType('application/json', 'UTF-8');
		$this->response->setJsonContent($data);
		$this->response->send();

	}
}
