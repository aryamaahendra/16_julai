<div class="bg-base-100 max-w-lg rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="table-zebra table w-full">
            <tbody class="divide-y">
                <!-- row 3 -->
                <tr class="">
                    <td class="">Nama Pemilik</td>
                    <td>: {{ $mobil->nama_pemilik }}</td>
                </tr>
                <tr class="">
                    <td class="">No Polisi</td>
                    <td>: {{ $mobil->no_polisi }}</td>
                </tr>
                <tr class="">
                    <td class="">Jenis Mobil</td>
                    <td>: {{ $mobil->jenis_mobil }}</td>
                </tr>
                <tr class="">
                    <td class="">Nama Asuransi</td>
                    <td>: {{ $mobil->nama_asuransi }}</td>
                </tr>
                <tr class="">
                    <td class="">Alamat</td>
                    <td>: {{ $mobil->alamat }}</td>
                </tr>
                <tr class="">
                    <td class="">Tanggal Masuk</td>
                    <td>: {{ Carbon\Carbon::create($mobil->masuk_at)->toFormattedDateString() }}</td>
                </tr>
                <tr class="">
                    <td class="">Nama Teknisi</td>
                    <td>: {{ $mobil->nama_teknisi }}</td>
                </tr>
                <tr class="">
                    <td class="">Jenis Kerusakan</td>
                    <td>: {{ $mobil->jenis_kerusakan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
