import {BitcoinPricesItem} from "./BitcoinPricesItem";
import './style.css';

let timer = 30;
const updatePriceBtn = document.querySelector('#updatePrice');
const updatePriceBtnText = updatePriceBtn.textContent;
updatePriceBtn.textContent = `${updatePriceBtnText} ${timer}`;

const updatePrice = () => {
	updatePriceBtn.textContent = "";
	updatePriceBtn.classList.add("lds-dual-ring")
	fetch('/api/btc')
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

			timer = 30;
			updatePriceBtn.classList.remove("lds-dual-ring")
			updatePriceBtn.textContent = `${updatePriceBtnText} ${timer}`;
		})
}

setInterval(() => {
	timer--
	if (timer === 0) {
		updatePrice();
	}
	if (!updatePriceBtn.classList.contains("lds-dual-ring")) {
		updatePriceBtn.textContent = `${updatePriceBtnText} ${timer}`
	}
}, 1000)

updatePriceBtn.addEventListener('click', updatePrice);

