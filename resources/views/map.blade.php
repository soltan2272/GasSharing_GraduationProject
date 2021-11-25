@extends('layout')
@section('content')

 <style>
  /* Set the size of the div element that contains the map */
  #map {
   height: 400px;  /* The height is 400 pixels */
   width: 100%;
      height:700px; /* The width is the width of the web page */
  }
  #mapCanvas {
  width: 775px;
  height: 500px;
  margin: 0 auto;
}
#mapLegend {
  background: #fdfdfd;
  color: #3c4750;
  padding: 0 10px 0 10px;
  margin: 10px;
  font-weight: bold;
  filter: alpha(opacity=80);
  opacity: 0.8;
  border: 2px solid #000;
}
#mapLegend div {
  height: 40px;
  line-height: 25px;
  font-size: 1.2em;
}
#mapLegend div img {
  float: left;
  margin-right: 10px;
}
#mapLegend h2 {
  text-align: center
}
 </style>
<!--The div element for the map -->
<div id="map"></div>
<div id="mapLegend">
    <h3> الرحلات</h3>
  </div>



<script type="text/javascript">


    function initMap() {

        // The location of Uluru
        var uluru = {lat: 27.377788, lng: 31.098221};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 7, center: uluru});
        // The marker, positioned at Uluru
    //    var marker = new google.maps.Marker({position: uluru, map: map});

        var locations = [
<?php
        for ($i=0;$i<count($locations);$i++)
            {
                $j=0;
            ?>

['{{$locations[$i][$j]->address}}', {{$locations[$i][$j]->lat}}, {{$locations[$i][$j]->lang}}
],
        // ['Coogee Beach', 27.1955446, 31.1756373],
        // ['Cronulla Beach', 27.2053315, 31.1945828],
        // ['Manly Beach', 27.2027018, 31.1952399],

            <?php $j++; } ?> ];

        var ddid = [
                <?php
                    $j=0;
                for ($i=0;$i<count($locations);$i++)
                {
                    $j=1;
                ?>

            [ {{$locations[$i][$j]}} ],
            // ['Coogee Beach', 27.1955446, 31.1756373],
            // ['Cronulla Beach', 27.2053315, 31.1945828],
            // ['Manly Beach', 27.2027018, 31.1952399],

            <?php } ?> ];



        var infowindow = new google.maps.InfoWindow();

        var i=0;
        var t=0;


         var marker=[];
         var arr1=[];
         var arr2=[];
         var arr3=[];

        var k=0;
        @forEach($locations as $loc)

            marker[i] = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1] + t / 1500, locations[i][2] + t),
                map: map,
                icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
                url:'http://127.0.0.1:8000/showpost/'+ddid[i],

            });

            google.maps.event.addListener(marker[i], 'click', function () {
                window.open(this.url, "_blank"); //changed from markers[i] to this
            });

            i+=1;
            k+=1;
        t+=0.0185;
                @endforeach


        var legend = document.getElementById('mapLegend');
div= document.createElement('div');
div.innerHTML = '<span><img src="http://maps.google.com/mapfiles/ms/icons/green-dot.png"> الرحلات </span>';
legend.appendChild(div);
/* Push Legend to Right Top */
map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);
        
       
    }
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtxTjUI11VOLaFVnOVYd5cYW3o0e0_cxQ&callback=initMap">
</script>
</body>
@foreach($home as $h)
  @endforeach
@endsection