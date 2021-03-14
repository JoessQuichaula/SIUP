@extends('layouts.app')

@section('content')

<div class="container">
    <div class="py-5 text-center">
      <h2>Selecione os Documentos</h2>
      <p class="lead">A actualização do Estatuto Orgânico do Ministério da Justiça e dos Direitos Humanos foi aprovado pelo Decreto Presidencial Nº 224/20 de 31 de Agosto, no âmbito do Processo de Reforma Administrativa da Justiça em curso.</p>
    </div>

    <div class="row" style="padding-bottom: 20%">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Lista De Documentos</span>
          <span class="badge badge-secondary badge-pill">{{count($documentos)}}</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach ($documentos as $documento)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                  <h6 class="my-0">{{$documento->nome}}</h6>
                  <small id="nomeFicheiro{{$documento->id}}" class="text-muted">Especificação</small>
                </div>
                <span id="tamanho{{$documento->id}}" class="text-muted"></span>
              </li>
              @endforeach
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Dispõe os documentos</h4>
        <form action="{{route('demandas.st')}}" enctype="multipart/form-data" method="POST" class="dropzone" id="myAwesomeDropzone" style="padding: 60px">
            @csrf
            <input type="hidden" name="servico_id" value="{{$servico->id}}">
            <input type="hidden" name="reparticao_id" value="{{$reparticao->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div style="color:#606060" class="dz-message">
                <h5>Arraste os seus ficheiros nesta Caixa</h5>
                <p>(Ou clique nesta Caixa para o carregamento dos ficheiros)*.</p>
            </div>
        </form>
        <hr>

        <p id="response">
        </p>

        <form method="POST" id="form" action="{{route('dropzone')}}" enctype="multipart/form-data">
            @csrf
            <div>
            <input type="hidden" name="servico_id" value="{{$servico->id}}">
            <input type="hidden" name="reparticao_id" value="{{$reparticao->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              @foreach ($documentos as $documento)
             <br>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="ficheiro{{$documento->id}}" name="{{$documento->id}}">
                  <label class="custom-file-label" for="inputGroupFile01">Escolha um ficheiro</label>
                </div>
              </div>
              @endforeach

          </div>
        </form>
        <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address">
            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="save-info">
            <label class="custom-control-label" for="save-info">Save this information for next time</label>
          </div>
          <hr class="mb-4">

          <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" id="btnLogin" type="button">Enviar Documentos</button>
      </div>
    </div>
</div>


<script>
    var documentos = @json($documentos);
    var documentIDs = [];
    var isFormAlreadyInUse=false;

    documentos.forEach(function(item,index){
        documentIDs.push(item.id);
       $('#ficheiro'+item.id).change(function() {
       var ficheiro = this.files[0];
       var tamanho = ficheiro.size;
       alert(isFormAlreadyInUse);
       if(tamanho>=2097152){
           alert("não pode");
       }
       else{
           $('#myAwesomeDropzone').attr('style','display:none')
           if((tamanho.toFixed(0)/1024) > 1024){
               tamanho /= (1024*1024);
               tamanho = tamanho.toFixed(0);
               tamanho += "MB";
               $('#ficheiro'+item.id).attr('value','5');
            $('#nomeFicheiro').html()
            $('#tamanho'+item.id).html(tamanho);
           }
           else{
               tamanho /= 1024;
               tamanho = tamanho.toFixed(0);
               tamanho += "KB";
            $('#tamanho'+item.id).html(tamanho);
           }
       }
     });
    });

    var limit = documentos.length;
    var indexForAddedFile = 0;

    $(function() {
        var myDropzone = new Dropzone("#myAwesomeDropzone");
        myDropzone.on("error", function(file,errorMessage,errorHttpRequest) {

        });

        myDropzone.on("addedfile",function(file){
            $('#form').attr('style','display:none');
            if(indexForAddedFile==limit){
                myDropzone.removeFile(file);
                alert("Já foram dispostos todos os documentos");
            }
            else{
                file.previewElement.addEventListener("click", function() {
                    myDropzone.removeFile(file);
                    indexForAddedFile--;
                });
                var ficheiro = file;
                var tamanho = ficheiro.size;
                if((tamanho.toFixed(0)/1024) > 1024){
                    tamanho /= (1024*1024);
                    tamanho = tamanho.toFixed(0);
                    tamanho += "MB";
                    $('#ficheiro'+documentIDs[indexForAddedFile]).attr('value','5');
                    $('#tamanho'+documentIDs[indexForAddedFile]).html(tamanho);
                }
                else{
                    tamanho /= 1024;
                    tamanho = tamanho.toFixed(0);
                    tamanho += "KB";
                    $('#tamanho'+documentIDs[indexForAddedFile]).html(tamanho);
                }
                $('#nomeFicheiro'+documentIDs[indexForAddedFile]).html(ficheiro.name)
                ++indexForAddedFile;
            }
        });

        myDropzone.on("success", function(file,response) {
            window.location = "/home";
        });

        $("#btnLogin").click(function(){
            myDropzone.processQueue();
        });
    })

    var index=0;
    Dropzone.options.myAwesomeDropzone = {
      paramName:function(file){
          return documentIDs[index++];
      },
      autoProcessQueue: false,
      uploadMultiple:true,
      parallelUploads:limit,
      timeout:120000,
      acceptedFiles:'application/pdf',
      maxFiles:limit,
      maxFilesize: 2,
    }


    Dropzone.autoDiscover = false;


</script>
@endsection
