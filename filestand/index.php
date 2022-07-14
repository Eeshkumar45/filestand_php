<!DOCTYPE html>
<html lang="en">
<head>
<title>FILESTAND</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

</head>
<body>

<!-- Navbar -->

<div class="navBar">
    <div class="navBarContentsContainer">
  <img id="logo" src="./images/logo.png" />


  <div id="navBarCodeDiv">
            <p><b>CODE : </b></p>
        
            <form id="codeForm2" action="javascript:void(0);" method="get">
            <input name="code" autocomplete="off" id = "navBarCodeInput" size="10" type="text" />
            <button  id="navBarCodeBtn" onclick="goN();">GO</button>
            <input class="hide" style="display:inblock-items" id="submitBtnNAV" type="submit" value="submitNAV" />

        </form>
        </div>

</div>
   

</div>

<!-- Header -->







<!-- HTML !-->














<div class="header" >
    <p id="notice"></p>
    <div id="newUserDiv" >
        
        <button class="button-64" id="newUserDivBtn" onclick="divclick('newuser');" role="button"><span class="text">NEW USER</span></button>


    </div>



    <div id="getCodeDiv">
        <div id="getCodeDivCodeDiv">
            <p><b>CODE : </b></p>
        <form id="codeForm" action="javascript:void(0);" method="post">
            <input name="code" autocomplete="off" id = "getCodeDivCodeInput" size="10" type="text" />
            <button class="goBTN" onclick="goB()" id="getCodeDivCodeBtn">GO</button>
            <input class="hide" style="display:inblock-items" id="submitBtn" type="submit" value="submit" />

        </form>
        </div><br/>
    </div>
    
    <div id="existingUserDiv" >
        <button class="button-64" id="existingUserDivBtn" onclick="divclick('existinguser');" role="button"><span class="text">EXISTING USER</span></button>

    </div>
</div>

<form id="goForm" action="javascript:void(0);" method="post">
            <input class="hide" id="goCode" name="code" />
            <input class = "hide" id="goUsertype" name="usertype" usertype="" />
            <input class="hide" style="display:inblock-items" id="submitGO" type="submit" value="submitGO" />
</form>

</body>

<script type="text/javascript">
  


/////////////////////////////////////// FOR BODY FORM //////////////////////////////////////////////////
    $(document).ready(function() {
    $('#codeForm').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            type: "GET",
            url: 'checkcode.php',
            data: $(this).serialize(),
            success: function(response)
            {
                console.log(response);
  
                // user is logged in successfully in the back-end
                // let's redirect
                //availability(response);
                codechecker(response);
           }
       });
     });
});

///////////////////////////////////////  FOR NAVBAR FORM  /////////////////////////////////////////////////////////
 $(document).ready(function() {
    $('#codeForm2').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: 'checkcode.php',
            data: $(this).serialize(),
            success: function(response)
            {
                console.log(response);
  
                // user is logged in successfully in the back-end
                // let's redirect
                //availability(response);
                codechecker(response);

           }
       });
     });
});


///////////////////////////////////// GO SUBMIT ///////////////////////////////////////
 $(document).ready(function() {
    $('#goForm').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            type: "POST",
            url: 'goCode.php',
            data: $(this).serialize(),
            success: function(response)
            {
                console.log('okokok');
                console.log(response);
                if(usertype!='newuser' && response!='nothing'){
                    var hash = CryptoJS.MD5(window.prompt("password : " )).toString().substr(0,10);
                    
                    console.log(hash);

                    if(response!=hash){
                        window.location.href = "./index.php";
                    }else{
                        document.cookie = "cod=".concat(document.getElementById('getCodeDivCodeInput').value);

                        window.location.href = "./handle.php";
                    }
                }else{
                  document.cookie = "cod=".concat(document.getElementById('getCodeDivCodeInput').value);

                  window.location.href = "./handle.php";  
                }
                //window.location.href = "./handle.php";
            
                // user is logged in successfully in the back-end
                // let's redirect
                //availability(response);
           }
       });
     });
});

</script>
<?php

//for new user insert to db and make folder
function insertAndmkdir(){

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

$result = mysqli_query($conn,"insert into creds(code) values(".$a.")");



    //at end start session
}

//function to login
function startSession(){
    
}

?>
<script src="script.js"></script>

</html>
