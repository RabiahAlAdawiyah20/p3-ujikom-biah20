@extends('layouts.backend')
@section('title', 'Admin - Edit Karyawan')
@section('header', 'Edit Karyawan')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Karyawan</label>
                            <input type="text" name="name" value="{{ $karyawan->name }}" class="form-control"
                                id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $karyawan->email }}" class="form-control"
                                id="email">
                        </div>
                        <div class="form-group">
                            <label for="alamat_cabang">Alamat Cabang</label>
                            <input type="text" name="alamat_cabang" value="{{ $karyawan->alamat_cabang }}"
                                class="form-control" id="alamat_cabang">
                        </div>
                        <div class="form-group">
                            <label for="nama_cabang">Nama Cabang</label>
                            <input type="text" name="nama_cabang" value="{{ $karyawan->nama_cabang }}"
                                class="form-control" id="nama_cabang">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="text" name="no_telp" value="{{ $karyawan->no_telp }}" class="form-control"
                                id="no_telp">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="Active" {{ $karyawan->status == 'Active' ? 'selected' : '' }}>Aktif</option>
                                <option value="Inactive" {{ $karyawan->status == 'Inactive' ? 'selected' : '' }}>Tidak Aktif
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
