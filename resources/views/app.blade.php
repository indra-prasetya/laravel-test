<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ Request::is('posts/show') ? $post->title : "indra.prasetya" }}</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ elixir('css/application.css') }}" rel="stylesheet">

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="{{ elixir('js/application.js') }}"></script>
    </head>
    <body>
        <nav class='navbar navbar-default navbar-custom navbar-fixed-top'>
            <div class='container-fluid'>
                <div class='navbar-header page-scroll'>
                    <button class='navbar-toggle' data-target='#bs-example-navbar-collapse-1' data-toggle='collapse' type='button'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <a class='navbar-brand' href='{{ url('/') }}'>indra.prasetya</a>
                </div>
                <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
                    <ul class='nav navbar-nav navbar-right'>
                        <li>
                            <a href='{{ url('/') }}'>Home</a>
                        </li>
                        <li>
                            <a href='{{ url('/life') }}'>Life</a>
                        </li>
                        <li>
                            <a href='{{ url('/code') }}'>Code</a>
                        </li>
                        <li>
                            <a href='{{ url('/about') }}'>About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class='intro-header' style='background-image: url({{ asset("/img/home-bg.jpg") }})'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                        <div class='site-heading post-heading'>
                            <h1>                                
                                {{ Request::is('posts/show') ? $post->title : "indra.prasetya" }}
                            </h1>
                            <hr class='small'>
                            <span class='subheading'>
                                {{ Request::is('posts/show') ? $post->description : "Yet another useless blog" }}
                            </span>
                            @if (Request::is('posts/show'))
                                <span class='meta'>
                                    Posted by <a href="https://plus.google.com/117790626314138048409?prsrc=5" target="_BLANK">Indra</a> on {{ $post->created_at }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section>
            @yield('content')
        </section>

        <footer>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                        <ul class='list-inline text-center'>
                            <li>
                                <a href='#'> <span class='fa-stack fa-lg'> <i class='fa fa-circle fa-stack-2x'></i> <i class='fa fa-twitter fa-stack-1x fa-inverse'></i> </span> </a>
                            </li>
                            <li>
                                <a href='#'> <span class='fa-stack fa-lg'> <i class='fa fa-circle fa-stack-2x'></i> <i class='fa fa-facebook fa-stack-1x fa-inverse'></i> </span> </a>
                            </li>
                            <li>
                                <a href='#'> <span class='fa-stack fa-lg'> <i class='fa fa-circle fa-stack-2x'></i> <i class='fa fa-github fa-stack-1x fa-inverse'></i> </span> </a>
                            </li>
                        </ul>
                        <p class='copyright text-muted'>
                            &lt;/&gt; with <em>Laravel</em> on <em>OpenShift</em>
                        </p>
                        @unless (Auth::guest())
                            <p class='text-center' style='font-size: 12px;'>
                                <a href="{{ url('/posts/create') }}">New Content</a>
                                <a href="{{ url('/auth/logout') }}">Logout</a>
                            </p>
                        @endunless
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
