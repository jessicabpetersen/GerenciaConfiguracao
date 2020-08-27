<?php
require_once './functionsProduto.php';
view($_GET['id']);
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
                    <h4>Visualização do Produto</h4>
                    <form action="adicionarProduto.php" method="post">	
                        <?php if (!empty($_SESSION['message'])) : ?>		
                            <div class="alert alert-<?php echo $_SESSION['type']; ?>">
                                <?php echo $_SESSION['message']; ?></div>	
                        <?php endif; ?>	
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Descrição</label>	      
                                <input type="text" class="form-control" name="produto['descricao']" value="<?php echo $produto['descricao']; ?>" disabled="">	    
                            </div>	
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Fabricante</label>	      
                                <input type="text" class="form-control" name="produto['fabricante']" value="<?php echo $produto['fabricante']; ?>" disabled="">	    
                            </div>	
                        </div>
                        <div id="actions" class="row">	
                            <div class="col-md-12">	    
                                
                                <a href="produto.php" class="btn btn-default">Voltar</a>	
                            </div>	
                        </div>
                    </form>	
                </div>
            </div>
        </div>        
    </div>
</section>

<?php include(FOOTER_TEMPLATE); ?>
