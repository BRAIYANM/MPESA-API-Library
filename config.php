<?php
include_once './MPESA.php';
define('ENDPOINT', 'https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl');
define('CALLBACK_URL', 'your callack URL here');
define('CALL_BACK_METHOD', 'POST');
define('PAYBILL_NO', '898998');
define('TIMESTAMP', '20160510161908');
define('PASSWORD', 'ZmRmZDYwYzIzZDQxZDc5ODYwMTIzYjUxNzNkZDMwMDRjNGRkZTY2ZDQ3ZTI0YjVjODc4ZTExNTNjMDA1YTcwNw=='); 
//$TIMESTAMP = date("YmdHis",time());
//$PASSKEY = "your SAG password"
/* NB : PASSWORD MUST BE OBTAIN FROM THE BELOW FORMAT
  $PASSWORD = base64_encode(hash("sha256", $MERCHENTS_ID.$PASSKEY.$TIMESTAMP ,True)); */

$mpesa = new MPESA(ENDPOINT, CALLBACK_URL, CALL_BACK_METHOD, PAYBILL_NO, TIMESTAMP, PASSWORD,$MySQLiconn);