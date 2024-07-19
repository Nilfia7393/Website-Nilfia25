@extends('layout.app')
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Data Pengguna</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12 col-12">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                <i class="fa-solid fa-user-plus"></i>
                                Add New
                            </button>
                        </div>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. Telp</th>
                                <th>Level</th>
                                <th>Username</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengguna as $no => $p)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->no_telp }}</td>
                                    <td>{{ $p->level }}</td>
                                    <td>{{ $p->username }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#myModal{{ $p->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="{{ route('pengguna.delete', $p->id) }}" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>

                                <div id="myModal{{ $p->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Pengguna
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('pengguna.update', $p->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Nama</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="text" name="nama" value="{{ $p->nama }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">No. Telp</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="number" name="no_telp"
                                                                value="{{ $p->no_telp }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Level</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <select name="level" class="form-control">
                                                                <option value="Admin"
                                                                    {{ $p->level == 'Admin' ? 'selected' : '' }}>Admin
                                                                </option>
                                                                <option value="User"
                                                                    {{ $p->level == 'User' ? 'selected' : '' }}>User
                                                                </option>
                                                                <option value="Pimpinan"
                                                                    {{ $p->level == 'Pimpinan' ? 'selected' : '' }}>Pimpinan
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Username</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="text" name="username"
                                                                value="{{ $p->username }}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Password</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="password" name="password"
                                                                placeholder="Masukkan Password Baru....."
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Foto</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="file" name="foto" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Pengguna
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengguna.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Nama</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">No. Telp</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="number" name="no_telp" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Level</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <select name="level" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Username</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Password</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Foto</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
