$(document).ready(function() {

    $('#und').click(function(){

        var dataString = $('#und').val();

        $.ajax({
            type: "POST",
            url: "../../application/controllers/Compras.php",
            data: {unidades: dataString},

        });
    });
});
