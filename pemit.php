<?php
    $merchantCode = 'D7704'; // dari dashboard duitku
    $merchantKey = 'cf308f3e44e89698180bc9585dca6483'; // dari dashboard duitku
    $paymentAmount = 40000;
    $paymentMethod = 'VC'; // VC = Credit Card
    $merchantOrderId = time() . ''; // dari merchant, unik
    $productDetails = 'Tes pembayaran menggunakan Duitku';
    $email = 'test@test.com'; // email pelanggan anda
    $phoneNumber = '08123456789'; // nomor telepon pelanggan anda (opsional)
    $additionalParam = ''; // opsional
    $merchantUserInfo = ''; // opsional
    $customerVaName = 'John Doe'; // tampilan nama pada tampilan konfirmasi bank
    $callbackUrl = 'http://www.aplikasi-utbk.online/callback'; // url untuk callback
    $returnUrl = 'http://www.aplikasi-utbk.online/return'; // url untuk redirect
    $expiryPeriod = 10; // atur waktu kadaluarsa dalam hitungan menit
    $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);

    // Customer Detail
    $firstName = "John";
    $lastName = "Doe";

    // Address
    $alamat = "Jl. Kembangan Raya";
    $city = "Jakarta";
    $postalCode = "11530";
    $countryCode = "ID";

    $address = array(
        'firstName' => $firstName,
        'lastName' => $lastName,
        'address' => $alamat,
        'city' => $city,
        'postalCode' => $postalCode,
        'phone' => $phoneNumber,
        'countryCode' => $countryCode
    );

    $customerDetail = array(
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'phoneNumber' => $phoneNumber,
        'billingAddress' => $address,
        'shippingAddress' => $address
    );


    $item1 = array(
        'name' => 'Test Item 1',
        'price' => 10000,
        'quantity' => 1);

    $item2 = array(
        'name' => 'Test Item 2',
        'price' => 30000,
        'quantity' => 3);

    $itemDetails = array(
        $item1, $item2
    );

    $params = array(
        'merchantCode' => $merchantCode,
        'paymentAmount' => $paymentAmount,
        'paymentMethod' => $paymentMethod,
        'merchantOrderId' => $merchantOrderId,
        'productDetails' => $productDetails,
        'additionalParam' => $additionalParam,
        'merchantUserInfo' => $merchantUserInfo,
        'customerVaName' => $customerVaName,
        'email' => $email,
        'phoneNumber' => $phoneNumber,
        'itemDetails' => $itemDetails,
        'customerDetail' => $customerDetail,
        'callbackUrl' => $callbackUrl,
        'returnUrl' => $returnUrl,
        'signature' => $signature,
        'expiryPeriod' => $expiryPeriod
    );

    $params_string = json_encode($params);
    //echo $params_string;
    $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
    // $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($params_string))                                                                       
    );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    //execute post
    $request = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200)
    {
        $result = json_decode($request, true);
        //header('location: '. $result['paymentUrl']);
        echo "paymentUrl :". $result['paymentUrl'] . "<br />";
        echo "merchantCode :". $result['merchantCode'] . "<br />";
        echo "reference :". $result['reference'] . "<br />";
        echo "vaNumber :". $result['vaNumber'] . "<br />";
        echo "amount :". $result['amount'] . "<br />";
        echo "statusCode :". $result['statusCode'] . "<br />";
        echo "statusMessage :". $result['statusMessage'] . "<br />";
    }
    else
    {
        echo $httpCode;
    }
?>