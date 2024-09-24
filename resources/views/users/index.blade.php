<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar CSV</title>
</head>
<body>
    <!-- <h1>Importar</h1> -->

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <p style="color: #f00;">{{ $error }}</p>
        @endforeach
    @endif


    <form action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file" id="file" accept=".csv"><br><br><br>

        <button type="submit" id="fileBtn">Importar</button>
    </form>
    <!-- {{-- dd($users) --}} -->
   @foreach ($users as $user) 
   {{ $user->id  }}
   @endforeach     
</body>
</html>