<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Codescandy" />
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@6.2.7/dist/simplebar.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.45.0/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />

    <script src="{{ asset('assets/js/vendors/color-modes.js') }}"></script>
    @stack('head')
  </head>
  <body>
    @yield('content')

    <div class="position-absolute end-0 bottom-0 m-4">
      <div class="dropdown">
        <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
          <i class="ti theme-icon-active lh-1"><i class="ti theme-icon ti-sun"></i></i>
          <span class="visually-hidden bs-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow">
          <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
              <i class="ti theme-icon ti-sun"></i>
              <span class="ms-2">Light</span>
            </button>
          </li>
          <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
              <i class="ti theme-icon ti-moon-stars"></i>
              <span class="ms-2">Dark</span>
            </button>
          </li>
          <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
              <i class="ti theme-icon ti-circle-half-2"></i>
              <span class="ms-2">Auto</span>
            </button>
          </li>
        </ul>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simplebar@6.2.7/dist/simplebar.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
  </body>
</html>
