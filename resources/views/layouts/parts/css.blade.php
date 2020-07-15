<!-- Font Awesome Icons -->
<link rel="stylesheet" href="/admin-style/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/admin-style/dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@livewireStyles
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='select2/dist/js/select2.min.js' type='text/javascript'></script>

<!-- CSS -->
<style>
    * {
        box-sizing: border-box;
    }

    /* #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    } */

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #myUL li a {
        border: 1px solid #ddd;
        margin-top: -1px;
        /* Prevent double borders */
        background-color: #f6f6f6;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: black;
        display: block;
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee;
    }
</style>
