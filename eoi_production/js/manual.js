function phonenumber()
{
    var ph = document.getElementById('phone');
    var phoneno = /^[1-9][0-9]{9}$/;
    if (ph.value.match(phoneno))
    {
        return true;
    } else
    {
        alert("Not a valid Phone Number");
        return false;
    }
}
function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;
    return true;
}
function isempdesc(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)|| (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||event.keyCode == 32 || event.keyCode == 46)
        return false;
    return true;
}
function onlyAlphabets(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)|| event.keyCode == 32 || event.keyCode == 46)
            return true;
        else
            return false;
    } catch (err) {
        alert(err.Description);
    }
}
function onlyqualification(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||event.keyCode == 32 || event.keyCode == 45)
            return true;
        else
            return false;
    } catch (err) {
        alert(err.Description);
    }
}
function onlyemp(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||event.keyCode == 32 || event.keyCode == 46 || event.keyCode==44)
            return true;
        else
            return false;
    } catch (err) {
        alert(err.Description);
    }

}
function onlynameofproject(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||event.keyCode == 32
                || event.keyCode == 46 ||event.keyCode==40||event.keyCode==41)
            return true;
        else
            return false;
    } catch (err) {
        alert(err.Description);
    }
}
function onlydesc(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||event.keyCode == 32
                || event.keyCode == 46 ||event.keyCode==40||event.keyCode==41)
            return true;
        else
            return false;
    } catch (err) {
        alert(err.Description);
    }
}
function onlydetail(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)||event.keyCode == 32
                || event.keyCode == 46 ||event.keyCode==44)
            return true;
        else
            return false;
    } catch (err) {
        alert(err.Description);
    }
}





