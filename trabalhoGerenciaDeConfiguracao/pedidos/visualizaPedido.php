<?php
require_once './functionsPedido.php';
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
                            <h2>Gerenciamento de  <b>Pedidos</b></h2>
                        </div>
                    </div>
                    <h4>Visualizar Pedido</h4>
                    <form action="visualizaPedido.php" method="post">	
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Cliente</label>	      

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-2 col-lg-1">
                                <input type="text" class="form-control" disabled="" id="idDadosBuscaCliente" name="idcliente" value="<?php echo $cliente['id']; ?>" >	
                            </div>
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" disabled="" id="dadosBuscaCliente" value="<?php echo $cliente['nome']; ?>">
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">	      
                                <label for="name">Produtos</label>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Fabricante</th>
                                            <th>Preço</th>
                                            <th>Quantidade</th>
                                            <th>Desconto (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyProduto">
                                <?php if ($pedido_produtos) : ?>	
                                            <?php
                                            foreach ($pedido_produtos as $produto) :
                                                $produtoAtual = retornaProduto($produto);
                                            
                                            $valor = valorTotal($pedido_produtos);
                                                ?>	

                                                <tr>
                                                    <td><?php echo $produtoAtual['id'] ?></td>
                                                    <td><?php echo $produtoAtual['descricao'] ?></td>
                                                    <td><?php echo $produtoAtual['fabricante'] ?></td>
                                                    <td><?php echo $produto['preco'] ?></td>
                                                    <td><?php echo $produto['quantidade'] ?></td>
                                                    <td><?php echo $produto['desconto'] ?></td>

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
                        <div class="row">
                            <div class="form-group col-md-7">
                                <span style="text-decoration: underline;"><b>Valor total: </b></span>
                                <input disabled="" id="inputPrecoTotal"  name="valorTotal" disabled="" value="<?php echo $valor ?>">
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div id="actions" class="row">	
                            <div class="col-md-12">	    
                                <a href="pedido.php" class="btn btn-default">Voltar</a>	
                            </div>	
                        </div>
                    </form>	
                </div>
            </div>
        </div>        
    </div>
</section>
<?php include(FOOTER_TEMPLATE); ?>