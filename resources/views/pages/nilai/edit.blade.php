@extends('app')

@section('breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Nilai</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Nilai</a></li>
                        <li class="breadcrumb-item">Edit</li>
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
                    <h4 class="card-title mb-4">Edit</h4>
                    <form action="{{ route('nilai.update', $obj->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="text" class="form-control" name="year"
                                            value="{{ $obj->year }}" placeholder="Tahun Exc: 2023/2024">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="text" class="form-control" name="semester"
                                            value="{{ $obj->semester }}" placeholder="Semester">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NBI</label>
                                        <?php $nbi = App\Models\Mahasiswa::get() ?>
                                        <select name="nbi" class="form-control" placeholder="Mata Kuliah">
                                            @foreach ($nbi as $nbi)
                                                <option value="{{ $nbi->nbi }}" {{ $obj->nbi == $nbi->nbi ? 'selected' : '' }}>{{ $nbi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mata Kuliah</label>
                                        <?php $mk = App\Models\MataKuliah::get() ?>
                                        <select name="code_mk" class="form-control" placeholder="Mata Kuliah">
                                            @foreach ($mk as $mk)
                                                <option value="{{ $mk->code }}" {{ $obj->code_mk == $mk->code ? 'selected' : '' }}>{{ $mk->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="text" class="form-control" name="nilai"
                                            value="{{ $obj->nilai }}" placeholder="Nilai 1-100">
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