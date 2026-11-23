@extends('layouts.admin.app')
@section('content')
    {{-- start main content --}}
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit User</h1>
                <p class="mb-0">Form untuk mengubah data user.</p>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary">
                    <i class="far fa-question-circle me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('user.update', $dataUser->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-12">
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $dataUser->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ old('role', $dataUser->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-sm-12">

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', $dataUser->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ old('role', $dataUser->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-sm-12">
                            </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ old('role', $dataUser->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-sm-12">

                            <div class="col-lg-6 col-sm-12">
                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ old('role', $dataUser->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-sm-12">

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" placeholder="Ulangi password baru">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ old('role', $dataUser->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-sm-12">
                            </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ old('role', $dataUser->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-sm-12">

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                            </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="editor" {{ old('role', $dataUser->role) == 'editor' ? 'selected' : '' }}>Editor</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-sm-12">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end main content --}}
@endsection
