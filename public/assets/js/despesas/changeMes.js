
$('#mes').on('change', function(){
    let mes = $('#mes').val();
    let _token = $("#token").val();
    $.ajax({
        type: "post",
        url: "/despesas/filtros",
        data: {
            _token,
            mes
        },
        success: function (response) {
            $('.full').html(response)
        }
    });
})

