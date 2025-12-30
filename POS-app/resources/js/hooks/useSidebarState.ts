import { useEffect, useState } from "react";

export default function useSidebarState(){
    const [mini, setMini] = useState<boolean>(() => {
        if (typeof window === "undefined") return false;
        const saved = localStorage.getItem("sidebar-mini");
        return saved === "true";
    });
    const [open, setOpen] = useState(false);

    useEffect(() =>{
        localStorage.setItem("sidebar-mini", String(mini));
    }, [mini]);

    return {
        mini,
        open,
        setOpen,
        toggleMini: () => setMini(prev => !prev),
        closeSidebar: () => setOpen(false),
        openSidebar: () => setOpen(true)
    };
}