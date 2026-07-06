<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
  <head>
    @include('layouts.partials.head')
  </head>
  <body>
    <!-- app wrapper -->
    <main id="main-wrapper" class="main-wrapper">
      @include('layouts.partials.sidebar')
      @include('layouts.partials.sidebar-mobile')
      
      <!-- page content -->
      <div id="content">
        <!-- app header -->
        @include('layouts.partials.navbar')
        
        <!-- app body -->
        <div class="app-content-area">
          @yield('content')
        </div>
      </div>
    </main>
    
    @include('layouts.partials.scanner-modal')
    @include('layouts.partials.scripts')
  </body>
</html>
