<?php

    $imagens = require_once('php/boaspraticasfotos/listar.php');
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
                     <h4 class="page-title">Boas Práticas - Álbum</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <ol class="breadcrumb">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="boaspraticas.php">Boas Práticas</a></li>
                        <li><a href="#">Álbum</a></li>
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-xs-12">
                     <div class="white-box">
                        <h3 class="box-title">Album de Fotos</h3>
                        <hr>
                        <form class="form-horizontal form-material" action="php/boaspraticasfotos/adicionar.php" method="post" enctype="multipart/form-data"
                        >
                            <input type="hidden" name="IdBoasPraticas" value="<?= isset($IdBoasPraticas) ? $IdBoasPraticas : '' ?>">
                            <div class="form-group">
                                <label class="col-md-12">Imagens</label>
                                <div class="col-md-12">
                                    <input type="file" name="imagens[]" accept="image/*" multiple required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">SALVAR</button>
                                    <a href="boaspraticas.php" class="btn btn-alert">CANCELAR</a>
                                </div>
                            </div>
                        </form>

                        <h3 class="box-title">Imagens</h3>
                        <hr>
                        <?php foreach($imagens as $img) { ?>
                            <div class="col-sm-2 thumb">
                                <a class="btn btn-danger btn-xs btn-excluir-foto" href="php/boaspraticasfotos/excluir.php?id=<?= $img->id; ?>&IdBoasPraticas=<?= $img->IdBoasPraticas; ?>"><i class="fa fa-trash"></i></a>
                                <img src="uploads/boaspraticasfotos/<?= $img->IdBoasPraticas; ?>/<?= $img->imagem; ?>" alt="" title="" class="img-responsive" style="border:1px solid #9e9e9e;" />
                            </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
            <?php include 'include/footer.php'; ?>
         </div>
      </div>
   </body>
</html>
