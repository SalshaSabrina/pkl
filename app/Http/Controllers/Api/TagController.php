<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all();
        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Tag tidak ditemukan'
            ];
            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $tag,
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
            'nama_tag' => 'required|min:15'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }

        $tag = Tag::create($input);
        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Tag berhasil ditambahkan'
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
        $tag = Tag::find($id);
        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Tag tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'success' => true,
            'data' => $tag,
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
        $tag = Tag::find($id);
        $input = $request->all();

        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Tag tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $validator = Validator::make($input, [
            'nama_tag' => 'required|min:15'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validator Eror',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }
        $tag->nama_tag = $input['nama_tag'];
        $tag->save();

        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Tag berhasil diupdate'
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
        $tag = Tag::find($id);
        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Gagal menghapus.',
                'message' => 'Tag tidak ditemukan'
            ];
            return response()->json($response, 404);
        }
        $tag->delete();
        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Tag berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}
