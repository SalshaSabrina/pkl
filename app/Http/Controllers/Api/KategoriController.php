<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'kategori tidak ditemukan'
            ];
            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'Berhasil .'
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required|min:15'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }

        $kategori = Kategori::create($input);
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'kategori berhasil ditambahkan'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'kategori tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'Berhasil .'
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $input = $request->all();

        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'kategori tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $validator = Validator::make($input, [
            'nama' => 'required|min:15'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }
        $kategori->nama = $input['nama'];
        $kategori->save();

        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'kategori berhasil diupdate'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => 'Gagal menghapus.',
                'message' => 'kategori tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $kategori->delete();
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'kategori berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}
