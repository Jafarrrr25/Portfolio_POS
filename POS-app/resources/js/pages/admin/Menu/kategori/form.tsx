import { useForm } from "@inertiajs/react";
import React from "react";

export default function KategoriForm({ kategori}:any) {
    type KategoriFormData = {
        jenis: string;
    };
    const {data, setData, post, put, processing, } = useForm<KategoriFormData>({
        jenis:kategori?.jenis || ""
    });

    const submit = (e:React.FormEvent) => {
        e.preventDefault();

        kategori
            ? put(`/menu-kategori/${kategori.idKategori}`) 
            : post('/menu-kategori');
    }

    return (
        <div className="p-6 max-w-md">
      <h1 className="text-xl font-bold mb-4">
        {kategori ? "Edit Kategori" : "Tambah Kategori"}
      </h1>

      <form onSubmit={submit} className="space-y-4">
        <input
          type="text"
          placeholder="Nama kategori"
          value={data.jenis}
          onChange={(e) => setData("jenis", e.target.value)}
          className="w-full border rounded p-2"
        />

        <button
          disabled={processing}
          className="bg-gossamer-500 text-white px-4 py-2 rounded"
        >
          Simpan
        </button>
      </form>
    </div>
    );
}