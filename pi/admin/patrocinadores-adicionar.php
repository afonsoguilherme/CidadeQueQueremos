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
                        <li><a href="patrocinadores.php">Patrocinadores</a></li>
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-xs-12">
                     <div class="white-box">
                        <h3 class="box-title">Novo Patrocinador</h3>
                        <hr>
                        <form class="form-horizontal form-material" action="php/patrocinadores/adicionar.php" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                              <label class="col-md-12">Nome do Patrocinador</label>
                              <div class="col-md-12">
                                 <input type="text" name="NomePatrocinador" placeholder="Informe o nome" class="form-control form-control-line" required> 
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">Link</label>
                              <div class="col-md-12">
                                 <input type="text" name="Descricao" placeholder="Informe o link da página do patrocinador" class="form-control form-control-line" required> 
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">Imagem</label>
                              <div class="col-md-12">
                                 <input type="file" name="Imagem" accept="image/*"> 
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-success">SALVAR</button>
                                 <a href="patrocinadores.php" class="btn btn-alert">CANCELAR</a>
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
