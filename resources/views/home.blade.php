@include('_header')
<!DOCTYPE html>
<html lang="en">


<main>
    <div class="container py-4">
      <header class="pb-3 mb-4 border-bottom">
        @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
      </header>

      <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Alireza Faghihi Moghadam paystar test !</h1>
          <p class="col-md-8 fs-4">Add products to your cart but first remember to signup !</p>
          <a href="{{url('/product')}}"><button class="btn btn-primary btn-lg" type="button">Chckout our products !</button></a>
        </div>
      </div>

      <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <div class="h-100 p-5 text-bg-dark rounded-3">
            <h2>Change the background</h2>
            <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
            <button class="btn btn-outline-light" type="button">Example button</button>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-body-tertiary border rounded-3">
            <h2>My online CV</h2>
            <p>Checkout what other skills I have.</p>
            <a href="https://drive.google.com/file/d/1IP3PwYJmNAKBTXxv5sglN9Q4vr65107F/view?usp=sharing"><button class="btn btn-outline-secondary" type="button">Example button</button><a>
          </div>
        </div>
      </div>

      <footer class="pt-3 mt-4 text-body-secondary border-top">
        &copy; 2023
      </footer>
    </div>
  </main>



  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
