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
                <li class="breadcrumb-item"><a href="#">Reports</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Reports</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-1" id="filter_records_form">
                            <div class="col-lg-3 mb-2">
                                <div class="media">
                                </div>
                            </div>
                        </div>
                        

                        <hr>
                        <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mt-1" id="filter_records_form">

                                        <div class="col-lg-3 mb-2">
                                            <div class="media">
                                                <div class="media-body">
                                                    <span class="d-block  font-14 text-muted mb-2">From Date</span>
                                                    <input type="text" class="form-control " name="from" id="from" value="2023-11-28 ">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 mb-2">
                                            <div class="media">

                                                <div class="media-body">
                                                    <span class="d-block  font-14 text-muted mb-2">To Date</span>
                                                    <input type="text" class="form-control " name="to" id="to" value=" 2023-11-28">
                                                </div>
                                            </div>
                                        </div>
<!-- 
                                        <div class="col-lg-3 mb-2">
                                            <div class="media">
                                                <div class="media-body">
                                                    <button type="button" class=" mt-4 btn btn-sm btn-primary" onclick="filter_transactions();"> View Transactions </button>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-3 mb-2">
                                            <div class="media">
                                                <div class="media-body">
                                                    <button type="button" class="mt-4 btn btn-sm btn-success" onclick="exportToExcel('datatable')">Export to Excel</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div>
                                            <span class="float-left">
                                                <h6 class='text-muted '> Customer Details <small><span class="color5" id="duration"></span></small></h6>
                                            </span>
                                        </div>

                                        <div class="table-responsive recentOrderTable">
                                        <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                           
                                            <th scope="col">fullnames</th>
                                            <th scope="col">customerphone</th>
                                            <th scope="col">idnumber</th>
                                            <th scope="col">Policy Number</th>
                                            <!-- <th scope="col">Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="records_table">
                                  
									  @forelse($billers as $biller)
											<tr>
												
												<td>{{ $biller->fullnames }}</td>
											
												<td>{{ $biller->phone_number	 }}</td>
												<td>{{ $biller->id_number	 }}</td>
                                                <td>
                                                        @if($biller->policy_number != null)
                                                            {{ $biller->policy_number }}
                                                        @else
                                                            <button type="button" id="open-policy-form-btn" class="btn btn-success float-right add-policy-button"
                                                                    data-toggle="modal" data-target="#add_policy_modal"
                                                                    data-customer-id="{{ $customer->id }}">
                                                                <i class="mdi mdi-plus-circle"></i> Add Policy
                                                            </button>
                                                        @endif
                                                    </td>
                                             
                                                    <!-- <td>
                                                <button type="button" id="open-modal-btn" class="btn btn-primary float-right view-button"
    data-toggle="modal" data-target="#view_next_of_kin_modal"
    data-phone="{{ $biller->phone }}">
    <i class="mdi mdi-plus-circle"></i> View Next of Kin
</button> -->
                                                </td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="modal fade" tabindex="-1" id="view_next_of_kin_modal" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Next of Kin Details</h5>
                                                <button type="button" id= "view_next_of_kin_modal class="close" data-dismiss="modal">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/buttons/2.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.6.5/js/buttons.print.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
    function exportToExcel(tableId) {
        var table = document.getElementById(tableId);

        // Fetch next of kin details
        $.ajax({
            url: '{{ route("customernextofkin") }}',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.length > 0) {
                    // Create a new HTML element to hold the next of kin details
                    var nextOfKinDetailsContainer = document.createElement('div');

                    // Append next of kin details to the container
                    $.each(data, function (index, item) {
                        var nextOfKinDetails = document.createElement('p');
                        nextOfKinDetails.innerHTML =
                            'Full Names: ' + item.fullnames + '<br>' +
                            'ID Number: ' + item.idnumber + '<br>' +
                            'Phone: ' + item.phone + '<br>' +
                            'Relationship: ' + item.relationship;

                        nextOfKinDetailsContainer.appendChild(nextOfKinDetails);
                    });

                    // Append the container to the table row
                    var tableRow = table.insertRow(-1);
                    var tableCell = tableRow.insertCell(0);
                    tableCell.colSpan = table.rows[0].cells.length; // Span across all columns
                    tableCell.appendChild(nextOfKinDetailsContainer);
                }

                // Create Blob and download
                var html = table.outerHTML;
                var blob = new Blob([html], { type: 'application/vnd.ms-excel' });

                var a = document.createElement('a');
                a.href = window.URL.createObjectURL(blob);
                a.download = 'customer_details.xls';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                // Remove the appended row with next of kin details
                if (data.length > 0) {
                    table.deleteRow(-1);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }

    // Other parts of your script...
</script>


@include('includes.footer')
</body>
</html>
