$(document).ready(() => {

    /**	 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão	 */
    $('#delete-modal-produto').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('produto');
        var modal = $(this);
        modal.find('.modal-title').text('Excluir Produto #' + id);
        modal.find('.modal-body').text('Você tem certeza que deseja excluir o Produto de Id #' + id);
        modal.find('#confirm').attr('href', 'deletarProduto.php?id=' + id);
    })
    $('#delete-modal-cliente').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('cliente');
        var modal = $(this);
        modal.find('.modal-title').text('Excluir Cliente #' + id);
        modal.find('.modal-body').text('Você tem certeza que deseja excluir o Cliente de Id #' + id);
        modal.find('#confirm').attr('href', 'deletarCliente.php?id=' + id);
    })
    $('#delete-modal-delete-pedido').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('pedido');
        var modal = $(this);
        modal.find('.modal-title').text('Excluir Pedido #' + id);
        modal.find('.modal-body').text('Você tem certeza que deseja excluir o Pedido de Id #' + id);
        modal.find('#confirm').attr('href', 'deletarPedido.php?id=' + id);
    })
    $('#delete-modal-delete-produto-pedido').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('produto-pedido');
        var modal = $(this);
        modal.find('#confirm').click(function (e) {
            var button = $(event.relatedTarget);
            var id = button.data('pedido');
            var stringid = '#' + id;
            $(stringid).remove();
        });
    })

})