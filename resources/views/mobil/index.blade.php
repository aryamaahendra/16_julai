<x-app-layout>
    <div class="mt-8 mb-6 rounded-none px-1">
        @include('mobil.breadcrumbs.index')
        <h1 class="text-2xl font-semibold">List Mobil Masuk</h1>
    </div>

    <div x-data="iniListMobil" id="list-mobil">
        <div class="mb-4 flex items-center justify-between">
            <div class="relative">
                <input type="search" placeholder="Cari data ..." class="input search input-bordered w-full max-w-xs" />
            </div>

            <a href="{{ route('mobil.create') }}" class="btn">
                <x-icons.plus class="fill-base-content mr-2 h-4 w-4" />
                Tambah Baru
            </a>
        </div>

        <div class="mb-4 overflow-x-auto rounded-lg border shadow">
            <table class="table w-full">
                <!-- head -->
                <thead class="bg-base-200 border-b">
                    <tr class="">
                        <th class="bg-inherit" style="position: unset;">
                            <div class="sort flex cursor-pointer items-center gap-3" data-sort="nama_pemilik">
                                <span>Nama Pemilik</span>
                                <div class="">
                                    <x-icons.sort-up class="fill-base-300 sort-up -mb-3 h-3 w-3" />
                                    <x-icons.sort-down class="fill-base-300 sort-down h-3 w-3" />
                                </div>
                            </div>
                        </th>

                        <th class="bg-inherit" style="position: unset;">
                            <div class="sort flex cursor-pointer items-center gap-3" data-sort="no_polisi">
                                <span>No Polisi</span>
                                <div class="">
                                    <x-icons.sort-up class="fill-base-300 sort-up -mb-3 h-3 w-3" />
                                    <x-icons.sort-down class="fill-base-300 sort-down h-3 w-3" />
                                </div>
                            </div>
                        </th>

                        <th class="bg-inherit">
                            <div class="sort flex cursor-pointer items-center gap-3" data-sort="tgl_masuk">
                                <span>Tanggal Masuk</span>
                                <div class="">
                                    <x-icons.sort-up class="fill-base-300 sort-up -mb-3 h-3 w-3" />
                                    <x-icons.sort-down class="fill-base-300 sort-down h-3 w-3" />
                                </div>
                            </div>
                        </th>

                        <th class="bg-inherit">
                            <div class="sort flex cursor-pointer items-center gap-3" data-sort="jenis_kerusakan">
                                <span>Jenis Kerusakan</span>
                                <div class="">
                                    <x-icons.sort-up class="fill-base-300 sort-up -mb-3 h-3 w-3" />
                                    <x-icons.sort-down class="fill-base-300 sort-down h-3 w-3" />
                                </div>
                            </div>
                        </th>

                        <th class="bg-inherit">
                        </th>
                    </tr>
                </thead>
                <tbody class="list divide-y">
                    @forelse ($allMobil as $mobil)
                        <tr class="">
                            <td class="nama_pemilik border-inherit capitalize">{{ $mobil->nama_pemilik }}</td>
                            <td class="no_polisi border-inherit uppercase">{{ $mobil->no_polisi }}</td>
                            <td class="tgl_masuk border-inherit capitalize"> {{ $mobil->masuk_at }}</td>
                            <td class="jenis_kerusakan border-inherit capitalize"> {{ $mobil->jenis_kerusakan }}</td>

                            <td class="w-1 border-inherit">
                                <div class="space-x-1">
                                    <a href="{{ route('mobil.show', ['mobil' => $mobil->id]) }}" class="btn btn-sm">
                                        View
                                    </a>

                                    <a href="{{ route('mobil.edit', ['mobil' => $mobil->id]) }}" class="btn btn-sm">
                                        Edit
                                    </a>

                                    <form delete-form action="{{ route('mobil.destroy', ['mobil' => $mobil->id]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-error btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex justify-end">
            <ul class="btn-group pagination">
            </ul>
        </div>
    </div>
</x-app-layout>
