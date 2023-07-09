@extends('layouts.default_adminunit')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Edit Barang</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/adminunit/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/adminunit/barang">Barang</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Barang
            </div>
            <div class="card-body">
                <form action="{{ route('adminunit.barang.update', ['unit_id' => $barang->unit_id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_barang" value="{{ $barang->id }}">
                    @if(isset($barang->id_detail))
                    <input type="hidden" name="id_detail" value="{{ $barang->id_detail }}">
                    @endif
                    @if($barang->gambar != NULL || $barang->gambar != "")
                    <img src="/storage/{{ $barang->gambar }}" class="mb-3" style="height: 12rem;">
                    @endif
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <!-- <span>Nama Unit</span> -->
                                <input class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" type="text" value="{{ $barang->nama_barang }}" />
                                <label for="nama_barang">Nama Barang</label>

                                @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <!-- <span>Lokasi Unit</span> -->
                                <input class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" type="text" value="{{ $barang->merk }}" />
                                <label for="merk">Merek</label>

                                @error('merk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <!-- <span>Nama Unit</span> -->
                                <input class="form-control @error('serial_number') is-invalid @enderror" id="serial_number" name="serial_number" type="text" value="{{ $barang->serial_number }}" />
                                <label for="serial_number">Serial Number</label>

                                @error('serial_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                                    @foreach($kategori as $k)
                                    @if($k->id == $barang->kategori_id)
                                    <option selected value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @else
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <label for="kategori">Kategori</label>

                                @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <!-- <span>Lokasi Unit</span> -->
                                <textarea style="height: 7rem;" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" type="text">{{ $barang->deskripsi }}</textarea>
                                <label for="deskripsi">Deskripsi</label>

                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <!-- <span>Lokasi Unit</span> -->
                                <textarea style="height: 7rem;" class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" type="text">{{ $barang->detail }}</textarea>
                                <label for="detail">Detail</label>

                                @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <!-- <span>Nama Unit</span> -->
                                <select class="form-select @error('status_barang') is-invalid @enderror" id="status_barang" name="status_barang">
                                    @if($barang->status_barang == 'available')
                                    <option selected value="1">Available</option>
                                    <option value="2">In Use</option>
                                    <option value="3">Broken</option>
                                    @elseif($barang->status_barang == 'in use')
                                    <option value="1">Available</option>
                                    <option selected value="2">In Use</option>
                                    <option value="3">Broken</option>
                                    @elseif($barang->status_barang == 'broken')
                                    <option value="1">Available</option>
                                    <option value="2">In Use</option>
                                    <option selected value="3">Broken</option>
                                    @endif
                                </select>
                                <label for="status_barang">Status Barang</label>


                                @error('status_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <!-- <span>Lokasi Unit</span> -->
                                <input class="form-control" id="gambar" name="gambar" type="file" id=formFile></textarea>
                                <label for="gambar">Gambar</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button type="submit" class="btn btn-primary">Simpan</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@stop