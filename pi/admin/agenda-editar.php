<?php

$agenda = require_once('php/agenda/listar.php');

function inverter_Data_Para_DDMMAAAA($data){

    $dataInvertida = substr($data, 8,2) . '/' . substr($data, 5,2) . '/' . substr($data, 0,4);
    return $dataInvertida;
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'include/head.php'; ?>
   </head>
   <body class="fix-header">
      <div class="preloader">
         <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
         </svg>
      </div>
      <div id="wrapper">
         <nav class="navbar navbar-default navbar-static-top m-b-0">
            <?php include 'include/header.php'; ?>
         </nav>
         <div class="navbar-default sidebar" role="navigation">
            <?php include 'include/menu-lateral.php'; ?>
         </div>
         <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">Agenda</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <ol class="breadcrumb">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="agenda.php">Agenda</a></li>
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-xs-12">
                     <div class="white-box">
                        <h3 class="box-title">Aprovar Evento da Agenda (Digite o número 1 e salve para aprovar o evento)</h3>
                        <hr>
                        <form class="form-horizontal form-material" action="php/agenda/editar.php" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="id"  value="<?= $agenda['id'] ?>">
                           <div class="form-group">
                              <label class="col-md-12">Titulo</label>
                              <div class="col-md-12">
                                 <input type="text" name="titulo" class="form-control form-control-line" value="<?= $agenda['titulo'] ?>" required>  
                              </div>
                           </div>
                           <input type="hidden" name="cor" value="<?= $agenda['cor'] ?>">
                           <div class="form-group">
                              <label class="col-md-12">Inicio</label>
                              <div class="col-md-12">
                                 <input type="text" name="inicio" value="<?= isset($agenda) ? inverter_Data_Para_DDMMAAAA($agenda['inicio']) : '' ?>" class="form-control form-control-line data" required> 
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">Fim</label>
                              <div class="col-md-12">
                                 <input type="text" name="fim" value="<?= isset($agenda) ? inverter_Data_Para_DDMMAAAA($agenda['fim']) : '' ?>" class="form-control form-control-line data" required> 
                              </div>
                           </div>                         
                           <div class="form-group">
                              <label class="col-md-12">Telefone</label>
                              <div class="col-md-12">
                                 <input type="text" name="local" class="form-control form-control-line" value="<?= $agenda['local'] ?>" required>  
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">Local e Descriçao</label>
                              <div class="col-md-12">
                                 <input type="text" name="descricao" class="form-control form-control-line" value="<?= $agenda['descricao'] ?>" required>  
                              </div>
                           </div>       
                           <div class="form-group">
                              <label class="col-md-12">Aprovar</label>
                              <div class="col-md-12">
                                 <input type="text" name="aprovar" placeholder="Digite o número 1 e salve para aprovar o evento" class="form-control form-control-line" value="<?= $agenda['aprovar'] ?>" required>  
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-success">SALVAR</button>
                                 <a href="agenda.php" class="btn btn-alert">CANCELAR</a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <?php include 'include/footer.php'; ?>
         </div>
      </div>
      <script text="text/javascript">
         $(document).ready(function(){
            $('.data').mask('00/00/0000');
         });
      </script>
   </body>
</html>
