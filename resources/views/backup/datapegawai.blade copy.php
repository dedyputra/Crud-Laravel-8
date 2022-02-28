@extends('layout.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right"> 
            {{-- <li class="breadcrumb-item"><a href="#"></a></li>
            <li class="breadcrumb-item active"></li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="container">
    <a href="/tambahpegawai" class="btn btn-outline-success">Tambah Data +</a>
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/pegawai" method="GET">
     <input type="search" id="inputPassword6\" name="search" class="form-control" aria-describedby="passwordHelpBlock">
       </form>
      </div> 
  </div>
    <div class="row">
      <br>
      @if($message = Session::get('Success'))
      <div class="alert alert-success" role="alert">
        {{$message}}
      </div>
      @endif
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Foto</th>
            <th scope="col">No Telpon</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
             $no=1; 
          @endphp
          @foreach ($data as  $index => $row)
          <tr>
            <th scope="row">{{ $index + $data->firstItem()}}</th>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->jeniskelamin }}</td>
            <td>{{ $row->alamat }}</td>
            <td>
              <img src="{{asset('fotopegawai/'.$row->foto)}}" alt="" style="width: 100px;">
            </td>
            <td>0{{ $row->notelpon }}</td>
            <td>{{ $row->created_at -> format('D M Y')}}</td>
            <td>
              <a  href="/tampilkandata/{{$row->id}}" class="btn btn-danger">Edit</a>
              <a href="#" class="btn btn-primary delete" data-id="{{ $row->id }}">Delete</a>
            </td>
          </tr>   
          @endforeach 
        </tbody>
      </table>
      {{ $data->links() }}
    </div>
  </div>
  </div>

@endsection