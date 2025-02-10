<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Buku</title>
</head>
<body>

<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-8 col-xl-6"> <!-- Fix the class name here -->
            <h1>Edit Buku</h1>
            <hr>
        
            <form action="{{ route('books.update',['book' => $book->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="Title">Title</label>
                    <input type="text" id="Title" name="Title" value="{{ old('Title') ?? $book->Title }}" class="form-control @error('Title') is-invalid @enderror"> 
                    @error('Title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="Author">Author</label> 
                    <input type="text" id="Author" name="Author"
                    value="{{ old('Author') ?? $book->Author }}"
                    class="form-control @error('Author') is-invalid @enderror"> 
                    @error('Author')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <label class="form-label" for="Genre">Genre</label> 
                    <input type="text" id="Genre" name="Genre"
                    value="{{ old('Genre') ?? $book->Genre }}"
                    class="form-control @error('Genre') is-invalid @enderror"> 
                    @error('Genre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <label class="form-label" for="Height">Height</label> 
                    <input type="text" id="Height" name="Height"
                    value="{{ old('Height') ?? $book->Height }}"
                    class="form-control @error('Height') is-invalid @enderror"> 
                    @error('Height')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <label class="form-label" for="Publisher">Publisher</label> 
                    <input type="text" id="Publisher" name="Publisher"
                    value="{{ old('Publisher') ?? $book->Publisher }}"
                    class="form-control @error('Publisher') is-invalid @enderror"> 
                    @error('Publisher')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <button type="submit" class="btn btn-primary mb-2">Update</button> 
                </form>
            </div>
        </div>

</div>
</body>
</html>