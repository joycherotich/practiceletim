<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Payment</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

</head>
<body>

@include('includes.topmenu')
@include('includes.side_nav')

<div class="content-body">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Customers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Payment</li>
            </ol>
        </nav>

  

                        <div class="row">
                            <div>
                                <span class="float-left">
                                    <h6 class='text-muted '> Customer Payment <small><span class="color5" id="duration"></span></small></h6>
                                </span>
                            </div>

                            <div class="table-responsive recentOrderTable ">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Payment Date</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Phone</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Payment Reference</th>
                                            <th scope="col">Payment Plan</th>
                                            <!-- <th scope="col">Status</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="records_table">

                                   
                                        <!-- <tr>
                                            <th scope="col">2023-12-12</th>
                                            <th scope="col">2683495859</th>
                                            <th scope="col">2500.00</th>
                                            <th scope="col">DWYEUR</th>
                                            <th scope="col">Monthly</th>
                                            <!-- <th scope="col">Active</th>
                                        </tr> -->

                                    

    @forelse($customerPayments as $customerPayment)
        <tr>
            <td>{{ $customerPayment->paymentdate }}</td>
            <td>{{ $customerPayment->customername }}</td>
            <td>{{ $customerPayment->customerphone }}</td>
            <td>{{ $customerPayment->amount }}</td>
            <td>{{ $customerPayment->paymentreference }}</td>
            <td>{{ $customerPayment->paymentplan }}</td>
            <!-- <td>{{ $customerPayment->status }}</td> -->
        </tr>
    @empty
        <!-- <tr>
            <td colspan="6">No customer payments found.</td>
        </tr> -->
    @endforelse
    <!-- <tr>
        <td colspan="2"></td>
        <td id="totalAmount">Total Amount: </td>
        <td colspan="3"></td>
    </tr> -->
</tbody>

                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#datatable').DataTable();

        // Initialize totalAmount variable
        let totalAmount = 0;

    //     fetch('http://127.0.0.1:8000/api/customerpayment')
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log('Data:', data);

    //             console.log('Before appending to table');
    //             data.data.forEach(customerPayment => {
    //                 $('#records_table').append(`
    //                     <tr>
    //                         <td>${customerPayment.payment_date}</td>
    //                         <td>${customerPayment.customer_phone}</td>
    //                         <td>${customerPayment.amount}</td>
    //                         <td>${customerPayment.payment_reference}</td>
    //                         <td>${customerPayment.payment_plan}</td>
    //                         <td>${customerPayment.status}</td>
    //                     </tr>
    //                 `);
    //                 // Add the amount to the total
    //                 totalAmount += parseFloat(customerPayment.amount);
    //             });
    //             // Display the total amount
    //             $('#totalAmount').text(`Total Amount: $${totalAmount.toFixed(2)}`);
    //         })
    //         .catch(error => console.error('Error:', error));
    });
</script>
@include('includes.footer')
</body>
</html>

