<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dependency Dropdown</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2>Laravel Dropdown using AJAX</h2>
                <form action="">
                    <div class="form-group mb-3">
                        <select class="form-select" id="country_dd">
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <select class="form-select" id="state_dd">
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <select class="form-select" id="city_dd">
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>

<script type="text/javascript">
$(document).ready(function() {
    $(document).on('change', '#country_dd', function() {
        // ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        // get the subcategory id from the form
        var country_dd = $(this).val()

        $('#state_dd').html('');

        $.ajax({
            type: "POST",
            url: "{{ url('api/fetch-state') }}"+ "/"+ country_dd,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#state_dd').html(data);
            },
            error: function(error)
            {
                console.log(error);
            }
        });
    });

    $(document).on('change', '#state_dd', function() {
        // ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        // get the subcategory id from the form
        var state_dd = $(this).val()

        $('#city_dd').html('');

        $.ajax({
            type: "POST",
            url: "{{ url('api/fetch-city') }}"+ "/"+ state_dd,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#city_dd').html(data);
            },
            error: function(error)
            {
                console.log(error);
            }
        });
    });
});
</script>

</body>

</html>

    {{-- <script type="text/javascript">
        // $(document).ready(function(){
        //     $(document).on('change', '#country_dd', function(){
        //         var idCountry = $(this).val();
        //         $('#state-dd').html('');

        //         $.ajax({
        //             type: "POST",
        //             url: "{{ url('api/fetch-state') }}",
        //             dataType: "json",
        //             data: {country_id: idCountry,_token: {{ 'csrf_token()' }}},
        //             success: function (response) {
        //                 $('#state-dd').html('<option value="">Select State</option>');
        //                 $.each(response.states, function (index, val) { 
        //                     $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>');

        //                 });

        //                 $('#city-dd').html('<option value="">Select State</option>');
        //             }
        //         });
        //     });

        //     $('#state-dd').change(function (event) { 
        //         var idState = this.value;
        //         $('#city-dd').html('');

        //         $.ajax({
        //             type: "POST",
        //             url: "{{ url('api/fetch-city') }}",
        //             dataType: "json",
        //             data: {state_id: idState,_token: {{ 'csrf_token()' }}},
        //             success: function (response) {
        //                 $('#city-dd').html('<option value="">Select State</option>');
        //                 $.each(response.states, function (index, val) { 
        //                     $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>');

        //                 });                    
        //             }
        //         });

        //     });
        // });


        //     $(document).ready(function(){
        //     $('#country-dd').on('change', function(){
        //         var countryID = $(this).val();
        //         if(countryID){
        //             $.ajax({
        //                 type:'POST',
        //                 url:'{{ url('api/fetch-state') }}',
        //                 data:'country_id='+countryID,
        //                 success:function(html){
        //                     $('#state-dd').html(html);
        //                     $('#city-dd').html('<option value="">Select state first</option>'); 
        //                 }
        //             }); 
        //         }else{
        //             $('#state-dd').html('<option value="">Select country first</option>');
        //             $('#city-dd').html('<option value="">Select state first</option>'); 
        //         }
        //     });

        //     $('#state-dd').on('change', function(){
        //         var stateID = $(this).val();
        //         if(stateID){
        //             $.ajax({
        //                 type:'POST',
        //                 url:'{{ url('api/fetch-city') }}',
        //                 data:'state_id='+stateID,
        //                 success:function(html){
        //                     $('#city-dd').html(html);
        //                 }
        //             }); 
        //         }else{
        //             $('#city-dd').html('<option value="">Select state first</option>'); 
        //         }
        //     });
        // });
    </script> --}}