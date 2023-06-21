<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struct</title>

    <style>
        body {
            padding: 40px;
            font-family: serif;
            font-size: 16px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
        }

        p {
            margin: 0;
            margin-bottom: 8px
        }

        ul,
        ol {
            margin: 0;
            padding-left: 28px
        }

        li {
            margin-bottom: 6px
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center; margin-bottom: 8px">CV. SINAR KARYA</h1>
    <h2 style="text-align: center; margin-bottom: 6px; color: #d9d935">BODY REPAIR AND CAT</h2>
    <p style="text-align: center; margin-bottom: 6px; font-weight: 600">
        Telp: 085 100 709 709 | Email: sinar_kry@yahoo.co.id
    </p>
    <p style="text-align: center; margin-bottom: 16px; font-weight: 600">
        Alamat: Jl. Sungai Sa'dan Lrg II No. 07 Palu, Sulawesi Tengah
    </p>

    <hr style="margin-bottom: 20px">

    <div style="margin-bottom: 20px">
        <p style="float: left; width: 75%">Dengan hormat,</p>
        <p style="margin-left: auto;">
            Palu, {{ Carbon\Carbon::now()->toFormattedDateString() }}
        </p>
    </div>

    <table style="margin-bottom: 20px">
        <tbody>
            <tr>
                <td style="padding-right: 20px; padding-bottom: 4px">Nama Pemilik</td>
                <td style="padding-bottom: 4px">: {{ $mobil->nama_pemilik }}</td>
            </tr>
            <tr>
                <td style="padding-right: 20px; padding-bottom: 4px">Merek/Tipe Mobil</td>
                <td style="padding-bottom: 4px">: {{ $mobil->jenis_mobil }}</td>
            </tr>
            <tr>
                <td style="padding-right: 20px; padding-bottom: 4px">No Ploisi</td>
                <td style="padding-bottom: 4px">: {{ $mobil->no_polisi }}</td>
            </tr>
            <tr>
                <td style="padding-right: 20px; padding-bottom: 4px">Nama Asuransi</td>
                <td style="padding-bottom: 4px">: {{ $mobil->nama_asuransi }}</td>
            </tr>
            <tr>
                <td style="padding-right: 20px; padding-bottom: 4px">Kerusakan</td>
                <td style="padding-bottom: 4px">: {{ Str::of($mobil->jenis_kerusakan)->title() }}</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-bottom: 20px">Dengan perincian biaya perbiakan sbb:</p>

    <table style="border: 1px solid black; width: 100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 6px" colspan="5">Jasa</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 6px; width: 7.5%;">No</th>
                <th colspan="2" style="border: 1px solid black; padding: 6px; width: 42.5%;">Nama</th>
                <th style="border: 1px solid black; padding: 6px; width: 25%;">Status</th>
                <th style="border: 1px solid black; padding: 6px; width: 25%;">Biaya (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count = 1;
                $total_jasa = 0;
            @endphp
            @forelse ($mobil->jasa as $jasa)
                <tr>
                    <td style="border: 1px solid black; padding: 6px; ">
                        {{ $count }}
                    </td>
                    <td colspan="2" style="border: 1px solid black; padding: 6px; ">
                        {{ $jasa->nama }}
                    </td>
                    <td style="border: 1px solid black; padding: 6px; ">
                        {{ $jasa->status }}
                    </td>
                    <td style="border: 1px solid black; padding: 6px; text-align: right">
                        {{ number_format($jasa->harga, 2, ',', '.') }}
                    </td>
                </tr>
                @php
                    $count++;
                    $total_jasa += (int) $jasa->harga;
                @endphp
            @empty
            @endforelse

            <tr style="font-weight: 600">
                <td colspan="4" style="border: 1px solid black; padding: 6px; text-align: center">
                    Total Jasa
                </td>
                <td style="border: 1px solid black; padding: 6px; text-align: right">
                    {{ number_format($total_jasa, 2, ',', '.') }}
                </td>
            </tr>
        </tbody>

        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 15px" colspan="5"></th>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 6px" colspan="5">Suku Cadang</th>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 6px; width: 7.5%;">No</th>
                <th style="border: 1px solid black; padding: 6px; width: 35%;">Nama</th>
                <th style="border: 1px solid black; padding: 6px; width: 7.5%;">Qty</th>
                <th style="border: 1px solid black; padding: 6px; width: 25%;">Biaya /Unit (Rp)</th>
                <th style="border: 1px solid black; padding: 6px; width: 25%;">Total Biaya (Rp)</th>
            </tr>
        </thead>

        <tbody>
            @php
                $count = 1;
                $total_part = 0;
            @endphp
            @forelse ($mobil->part as $part)
                <tr>
                    <td style="border: 1px solid black; padding: 6px; ">
                        {{ $count }}
                    </td>

                    <td style="border: 1px solid black; padding: 6px; ">
                        {{ $part->nama }}
                    </td>

                    <td style="border: 1px solid black; padding: 6px; text-align: center">
                        {{ $part->qty }}
                    </td>

                    <td style="border: 1px solid black; padding: 6px; text-align: right">
                        {{ number_format($part->harga, 2, ',', '.') }}
                    </td>

                    <td style="border: 1px solid black; padding: 6px; text-align: right">
                        {{ number_format($part->total_harga, 2, ',', '.') }}
                    </td>
                </tr>
                @php
                    $count++;
                    $total_part += (int) $part->total_harga;
                @endphp
            @empty
            @endforelse

            <tr style="font-weight: 600">
                <td colspan="4" style="border: 1px solid black; padding: 6px; text-align: center">
                    Total Part
                </td>
                <td style="border: 1px solid black; padding: 6px; text-align: right">
                    {{ number_format($total_part, 2, ',', '.') }}
                </td>
            </tr>

            <tr style="font-weight: 600">
                <td colspan="4" style="border: 1px solid black; padding: 6px; text-align: center">
                    Total
                </td>
                <td style="border: 1px solid black; padding: 6px; text-align: right">
                    {{ number_format($total_part + $total_jasa, 2, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div style="float: right; margin-right: 20px;text-align: center">
        <p style="margin-bottom: 50px">Mengetahui</p>
        <p style="text-decoration: underline;">Julianto Tipa</p>
        <p>Pimpinan</p>
    </div>
</body>

</html>
