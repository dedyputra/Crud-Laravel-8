@extends('layout.admin')

@section('content')
<body>
  <br>
  <h1 class="text-center mb-5 mt-5">Tambah Data Pegawai</h1>
  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="/insertdata" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="cowok">Cowok</option>
                  <option value="cewek">Cewek</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                <input type="file" name="foto" class="form-control">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telpon</label>
                <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('notelpon')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <button href="submit" class="btn btn-outline-success">Tambah Data</button>
              {{-- <a href="/pegawai" class="btn btn-primary" class="text-right" style="float: right;">Kembali!</a></form> --}}
            </form>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! --> 
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  -->
</body> 
@endsection