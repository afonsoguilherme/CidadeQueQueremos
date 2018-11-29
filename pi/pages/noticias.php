<?php 
    require_once('../data/BD.php');

    $bd = new BD();
    $conexao = $bd->abrirConexao();

    $query = $conexao->prepare("SELECT N.*, C.descricao
                                FROM noticias AS N 
                                INNER JOIN categorias C ON C.categoria_id = N.categoria_id 
                                ORDER BY noticia_id DESC");        
    
    $res = $query->execute();  

    $noticias = $query->fetchAll(PDO::FETCH_OBJ);

//print_r($noticias);
//exit();

    unset($query);
    $bd->fecharConexao();
    unset($bd);

    function inverter_Data_Para_DDMMAAAA($data){
        $dataInvertida = substr($data, 8,2) . '/' . substr($data, 5,2) . '/' . substr($data, 0,4);
        return $dataInvertida;
    }

    function limitarTexto($texto, $limite){
        $contador = strlen($texto);
        if ( $contador >= $limite ) {      
            $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . ' [...]';
        return $texto;
        }
        else{
            return $texto;
        }
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'; ?>
        <title>Notícias</title>
    </head>
    <body class="page" data-spy="scroll" data-target=".navbar" data-offset="50">
        <?php include 'include/navbar.php'; ?>
        <section id="tituloPage" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Notícias</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
        </section>
        <section id="campoNoticias" class="container-fluid">
             <div class="row max">
                <div class="col-md-8">
                    <?php 
                        
                        foreach ($noticias as $noticia) { 
                            ?>
                        <div class="resumoNoticia">
                            <h2><?php echo $noticia->titulo; ?></h2>
                            <p><i>Categoria: <?php echo $noticia->descricao; ?><br>Postado por Adesp em <?php echo inverter_Data_Para_DDMMAAAA($noticia->data);?></i></p>
                            <?php if($noticia->imagem == NULL) { $i=0;} else{ $i=0; } ?>
                            <?php if($noticia->imagem != NULL) {  ?>
                            <img class="imgNoticia" src="../admin/uploads/noticias/<?php echo $noticia->imagem; ?>"><br>
                            <?php }  ?>
                            <p class="textoNoticia" maxlenght="10"><?php echo limitarTexto($noticia->texto, $limite = 600); ?></p>
                            <div class="campoButtonNoticias">
                                <a href="noticiaEspecifica.php?id=<?php echo $noticia->noticia_id; ?>" class="continuarLendoButton"><span>Continuar lendo</span></a>
                            </div>
                        </div>
                    <?php  }  ?>
                    <div class="col-md-offset-3 col-md-3 text-center">
                        <iframe name="f20254860ebccac" width="1000px" height="580px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://web.facebook.com/v2.3/plugins/page.php?app_id=249643311490&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F__Bz3h5RzMx.js%3Fversion%3D42%23cb%3Df7190beaba4134%26domain%3Dcidadequequeremos.com.br%26origin%3Dhttp%253A%252F%252Fcidadequequeremos.com.br%252Ff22daef7b9c0d%26relation%3Dparent.parent&amp;container_width=263&amp;height=580&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FCidade-que-Queremos-1675023962709305&amp;locale=pt_BR&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=true" style="border: none; visibility: visible; width: 500px; height: 580px;" class=""></iframe>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>

