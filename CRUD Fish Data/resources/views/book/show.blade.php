<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title> Data {{$book->Author}} </title>
</head>
<body>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
        
        <div class="pt-3 d-flex justify-content-between align-items-center"> 
            <h2>Biodata {{$book->Author}}</h2>
            
            <div class="d-flex">
                <a href="{{ route('books.edit', ['book' => $book->id]) }}" 
                class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('books.destroy',
                    ['book' => $book->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                </form>
            </div>
                
        </div>
        </div>

        <hr>
        
        @if (session()->has('pesan'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('pesan')}}
    </div>
    @endif

    <ul>

    <li>Title: {{$book->Title}} </li>
    <li>Author: {{$book->Author}} </li> 
    <li>Genre: {{$book->Genre}} </li> 
    <li>Height: {{$book->Height}} </li> 
    <li>Publisher: {{$book->Publisher}} </li> 


    </ul>
  </div>
 </div>
</div>
    
</body>
</html>
