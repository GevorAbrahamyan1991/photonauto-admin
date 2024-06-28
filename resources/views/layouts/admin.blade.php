<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <script src="https://kit.fontawesome.com/7aab0ac403.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</head>

<body>
    <style>
        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
            background: rgba(0, 0, 0, 0.7) !important;

        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        th {
            color: #fff;
            text-align: center;
            border: 1px solid #fff;
        }

        td {
            border: 1px solid #fff;
            color: #f4f93d;
            text-align: center;
        }

        .del_btn {
            background: red !important;
            /*width: 90px !important;*/
            /*height: 30px !important;*/
            border: none !important;
            padding: 10px 5px !important;
            text-decoration: none !important;
            margin-left: 10px !important;
        }

        .edit_btn {
            background: #f4f93d !important;
            width: 110px !important;
            height: 42.5px !important;
            color: #000 !important;
            border: none !important;
            text-decoration: none !important;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 16px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f4f93d !important;
        }

        h3 {
            color: #f4f93d !important;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        #home_admin_section_phone_email {
            background-color: #1d2227;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            flex-direction: column;
            -webkit-box-align: center;
            -ms-flex-align: center;
            /*align-items: center;*/
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            /*justify-content: center;*/
            margin-top: 30px;
            padding-bottom: 30px;
        }

        #home_admin_section_phone_email form {
            text-align: center;
            padding: 30px;
        }

        #home_admin_section_phone_email label {
            display: block;
            letter-spacing: 4px;
            margin: 30px 0px;
            /* padding-top: 10px; */
            text-align: center;
        }

        #home_admin_section_phone_email label .label-text {
            color: #9B9B9B;
            cursor: text;
            font-size: 15px;
            line-height: 20px;
            text-transform: uppercase;
            -webkit-transform: translateY(-34px);
            transform: translateY(-64px);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        #home_admin_section_phone_email label input {
            background-color: transparent;
            border: 0;
            border-bottom: 2px solid #4A4A4A;
            color: white;
            font-size: 20px;
            letter-spacing: 1px;
            outline: 0;
            padding: 5px 20px;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            width: 200px;
        }

        #home_admin_section_phone_email label input:focus {
            max-width: 100%;
            width: 400px;
            border-bottom: 1px solid #f4f93d;
        }

        #home_admin_section_phone_email label input:focus+.label-text {
            color: #f4f93d;
            font-size: 13px;
            margin-top: 10px;
            /* -webkit-transform: translateY(-74px); */
            transform: translateY(-74px);
        }

        #home_admin_section_phone_email label input:valid+.label-text {
            font-size: 13px;
            -webkit-transform: translateY(-74px);
            transform: translateY(-74px);
        }

        #home_admin_section_phone_email button {
            background: transparent;
            color: #F0F0F0;
            border: 2px solid #F0F0F0;
            font-size: 15px;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            display: inline-block;
            margin: 15px 30px;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
            width: 150px;
            padding: 10px 0 !important;
            margin-bottom: 50px  !important;
        }

        #home_admin_section_phone_email button:hover,
        #home_admin_section_phone_email button:focus {
            background-color: transparent;
            color: #f4f93d;
            border: 1px solid #f4f93d;
        }

        .color_edit {
            color: #f4f93d;
            cursor: pointer;
        }

        #home_admin_section_carousel_images {
            background-color: #1d2227;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        #home_admin_section_carousel_images form {
            text-align: center;
            padding: 30px;
        }

        #home_admin_section_carousel_images label {
            display: block;
            letter-spacing: 4px;
            padding-top: 10px;
            text-align: center;
        }

        #home_admin_section_carousel_images label .label-text {
            color: #9B9B9B;
            cursor: text;
            font-size: 15px;
            line-height: 20px;
            text-transform: uppercase;
            -moz-transform: translateY(-34px);
            -ms-transform: translateY(-34px);
            -webkit-transform: translateY(-34px);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        #home_admin_section_carousel_images label input {
            background-color: transparent;
            border: 0;
            border-bottom: 2px solid #4A4A4A;
            color: white;
            font-size: 20px;
            letter-spacing: 1px;
            outline: 0;
            padding: 5px 20px;
            text-align: center;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            width: 200px;
        }

        #home_admin_section_carousel_images label input:focus {
            max-width: 100%;
            width: 400px;
            border-bottom: 1px solid #f4f93d;
        }

        #home_admin_section_carousel_images label input:focus+.label-text {
            color: #f4f93d;
            font-size: 13px;
            margin-top: 10px;
            -webkit-transform: translateY(-74px);
            transform: translateY(-74px);
        }

        #home_admin_section_carousel_images label input:valid+.label-text {
            font-size: 13px;
            -webkit-transform: translateY(-74px);
            transform: translateY(-74px);
        }

        #home_admin_section_carousel_images button {
            background: transparent;
            color: #F0F0F0;
            border: 2px solid #F0F0F0;
            font-size: 15px;
            letter-spacing: 2px;
            padding: 20px 75px;
            text-transform: uppercase;
            cursor: pointer;
            display: inline-block;
            margin: 15px 30px;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
        }

        #home_admin_section_carousel_images button:hover,
        #home_admin_section_carousel_images button:focus {
            background-color: transparent;
            color: #f4f93d;
            border: 1px solid #f4f93d;
        }

        i {
            color: #f4f93d;
        }

        .operations {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .operations a {
            height: fit-content;
        }

        form {
            padding: 0 !important;
        }

        button {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('admin.lamps.index') }}">Lamps</a>
        <a href="{{ route('admin.home.index') }}">HOME</a>
        <a href="{{ route('admin.about.index') }}">About</a>
        {{--    <a href="{{ route('admin.product.index') }}">Product</a> --}}
        {{-- <a href="{{ route('admin.brand.index') }}">Brand</a> --}}
        <a href="{{ route('admin.news.index') }}">News</a>
        {{-- <a href="{{ route('admin.PreNews.index') }}">PreNews</a> --}}
        <a href="{{ route('admin.partners.index') }}">Partners</a>
        {{--    @include('layouts.navigation') --}}
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
    </div>
    <button class="btn btn-dark" onclick="openNav()" id="dashboard_btn">
        <i class="fas fa-bars"></i> MENU
    </button>




    @yield('content')
    {{-- js --}}

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
