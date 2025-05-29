<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>

    <!-- ✅ Embedded CSS -->
    <style>
        /* Paste your entire style1.css content here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        button {
            width: 48%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        button#swap {
            width: 48%;
            margin-left: 4%;
        }

        #conversion-result {
            margin-top: 20px;
            background-color: #e7f7e7;
            padding: 15px;
            border-radius: 4px;
            text-align: center;
        }

        #history {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        #history-list p {
            margin: 5px 0;
        }

        /* Dark Mode Styles */
        body.dark {
            background-color: #333;
            color: white;
        }

        body.dark .container {
            background-color: #444;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        body.dark button {
            background-color: #333;
        }

        body.dark button:hover {
            background-color: #555;
        }

        body.dark #conversion-result {
            background-color: #3e3e3e;
        }

        body.dark #history {
            background-color: #444;
        }

        body.dark input, body.dark select {
            background-color: #666;
            color: white;
            border: 1px solid #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Currency Converter</h1>
        <form id="conversion-form">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" placeholder="Enter amount" required>
            </div>

            <div class="form-group">
                <label for="from-currency">From Currency:</label>
                <select id="from-currency" required></select>
            </div>

            <div class="form-group">
                <label for="to-currency">To Currency:</label>
                <select id="to-currency" required></select>
            </div>

            <button type="button" id="swap">Swap</button>
            <button type="button" id="convert">Convert</button>
        </form>

        <!-- Conversion Result -->
        <div id="conversion-result">
            <h3>Conversion Result</h3>
            <p id="result">Result will be displayed here.</p>
        </div>

        <!-- Conversion History -->
        <div id="history">
            <h3>Conversion History</h3>
            <div id="history-list"></div>
        </div>

        <button id="dark-toggle">Toggle Dark Mode</button>
    </div>

    <!-- ✅ External JavaScript File -->
    <script src="script1.js"></script>
</body>
</html>
