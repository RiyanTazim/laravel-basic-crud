@extends('admin.master')

@section('title')
    Location Edit
@endsection

@section('content')
    <section>

        <body style="background: #111515" class="text-white">
            <h1 class="text-center py-3 bg-#111515 text-light">Edit Location</h1>
            <h3 class="text-center text-success pt-4" id="success-msg" style="height: 40px">
                {{ Session()->get('notification') }}</h3>
            <form class="p-5" action="{{ route('map.update', $location->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 col-md-4">
                    <label class="form-label">
                        <h4>Address</h4>
                    </label>
                    <input class="form-control" type="text" name="locationName" id="location"
                        value="{{ $location->locationName }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">
                        <h4>Latitude</h4>
                    </label>
                    <input class="form-control" type="text" name="latitude" id="latitude"
                        value="{{ $location->latitude }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">
                        <h4>Longitude</h4>
                    </label>
                    <input class="form-control" type="text" name="longitude" id="longitude"
                        value="{{ $location->latitude }}">
                </div>
                <button type="submit" class="btn btn-outline-light">Update Location</button>
            </form>
        </body>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIAi68QlCKZCtrR9Z92f3bHmL1dPr906Q&libraries=places" ></script> --}}

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe5iTdx1K6da4_xhjOjxby6ZCkUVlRtbo&libraries=places&callback=initMap"
        async defer></script>

    {{-- <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
                d[l](f, ...n))
        })({
            key: "AIzaSyDBZYFFfyeW467TIU2Gry9RZWo3LUsZXjA",
            v: "weekly",
            // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
            // Add other bootstrap parameters as needed, using camel case.
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            var autocomplete;
            var to = 'location';
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(to)), {
                types: ['geocode'],
            });
        });
    </script>
@endsection
