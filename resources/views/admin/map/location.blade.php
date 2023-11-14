<!DOCTYPE html>
<html>

<head>
    <title>Get Location</title>
</head>

<body onload="getlocation();">
    <h1>Get Current Location</h1>
    <p class=""></p>
    <form class="myForm" method="POST" action="" autocomplete="off">
        @csrf
        
        <label for="latitude">Latitude:</label>
        <input type="text" name="latitude" id="latitude">
        <br>
        <label for="longitude">Longitude:</label>
        <input type="text" name="longitude" id="longitude">
        <br>
        <button type="submit">Submit</button>
    </form>

    {{-- <button onclick="getlocation()">Get Location</button> --}}

    <div class="container">
        <div>
            <div id="map" style="width: 100%; height: 300px"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    


    <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=YourAPI&callback=initMap" ></script>

    </section>

    <script  type="text/javascript">   

        const getlocation = () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported");
            }
        };

        const showPosition = (position) => {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;

            document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;

            // const des = document.querySelector("p");

            // des.innerHTML = `Latitude: ${lat} <br> Longitude: ${long}`;

            // console.log(lat, long);
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


    {{-- <script>
        let map, activeInfoWindow, markers = [];

        function initMap(latitude, longitude) {
            var coords = {lat:latitude , lng:longitude};
                map = new google.maps.Map(document.getElementById("map"), {
                    center: coords,
                    zoom: 15
                });

                map.addListener("click", function(event) {
                    mapClicked(event);
                });

                initMarkers();
            }

            /* --------------------------- Initialize Markers --------------------------- */
            function initMarkers() {
                const initialMarkers = <?php echo json_encode($initialMarkers); ?>;

                for (let index = 0; index < initialMarkers.length; index++) {

                    const markerData = initialMarkers[index];
                    const marker = new google.maps.Marker({
                        position: markerData.position,
                        label: markerData.label,
                        draggable: markerData.draggable,
                        map
                    });

                    markers.push(marker);

                    const infowindow = new google.maps.InfoWindow({
                        content: `<b>${markerData.position.lat}, ${markerData.position.lng}</b>`,
                    });
                    marker.addListener("click", (event) => {
                        if(activeInfoWindow) {
                            activeInfoWindow.close();
                        }
                        infowindow.open({
                            anchor: marker,
                            shouldFocus: false,
                            map
                        });
                        activeInfoWindow = infowindow;
                        markerClicked(marker, index);
                    });

                    marker.addListener("dragend", (event) => {
                        markerDragEnd(event, index);
                    });
                }
            }
    </script> --}}
</body>

</html>










// {{-- map code starts --}}

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
