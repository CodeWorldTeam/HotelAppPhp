<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Dropdown with Custom Options, Search, and Stylish Popup</title>
    <style>
        .container {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[name="browser"] {
            width: 200px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[name="browser"]::-webkit-calendar-picker-indicator {
            color: #333;
            font-size: 16px;
            cursor: pointer;
        }

        .custom-dropdown {
            display: inline-block;
            position: relative;
        }

        .custom-options {
            display: none;
            position: absolute;
            width: 100%;
            max-height: 150px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            z-index: 1;
        }

        .custom-option {
            padding: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .custom-option.show {
            display: block;
        }

        .custom-option:hover {
            background-color: #f9f9f9;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        .popup h2 {
            margin-top: 0;
        }

        .popup input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .popup button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

		/* Remove custom options styling */
        .custom-option {
            display: none;
        }

        /* Add custom select dropdown style */
        .custom-select {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .custom-select select {
            display: none; /* Hide the default select element */
        }

        .custom-options {
            display: none;
            position: absolute;
            width: 100%;
            max-height: 150px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            z-index: 1;
        }

        .custom-select.active .custom-options {
            display: block;
        }

        .custom-option {
            padding: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .custom-option:hover {
            background-color: #f9f9f9;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Styled Dropdown with Custom Options, Search, and Stylish Popup</h1>
        <div class="custom-select" onclick="toggleOptions(this)">
            <label for="browser">Choose a browser:</label>
            <input name="browser" id="browserInput" autocomplete="off" readonly>
            <div class="custom-options" id="optionsList">
                <div class="custom-option" data-value="Internet Explorer">Internet Explorer</div>
                <div class="custom-option" data-value="Firefox">Firefox</div>
                <div class="custom-option" data-value="Chrome">Chrome</div>
                <div class="custom-option" data-value="Opera">Opera</div>
                <div class="custom-option" data-value="Safari">Safari</div>
            </div>
        </div>
        <label for="browser">Options:</label>
    </div>

    <!-- Popup dialog box -->
    <div class="popup" id="popupDialog">
        <h2>Quantity:</h2>
        <input type="number" id="quantityInput" min="1" value="1">
        <button onclick="confirmSelection()">OK</button>
    </div>

    <script>
        function toggleOptions(selectElement) {
            selectElement.classList.toggle("active");
        }

        document.addEventListener("DOMContentLoaded", function () {
            const input = document.getElementById("browserInput");
            const select = document.getElementById("hiddenSelect");
            const optionsList = Array.from(document.getElementById("optionsList").children);
            const popupDialog = document.getElementById("popupDialog");
            const quantityInput = document.getElementById("quantityInput");

            const hiddenSelect = document.createElement("select");
            hiddenSelect.style.display = "none";
            hiddenSelect.id = "hiddenSelect";
            document.body.appendChild(hiddenSelect);

            for (const option of optionsList) {
                const value = option.getAttribute("data-value");
                const text = option.innerText;
                const optionElement = document.createElement("option");
                optionElement.value = value;
                optionElement.innerText = text;
                hiddenSelect.appendChild(optionElement);
            }

            select.addEventListener("change", () => {
                input.value = select.value;
                toggleOptions(select.parentElement);
            });

            input.addEventListener("input", () => {
                const searchTerm = input.value.toLowerCase();
                for (const option of optionsList) {
                    const optionText = option.innerText.toLowerCase();
                    if (optionText.includes(searchTerm)) {
                        option.style.display = "block";
                    } else {
                        option.style.display = "none";
                    }
                }
            });

            function showPopup() {
                popupDialog.style.display = "block";
            }

            function hidePopup() {
                popupDialog.style.display = "none";
            }

            function confirmSelection() {
                const selectedOption = select.value;
                const quantity = parseInt(quantityInput.value, 10);

                // TODO: Process the selected option and quantity as needed
                console.log("Selected Option:", selectedOption);
                console.log("Quantity:", quantity);

                hidePopup();
            }
        });
    </script>
</body>
</html>