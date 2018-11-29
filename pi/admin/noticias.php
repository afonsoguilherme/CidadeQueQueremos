<?php
    
$noticias = require_once('php/noticias/listar-todas.php');

function inverter_Data_Para_DDMMAAAA($data){

    $dataInvertida = substr($data, 8,2) . '/' . substr($data, 5,2) . '/' . substr($data, 0,4);
    return $dataInvertida;
}

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
                     <h4 class="page-title">Notícias</h4>
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
                        <!-- <h3 class="box-title">Notícias Cadastradas</h3> -->
                        <a href="noticia-adicionar.php" class="btn btn-danger pull-left">+ novo</a>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="table-responsive">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Data</th>
                                    <th>Categoria</th>
                                    <th>Imagem</th>
                                    <th width="20%" class="text-center">Ações</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($noticias as $noticia) { ?>
                                 <tr>
                                    <td><?= $noticia->noticia_id; ?></td>
                                    <td><?= $noticia->titulo; ?></td>
                                    <td><?= inverter_Data_Para_DDMMAAAA($noticia->data); ?></td>
                                    <td><?= $noticia->descricao; ?></td>
                                    <td>
                                       <img src="uploads/noticias/<?= $noticia->imagem; ?>" alt="" width="40">                                         
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-success btn-xs" href="noticia-album.php?noticia_id=<?= $noticia->noticia_id; ?>"><i class="fa fa-image"></i> ALBUM</a>
                                       <a class="btn btn-info btn-xs" href="noticia-editar.php?id=<?= $noticia->noticia_id; ?>"><i class="fa fa-pencil"></i> EDITAR</a>
                                       <a class="btn btn-danger btn-xs" onclick="return confirm('Você deseja excluir <?= $noticia->titulo; ?>?')" href="php/noticias/excluir.php?id=<?= $noticia->noticia_id; ?>"><i class="fa fa-trash"></i> EXCLUIR</a>
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
