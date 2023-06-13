<ul class="menu bg-base-100 text-base-content w-80 space-y-1 border-r p-4">
    <div class="mb-6">
        <a class="flex justify-center">
            <img src="{{ asset('1686168300215.png') }}" alt="logo bengkel" class="h-20 w-20">
        </a>
    </div>

    @php
        $routeName = Route::currentRouteName();
        $segment1 = request()->segment(1) ?? '';
    @endphp

    <li>
        <a href="{{ route('dashboard') }}" @class(['active' => $segment1 == 'dashboard'])>
            <x-icons.chart-pie class="fill-base-content h-4 w-4" />
            Dashboard
        </a>
    </li>
    <li>
        <a href="{{ route('mobil.index') }}" @class(['active' => $segment1 == 'mobil'])>
            <x-icons.car class="fill-base-content h-4 w-4" />
            Data Mobil
        </a>
    </li>
    <li>
        <a href="{{ route('data-latih.index') }}" @class(['active' => $segment1 == 'data-latih'])>
            <x-icons.database class="fill-base-content h-4 w-4" />
            Data Latih
        </a>
    </li>
    <li>
        <a href="{{ route('data-uji.index') }}" @class(['active' => $segment1 == 'data-uji'])>
            <x-icons.database class="fill-base-content h-4 w-4" />
            Data Uji
        </a>
    </li>
    <li>
        <a href="{{ route('klasifikasi.index') }}" @class(['active' => $segment1 == 'klasifikasi'])>
            <x-icons.microchip class="fill-base-content h-4 w-4" />
            Klasifikasi
        </a>
    </li>
    <li>
        <a href="{{ route('pengujian.index') }}" @class(['active' => $segment1 == 'pengujian'])>
            <x-icons.table-cels class="fill-base-content h-4 w-4" />
            Confusian Matrix
        </a>
    </li>
</ul>
