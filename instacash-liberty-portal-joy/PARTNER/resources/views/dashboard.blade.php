<!-- @include('includes.topmenu') -->
@include('includes.side_nav')

<!--**********************************
            Content body start
***********************************-->
<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Account Balance Card -->
            <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 col-md-4">
                <div class="card gradient-bx text-white bg-color2 rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="mb-1">Account Balance</p>
                                <div class="center d-flex flex-wrap">
                                    <h2 class="fs-20 font-w300 text-white mb-0 mr-3" id="agent_dsb_acc_bal">{{ $accountBalance }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Number of Customers Card -->
            <div class="col-xl-2 col-xxl-4 col-lg-2 col-sm-4 col-md-4">
                <div class="card gradient-bx text-white bg-color2 rounded">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <p class="mb-1">Number of Customers</p>
                                <div class="center d-flex flex-wrap">
                                    <h2 class="fs-20 font-w300 text-white mb-0 mr-3" id="customer_count">{{ $customerCount }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Customer Payments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive recentOrderTable">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Payment Date</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Customer Phone</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment Reference</th>
                                        <th scope="col">Payment Plan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($customerPayments as $customerPayment)
    <tr>
        <td>{{ $customerPayment->paymentdate }}</td>
        <td>{{ $customerPayment->customername }}</td>
        <td>{{ $customerPayment->customerphone }}</td>
        <td>{{ $customerPayment->amount }}</td>
        <td>{{ $customerPayment->paymentreference }}</td>
        <td>{{ $customerPayment->paymentplan }}</td>
    </tr>
@empty
    <tr>
        <td colspan="5">No recent customer payments found.</td>
    </tr>
@endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Content body end -->

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>




@include('includes.footer')
