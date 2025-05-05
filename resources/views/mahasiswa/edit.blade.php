 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="post" action="{{route('Mahasiswa.update', ['mahasiswa' => $mahasiswa])}}">
        @csrf
        @method('put')
        <div>
            <label>Nama: </label>
            <input type="text" name="nama" placeholder="nama" value="{{$mahasiswa->nama}}">
        </div>
        <div>
            <label>NIM: </label>
            <input type="text" name="nim" placeholder="245150401111016" value="{{$mahasiswa->nim}}">
        </div>
        <div>
            <label>Alamat: </label>
            <input type="text" name="alamat" placeholder="Jl. Veteran No.10-11, Ketawanggede, Kec. Lowokwaru, Kota Malang" value="{{$mahasiswa->alamat}}">
        </div>
        <div>
            <input type="submit" value="Edit">
        </div>
    </form>
 </body>
 </html>