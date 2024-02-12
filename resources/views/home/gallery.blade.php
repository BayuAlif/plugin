<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    @include('partials.Navbar')
    <div class="d-flex justify-content-center p-5">
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://pbs.twimg.com/media/F90fMJdWEAA8NTV?format=jpg&name=4096x4096" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://pbs.twimg.com/media/F90fMJdWEAA8NTV?format=jpg&name=4096x4096" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
        <div class="card mx-5" style="width: 18rem;">
            <img src="https://pbs.twimg.com/media/F90fMJdWEAA8NTV?format=jpg&name=4096x4096" class="card-img-top"
                alt="...">
            <div class="card-body">
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex iure, blanditiis
                    tempore suscipit consectetur temporibus atque explicabo libero ea aspernatur possimus quis delectus
                    voluptatum quo doloribus natus sint in maxime!</p>
            </div>
        </div>
    </div>


    <div class="p-5">
        <div>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Ket</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->siswa ? $item->siswa->nama : '' }}</td>
                    <td>{{ $item->nis ? $item->siswa->nis : '' }}</td>
                    <td>{{ $item->kategori ? $item->kategori->ket_kategori : '' }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/img/'.$item->foto) }}" alt="Foto" style="max-width: 100px;">
                        @else
                            <span>No Photo</span>
                        @endif
                    </td>
                    <td>{{ $item->ket }}</td>

                    <td>{{ $item->aspirasi ? $item->aspirasi->status : '' }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>    
    </div>
    </table>
    <div>

    </div>
</body>

</html>
