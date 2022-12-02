

$(document).on("click", ".excludeTask", function () {

    var titleCard = $(this).data('titulo');
    var getId = $(this).val();

    Swal.fire({
        title: 'Você tem certeza que deseja excluir a tarefa: ' + titleCard + '?',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: `Não, cancelar`,

    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                url: 'ajax-tarefas',
                
                type: 'POST',
                
                data: {
                    'id': getId,
                    'titulo': titleCard,
                },

                success: function (result) {
                    $('#' + getId).remove();
                },

            });
        }
    })
});