import AuthenticatedLayout from "@/layouts/AuthenticatedLayout";
import { router } from "@inertiajs/react";
import { Plus } from "lucide-react";

type Produk ={
    idProduk: number;
    namaMenu: string;
    kategori: string;
    hargaMenu: number;
    jmlStok: number;
    statusMenu: string;

}

export default function ProdukIndex({produk =[]}:{produk: Produk[]}) {
    const isEmpty = produk.length === 0;
    return (
        <AuthenticatedLayout>
            <div className="w-full">
            <div className="flex justify-between items-center mb-6">
                <h1 className="text-2xl font-bold">Produk Menu</h1>
                <button
                    onClick={() => router.get("/admin/produk/create")}
                    className="bg-gossamer-500 hover:bg-gossamer-600 text-white px-4 py-2 rounded-lg cursor-pointer">
                    <div className="flex flex-col-1 justify-center items-center">
                        <Plus size={16} className="inline mr-2 font-bold" />
                        Tambah Produk
                    </div>
                </button>
            </div>
            <table className="w-full border rounded">
                <thead>
                    <tr className="bg-neutral-100 dark:bg-white/5">
                        <th className="p-2 text-left">Nama Menu</th>
                        <th className="p-2 text-left">Kategori</th>
                        <th className="p-2 text-left">Harga</th>
                        <th className="p-2 text-left">Stok</th>
                        <th className="p-2 text-left">Status</th>
                        <th className="p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     {isEmpty ? (
                            <tr>
                                <td colSpan={6}
                                    className="p-4 text-center text-neutral-500">
                                    Menu Kosong
                                </td>
                            </tr>
                        ) : (
                            produk.map((item) => (
                                <tr key={item.idProduk} className="border-t">
                                    <td className="p-2">{item.namaMenu}</td>
                                    <td className="p-2">{item.kategori}</td>
                                    <td className="p-2">
                                        Rp{" "}
                                        {item.hargaMenu.toLocaleString("id-ID")}
                                    </td>
                                    <td className="p-2">{item.jmlStok}</td>
                                    <td className="p-2">
                                        <span
                                            className={`px-2 py-1 text-xs rounded ${
                                                item.statusMenu === "aktif"
                                                    ? "bg-green-500/20 text-green-400"
                                                    : "bg-red-500/20 text-red-400"
                                            }`}
                                        >
                                            {item.statusMenu}
                                        </span>
                                    </td>
                                    <td className="p-2 space-x-2">
                                        <button
                                            className="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
                                            onClick={() =>
                                                router.get(
                                                    `/admin/produk/${item.idProduk}/edit`
                                                )
                                            }
                                        >
                                            Edit
                                        </button>

                                        <button
                                            className="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                            onClick={() =>
                                                router.delete(
                                                    `/admin/produk/${item.idProduk}`
                                                )
                                            }
                                        >
                                            Hapus
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
