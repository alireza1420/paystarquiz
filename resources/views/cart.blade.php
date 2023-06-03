@include('_header')

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <button class="mb-3 btn btn-success "><a href="{{url('/')}}" class="text-white"><i
                    class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></button>
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-lg-7">

                                <hr>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        @if($message=Session::get('sucess'))
                                        <div class="p-4 mb-3 bg-green-400 rounded">
                                            <h5 class="h5 alert alert-primary ">{{ $message }}</h5>
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                class="text-body">price <i
                                                    class="fas fa-angle-down mt-1"></i></a></p>
                                    </div>
                                </div>


                                @foreach ($cartItems as $item)
                                @csrf
                                <div class="card mt-2 mb-3 mb-lg-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <div>
                                                    <td class="hidden text-right md:table-cell">
                                                        <form action="{{ route('cart.remove') }}" method="POST">
                                                          @csrf
                                                          <input type="hidden" value="{{ $item->id }}" name="id">
                                                          <button class="btn btn-danger">x</button>
                                                      </form>

                                                      </td>
                                                </div>
                                                <div class="ml-3 ms-3">
                                                    <h5>{{$item->name}}</h5>
                                                    <p class="small mb-0">{{$item->description}}</p>
                                                </div>
                                            </div>
                                              <h5 class="">{{ $item->quantity }}</h5>
                                            <div class="d-flex flex-row align-items-center">
                                                <div>
                                                    <h5 class="mb-0">{{$item->price}} IR/RIAL</h5>
                                                </div>
                                                <a href="#!" style="color: #cecece;"><i
                                                        class="fas fa-trash-alt ms-2"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                @endforeach
                            </div>

                            <div class="col-lg-5">
                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Card details</h5>
                                            <i class="fa-thin fa-cart-shopping"></i>
                                        </div>

                                        <p class="small mb-2">Card type</p>
                                        <a href="#!" type="submit" class="text-white"><i
                                                class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i
                                                class="fab fa-cc-visa fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i
                                                class="fab fa-cc-amex fa-2x me-2"></i></a>
                                        <a href="#!" type="submit" class="text-white"><i
                                                class="fab fa-cc-paypal fa-2x"></i></a>

                                                <form class="form mt-4" action="{{route('cart.checkout')}}" method="POST">
                                                    @csrf
                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeName" class="form-control form-control-lg"
                                                    siez="17" placeholder="Cardholder's Name" />
                                                <label class="form-label" for="typeName">Cardholder's Name</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeText"
                                                    class="form-control form-control-lg" siez="17"
                                                    placeholder="1234 5678 9012 3457" minlength="16"
                                                    maxlength="19" />
                                                <label class="form-label" for="typeText">Card Number</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="typeExp"
                                                            class="form-control form-control-lg"
                                                            placeholder="MM/YYYY" size="7" id="exp"
                                                            minlength="4" maxlength="4" />
                                                        <label class="form-label" for="typeExp">Expiration</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="password" id="typeText"
                                                            class="form-control form-control-lg"
                                                            placeholder="&#9679;&#9679;&#9679;" size="1"
                                                            minlength="3" maxlength="3" />
                                                        <label class="form-label" for="typeText">Cvv</label>
                                                    </div>
                                                </div>
                                            </div>



                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Total</p>
                                            <p class="mb-2">${{Cart::getTotal()}}</p>
                                        </div>

                                                <input type="hidden" value="{{Cart::getTotal()}}" name="totalPrice">
                                        <button type="submit"
                                            class="btn btn-info btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span>${{Cart::getTotal()}}</span>
                                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>
                                            </form>
                                        <form action="{{ route('cart.clear') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger mt-3">Remove All Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
