<!DOCTYPE html>
<html lang="en">

<head>
  

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.6.5/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.6.5/js/buttons.print.min.js"></script>

 
</head>

<body>

    @include('includes.topmenu')
    @include('includes.side_nav')

    <div class="content-body">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-1" id="filter_records_form">
                                <div class="col-lg-3 mb-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <span class="d-block font-14 text-muted mb-2">From Date</span>
                                            <input type="text" class="form-control" name="from" id="from"
                                                value="2023-11-28 ">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <span class="d-block font-14 text-muted mb-2">To Date</span>
                                            <input type="text" class="form-control" name="to" id="to"
                                                value=" 2023-11-28">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <button type="button" name="btn_filter_transactions"
                                                class=" mt-4 btn btn-sm btn-primary"
                                                onclick="filter_transactions();"> View Transactions </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="media">
                                        <div class="media-body">
                                            <button type="button" class="mt-4 btn btn-sm btn-success"
                                                onclick="exportToExcel('datatable')">Export to Excel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div> <span class="float-left">
                                        <h6 class='text-muted '> Transactions <small><span class="color5"
                                                    id="duration"></span></small></h6>
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
      
    @endforelse

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

    @include('includes.footer')

    <script>
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            dom: 'Bfrtip', 
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    });

    function exportTable() {
    var table = $('#datatable').DataTable();
    table.buttons.exportData({ modifier: { selected: true, search: 'applied' } });
    table.button('.buttons-excel').trigger(); 
}


function exportToExcel(tableId) {
    var table = document.getElementById(tableId);
    var html = table.outerHTML;

    var blob = new Blob([html], { type: 'application/vnd.ms-excel' });

    var a = document.createElement('a');
    a.href = window.URL.createObjectURL(blob);
    a.download = 'exported_table.xls';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

    function filter_transactions() {
        $('#master_loader').show();
        $("#records_table").html("");
        $("#duration").html("");
        $('#btn_filter_transactions').attr("disabled", true);


        $('#master_loader').hide();
        $('#btn_filter_transactions').attr("disabled", false);
    }
</script>
</body>

</html>
