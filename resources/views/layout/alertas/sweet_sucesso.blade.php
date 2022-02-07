<script>

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
</script>

@if (session('mensagem'))
    @if (session('alerta'))
    <div id="alert-warning">
        <script>
            Toast.fire({
                icon: 'warning',
                // title: 'Atenção',
                text: "{{ session('mensagem') }}"
            })
        </script>
    </div>
    @elseif (session('erro'))
    <div id="alert-danger">
        <script>
            Toast.fire({
                icon: 'error',
                // title: 'Erro',
                text: "{{ session('mensagem') }}"
            })
        </script>
    </div>
    @else
    <div id="alert-success">
        <script>
            Toast.fire({
                icon: 'success',
                // title: 'Sucesso',
                text: "{{ session('mensagem') }}"
            })
        </script>
    </div>
    @endif
@endif


