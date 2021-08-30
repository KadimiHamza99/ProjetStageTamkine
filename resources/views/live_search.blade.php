@extends('layouts.admin')
@section('content')
        <title>Chercher Platform</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <div class="form-group">
            <input type="search" name="search" id="search" class="form-control" placeholder="Search Platforms ..." />
        </div>
        <h5 align="center" style="color: white">Total : <span id="total_records"></span></h5>
        <table class="table" style="color: white">
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>URL</th>
                    <th>RESPONSE CODE</th>
                    <th>LOGO</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
<script>
$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = ''){
        $.ajax({
            url:"{{ route('live_search.action') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data){
                $('tbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        })
    }

    $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
</script>
@endsection
