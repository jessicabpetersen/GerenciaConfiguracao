<?php

require_once './functionsPedido.php';
addPedido();
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
                            <h2>Gerenciamento de  <b>Pedidos</b></h2>
                        </div>
                    </div>
                    <h4>Adicionar Pedido</h4>
                    <form action="adicionarPedido.php" method="post">	
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Cliente</label>	      

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-2 col-lg-1">
                                <input type="text" class="form-control" required disabled="" id="idDadosBuscaCliente" name="idcliente">	
                            </div>
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" required disabled="" id="dadosBuscaCliente">
                            </div>
                            <div class="form-group col-md-1">
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#buscar-cliente"><i class="fas fa-search fa-lg"></i><span> Buscar cliente</span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">	      
                                <label for="name">Produtos</label>
                                <a href="#" class="btn btn-success float-right" style=" height: 30px;" data-toggle="modal" data-target="#buscar-produto"><i class="material-icons fa-lg">&#xE147;</i> <span>Adicionar novo produto</span></a>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Fabricante</th>
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                            <th>Desconto (%)</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyProduto">

                                    </tbody>
                                </table>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7">
                                <span style="text-decoration: underline;"><b>Valor total: </b></span>
                                <input disabled="" id="inputPrecoTotal" required="true" name="valorTotal">
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div id="actions" class="row">	
                            <div class="col-md-12">	    
                                <button type="submit" class="btn btn-primary" onclick="salvarValor()">Salvar</button>
                                <a href="pedido.php" class="btn btn-default">Cancelar</a>	
                            </div>	
                        </div>
                    </form>	
                </div>
            </div>
        </div>        
    </div>
</section>
<?php include './modalCliente.php'; ?>
<?php include './modalProduto.php'; ?>
<?php include './modalDeleteProduto.php'; ?>
<?php include(FOOTER_TEMPLATE); ?>