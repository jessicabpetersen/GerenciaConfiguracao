<?php
require_once './functionsProduto.php';
indexProdutos();?>
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
                            <h2>Gerenciamento de  <b>Produtos</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="adicionarProduto.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar</span></a>						
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
                            <th>Descrição</th>
                            <th>Fabricante</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($produtos) : ?>	
                            <?php foreach ($produtos as $produto) : ?>	

                                <tr>
                                    <td><?php echo $produto['descricao'] ?></td>
                                    <td><?php echo $produto['fabricante'] ?></td>
                                    <td>
                                        <a href="visualizaProduto.php?id=<?php echo $produto['id']; ?>" class="visualizarProduto" ><i class="material-icons" data-toggle="tooltip" title="Visualizar">&#xe417;</i></a>
                                        <a href="editarProduto.php?id=<?php echo $produto['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal-produto" data-produto="<?php echo $produto['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
<!-- Modal de Delete-->	
<div class="modal fade" id="delete-modal-produto" tabindex="-1" role="dialog" aria-labelledby="modalLabel">	
    <div class="modal-dialog" role="document">	  
        <div class="modal-content">	    
            <div class="modal-header">	   
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>	      
                <h4 class="modal-title" id="modalLabel"></h4>	
            </div>	      
            <div class="modal-body">	  
     
            </div>	 
            <div class="modal-footer">	    
                <a id="confirm" class="btn btn-primary" href="#">Sim</a>	     
                <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>	  
            </div>	  
        </div>	 
    </div>
</div> <!-- /.modal -->

<?php include(FOOTER_TEMPLATE); ?>