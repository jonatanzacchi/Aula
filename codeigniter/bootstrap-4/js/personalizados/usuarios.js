var today = new Date().toLocaleString();
//var today = dateFormat(new Date(), 'Y-m-d h:i:s');

console.log(today)


$(document).ready(function () {

    $("#status").on("change", function () {
        var x = document.getElementById('status').value;
        console.log(x);
        if (x === '1') {
            $("#dataativacao").val("2018-08-03 20:35:00");
            $("#datainativacao").val("");
            console.log(x + " opaaaa");
        } else{
            $("#datainativacao").val(today);
            console.log(x + " fooooiiii");
        }

    });


});