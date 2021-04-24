<?php

use App\Providers\Btc\BtcRequest;
use Phalcon\Mvc\Controller;

class IndexController extends BaseController
{

	public function indexAction()
	{
		$btcRequest = new BtcRequest();

		$this->view->btc = $btcRequest->getBtc();
	}
}
