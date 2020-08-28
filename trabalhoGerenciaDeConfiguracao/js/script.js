$(document).ready(() => {

    /**	 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão	 */
    $('#delete-modal-produto').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('produto');
        var modal = $(this);
        modal.find('.modal-title').text('Excluir Produto #' + id);
        modal.find('.modal-body').text('Você tem certeza que deseja excluir o Produto de Id #' + id);
        modal.find('#confirm').attr('href', 'deletarProduto.php?id=' + id);
    });

});