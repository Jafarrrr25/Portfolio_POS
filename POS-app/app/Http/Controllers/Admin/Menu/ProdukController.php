<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;

use App\Models\menuKategori;
use App\Models\produk;
use App\Services\ProdukServices;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProdukController extends Controller{
    public function __construct(protected ProdukServices $services)
    {}

    public function index() {
        $produk = produk::with(`menuKategori:idKategori,jenis`)->orderBy('namaMenu')->get()
        ->map(fn ($p) =>[
            'idProduk' => $p->idProduk,
            'namaMenu' => $p->namaMenu,
            'tipeMenu' => $p->menuKategori?->jenis ?? '-',
            'hargaMenu' => $p->hargaMenu,
            'jmlStok' => $p->jmlStok,  
            'statusMenu' => $p->statusMenu,
        ]);
        return inertia('admin/Menu/Produk/index', [
            'produk' => $produk,
        ]);
    }

    public function create() {
        return Inertia::render('Produk/Form', [
            'kategori' => menuKategori::all(),
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:menuKategori,idKategori',
            'namaMenu' => 'required|string|max:150',
            'hargaMenu' => 'required|numeric',
            'jmlStok' => 'required|integer',
            'fotoMenu' => 'nullable|image',
        ]);

        $this->services->create($validated);

        return redirect()->route('produk.index');
    }

    public function update(Request $request, produk $produk) {
        $validated = $request->validate([
            'namaMenu' => 'required|string|max:150',
            'hargaMenu' => 'required|numeric',
            'jmlStok' => 'required|integer',
            'fotoMenu' => 'nullable|image',
        ]);

        $this->services->update($produk, $validated);

        return redirect()->back();
    }

    public function destroy(produk $produk) {
        $this->services->delete($produk);

        return redirect()->back();
    }
}