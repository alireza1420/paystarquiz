<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Store</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">E-commerce Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('product')}}">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('cart')}}">Cart</a>
            </li>
            @if (Cookie::get('signup_completed')==false){

            <li class="nav-item">
              <a class="nav-link text-primary" href="{{ url('login')}}">login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="{{ url('signup')}}">Signup</a>
              </li>
            }@else{
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ url('logout')}}">Logout</a>
                  </li>
            }

            @endif
          </ul>
        </div>
      </nav>
    </header>
