@extends('layout.admin')

@section('content')
<body>
  <br>
  <h1 class="text-center mb-5 mt-5">Edit Data Pegawai</h1>
  <div class="container mb-5">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <form action="/updatedata/{{$data->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" 
                id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                  <option selected>{{$data->jeniskelamin}}</option>
                  <option value="cowok">Pria</option>
                  <option value="cewek">Wanita</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" 
                aria-describedby="emailHelp" value="{{$data->alamat}}">
              </div>
              {{-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                <input type="file" name="foto" class="form-control" value="{{$data->foto}}">
              </div> --}}
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telpon</label>
                <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1"
                 aria-describedby="emailHelp" value="{{$data->notelpon}}">
              </div>
              <button type="submit" class="btn btn-outline-success">Edit Data!</button>
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