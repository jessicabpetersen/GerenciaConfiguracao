<?php
require_once './functionsPedido.php';
  $cliente = $_POST['data'];

  $dados = json_decode($cliente, true);

  selecionarCliente($dados['id']);
?>
