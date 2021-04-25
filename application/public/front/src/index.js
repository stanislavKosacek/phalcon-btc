import {BitcoinPricesItem} from "./BitcoinPricesItem";
import './style.css';

window.updatePrice = (apiUrl, timer, configTimer, updatePriceBtn, updatePriceBtnText) => {
	updatePriceBtn.textContent = "";
	updatePriceBtn.classList.add("lds-dual-ring")
	fetch(apiUrl)
		.then(response => response.json())
		.then(json => {
			const bitcoinPricesElm = document.querySelector('.bitcoin_prices');
			bitcoinPricesElm.innerHTML = "";
			bitcoinPricesElm.appendChild(BitcoinPricesItem({
				currency: "usd",
				price: json.usd
			}));
			bitcoinPricesElm.appendChild(BitcoinPricesItem({
				currency: "eur",
				price: json.eur
			}));

			window.timer = configTimer;
			updatePriceBtn.classList.remove("lds-dual-ring")
			updatePriceBtn.textContent = `${updatePriceBtnText} ${configTimer}`;
		})
}


