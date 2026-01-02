import SidebarDashboard from "@/components/sidebarDashboard";
import AuthenticatedLayout from "@/layouts/AuthenticatedLayout";
import { Link, Sidebar } from "lucide-react";
import { ReactNode } from "react";

export default function MenuIndex() {
    return (
        <AuthenticatedLayout>
        <div className="p-6">
            <h1 className="text-2xl font-bold mb-6">Manajemen Menu</h1>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <Link
                    href="/menu-kategori"
                    className="p-6 rounded-lg border hover:bg-neutral-50 dark:hover:bg-white/5">
                    <h2 className="text-lg font-semibold">Kategori Menu</h2>
                    <p className="text-sm text-neutral-500">Manajemen kategori menu</p>
                </Link>
                <Link href="/produk"
                className="p-6 rounded-lg border hover:bg-neutral-50 dark:hover:bg-white/5">
                        <h2 className="text-lg font-semibold">Produk Menu</h2>
                    <p className="text-sm text-neutral-500">
                        Atur menu yang dijual seperti Cappuccino, Latte, dll
                    </p>
                </Link>
            </div>
        </div>
        </AuthenticatedLayout>
        
    )
}