<x-app-layout>
   <div class="mt-8 mb-6 rounded-none px-1">
      @include('Klasifikasi.breadcrumbs.index')
      <h1 class="text-2xl font-semibold">Klasifikasi KNN</h1>
   </div>

   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif

   <form class="bg-base-100 mx-auto max-w-4xl rounded-lg p-6 shadow" action="{{ route('klasifikasi.proces') }}"
      method="POST">
      @csrf

      <div class="form-control mb-2 w-full">
         <label for="k" class="label">
            <span class="label-text">Nilai K</span>
         </label>
         <input type="number" class="input input-bordered w-full" name="k" value="{{ old('k') ?? 7 }}"
            autofocus />
         @error('k')
            <label class="label">
               <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
         @enderror
      </div>

      <div class="grid grid-cols-3 gap-6">
         @forelse (MyData::attributes() as $attr)
            <div class="form-control w-full">
               <label for="{{ $attr }}" class="label">
                  <span class="label-text capitalize">{{ Str::of($attr)->replace('_', ' ') }}</span>
               </label>
               <select class="select select-bordered" name="{{ $attr }}">
                  @forelse (App\Enums\Kerusakan::all() as $kerusakan)
                     <option @selected(old($attr) == $kerusakan) value="{{ $kerusakan }}">
                        {{ Str::of($kerusakan)->title() }}</option>
                  @empty
                  @endforelse
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
            <x-icons.microchip class="fill-base-content mr-2 h-4 w-4" />
            Klasifikasi
         </button>
      </div>
   </form>
</x-app-layout>
