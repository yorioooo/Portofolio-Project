<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Fish</title>
</head>
<body>

<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-8 col-xl-6"> <!-- Fix the class name here -->
            <h1>Edit Buku</h1>
            <hr>
        
            <form action="{{ route('fishs.update',['fish' => $fish->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="Species">Species</label>
                    <input type="text" id="Species" name="Species" value="{{ old('Species') ?? $fish->Species }}" class="form-control @error('Species') is-invalid @enderror"> 
                    @error('Species')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="Weight">Weight</label> 
                    <input type="text" id="Weight" name="Weight"
                    value="{{ old('Weight') ?? $fish->Weight }}"
                    class="form-control @error('Weight') is-invalid @enderror"> 
                    @error('Weight')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <label class="form-label" for="Length">Length</label> 
                    <input type="text" id="Length" name="Length"
                    value="{{ old('Length') ?? $fish->Length }}"
                    class="form-control @error('Length') is-invalid @enderror"> 
                    @error('Length')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <label class="form-label" for="Diagonal">Diagonal;</label> 
                    <input type="text" id="Diagonal" name="Diagonal"
                    value="{{ old('Diagonal') ?? $fish->Diagonal }}"
                    class="form-control @error('Diagonal') is-invalid @enderror"> 
                    @error('Diagonal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <label class="form-label" for="Height">Height</label> 
                    <input type="text" id="Height" name="Height"
                    value="{{ old('Height') ?? $fish->Height }}"
                    class="form-control @error('Height') is-invalid @enderror"> 
                    @error('Height')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="mb-3">
                    <label class="form-label" for="Width">Width</label> 
                    <input type="text" id="Width" name="Width"
                    value="{{ old('Width') ?? $fish->Width }}"
                    class="form-control @error('Width') is-invalid @enderror"> 
                    @error('Width')
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