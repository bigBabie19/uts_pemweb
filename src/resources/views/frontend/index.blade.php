<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Beasiswa</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Registrasi Beasiswa</h1>
        <form method="POST" id="formData" action="{{ route('frontend.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama_mahasiswa">Nama Lengkap</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" required>
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" id="nis" name="nis" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group-inline">
                <div class="form-group">
                    <label for="nomor_telfon">Nomor Telepon</label>
                    <input type="text" id="nomor_telfon" name="nomor_telfon" required>
                </div>
            </div>
            <button type="submit">Daftar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('formData');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Kirim form data menggunakan AJAX
                const formData = new FormData(form);
                fetch(form.getAttribute('action'), {
                    method: 'POST',
                    body: formData,
                    // Tambahkan ini untuk memastikan respons yang diterima adalah JSON
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Tampilkan sweet alert jika data berhasil disimpan
                    Swal.fire({
                        title: 'Terima kasih!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    // Kosongkan nilai dari elemen-elemen formulir setelah berhasil disimpan
                    form.reset();
                })
                .catch(error => {
                    // Tangani kesalahan jika terjadi
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>
</html>
