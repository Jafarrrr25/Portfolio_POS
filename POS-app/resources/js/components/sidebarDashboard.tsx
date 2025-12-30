import { Link, router, usePage } from "@inertiajs/react";
import {
    LayoutDashboard,
    ScanLine,
    BarChart,
    CalendarClock,
    TrendingUp,
    Package,
    Settings,
    LogOut,
    Sun,
    Moon,
    ChevronsLeft,
    ChevronsRight,
    User,
    Users,
    Layers
} from "lucide-react";
import React, { useEffect, useRef, useState } from "react";

type AuthUser = {
    nama?: string;
    role?: string;
    namaPegawai?: string;
    jabatan?: string;
}

type SidebarProps = {
    open: boolean;
    mini: boolean;
    onClose: () => void;
    onToggleMini: () => void;
    isDark: boolean;
    onToggleTheme: () => void;
};

type NavItemProps = {
    href: string;
    label: string;
    mini: boolean;
    icon: React.ElementType;
};

function NavItem({ href, label, mini, icon: Icon }: NavItemProps) {
    return (
        <Link
            href={href}
            className="flex items-center gap-3 px-4 py-3 rounded-md hover:bg-white/10 transition"
        >
            <Icon size={20} />
            {!mini && <span
                className={`transition-all duration-300 whitespace-nowrap overflow-hidden ease-in-out
                    ${mini ? "opacity-0 w-0 -translate-x-2" : "opacity-100 w-auto translate-x-0"}`}
            >
                {label}
            </span>}
        </Link>
    );
}

export default function SidebarDashboard({
    open,
    mini,
    onClose,
    onToggleMini,
    isDark,
    onToggleTheme
}: SidebarProps) {
    
    const { props } =  usePage<any>();
    const user = props.auth?.user;
    const role = user?.role;

    const isAdmin = role === 'admin';
    const isBranch = !isAdmin;

    const [profileOpen, setProfileOpen] = useState(false);
    const profileRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        const handleClickOutside = (e:MouseEvent)=>{
            if (profileRef.current && !profileRef.current.contains(e.target as Node)) {
                setProfileOpen(false);
            }
        }
        document.addEventListener("mousedown", handleClickOutside);
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, []);

    return (
        <>
            {/* Overlay mobile */}
            {open && (
                <div
                    onClick={onClose}
                    className="fixed inset-0 bg-black/40 z-40 lg:hidden"
                />
            )}

            <aside
                className={`fixed  left-0 top-0 h-screen 
              dark:bg-gossamer-700 dark:text-neutral-50
              text-neutral-50 bg-gossamer-500 z-30
                flex flex-col transition-all duration-300 
                ${mini ? "w-18" : "w-64"}`}
            >
                {/* Logo */}
                <div className="h-18 flex items-center justify-center border-b border-white/20 font-bold">
                    {mini ? "=" : "POS APP"}
                </div>

                {/* Menu */}
                <nav className="flex-1 p-2 space-y-1 overflow-hidden ">
                    <NavItem href="/dashboard" icon={LayoutDashboard} label="Dashboard" mini={mini} />
                    <NavItem href="/kasir" icon={ScanLine} label="Kasir" mini={mini} />
                    <NavItem href="/penjualan" icon={BarChart} label="Rekap Penjualan" mini={mini} />
                    <NavItem href="/bahan" icon={Package} label="Rekap Bahan" mini={mini} />
                    <>
                    {!isAdmin && (
                        <NavItem href="/shift" icon={CalendarClock} label="Shift" mini={mini} />
                    )}
                    </>
                    
                    <NavItem href="/laporan" icon={TrendingUp} label="Laporan Keuangan" mini={mini} />
                    {/* tambahan menu  */}
                    {isAdmin && (
                        <>
                        <NavItem href="/pegawai" icon={Users} label="Pegawai" mini={mini} />
                        <NavItem href="/manajemen-menu" icon={Layers} label="Manajemen Menu" mini={mini} />
                        </>
                    )}
                    <NavItem href="/settings" icon={Settings} label="Pengaturan Menu" mini={mini} />
                </nav>

                {/* PROFILE SECTION */}
                <div ref={profileRef} className="relative p-3 border-t border-white/20">
                    {/* Dropdown */}
                    {profileOpen && (
                        <div className="absolute bottom-full left-3 right-3 mb-2 bg-gossamer-100 text-neutral-800 dark:bg-neutral-800 dark:text-neutral-50 rounded-lg shadow-lg overflow-hidden cursor-pointer">
                            <button
                                onClick={onToggleTheme}
                                className="flex items-center gap-3 w-full px-4 py-3 hover:bg-white/10 cursor-pointer "
                            >
                                {isDark ? (
                                    <Sun size={18} className="text-yellow-500" />
                                ) : (
                                    <Moon size={18} className="text-neutral-800"/>
                                )}
                                {!mini && (
                                    <span>{isDark ? "Light Mode" : "Dark Mode"}</span>
                                )}

                            </button>

                            <button
                                onClick={() => router.post("/logout")}
                                className="flex items-center gap-3 w-full px-4 py-3 hover:bg-red-500/20 dark:text-red-400 text-red-600 cursor-pointer"
                            >
                                <LogOut size={18} />
                                {!mini && <span>Logout</span>}
                            </button>
                        </div>
                    )}

                    {/* Profile Button */}
                    <button
                        onClick={() => setProfileOpen(v => !v)}
                        className="flex items-center shrink-0 overflow-hidden gap-3 w-full px-1.5 py-2.5 rounded-md hover:bg-white/10 cursor-pointer bg-gossamer-600/50">
                        <div className="w-9 h-9 rounded-full 
                        bg-white/20 flex items-center justify-center shrink-0 aspect-square">
                            <User size={18} />
                        </div>
                        {!mini && (
                            <div className="text-left">
                                <div className="text-sm font-semibold capitalize">
                                    {isAdmin ? user?.namaPegawai : user.nama}
                                </div>
                                <div className="text-xs font-semibold text-white/60 uppercase">
                                    {isAdmin ? user.jabatan : "crew"}
                                </div>
                            </div>
                        )}
                    </button>
                </div>

                {/* TOGGLE BUTTON */}
                <button
                    onClick={onToggleMini}
                    className="absolute -right-3 top-1/2 -translate-y-1/2 border border-white/20
                    w-7 h-7 rounded-full dark:bg-gossamer-600 bg-gossamer-400
                    flex items-center justify-center hover:bg-gossamer-500 shadow-md cursor-pointer"
                >
                    {mini ? (
                        <ChevronsRight size={16} />
                    ) : (
                        <ChevronsLeft size={16} />
                    )}
                </button>
            </aside>
        </>
    );
}
