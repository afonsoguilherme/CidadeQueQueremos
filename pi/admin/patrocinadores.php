<?php

$patrocinio = require_once('php/patrocinadores/listar-todas.php');

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
                     <h4 class="page-title">Patrocinadores</h4>
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
                        <!-- <h3 class="box-title pull-left">Categorias</h3> -->
                        <a href="patrocinadores-adicionar.php" class="btn btn-danger pull-left">+ novo</a>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th width="5%">#</th>
                                    <th>Nome do Patrocinador</th>
                                    <th>Logo do Patrocinador</th>
                                    <th>Link</th>
                                    <th width="20%" class="text-center">Ações</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($patrocinio as $patrocinio) { ?>
                                 <tr>
                                    <td><?= $patrocinio->IdPatrocinio; ?></td>
                                    <td><?= $patrocinio->NomePatrocinador; ?></td>
                                    <td><?= $patrocinio->Imagem; ?></td>
                                    <td><?= $patrocinio->Descricao; ?></td>
                                    <td class="text-center">
                                       <a class="btn btn-info btn-xs" href="patrocinadores-editar.php?id=<?= $patrocinio->IdPatrocinio; ?>"><i class="fa fa-pencil"></i> EDITAR</a>
                                       <a class="btn btn-warning btn-xs" onclick="return confirm('Você deseja excluir?')" href="php/patrocinadores/excluir.php?id=<?= $patrocinio->IdPatrocinio; ?>"><i class="fa fa-trash"></i> EXCLUIR</a>
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

      <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
      <script src="js/jquery.slimscroll.js"></script>
      <script src="js/waves.js"></script>
      <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
      <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
      <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
      <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
      <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
      <script src="js/custom.min.js"></script>
      <script src="js/dashboard1.js"></script>
      <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
   </body>
</html>
