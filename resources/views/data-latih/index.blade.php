<x-app-layout>
   <div class="mt-8 mb-6 rounded-none px-1">
      @include('data-latih.breadcrumbs.index')
      <h1 class="text-2xl font-semibold">Data Latih</h1>
   </div>

   <div x-data="initListDataLatih" id="list-data-latih">
      <div class="mb-4 flex items-center justify-between">
         <div class="relative">
            <input type="search" placeholder="Cari data ..." class="input search input-bordered w-full max-w-xs" />
         </div>

         <a href="{{ route('data-latih.create') }}" class="btn">
            <x-icons.plus class="fill-base-content mr-2 h-4 w-4" />
            Button
         </a>
      </div>

      <div class="mb-4 overflow-x-auto rounded-lg border shadow">
         <table class="table w-full">
            <!-- head -->
            <thead class="bg-base-200 border-b">
               <tr class="">
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
                     <div class="sort flex cursor-pointer items-center gap-3" data-sort="class">
                        <span>class</span>
                        <div class="">
                           <x-icons.sort-up class="fill-base-300 sort-up -mb-3 h-3 w-3" />
                           <x-icons.sort-down class="fill-base-300 sort-down h-3 w-3" />
                        </div>
                     </div>
                  </th>

                  @forelse (MyData::attributes() as $attr)
                     <th class="whitespace-normal bg-inherit">
                        <span>{{ Str::of($attr)->replace('_', ' ') }}</span>
                     </th>
                  @empty
                  @endforelse

                  <th class="bg-inherit">
                  </th>
               </tr>
            </thead>
            <tbody class="list divide-y">
               @forelse ($allData as $data)
                  <tr class="">
                     <td class="no_polisi border-inherit uppercase">{{ $data->no_polisi }}</td>
                     <td class="class border-inherit capitalize"> {{ $data->class }}</td>
                     @forelse (MyData::attributes() as $attr)
                        <td class="border-inherit capitalize"> {{ $data[$attr] }}</td>
                     @empty
                     @endforelse

                     <td class="border-inherit">
                        <div class="space-x-1">
                           <a href="{{ route('data-latih.edit', ['data_latih' => $data->id]) }}" class="btn btn-sm">
                              Edit
                           </a>

                           <form delete-form action="{{ route('data-latih.destroy', ['data_latih' => $data->id]) }}"
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
