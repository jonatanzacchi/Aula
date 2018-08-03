var today = new Date().toLocaleString();

$(document).ready(function () {

    $("#status").on("change", function () {
        var x = document.getElementById('status').value;
        console.log(x);
        if (x === '1') {
            $("#datainativacao").val("");
            console.log(x + " opaaaa");
        } else{
            $("#datainativacao").val(today);
            console.log(x + " fooooiiii");
        }

    });


});