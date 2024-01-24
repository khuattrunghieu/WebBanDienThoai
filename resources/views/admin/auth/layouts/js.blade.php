<!-- Helpers -->
<script src="{{ asset('theme/admin/assets/vendor/js/helpers.js') }}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers')}} in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('theme/admin/assets/js/config.js') }}"></script>
<!-- Core JS -->
<!-- build:js theme/admin/assets/vendor/js/core -->

<script src="{{ asset('theme/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('theme/admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('theme/admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('theme/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('theme/admin/assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{ asset('theme/admin/assets/js/main.js') }}"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
