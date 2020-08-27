<?php

require_once('../config.php');
require_once(DBAPI);
$clientes = null;
$cliente = null;

/**
 * Listagem de Clientes
 * @global Object $clientes
 */
function indexClientes() {
    global $clientes;
    $clientes = find_all('cliente');
}

/**
 * Cadastro de Cliente
 */
function addCliente() {
    if (!empty($_POST['cliente'])) {
        $cliente = $_POST['cliente'];
        save('cliente', $cliente);
        header('location: cliente.php');
    }
}

/**
 * Visualização de um Produto
 * @global Object $cliente
 * @param Number $id
 */
function view($id = null) {
    global $cliente;
    $cliente = find('cliente', $id);
}

/**
 * Exclusão de um Cliente
 * @global Object $cliente
 * @param Number $id
 */
function delete($id = null) {
    global $cliente;
    $cliente = remove('cliente', $id);
    header('location: cliente.php');
}

/**
 * Atualizacao/Edicao de Cliente
 * @global Object $cliente
 */
function edit() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['cliente'])) {
            $cliente = $_POST['cliente'];
            update('cliente', $id, $cliente);
            header('location: cliente.php');
        }
        else {
            global $cliente;
            $cliente = find('cliente', $id);
        }
    }
    else {
        header('location: cliente.php');
    }
}
