<?ph<?php 
    require_once('../data/BD.php');

    $noticia_id = $_GET['id'];

    $bd = new BD();
    $conexao = $bd->abrirConexao();

    $query = $conexao->prepare("SELECT * FROM  noticias n INNER JOIN Categorias C ON C.categoria_id = n.categoria_id WHERE noticia_id = $noticia_id");            
    $res = $query->execute();
    $noticia = $query->fetch(PDO::FETCH_ASSOC);

    //album de fotos - início
    $query2 = $conexao->prepare("SELECT * FROM  noticias_fotos n WHERE noticia_id = $noticia_id");            
    $res2 = $query2->execute();
    $imagens = $query2->fetchALL(PDO::FETCH_ASSOC);
    unset($query2);
    //album de fotos - fim

    unset($query);    
    $bd->fecharConexao();
    unset($bd);

    function inverter_Data_Para_DDMMAAAA($data){
        $dataInvertida = substr($data, 8,2) . '/' . substr($data, 5,2) . '/' . substr($data, 0,4);
        return $dataInvertida;
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'; ?>
        <title>Notícias</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <section id="campoNoticiaEspecifica" class="container-fluid">
             <div class="row max">
                <div class="col-md-8">
                    <div class="conteudoNoticia">
                        <h2><?php echo $noticia["titulo"]; ?></h2>
                        <p><i>Categoria: <?php echo $noticia["descricao"]; ?><br>Postado por Adesp em <?php echo inverter_Data_Para_DDMMAAAA($noticia["data"]);?></i></p>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php if($noticia['imagem'] != NULL) { $i=1; echo "<li data-target='#myCarousel' data-slide-to='".($i-1)."'></li>"; } else{ $i=0; } ?>
                                <?php foreach($imagens as $img) { ?>                                
                                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
                                <?php $i++; }  ?>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <?php if($noticia['imagem'] != NULL) {  ?>
                                <div class="item active">
                                    <img class="imgNoticia" src="../admin/uploads/noticias/<?php echo $noticia['imagem']; ?>"> 
                                </div>
                                <?php }  ?>
                                <?php foreach($imagens as $img) { ?>
                                <div class="item">
                                    <img src="../admin/uploads/noticiasfotos/<?= $img['noticia_id']; ?>/<?= $img['imagem']; ?>" alt="" width="460" height="345">
                                </div>
                                <?php } ?>
                            </div>
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="testeIcon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div><br>
                        <p class="textoNoticia"><?php echo $noticia["texto"]; ?></p>
                    </div>
                <?php //}  ?>        
                
                </div>
                <div class="col-md-4">
                    <div class="card-facebook">
                        <iframe name="f20254860ebccac" height="400px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://web.facebook.com/v2.3/plugins/page.php?app_id=249643311490&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F__Bz3h5RzMx.js%3Fversion%3D42%23cb%3Df7190beaba4134%26domain%3Dcidadequequeremos.com.br%26origin%3Dhttp%253A%252F%252Fcidadequequeremos.com.br%252Ff22daef7b9c0d%26relation%3Dparent.parent&amp;container_width=263&amp;height=580&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2FCidade-que-Queremos-1675023962709305&amp;locale=pt_BR&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=true" class="card-facebook"></iframe>  
                    </div>     
                </div>
                <div id="disqus_thread"></div>
                    <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://cidadequequeremos.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div> 
            </div>
        </section>
        <?php include 'include/footer.php'; ?>  
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5beb51d7b0730697"></script>
        <script id="dsq-count-scr" src="//cidadequequeremos.disqus.com/count.js" async></script>    
    </body>
</html>

