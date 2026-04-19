<div id="AddWorkerModal" class=" hidden fixed inset-0 z-10 bg-gray-900/60 overflow-y-auto h-screen w-screen px-4">

    <div class="relative bg-white top-20 mx-auto shadow-xl rounded-md max-w-md p-5">
        <div id="modalHeader" class="flex justify-between items-center pb-5">
            <h3 class=" text-3xl font-bold">Add Worker</h3>
            <button id="closeAddWorkerModalBtn" class=" text-4xl">&times;</button>
        </div>
        <form action="" method="" class=" flex flex-col gap-2">
            <input type="text" placeholder="Name" class=" px-5 py-2 focus:outline-0 border border-gray-200">
            <input type="text" placeholder="Email" class=" px-5 py-2 focus:outline-0 border border-gray-200">
            <input type="text" placeholder="Job" list="jobs" class=" px-5 py-2 focus:outline-0 border border-gray-200">
            <select name="job" class=" px-5 py-2 focus:outline-0 border border-gray-200 appearance-none">
                <option value="" disabled selected>Select Job</option>
                <option value="waiter">Waiter</option>
                <option value="kitchen">Chef</option>
            </select>
            <input type="text" placeholder="Password" class=" px-5 py-2 focus:outline-0 border border-gray-200">
            <input type="text" placeholder="Confirm Password" class=" px-5 py-2 focus:outline-0 border border-gray-200">
            <button type="submit" class=" bg-emerald-600 text-white lexend py-2 px-5 rounded-md shadow-xl">Create</button>
        </form>
    </div>
</div>