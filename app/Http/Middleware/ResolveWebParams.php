<?php

namespace App\Http\Middleware;

use App\Models\DataLatih;
use App\Models\DataUji;
use App\Models\Mobil;
use App\Models\MobilJasa;
use App\Models\MobilPart;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResolveWebParams
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $parameters = $request->route()->parameters();

        if (array_key_exists('data_latih', $parameters)) {
            $latih = DataLatih::find($parameters['data_latih']);

            if (empty($latih)) abort(404, 'Data latih tidak ditemukan!');
            $request->route()->setParameter('data_latih', $latih);
        }

        if (array_key_exists('data_uji', $parameters)) {
            $uji = DataUji::find($parameters['data_uji']);

            if (empty($uji)) abort(404, 'Data uji tidak ditemukan!');
            $request->route()->setParameter('data_uji', $uji);
        }

        if (array_key_exists('mobil', $parameters)) {
            $mobil = Mobil::find($parameters['mobil']);

            if (empty($mobil)) abort(404, 'Data mobil tidak ditemukan!');
            $request->route()->setParameter('mobil', $mobil);
        }

        if (array_key_exists('jasa', $parameters)) {
            $jasa = MobilJasa::find($parameters['jasa']);

            if (empty($jasa)) abort(404, 'Data mobil tidak ditemukan!');
            $request->route()->setParameter('jasa', $jasa);
        }

        if (array_key_exists('part', $parameters)) {
            $part = MobilPart::find($parameters['part']);

            if (empty($part)) abort(404, 'Data mobil tidak ditemukan!');
            $request->route()->setParameter('part', $part);
        }

        return $next($request);
    }
}
