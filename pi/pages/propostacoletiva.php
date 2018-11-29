 <?php

      

      $categoriasPropostas = require_once('../admin/php/categoriasPropostas/combo.php');

      ?>

<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'; ?>
        <title>Proposta Coletiva</title>
    </head>
    <body class="page" data-spy="scroll" data-target=".navbar" data-offset="50">
        <?php include 'include/navbar.php'; ?>
        <section id="tituloPage" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Proposta Coletiva</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
            <div class="row max">
                <div class="col-md-8">
                    <h2 class="forumPermanenteTitulo2">Proposta Coletiva</h2>
                    <div class="forumPermanenteTexto"> 
                        <p>O projeto Cidade que Queremos é a junção de todas as ações, propostas e discussões feitas até aqui. É o momento da maturidade da cidadania e das instituições. É o momento em que a população expressa o que deseja e se materializa na <b>AGENDA ESTRATÉGICA DE PATOS DE MINAS.</b></p>
                        <p>À medida em que o ideal coletivo de cada cidadão desenvolve-se, aumenta a vontade de construir algo para Patos de Minas. Com o espírito de criar um conjunto de ações que possam transformar nossa cidade, convidamos você para  ser protagonista de mudanças.</p>
                        <p>As contribuições foram trabalhadas em temas estratégicos que traduzem todas as propostas em diretrizes de Políticas Públicas: Governança e Gestão Participativa; Educação; Saúde e Bem-Estar; Planejamento Urbano, Mobilidade e Urbanismo; Economia Local e Desenvolvimento Econômico; Inovação e Tecnologia; e Meio Ambiente e Sustentabilidade.</p>
                        <p><i><b>A Cidade que Queremos é o local onde pessoas querem ficar, onde sentem que podem e conseguem manifestar seu potencial humano e fazer a diferença. É, também, onde encontram condições favoráveis no entorno, para a geração de renda de seu sustento.</b></i></p>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="propostacoletivaimg">
                        <img src="../img/propostacoletivaimg1.jpg">
                    </div>
                    <div class="forumPermanenteTexto">
                        <p>Regimento Propositivo e Credenciamento de Entidades para a constituição do Fórum Cidade que Queremos. É o momento de todos participarem, através das entidades representativas. Acesse o link:</p>
                        <div class="campoButton">
                            <a href="https://www7.fiemg.com.br/Cms_Data/Contents/regionais/Media/Alto-paranaiba/2015/ArquivosDiversos/Carta-de-Inten-es.pdf" class="forumPermanenteButton "type="button"><b>Leia mais.</b></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Envie sua ideia</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
            <form class="formulario" action="../admin/php/propostaColetiva/adicionar.php" method="post" enctype="multipart/form-data">
                <div class="contentform">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p>Nome <span>*</span></p>
                            <span class="icon-case"><i class="fa fa-user"></i></span>
                            <input type="text" name="NomeIdealizador" required/>
                        </div>
                        <div class="form-group">
                            <p>E-mail <span>*</span></p>    
                            <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                            <input type="email" name="EmailIdealizador" required/>
                        </div> 
                        <div class="form-group"> 
                            <p>Telefone <span>*</span></p>  
                            <span class="icon-case"><i class="fa fa-phone"></i></span>
                            <input type="text" name="TelefoneIdealizador" required/>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <p>Categoria <span>*</span></p>  
                            <span class="icon-case"><i class="fa fa-tag"></i></span>
                            <select name="categoriaProposta_id">
                                <option value="">Selecione</option>
                                    <?php foreach ($categoriasPropostas as $categoria) { ?>
                                    <option value="<?= $categoria->categoriaProposta_id ?>"><?= $categoria->descricao ?></option>  
                                    <?php } ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <p>Crie um nome que já diga um pouco sobre sua ideia <span>*</span></p>   
                            <span class="icon-case"><i class="fa fa-comment-o"></i></span>
                            <input type="text" name="TituloProposta" required/>
                        </div>
                        <div class="form-group">
                            <p>Descreva de forma breve, com que tipo de ação as pessoas podem contribuir <span>*</span></p>
                            <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                            <textarea name="DescricaoProposta" required></textarea>
                        </div>  
                    </div>
                </div>
                <div class="col-md-12">
                <button type="submit" class="forumPermanenteButton2"><span><b>Enviar</b></span></button>
            </div>
            </form> 
        </section>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>
