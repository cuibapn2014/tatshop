@extends('layout.layout_master')
@section('script')
<script>
// $(document).ready(() => {
//     $.get('api/products', (item) => {
//         item.forEach((val) => {
//             $('#item').append(
//                 "<div class='col-lg-4 col-md-6 m-1 col-sm-6 card card-item float-left'><img src='" +
//                 val.thumbnail +
//                 "' width='100%' height='100%' style='object-fit:cover'></div>");
//         });
//     });
// });
</script>
<script>
// $(document).ready(() => {
//     fetch('https://tatshop.store/api/products').then(res => res.json()).then(data => console.log(data));
//     $.get('https://provinces.open-api.vn/api/?depth=3', (item) => {
//         item.forEach((val) => {
//             $('#ar').append('<option>' + val.name + '</option>');
//         });
//     });
// });
</script>
<script>
$(document).ready(() => {
    // $.get('/api-film/film/tt0367594', (data) => {
    //     var film = JSON.parse(data);
    //     console.log(film);
    //     $('#film').append("<div class='col-7 float-left'><img src='" + film.poster +
    //         "'/><p class='card-title'>" + film.title + "</p></div>");
    //     $('#film').append("<div class='col-7 float-left'><iframe src='" + film.trailer.link +
    //         "' frameborder='0'></iframe></div>");
    // });

    $.ajax({
        url : "https://api.apify.com/v2/key-value-stores/QubTry45OOCkTyohU/records/LATEST?fbclid=IwAR03qu2SV7JbeID8tYsq2E4uiIBlFAviZg3C4Ud2QbmNN7osDJ1GEeoxLGU",
        type : "GET",   
        suscess : (data) => { 
            const res = data.phim.phimbo;
            res.forEach((item, key) => {
                if(key >= 10) return false;
                $("#ten").append("<img src='" + item.imageUrl + "'/>");
                $("#ten").append("<p>" + item.title + "</p>");                   
            });
        },
        error:  (stt) => {
                console.log(stt);
            }
        });

});
</script>
@endsection
@section('content')

<!-- <div class="container-fluid pt-5">

    <div id="item">
    </div>
    <div id="address">
        <select name="address" id="ar">
        </select>
    </div>
    <div id="film"></div>
</div> -->

<div id="ten">
    <a href="{{route('login.facebook')}}" class="btn btn-primary" target="_blank">Sign in with Facebook</a>
</div>
<?php
    $mac = exec('getmac');

    $mac = strtok($mac, ' ');
    echo $mac;
?>
@endsection