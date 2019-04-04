@extends('layouts.app')

@section('content')


<!--
<div class="container jumbotron">
<label>Data(intervalo):</label>
	<form method="get" action="{{url('dashboard/interval')}}">
					 @csrf
		<div class="row">
			<div class="col-sm-6">
				<input type="date" class="form-control" name="date_one" required="required">
			</div>
			<div class="col-sm-6">
			<input type="date" class="form-control" name="date_two" required="required">
				</div>
			</div>
             <button class="btn btn-primary" style="margin-top: 5px">Cosultar</button>			
	</form>
-->

</div>

<div id="mapid" style="height: 400px;">
	
</div>

<script type="text/javascript">
    var mymap = L.map('mapid').setView([-8.08203,  -37.6494], 8);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiY2ljZXJvbGltYSIsImEiOiJjanUxN2V1dWoxeG51M3pwZjMybTY2cmU3In0.5ABbDwteHIFX7prqU0daOg'
}).addTo(mymap);

    var data = <?php echo json_encode($pluviometros); ?>;
    var info = <?php echo json_encode($array); ?>;

    var length= 0;
	for(var key in data) {
	    if(data.hasOwnProperty(key)){
	        length++;
	    }
	}
	
	for(i = 0; i < length; i++){
 	  var marker = L.marker([data[i].latitude, data[i].longitude]).addTo(mymap);
 	  marker.bindPopup("<b>Pluviometro</b>: " + data[i].pluviometroId + "</br><b>Acumulado Geral</b>: " + info[i] );
}
</script>


@endsection