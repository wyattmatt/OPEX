<!-- Libs JS -->
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('node_modules/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Theme JS -->
<!-- build:js {{ asset('assets/js/theme.min.js') }} -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- endbuild -->

<script src="{{ asset('assets/js/vendors/sidebarnav.js') }}"></script>

@stack('scripts')
