<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security</title>
    <style>
         *{
            background: fixed;
        }
        #back-button{
            font-size: 4vh;
            background-color: blueviolet;
             color: white;
             border-radius: 14px;
              padding: 5px;
              cursor: pointer;
              border: none;
        }#back-button:hover{
            font-size: 2rem;
        }
        h1{
            font-size: 5vh;
        }
        h2{
            font-size: 4vh;
        }
        h3{
            font-size: 3vh;
        }
    </style>
</head>
<body>
    <h1>Safe and Secure Shopping</h1>
<h2>Is making online payment secure on Shopeasy?
<br><br>
Yes, making the online payment is secure on Shopeasy
<br><br>
Does Shopeasy store my credit/debit card infomation?
<br><br>
No. Shopeasy only stores the last 4 digits of your card number for the purpose of card identification.
<br><br>
What credit/debit cards are accepted on Shopeasy?
<br><br>
We accept VISA, MasterCard, Maestro, Rupay, American Express, Diner's Club and Discover credit/debit cards.
<br><br>
Do you accept payment made by credit/debit cards issued in other countries?</h2>

<h3>Yes! We accept VISA, MasterCard, Maestro, American Express credit/debit cards issued by banks in India and in the following countries: Australia, Austria, Belgium, Canada, Cyprus, Denmark, Finland, France, Germany, Ireland, Italy, Luxembourg, the Netherlands, New Zealand, Norway, Portugal, Singapore, Spain, Sweden, the UK and the US. Please note that we do not accept internationally issued credit/debit cards for eGV payments/top-ups.</h3>

<h2>What other payment options are available on Shopeasy?</h2>

<h3>Apart from Credit and Debit Cards, we accept payments via Internet Banking (covering 44 banks), Cash on Delivery, Equated Monthly Installments (EMI), E-Gift Vouchers, Shopeasy Pay Later, UPI, Wallet, and Paytm Postpaid.</h3>

<h2>Privacy Policy</h2>

<h3>Shopeasy.com respects your privacy and is committed to protecting it. For more details, please see our <a href="privacy.php">Privacy Policy</a></h3>

<h2>Contact Us</h2>

<h3>Couldn't find the information you need? Please <a href="#">Contact Us</a></h3>
<button id="back-button">Back to Home page</button>
<script>
    document.getElementById("back-button").addEventListener("click", function() {
        history.back(); // Go back to the previous page
    });
    </script>
</body>
</html>
