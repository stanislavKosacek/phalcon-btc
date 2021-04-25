export const BitcoinPricesItem = (props) => {
	const bitcoinPricesItemElm = document.createElement('div');
	bitcoinPricesItemElm.classList.add('bitcoin_prices_item');

	const bitcoinPricesItemCurrencyElm = document.createElement('div');
	bitcoinPricesItemCurrencyElm.classList.add('bitcoin_prices_item_currency');
	bitcoinPricesItemCurrencyElm.textContent = props.currency.toUpperCase();

	const bitcoinPricesItemPriceElm = document.createElement('div');
	bitcoinPricesItemPriceElm.classList.add('bitcoin_prices_item_price');
	bitcoinPricesItemPriceElm.textContent = props.price.toFixed(2);

	bitcoinPricesItemElm.appendChild(bitcoinPricesItemCurrencyElm);
	bitcoinPricesItemElm.appendChild(bitcoinPricesItemPriceElm);

	return bitcoinPricesItemElm;
}
