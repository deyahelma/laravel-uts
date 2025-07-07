<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Dosen</title>
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
        <h1>Data Dosen</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">Bidang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
              $no = 1;
              foreach ($dosen as $data){
                ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $data['nama'] }}</td>
                    <td>{{ $data['nidn'] }}</td>
                    <td>{{ $data['bidang'] }}</td>
                    <td>
                        <a href="{{ route('dosen.edit', ['id'=>$data->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('dosen.delete', ['id'=>$data->id]) }}" method="post" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $no++;}?>
            </tbody>
        </table>
        <form action="{{ isset($dosendetail)?route('dosen.update', ['id'=>$dosendetail->id]):route('dosen.store') }}" method="POST">
            @csrf
            @if (isset($dosendetail))
              @method('put')
            @endif
            <h3>{{  isset($dosendetail)?'Edit Data':'Tambah Data' }}</h3>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="inputnama" value="{{ old('nama',$dosendetail->nama??'') }}">
            </div>
            <div class="form-group">
                <label for="nidn">NIDN</label>
                <input type="text" name="nidn" class="form-control" id="inputnidn" value="{{ old('nidn',$dosendetail->nidn??'') }}">
            </div>
            <div class="form-group">
                <label for="bidang">Bidang</label>
                <input type="text" name="bidang" class="form-control" id="inputbidang" value="{{ old('bidang',$dosendetail->bidang??'') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
