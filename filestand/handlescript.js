makingarray();

function downloadex(fileUrl, fileName) {
    var a = document.createElement("a");
    a.href = fileUrl;
    a.setAttribute("download", fileName);
    a.click();
}

function download(int) {
    var mys = 'n'.concat(int.toString());
    var fileUrl = '<?php echo "/".$unicodeFL."/"; ?>'.concat(document.getElementById(mys).innerHTML);
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


let checks = [];
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

var slider = document.getElementById("myRange");


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


function deletex(filename, x) {
    console.log(filename);
    var filenameToShow = filename.slice(filename.lastIndexOf("/") + 1, filename.length);
    var unicodeFL = filename.slice(0, 6);
    filename = filename.replace("&", "and");


    var js = true;
    if (x == 1) {
        js = window.confirm("delete ".concat(filenameToShow));
    }
    if (js == true) {



        $.ajax({
            type: 'POST',
            url: '../code.php',
            data: { filenameToShow: filenameToShow, unicodeFL: unicodeFL },
            success: function (data) {
                if (data == 'success') {
                    $this = $(this).closest('tr');
                    $this.remove();
                    window.location.href = "./";
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

                var path = "<?php echo $unicodeFL.'/' ?>";
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
    setTimeout(function () { window.location.href = "./"; }, 2500);
}
