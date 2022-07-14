<?php

	
$host = "localhost";
$username =  "id17655576_filestanddb";
$dbpass = "2L62kr23tISt}O=n";
$dbname = "id17655576_filestand";
$conn = mysqli_connect($host,$username,$dbpass,$dbname);

if (mysqli_connect_errno()) {
  echo "Failed to connectt to MySQL: " . mysqli_connect_error();
  exit();
}

/*

path  ------------------ getstate  -------------------- return keyon

path ------------------- changestate ------------------manipulate data

*/


$path = $_REQUEST['path'];

if($path=='getstate'){
    $result = mysqli_query($conn,"select keyon from creds where code='".substr(md5($_COOKIE['cod']),0,30)."'");
    $row = mysqli_fetch_assoc($result);
    echo $row['keyon'];
    
}
else{
$enable = $_REQUEST['enable'];
$pass = $_REQUEST['pass'];
if($enable=='true'){
    $result = mysqli_query($conn,"update creds set pass='".$pass."',keyon='YES' where code='".substr(md5($_COOKIE['cod']),0,30)."'");
}
else{
        $result = mysqli_query($conn,"select pass from creds where code='".substr(md5($_COOKIE['cod']),0,30)."'");
        $row = mysqli_fetch_assoc($result);
        if($pass==$row['pass']){
        $result = mysqli_query($conn,"update creds set pass='NIL',keyon='NO' where code='".substr(md5($_COOKIE['cod']),0,30)."'");
        }else{
            echo '-1';
        }
    }


        }
        mysqli_close($conn);
    








?>