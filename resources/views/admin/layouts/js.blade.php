<script src="{{asset('theme/admin/assets/vendor/js/helpers.js')}}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{asset('theme/admin/assets/js/config.js')}}"></script>

<!-- Core JS -->
<!-- build:js theme/admin/assets/vendor/js/core.js -->
<script src="{{asset('theme/admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('theme/admin/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('theme/admin/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('theme/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('theme/admin/assets/vendor/js/menu.js')}}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('theme/admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('theme/admin/assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('theme/admin/assets/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<script>
    // Set the options that I want
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if (session()->has('success'))

        toastr.success('{{ session()->get('success') }}');
    @endif

    @if (session()->has('error'))

        toastr.error('{{ session()->get('error') }}');
    @endif
</script>
