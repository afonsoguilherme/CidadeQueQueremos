<?php

$homepage = require_once('php/homepage/listar.php');

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php

      include 'include/head.php';

      ?>
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
                     <h4 class="page-title">Home Page</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <ol class="breadcrumb">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="index.php">Home Page</a></li>
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-xs-12">
                     <div class="white-box">
                        <h3 class="box-title">Editar Home Page</h3>
                        <hr>
                        <form class="form-horizontal form-material" action="php/homepage/editar.php" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="homepage_id" value="<?= isset($homepage) ? $homepage['homepage_id'] : '' ?>">
                           <div class="form-group">
                              <label class="col-md-12">Fórum Permanente</label>
                              <div class="col-md-12">
                                 <textarea name="forum" class="form-control form-control-line"><?= isset($homepage) ? $homepage['forum'] : '' ?></textarea>
                                 <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc'></script>
                                 <script  src="js/index.js"></script>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">Debate Político</label>
                              <div class="col-md-12">
                                 <textarea name="debate" class="form-control form-control-line"><?= isset($homepage) ? $homepage['debate'] : '' ?></textarea>
                                 <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc'></script>
                                 <script  src="js/index.js"></script>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">Indicadores</label>
                              <div class="col-md-12">
                                 <textarea name="indicadores" class="form-control form-control-line"><?= isset($homepage) ? $homepage['indicadores'] : '' ?></textarea>
                                 <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc'></script>
                                 <script  src="js/index.js"></script>
                              </div>
                           </div>
                           <?php if(isset($homepage['imagem'])) { ?>
                           <div class="form-group">
                              <label class="col-md-12">Imagem Atual</label>
                              <div class="col-md-12">
                                 <input type="hidden" name="imagem_atual" value="<?= $homepage['imagem'] ?>" />
                                 <img src="uploads/homepage/<?= $homepage['imagem'] ?>" alt="" title="" width="150" />
                              </div>
                           </div>
                           <?php } ?>
                           <div class="form-group">
                              <label class="col-md-12">Imagem</label>
                              <div class="col-md-12">
                                 <input type="file" name="imagem" class="" accept="image/*"> 
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-success">SALVAR</button>
                                 <a href="index.php" class="btn btn-alert">CANCELAR</a>
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
   </body>
</html>
