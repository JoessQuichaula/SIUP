@extends('layouts.app')

@section('content')

<style>
    #map{
        height: 800px;
        width: 100%;
    }
    h1{
        text-align: center;
        margin-bottom: 20px;
        color: #f37006;
    }
</style>

<h1>Escolha a sua Repartição</h1>

<div id="map"></div>
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Repartição</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img class="img-fluid" style="border-radius: 8px; margin-bottom:10px;" id="modalImg" src="{{asset('storage/')}}" alt="" width="100%">

          <h5 id="repMunicipioTipo"></h5>
          <p id="repEstado"></p>
          <ul id="repAttr">
              <li> <h6 style="display: inline-block">Endereço:</h6>  <p style="display: inline-block" id="repEndereco"></p></li>
              <li><p style="display: inline-block">Segunda-Feira à Sexta-Feira:</p>  <p style="display: inline-block" id="repHorario"></p></li>
          </ul>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" id="btnLogin" class="btn btn-primary">Avançar</button>
        </div>
      </div>
    </div>
  </div>
@php
$reparticoes = App\Models\Reparticao::all();
$tipos=App\Models\TipoReparticao::all();
$municipios = App\Models\Municipio::all();
$estados = App\Models\ReparticaoEstado::all();

@endphp


<script>

var reparticoes = @json($reparticoes);
var servico = @json($servico);
var tipos = @json($tipos);
var municipios = @json($municipios);
var estados = @json($estados);



var urlInicial = $("#modalImg").attr("src");
function initMap(){
    var options = {
            zoom:11,
            center:{lat:-8.8422315,lng:13.245968}
    }
    var map = new google.maps.Map(document.getElementById('map'),options);


    reparticoes.forEach(function(item,index){
        var marker = new google.maps.Marker({
                position:{lat:item.latitude,lng:item.longitude},
                map:map
        })



        marker.addListener('click',function(){

            $("#exampleModal").modal();
            var urlImagem = urlInicial +"/"+item.imagem;
            $("#modalImg").attr("src",urlImagem);
            urlImagem="";

            $('#btnLogin').click(function() {
                window.location = "/maps/"+servico.id+"/envio-documentos/"+item.id;
            });
          
            var municipio = municipios.find(object => object.id == item.idMunicipio);
            var tipo = tipos.find(object => object.id == item.idTipo);
            var estado = estados.find(object => object.id == item.estado_id);
            if(estado.id == 1)
                $('#repEstado').css('color','green');
            else
            $('#repEstado').css('color','red');

            $('#repMunicipioTipo').html(municipio.nome+" - "+tipo.nome);
            $('#repEstado').html(estado.estado);
            $('#repEndereco').html(item.endereco);
            $('#repHorario').html(item.tempoAbertura+" - "+item.tempoEncerramento);
        });
    });



}

</script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuZaH6b73Haz-wFmbDlIds4mn8pMqR-EI&callback=initMap" defer>
</script>
@endsection

