<?php


   if (unlink(htmlentities(  $_POST['filename']))) {
     echo "success";
     //drawTable();
     //$resultxn = mysqli_query($conn,"delete from ".$_POST['unicodeFL']." where subfoldname = '".$_POST['filenameToShow']."';");
   }

?>