<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/api/requestCabys', function (Request $request) {
    $curl = curl_init();
    // OBTENEMOS EL VALOR DEL INPUT
    $codigo = $request->input('codigo');
    // ARMAMOS EL URL
    $URL = 'https://api.hacienda.go.cr/fe/cabys?codigo=' . $codigo;

    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: TS01d94531=0120156b28e49ebd1dfeeca054b3b3cf0dd0e5a76b10f0f5b8012aa775ac17b984effd54bc9ff5ef104112e8d53fe39a4144e00040'
            ),
        )
    );

    $response = curl_exec($curl);

    // VERIFICAR SI HUBO ERRORES
    if ($response === false) {
        $error = curl_error($curl);
        curl_close($curl);
        return response()->json(['error' => 'Error al realizar la solicitud a la API: ' . $error], 500);
    }

    // CONVERTIMOS LA DATA EN JSON
    $responseData = json_decode($response, true);

    curl_close($curl);

    return response()->json($responseData);
})->name('api.requestCabys');
