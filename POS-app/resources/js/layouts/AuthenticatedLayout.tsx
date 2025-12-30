import SidebarDashboard from "@/components/sidebarDashboard";
import useDarkModes from "@/hooks/useDarkModes";
import useSidebarState from "@/hooks/useSidebarState";
import { PropsWithChildren, use, useState } from "react";

export default function AuthenticatedLayout({
    children,
}: PropsWithChildren){
    const {
        mini,
        open,
        toggleMini,
        openSidebar,
        closeSidebar,
    } = useSidebarState();
    const { isDark, toggleTheme } = useDarkModes();

    return (
        <div className="flex min-h-screen bg-neutral-50 dark:bg-neutral-800">
            < SidebarDashboard
                open={open}
                mini={mini} 
                onClose={closeSidebar} 
                onToggleMini={toggleMini} 
                isDark={isDark} 
                onToggleTheme={toggleTheme}
            />

            <div className={`hidden lg:block shrink-0 transition-all duration-300 
            ${mini ? "w-18" : "w-64"}`}
            /> 
            
             {/* Main Content  */}
             <div className={`flex-1 transition-all duration-300`}>
                    <header className="lg:hidden h-14 flex items-center px-4">
                        <button onClick={openSidebar}
                        className="p-2 rounded-md bg-black/20 dark:bg-white/10">
                            =
                        </button>
                    </header>
                 {/* isi konten */}
                  <main className="p-6 min-h[calc(100vh-3.5rem)] flex dark:text-neutral-100 text-neutral-800 shrink-0">
                     {children}
                
                 </main>
             </div>
            
        </div>
    )
}