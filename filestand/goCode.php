<?php

function write_to_console($data) {
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
       
        echo "<script>console.log('Console: " . $console . "' );</script>";
       }


	######################### DB #####################################
	
$host = "localhost";
$username =  "id17655576_filestanddb";
$dbpass = "2L62kr23tISt}O=n";
$dbname = "id17655576_filestand";
$conn = mysqli_connect($host,$username,$dbpass,$dbname);

	######################### DB #####################################
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$usertype = $_REQUEST['usertype'];
$code  = $_REQUEST['code'];






if($usertype=='newuser'){


    $result = mysqli_query($conn,"insert into creds(code) values('".substr(md5($code),0,30)."');");
    if (!file_exists('folders/'.substr(md5($code),0,20))) {
    mkdir('folders/'.substr(md5($code),0,20), 0777, true);
    
    if( !copy('./folders/demo.txt', './folders/'.substr(md5($code),0,20).'/demo.txt') ) { 
    //echo "File can't be copied! \n"; 
} 
else { 
    //echo "File has been copied! \n"; 
} 
}else{
 $usertype=='existinguser';   
}

//    setcookie("code", $code, time() + (86400 * 30), "/");
}
if($usertype=='existinguser'){
    //$result = mysqli_query($conn,"select pass from creds where code=".substr(md5($code),0,20).";");
    $result = mysqli_query($conn,"select pass,keyon from creds where code='".substr(md5($code),0,30)."'");

    $row = mysqli_fetch_assoc($result);
    //write_to_console($row['pass']);
    if($row['keyon'] == 'NO'){
        echo 'nothing';
    }
    else{
            echo substr(md5($row['pass']),0,10);
    }
    

    exit();

}



    
?>