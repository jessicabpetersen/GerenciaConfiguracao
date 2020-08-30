<?php

require_once('../config.php');
require_once(DBAPI);
$pedidos = null;
$pedido = null;
$cliente = null;
$pedido_produtos = null;
$valorTotal = 0;
$quantidadeTotal = 0;
$clientes = null;
$produtos = null;
$produtosSelecionados = null;

/** *  Listagem de Pedidos	 */
function indexPedidos() {
    global $pedidos;
    $pedidos = find_all('pedido');
}

function indexClientes() {
    global $clientes;
    $clientes = find_all('cliente');
}

function indexProdutos() {
    global $produtos;
    $produtos = find_all('produto');
}

/** *  Cadastro de pedido	 */
function addPedido() {
    if (!empty($_POST)) {
        //add pedido
        //pegar o id do pedido recem cadastrado
        //add produto_pedido
//        var_dump($_POST);
        $pedidoc = array(
            'id_cliente' => $_POST['idcliente']
        );
        $qntdProdutos = 0;
        foreach ($_POST as $variaveis) {
            $qntdProdutos++;
        }

        save('pedido', $pedidoc);
        $pedido = find_last('pedido');
//        var_dump($pedido);
        $qntdProdutos = ($qntdProdutos - 2) / 4;

        for ($i = 1; $i <= $qntdProdutos; $i++) {
            $idproduto = 'idproduto' . $i;
            $qntdd = 'qntdd' . $i;
            $preco = 'preco' . $i;
            $desconto = 'desconto' . $i;
//            echo 'Item ' . $i . ' custa '. $_POST['preco'];
            $produto_pedido = array(
                'id_produto' => $_POST[$idproduto],
                'id_pedido' => $pedido['id'],
                'quantidade' => $_POST[$qntdd],
                'preco' => $_POST[$preco],
                'desconto' => $_POST[$desconto]
            );
            save('produto_pedido', $produto_pedido);
        };

        header('location: pedido.php');
    }
}

function acharCliente($pedido) {
    global $cliente;
    $cliente = find('cliente', $pedido['id_cliente']);
}

function selecionarCliente($idCliente) {
    global $cliente;
    var_dump($idCliente);
    $cliente = find('cliente', $idCliente['id']);
    var_dump($cliente);
}

function acharProdutos($pedido) {
    global $pedido_produtos;
    $pedido_produtos = null;
    $pedido_produtos = findRelacionamento('produto_pedido', 'id_pedido', $pedido['id']);
    valorTotal($pedido_produtos);
}

function valorTotal($pedido_produtos) {
    global $valorTotal, $quantidadeTotal;
    $valorTotal = 0;
    $quantidadeTotal = 0;
//    var_dump($pedido_produtos);
    for ($index = 0; $index < count($pedido_produtos); $index++) {
        $quantidadeTotal += doubleval($pedido_produtos[$index]['quantidade']);
        $valorNormal = doubleval($pedido_produtos[$index]['preco']) * doubleval($pedido_produtos[$index]['quantidade']);
        $valorTotal += $valorNormal - ($valorNormal * (doubleval($pedido_produtos[$index]['desconto'])) / 100);
    }
    return $valorTotal;
}

/** *  Visualização de um Pedido	 */
function view($id = null) {
    global $pedido, $pedido_produtos, $cliente;
    $pedido = find('pedido', $id);
    $pedido_produtos = findRelacionamento('produto_pedido', 'id_pedido', $pedido['id']);
    $cliente = find('cliente', $pedido['id_cliente']);
}

function retornaProduto($pedido_produtos) {
    return find('produto', $pedido_produtos['id_produto']);
}

/** *  Exclusão de um Pedido	 */
function delete($id = null) {
    global $pedido;
    $pedido = remove('pedido', $id);
    removeProdutoPedido($id);
    header('location: pedido.php');
}

/** * Atualizacao/Edicao de Pedido */
function edit() {
    global $pedido, $pedido_produtos;
    if (isset($_GET['id']) && isset($_POST)) {
        echo 'id pedido: ' . $_GET['id'];

        echo 'post';
        var_dump($_POST);
        $pedido = find('pedido', $_GET['id']);
        $qntdProdutos = 0;
        foreach ($_POST as $variaveis) {
            $qntdProdutos++;
        }
        $qntdProdutos = ($qntdProdutos - 1) / 4;
        $pedido_produtos = findRelacionamento('produto_pedido', 'id_pedido', $_GET['id']);
        foreach ($pedido_produtos as $proped) {
            remove('produto_pedido', $proped['id']);
        }
        for ($i = 1; $i <= $qntdProdutos; $i++) {
            $idproduto = 'idproduto' . $i;
            $qntdd = 'qntdd' . $i;
            $preco = 'preco' . $i;
            $desconto = 'desconto' . $i;
            $produto_pedido = array(
                'id_produto' => $_POST[$idproduto],
                'id_pedido' => $_GET['id'],
                'quantidade' => $_POST[$qntdd],
                'preco' => $_POST[$preco],
                'desconto' => $_POST[$desconto]
            );
            save('produto_pedido', $produto_pedido);
        };
    }
       header('location: pedido.php');
}

function addProdutoNoPedido($idProduto) {
    global $produtos;
    $produto = find('produto', $idProduto);
    array_push($produtosSelecionados, $produto);
    for ($i = 0; $i < count($produtos); $i++) {
        for ($f = 0; $f < count($produtosSelecionados); $f++) {
            if ($produtos[$i] == $produtosSelecionados[$f]) {
                unset($produtos[$i]);
            }
        }
    }
}
