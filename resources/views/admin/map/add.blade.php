@extends('admin.master')

@section('title')
    Location
@endsection

@section('content')
    <section>

        <body onload="getlocation();" style="background: #111515">
            <div class="container mt-4 text-white">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <h2>MAP Location Autocomplete</h2>
                        <form class="myForm" method="POST" action="{{ route('map.store') }}" autocomplete="off">
                            @csrf   
                            
                            <div class="mb-3">
                                <label class="form-label">
                                    <h4>Latitude</h4>
                                </label>
                                <input class="form-control" type="text" name="latitude" id="latitude">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    <h4>Longitude</h4>
                                </label>
                                <input class="form-control" type="text" name="longitude" id="longitude">
                            </div>
                            <button type="submit" class="btn btn-outline-light">Add Location</button>
                        </form>
                    </div>
                </div>
            </div>                
        </body>

    </section>
@endsection


<script >   

    const getlocation = () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported");
        }
    };

    const showPosition = (position) => {
        // let lat = position.coords.latitude;
        // let long = position.coords.longitude;

        document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;

        // const des = document.querySelector("p");

        // des.innerHTML = `Latitude: ${lat} <br> Longitude: ${long}`;

        console.log(lat, long);
    };

    const showError = (error) => {
        // console.log(error);
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for GeoLocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location info not available.");
                break;
            case error.TIMEOUT:
                alert("Request for user location has been timed out.");
                break;
            case error.UNKNOWN:
                alert("Unknown error occured.");
                break;
                default:
                    alert("Unknown error occured.");
                
        };
    };
</script>

<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
</script>
