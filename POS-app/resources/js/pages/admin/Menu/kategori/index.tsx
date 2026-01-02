import AuthenticatedLayout from "@/layouts/AuthenticatedLayout";
import { router } from "@inertiajs/react";
import { Pencil, Trash } from "lucide-react";


type Kategori ={
    idKategori: number;
    jenis: string;
    jmlProduk: number;
}

export default function KategoriIndex({ kategori = [] }: { kategori: Kategori[] }) {
    const isEmpty = kategori.length === 0;
    return (
        <AuthenticatedLayout>
        <div className="w-full">
            <div className="flex justify-between mb-4">
                <h1 className="text-xl font-bold">Kategori Menu</h1>
                <button onClick={() => router.get("/addKategori")} className="bg-gossamer-500 text-white px-4 py-2 rounded">
                    Tambah Kategori
                </button>
            </div>

            <table className="w-full border rounded">
                <thead>
                    <tr className="bg-neutral-100 dark:bg-white/5">
                        <th className="p-2 text-left">Nama Kategori</th>
                        <th className="p-2 text-left">Jumlah Produk</th>
                        <th className="p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody className="border-t">
                    {isEmpty ? (
                        <tr>
                            <td colSpan={3} className="p-4 text-center text-neutral-500">
                                Tidak ada kategori yang ditemukan.
                            </td>
                        </tr>
                    ) : (
                        kategori.map((item) => (
                        <tr>
                            <td className="p-2">{item.jenis}</td>
                            <td className="p-2">{item.jmlProduk}</td>
                            <td className="p-2">
                            <button className="bg-blue-400 hover:bg-blue-600 text-white p-2 rounded mr-2 cursor-pointer" onClick={() => router.get(`/menu-kategori/${item.idKategori}/edit`)}>
                                <Pencil className="w-4 h-4" />
                            </button>
                            <button className="bg-red-400 hover:bg-red-600 text-white p-2 rounded mr-2 cursor-pointer" onClick={()=>router.delete(`/menu-kategori/${item.idKategori}`)}>
                                <Trash className="w-4 h-4" />
                            </button>
                            </td>
                        </tr>
                        ))
                    )}
                </tbody>
            </table>
        </div>
        </AuthenticatedLayout>
       
    )
}