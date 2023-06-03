<!-- Put this part before </body> tag -->
<input type="checkbox" id="add-jasa-modal" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
        <form x-data="sendViaAxios" id="add-jasa-form" action="{{ route('mobil.jasa.store', ['mobil' => $mobil->id]) }}"
            method="POST">
            @csrf

            <div class="form-control mb-3 w-full">
                <label class="label">
                    <span class="label-text">Nama Jasa</span>
                </label>
                <input type="text" name="jasa_nama" value="{{ old('jasa_nama') }}"
                    class="input input-bordered w-full" />
            </div>

            <div class="form-control mb-3 w-full">
                <label class="label">
                    <span class="label-text">Status</span>
                </label>
                <input type="text" name="jasa_status" value="{{ old('jasa_status') }}"
                    class="input input-bordered w-full" />
            </div>

            <div class="form-control mb-6 w-full">
                <label class="label">
                    <span class="label-text">Harga</span>
                </label>
                <input type="number" name="jasa_harga" value="{{ old('jasa_harga') }}"
                    class="input input-bordered w-full" />
            </div>

            <div class="modal-action">
                <label for="add-jasa-modal" class="btn btn-ghost">Close</label>
                <button type="submit" class="btn">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
