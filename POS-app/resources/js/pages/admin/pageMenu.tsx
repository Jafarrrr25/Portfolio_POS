import { useState } from "react";
import menuGrid from "../components/menu/menuGrid";
import { MenuKategori } from "@/types/menu";
import emptyMenu from "../components/menu/emptyMenu";

const pageMenu = () =>{
    const[produk] = useState<MenuKategori[]>([]);

    return (
        <div className="p-6 text-white">
            <h1 className="text-xl font-semibold mb-8">
                Pilihan Menu 
            </h1>

            {produk.length === 0 ? (
                <emptyMenu />
            ):(
                <menuGrid data={produk}/>

            )}
        </div>
    )
}