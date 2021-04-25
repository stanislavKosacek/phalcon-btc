<?php

use App\Providers\Btc\BtcRequest;

class IndexController extends BaseController
{

	public function indexAction()
	{
		$btcRequest = new BtcRequest($this->config->btc->coindeskApiUrl);

		$this->view->btc = $btcRequest->getBtc();
	}
}
