<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {}

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #708090;
        }

        th {
            background-color: darkslategray;
            text-align: center;
            color: aliceblue;
        }

        td {}

        br {
            margin-bottom: 5px !important;
        }

        .judul {
            text-align: center;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }

        .pemko {
            width: 70px;
        }

        .logo {
            float: left;
            margin-right: 0px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;

        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="./public/images/pemko.jpg">
        </div>
        <div class="headtext">
            <h3 style="margin:0px;">PEMERINTAH KAB TEGAL</h3>
            <h1 style="margin:0px;">DINAS PERHUBUNGAN</h1>
            <p style="margin:0px;">Alamat : ‎Jl. Cut Nyak Dien No. 13, Slawi Telp.(0283)xxxxx Tegal 51111</p>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="isi">
            <h2 style="text-align:center;">DATA KETERSEDIAAN RAMBU FILTER</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Kebutuhan Rambu</th>
                        <th>Alamat</th>
                        <th>Tahun pengadaan (APBN)</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ketersediaan_rambu as $kr)
                    <tr>
                        <td>{{$kr->lokasi_rambu->rambu->nama_rambu}}</td>
                        <td>{{$kr->lokasi_rambu->alamat}}</td>
                        <td class="text-center">{{$kr->apbn}}</td>
                        <td class="text-center">@if ($kr->kondisi == 1)
                            <span class="badge badge-success">Baik</span>
                            @elseif ($kr->kondisi == 2)
                            <label class="badge badge-warning" for=""> Perlu Rehab</label>
                            @else
                            <label class="badge badge-danger" for=""> Hilang</label>
                            @endif</td>
                    </tr>
                    @endforeach
                    </tfoot>
            </table>
            <br>
            <br>
            <div class="ttd">
                        <h5> <p>Slawi, {{$tgl}}</p></h5>
                      <h5>{{$pejabat_struktural->jabatan}}</h5>
                      <br>
                      <br>
                      <h5 style="text-decoration:underline;">{{$pejabat_struktural->nama_pejabat}}</h5>
                      <h5>{{$pejabat_struktural->nip}}</h5>
                      </div>
        </div>
    </div>
</body>

</html>
