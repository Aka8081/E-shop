<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=K2D:wght@200&family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <style type="text/css">

        <link rel="stylesheet" type="text/css" href="assets/styles/styles.css" />

        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>
        <style>
            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }
        #sidebar-wrapper .list-group {
        width: 250px;
        }
        #page-content-wrapper {
        min-width: 100vw;
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 100px;
        }
        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: -100px;
        }
        #page-content-wrapper {
            min-width: 14PX;
            width: 100%;
        }
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
            .slide-right {
            width: 100%;
            overflow: hidden;
            margin-left: 400px;
            max-width: 500px
            }

            .slide-right h2 {
            animation: 2s slide-right;
            animation-delay: 2s;
            }

            @keyframes slide-right {
            from {
                margin-left: -500px;
            }

            to {
                margin-left: 0%;
            }
        }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading"> </div>
                <div class="list-group list-group-flush">
                    <form action="/checkbox-example" method="POST">
                        @csrf

                        <input type="text" name="name"/><br/><br/>
                        <h4>category</h4>
                        <input type="checkbox"  value="cord">  cord<br/>
                        <input type="checkbox"  value="CORDLESS"> CORDLESS <br/>
                        <input type="checkbox"  value="Driver"> Driver <br/>
                        <input type="checkbox"  alue="CUTTING"> CUTTING <br/>
                        <br/>

                        <dt class="even">By Price</dt>






            </form>


        </div>
        </div>
