<?php

use App\Providers\Btc\BtcRequest;

class IndexController extends BaseController
{

	public function indexAction()
	{
		$btcRequest = new BtcRequest($this->config->btc->coindeskApiUrl);

		$this->view->btc = $btcRequest->getBtc();

		$this->assets->addInlineJs($this->getIndexInlineJs());
	}



	private function getIndexInlineJs()
	{
		$btcApiUrl = $this->url->get('api/btc');

		return "
			const configTimer = " . $this->config->btc->updateTime ."
			window.timer = configTimer
			const updatePriceBtn = document.querySelector('#updatePrice');
			const updatePriceBtnText = updatePriceBtn.textContent;
			updatePriceBtn.textContent = updatePriceBtnText + ' ' + window.timer;
			
			setInterval(() => {
				window.timer--
				if (window.timer === 0) {
					window.updatePrice('" . $btcApiUrl . "', window.timer, configTimer, updatePriceBtn, updatePriceBtnText);
				}
				if (!updatePriceBtn.classList.contains('lds-dual-ring')) {
					updatePriceBtn.textContent = updatePriceBtnText + ' ' + window.timer;
				}
			}, 1000)
			
			updatePriceBtn.addEventListener('click', () => {
				window.updatePrice('" . $btcApiUrl . "', window.timer, configTimer, updatePriceBtn, updatePriceBtnText)
			});
		";
	}
}
