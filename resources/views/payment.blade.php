<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BHIM UPI Payment Collection</title>

    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f7f8fc;
            color: #263449;
        }

        /* TOP BAR */

        .top-bar {
            height: 10px;
            background: #20252d;
        }

        /* MAIN CONTAINER */

        .container {
            max-width: 1180px;
            margin: 0 auto;
            padding: 25px 25px 60px;
        }

        /* HEADER */

        .header h1 {
            font-size: 25px;
            color: #344054;
            margin-bottom: 8px;
        }

        .header h1 span {
            font-weight: 400;
        }

        .header p {
            color: #8b94a7;
            font-size: 13px;
            margin-bottom: 28px;
        }

        /* MAIN GRID */

        .main-grid {
            display: grid;
            grid-template-columns: 330px 1fr;
            gap: 40px;
            align-items: start;
        }

        /* CARD */

        .card {
            background: white;
            border: 1px solid #e5e9f0;
            border-radius: 9px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
        }

        .card-title {
            font-size: 14px;
            font-weight: bold;
            color: #344054;
            margin-bottom: 5px;
        }

        .card-description {
            font-size: 12px;
            color: #929aaa;
            margin-bottom: 25px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 17px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #344054;
            margin-bottom: 7px;
        }

        label span {
            font-weight: normal;
            color: #9ba3b0;
        }

        input {
            width: 100%;
            height: 42px;
            border: 1px solid #dce1e8;
            border-radius: 6px;
            padding: 0 10px;
            font-size: 13px;
            color: #344054;
            outline: none;
        }

        input:focus {
            border-color: #635bff;
            box-shadow: 0 0 0 2px rgba(99, 91, 255, 0.1);
        }

        /* AMOUNT */

        .amount-wrapper {
            position: relative;
        }

        .amount-wrapper input {
            padding-left: 35px;
            padding-right: 45px;
        }

        .rupee-symbol {
            position: absolute;
            left: 12px;
            top: 13px;
            color: #687386;
            font-size: 13px;
        }

        .currency {
            position: absolute;
            right: 10px;
            top: 13px;
            color: #8d96a5;
            font-size: 11px;
        }

        .hint {
            font-size: 10px;
            color: #8993a5;
            margin-top: 7px;
        }

        .divider {
            height: 1px;
            background: #edf0f4;
            margin: 20px 0;
            border: 0;
        }

        /* GENERATE BUTTON */

        .generate-btn {
            width: 100%;
            border: none;
            border-radius: 5px;
            height: 37px;
            background: #635bff;
            color: white;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s;
        }

        .generate-btn:hover {
            background: #5148e8;
        }

        .generate-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* BHIM BUTTON */

        .bhim-btn {
            width: 100%;
            height: 37px;
            margin-top: 10px;

            border: 1px solid #dfe3ea;
            border-radius: 5px;

            background: white;
            color: #344054;

            font-size: 12px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }

        .bhim-btn:hover {
            background: #f5f7fb;
        }

        /* SECURE */

        .secure-text {
            text-align: center;
            font-size: 10px;
            color: #929aaa;
            margin-top: 15px;
        }

        /* RIGHT SECTION */

        .summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .summary-header h2 {
            font-size: 13px;
            color: #344054;
        }

        /* PRINT */

        .print-btn {
            background: white;
            border: 1px solid #e5e9f0;
            padding: 7px 11px;
            border-radius: 5px;
            font-size: 11px;
            color: #687386;
            cursor: pointer;
        }

        .print-btn:hover {
            background: #f5f7fb;
        }

        /* SUMMARY */

        .summary-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 22px;
        }

        .info-label {
            color: #929aaa;
            font-size: 11px;
            margin-bottom: 6px;
        }

        .total-amount {
            font-size: 27px;
            font-weight: bold;
            color: #344054;
        }

        .info-value {
            color: #344054;
            font-size: 12px;
            font-weight: bold;
        }

        /* USER */

        .user-details {
            display: flex;
            justify-content: space-between;
            align-items: center;

            border-top: 1px solid #edf0f4;

            padding-top: 20px;
            margin-bottom: 20px;
        }

        .user-name {
            font-size: 12px;
            font-weight: bold;
            color: #344054;
            margin-bottom: 5px;
        }

        .user-upi {
            font-size: 11px;
            color: #929aaa;
        }

        /* STATUS */

        .status {
            background: #e4f7ed;
            color: #369866;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 10px;
        }

        /* QR GRID */

        .qr-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        /* QR CARD */

        .qr-card {
            background: white;
            border: 1px solid #e6eaf0;
            border-radius: 7px;
            padding: 12px;
            text-align: center;
        }

        .qr-top {
            display: flex;
            justify-content: space-between;

            font-size: 10px;
            color: #929aaa;

            margin-bottom: 15px;
        }

        /* QR */

        .qr-code {
            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 145px;

            margin-bottom: 12px;
        }

        .qr-code img {
            width: 145px;
            height: 145px;
        }

        .qr-code canvas {
            width: 145px !important;
            height: 145px !important;
        }

        /* QR AMOUNT */

        .qr-amount {
            font-size: 17px;
            font-weight: bold;
            color: #344054;
            margin-bottom: 6px;
        }

        .qr-upi {
            font-size: 10px;
            color: #929aaa;
            margin-bottom: 12px;
            word-break: break-all;
        }

        /* DOWNLOAD */

        .download-btn {
            width: 100%;
            height: 32px;

            border: none;
            background: #f5f7fb;

            color: #687386;

            font-size: 10px;

            border-radius: 4px;

            cursor: pointer;
        }

        .download-btn:hover {
            background: #e9ecf5;
        }

        /* EMPTY */

        .empty-state {
            text-align: center;

            color: #929aaa;

            font-size: 12px;

            padding: 50px 10px;

            border: 1px dashed #dce1e8;

            border-radius: 8px;

            grid-column: 1 / -1;
        }

        /* ERROR */

        .error-message {
            display: none;

            margin-top: 10px;

            color: #dc3545;

            font-size: 11px;

            line-height: 1.5;
        }

        /* MOBILE */

        @media (max-width: 800px) {

            .main-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .qr-grid {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 22px;
            }

            .summary-header {
                margin-bottom: 20px;
            }
        }

        /* PRINT */

        @media print {

            .top-bar {
                display: none;
            }

            .card {
                display: none;
            }

            .print-btn {
                display: none;
            }

            .main-grid {
                display: block;
            }

            .container {
                max-width: 100%;
                padding: 10px;
            }

            .qr-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .qr-card {
                break-inside: avoid;
            }
        }

    </style>

</head>


<body>

<div class="top-bar"></div>


<div class="container">


    <!-- HEADER -->

    <div class="header">

        <h1>
            Collect the full amount.
            <span>Pay ₹0 fees.</span>
        </h1>

        <p>
            Accept UPI payments directly using BHIM UPI.
        </p>

    </div>


    <div class="main-grid">


        <!-- ========================= -->
        <!-- LEFT FORM -->
        <!-- ========================= -->

        <div class="card">

            <div class="card-title">
                Payment details
            </div>

            <div class="card-description">
                Add your UPI details and the full amount you are owed.
            </div>


            <form id="paymentForm">


                <!-- UPI ID -->

                <div class="form-group">

                    <label>
                        Your UPI ID
                    </label>

                    <input
                        type="text"
                        id="upiId"
                        placeholder="example@upi"
                        autocomplete="off"
                        required
                    >

                </div>


                <!-- ACCOUNT NAME -->

                <div class="form-group">

                    <label>
                        Account holder name
                    </label>

                    <input
                        type="text"
                        id="accountName"
                        placeholder="Jane Doe"
                        required
                    >

                </div>


                <div class="divider"></div>


                <!-- AMOUNT -->

                <div class="form-group">

                    <label>
                        Full amount to collect
                    </label>


                    <div class="amount-wrapper">

                        <span class="rupee-symbol">
                            ₹
                        </span>


                        <input
                            type="number"
                            id="amount"
                            placeholder="4500"
                            min="1"
                            max="1999900"
                            step="0.01"
                            required
                        >


                        <span class="currency">
                            INR
                        </span>

                    </div>


                    <div class="hint">
                        Maximum ₹19,99,900 • Up to 100 QR codes
                    </div>

                </div>


                <!-- NOTE -->

                <div class="form-group">

                    <label>
                        Payment note
                        <span>Optional</span>
                    </label>


                    <input
                        type="text"
                        id="paymentNote"
                        placeholder="e.g. Invoice 001"
                    >

                </div>


                <!-- GENERATE -->

                <button
                    class="generate-btn"
                    type="submit"
                    id="generateButton"
                >

                    Generate QR codes →

                </button>


                <!-- OPEN UPI -->

                <button
                    type="button"
                    class="bhim-btn"
                    onclick="openUPIPayment()"
                >

                    Open BHIM / UPI App

                </button>


                <div
                    class="error-message"
                    id="errorMessage"
                ></div>


            </form>


            <div class="secure-text">

                🔒 Payment details stay in your browser.

            </div>

        </div>



        <!-- ========================= -->
        <!-- RIGHT SUMMARY -->
        <!-- ========================= -->

        <div>


            <!-- SUMMARY HEADER -->

            <div class="summary-header">

                <h2>
                    Payment summary
                </h2>


                <button
                    class="print-btn"
                    onclick="window.print()"
                >

                    🖨 Print all

                </button>

            </div>



            <!-- SUMMARY -->

            <div class="summary-info">


                <div>

                    <div class="info-label">
                        Total to collect
                    </div>

                    <div
                        class="total-amount"
                        id="totalDisplay"
                    >
                        ₹0
                    </div>

                </div>



                <div>

                    <div class="info-label">
                        QR codes
                    </div>

                    <div
                        class="info-value"
                        id="qrCount"
                    >
                        0
                    </div>


                    <div
                        class="info-label"
                        style="margin-top:20px;"
                    >
                        Amount per QR
                    </div>


                    <div class="info-value">
                        Up to ₹1,999
                    </div>

                </div>

            </div>



            <!-- USER -->

            <div class="user-details">


                <div>

                    <div
                        class="user-name"
                        id="summaryName"
                    >
                        Account holder
                    </div>


                    <div
                        class="user-upi"
                        id="summaryUpi"
                    >
                        example@upi
                    </div>

                </div>


                <div
                    class="status"
                    id="status"
                >
                    Waiting
                </div>

            </div>



            <!-- QR GRID -->

            <div
                id="qrGrid"
                class="qr-grid"
            >

                <div class="empty-state">

                    Enter your payment details and click
                    "Generate QR codes".

                </div>

            </div>


        </div>

    </div>

</div>



<script>


/*
|--------------------------------------------------------------------------
| SETTINGS
|--------------------------------------------------------------------------
*/

const MAX_PER_QR = 1999;

const MAX_TOTAL = 1999900;



/*
|--------------------------------------------------------------------------
| FORM
|--------------------------------------------------------------------------
*/

const paymentForm =
    document.getElementById("paymentForm");


paymentForm.addEventListener(
    "submit",
    function(event) {

        event.preventDefault();


        generatePayments();

    }
);



/*
|--------------------------------------------------------------------------
| GENERATE PAYMENTS
|--------------------------------------------------------------------------
*/

function generatePayments() {


    const upiId =
        document.getElementById("upiId")
        .value
        .trim();


    const accountName =
        document.getElementById("accountName")
        .value
        .trim();


    const amount =
        Number(
            document.getElementById("amount")
            .value
        );


    const paymentNote =
        document.getElementById("paymentNote")
        .value
        .trim();


    const error =
        document.getElementById("errorMessage");


    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    error.style.display = "none";



    if (!upiId) {

        showError(
            "Please enter your UPI ID."
        );

        return;

    }



    if (!upiId.includes("@")) {

        showError(
            "Please enter a valid UPI ID, for example example@upi."
        );

        return;

    }



    if (!accountName) {

        showError(
            "Please enter the account holder name."
        );

        return;

    }



    if (!amount || amount <= 0) {

        showError(
            "Please enter a valid amount."
        );

        return;

    }



    if (amount > MAX_TOTAL) {

        showError(
            "Maximum amount is ₹19,99,900."
        );

        return;

    }



    /*
    |--------------------------------------------------------------------------
    | BUTTON
    |--------------------------------------------------------------------------
    */

    const button =
        document.getElementById("generateButton");


    button.disabled = true;

    button.innerText =
        "Generating...";



    /*
    |--------------------------------------------------------------------------
    | UPDATE SUMMARY
    |--------------------------------------------------------------------------
    */

    document.getElementById(
        "totalDisplay"
    ).innerText =
        formatMoney(amount);


    document.getElementById(
        "summaryName"
    ).innerText =
        accountName;


    document.getElementById(
        "summaryUpi"
    ).innerText =
        upiId;


    document.getElementById(
        "status"
    ).innerText =
        "Ready";



    /*
    |--------------------------------------------------------------------------
    | SPLIT AMOUNT
    |--------------------------------------------------------------------------
    */

    let remaining =
        Math.round(amount * 100);


    const maxPerQr =
        MAX_PER_QR * 100;


    const qrAmounts = [];


    while (remaining > 0) {


        const current =
            Math.min(
                remaining,
                maxPerQr
            );


        qrAmounts.push(
            current / 100
        );


        remaining -= current;

    }



    /*
    |--------------------------------------------------------------------------
    | QR COUNT
    |--------------------------------------------------------------------------
    */

    document.getElementById(
        "qrCount"
    ).innerText =
        qrAmounts.length;



    /*
    |--------------------------------------------------------------------------
    | QR GRID
    |--------------------------------------------------------------------------
    */

    const qrGrid =
        document.getElementById(
            "qrGrid"
        );


    qrGrid.innerHTML = "";



    /*
    |--------------------------------------------------------------------------
    | CREATE EACH QR
    |--------------------------------------------------------------------------
    */

    qrAmounts.forEach(
        function(currentAmount, index) {


            createQRCode(

                currentAmount,

                index + 1,

                qrAmounts.length,

                upiId,

                accountName,

                paymentNote

            );

        }
    );



    /*
    |--------------------------------------------------------------------------
    | RESTORE BUTTON
    |--------------------------------------------------------------------------
    */

    setTimeout(
        function() {

            button.disabled = false;

            button.innerText =
                "Generate QR codes →";

        },
        500
    );

}



/*
|--------------------------------------------------------------------------
| CREATE QR CODE
|--------------------------------------------------------------------------
*/

function createQRCode(
    currentAmount,
    qrNumber,
    totalQR,
    upiId,
    accountName,
    paymentNote
) {


    /*
    |--------------------------------------------------------------------------
    | CARD
    |--------------------------------------------------------------------------
    */

    const card =
        document.createElement(
            "div"
        );


    card.className =
        "qr-card";



    /*
    |--------------------------------------------------------------------------
    | TOP
    |--------------------------------------------------------------------------
    */

    const top =
        document.createElement(
            "div"
        );


    top.className =
        "qr-top";


    top.innerHTML = `

        <span>
            Payment ${qrNumber}
        </span>

        <span>
            of ${totalQR}
        </span>

    `;



    /*
    |--------------------------------------------------------------------------
    | QR CONTAINER
    |--------------------------------------------------------------------------
    */

    const qrContainer =
        document.createElement(
            "div"
        );


    qrContainer.className =
        "qr-code";



    /*
    |--------------------------------------------------------------------------
    | QR PAYMENT DATA
    |--------------------------------------------------------------------------
    |
    | Standard UPI payment URI.
    |
    | This QR can be scanned by BHIM
    | and compatible UPI applications.
    |
    |--------------------------------------------------------------------------
    */

    let upiUrl =
        "upi://pay" +

        "?pa=" +
        encodeURIComponent(
            upiId
        ) +

        "&pn=" +
        encodeURIComponent(
            accountName
        ) +

        "&am=" +
        Number(currentAmount)
            .toFixed(2) +

        "&cu=INR";



    /*
    |--------------------------------------------------------------------------
    | PAYMENT NOTE
    |--------------------------------------------------------------------------
    */

    if (paymentNote) {

        upiUrl +=
            "&tn=" +
            encodeURIComponent(
                paymentNote
            );

    }



    /*
    |--------------------------------------------------------------------------
    | GENERATE QR
    |--------------------------------------------------------------------------
    */

    new QRCode(
        qrContainer,
        {
            text: upiUrl,

            width: 145,

            height: 145,

            correctLevel:
                QRCode.CorrectLevel.M
        }
    );



    /*
    |--------------------------------------------------------------------------
    | AMOUNT
    |--------------------------------------------------------------------------
    */

    const amountElement =
        document.createElement(
            "div"
        );


    amountElement.className =
        "qr-amount";


    amountElement.innerText =
        formatMoney(
            currentAmount
        );



    /*
    |--------------------------------------------------------------------------
    | UPI ID
    |--------------------------------------------------------------------------
    */

    const upiElement =
        document.createElement(
            "div"
        );


    upiElement.className =
        "qr-upi";


    upiElement.innerText =
        upiId;



    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD BUTTON
    |--------------------------------------------------------------------------
    */

    const downloadButton =
        document.createElement(
            "button"
        );


    downloadButton.className =
        "download-btn";


    downloadButton.innerText =
        "↓ Download PNG";



    downloadButton.addEventListener(
        "click",
        function() {


            const canvas =
                qrContainer.querySelector(
                    "canvas"
                );


            const image =
                qrContainer.querySelector(
                    "img"
                );


            let downloadUrl =
                null;



            if (canvas) {

                downloadUrl =
                    canvas.toDataURL(
                        "image/png"
                    );

            }

            else if (image) {

                downloadUrl =
                    image.src;

            }



            if (!downloadUrl) {

                alert(
                    "QR code is not ready yet."
                );

                return;

            }



            /*
            |--------------------------------------------------------------------------
            | DOWNLOAD
            |--------------------------------------------------------------------------
            */

            const link =
                document.createElement(
                    "a"
                );


            link.href =
                downloadUrl;


            link.download =
                "bhim-upi-payment-" +
                qrNumber +
                ".png";


            link.click();

        }
    );



    /*
    |--------------------------------------------------------------------------
    | APPEND CARD
    |--------------------------------------------------------------------------
    */

    card.appendChild(top);

    card.appendChild(
        qrContainer
    );

    card.appendChild(
        amountElement
    );

    card.appendChild(
        upiElement
    );

    card.appendChild(
        downloadButton
    );


    document
        .getElementById("qrGrid")
        .appendChild(card);

}



/*
|--------------------------------------------------------------------------
| OPEN UPI APP
|--------------------------------------------------------------------------
|
| Uses the standard UPI payment URI.
|
| On a phone, Android/iOS can route the
| payment request to an installed UPI app.
|
|--------------------------------------------------------------------------
*/

function openUPIPayment() {


    const upiId =
        document.getElementById("upiId")
        .value
        .trim();


    const accountName =
        document.getElementById("accountName")
        .value
        .trim();


    const amount =
        Number(
            document.getElementById("amount")
            .value
        );


    const paymentNote =
        document.getElementById("paymentNote")
        .value
        .trim();



    /*
    |--------------------------------------------------------------------------
    | VALIDATE
    |--------------------------------------------------------------------------
    */

    if (!upiId) {

        alert(
            "Please enter your UPI ID."
        );

        return;

    }



    if (!accountName) {

        alert(
            "Please enter account holder name."
        );

        return;

    }



    if (!amount || amount <= 0) {

        alert(
            "Please enter a valid amount."
        );

        return;

    }



    /*
    |--------------------------------------------------------------------------
    | UPI URL
    |--------------------------------------------------------------------------
    */

    let upiUrl =
        "upi://pay" +

        "?pa=" +
        encodeURIComponent(
            upiId
        ) +

        "&pn=" +
        encodeURIComponent(
            accountName
        ) +

        "&am=" +
        amount.toFixed(2) +

        "&cu=INR";



    if (paymentNote) {

        upiUrl +=
            "&tn=" +
            encodeURIComponent(
                paymentNote
            );

    }



    /*
    |--------------------------------------------------------------------------
    | OPEN
    |--------------------------------------------------------------------------
    */

    window.location.href =
        upiUrl;

}



/*
|--------------------------------------------------------------------------
| FORMAT MONEY
|--------------------------------------------------------------------------
*/

function formatMoney(amount) {

    return "₹" +
        Number(amount)
        .toLocaleString(
            "en-IN",
            {
                minimumFractionDigits: 0,
                maximumFractionDigits: 2
            }
        );

}



/*
|--------------------------------------------------------------------------
| SHOW ERROR
|--------------------------------------------------------------------------
*/

function showError(message) {


    const error =
        document.getElementById(
            "errorMessage"
        );


    error.innerText =
        message;


    error.style.display =
        "block";

}


</script>


</body>

</html>