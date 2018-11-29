<?php
session_start();
include_once("../data/BD.php");
    $bd = new BD();
    $conexao = $bd->abrirConexao();

    $query = $conexao->prepare("SELECT id,titulo,cor,inicio,fim,local,descricao,aprovar FROM events WHERE aprovar=1");        
    
    $res = $query->execute();    

    $resultado_events = $query->fetchAll(PDO::FETCH_ASSOC);

    unset($query);
    $bd->fecharConexao();
    unset($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <?php include 'include/head.php'; ?>
        <title>Agenda</title>
        <link href='../css/fullcalendar.min.css' rel='stylesheet' />
        <link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <link href='../css/cssagenda.css' rel='stylesheet' />
        <script src='../js/moment.min.js'></script>        
        <script src='../js/fullcalendar.min.js'></script>
        <script src='../locale/pt-br.js'></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                 },
                  defaultDate: Date(),
                    navLinks: true,
                    editable: true,
                    eventLimit: true,
                    eventClick: function(event) {
                        $('#visualizar #id').text(event.id);
                        $('#visualizar #id').val(event.id);
                        $('#visualizar #title').text(event.title);
                        $('#visualizar #title').val(event.title);
                        $('#visualizar #start').text(event.start.format('DD/MM/YYYY'));
                        $('#visualizar #start').val(event.start.format('DD/MM/YYYY'));
                        $('#visualizar #end').text(event.end.format('DD/MM/YYYY'));
                        $('#visualizar #end').val(event.end.format('DD/MM/YYYY'));
                        $('#visualizar #description').text(event.description);
                        $('#visualizar #description').val(event.description);
                        $('#visualizar #local').text(event.local);
                        $('#visualizar #local').val(event.local);
                        $('#visualizar #descricao').text(event.descricao);
                        $('#visualizar #descricao').val(event.descricao);
                        $('#visualizar #color').val(event.color);
                        $('#visualizar').modal('show');
                        return false;

                    },
                    selectable:true,
                    selectHelper:true,
                    select: function(start,end){
                        $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY'));
                        $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY'));
                        $('#cadastrar').modal('show');
                    },
                    events: [
                        <?php foreach ($resultado_events as $row_events) { ?>
                            {
                            id:'<?php echo $row_events ['id'];?>',
                            title:'<?php echo $row_events ['titulo'];?>',
                            color:'<?php echo $row_events ['cor'];?>',
                            start:'<?php echo $row_events ['inicio'];?>',
                            end:'<?php echo $row_events ['fim'];?>',
                            local: '<?php echo $row_events['local'];?>',
                            descricao: '<?php echo $row_events['descricao'];?>',
                            },
                        <?php } ?>
                    ]
            });
        });

        //mascara
        function DataHora(evento, objeto){
                var keypress=(window.event)?event.keyCode:evento.which;
                campo = eval (objeto);
                if (campo.value == '00/00/0000 00:00:00'){
                    campo.value=""
                }
             
                caracteres = '0123456789';
                separacao1 = '/';
                separacao2 = ' ';
                separacao3 = ':';
                conjunto1 = 2;
                conjunto2 = 5;
                conjunto3 = 10;
                conjunto4 = 13;
                conjunto5 = 16;
                if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
                    if (campo.value.length == conjunto1 )
                    campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto2)
                    campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto3)
                    campo.value = campo.value + separacao2;
                    else if (campo.value.length == conjunto4)
                    campo.value = campo.value + separacao3;
                    else if (campo.value.length == conjunto5)
                    campo.value = campo.value + separacao3;
                }else{
                    event.returnValue = false;
                }
            }
    </script>

    </head>
    <body class="page" data-spy="scroll" data-target=".navbar" data-offset="50">
        <?php include 'include/navbar.php'; ?>
        <section id="tituloPage" class="container-fluid">
            <div class="row section-banner">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div>
                        <span class="line pagesTitulo"></span>
                        <span class="section-title pagesTitulo">Agenda</span>
                        <span class="line pagesTitulo"></span>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div id='calendar'></div>
        <div class="clearfix"></div>
        <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" style="margin-top:100px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Dados do Evento</h4>
                    </div>
                    <div class="modal-body">
                        <div class="visualizar">
                        <dl class="dl-horizontal">
                            <dt>Titulo do Evento</dt>
                            <dd id="title"></dd>
                            <dt>Inicio do Evento</dt>
                            <dd id="start"></dd>
                            <dt>Fim do Evento</dt>
                            <dd id="end"></dd>
                            <dt>Telefone</dt>
                            <dd id="local"></dd>
                            <dt>Informação Adicionais</dt>
                            <dd id="descricao"></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" style="margin-top:100px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Cadastrar Evento</h4>
                        <h6 class="modal-title text-center">É obrigatório o preenchimento de todos os dados</h6>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="proc_cad_evento.php" >
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Titulo:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="titulo" placeholder="Titulo do Evento">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Cor:</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>         
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>  
                                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>                                        
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Data Inicial:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="inicio" id="start" onKeyPress="DataHora(event,this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Data Final:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="fim" id="end" onKeyPress="DataHora(event,this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Telefone:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="local" placeholder="Informe um Telefone para Contato">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Informações Adicionais:</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="descricao" placeholder="Local, Hora e Descrição do Evento">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.btn-canc-vis').on("click", function() {
                $('.form').slideToggle();
                $('.visualizar').slideToggle();
            });
            $('.btn-canc-edit').on("click", function() {
                $('.visualizar').slideToggle();
                $('.form').slideToggle();
            });
        </script>
        <?php include 'include/footer.php'; ?>      
    </body>
</html>

