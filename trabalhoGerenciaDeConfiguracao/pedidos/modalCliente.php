<?php
require_once './functionsPedido.php';
indexClientes();
?>
<div class="modal fade" id="buscar-cliente" tabindex="-1" role="dialog" aria-labelledby="modalLabel">	
    <div class="modal-dialog" role="document">	  
        <div class="modal-content">	    
            <div class="modal-header">	   
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>	      
                <h4 class="modal-title" id="modalLabel">Buscar Cliente</h4>	
            </div>	      
            <div class="modal-body">	  
     
                <table class="table table-striped table-hover" id="tabela-busca-cliente">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Desconto (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($clientes) : 
                            
                            ?>	
                            <?php foreach ($clientes as $cliente) : ?>	

                        <tr class="trCliente">
                                    <td><?php echo $cliente['id'] ?></td>
                                    <td><?php echo $cliente['nome'] ?></td>
                                    <td><?php echo $cliente['cpf'] ?></td>
                                    <td><?php echo $cliente['cidade'] ?></td>
                                    <td><?php echo $cliente['estado'] ?></td>
                                    <td><?php echo $cliente['desconto'] ?></td>
                                    
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
            <div class="modal-footer">	 
                <a id="seleciona-cliente" class="btn btn-primary" href="#" data-dismiss="modal">Selecionar</a>
                <a id="fechar-cliente" class="btn btn-default" data-dismiss="modal">Fechar</a>	  
            </div>	  
        </div>	 
    </div>
</div> 
