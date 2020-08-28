<?php
require_once './functionsPedido.php';
indexPedidos();?>
<?php
include(HEADER_TEMPLATE);
?>
<section class="mt-5">

     <div class="container">
        <div class="table-responsive1">
            <div class="table-wrapper1">
                <div class="table-title1">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Gerenciamento de  <b>Pedidos</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="adicionarPedido.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar</span></a>						
                        </div>
                    </div>
                </div>
                <?php
                if (!empty($_SESSION['message'])) :
                    ?>		
                    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">			
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>			
                        <?php echo $_SESSION['message']; ?>		
                    </div>		
                    <?php clear_messages(); ?>	
                <?php endif; ?>	
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Número do pedido</th>
                            <th>Cliente</th>
                            <th>Quantidade</th>
                            <th>Preço total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($pedidos) : ?>	
                            <?php foreach ($pedidos as $pedido) : 
                                acharCliente($pedido);
                                acharProdutos($pedido);
                                ?>	

                                <tr>
                                    <td><?php echo  $pedido['id']?></td>
                                    <td><?php echo $cliente['nome'] ?></td>
                                    <td><?php echo $quantidadeTotal ?></td>
                                    <td><?php echo $valorTotal ?></td>
                                    <td>
                                        <a href="visualizaPedido.php?id=<?php echo $pedido['id']; ?>" class="visualizarPedido" ><i class="material-icons" data-toggle="tooltip" title="Visualizar">&#xe417;</i></a>
                                        <a href="editarPedido.php?id=<?php echo $pedido['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal-delete-pedido" data-pedido="<?php echo $pedido['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>	
                        <?php else : ?>		
                            <tr>			
                                <td colspan="6">Nenhum registro encontrado.</td>		
                            </tr>	
                        <?php endif; ?>	
                    </tbody>
                </table>
            </div>
        </div>        
    </div>

</section>

<?php include 'modalDelete.php'?>
<?php include(FOOTER_TEMPLATE); ?>