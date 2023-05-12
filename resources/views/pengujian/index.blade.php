<x-app-layout>
   <div class="mt-8 mb-6 rounded-none px-1">
      @include('pengujian.breadcrumbs.index')
      <h1 class="text-2xl font-semibold">Pengujian CN</h1>
   </div>

   <form class="bg-base-100 mx-auto mb-8 max-w-4xl rounded-lg p-6 shadow" action="{{ route('pengujian.proces') }}"
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

      <div class="mt-6 flex justify-end">
         <button type="submit" class="btn">
            <x-icons.microchip class="fill-base-content mr-2 h-4 w-4" />
            Pengujian
         </button>
      </div>
   </form>

   @if (!empty($cn))
      <div class="mx-auto mb-8 max-w-4xl overflow-x-auto rounded-lg border shadow">
         <table class="table w-full">
            <!-- head -->
            <thead class="bg-base-200 border-b">
               <tr class="border-gray-200">
                  <th rowspan="2" colspan="2" class="border-r border-gray-200 bg-inherit text-center"
                     style="position: unset;">
                     Confusion Matrix
                  </th>
                  <th colspan="4" class="border border-gray-200 bg-inherit text-center" style="position: unset;">
                     Predicted
                  </th>
               </tr>
               <tr class="border-gray-200">
                  @forelse (App\Enums\JenisKerusakan::all() as $class)
                     <th class="border border-gray-200 bg-inherit" style="position: unset;">
                        <span>{{ $class }}</span>
                     </th>
                  @empty
                  @endforelse
               </tr>
            </thead>
            <tbody class="list divide-y">
               <tr class="border-gray-200">
                  <td rowspan="5" class="w-1 border border-gray-200">Actual</td>
               </tr>
               @forelse (App\Enums\JenisKerusakan::all() as $actual)
                  <tr class="border-gray-200">
                     <td role="" class="border border-gray-200 capitalize">{{ $actual }}</td>
                     @forelse (App\Enums\JenisKerusakan::all() as $predicted)
                        @php
                           $actual = Str::replace(' ', '_', $actual);
                           $predicted = Str::replace(' ', '_', $predicted);
                        @endphp

                        <td class="border border-gray-200 capitalize">
                           {{ $cn[$actual][$predicted] }}
                        </td>
                     @empty
                     @endforelse
                  </tr>
               @empty
               @endforelse
            </tbody>
         </table>
      </div>
   @endif
</x-app-layout>
