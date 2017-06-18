<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 50%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
</head>

<body>
    <div id="map"></div>

    <form action="{{route('postGmap')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input type="text" name="address" class="form-control" placeholder="Enter Address">
            </div>
        </div>
    </div>
  </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>

    </form>


<script>

    // Hien thi Map
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(16.047079, 108.206230),
          zoom: 12
      });

    }

</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSWHunjUr5eE8TggMW2yUqqtCJcuCVsjE&callback=initMap">
</script>
</body>
</html>