<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <header>
        <h1>Judul Pengumuman</h1>

    </header>
    @foreach ($luar_negri as $d)
    <section class="announcement">
        <h2>pengumuman Beasiswa {{$d->jenis_beasiswa}}</h2>
        <p>{{$d->pengumuman}}</p>  
    </section>
    @endforeach

</body>
</body>
</html>
