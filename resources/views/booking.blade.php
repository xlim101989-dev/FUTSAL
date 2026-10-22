<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Booking Pelanggan</title>
</head>
<body>
    <h2>Selamat Datang, Pelanggan!</h2>
    <p>Silakan lakukan pemesanan / booking lapangan futsal di sini.</p>

    <!-- Contoh Form Booking Sederhana -->
    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Pemesan:</label><br>
            <input type="text" name="nama_pemesan" required>
        </div>
        <br>
        <div>
            <label>No HP:</label><br>
            <input type="text" name="no_hp" required>
        </div>
        <br>
        <div>
            <label>Tanggal:</label><br>
            <input type="date" name="tanggal" required>
        </div>
        <br>
        <div>
            <label>Jam Mulai:</label><br>
            <input type="time" name="jam_mulai" required>
        </div>
        <br>
        <div>
            <label>Jam Selesai:</label><br>
            <input type="time" name="jam_selesai" required>
        </div>
        <br>
        <button type="submit">Kirim Booking</button>
    </form>

    <br>
    <!-- Tombol Logout -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>