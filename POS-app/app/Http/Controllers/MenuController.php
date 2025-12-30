<?php

use App\Models\menuKategori;
use App\Models\produk;
use App\Http\Controllers\Controller;

class menuController extends Controller {
    public function index() {
        $data = menuKategori::with('produk')->get();

        return response()->json([
            'total_menu' => produk::count(),
            'data' => $data
        ]);
    }

}
?>