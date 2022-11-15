{% extends 'layouts/index.volt' %}

    {% block content %}

        <div id="cadastro_ticket" class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="glyphicon glyphicon-plus"></i>
                        &nbsp;Cadatrar Notícia
                    </div>
                    {{ form('noticias/cadastrar', 'method': 'post', 'enctype' : 'multipart/form-data', 'name':'cadastrar') }}
                        <div class="panel-body">
                            <div class="col-md-12"  id="conteudo">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for ="Titulo">Título <span class="error">(*)<span></label>
                                                {{ text_field("titulo", "width": '100%', "class": 'form-control' ) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for ="Texto">Texto</label>
                                                {{ text_area("texto", "class": 'form-control tinymce-editor', "maxlength" : 255) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for ="Categorias">Categorias</label>
                                                {{ select("categoria[]", categorias, "using": ["id", "nome"], "multiple":true) }}
                                            </div>
                                            <div class="form-group col-sm-4" id="publicado">
                                                <label for ="Publicado">Publicado</label>
                                                {{ check_field("publicado", "id":'publicadoCheck', "onclick":'checkCheckd()') }}
                                            </div>
                                            <div class="form-group col-sm-4" id="dataPubli">
                                                <label for ="dataPublicacao">Data de Publicação</label>
                                                {{ date_field("dataPublicacao", "class": 'form-control tinymce-editor') }}
                                            </div>
                                        </div>
                                    </div>{#/.panel-body#}
                                </div>{#/.panel#}
                                <div class="row" style="text-align:right;">
                                    <div id="buttons-cadastro" class="col-md-12">
                                        <a href="{{ url(['for':'noticia.lista']) }}" class="btn btn-default">Cancelar</a>
                                        {{ submit_button('Gravar', "class": 'btn btn-primary') }}
                                    </div>
                                </div>
                            </div>{#/.conteudo#}
                        </div>{#/.panel-body#}
                    {{ end_form() }}
                </div>{#/.panel#}
            </div>{#/.col-md-12#}
        </div><!-- row -->

    {% endblock %}

    {%  block extrafooter %}
        
        <script>
            $(document).ready(function(){
                if(document.getElementById("publicadoCheck").checked){
                    document.getElementById('dataPubli').style.visibility = 'visible';
                }else{
                    document.getElementById('dataPubli').style.visibility = 'hidden';
                }

            });

            function checkCheckd(){
                if(document.getElementById("publicadoCheck").checked){
                    document.getElementById('dataPubli').style.visibility = 'visible';
                }else{
                    document.getElementById('dataPubli').style.visibility = 'hidden';
                }
            }

        </script>
    {% endblock %}
