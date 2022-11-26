<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment2Email</title>
    <script>
function _(id){ return document.getElementById(id); }
function submitForm(){
    _("mybtn").disabled = true ;
    _("status").innerHTML ='please wait ...';
    var formdata = new FormData();
    formdata.append("n", _("n").value);
    formdata.append("e", _("e").value);
    formdata.append("m", _("m").value);
    var ajax = new XMLHttpRequest();
    ajax.open("POST","example_parse.php");
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            if(ajax.responseText == "success") {
                _("my_form").innerHTML = '<h2>Thanks '+_("n").value +', your message has been sent.</h2>';
            } else {
                _("status").innerHTML = ajax.responseText;
                _("mybtn").disabled = false;
            }
        }
    }
    ajax.send( formdata );
}
    </script>
</head>
<body>
    <form id="my_form" onsubmit="submitForm(); return false;">
<p><input id="n" type="text" placeholder="name" required></p>
<p><input id="e" type="email" placeholder="email" required></p>
<textarea id="m" cols="30" rows="10" placeholder="messsage" required></textarea>
<p><input id="mybtn" type="submit" value="Submit Form"><span id="status"></span></p>
    </form>
</body>
</html>