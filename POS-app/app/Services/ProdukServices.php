<?php

namespace App\Services;

use App\Models\produk;
use Illuminate\Support\Facades\Storage;

class ProdukServices {
    public function create(array $data): produk {
        if(isset($data['fotoMenu'])) {
            $data['fotoMenu'] = $data['fotoMenu']->store('menu', 'public');
        }

        $data['statusMenu'] = $data['jmlStok'] > 0;

        return produk::create($data);
    }

    public function update(produk $produk, array $data): produk {
        if(isset($data['fotoMenu'])) {
            if ($produk->fotoMenu) {
                Storage::disk('public')->delete($produk->fotoMenu);
            }

            $data['fotoMenu'] = $data['fotoMenu']->store('menu','public');
        }

        if (isset($data['jmlStok'])) {
            $data['statusMenu'] = $data['jmlStok'] > 0;
        }
        $produk->update($data);
        return $produk;
    }

    public function delete(produk $produk):void {
        $produk->update([
            'statusMenu' => false,
        ]);
    }
}