<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <title>Data Fish</title>
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>Tabel Fish</h2>
            <a href="{{ route('fishs.create') }}" class="btn btn-primary">
                Tambah Daftar Fish
            </a>
            <a href="{{ route('fishs.create') }}" class="btn btn-primary">
                Ubah Bahasa Ingris
            </a>
        </div>
        @if(session()->has('pesan'))
        <div class="alert alert-success">
            {{ session()->get('pesan') }}
        </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Species</th>
                    <th>Weight</th>
                    <th>Length</th>
                    <th>Diagonal</th>
                    <th>Height</th>
                    <th>Width</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($fishs as $fish)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td><a href="{{ url('/fishs/'.$fish->id) }}">{{$fish->Species}}</a></td>
                    <td>{{$fish->Weight}}</td>
                    <td>{{$fish->Length}}</td>
                    <td>{{$fish->Diagonal}}</td>
                    <td>{{$fish->Height}}</td>
                    <td>{{$fish->Width}}</td>
                </tr>
                @empty
                    <td colspan="6" class="text-center">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</div>

</body>
</html>
