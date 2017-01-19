# MPESA-API-Library
An easy script to interact with Safaricom's <a href="http://www.safaricom.co.ke/personal/m-pesa/do-more-with-m-pesa/m-pesa-api">MPESA API</a> </br>
</br> 
Important: Obtain your Merchant ID and Pass Key when you register for MPESA API with Safaricom.

Online checkout (Lipa Na M-Pesa) is Safaricom's "Web service for integrating the M-Pesa Checkout API to a merchant site. The overall scope of this Web service is to provide primitives for application developers to handle checkout process in a simple way."
</br>
 -- Define your <strong>ENDPOINT</strong>, <strong>CALLBACK_URL</strong>, <strong>CALL_BACK_METHOD</strong>, <strong>PAYBILL_NO</strong>, <strong>TIMESTAMP</strong> and <strong>PASSWORD</strong> 
 </br>

 
 
 <strong>config.php</strong></br>
 <?php</br>
include_once './MPESA.php';</br>
define('ENDPOINT', 'https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl');</br>
define('CALLBACK_URL', 'your callack URL here');</br>
define('CALL_BACK_METHOD', 'POST');</br>
define('PAYBILL_NO', '898998');//test paybill number</br>
define('TIMESTAMP', '20160510161908');</br>
define('PASSWORD', 'ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw=='); </br>
//$TIMESTAMP = date("YmdHis",time());</br>
//$PASSKEY = "your SAG password"</br>
/* NB : PASSWORD MUST BE OBTAIN FROM THE BELOW FORMAT</br>
  $PASSWORD = base64_encode(hash("sha256", $MERCHENTS_ID.$PASSKEY.$TIMESTAMP ,True)); */</br>

$mpesa = new MPESA(ENDPOINT, CALLBACK_URL, CALL_BACK_METHOD, PAYBILL_NO, TIMESTAMP, PASSWORD);</br>
</br>

<strong>index.php</strong>
</br>
if (isset($_POST['amount'], $_POST['number'])) {</br>
        $AMOUNT = $_POST['amount'];</br>
        $NUMBER = $_POST['number']; //format 254700000000</br>
        $PRODUCT_ID = $_POST['item'];</br>
        //init MPESA class</br>
        $mpesa->setProductID($PRODUCT_ID);</br>
        $mpesa->setAmount($AMOUNT);</br>
        $mpesa->setNumber($NUMBER); </br>
        $mpesa->init();</br>
    }</br>
    </br>
    
    
</br>
#

<strong>checkout.php</strong>


        <form method="post" action="checkout.json">
            Amount:<br>
            <input type="text" name="amount">
            <br>
            Phone Number:<br>
            <input type="text" name="number" placeholder="254722333333">
            <br>
            Pay via MPESA:<br>
            <button type="submit" name="checkout" >Check out</button>
        </form>

        <p>This sample uses a real Paybill number it makes real transactions. Hence encouraged to test with the lowest amount 10/=</p>


 
 
