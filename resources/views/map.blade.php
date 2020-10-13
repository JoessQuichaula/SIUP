@extends('layouts.app')

@section('content')

<style>
    #map{
        height: 400px;
        width: 100%;
        border: 1px solid red;
    }
</style>

<h1>My Google Map</h1>
<div id="map"></div>

<script>

    function initMap(){
        var options = {
            zoom:8,
            center:{lat:42.3601,lng:-71.0589}
        }
        var map = new google.maps.Map(document.getElementById('map'),options)
    }

</script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuZaH6b73Haz-wFmbDlIds4mn8pMqR-EI&callback=initMap" defer>
</script>
@endsection

