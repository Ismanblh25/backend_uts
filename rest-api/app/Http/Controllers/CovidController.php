<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Covid;

class CovidController extends Controller
{
    public function index()
    {
        # menggunakan model Media untuk select data
        $covids = Covid::all();

        if (!empty($covids)) {
            $response = [
                'message' => 'Menampilkan Data Semua pasien Covid',
                'data' => $covids,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ada'
            ];
            return response()->json($response, 200);
        }
    }

    public function store(Request $request)
    {
        #validate
        $validateData = $request->validate([
            'id' => 'id pasien',
            'name' => 'nama pasien',
            'phone' => 'no hp pasien',
            'address' => 'alamat pasien',
            'status' => 'status pasien',
            'in_date_at' => 'tanggal masuk',
            'out_date_at' => 'tanggal keluar',
            'timestamp' => 'timestamp'
        ]);

        $covid = Covid::create($validateData);


        $data = [
            'message' => 'Covid is created succesfully',
            'data' => $covid,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $covid = Covid::find($id);

        if ($covid) {
            $response = [
                'message' => 'Get detail Covid',
                'data' => $covid
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response, 404);
        }
    }

    public function update(Request $request, $id)
    {
        $covid = Covid::find($id);

        if ($covid) {
            $response = [
                'message' => 'Covid is updated',
                'data' => $covid->update($request->all())
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response, 404);
        }
    }

    public function destroy($id)
    {
        $covid = Covid::find($id);

        if ($covid) {
            $response = [
                'message' => 'Covid is delete',
                'data' => $covid->delete()
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response, 404);
        }
    }
}