<x-app-layout>
   <div class="mt-8 mb-6 rounded-none px-1">
      @include('Klasifikasi.breadcrumbs.proces')
      <h1 class="text-2xl font-semibold">Hasil KNN</h1>
   </div>

   <div x-data="initListHasilKNN" id="list-hasil-knn">
      <div class="mb-8 flex items-center justify-between">
         <div class="relative">
            <input type="search" placeholder="Cari data ..." class="input search input-bordered w-full max-w-xs" />
         </div>

         <a href="{{ route('klasifikasi.index') }}" class="btn">
            <x-icons.plus class="fill-base-content mr-2 h-4 w-4" />
            Data Baru
         </a>
      </div>

      @if (!empty($kerusakan))
         <div class="alert alert-success mb-6 shadow-lg">
            <div>
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current" fill="none"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
               </svg>
               <span>
                  Kenis kerusakan diperkirakan <span class="font-semibold">{{ $kerusakan['class'] }}</span> dengan total
                  klass muncul {{ $kerusakan['total'] }}
               </span>
            </div>
         </div>
      @else
         <div class="alert alert-error mb-6 shadow-lg">
            <div>
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-shrink-0 stroke-current" fill="none"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
               </svg>
               <span>Kerusakan tidak dapat dideteksi.</span>
            </div>
         </div>
      @endif

      <div class="mb-4 overflow-x-auto rounded-lg border shadow">
         <table class="table w-full">
            <!-- head -->
            <thead class="bg-base-200 border-b">
               <tr class="">
                  <th class="bg-inherit">
                     <div class="sort flex cursor-pointer items-center gap-3" data-sort="class">
                        <span>class</span>
                        <div class="">
                           <x-icons.sort-up class="fill-base-300 sort-up -mb-3 h-3 w-3" />
                           <x-icons.sort-down class="fill-base-300 sort-down h-3 w-3" />
                        </div>
                     </div>
                  </th>
                  <th class="bg-inherit" style="position: unset;">
                     <div class="sort flex cursor-pointer items-center gap-3" data-sort="euclidean">
                        <span>Euclidean</span>
                        <div class="">
                           <x-icons.sort-up class="fill-base-300 sort-up -mb-3 h-3 w-3" />
                           <x-icons.sort-down class="fill-base-300 sort-down h-3 w-3" />
                        </div>
                     </div>
                  </th>
               </tr>
            </thead>
            <tbody class="list divide-y">
               @forelse ($allResult as $data)
                  <tr class="">
                     <td class="class border-inherit capitalize"> {{ $data['class'] }}</td>
                     <td class="euclidean border-inherit uppercase">{{ $data['euclidean'] }}</td>
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
