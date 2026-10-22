<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Karyawan</title>
</head>
<body>

    <h2>Edit Data Karyawan</h2>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Username:</label><br>
            <input type="text" name="username" value="{{ $karyawan->username }}" required>
        </div>
        <br>
        <div>
            <label>Password (Kosongkan jika tidak ingin diubah):</label><br>
            <input type="password" name="password">
        </div>
        <br>
        <div>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ $karyawan->email }}" required>
        </div>
        <br>
        <div>
            <label>Level:</label><br>
            <select name="level" required>
                <option value="Petugas" {{ $karyawan->level == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                <option value="Admin" {{ $karyawan->level == 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <br>
        <div>
            <label>Nama Karyawan:</label><br>
            <input type="text" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" required>
        </div>
        <br>
        <div>
            <label>Alamat:</label><br>
            <input type="text" name="alamat" value="{{ $karyawan->alamat }}" required>
        </div>
        <br>
        <div>
            <label>Jenis Kelamin:</label><br>
            <input type="radio" name="jenis_kelamin" value="Pria" {{ $karyawan->jenis_kelamin == 'Pria' ? 'checked' : '' }}> Pria
            <input type="radio" name="jenis_kelamin" value="Wanita" {{ $karyawan->jenis_kelamin == 'Wanita' ? 'checked' : '' }}> Wanita
        </div>
        <br>
        <div>
            <label>Jabatan:</label><br>
            <select name="jabatan" required>
                <option value="CEO" {{ $karyawan->jabatan == 'CEO' ? 'selected' : '' }}>CEO</option>
                <option value="HRD" {{ $karyawan->jabatan == 'HRD' ? 'selected' : '' }}>HRD</option>
                <option value="BOSS" {{ $karyawan->jabatan == 'BOSS' ? 'selected' : '' }}>BOSS</option>
                <option value="WIBU" {{ $karyawan->jabatan == 'WIBU' ? 'selected' : '' }}>WIBU</option>
                <option value="DONTOL" {{ $karyawan->jabatan == 'DONTOL' ? 'selected' : '' }}>DONTOL</option>
            </select>
        </div>
        <br>
        <button type="submit">Update Karyawan</button>
        <a href="{{ route('karyawan.index') }}">Batal</a>
    </form>

</body>
</html>