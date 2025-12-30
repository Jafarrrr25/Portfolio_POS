export interface Produk {
    idProduk: number;
    namaMenu: string;
    fotoMenu: string | null;
    hargaMenu: number;
    statusMenu: 'Ada' | 'Habis';
}

export interface MenuKategori {
    idKategori: number;
    jenis: string;
    produk: Produk[];
}