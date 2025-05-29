document.addEventListener("DOMContentLoaded", () => {
    const currencies = ["USD", "EUR", "KES", "GBP", "JPY", "INR"];
    const fromSelect = document.getElementById("from-currency");
    const toSelect = document.getElementById("to-currency");
    const swapBtn = document.getElementById("swap");
    const convertBtn = document.getElementById("convert");
    const resultEl = document.getElementById("result");
    const darkToggle = document.getElementById("dark-toggle");
    const historyEl = document.getElementById("history-list");

    // Populate the select dropdowns with currencies
    currencies.forEach(cur => {
        fromSelect.innerHTML += `<option value="${cur}">${cur}</option>`;
        toSelect.innerHTML += `<option value="${cur}">${cur}</option>`;
    });

    // Set default values
    fromSelect.value = "USD";
    toSelect.value = "KES";

    // Swap currencies when the swap button is clicked
    swapBtn.onclick = () => {
        [fromSelect.value, toSelect.value] = [toSelect.value, fromSelect.value];
        swapBtn.classList.add("swapped");
        setTimeout(() => swapBtn.classList.remove("swapped"), 500);
    };

    // Handle the currency conversion process
    convertBtn.onclick = () => {
        const amount = document.getElementById("amount").value;
        const from = fromSelect.value;
        const to = toSelect.value;

        if (!amount || isNaN(amount) || amount <= 0) {
            alert("Please enter a valid amount.");
            return;
        }

        const conversionRates = {
            "USD": { "KES": 120, "EUR": 0.92, "GBP": 0.80 },
            "EUR": { "USD": 1.09, "KES": 130, "GBP": 0.87 },
            "KES": { "USD": 0.008, "EUR": 0.0077, "GBP": 0.0062 },
            "GBP": { "USD": 1.25, "EUR": 1.15, "KES": 160 },
            "JPY": { "USD": 0.0075, "EUR": 0.0068, "KES": 1.05 },
            "INR": { "USD": 0.012, "EUR": 0.011, "KES": 15.5 },
        };

        const rate = conversionRates[from][to];
        const result = (amount * rate).toFixed(2);

        resultEl.innerHTML = `${amount} ${from} = ${result} ${to}`;

        // Save conversion to LocalStorage
        const conversionData = {
            from,
            to,
            amount,
            result,
            datetime: new Date().toLocaleString(),
        };
        saveToLocalStorage(conversionData);
        loadHistory();

        // Save conversion to the database
        saveConversionToDatabase(conversionData);
    };

    function saveToLocalStorage(data) {
        let history = JSON.parse(localStorage.getItem('conversionHistory')) || [];
        history.push(data);
        localStorage.setItem('conversionHistory', JSON.stringify(history));
    }

    function loadHistory() {
        const history = JSON.parse(localStorage.getItem('conversionHistory')) || [];
        historyEl.innerHTML = history.map(item => `
            <p>${item.amount} ${item.from} ➝ ${item.to} = ${item.result} (${item.datetime})</p>
        `).join('');
    }

    async function saveConversionToDatabase(data) {
        await fetch("save_conversion.php", {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
    }

    // Dark mode toggle
    darkToggle.onclick = () => {
        document.body.classList.toggle("dark");
        localStorage.setItem("theme", document.body.classList.contains("dark") ? "dark" : "light");
    };

    // Load theme from localStorage
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark");
    }
});
