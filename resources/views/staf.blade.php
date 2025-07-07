<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Staf</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        h1 {
            margin-top: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Staff</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
              $no = 1;
              foreach ($staf as $data){
                ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $data['nik'] }}</td>
                    <td>{{ $data['nama'] }}</td>
                    <td>{{ $data['jabatan'] }}</td>
                    <td>
                        <a href="{{ route('staf.edit', ['id'=>$data->id]) }}" class="btn btn-warning">Edit</a>
                       <form action="{{ route('staf.delete', ['id'=>$data->id]) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $no++;}?>
            </tbody>
        </table>
       <form action="{{ isset($stafdetail)?route('staf.update', ['id'=>$stafdetail->id]):route('staf.store') }}" method="POST">
            @csrf
            @if (isset($stafdetail))
              @method('put')
            @endif
            <h3>{{  isset($stafdetail)?'Edit Data':'Tambah Data' }}</h3>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="nik" name="nik" class="form-control" id="inputnik" value="{{ old('nik',$stafdetail->nik??'') }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" name="nama" class="form-control" id="inputnama" value="{{ old('nama',$stafdetail->nama??'') }}">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="jabatan" name="jabatan" class="form-control" id="inputjabatan" value="{{ old('jabatan',$stafdetail->jabatan??'') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
