<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Karyawan - Reservasi Lapangan Futsal</title>
</head>
<body>

    <!-- Header Info Karyawan & Logout -->
    <div>
        <h2>Dashboard Karyawan - Kelola Reservasi Lapangan Futsal</h2>
        <p>Login sebagai: <strong>{{ Auth::user()->name ?? 'Pegawai Futsal Di YanFutsal' }}</strong> (Karyawan)</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <hr>

    <!-- Form Tambah Reservasi Manual -->
    <h3>Form Tambah Reservasi (Manual / Walk-in)</h3>
    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Pemesan:</label><br>
            <input type="text" name="nama_pemesan" required>
        </div>
        <br>
        <div>
            <label>No HP / WhatsApp:</label><br>
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
        <button type="submit">Simpan Reservasi</button>
    </form>

    <hr>

    <!-- Tabel Kelola Data Reservasi -->
    <h3>Daftar Jadwal Reservasi Lapangan</h3>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>No HP</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi Karyawan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservasis as $index => $reservasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $reservasi->nama_pemesan }}</td>
                    <td>{{ $reservasi->no_hp }}</td>
                    <td>{{ $reservasi->tanggal }}</td>
                    <td>{{ $reservasi->jam_mulai }}</td>
                    <td>{{ $reservasi->jam_selesai }}</td>
                    <td>
                        <!-- Form Hapus Data -->
                        <form action="{{ route('reservasi.destroy', $reservasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin membatalkan reservasi ini?')">Batalkan / Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">Belum ada data reservasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>