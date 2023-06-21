<x-app-layout>
    <div class="mt-8 mb-6 rounded-none px-1">
        @include('data-latih.breadcrumbs.create')
        <h1 class="text-2xl font-semibold">Tambah Latih</h1>
    </div>

    <form class="bg-base-100 mx-auto max-w-4xl rounded-lg p-6 shadow" action="{{ route('data-latih.store') }}"
        method="POST">
        @csrf

        <div class="mb-6 grid grid-cols-2 gap-6">
            <div class="form-control mb-2 w-full">
                <label for="no_polisi" class="label">
                    <span class="label-text">No Polisi</span>
                </label>
                <input type="text" placeholder="DN9090YY" class="input input-bordered w-full" name="no_polisi"
                    value="{{ old('no_polisi') }}" autofocus />
                @error('no_polisi')
                    <label class="label">
                        <span class="label-text-alt text-red-500">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control w-full">
                <label for="class" class="label">
                    <span class="label-text">Class (Jenis Kerusakan)</span>
                </label>
                <select class="select select-bordered" name="class">
                    @forelse (App\Enums\JenisKerusakan::all() as $jenisKerusakan)
                        <option @selected(old('class') == $jenisKerusakan) value="{{ $jenisKerusakan }}">
                            {{ Str::of($jenisKerusakan)->title() }}</option>
                    @empty
                    @endforelse
                </select>
                @error('class')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            @forelse (MyData::attributes() as $attr)
                <div class="form-control w-full">
                    <label for="{{ $attr }}" class="label">
                        <span class="label-text capitalize">{{ Str::of($attr)->replace('_', ' ') }}</span>
                    </label>
                    <select class="select select-bordered" name="{{ $attr }}">
                        @if (in_array($attr, MyData::$AKSESORIS))
                            @forelse (App\Enums\Kerusakan::AKESORIS() as $kerusakan)
                                <option @selected(old($attr) == $kerusakan) value="{{ $kerusakan }}">
                                    {{ Str::of($kerusakan)->title() }}</option>
                            @empty
                            @endforelse
                        @elseif (in_array($attr, MyData::$AIRBAG))
                            @forelse (App\Enums\Kerusakan::AIRBAG() as $kerusakan)
                                <option @selected(old($attr) == $kerusakan) value="{{ $kerusakan }}">
                                    {{ Str::of($kerusakan)->title() }}</option>
                            @empty
                            @endforelse
                        @elseif (in_array($attr, MyData::$MESIN))
                            @forelse (App\Enums\Kerusakan::MESIN() as $kerusakan)
                                <option @selected(old($attr) == $kerusakan) value="{{ $kerusakan }}">
                                    {{ Str::of($kerusakan)->title() }}</option>
                            @empty
                            @endforelse
                        @elseif (in_array($attr, MyData::$BODY))
                            @forelse (App\Enums\Kerusakan::BODY() as $kerusakan)
                                <option @selected(old($attr) == $kerusakan) value="{{ $kerusakan }}">
                                    {{ Str::of($kerusakan)->title() }}</option>
                            @empty
                            @endforelse
                        @else
                            @forelse (App\Enums\Kerusakan::all() as $kerusakan)
                                <option @selected(old($attr) == $kerusakan) value="{{ $kerusakan }}">
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

        <div class="mt-6 flex justify-end">
            <button type="submit" class="btn">
                <x-icons.plus class="fill-base-content mr-2 h-4 w-4" />
                Simpan Data Latih
            </button>
        </div>
    </form>
</x-app-layout>
