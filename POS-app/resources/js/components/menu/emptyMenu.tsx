const emptyMenu = () => {
    return (
        <div className="flex flex-col items-center justify-center h-[70vh]">
            <p className="text-gray-400 mb-4 text-lg">
                TIdak Ada Menu 
            </p>

            <button className="bg-gossamer-600 hover:bg-gossamer-700 px-5 py-2 rounded-md font-medium">
                Tambah Menu
            </button>
        </div>
    );
};

export default emptyMenu;