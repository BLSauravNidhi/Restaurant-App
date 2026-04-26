<div id="navigationbar" class=" w-full">
                
    <div class=" w-full my-5 ">
        <p class="text-sm font-medium">Navigation</p>
        <div class="flex flex-col text-sm lexend font-medium gap-1">
            <button class=" {{ (request()->routeIs('AdminDashboard') || request()->routeIs('AdminAnalytics')) ? 'current-tab' : ''}} dropdown-btn outline-0 fill-gray-500 text-left py-2 px-4 rounded-md text-gray-500 flex flex-row flex-nowrap gap-2 items-center">
                <svg height="24px" viewBox="0 -960 960 960" width="24px"><path d="M640-160v-280h160v280H640Zm-240 0v-640h160v640H400Zm-240 0v-440h160v440H160Z"/></svg>
                Dashboard
                <div class="arrow ml-auto pointer-events-none">
                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" arrow-up"><path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/></svg>
                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" hidden arrow-down"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </div>
            </button>
            <ul class=" h-0 overflow-hidden dropdown-list w-full list-disc list-inside flex flex-col gap-1">
                <a href="{{ route('AdminDashboard')}}">
                    <li class=" {{ request()->routeIs('AdminDashboard') ? 'current-sub-tab' : ''}} py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Default</li></a>
                <a href="{{ route('AdminAnalytics')}}">
                    <li class=" {{ request()->routeIs('AdminAnalytics') ? 'current-sub-tab' : ''}} py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Analytics</li></a>
                <a href="">
                    <li class=" py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Finance</li></a>
            </ul>
        </div>

        <div class="flex flex-col text-sm lexend font-medium gap-1">
            <button class=" {{ (request()->routeIs('AdminStaffPriviledges') || request()->routeIs('AdminManageStaff')) ? 'current-tab' : ''}} dropdown-btn outline-0 fill-gray-500 text-left py-2 px-4 rounded-md text-gray-500 flex flex-row flex-nowrap gap-2 items-center">
                <svg height="24px" viewBox="0 -960 960 960" width="24px"><path d="M287-527q-47-47-47-113t47-113q47-47 113-47t113 47q47 47 47 113t-47 113q-47 47-113 47t-113-47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm96.5-143.5Q760-287 760-320t-23.5-56.5Q713-400 680-400t-56.5 23.5Q600-353 600-320t23.5 56.5Q647-240 680-240t56.5-23.5Zm-280-320Q480-607 480-640t-23.5-56.5Q433-720 400-720t-56.5 23.5Q320-673 320-640t23.5 56.5Q367-560 400-560t56.5-23.5ZM400-640Zm12 400Z"/></svg>
                Manage Staff
                <div class="arrow ml-auto pointer-events-none">
                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" arrow-up"><path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/></svg>

                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" hidden arrow-down"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </div>
            </button>
            <ul class=" h-0 overflow-hidden dropdown-list w-full list-disc list-inside flex flex-col gap-1">
                <a href="{{ route('manage-worker.index')}}">
                    <li class=" {{ request()->routeIs('manage-worker.index') ? 'current-sub-tab' : ''}} py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Manage</li></a>
                <a href="">
                    <li class=" py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Privileges</li></a>
            </ul>
        </div>
    </div>

    <div class="w-full my-5">
        <p class="text-sm font-medium">Admin Panel</p>
        <div class="flex flex-col text-sm lexend font-medium gap-1">
            <button class=" dropdown-btn outline-0 fill-gray-500 text-left py-2 px-4 rounded-md text-gray-500 flex flex-row flex-nowrap gap-2 items-center">
                <svg height="24px" viewBox="0 -960 960 960" width="24px"><path d="M287-527q-47-47-47-113t47-113q47-47 113-47t113 47q47 47 47 113t-47 113q-47 47-113 47t-113-47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm96.5-143.5Q760-287 760-320t-23.5-56.5Q713-400 680-400t-56.5 23.5Q600-353 600-320t23.5 56.5Q647-240 680-240t56.5-23.5Zm-280-320Q480-607 480-640t-23.5-56.5Q433-720 400-720t-56.5 23.5Q320-673 320-640t23.5 56.5Q367-560 400-560t56.5-23.5ZM400-640Zm12 400Z"/></svg>
                Account settings
                <div class="arrow ml-auto pointer-events-none">
                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" arrow-up"><path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z"/></svg>

                    <svg height="24px" viewBox="0 -960 960 960" width="24px" class=" hidden arrow-down"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </div>
            </button>
            <ul class=" h-0 overflow-hidden dropdown-list w-full list-disc list-inside flex flex-col gap-1">
                <a href=""><li class=" py-2 px-4 rounded-md text-gray-500 hover:text-black hover:bg-gray-200">Change Credentials</li></a>
            </ul>
        </div>
    </div>

</div>