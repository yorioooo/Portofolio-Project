<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <title>Data Buku</title>
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            
        <div class="py-4 d-flex justify-content-between align-items-center">
            <h2>Tabel Buku</h2>
            <a href="{{ route('books.create') }}" class="btn btn-primary">
                Tambah Buku
            </a>
            <a href="{{ route('books.create') }}" class="btn btn-primary">
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
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Height</th>
                    <th>Publisher</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td><a href="{{ url('/books/'.$book->id) }}">{{$book->Title}}</a></td>
                    <td>{{$book->Author}}</td>
                    <td>{{$book->Genre}}</td>
                    <td>{{$book->Height}}</td>
                    <td>{{$book->Publisher}}</td>
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
