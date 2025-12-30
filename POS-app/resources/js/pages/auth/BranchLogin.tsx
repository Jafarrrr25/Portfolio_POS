import password from "@/routes/password";
import { useForm } from "@inertiajs/react";
import React, { useEffect } from "react";

type loginAs = 'branch' | 'pegawai';

export default function BranchLogin(){

    useEffect(() => {
        document.title ="Login";
    }, []);

    const { data, setData, post, processing, errors, reset } = useForm({
        nama: "",
        password: "",
        login_as:'branch' as loginAs,
    });

    const [loginAs, setLoginAs] = React.useState<'branch' | 'pegawai'>('branch');

    const submit = (e:React.FormEvent) => {
        e.preventDefault();
        post("/login", {
            preserveScroll: true,
            onBefore: () => {
                data.login_as = loginAs;
            },
            onFinish: () => {
                reset('password');
            },
        });
    };

    return (
        <div className="min-h-screen flex items-center justify-center px-6 py-12
         dark:bg-neutral-800 dark:text-white">
            <div className="w-full dark:bg-gossamer-700 dark:text-neutral-50 
            max-w-md rounded-xl p-8 shadow-xl border-1 border-neutral-50
            bg-gossamer-400 text-gossamer-50">
                <p className="text-xl font-bold  text-center">
                    Login <br />
                    
                </p>
                <form onSubmit={submit} className="p-6 rounded w-96 space-y-6 ">

                {/* Nama Branch */} 
                <div>
                    <label htmlFor="nama" className="block twxt-sm font-medium dark:text-neutral-50 mb-2">
                        {loginAs === 'branch' ? 'Branch:' : 'Admin:'}
                    </label>
                    <input type="text" id="nama" name="nama" required className="block w-full border dark:border-neutral-50 rounded-md px-3 py-2 outline-none focus:ring-2" placeholder="Nama" value={data.nama} 
                    onChange={e=> setData("nama", e.target.value)}/>

                    
                </div>
                
                {/* password */}
                <div>
                    <label htmlFor="password" className="block twxt-sm font-medium dark:text-neutral-50 mb-2">
                        Password:
                    </label>

                    <input type="password" id="password" name="password" className="block w-full border dark:border-neutral-50 rounded-md px-3 py-2 outline-none focus:ring-2" placeholder="Password" value={data.password} 
                onChange={e=> setData("password", e.target.value)}/>
                </div>

                <div className="flex items-center justify-center">
                    <button type="button" onClick={()=>
                        setLoginAs(loginAs === 'branch' ? 'pegawai' : 'branch')} 
                        className="text-sm underline text-neutral-50 dark:text-neutral-50 justify-center items-center cursor-pointer">
                        Masuk Sebagai {loginAs === 'branch' ? 'Admin?' : 'Branch?'}
                    </button>
                </div>

                {errors.nama && (
                    <p className="dark:text-red-500 text-red-700 font-semibold text-md flex justify-center"> {errors.nama} </p>
                    )}
                
                <button type="submit" disabled={processing} className="flex w-full dark:bg-gossamer-500 bg-gossamer-600 text-gossamer-50 py-2 rounded-md cursor-pointer justify-center font-semibold hover:bg-gossamer-600/70 dark:hover:bg-gossamer-600">
                    {processing ? ".  .  ." : "Login"}
                </button>
                </form>

            </div>
        </div>
    )

}