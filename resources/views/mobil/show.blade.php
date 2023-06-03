<x-app-layout>
    <div class="mt-8 mb-10 flex items-center justify-between rounded-none px-1">
        <div class="">
            @include('mobil.breadcrumbs.show')
            <h1 class="text-2xl font-semibold">Detail Mobil</h1>
        </div>

        <div class="">
            <a href="{{ route('mobil.print', ['mobil' => $mobil->id]) }}" target="_blank" class="btn">
                <x-icons.print class="fill-base-content mr-2 h-4 w-4" />
                print
            </a>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-8">
        <div x-data="{ page: new URLSearchParams(location.search).get('page') ?? 'kerusakan' }" class="col-span-3">
            <div class="tabs tabs-boxed mb-4">
                <a :class="page == 'kerusakan' && 'tab-active'" x-on:click="page = 'kerusakan'" class="tab font-medium">
                    Kerusakan
                </a>

                <a :class="page == 'jasa' && 'tab-active'" x-on:click="page = 'jasa'" class="tab font-medium">
                    Jasa
                </a>

                <a :class="page == 'suku-cadang' && 'tab-active'" x-on:click="page = 'suku-cadang'"
                    class="tab font-medium">
                    Suku Cadang
                </a>
            </div>

            <div x-clock x-transition x-show="page == 'kerusakan'">
                @include('mobil.partials.detail-kerusakan')
            </div>
            <div x-clock x-transition x-show="page == 'jasa'">
                @include('mobil.partials.detail-jasa')
            </div>
            <div x-clock x-transition x-show="page == 'suku-cadang'">
                @include('mobil.partials.detail-part')
            </div>
        </div>
        <div class="col-span-2">
            @include('mobil.partials.detail-mobil')
        </div>
    </div>

    @push('modal')
        @include('mobil.partials.detail-add-jasa-modal')
        @include('mobil.partials.detail-add-part-modal')
    @endpush
</x-app-layout>
