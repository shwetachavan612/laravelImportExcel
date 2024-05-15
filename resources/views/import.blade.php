{{-- <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Import</button>
</form> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Import Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="bg-dark">
        <div class="container py-4">
            <h1 class="text-white">Laravel Import Example</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-6">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>    
            @endif
            <div class="shadow-lg p-4">
                <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" name="import">
                    @csrf
                    <h3>Select a File</h3>
                    <div class="mb-3">
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    @if ($errors->has('file'))
                        <div class="alert alert-danger">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                </form>
            </div>

            <table class="table">

                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Qty</th>
                </tr>

                @if (!empty($products))
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->qty }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</body>
</html>