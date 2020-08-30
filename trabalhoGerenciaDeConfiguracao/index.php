<?php require_once 'config.php'; 
require_once DBAPI; 
include(HEADER_TEMPLATE); 
$db = open_database(); ?>	
<h1>Gerenciamento da Konoha Informática</h1>	
<hr />	
<?php if ($db) : ?>	
    <div class="row">		
        <div class="col-xs-6 col-sm-3 col-md-2">			
            <a href="produto/produto.php" class="btn btn-default">				
                <div class="row">					
                    <div class="col-xs-12 text-center">						
                        <i class="fas fa-desktop fa-5x"></i>
                    </div>					
                    <div class="col-xs-12 text-center">						
                        <p>Produtos</p>					
                    </div>				
                </div>			
            </a>		
        </div>	
        <div class="col-xs-6 col-sm-3 col-md-2">			
            <a href="clientes/cliente.php" class="btn btn-default">				
                <div class="row">					
                    <div class="col-xs-12 text-center">						
                        <i class="fa fa-user fa-5x"></i>					
                    </div>					
                    <div class="col-xs-12 text-center">						
                        <p>Clientes</p>					
                    </div>				
                </div>			
            </a>		
        </div>
    <div class="col-xs-6 col-sm-3 col-md-2">			
            <a href="pedidos/pedido.php" class="btn btn-default">				
                <div class="row">					
                    <div class="col-xs-12 text-center">						
                        <i class="fas fa-box-open fa-5x"></i>
                    </div>					
                    <div class="col-xs-12 text-center">						
                        <p>Pedidos</p>					
                    </div>				
                </div>			
            </a>		
        </div>	
    </div>	
<?php else : ?>		
<div class="alert alert-danger" role="alert">			
    <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>		
</div>	
<?php endif; ?>	
<?php include(FOOTER_TEMPLATE); ?>