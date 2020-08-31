<?php
require_once './functionsPedido.php';
view($_GET['id']);
$index = 0;
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
                    <h4>Editar Pedido</h4>
                    <form action="sendEdit.php?id=<?php echo $pedido['id']; ?>" method="post">	
                        <div class="row">
                            <div class="form-group col-md-7">	      
                                <label for="name">Cliente</label>	      

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-2 col-lg-1">
                                <input type="text" class="form-control" disabled="" id="idDadosBuscaCliente" name="idcliente" value="<?php echo $cliente['id']; ?>" onchange="mostrarBotaoProduto()">	
                            </div>
                            <div class="form-group col-md-7">
                                <input type="text" class="form-control" disabled="" id="dadosBuscaCliente" value="<?php echo $cliente['nome']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">	      
                                <label for="name">Produtos</label>
                                <a href="#" hidden="" id="botao-procura-produtos" class="btn btn-success float-right" style=" height: 30px;" data-toggle="modal" data-target="#buscar-produto"><i class="material-icons fa-lg">&#xE147;</i> <span>Adicionar novo produto</span></a>
                                <table class="table table-striped table-hover" id="tabelaEditar">
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
                                        <?php if ($pedido_produtos) : ?>	
                                            <?php
                                            $valor = valorTotal($pedido_produtos);
                                            foreach ($pedido_produtos as $produto_pedido) :
                                                $produtoAtual = retornaProduto($produto_pedido);
                                                $cliente = retornaClientePedido($produto_pedido['id_pedido']);
                                                $index++;
                                                $idproduto = 'idproduto' . $index;
                                                echo $idproduto;
                                                $descricao = 'descricao' . $index;
                                                $fabricante = 'fabricante' . $index;
                                                $qntdd = 'qntdd' . $index;
                                                $preco = 'preco' . $index;
                                                $desconto = 'desconto' . $index;
                                                $qntdded = 'qntdded' . $index;
                                                $precoed = 'precoed' . $index;
                                                $descontoed = 'descontoed' . $index;
                                                $linha = 'linhaed' . $index;
                                                ?>	

                                                <tr id="<?php echo $linha ?>">
                                                    <td><input type="text" class="form-control" id="<?php echo $idproduto ?>" name="<?php echo $idproduto ?>" value="<?php echo $produtoAtual['id']; ?>" disabled="" ></td>
                                                    <td><input type="text" class="form-control" value="<?php echo $produtoAtual['descricao']; ?>" disabled=""></td>
                                                    <td><input type="text" class="form-control" value="<?php echo $produtoAtual['fabricante']; ?>" disabled=""></td>
                                                    <td><input type="text" class="form-control" id="<?php echo $precoed ?>"  value="<?php echo $produtoAtual['preco']; ?>" disabled=""></td>
                                                    <td><input type="text" class="form-control" id="<?php echo $qntdded ?>" name="<?php echo $qntdd ?>" value="<?php echo $produto_pedido['quantidade']; ?>" onchange="EditarValorTotal(<?php echo count($pedido_produtos) ?>)"></td>
                                                    <td><input type="text" class="form-control" id="<?php echo $descontoed ?>" value="<?php echo $cliente['desconto']; ?>"disabled=""></td>
                                                    <td><a href="#"  class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal-delete-produto-pedido" data-produto-pedido="<?php echo $linha; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>
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
                                <input disabled="" id="inputPrecoTotaled"  name="valorTotal" disabled="" value="<?php echo $valor ?>">
                            </div>
                        </div>
                        <div class="row">
                        </div>
                        <div id="actions" class="row">	
                            <div class="col-md-12">	    
                                <button type="submit" class="btn btn-primary" onclick="editarValor(<?php echo $index ?>)">Salvar</button>
                                <a href="pedido.php" class="btn btn-default">Cancelar</a>	
                            </div>	
                        </div>
                    </form>	
                </div>
            </div>
        </div>        
    </div>
</section>

<?php include './modalProduto.php'; ?>
<?php include './modalDeleteProduto.php'; ?>
<?php include(FOOTER_TEMPLATE); ?>