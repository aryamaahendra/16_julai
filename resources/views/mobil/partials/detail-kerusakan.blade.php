<div class="bg-base-100 rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="table-zebra table w-full">
            <tbody class="divide-y">
                @forelse (MyData::attributes() as $attr)
                    <tr class="">
                        <td class="capitalize w-1">{{ Str::of($attr)->replace('_', ' ') }}</td>
                        <td class="capitalize">: {{ $mobil->kerusakan[$attr] }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
