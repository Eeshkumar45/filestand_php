var usertype;

function notice(text) {
    document.getElementById('notice').innerHTML = text;
}



function divclick(type) {
    document.getElementById("getCodeDivCodeBtn").disabled = true;
    document.getElementById('getCodeDivCodeInput').value = '';

    usertype = type;
    var getCodeDiv = document.getElementById("getCodeDiv");

    if (getCodeDiv.style.display == 'none' || getCodeDiv.style.display == '') {
        if (usertype == 'newuser') {
            notice('enter a new code');
        } else if (usertype == 'existinguser') {
            notice('enter your code')
        }
        getCodeDiv.style.display = 'flex';
    }
    else {
        notice('');
        getCodeDiv.style.display = 'none';
    }
}

var goBtn = document.getElementById('getCodeDivCodeBtn');
function codechecker(response) {

    if (usertype == 'newuser') {
        if (response == 'fail') {
            goBtn.disabled = false;
        }
        else if (response == 'success') {
            goBtn.disabled = true;
        }
    }


    else if (usertype == 'existinguser') {
        if (response == 'success') {
            goBtn.disabled = false;
        }
        else if (response == 'fail') {
            goBtn.disabled = true;
        }
    }

}

document.getElementById("getCodeDivCodeInput").onkeyup = function () {
    document.getElementById('submitBtn').click();
}

document.getElementById("navBarCodeInput").onkeyup = function () {
    document.getElementById('submitBtnNAV').click();
}



function goB() {

    document.getElementById('goCode').value = document.getElementById('getCodeDivCodeInput').value;
    document.getElementById('goUsertype').value = usertype;

    document.getElementById('submitGO').click();

}


