@extends('app')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Mahasiswa</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                        <li class="breadcrumb-item">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tambah Baru</h4>
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tahun Masuk</label>
                                        <input type="text" class="form-control" name="year" value="{{ date('Y') }}" placeholder="Tahun Masuk">
                                    </div>
                                    <div class="form-group">
                                        <label>NBI</label>
                                        <input type="text" class="form-control" name="nbi" placeholder="NBI">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label>Fakultas</label>
                                        <select name="fakultas" class="form-control" placeholder="Fakultas">
                                            <option value="Psikologi">Psikologi</option>
                                            <option value="Teknik">Teknik</option>
                                            <option value="Akutansi">Akutansi</option>
                                            <option value="Management">Management</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection