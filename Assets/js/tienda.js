$(document).ready(function() {

    $('#und').click(function(){

        var dataString = $('#und').val();

        $.ajax({
            type: "POST",
            url: "../../application/controllers/compras.php",
            data: dataString,

        });
    });
});
