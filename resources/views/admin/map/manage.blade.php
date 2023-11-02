@extends('admin.master')

@section('title')
    Location
@endsection

@section('content')
    <section class="w-100">
        <h1 class="text-center py-3 m-0 bg-secondary text-light w-100" >Manage Products</h1>
        <h3 class="text-center text-success pt-4" id="success-msg" style="height: 60px">{{ Session()->get('notification') }}</h3>
        <table class="table table-striped text-center border-2 text-bold">
            <thead class="bg-dark text-light">
                <th>#</th>
                <th>Id</th>
                <th>Location Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Action</th>
            </thead>

            @foreach ($locations as $location)
            <tr onclick="showMap({{$location->latitude}}, {{$location->longitude}})">

                <td>{{ $loop->iteration }}</td>
                <td>{{$location->id}}</td>
                <td>{{$location->locationName}}</td>
                <td>{{$location->latitude}}</td>
                <td>{{$location->longitude}}</td>
                <td class="float-left">
                    <a href="{{route('map.edit', $location->id)}}" type="button" class="btn btn-success m-2">Edit</a>
                    <a href="{{route('map.delete', $location->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</a>
                </td>
            </tr>
                
            @endforeach
        </table>
        
            <!-- Google MAP HTML -->

    <div class="container">
        <div>
            <div id="map" style="width: 100%; height: 300px"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    


    <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=AIzaSyDBZYFFfyeW467TIU2Gry9RZWo3LUsZXjA&callback=initMap" ></script>

</section>


@endsection

{{-- map code starts --}}

<script>
    function showMap(latitude,longitude )
    {
        var coord = {lat:latitude , lng:longitude};

        var map = new google.maps.Map(document.getElementById('map'), {
                center: coord,
                zoom: 12
            });

        new google.maps.Marker({
            position: coord,
            map: map
        });
            
    }

    showMap(0,0);
</script>

{{-- <script>
    $(document).ready(function() {
        $('#shareLocation').click(function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((showPosition) => {
                    const lat = showPosition.coords.latitude;
                    const lng = showPosition.coords.longitude;

                    if (!isNaN(lat) && !isNaN(lng)) {
                        const latlng = {
                            lat: parseFloat(lat),
                            lng: parseFloat(lng)
                        };

                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 15,
                            center: latlng,
                        });

                        new google.maps.Marker({
                            position: latlng,
                            map,
                        });
                    } else {
                        alert('Invalid latitude and longitude values.');
                    }
                }, (error) => {
                    alert('Geolocation error: ' + error.message);
                });
            } else {
                alert('Geolocation is not supported by this browser');
            }
            $(this).hide();
        });
    });
</script> --}}