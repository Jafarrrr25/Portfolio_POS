<?php
namespace App\Services;

use App\Models\menuKategori;

class MenuKategoriServices{

    public function create(array $data):menuKategori {

        return menuKategori::create([
            'jenis' => $data['jenis'],
        ]);

    }

    public function update(menuKategori $kategori, array $data): menuKategori {
        $kategori->update([
            'jenis' => $data['jenis']
        ]);
        return $kategori;
    }

    public function delete(menuKategori $kategori): void {
        $kategori->delete();
    }
}
?>