<?php

require_once './functionsCliente.php';
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
                            <h2>Gerenciamento de  <b>Clientes</b></h2>
                        </div>
                    </div>
                    <h4>Visualização do Cliente</h4>
                    <form action="visualizaCliente.php" method="post">	
                        <?php if (!empty($_SESSION['message'])) : ?>		
                            <div class="alert alert-<?php echo $_SESSION['type']; ?>">
                                <?php echo $_SESSION['message']; ?></div>	
                        <?php endif; ?>	
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Nome</label>	      
                                <input type="text" class="form-control" disabled="" value="<?php echo $cliente['nome']; ?>">	    
                            </div>	
                            <div class="form-group col-md-5">	      
                                <label for="name">CPF</label>	      
                                <input type="text" class="form-control"  disabled="" value="<?php echo $cliente['cpf']; ?>">	    
                            </div>
                            <div class="form-group col-md-5">	      
                                <label for="name">Desconto (%)</label>	      
                                <input type="number" maxlength="2" class="form-control"  disabled="" value="<?php echo $cliente['desconto']; ?>">	    
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">	      
                                <label for="name">CEP</label>	      
                                <input type="text" class="form-control" name="cliente['cep']" disabled="" value="<?php echo $cliente['cep']; ?>">
                            </div>
                            <div class="form-group col-md-6">	      
                                <label for="name">Cidade</label>	      
                                <input type="text" class="form-control" disabled="" value="<?php echo $cliente['cidade']; ?>">	    
                            </div>
                            <div class="form-group col-md-2">	      
                                <label for="name">UF</label>	      
                                <input type="text" class="form-control" disabled="" value="<?php echo $cliente['estado']; ?>">	    
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">	      
                                <label for="name">Bairro</label>	      
                                <input type="text" class="form-control" disabled="" value="<?php echo $cliente['bairro']; ?>">	    
                            </div>
                            <div class="form-group col-md-6">	      
                                <label for="name">Logradouro</label>	      
                                <input type="text" class="form-control" disabled="" value="<?php echo $cliente['logradouro']; ?>">	    
                            </div>
                            <div class="form-group col-md-2">	      
                                <label for="name">Número</label>	      
                                <input type="text" class="form-control" disabled="" value="<?php echo $cliente['numero']; ?>">	    
                            </div>
                        </div>
                        <div id="actions" class="row">	
                            <div class="col-md-12">	    
                                <a href="cliente.php" class="btn btn-default">Voltar</a>	
                            </div>	
                        </div>
                    </form>	
                </div>
            </div>
        </div>        
    </div>
</section>

<?php include(FOOTER_TEMPLATE); ?>