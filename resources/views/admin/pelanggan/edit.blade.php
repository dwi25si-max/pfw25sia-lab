<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Data Pelanggan</h3>

        <form action="{{ route('pelanggan.update', $pelanggan->pelanggan_id) }}"
              method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="first_name">Nama Depan</label>
                <input type="text" id="first_name" name="first_name"
                       class="form-control"
                       value="{{ old('first_name', $pelanggan->first_name) }}"
                       >
            </div>

            <div class="mb-3">
                <label for="last_name">Nama Belakang</label>
                <input type="text" id="last_name" name="last_name"
                       class="form-control"
                       value="{{ old('last_name', $pelanggan->last_name) }}"
                       >
            </div>

            <div class="mb-3">
                <label for="birthday">Tanggal Lahir</label>
                <input type="date" id="birthday" name="birthday"
                       class="form-control"
                       value="{{ old('birthday', $pelanggan->birthday) }}"
                       >
            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control" >
                    <option value="">-- Pilih Gender --</option>
                    <option value="Male"
                        {{ old('gender', $pelanggan->gender) == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>
                    <option value="Female"
                        {{ old('gender', $pelanggan->gender) == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                       class="form-control"
                       value="{{ old('email', $pelanggan->email) }}"
                       >
            </div>

            <div class="mb-3">
                <label for="phone">Nomor Telepon</label>
                <input type="text" id="phone" name="phone"
                       class="form-control"
                       value="{{ old('phone', $pelanggan->phone) }}"
                       >
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('pelanggan.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</body>

</html>
