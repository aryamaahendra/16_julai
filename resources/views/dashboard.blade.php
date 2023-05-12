<x-app-layout>
   <div class="stats mt-8 w-full shadow">
      <div class="stat">
         <div class="stat-figure text-secondary">
            <x-icons.database class="fill-secondary h-8 w-8" />
         </div>
         <div class="stat-title">Data Uji</div>
         <div class="stat-value">{{ $data['uji'] ?? 0 }}</div>
         {{-- <div class="stat-desc">Jan 1st - Feb 1st</div> --}}
      </div>

      <div class="stat">
         <div class="stat-figure text-secondary">
            <x-icons.database class="fill-secondary h-8 w-8" />
         </div>
         <div class="stat-title">Data Latih</div>
         <div class="stat-value">{{ $data['latih'] ?? 0 }}</div>
         {{-- <div class="stat-desc">↗︎ 400 (22%)</div> --}}
      </div>

      <div class="stat">
         <div class="stat-figure text-secondary">
            <x-icons.car class="fill-secondary h-8 w-8" />
         </div>
         <div class="stat-title">Mobil</div>
         <div class="stat-value">{{ $data['mobil'] ?? 0 }}</div>
         {{-- <div class="stat-desc">↘︎ 90 (14%)</div> --}}
      </div>

   </div>
</x-app-layout>
