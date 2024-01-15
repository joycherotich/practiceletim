<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © INSTACASH <?php echo date("Y") ?> . Powered by <a href="">Pesatel</a></p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->



</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="{{ asset('libs/global/global.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/deznav-init.js') }}"></script>
<script src="{{ asset('libs/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('js/imports.js') }}"></script>

<script>
    $(document).ready(function() {

        var options = {
            format: 'YYYY-MM-DD',
            todayHighlight: false,
            autoclose: true,
            pickTime: false,
        };

        var options2 = {
            autoclose: true,
            pickDate: false,
            pickTime: true,
        };

        $('input[name="from"]').datetimepicker(options);
        $('input[name="to"]').datetimepicker(options);
        $('input[id="from"]').datetimepicker(options);
        $('input[id="to"]').datetimepicker(options);

        $('input[id="time"]').datetimepicker(options2);

    });


    //izitoast notifier
    function show_message(msg = " ", type = "1", l = "topRight") {

        $('#loading').hide();

        var title = "";
        var titleColor = "";

        if (type == 1) {
            //success
            title = '<b> <i class="flaticon-381-success-2"></i> </b>';
            titleColor = "green";

        } else if (type == 2) { // warning

            title = '<b>  <i class="flaticon-381-warning-1"></i> </b> ';
            titleColor = "#f2b305";

        } else if (type == 3) {
            title = '<b> <i class="flaticon-381-error"></i> </b>';
            titleColor = "red";
        } else {

        }

        iziToast.show({
            id: null,
            class: '',
            title: title,
            titleColor: titleColor,
            titleSize: '20',
            titleLineHeight: '',
            message: msg,
            messageColor: 'grey',
            messageSize: '15',
            messageLineHeight: '',
            backgroundColor: 'white',
            theme: 'light', // dark
            color: '', // blue, red, green, yellow
            icon: '',
            iconText: '',
            iconColor: '',
            image: '',
            imageWidth: 50,
            maxWidth: null,
            zindex: 9999,
            layout: 1,
            balloon: false,
            close: true,
            closeOnEscape: true,
            rtl: false,
            position: l, // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
            target: '',
            targetFirst: true,
            toastOnce: false,
            timeout: 10000,
            animateInside: true,
            drag: true,
            pauseOnHover: true,
            resetOnHover: false,
            progressBar: true,
            progressBarColor: titleColor,
            progressBarEasing: 'linear',
            overlay: false,
            overlayClose: true,
            overlayColor: 'white',
            transitionIn: 'bounceInLeft',
            transitionOut: 'flipOutX',
            transitionInMobile: 'fadeInUp',
            transitionOutMobile: 'fadeOutDown',
            buttons: {},
            inputs: {},
            onOpening: function() {},
            onOpened: function() {},
            onClosing: function() {},
            onClosed: function() {}
        });

    }




    var base_val = 100;
    var currency = "E";


    function to_cash(cash) {
        var f = numeral(cash).format('0,0.00');
        return f;
    }

    function format_boolean_outputs(output) {

        if (output == true || output == 'yes' || output == 1 || output == "true" || output == "1" || output == 200) {
            return '<span class="success"><b> Yes </b></span>';
        } else {
            return '<span class="error"> <b>No</b> </span>';
        }
    }


    function format_date(mydate) {
        return moment(mydate).format('DD-MMM-YYYY');
    }

    function format_datetime(mydate) {
        return moment(mydate).format('DD-MMM-YYYY hh:mm a');
    }

    function format_time(mydate) {
        return moment(mydate).format('hh:mm a');
    }


    function show_datatable(table = "datatable") {

        if ($.fn.dataTable.isDataTable('#' + table)) {
            $('#' + table).DataTable().ajax.reload();
        } else {
            t = $('#' + table).DataTable({
                searching: true,
                "order": []
            });

        }
    }

    function refresh_datatable(table = "datatable") {

        if ($.fn.dataTable.isDataTable('#' + table)) {
            $('#' + table).DataTable().destroy();
        } else {}
    }


    function GetDsbById(searchKey) {

        var mydata = JSON.parse(localStorage.getItem("dsb_records"));
        searchKey = parseInt(searchKey);

        var selectedData = mydata[mydata.map(function(item) {
            return item.internal_id;
        }).indexOf(searchKey)];

        if (selectedData) {
            return selectedData;
        }
        return "";
    } //close fxn


    function matchOutletType(searchKey) {

        var mydata = JSON.parse(localStorage.getItem("outlet_types"));
        searchKey = parseInt(searchKey);
        var selectedData = mydata[mydata.map(function(item) {
            return item.outlet_type_id;
        }).indexOf(searchKey)];
        if (selectedData) {
            return selectedData;
        }
        return "";
    }

</script>

</body>

</html>