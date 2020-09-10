<?php

require_once './functionsCliente.php';
addCliente();
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
                    <form action="adicionarCliente.php" method="post">	
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Nome</label>	      
                                <input type="text" class="form-control" name="cliente['nome']" required >	    
                            </div>	
                            <div class="form-group col-md-5">	      
                                <label for="name">CPF</label>	      
                                <input type="number" class="form-control" name="cliente['cpf']" id="inputCPF" maxlength="11" required  placeholder="000.000.000-00" onblur="valida_cpf(this.value)">	    
                            </div>	
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">	      
                                <label for="name">CEP</label>	      
                                <input type="number" class="form-control" name="cliente['cep']" id="inputCEP" placeholder="00000-000" maxlength="8" required onblur="addPontosCEP(this.value)">
                            </div>
                            <div class="form-group col-md-6">	      
                                <label for="name">Cidade</label>	      
                                <input type="text" class="form-control" id="inputCidade" name="cliente['cidade']" required>	    
                            </div>
                            <div class="form-group col-md-2">	      
                                <label for="name">UF</label>	      
                                <input type="text" class="form-control" name="cliente['estado']" id="inputEstado" required>	    
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">	      
                                <label for="name">Bairro</label>	      
                                <input type="text" class="form-control" name="cliente['bairro']" id="inputBairro" required >	    
                            </div>
                            <div class="form-group col-md-6">	      
                                <label for="name">Logradouro</label>	      
                                <input type="text" class="form-control" name="cliente['logradouro']" id="inputRua" required >	    
                            </div>
                            <div class="form-group col-md-2">	      
                                <label for="name">Número</label>	      
                                <input type="number" class="form-control" name="cliente['numero']" required>	    
                            </div>
                        </div>
                        <div id="actions" class="row">	
                            <div class="col-md-12">	    
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a href="cliente.php" class="btn btn-default">Cancelar</a>	
                            </div>	
                        </div>
                    </form>	
                </div>
            </div>
        </div>        
    </div>
</section>

<?php include(FOOTER_TEMPLATE); ?>