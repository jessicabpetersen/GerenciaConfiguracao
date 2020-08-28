<?php
require_once './functionsPedido.php';
indexProdutos();
?>
<div class="modal fade" id="buscar-produto" tabindex="-1" role="dialog" aria-labelledby="modalLabel">	
    <div class="modal-dialog" role="document">	  
        <div class="modal-content">	    
            <div class="modal-header">	   
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>	      
                <h4 class="modal-title" id="modalLabel">Buscar Produto</h4>	
            </div>	      
            <div class="modal-body">	  
     
                <table class="table table-striped table-hover" id="tabela-busca-produto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Fabricante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($produtos) : 
                            
                            ?>	
                            <?php foreach ($produtos as $produto) : ?>	

                        <tr class="trProduto">
                                    <td><?php echo $produto['id'] ?></td>
                                    <td><?php echo $produto['descricao'] ?></td>
                                    <td><?php echo $produto['fabricante'] ?></td>
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
                <a id="seleciona-produto" class="btn btn-primary" href="#" data-dismiss="modal">Selecionar</a>
                <a id="fechar-produto" class="btn btn-default" data-dismiss="modal">Fechar</a>	  
            </div>	  
        </div>	 
    </div>
</div> 
