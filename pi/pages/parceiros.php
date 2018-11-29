<?php 
    require_once('../data/BD.php');

    $bd = new BD();
    $conexao = $bd->abrirConexao();

    $query = $conexao->prepare("SELECT NomePatrocinador,Imagem,Descricao FROM patrocinio");        
    
    $res = $query->execute();    

    $patrocinio = $query->fetchAll(PDO::FETCH_OBJ);

    unset($query);
    $bd->fecharConexao();
    unset($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'; ?>
        <title>Parceiros</title>
    </head>
    <body class="page" data-spy="scroll" data-target=".navbar" data-offset="50">
        <?php include 'include/navbar.php'; ?>
        <section id="tituloPage" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Parceiros</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="text-align: center; font-size: 1.2em">
                <?php 
                    $i = 1;
                    foreach ($patrocinio as $patrocinio) { 
                        if ($i >5000)
                        break;
                        ?>
                
                    <b><?php echo $patrocinio->NomePatrocinador; ?>:</b><br>
                    <a href=" <?php echo $patrocinio->Descricao; ?>" target="_blank">
                        <img src="../admin/uploads/patrocinadores/<?php echo $patrocinio->Imagem; ?>" style="width:10%;height:auto;">
                    </a><br><br><br>
                <?php $i++; }  ?>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br>
        </section>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>
