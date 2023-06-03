@include('_header')
@section('content')
<div class="container ">
        <div class="container mt-5">
            <h1 class="mb-4">Product Page</h1>

            <div class="row">
              @foreach ($products as $product)
                <div class="col-lg-4 mb-4">
                  <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="https://via.placeholder.com/300"  name="image">
                            <input type="hidden" value="1" name="quantity">
                      <h5 class="card-title">{{$product->name}}</h5>
                      <p class="card-text">{{$product->description}}</p>
                      <p class="card-text">Price: {{$product->price}}</p>
                      <button class="btn btn-primary text-white">Add To Cart</button>
                    </form>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>


          </div>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
