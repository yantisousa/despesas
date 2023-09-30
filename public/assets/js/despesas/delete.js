function excluir(id) {
    let _token = $("#token").val();
    $.ajax({
        type: "delete",
        url: `despesas/destroy/${id}`,
        data: {
            _token
        },
        success: function (response) {
            location.reload();
            iziToast.success({
                title: 'Hey',
                message: 'What would you like to add?'
            });
        }
    });
}
