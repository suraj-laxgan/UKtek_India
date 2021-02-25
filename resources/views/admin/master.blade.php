<?php
$currenttime = time();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="robots" content="all,follow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('login_css/css/admin.css?v='.$currenttime) }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('login_css/css/main.css') }}">
         <!--summernote-->
        <script src="{{ asset('login_user/jquery.min.js') }}"></script>
    </head>
    <body>
        @section('header')
            <!-- This is the master sidebar. -->
        <div class='head'>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr height="20px">
                    <td align="right">
                        <a href="{{ url('admin_home') }}" style="text-decoration: none"
                            class="green_button_new">Dashboard</a>
                        <a href="{{ route('admin.logout') }}" style="text-decoration: none" class="red_button_new"
                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">Logout
                            &nbsp;</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </td>
                </tr>
                
            </table>
               
        </div>
        <div class="hrs"></div>   
        @show
        
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>