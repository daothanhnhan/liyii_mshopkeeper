<?php
    //include('curl.php');
    require 'lib/nusoap.php';
    
    $wsdl = 'http://apidatve.com/AirlineTicket.asmx?wsdl';
    $endpoint = 'http://apidatve.com/AirlineTicket.asmx';
    
    $client = new nusoap_client($wsdl,true);
    $client->setEndpoint($endpoint);
    
    $params = array('startPoint'=>'SGN','endPoint'=>'HAN','departureDate'=>'09/14/2019', 'returnDate'=>'','adults'=>1,'children'=>0,'infants'=>0,'username' =>'greentours','password' => 'HkcJNnHrlwiK','airline' => 'VJ');  // tùy hàm mà t?o tham s?
    //string startPoint, string endPoint, string departureDate, string returnDate, int adults, int children, int infants, string username, string password, string airline
    //$result = $client->call('DomesticResultResult',$params);

    try{
        $response = $client->call('SearchDomestic',$params);      
    // echo $client;
    }  catch (Exception $e){
        $e->getMessage();
    }
    
    // echo $client->document;
    // $json = json_decode($client->document, true);
    // var_dump($json);
    
    // var_dump($response['SearchDomesticResult']);
    $json = json_decode($response['SearchDomesticResult'], true);
    echo '<pre>';
    var_dump($json[0]);
?>