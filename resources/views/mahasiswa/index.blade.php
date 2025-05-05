<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
    </div>
    <div>
        <div>
            <a href="{{route('Mahasiswa.create')}}">Create Mahasiswa</a> 
        </div>
        <table border="1" cellpadding="6" cellspacing="0">
            <tr>
                <th>NIM</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach($mahasiswa as $mhs)
                <tr>
                    <td>{{$mhs->nim}}</td>
                    <td>{{$mhs->nama}}</td>
                    <td>{{$mhs->alamat}}</td>
                    <td>
                        <a href="{{route('Mahasiswa.edit',['mahasiswa' => $mhs])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('Mahasiswa.delete', ['mahasiswa' => $mhs  ])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>