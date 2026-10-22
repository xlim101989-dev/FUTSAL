<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Karyawan</title>
</head>
<body>

    <h2>Input Karyawan</h2>

    <!-- Form Tambah Karyawan -->
    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <br>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <br>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <br>
        <div>
            <label>Level:</label>
            <select name="level" required>
                <option value="">-Pilih-</option>
                <option value="Petugas">Petugas</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <br>
        <div>
            <label>Nama Karyawan:</label>
            <input type="text" name="nama_karyawan" required>
        </div>
        <br>
        <div>
            <label>Alamat:</label>
            <input type="text" name="alamat" required>
        </div>
        <br>
        <div>
            <label>Jenis Kelamin:</label>
            <input type="radio" name="jenis_kelamin" value="Pria" required> Pria
            <input type="radio" name="jenis_kelamin" value="Wanita" required> Wanita
        </div>
        <br>
        <div>
            <label>Jabatan:</label>
            <select name="jabatan" required>
                <option value="">-Pilih-</option>
                <option value="CEO">CEO</option>
                <option value="HRD">HRD</option>
                <option value="BOSS">BOSS</option>
                <option value="WIBU">WIBU</option>
                <option value="DONTOL">DONTOL</option>
            </select>
        </div>
        <br>
        <button type="submit">Submit</button>
    </form>

    <hr>

    <!-- Tabel Data Karyawan -->
    <h3>Daftar Karyawan</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
                <th>Nama Karyawan</th>
                <th>Alamat</th>
                <th>JK</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($karyawans as $index => $karyawan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $karyawan->username }}</td>
                    <td>{{ $karyawan->email }}</td>
                    <td>{{ $karyawan->level }}</td>
                    <td>{{ $karyawan->nama_karyawan }}</td>
                    <td>{{ $karyawan->alamat }}</td>
                    <td>{{ $karyawan->jenis_kelamin }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>
                        <a href="{{ route('karyawan.edit', $karyawan->id) }}">Edit</a> | 
                        <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" align="center">Belum ada data karyawan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>