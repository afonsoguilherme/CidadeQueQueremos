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
                     <h4 class="page-title">Usuários</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                     <ol class="breadcrumb">
                        <li><a href="index.php">Início</a></li>
                        <li><a href="usuarios.php">Usuários</a></li>
                     </ol>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-xs-12">
                     <div class="white-box">
                        <h3 class="box-title">Novo Usuário</h3>
                        <hr>
                        <form class="form-horizontal form-material" action="php/usuarios/adicionar.php" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                              <label class="col-md-12">Nome</label>
                              <div class="col-md-12">
                                 <input type="text" name="nome" placeholder="Informe um nome" class="form-control form-control-line" required> 
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">E-mail</label>
                              <div class="col-md-12">
                                 <input type="email" name="email" placeholder="Informe um email" class="form-control form-control-line" required> 
                              </div>
                           </div>                           
                           <div class="form-group">
                              <label class="col-md-12">Senha</label>
                              <div class="col-md-12">
                                 <input type="password" name="senha" placeholder="Informe uma senha" class="form-control form-control-line" required> 
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-12">Imagem</label>
                              <div class="col-md-12">
                                 <input type="file" name="imagem" accept="image/*"> 
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <button type="submit" class="btn btn-success">SALVAR</button>
                                 <a href="usuarios.php" class="btn btn-alert">CANCELAR</a>
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
