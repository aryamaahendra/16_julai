<div class="mb-4 flex justify-end">
    <label for="add-part-modal" class="btn">
        <x-icons.plus class="fill-base-content mr-2 h-4 w-4" />
        Tambah
    </label>
</div>

<div class="overflow-x-auto rounded-xl bg-white shadow">
    <table class="table-zebra table w-full">
        <!-- head -->
        <thead>
            <tr>
                <th class="bg-inherit" style="position: unset;">Nama Part</th>
                <th>Qty</th>
                <th>Harga /Unit</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="divide-y border">
            @forelse ($mobil->part as $part)
                <tr>
                    <td>{{ $part->nama }}</td>
                    <td class="w-1">{{ $part->qty }}</td>
                    <td class="w-1">{{ $part->harga }}</td>
                    <td class="w-1">{{ $part->total_harga }}</td>
                    <td class="w-1">
                        <div class="">
                            <form delete-form
                                action="{{ route('mobil.part.destroy', ['mobil' => $mobil->id, 'part' => $part->id]) }}"
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
