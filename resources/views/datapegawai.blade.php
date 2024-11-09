@extends('layout.admin')
@push('css')
    <!-- Bootstrap CSS -->
    <link
        href="{{ asset('template/https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"') }}>
  <link rel="{{ asset('template/stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer"') }} />
@endpush
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
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Pegawai</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container">
            {{-- <a href="/tambahpegawai" class="btn btn-outline-success">Tambah Data +</a> --}}
            {{-- {{Session::get('halaman_url')}} --}}
            <div class="row g-3 align-items-center mt-2">
            </div>
            <div class="row">
                <br>
                @if ($message = Session::get('Success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pegawai</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-right" style="float: right;">
                            <form action="/pegawai" method="GET">
                                <input class="form-control form-control-navbar" type="search"
                                    id="inputPassword6\" name="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                        <br><br>
                        <div class="table-responsiv">
                            <table id="example1" class="table table-bordered table-striped">
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
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                        <tr>
                                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->jeniskelamin }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>
                                                <img src="{{ asset('fotopegawai/' . $row->foto) }}" alt=""
                                                    style="width: 100px;">
                                            </td>
                                            <td>0{{ $row->notelpon }}</td>
                                            <td>{{ $row->created_at->format('D M Y') }}</td>
                                            <td>
                                                <a href="/tampilkandata/{{ $row->id }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete"
                                                    data-id="{{ $row->id }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-right" style="float: right;">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                  integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
              </script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                  integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
              </script>
              -->
    </body>
    <script>
        $('.delete').click(function() {
            var id_pegawai = $(this).attr('data-id');
            swal({
                    title: "Apakah Yakin?",
                    text: "Kamu akan menghapus pegawai",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete/" + id_pegawai + ""
                        swal("Data Berhasil Dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Tidak Jadi Dihapus");
                    }
                });
        });
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
