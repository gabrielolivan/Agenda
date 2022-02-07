<!DOCTYPE html>
<html lang="en">
<head>

    @include('layout.head')

</head>
<body>
  
    @include('layout.menu')

    @yield('breadcrumb')

    <div class="container">
        @include('layout.alertas.sweet_sucesso')
        @yield('conteudo')
    </div>
</body>
</html>