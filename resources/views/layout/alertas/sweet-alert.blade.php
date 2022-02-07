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
    <script>
        Toast.fire({
            icon: 'warning',
            titleText: "{{ session('mensagem') }}"
        })
    </script>
    @elseif (session('erro'))
    <script>
        Toast.fire({
            icon: 'error',
            titleText: "{{ session('mensagem') }}"
        })
    </script>
    @else
    <script>
        Toast.fire({
            icon: 'success',
            titleText: "{{ session('mensagem') }}"
        })
    </script>
    @endif
@endif
