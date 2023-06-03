<!-- Put this part before </body> tag -->
<input type="checkbox" id="add-part-modal" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
        <form x-data="sendViaAxios('suku-cadang')" id="add-part-form" action="{{ route('mobil.part.store', ['mobil' => $mobil->id]) }}"
            method="POST">
            @csrf

            <div class="form-control mb-3 w-full">
                <label class="label">
                    <span class="label-text">Nama Part</span>
                </label>
                <input type="text" name="part_nama" value="{{ old('part_nama') }}"
                    class="input input-bordered w-full" />
            </div>

            <div class="form-control mb-3 w-full">
                <label class="label">
                    <span class="label-text">Qty</span>
                </label>
                <input type="number" name="part_qty" value="{{ old('part_qty') }}"
                    class="input input-bordered w-full" />
            </div>

            <div class="form-control mb-6 w-full">
                <label class="label">
                    <span class="label-text">Harga / Unit</span>
                </label>
                <input type="number" name="part_harga" value="{{ old('part_harga') }}"
                    class="input input-bordered w-full" />
            </div>

            <div class="modal-action">
                <label for="add-part-modal" class="btn btn-ghost">Close</label>
                <button type="submit" class="btn">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
