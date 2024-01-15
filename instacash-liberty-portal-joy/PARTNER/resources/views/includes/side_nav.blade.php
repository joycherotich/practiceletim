
<head>
  @include('includes.master')

</head>


<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ URL::to('/dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-home-2"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-briefcase"></i>
                    <span class="nav-text">Customers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('/customers_statement') }}">Customer Details </a></li> 
                    <li><a href="{{ URL::to('/customer_payment') }}">Customer Payment </a></li>  
                </ul>
            </li>


            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-menu-2"></i>
                    <span class="nav-text">Reports</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('/biller_statement') }}">Transactions Reports </a></li> 
                    <li><a href="{{ URL::to('/biller_account') }}">Customer Reports</a></li>             
                </ul>
</li>


            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-view-2"></i>
                    <span class="nav-text">Administration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('/profile') }}">Profile </a></li>
                    <li><a href="{{ URL::to('/tariffs') }}">Payment Plan </a></li>             
                  
                </ul> 
            </li>
           
        </ul>


    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->