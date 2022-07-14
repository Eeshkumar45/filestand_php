<?php
	######################### DB #####################################
	
$host = "localhost";
$username =  "id17655576_filestanddb";
$dbpass = "2L62kr23tISt}O=n";
$dbname = "id17655576_filestand";
$conn = mysqli_connect($host,$username,$dbpass,$dbname);
//echo 'something';
	######################### DB #####################################
if (mysqli_connect_errno()) {
  echo "Failed to connectt to MySQL: " . mysqli_connect_error();
  exit();
}
function write_to_console($data) {
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
       
        //echo "<script>console.log('Console: " . $console . "' );</script>";
       }

write_to_console(substr(md5($_REQUEST['code']),0,30));
    $result = mysqli_query($conn,"select code from creds;");

    while($row = mysqli_fetch_assoc($result)){

        if($row['code']==substr(md5($_REQUEST['code']),0,30)){

            mysqli_close($conn);
            echo 'success';
            return;
        }
        }
        mysqli_close($conn);
        echo 'fail';
    


    
?>