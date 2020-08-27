<?php
require_once('../config.php');
require_once(DBAPI);
$produtos = null;
$produto = null;

/** *  Listagem de Produtos	 */
function indexProdutos() {
    global $produtos;
    $produtos = find_all('produto');
}

/** *  Cadastro de Produto	 */
function addProduto() {
    if (!empty($_POST['produto'])) {
        $produto = $_POST['produto'];
        save('produto', $produto);
        header('location: produto.php');
    }
}

/** *  Visualização de um Produto	 */
function view($id = null) {
    global $produto;
    $produto = find('produto', $id);
}

/** *  Exclusão de um Produto	 */
function delete($id = null) {
    global $produto;
    $produto = remove('produto', $id);
    header('location: produto.php');
}

/** * Atualizacao/Edicao de Produto */
function edit() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['produto'])) {
            $produto = $_POST['produto'];
            update('produto', $id, $produto);
            header('location: produto.php');
        } else {
            global $produto;
            $produto = find('produto', $id);
        }
    } else {
        header('location: produto.php');
    }
}