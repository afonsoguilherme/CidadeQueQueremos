<?php 
    require_once('../data/BD.php');
    if(isset($_POST['nomeContato'])) $nomeContato = $_POST['nomeContato'];
    if(isset($_POST['emailContato'])) $emailContato = $_POST['emailContato'];
    if(isset($_POST['siteContato'])) $siteContato = $_POST['siteContato'];
    if(isset($_POST['comentarioContato'])) $comentarioContato = $_POST['comentarioContato'];


    if(isset($nomeContato) && isset($emailContato) && isset($siteContato) && isset($comentarioContato)) {
        $bd = new BD();
        $conexao = $bd->abrirConexao();
      

        $query = $conexao->prepare("INSERT INTO contatos (nomeContato, emailContato, siteContato, comentarioContato) VALUES (:nomeContato, :emailContato, :siteContato, :comentarioContato)");
        $query->bindParam(':nomeContato', $nomeContato, PDO::PARAM_STR);
        $query->bindParam(':emailContato', $emailContato, PDO::PARAM_STR);
        $query->bindParam(':siteContato', $siteContato, PDO::PARAM_STR);
        $query->bindParam(':comentarioContato', $comentarioContato, PDO::PARAM_STR);

        if($query->execute()) {
            echo ("<script>alert('Adicionado com sucesso!'); location.href = 'contato.php';</script>");
        } else {
            echo ("<script>alert('Ocorreu um erro, tente novamente!!'); location.href = 'contato.php';</script>");
        }
        $bd->fecharConexao();
        unset($query);
        unset($bd);    

    }  
    
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'; ?>
        <title>Contato</title>
    </head>
    <body class="page" data-spy="scroll" data-target=".navbar" data-offset="50">
        <?php include 'include/navbar.php'; ?>
        <section id="tituloPage" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Contato</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
        </section>

        <section id="container-contato">

            <form method="POST" class="formulario" action="contato.php" name="dados">
                <div class="contentform">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Nome <span>*</span></p>
                            <span class="icon-case"><i class="fa fa-user"></i></span>
                            <input type="text" name="nomeContato" required/>
                        </div>
                        <div class="form-group">
                            <p>E-mail <span>*</span></p>    
                            <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                            <input type="email" name="emailContato" required/>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Site <span>*</span></p>   
                            <span class="icon-case"><i class="fa fa-globe"></i></span>
                            <input type="text"  name="siteContato" required/>
                        </div>
                        <div class="form-group">
                            <p>Comentário <span>*</span></p>
                            <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                           <textarea cols="67" rows="15" maxlength="3000" name="comentarioContato" required="" ></textarea>
                        </div>  
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="conteudo-formulario2">
                         <div class="col-md-6">
                            <button type="submit" value="Enviar"><span><b>Enviar</b></span></button>
                        </div>
                         <div class="col-md-6">
                            <button type="reset" value="Limpar"><span><b>Limpar</b></span></button>
                        </div>
                    </div>    
                </div>
            </form>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>