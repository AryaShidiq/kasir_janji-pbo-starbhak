@extends('layout.dashboard')

@section('content')

<div class="row my-4 d-flex justify-content-center">
    <div class="col-lg-10 col-md-8 mb-md-0 mb-4">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <a href="/crtpegawai" type="button" class="btn btn-success mb-3">Tambah +</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2 text-center">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Role</th>
                                <th scope="col" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($pegawai as $row)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->role }}</td>
                                <td>
                                <td>
                                    <div class="action d-flex">

                                        <a href="/editpegawai/{{ $row->id }}"><img style="width: 40px;"
                                                src="https://img.icons8.com/avantgarde/100/undefined/experimental-edit-avantgarde.png" /></a>
                                        
                                                <form action="/deletepegawai/{{$row->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input class="btn btn-danger" type="submit" value="delete" >
                                                </form>
                                    </div>
                                    <!-- <a href="/deletedataguru/{{ $row->id }}"> <img style="width: 40px;"
                                            src="https://img.icons8.com/fluency/48/undefined/filled-trash.png" /></a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
