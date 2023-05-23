<x-app-layout>
    <div class="mt-8 mb-10 rounded-none px-1">
        @include('mobil.breadcrumbs.show')
        <h1 class="text-2xl font-semibold">Detail Mobil</h1>
    </div>

    <div class="bg-base-100 mx-auto max-w-4xl rounded-lg p-6 shadow">
        <div class="mb-6 grid grid-cols-2 gap-6">
            <div class="form-control w-full">
                <label for="nama_pemilik" class="label">
                    <span class="label-text">Nama Pemilik</span>
                </label>
                <input type="text" placeholder="Bambang" class="input input-bordered w-full"
                    value="{{ $mobil->nama_pemilik }}" readonly />
            </div>

            <div class="form-control w-full">
                <label for="no_polisi" class="label">
                    <span class="label-text">No Polisi</span>
                </label>
                <input type="text" placeholder="DN9090YY" class="input input-bordered w-full"
                    value="{{ $mobil->no_polisi }}" readonly />
            </div>

            <div class="form-control w-full">
                <label for="jenis_mobil" class="label">
                    <span class="label-text">Jenis Mobil</span>
                </label>
                <input type="text" placeholder="Avanza" class="input input-bordered w-full"
                    value="{{ $mobil->jenis_mobil }}" readonly />
            </div>

            <div class="form-control w-full">
                <label for="nama_asuransi" class="label">
                    <span class="label-text">Nama Asuransi</span>
                </label>
                <input type="text" placeholder="Manulife" class="input input-bordered w-full"
                    value="{{ $mobil->nama_asuransi }}" readonly />
            </div>

            <div class="form-control w-full">
                <label for="alamat" class="label">
                    <span class="label-text">Alamat</span>
                </label>
                <input type="text" placeholder="Jl. dikotapalu" class="input input-bordered w-full"
                    value="{{ $mobil->alamat }}" readonly />
            </div>

            <div class="form-control w-full">
                <label for="tanggal_masuk" class="label">
                    <span class="label-text">Tanggal Masuk</span>
                </label>
                <input type="date" class="input input-bordered w-full" value="{{ $mobil->masuk_at }}" readonly />
            </div>

            <div class="form-control w-full">
                <label for="nama_teknisi" class="label">
                    <span class="label-text">Nama Teknisi</span>
                </label>
                <input type="text" class="input input-bordered w-full" value="{{ $mobil->nama_teknisi }}" readonly />
            </div>

            <div class="form-control mb-6 w-full">
                <label for="jenis_Kerusakan" class="label">
                    <span class="label-text">Jenis Kerusakan</span>
                </label>
                <input type="text" class="input input-bordered w-full" value="{{ $mobil->jenis_kerusakan }}"
                    readonly />
            </div>
        </div>


        <div class="grid grid-cols-3 gap-6">
            @forelse (MyData::attributes() as $attr)
                <div class="form-control w-full">
                    <label for="{{ $attr }}" class="label">
                        <span class="label-text capitalize">{{ Str::of($attr)->replace('_', ' ') }}</span>
                    </label>
                    <input type="text" class="input input-bordered w-full" value="{{ $mobil->kerusakan[$attr] }}"
                        readonly />
                </div>
            @empty
            @endforelse
        </div>
    </div>

</x-app-layout>
