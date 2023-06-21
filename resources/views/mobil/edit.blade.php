<x-app-layout>
    <div class="mt-8 mb-6 rounded-none px-1">
        @include('mobil.breadcrumbs.edit')
        <h1 class="text-2xl font-semibold">Edit Data Mobil</h1>
    </div>

    <form x-data="{ show: 'mobil' }" action="{{ route('mobil.update', [
        'mobil' => $mobil->id,
    ]) }}"
        method="POST">
        @csrf
        @method('PUT')

        <div x-show="show == 'mobil'" x-cloak x-transition class="bg-base-100 mx-auto max-w-4xl rounded-lg p-6 shadow">
            <div class="mb-6 grid grid-cols-2 gap-6">
                <div class="form-control mb-2 w-full">
                    <label for="nama_pemilik" class="label">
                        <span class="label-text">Nama Pemilik</span>
                    </label>
                    <input type="text" placeholder="Bambang" class="input input-bordered w-full" name="nama_pemilik"
                        value="{{ old('nama_pemilik') ?? $mobil->nama_pemilik }}" autofocus />
                    @error('nama_pemilik')
                        <label class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-2 w-full">
                    <label for="no_polisi" class="label">
                        <span class="label-text">No Polisi</span>
                    </label>
                    <input type="text" placeholder="DN9090YY" class="input input-bordered w-full" name="no_polisi"
                        value="{{ old('no_polisi') ?? $mobil->no_polisi }}" />
                    @error('no_polisi')
                        <label class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-2 w-full">
                    <label for="jenis_mobil" class="label">
                        <span class="label-text">Jenis Mobil</span>
                    </label>
                    <input type="text" placeholder="Avanza" class="input input-bordered w-full" name="jenis_mobil"
                        value="{{ old('jenis_mobil') ?? $mobil->jenis_mobil }}" />
                    @error('jenis_mobil')
                        <label class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-2 w-full">
                    <label for="nama_asuransi" class="label">
                        <span class="label-text">Nama Asuransi</span>
                    </label>
                    <input type="text" placeholder="Avanza" class="input input-bordered w-full" name="nama_asuransi"
                        value="{{ old('nama_asuransi') ?? $mobil->nama_asuransi }}" />
                    @error('nama_asuransi')
                        <label class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-2 w-full">
                    <label for="alamat" class="label">
                        <span class="label-text">Alamat</span>
                    </label>
                    <input type="text" placeholder="Jl. dikotapalu" class="input input-bordered w-full"
                        name="alamat" value="{{ old('alamat') ?? $mobil->alamat }}" />
                    @error('alamat')
                        <label class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-2 w-full">
                    <label for="tanggal_masuk" class="label">
                        <span class="label-text">Tanggal Masuk</span>
                    </label>
                    <input type="date" class="input input-bordered w-full" name="tanggal_masuk"
                        value="{{ old('tanggal_masuk') ?? $mobil->masuk_at }}" />
                    @error('tanggal_masuk')
                        <label class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-2 w-full">
                    <label for="nama_teknisi" class="label">
                        <span class="label-text">Nama Teknisi</span>
                    </label>
                    <input type="text" placeholder="Bambang" class="input input-bordered w-full" name="nama_teknisi"
                        value="{{ old('nama_teknisi') ?? $mobil->nama_teknisi }}" />
                    @error('nama_teknisi')
                        <label class="label">
                            <span class="label-text-alt text-red-500">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button x-on:click="show = 'kerusakan'" type="button" class="btn">
                    Selanjutnya
                </button>
            </div>
        </div>

        <div x-show="show == 'kerusakan'" x-cloak x-transition
            class="bg-base-100 mx-auto max-w-4xl rounded-lg p-6 shadow">
            <div class="grid grid-cols-3 gap-6">
                @forelse (MyData::attributes() as $attr)
                    <div class="form-control w-full">
                        <label for="{{ $attr }}" class="label">
                            <span class="label-text capitalize">{{ Str::of($attr)->replace('_', ' ') }}</span>
                        </label>
                        <select class="select select-bordered" name="{{ $attr }}">
                            @if (in_array($attr, MyData::$AKSESORIS))
                                @forelse (App\Enums\Kerusakan::AKESORIS() as $kerusakan)
                                    <option @selected(old($attr) ?? $mobil->kerusakan[$attr] == $kerusakan) value="{{ $kerusakan }}">
                                        {{ Str::of($kerusakan)->title() }}</option>
                                @empty
                                @endforelse
                            @elseif (in_array($attr, MyData::$AIRBAG))
                                @forelse (App\Enums\Kerusakan::AIRBAG() as $kerusakan)
                                    <option @selected(old($attr) ?? $mobil->kerusakan[$attr] == $kerusakan) value="{{ $kerusakan }}">
                                        {{ Str::of($kerusakan)->title() }}</option>
                                @empty
                                @endforelse
                            @elseif (in_array($attr, MyData::$MESIN))
                                @forelse (App\Enums\Kerusakan::MESIN() as $kerusakan)
                                    <option @selected(old($attr) ?? $mobil->kerusakan[$attr] == $kerusakan) value="{{ $kerusakan }}">
                                        {{ Str::of($kerusakan)->title() }}</option>
                                @empty
                                @endforelse
                            @elseif (in_array($attr, MyData::$BODY))
                                @forelse (App\Enums\Kerusakan::BODY() as $kerusakan)
                                    <option @selected(old($attr) ?? $mobil->kerusakan[$attr] == $kerusakan) value="{{ $kerusakan }}">
                                        {{ Str::of($kerusakan)->title() }}</option>
                                @empty
                                @endforelse
                            @else
                                @forelse (App\Enums\Kerusakan::all() as $kerusakan)
                                    <option @selected(old($attr) ?? $mobil->kerusakan[$attr] == $kerusakan) value="{{ $kerusakan }}">
                                        {{ Str::of($kerusakan)->title() }}</option>
                                @empty
                                @endforelse
                            @endif
                        </select>
                        @error($attr)
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                @empty
                @endforelse
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="show ='mobil'" class="btn btn-ghost">Kembali</button>
                <button type="submit" class="btn">
                    <x-icons.plus class="fill-base-content mr-2 h-4 w-4" />
                    Simpan Data Uji
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
