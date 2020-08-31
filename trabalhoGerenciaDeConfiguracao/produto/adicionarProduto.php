<?php
require_once './functionsProduto.php';
addProduto();
?>
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
                    </div>
                    <form action="adicionarProduto.php" method="post">	
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Descrição</label>	      
                                <input type="text" class="form-control" name="produto['descricao']" required >	    
                            </div>	
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Fabricante</label>	      
                                <input type="text" class="form-control" name="produto['fabricante']" required >	    
                            </div>	
                        </div>
						<div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Preco</label>	      
                                <input type="number" class="form-control" name="produto['preco']" required >	    
                            </div>	
                        </div>
                        <div id="actions" class="row">	
                            <div class="col-md-12">	    
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a href="produto.php" class="btn btn-default">Cancelar</a>	
                            </div>	
                        </div>
                    </form>	
                </div>
            </div>
        </div>        
    </div>
</section>

<?php include(FOOTER_TEMPLATE); ?>