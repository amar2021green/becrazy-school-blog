<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Fonts -->

      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <!-- Styles -->

      <style type="text/css">
      .haikei {
          position: relative;
          height: 100vh;
          min-height: 300px;
          background: url('/unnamed.jpg') no-repeat center center;
          background-size: cover;
      }
      </style>



      <title>BLOG - @yield('title')</title>

        <!-- オプションとして利用するJavaScript -->
          <!-- jQueryというライブラリが必ず最初, 次にPopper.js, 最後にBootstrap のJavaScriptを読み込むようにする -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </head>

    <body>

      <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-left">

    <a class="navbar-brand" href="/ordinary/list/"><b>WORLD BLOG</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/ordinary/category">All Category</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/ordinary/tag">All Tag</a>
          </li>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link active" data-class="fixed-left">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>


@yield("body")
    </body>
</html>
