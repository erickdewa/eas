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
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <a href="{{ route('nilai.create') }}" class="btn waves-effect waves-light btn-rounded btn-info">
                    <span class="mx-3">Tambah</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<?php $obj = App\Models\Nilai::when(request()->has('search'), function($q) {
    $q->where('nbi', 'like', '%'.request()->search.'%')
        ->orWhere('year', 'like', '%'.request()->search.'%')
        ->orWhere('nilai', 'like', '%'.request()->search.'%')
        ->orWhere('code_mk', 'like', '%'.request()->search.'%');
})->get(); ?>
<div class="container-fluid">
    <div class="row">
        @if($obj->count() != 0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('nilai.export') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-0">
                                        <?php $year = array_unique(App\Models\Nilai::pluck('year')->toArray()) ?>
                                        <select name="year" class="form-control" placeholder="Tahun Ajaran">
                                            @foreach ($year as $year)
                                                <option value="">Select Tahun Ajaran</option>
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-0">
                                        <?php $semester = array_unique(App\Models\Nilai::pluck('semester')->toArray()) ?>
                                        <select name="semester" class="form-control" placeholder="Semester">
                                            @foreach ($semester as $semester)
                                                <option value="">Select Semester</option>
                                                <option value="{{ $semester }}">{{ $semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-0">
                                        <?php $nbi = array_unique(App\Models\Nilai::pluck('nbi')->toArray()) ?>
                                        <select name="nbi" class="form-control" placeholder="NBI">
                                            @foreach ($nbi as $nbi)
                                                <option value="">Select NBI</option>
                                                <option value="{{ $nbi }}">{{ $nbi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light w-100">
                                        Export</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="justify-content: space-between">
                        <div>
                            <h4 class="card-title">List Tabel Nilai</h4>
                        </div>
                        <div>
                            <form action="{{ route('nilai.index') }}" class="d-flex">
                                <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="{{ route('nilai.index') }}" type="submit" class="btn btn-secondary">
                                    <i class="fa fa-spinner"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Semester</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($obj->count() != 0)
                            @foreach ($obj as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->semester }}</td>
                                    <td>{{ $item->nbi }}</td>
                                    <td>{{ $item->code_mk }}</td>
                                    <td>
                                        @if($item->nilai >= 85)
                                            <span>A</span>
                                        @elseif($item->nilai >= 80)
                                            <span>A-</span>
                                        @elseif($item->nilai >= 75)
                                            <span>B+</span>
                                        @elseif($item->nilai >= 70)
                                            <span>B</span>
                                        @elseif($item->nilai >= 65)
                                            <span>B-</span>
                                        @elseif($item->nilai >= 60)
                                            <span>C+</span>
                                        @elseif($item->nilai >= 55)
                                            <span>C</span>
                                        @elseif($item->nilai >= 50)
                                            <span>C-</span>
                                        @elseif($item->nilai >= 40)
                                            <span>D</span>
                                        @else
                                            <span>E</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('nilai.edit', $item->id) }}" 
                                            class="btn btn-sm waves-effect waves-light btn-rounded btn-warning">
                                            <i class="text-white fa fa-edit"></i>
                                        </a>
                                        <form class="d-inline" action="{{ route('nilai.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm waves-effect waves-light btn-rounded btn-danger">
                                                <i class="text-white fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="7" class="text-center">Data Tidak Ditemukan</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection