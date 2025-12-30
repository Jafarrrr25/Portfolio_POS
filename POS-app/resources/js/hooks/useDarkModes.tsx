import { useEffect, useState } from "react";

type Theme = "light" | "dark" ;

export default function useDarkModes() {
    const [ theme, setTheme ] = useState<Theme>("light");

    useEffect(() => {
        const savedTheme = localStorage.getItem("theme") as Theme | null;

        if (savedTheme) {
            setTheme(savedTheme);
            document.documentElement.classList.toggle("dark", savedTheme === "dark");
        }
    }, []);        
    
    const toggleTheme = () => {
        const newTheme: Theme = theme === "dark" ? "light" : "dark";
        setTheme(newTheme);

        localStorage.setItem("theme", newTheme);
        document.documentElement.classList.toggle("dark", newTheme === "dark");
    };

    return {
        theme, 
        isDark: theme === "dark", 
        toggleTheme,
    };
}
