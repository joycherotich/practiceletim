<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <li class="breadcrumb-item active" aria-current="page">Customers Details</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-1" id="filter_records_form">
                                <div class="col-lg-3 mb-2">
                                    <div class="media">
                                        <!-- Your filter form goes here -->
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div>
                                    <span class="float-left">
                                        <h6 class='text-muted '> Customer <small><span class="color5"
                                                    id="duration"></span></small></h6>
                                    </span>
                                </div>

                                <div class="table-responsive recentOrderTable">
                                    <table class="table table-striped" id="datatable">
                                        <!-- Table Headers -->
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col">DOB</th> -->
                                                <th scope="col">Full Names</th>
                                               
                                                <th scope="col">Customer Phone</th>
                                                <th scope="col">ID Number</th>
                                                <th scope="col">Policy Number</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="records_table">
                                            @forelse($customers as $customer)
                                            <tr>
                                                <!-- <td>DOB</td> -->
                                                <td>{{ $customer->fullnames }}</td>
                                              
                                                <td>{{ $customer->phone_number }}</td>
                                                <td>{{ $customer->id_number }}</td>

                                                <td>
                                                        @if($customer->policy_number != null)
                                                            {{ $customer->policy_number }}
                                                        @else
                                                            <button type="button" id="open-policy-form-btn" class="btn btn-success float-right add-policy-button"
                                                                    data-toggle="modal" data-target="#add_policy_modal"
                                                                    data-customer-id="{{ $customer->id }}">
                                                                <i class="mdi mdi-plus-circle"></i> Add Policy
                                                            </button>
                                                        @endif
                                                    </td>
    <!-- <button type="button" id="open-policy-form-btn" class="btn btn-success float-right add-policy-button"
        data-toggle="modal" data-target="#add_policy_modal"
        data-customer-id="{{ $customer->id }}">
        <i class="mdi mdi-plus-circle"></i> Add Policy
    </button> -->
<!-- </td> -->

<!-- Add Policy Modal -->
<div class="modal fade" tabindex="-1" id="add_policy_modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Policy</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="update_policy_form">
    @csrf
    <label for="policy_number">Policy Number:</label>
    <input type="text" id="policy_number" name="policy_number" required>
    <input type="hidden" name="customer_id" id="customer_id" value="">
    <button type="submit" class="btn btn-primary">Update Policy</button>
</form>
            </div>
        </div>
    </div>
</div>                     <td>
                                                <button type="button" class="btn btn-primary float-right view-button open-modal-btn"
                                                    data-toggle="modal" data-target="#view_next_of_kin_modal"
                                                    data-phone="{{ $customer->phone_number }}">
                                                    <i class="mdi mdi-plus-circle"></i> View Next of Kin
                                                </button>
                                                </td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal fade" tabindex="-1" id="view_next_of_kin_modal" role="dialog" aria-hidden="true">
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Next of Kin Details</h5>
                                                <button type="button" id= "view_next_of_kin_modal" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="view_next_of_kin_modal">
                                            
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script type="text/javascript" charset="utf8"
                src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

$(document).ready(function () {
    // Attach click event handler to the button
    $('#open-policy-form-btn').click(function () {
        // Retrieve the value of data-customer-id attribute
        var customerId = $(this).data('customer-id');

        // Log the data-customer-id
        console.log('Customer ID:', customerId);

        // Store the data-customer-id in the hidden input
        $('#customer_id').val(customerId);

        // Optionally, you can perform other actions with the customer ID
    });
});




    $(document).ready(function () {
    // Attach click event handler to the button
    $(".open-modal-btn").on("click", function () {
    var phone = $(this).data('phone');
    console.log("This is the phone:::", phone);

    $.ajax({
        url: '{{ route("customernexofkinphone") }}',
        type: 'POST',
        data: { phone: phone, _token: '{{ csrf_token() }}' },
        dataType: 'json',
        success: function (data) {
            var modalBody = $('#view_next_of_kin_modal .modal-body');
            modalBody.empty();
            console.log(data);

            modalBody.append('<p>' +
                        'Full Names: ' + data.fullnames + '<br>' +
                        'ID Number: ' + data.idnumber + '<br>' +
                        'Phone: ' + data.phone + '<br>' +
                        'Relationship: ' + data.relationship +
                        '</p>');

            // if (data.length > 0) {
            //     $.each(data, function (index, item) {
            //         modalBody.append('<p>' +
            //             'Full Names: ' + item.fullnames + '<br>' +
            //             'ID Number: ' + item.idnumber + '<br>' +
            //             'Phone: ' + item.phone + '<br>' +
            //             'Relationship: ' + item.relationship +
            //             '</p>');
            //     });

            //     $('#view_next_of_kin_modal').modal('show');
            // } else {
            //     console.log('No data found.');
            // }
        },
        error: function (error) {
            console.log('Error:', error);
        },
    });
});

$('#view_next_of_kin_modal').on('hidden.bs.modal', function () {
                // Refresh the page on modal close
                location.reload();
            });

});

    //--------------policy//
    $(document).ready(function () {
    // Submit the update policy form
  // Inside the submit handler
$('#update_policy_form').submit(function (event) {
    event.preventDefault();

    // Extract form data
    var formData = {
        policy_number: $('#policy_number').val(),
        customer_id: $('#customer_id').val()
    };

    console.log('Form Data:', formData);

    // Perform an Ajax request to update the policy
    $.ajax({
        url: '/customer/update-policy',
     
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function (data) {
            // Handle success
            console.log('Policy updated successfully:', data);

            // Optionally, you can update the UI or close the modal
            // ...

            // Close the modal
            $('#update_policy_modal').modal('hide');
        },
        error: function (error) {
            // Handle errors
            console.log('Error:', error);

            // Optionally, you can display an error message to the user
            // ...
        }
    });
});
    });





</script>




@include('includes.footer')

           

</body>

</html>