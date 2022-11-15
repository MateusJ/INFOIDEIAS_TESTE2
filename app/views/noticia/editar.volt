{% extends 'layouts/index.volt' %}

    {% block content %}

        <div id="cadastro_ticket" class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="glyphicon glyphicon-plus"></i>
                        &nbsp;Editar Noticia
                    </div>
                    {{ form('noticias/editar', 'method': 'post', 'enctype' : 'multipart/form-data', 'name':'editar') }}
                        
                        <div class="panel-body">
                            <div class="col-md-12"  id="conteudo">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <p><strong>Data de Criação:</strong> 22/07/2017 11:18:22</p>
                                                <p><strong>Data da Última Atualização:</strong> 22/07/2017 11:18:22</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for ="Titulo">Título <span class="error">(*)<span></label>
                                                    {{ text_field("titulo", "width": '100%', "class": 'form-control', "value":tituloNot ) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for ="Texto">Texto</label>
                                                {{ text_area("texto", "class": 'form-control tinymce-editor', "maxlength" : 255,"value":textoNot) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label for ="Categorias">Categorias</label>
                                                {{ select("categoria[]", categorias, "using": ["id", "nome"], "multiple":true) }}
                                            </div>
                                            <div class="form-group col-sm-4" id="publicado">
                                                <label for ="Publicado">Publicado</label>
                                                {{ check_field("publicado", "id":'checkPubli', "onclick":'checking()') }}
                                            </div>
                                            <div class="form-group col-sm-4" id="dataPubli">
                                                <label for ="dataPublicacao">Data de Publicação</label>
                                                {{ date_field("dataPublicacao", "class": 'form-control tinymce-editor', "value": dataNot) }}
                                            </div>
                                        </div>
                                        <div>
                                            <input type='hidden' name='id' value="{{ this.dispatcher.getParam('id') }}">
                                            <input type='hidden' id="ifChecked" value="{{ifChecked}}">
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
                
                if(document.getElementById("ifChecked").value == 1){
                    document.getElementById("checkPubli").checked = true;
                }else{
                    document.getElementById("checkPubli").checked = false;
                }

                if(document.getElementById("checkPubli").checked){
                    document.getElementById('dataPubli').style.visibility = 'visible';
                }else{
                    document.getElementById('dataPubli').style.visibility = 'hidden';
                }
            
            });

            function checking(){
                if(document.getElementById("checkPubli").checked){
                    document.getElementById('dataPubli').style.visibility = 'visible';
                }else{
                    document.getElementById('dataPubli').style.visibility = 'hidden';
                }
            }
            
        </script>
    {% endblock %}
