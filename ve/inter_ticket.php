<?php
    //include('curl.php');
    require 'lib/nusoap.php';
    
    $wsdl = 'http://apidatve.com/AirlineTicket.asmx?wsdl';
    $endpoint = 'http://apidatve.com/AirlineTicket.asmx';
    
    $client = new nusoap_client($wsdl,true);
    $client->setEndpoint($endpoint);
    
    $params = array('startPoint'=>'SGN','endPoint'=>'BKK','departDate'=>'03/14/2019', 'returnDate'=>'','adults'=>1,'children'=>0,'infants'=>0,'username' =>'travelus','password' => 'AEjHL4MUhfDUNd');  // tùy hàm mà t?o tham s?
    //string startPoint, string endPoint, string departDate, string returnDate, int adults, int children, int infants, string username, string password
   
    try{
        $response = $client->call('InternationalResult',$params);      
    echo $client;
    }  catch (Exception $e){
        $e->getMessage();
    }
    
    //echo $client;
    
    //var_dump($response);
?>