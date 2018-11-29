<?php 
 require_once('../data/BD.php');
 
    $bd = new BD();
    $conexao = $bd->abrirConexao();

    $query = $conexao->prepare("SELECT * FROM boaspraticas ORDER BY IdBoasPraticas DESC");        
    
    $res = $query->execute();  

    $boaspraticas = $query->fetchAll(PDO::FETCH_OBJ);

//print_r($noticias);
//exit();

    unset($query);
    $bd->fecharConexao();
    unset($bd);

 ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'; ?>
        <title>Boas Práticas</title>
    </head>
    <body class="page" data-spy="scroll" data-target=".navbar" data-offset="50">
        <?php include 'include/navbar.php'; ?>
        <section id="tituloPage" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Boas Práticas</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
        </section>
        <section id="campoNoticias" class="container-fluid">
             <div class="row max">
                <div class="col-md-12">
                    <?php   
                        foreach ($boaspraticas as $boapratica) { 
                            ?>
                        <div class="col-md-4">
                                <div class="boasPraticasCampo">
                                    <div class="boasPraticasTitulo">
                                        <a style="text-decoration:none" href="boaspraticasEspecifica.php?id=<?php echo $boapratica->IdBoasPraticas; ?>" ><?php echo $boapratica->Titulo; ?></a>
                                    </div>
                                    <img class="imgNoticia" src="../admin/uploads/boaspraticas/<?php echo $boapratica->imagem; ?>"><br>
                                    <p><i><?php echo $boapratica->Descricao; ?></i></p>
                                    
                                
                                        <a style="text-decoration:none" href="boaspraticasEspecifica.php?id=<?php echo $boapratica->IdBoasPraticas; ?>" class="continuarLendoButton"><span><b>Continuar lendo</b></span></a>
                                        <br><br>
                                    
                                </div>  
                        </div>
                    <?php  }  ?>
                </div>
            </div>

        </section>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>
