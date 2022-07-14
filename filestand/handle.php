<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>FILESTAND</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./handlestyles.css">
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<div class="logoutDiv">
<div class="passDiv">
<p id="passLabel">PASSWORD PROTECTION</p>

<label style="margin-left:10px;align-items:center" class="switch">
 <input type="checkbox" id="togBtn">
 <div class="slider round">
  <!--ADDED HTML -->
  <span class="on">ON</span>
  <span class="off">OFF</span>
  <!--END-->
 </div>
</label>
</div>

<button class="logoutBTN" onclick="window.location.href = './index.php';" type="button" >
          <i class="fa fa-sign-out"></i> Log out
        </button>
</div>
<br/>
   <!--     <input type="range" min="100" max="300" value="200" class="slider" style ="width: 100%;" id="myRange">  -->






<?php

echo "username : ".$_COOKIE['cod'];
function uploadFiles(){
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";

  $path = "./folders/".substr(md5($_COOKIE['cod']),0,20);

     if(!empty(array_filter($_FILES['files']['name']))) {
         foreach ($_FILES['files']['tmp_name'] as $key => $value) {
           $file_tmpname = $_FILES['files']['tmp_name'][$key];
               $file_name = $_FILES['files']['name'][$key];
               $file_size = $_FILES['files']['size'][$key];
               $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
               $file_name = str_replace("&", "_and_", $file_name);
               $file_name = str_replace(".php", "_php.txt", $file_name);
               $file_name = str_replace(".js", "_js.txt", $file_name);
               $file_name = str_replace(" ", "_", $file_name);
               $filepath = $path.'/'.$file_name;
               if(true) {
                   if(file_exists($filepath)) {
                   	while(file_exists($filepath)){
                       $file_name = "x".$file_name;
                       $filepath = $path.$file_name;
                   }
                   $filepath = $path.'/'.$file_name;
                   
                       if( move_uploaded_file($file_tmpname, $filepath)) {
                              echo "{$file_name} successfully uploaded <br />"; 
                              //$resultxn = mysqli_query($conn,"insert into ".$unicodeFL." values('".$file_name."','".$file_size."');");
                      } 
                       else {                     
                           echo "Error uploading {$file_name} <br />";
                       }
                   }
                   else {
                       if( move_uploaded_file($file_tmpname, $filepath)) {
   
                           echo "{$file_name} successfully uploaded <br />";
                           //$resultxn = mysqli_query($conn,"insert into ".$unicodeFL." values('".$file_name."','".$file_size."');");
                       }
                       else {                     
                           echo "Error uploading {$file_name} <br />"; 
                       }
                   }
               }
               else {
   
                   echo "Error uploading {$file_name} "; 
   
                   echo "({$file_ext} file type is not allowed)<br / >";
   
               } 
   
           }
   
       } 
   
       else {
   
           echo "No files selected.";
   
       }
       echo '<script>setTimeout(function () { window.location.href = "./handle.php"; }, 2500);</script>';
   } 




if (!isset($_POST['uform']) and !isset($_SESSION['fn'])) {
             ?>

<div class="upDiv">
       <p>
            Select files to upload: 
        </p>
<form action="" id="fileuploadform" method="POST" enctype="multipart/form-data">
       
    <!--    <button class="button-42" role="button"><input type="file" name="files[]" multiple></button> -->




    
    <input  class="button-42" type="file" name="files[]" multiple>




    <div class="file-input">
      <input
        type="submit"
         name="uform" value="Upload" 
        id="file-input"
        class="file-input__input"
      />
      <label class="file-input__label" for="file-input">
        <svg
          aria-hidden="true"
          focusable="false"
          data-prefix="fas"
          data-icon="upload"
          class="svg-inline--fa fa-upload fa-w-16"
          role="img"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 512 512"
        >
          <path
            fill="currentColor"
            d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
          ></path>
        </svg>
        <span>Upload file</span></label
      >
    </div>

            
            
         
</form>
</div>
<?php }
else if(isset($_POST['uform'])){
	
uploadFiles();
}










$path = "./folders/".substr(md5($_COOKIE['cod']),0,20);

$files = scandir($path);

function drawTable(){
$path = "./folders/".substr(md5($_COOKIE['cod']),0,20);

$files = scandir($path);

$once=1;
for ($x =0;$x<count($files);$x++) {
$file = $files[$x];

if($once==1){
echo '
<div class="container">
<table id="tabl1" class="tab1" >
  <tr>
  	<th class="inch" id="mainCheckbox"  >
  		<input type="checkbox" style="width: 15px;" id="checkall" name="checkall" onclick="checkOrUncheckAllBoxes();" width="3" >
  	</th>
    <th class="heading" style="width: 65%;font-size: 20px;">File name</th>
 <!--   <th class="heading" style="width: 21%;">File size</th>     -->
    <th class="inch" style="width: 7%;"></th>
  	<th class="inch" style="width: 7%;"></th>
  </tr>
  </table>';
  $once+=1;
}
$filepath = '\''.'/folders//'.substr(md5($_COOKIE['cod']),0,20).'/'.$file.'\'';
if(!in_array($file,array(".",".."))){
    $dFile = $file;
    $dFile = str_replace("_php.txt", ".php", $dFile);
    $dFile = str_replace("_js.txt", ".js", $dFile);
echo '
<table id = "tabl2" class="tab2">
  <tr>
  	<th class="inch" style="background-color:lightblue">
  		<input type="checkbox"  id="'.$x.'" name="checkall" style="width: 10px;" onclick="checkOrUncheckMyBox('.$x.'); "/>
		<br>
  	</th>
    <td style="width: 65%;"  class="subfield"><span id="n'.$x.'" class="filenameT">'.$dFile.'</span></td>
  <!--  <td style="width: 21%;" class="subfield">'.round(filesize($path.'/'.$file)/1024).' KB</td>    -->
    <th style="width: 7%;" class="inch" onclick="download('.$x.');" id="'.$x.'d"><i class="fa fa-download" style="font-size:24px"></i></th>
    
    
    <th class="inch" style="width: 7%;" id="'.$x.'t" onclick="deletex('.$filepath.',1);"><i class="fa fa-trash-o" style="font-size:24px"></i></th>
  </tr>
 


';
}
}
echo '</table></div>';
}
drawTable();
  ?>
<div class="bulkButtons">
    <button id="bulkdownload" disabled="true" onclick="bulkdownloadfun();" class="button-32" role="button">Download</button>
  
      <button id="bulkdelete" disabled="true" onclick="bulkdeletefun();" class="button-32" role="button">Delete</button>

</div>
    </body>
    <script>
        let checks = [];

makingarray();

function downloadex(fileUrl, fileName) {
    var a = document.createElement("a");
    a.href = fileUrl;
    var dName = fileName;
    dName = dName.replace("_php.txt",".php");
    dName = dName.replace("_js.txt",".js");
    a.setAttribute("download", dName);
    a.click();
}

function download(int) {
    var mys = 'n'.concat(int.toString());
    console.log(mys);
    var fileUrl = '<?php echo "./".$path."/"; ?>'.concat(document.getElementById(mys).innerHTML);
    console.log(fileUrl);
    var fileName = document.getElementById(mys).innerHTML;
    console.log(fileName);
    downloadex(fileUrl, fileName)
}




function copyToClipboard(text) {
    var dummy = document.createElement("textarea");
    // to avoid breaking orgain page when copying more words
    // cant copy when adding below this code
    // dummy.style.display = 'none'
    document.body.appendChild(dummy);
    //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    alert("link copied");

}

function makingarray() {
    var x = '<?php echo count($files) ?>';
    console.log(x);
    var i = 0;
    var j = 0;
    for (i = 0; i < x - 2; i++) {
        if (document.getElementById(i + 2).checked == true) {
            checks[i] = true;
            j++;
        }
        else {
            checks[i] = false;
        }
    }
    if (j > 0) {
        document.getElementById("bulkdownload").disabled = false;
        document.getElementById("bulkdelete").disabled = false;
        if (j == x - 2) {
            if (document.getElementById("checkall").checked != true) {
                document.getElementById("checkall").checked = true;
                toggle = !toggle;
            }
        }
        else {
            if (document.getElementById("checkall").checked != false) {
                document.getElementById("checkall").checked = false;
                toggle = !toggle;
            }

        }
    }
    else {
        document.getElementById("bulkdownload").disabled = true;
        document.getElementById("bulkdelete").disabled = true;
        if (document.getElementById("checkall").checked != false) {
            document.getElementById("checkall").checked = false;
            toggle = !toggle;
        }
    }
}


function checkOrUncheckMyBox(int) {

    makingarray();

}
let toggle = true;
function checkOrUncheckAllBoxes() {
    var x = '<?php echo count($files) ?>';
    var i = 0;
    var tog = !document.getElementById("checkall").disabled;
    for (i = 0; i < x - 2; i++) {
        var tog = toggle;
        //bulkdelete
        if (document.getElementById(i + 2).checked = tog) {
            checks[i] = tog;
        }
        if (tog == true) {
            document.getElementById("bulkdownload").disabled = false;
            document.getElementById("bulkdelete").disabled = false;
        }
        else {
            document.getElementById("bulkdownload").disabled = true;
            document.getElementById("bulkdelete").disabled = true;
        }

    }
    toggle = !toggle;
}

/*var slider = document.getElementById("myRange");


slider.oninput = function () {
    var lol = this.value.toString().concat('%');
    document.getElementById("tabl1").style.fontSize = lol;
    console.log(lol);
    var xn = document.getElementsByClassName("tab2");
    var arrayLength = xn.length;
    var i = 0;
    for (i = 0; i < arrayLength; i++) {
        xn[i].style.fontSize = lol;
    }

}
*/

function deletex(filename, x) {
    console.log(filename);
    
    var filenameToShow = filename.slice(filename.lastIndexOf("/") + 1, filename.length);
    var unicodeFL = filename.slice(0, 6);
    var filenameN = filename.replace("&", "and");
    

    var js = true;
    if (x != 0) {
        filenameN = '.'.concat(filename);
        console.log(filenameN);
        js = window.confirm("to delete ".concat(filenameToShow));
    }
    if (js == true) {



        $.ajax({
            
            type: 'POST',
            url: './deletefile.php',
            data: { filename : filenameN },
            success: function (data) {
                if (data == 'success') {
                    $this = $(this).closest('tr');
                    $this.remove();
                    window.location.href = "./handle.php";
                }
                else{
                    console.log(data);
                }
            }
        });
    }
};


function bulkdeletefun() {
    var js = window.confirm("delete multiple files?");
    if (js == true) {
        var i = 0;
        for (i = 0; i < checks.length; i++) {
            if (checks[i] == true) {
                var filename = document.getElementById('n'.concat((i + 2).toString())).innerHTML;

                var path = "<?php echo $path.'/' ?>";
                filename = path.concat(filename);
                console.log(filename);
                deletex(filename, 0);
            }
        }
    }
}
function bulkdownloadfun() {
    var js = window.confirm("download multiple files?");
    if (js == true) {
        var i = 0;
        for (i = 0; i < checks.length; i++) {
            if (checks[i] == true) {
                download(i + 2);
            }
        }
    }
}

function reloadpage() {
    setTimeout(function () { window.location.href = "./handle.php"; }, 2500);
}



var pass='NIL';
    var enable;
$.ajax({
            
            type: 'POST',
            url: './passwordProtection.php',
            data: { path:'getstate',enable :  enable,pass:pass},
            success: function (data) {
                console.log(data);
                if(data=='YES'){
                    document.getElementById('togBtn').checked=true;
                }else{
                    document.getElementById('togBtn').checked=false;
                }
            }
        });

document.getElementById('togBtn').addEventListener("change", function() {
    //window.alert(document.getElementById('togBtn').checked);

    var pass='NIL';
    var enable;
    if(document.getElementById('togBtn').checked==true){
        pass = window.prompt('ENTER A PASSWORD : ');
        enable='true';

    }else{
        pass = window.prompt('ENTER PASSWORD TO DISABLE : ');
        enable='false';
    }
    console.log(document.getElementById('togBtn').checked);
    var path = 'changestate';
    $.ajax({
            
            type: 'POST',
            url: './passwordProtection.php',
            data: {path:path, enable : enable,pass:pass},
            success: function (data) {
                if (data == '-1') {
                    window.alert('wrong password');
                    document.getElementById('togBtn').checked=true;
                }
                else{
                    console.log(data);
                }
            }
        });


});




    </script>
</html>