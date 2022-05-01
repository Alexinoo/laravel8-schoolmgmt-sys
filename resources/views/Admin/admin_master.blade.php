<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>SMS Admin </title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css')}}">

  {{-- Toastr -css --}}
	<link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css')}}">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

    @include('Admin.inc.header')

    @include('Admin.inc.sidebar')    
    
        @yield('content')
    
    @include('Admin.inc.footer')    
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>

  {{-- Jquery CDN --}}
    <script src="{{ asset('backend/js/jquery-3.6.0.min.js') }}"></script>


    {{-- Datatables --}}
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{asset('backend/js/pages/data-table.js')}}"></script>

  {{-- Toastr --}}
  <script src="{{ asset('backend/js/toastr.min.js') }}"></script>

  {{--Old Sweet Alert --}}
  {{-- <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script> --}}

  {{-- Sweet Alert 2 -Custom--}}
  <script src="{{ asset('backend/js/sweetalert2.all.min.js') }}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/js/template.js') }}"></script>
	<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>

 {{-- Toast in action--}}
     <script>
       @if(Session::has('message'))
       let type = "{{ Session::get('alert-type' , 'info')}}"
       switch (type) {
         case 'info':
           toastr.info("{{ Session::get('message')}}");
           break;
         case 'success':
           toastr.success("{{ Session::get('message')}}");
           break;
         case 'warning':
           toastr.warning("{{ Session::get('message')}}");
           break;
         case 'error':
           toastr.error("{{ Session::get('message')}}");
           break;              
       }
       @endif
     </script>


{{-- Sweet Alert - Delete --}}
<script type="text/javascript">
$(function() {
  $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
            title: 'Are you sure?',
            text: "Delete this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
      })

  })
  
})
</script>
		
	@yield('scripts')
  
</body>
</html>
