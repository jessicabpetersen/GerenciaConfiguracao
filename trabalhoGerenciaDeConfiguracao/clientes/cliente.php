<?php
require_once './functionsCliente.php';
indexClientes();?>
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
                            <h2>Gerenciamento de  <b>Clientes</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="adicionarCliente.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar</span></a>						
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
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($clientes) : ?>	
                            <?php foreach ($clientes as $cliente) : ?>	

                                <tr>
                                    <td><?php echo $cliente['nome'] ?></td>
                                    <td><?php echo $cliente['cpf'] ?></td>
                                    <td><?php echo $cliente['cidade'] ?></td>
                                    <td><?php echo $cliente['estado'] ?></td>
                                    <td>
                                        <a href="visualizaCliente.php?id=<?php echo $cliente['id']; ?>" class="visualizarCliente" ><i class="material-icons" data-toggle="tooltip" title="Visualizar">&#xe417;</i></a>
                                        <a href="editarCliente.php?id=<?php echo $cliente['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal-cliente" data-cliente="<?php echo $cliente['id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
<!--                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>-->
            </div>
        </div>        
    </div>

</section>
<!-- Modal de Delete-->	
<div class="modal fade" id="delete-modal-cliente" tabindex="-1" role="dialog" aria-labelledby="modalLabel">	
    <div class="modal-dialog" role="document">	  
        <div class="modal-content">	    
            <div class="modal-header">	   
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>	      
                <h4 class="modal-title" id="modalLabel">Exclusão</h4>	
            </div>	      
            <div class="modal-body">	  
                Excluir determinado cliente
            </div>	 
            <div class="modal-footer">	    
                <a id="confirm" class="btn btn-primary" href="#">Sim</a>	     
                <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>	  
            </div>	  
        </div>	 
    </div>
</div> <!-- /.modal -->

<?php include(FOOTER_TEMPLATE); ?>