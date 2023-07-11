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
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <a href="{{ route('mahasiswa.create') }}" class="btn waves-effect waves-light btn-rounded btn-info">
                    <span class="mx-3">Tambah</span>
                </a>
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
                    <div class="d-flex" style="justify-content: space-between">
                        <div>
                            <h4 class="card-title">List Tabel Mahasiswa</h4>
                        </div>
                        <div>
                            <form action="{{ route('mahasiswa.index') }}" class="d-flex">
                                <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search"></i>
                                </button>
                                <a href="{{ route('mahasiswa.index') }}" type="submit" class="btn btn-secondary">
                                    <i class="fa fa-spinner"></i>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                <?php $obj = App\Models\Mahasiswa::when(request()->has('search'), function($q) {
                    $q->where('name', 'like', '%'.request()->search.'%')
                        ->orWhere('year', 'like', '%'.request()->search.'%')
                        ->orWhere('nbi', 'like', '%'.request()->search.'%');
                })->get(); ?>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tahun Masuk</th>
                            <th scope="col">NBI</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($obj->count() != 0)
                            @foreach ($obj as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->nbi }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}" 
                                            class="btn btn-sm waves-effect waves-light btn-rounded btn-warning">
                                            <i class="text-white fa fa-edit"></i>
                                        </a>
                                        <form class="d-inline" action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST">
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
                                <th colspan="5" class="text-center">Data Tidak Ditemukan</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection