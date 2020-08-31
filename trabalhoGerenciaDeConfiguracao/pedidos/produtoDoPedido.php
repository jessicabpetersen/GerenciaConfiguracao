<?php
require_once './functionsPedido.php';
  $produtoDados = $_POST['data'];

  $dados = json_decode($produtoDados, true);
  addProdutoNoPedido($dados['id']);