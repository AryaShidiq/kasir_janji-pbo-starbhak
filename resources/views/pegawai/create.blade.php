@extends('layout.dashboard')

@section('content')

<div class="col-lg-6">
    <form method="POST" action="/strpegawai">
        @csrf
        <h4 class="text-center">Tambah Data Pegawai</h4>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" id="exampleInputEmail1"  name="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Role</label>
            <input type="text" class="form-control" id="exampleInputPassword1"  name="role">
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="save">Submit</button>
    </form>
</div>

@endsection