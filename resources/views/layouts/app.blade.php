<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags, title, CSS -->
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        @endif
    </script>
</body>
</html>
