<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Models\menuKategori;
use App\Services\MenuKategoriServices;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuKategoriController extends Controller{

    public function __construct(protected MenuKategoriServices $services)
    {}

    public function index() {
        return Inertia::render('admin/Menu/kategori/index', [
            'kategori' => menuKategori::withCount('produk')->get(),
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        $this->services->create($validated);

        return redirect()->back();
    }

    public function update(Request $request, menuKategori $kategori) {
        $validated = $request->validate([
            'jenis' => 'required|string|max:255',
        ]);

        $this->services->update($kategori, $validated);

        return redirect()->back();
    }

    public function destroy(menuKategori $kategori) {
        $this->services->delete($kategori);
        return redirect()->back();
    }

}

