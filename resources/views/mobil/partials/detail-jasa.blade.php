<div class="mb-4 flex justify-end">
    <label for="add-jasa-modal" class="btn">
        <x-icons.plus class="fill-base-content mr-2 h-4 w-4" />
        Tambah
    </label>
</div>

<div class="overflow-x-auto rounded-xl bg-white shadow">
    <table class="table-zebra table w-full">
        <!-- head -->
        <thead>
            <tr>
                <th class="bg-inherit" style="position: unset;">Nama Jasa</th>
                <th>Status</th>
                <th>Harga</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="divide-y border">
            @forelse ($mobil->jasa as $jasa)
                <tr>
                    <td>{{ $jasa->nama }}</td>
                    <td>{{ $jasa->status }}</td>
                    <td class="w-1">{{ $jasa->harga }}</td>
                    <td class="w-1">
                        <div class="">
                            <form delete-form
                                action="{{ route('mobil.jasa.destroy', ['mobil' => $mobil->id, 'jasa' => $jasa->id]) }}"
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-error btn-xs">
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
