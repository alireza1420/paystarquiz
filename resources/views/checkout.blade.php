@include('_header')
<!-- resources/views/response.blade.php -->

<section>
    <div class="container mt-5">
        <h1 class="mb-4 h1">Transaction Response</h1>

        <div class="card">
            <div class="card-body">
                <p class="card-text">Status: {{ $response['status'] }}</p>
                <p class="card-text">Message: {{ $response['message'] }}</p>
                <p class="card-text">Transaction ID: {{ $response['transaction_id'] }}</p>
                <p class="card-text">Amount: {{ $response['amount'] }}</p>
                <!-- Display additional response data as needed -->

                @if ($response['status'] === 'success')
                    <p class="card-text text-success">Payment was successful. Thank you!</p>
                @else
                    <p class="card-text text-danger">Payment failed. Please try again.</p>
                @endif
            </div>
        </div>
    </div>

</section>
