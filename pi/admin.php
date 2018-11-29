<?php session_start();

if(isset($_POST['email']) && isset($_POST['senha'])) {
   $email = $_POST['email'];
   $senha = $_POST['senha'];

   require_once('data/BD.php');
   $bd = new BD();
   $conexao = $bd->abrirConexao();

   $query = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = md5(:senha)");
   $query->bindParam(':email', $email, PDO::PARAM_STR);
   $query->bindParam(':senha', $senha, PDO::PARAM_STR);
   $query->execute();
   $count = $query->rowCount();

   if($count == 0) {
      $msg = "Usuário ou senha inválidos!";
   } else if($count == 1) {
      $dados = $query->fetch(PDO::FETCH_OBJ);
      $_SESSION['nome'] = $dados->nome;
      $_SESSION['email'] = $email;      
      $_SESSION['foto'] = $dados->imagem;
      $bd->fecharConexao();
      unset($bd);
      header('Location: admin/index.php');
   }
}

?>
<!DOCTYPE html>  
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
      <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
      <!-- Bootstrap Core CSS -->
      <link href="admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- animation CSS -->
      <link href="admin/css/animate.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="admin/css/style.css" rel="stylesheet">
      <!-- color CSS -->
      <link href="admin/css/colors/default.css" id="theme"  rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!-- Preloader -->
      <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div>
      <section id="wrapper" class="new-login-register">
         <div class="lg-info-panel">
            <div class="inner-panel">
               <div class="lg-content">        
               </div>
            </div>
         </div>
         <div class="new-login-box">
            <div class="white-box">
               <h3 class="box-title m-b-0">Administração</h3>
               <small>Preencha as informações abaixo</small>
               <form class="form-horizontal new-lg-form" id="loginform" action="admin.php" method="post">
                  <div class="form-group  m-t-20">
                     <div class="col-xs-12">
                        <label>Email</label>
                        <input class="form-control" name="email" type="text" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <label>Senha</label>
                        <input class="form-control" name="senha" type="password" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                           <div class="col-xs-12">
                              <button class="btn btn-info btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>

                              <br><br>
                              <?php if(isset($msg)) { ?>
                              <small style="color: red;"><?php echo $msg ?></small>
                              <?php } ?>
                           </div>
                        </div>
                     </div>                     
                  </div>
               </form>            
            </div>
         </div>
      </section>
      <!-- jQuery -->
      <script src="admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="admin/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Menu Plugin JavaScript -->
      <script src="admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
      <!--slimscroll JavaScript -->
      <script src="admin/js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="admin/js/waves.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="admin/js/custom.min.js"></script>
      <!--Style Switcher -->
      <script src="admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
   </body>
</html>