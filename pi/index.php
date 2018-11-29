<?php
require_once('data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$query = $conexao->prepare("SELECT N.*, C.descricao
                            FROM noticias AS N
                            INNER JOIN categorias C ON C.categoria_id = N.categoria_id
                            ORDER BY  N.data DESC"); 

$query2 = $conexao->prepare("SELECT *
                            FROM debatepolitico
                            ORDER BY idDebate DESC LIMIT 1");

$query3 = $conexao->prepare("SELECT *
                            FROM indicadores
                            ORDER BY idindicadores DESC");

$query4 = $conexao->prepare("SELECT * FROM homepage");

$query5 = $conexao->prepare("SELECT * FROM homepage
                            ORDER BY homepage_id DESC LIMIT 1");

$res = $query->execute();   
$listar = $query->fetchAll(PDO::FETCH_OBJ);

$res2 = $query2->execute();   
$listarDebate = $query2->fetchAll(PDO::FETCH_OBJ);

$res3 = $query3->execute();   

$res4 = $query4->execute();
$row = $query4->fetch();

$res5 = $query5->execute();
$homepage = $query5->fetchAll(PDO::FETCH_OBJ);

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
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <title>Cidade que Queremos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.1/css/all.css' integrity='sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:100,300italic,400,700,900' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/_bootstrap.min.js"></script>  
    </head>
    <body  data-spy="scroll" data-target=".navbar" data-offset="50">
        <nav id="nav-bar" class="navbar navbar-inverse navbar-fixed-top"> 
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img src="img/logo1.png" alt="Logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#forumPermanente">FORUM PERMANENTE</a></li>
                        <li><a href="#debatePolitico">VOTO CONSCIENTE</a></li>
                        <li><a href="#noticias">NOTÍCIAS</a></li>
                        <li><a href="#indicadores">INDICADORES</a></li>
                        <li><a href="pages/propostacoletiva.php">AGENDA ESTRATÉGICA</a></li>
                        <li><a href="pages/boaspraticas.php">PROPOSTA COLETIVA</a></li>
                        <li><a href="pages/parceiros.php">PARCEIROS</a></li>
                        <li><a href="pages/agenda.php">AGENDA</a></li>
                        <li><a href="pages/contato.php">CONTATO</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header id="home">
            <div class="container-fluid">
                <div class="row me animated fadeIn">
                    <div class="col-md-12">
                        <div class="homeName animated fadeIn">
                            <p>CIDADE QUE QUEREMOS</p>
                         </div>
                    </div>
                    <div class="col-md-12">
                        <img class="slogan" src="img/slogan.png" alt="Logo">
                    </div>
                </div>
                <div id="down" class="animated infinite slideInDown">
                    <i class="fa fa-chevron-circle-down fa-5x" aria-hidden="true"></i>
                </div>
            </div>
        </header>
        <section id="forumPermanente" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line titulo1"></span>
                        <span class="section-title forumPermanenteTitulo">Fórum Permanente</span>
                        <span class="line titulo1"></span>
                    </div>
                </div>
            </div>
            <div class="row max">
                <div class="col-md-5">
                    <div class="forumPermanenteDesc">
                        <?php  echo $row['forum'] ?> 
                    </div>
                    
                </div>
                <div class="col-md-7">
                    <div class="campoImagem">
                        <?php 
                        foreach ($homepage as $homepage) { 
                        ?>
                        <img src="admin/uploads/homepage/<?php echo $homepage->imagem; ?>">
                    <?php  }  ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="campoButton2">
                        <a style="text-decoration:none" href="pages/forumPermanente.php" class="forumPermanenteButton2"><span><b>Saiba mais</b></span></a>
                    </div>
                </div>
            </div>
        </section>
        <section id="debatePolitico" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line debatePoliticoTitulo"></span>
                        <span class="section-title debatePoliticoTitulo">Debate Político</span>
                        <span class="line debatePoliticoTitulo"></span>
                    </div>
                </div>
            </div>
            <div class="row max">
                <div class="col-md-6">
                    <?php 
                        foreach ($listarDebate as $debate) { 
                            ?>
                    <div class="col-md-12">
                        <?php echo $debate->LinkVideo; ?>
                    </div>
                    <?php }  ?>
                </div>
                 <div class="col-md-6">
                    <div class="forumPermanenteDesc">
                        <?php  echo $row['debate'] ?> 
                    </div>
                </div>

            </div>
            <div class="campoButton2">
                        <a href="pages/debatePolitico.php" class="debatePoliticoButton"><span><b>Ver outros</b></span></a>
                    </div>
        </section>
        <section id="noticias" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line noticiasTitulo"></span>
                        <span class="section-title noticiasTitulo">Notícias</span>
                        <span class="line noticiasTitulo"></span>
                    </div>
                </div>
            </div>
            <?php $i = 1;
                foreach ($listar as $noticia) { 
                    if ($i > 8)
                    break;
            ?>
            <div class="col-md-3">
                <a href="pages/noticiaEspecifica.php?id=<?php echo $noticia->noticia_id; ?>">
                    <div class="noticiaCampo">
                        <div class="noticiaTitulo">
                            <div class="iconNoticias">
                                <i class="fa fa-newspaper-o fa-2x"  aria-hidden="true"></i>
                            </div>
                            <p><?php echo $noticia->titulo; ?></p>  
                        </div>
                    </div>  
                </a>
            </div>
            <?php $i++; }  ?>
            <div class="col-md-12">
                <div class="campoButton2">
                    <a href="pages/noticias.php" class="forumPermanenteButton2"><span><b>Ler todas</b></span></a>
                </div>
            </div>
        </section>
        <section id="indicadores" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line indicadoresTitulo"></span>
                        <span class="section-title indicadoresTitulo">Indicadores</span>
                        <span class="line indicadoresTitulo"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="forumPermanenteDesc">
                    <?php  echo $row['indicadores'] ?> 
                </div>
            </div>
            <div class="col-md-8">
                <?php       
                    while($row = $query3->fetch()){ 
                ?>
                <div class="col-md-4">
                    <?php echo "<a target='_blank' href='pages/view.php?Idindicadores=".$row['Idindicadores']."'>"; ?>
                    <div class="indicadoresCampo">
                        <div class="indicadoresTitulo">
                            <div class="iconNoticias">
                                <i class="far fa-building fa-2x"  aria-hidden="true"></i>
                            </div>
                            <p><?php echo$row['name']; ?></p>  
                        </div>
                    </div>  
                    </a>
                </div>
                <?php }  ?>    
            </div>
        </section>
        <div class="rodape1">
            <div class="rodape">
                <div class="col-md-3">
                    <a href="index.php"><img class="imagemRodape" src="img/logo1.png"></a>
                    <a style="text-decoration:none" href="admin.php" class="adminButton"><span><b>Entrar</b></span></a>
                </div>
                <div class="col-md-3">
                        <p><h5>ONDE ESTAMOS?</h5></p>
                        <p>Patos de Minas - Minas Gerais</p>
                        <p>Rua Dores do Indaiá, 17 – 5º Andar - Centro</p>
                </div>
                <div class="col-md-3">
                        <p><h5>CONTATO</h5></p>
                        <p>contato@cidadequequeremos.com.br</p>
                        <p>34 3823-3991</p>
                </div>
                <div class="col-md-3">
                    <h5>REDES SOCIAIS</h5>
                    <div class="rede">
                        <a href="https://www.instagram.com/?hl=pt-br" target="_blank" title="Ir para instagram" class="fa fa-instagram fa-2x" aria-hidden="true"></a>
                        <a href="https://www.facebook.com/" target="_blank" title="Ir para facebook" class="fa fa-facebook fa-2x" aria-hidden="true"></a>
                        <a href="https://plus.google.com/+GoogleBrasil" target="_blank" title="Ir para google+" class="fa fa-envelope fa-2x" aria-hidden="true"></a>
                    </div>
                </div>   
            </div>
        </div>      
    </body>
</html>
