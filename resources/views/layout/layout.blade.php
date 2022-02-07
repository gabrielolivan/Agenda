<!DOCTYPE html>
<html lang="en">
<head>

    @include('layout.head')

</head>
<body>
  
    @include('layout.menu')

    @yield('breadcrumb')

    <div class="container">
        @yield('conteudo')
    </div>
    
    @include('layout.alertas.sweet-alert')
</body>
</html>