<?php 
    require_once('../data/BD.php');

    $IdBoasPraticas = $_GET['id'];

    $bd = new BD();
    $conexao = $bd->abrirConexao();

    $query = $conexao->prepare("SELECT * FROM boaspraticas n ORDER BY IdBoasPraticas DESC");            
    $res = $query->execute();
    $boapratica = $query->fetch(PDO::FETCH_ASSOC);

    //album de fotos - início
    $query2 = $conexao->prepare("SELECT * FROM  boaspraticas_fotos n WHERE IdBoasPraticas = $IdBoasPraticas");            
    $res2 = $query2->execute();
    $imagens = $query2->fetchALL(PDO::FETCH_ASSOC);
    unset($query2);
    //album de fotos - fim

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
                <div class="col-md-8">
                   <?php //foreach($boapraticas as $boapratica) { ?>
                        <div>
                            <h2><?php echo $boapratica["Titulo"]; ?></h2>
                            <img class="imgNoticia" src="../admin/uploads/boaspraticas/<?php echo $boapratica['imagem']; ?>"><br>
                            <p class="textoNoticia"><?php echo $boapratica["Texto"]; ?></p>
                        </div>
                    <?php //}  ?> 

                    <!-- album de fotos - inicio -->
                    <?php foreach ($imagens as $imagem) { ?>
                        <br><img class="imgNoticia"  src="../admin/uploads/boaspraticasfotos/<?php echo $boapratica["IdBoasPraticas"]; ?>/<?php echo $imagem['imagem']; ?>" alt="" title="" >
                    <?php } ?><br>
                    <!-- album de fotos - fim -->

    
                </div>
                   <div class="col-md-4">
                    <br>
                     <iframe name="f20254860ebccac" width="1000px" height="580px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://web.facebook.com/v2.3/plugins/page.php?app_id=249643311490&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F__Bz3h5RzMx.js%3Fversion%3D42%23cb%3Df7190beaba4134%26domain%3Dcidadequequeremos.com.br%26origin%3Dhttp%253A%252F%252Fcidadequequeremos.com.br%252Ff22daef7b9c0d%26relation%3Dparent.parent&amp;container_width=263&amp;height=580&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FCidade-que-Queremos-1675023962709305&amp;locale=pt_BR&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=true" style="border: none; visibility: visible; width: 500px; height: 800px;" class=""></iframe>
            </div>
               
            </div>
        </section>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>

