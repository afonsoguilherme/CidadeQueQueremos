<?php 
    require_once('../data/BD.php');

    $bd = new BD();
    $conexao = $bd->abrirConexao();

    $query = $conexao->prepare("SELECT linkVideo FROM debatepolitico");        
    
    $res = $query->execute();    

    $debatepolitico = $query->fetchAll(PDO::FETCH_OBJ);

    unset($query);
    $bd->fecharConexao();
    unset($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'; ?>
        <title>Debate Político</title>
    </head>
    <body class="page" data-spy="scroll" data-target=".navbar" data-offset="50">
        <?php include 'include/navbar.php'; ?>
        <section id="tituloPage" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Debate Político</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php 
                    $i = 1;
                    foreach ($debatepolitico as $debate) { 
                        if ($i > 4)
                        break;
                        ?>
                <div class="col-md-6">
                    <?php echo $debate->linkVideo; ?>
                </div>
                <?php $i++; }  ?>
            </div>
        </section>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>
