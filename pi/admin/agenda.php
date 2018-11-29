<?php
    
$agenda = require_once('php/agenda/listar-todas.php');

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
                     </ol>
                  </div>
               </div>
            
               <div class="row">
                  <div class="col-md-12 col-xs-12">
                     <div class="white-box">
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Cor</th>
                                    <th>Inicio</th>
                                    <th>Fim</th>
                                    <th>Telefone</th>
                                    <th>Local, Hora e Descrição</th>
                                    <th>Aprovar</th>
                                    <th width="20%" class="text-center">Ações</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($agenda as $agenda) { ?>
                                 <tr>
                                    <td><?= $agenda->id; ?></td>
                                    <td><?= $agenda->titulo; ?></td>
                                    <td><?= $agenda->cor; ?></td>
                                    <td><?= inverter_Data_Para_DDMMAAAA($agenda->inicio); ?></td>
                                    <td><?= inverter_Data_Para_DDMMAAAA($agenda->fim); ?></td>
                                    <td><?= $agenda->local; ?></td>
                                    <td><?= $agenda->descricao; ?></td>
                                    <td><?= $agenda->aprovar; ?></td>
                                    <td class="text-center">
                                       <a class="btn btn-info btn-xs" href="agenda-editar.php?id=<?= $agenda->id; ?>"><i class="fa fa-pencil"></i> APROVAR</a>
                                       <a class="btn btn-warning btn-xs" onclick="return confirm('Você deseja excluir?')" href="php/agenda/excluir.php?id=<?= $agenda->id; ?>"><i class="fa fa-trash"></i> EXCLUIR</a>
                                    </td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
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
