<form method="POST" action="{{route('demandas.st')}}" enctype="multipart/form-data">
    @csrf
    <input type="number" name="reparticao_id" id="" placeholder="reparticao_id"><br>
    <input type="number" name="servico_id" id="" placeholder="servico_id"><br>
    <input type="file" name="ficheiro1" name="5"id=""><br>
    <input type="file" name="ficheiro2" name="1" id=""><br>
    <button type="submit">Enviar</button>
</form>
