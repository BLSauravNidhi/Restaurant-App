@extends('layouts.menu-layout')

@section('page-title')
    {{ "Order Details"}}
@endsection

@section('app-content')
    <div class="mini-nav w-full h-15 shadow-lg px-10 flex items-center gap-3 z-10 bg-white lexend">
        <a href="javascript:history.back()" class=" text-4xl">&blacktriangleleft;</a>
        <span>Order Details</span>
    </div>

    <ul class="w-full h-32 grid grid-cols-3 items-center text-center lexend">
        <li><h3 class=" text-sm font-medium">Order Time</h3><p class=" text-sm">{{ date('h:i A', strtotime($viewData['order']->ordered_at))}}</p></li>
        <li><h3 class=" text-sm font-medium">Order Number</h3><p class=" text-sm">#{{$viewData['order']->id}}</p></li>
        <li><h3 class=" text-sm font-medium">Amount</h3><p class=" text-sm text-lime-600 font-medium">{{$viewData['order']->total_amount}} ₹</p></li>
    </ul>

    <!-- Added id="slider-root" to enable the parent-level selector styling -->
    <div id="slider-root" class="w-full max-w-6xl mx-auto grid gap-5 
    [&:has(#order-status:target)_.status-link]:border-lime-600 
    [&:has(#order-items:target)_.items-link]:border-lime-600 
    [&:not(:has(:target))_.status-link]:border-lime-600">

        <!-- Navigation Container -->
        <div class="w-full grid grid-cols-2 justify-center items-center text-center font-medium text-gray-800 shadow-md">
            <!-- Replaced hardcoded border with unique utility classes: .status-link and .items-link -->
            <a href="#order-status" class="status-link w-fit mx-auto py-2 px-2.5 border-b-4 border-transparent transition-colors">Order Status</a>
            <a href="#order-items" class="items-link w-fit mx-auto py-2 px-2.5 border-b-4 border-transparent transition-colors">Order Items &lpar;{{ count($viewData['items'])}}&rpar;</a>
        </div>

        <!-- Scrollable Container -->
        <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth">
            <!-- Order Status -->
            @php
                if($viewData['order']->status != 'cancelled'){
                    // Defining the pipeline of the order
                    $pipeline = ['pending', 'prepairing', 'ready', 'served', 'paid'];
                    $currentStatus = $viewData['order']->status ;
                    $currentIndex = array_search($currentStatus, $pipeline);

                    if($currentIndex === false){
                        $currentIndex = 0;
                    }
                    // 5. Labels mapping for clean UI text presentation
                    $labels = [
                        'pending'     => 'Order Placed',
                        'prepairing'  => 'Preparing',
                        'ready'       => 'On the Way',
                        'served'      => 'Served',
                        'paid'        => 'Paid'
                    ];
                    // Build the dynamic structural $steps array
                    $steps = [];
                    foreach($pipeline as $index => $stepKey){
                        if($index < $currentIndex || $currentIndex === 4){
                            $orderState = 'completed';
                        } elseif ($index === $currentIndex) {
                            $orderState = 'current';
                        } else {
                            $orderState = 'pending';
                        }

                        $steps[] = [
                            'label' => $labels[$stepKey],
                            'status'  => $orderState
                        ];
                    }
                }
            @endphp
            <div id="order-status" class="snap-center flex flex-col justify-evenly flex-nowrap px-10 shrink-0 w-full p-4">
                @if ($viewData['order']->status != 'cancelled')
                    @foreach($steps as $step)
                        <div class="relative flex gap-10 items-center {{ !$loop->last ? 'pb-12' : '' }}">
                            
                            <!-- Dynamic Line Rendering -->
                            @if(!$loop->last)
                                <div class="absolute left-6 top-12 bottom-0 w-0.5 
                                    {{ $step['status'] === 'completed' ? 'bg-green-500' : 'bg-gray-200' }}">
                                </div>
                            @endif

                            <!-- Step Circle / Icon Container -->
                            <div class="z-0 bg-white w-12 h-12 flex items-center justify-center rounded-full border-2 
                                {{ $step['status'] === 'completed' ? 'border-green-600 bg-green-50' : '' }}
                                {{ $step['status'] === 'current' ? 'border-green-600' : '' }}
                                {{ $step['status'] === 'pending' ? 'border-gray-300' : '' }}">
                                
                                @if($step['status'] === 'completed')
                                    <svg width="38px" height="38px" viewBox="0 0 430 430" class=" fill-green-600"><path d="M213.333333,3.55271368e-14 C95.51296,3.55271368e-14 3.55271368e-14,95.51296 3.55271368e-14,213.333333 C3.55271368e-14,331.153707 95.51296,426.666667 213.333333,426.666667 C331.153707,426.666667 426.666667,331.153707 426.666667,213.333333 C426.666667,95.51296 331.153707,3.55271368e-14 213.333333,3.55271368e-14 Z M293.669333,137.114453 L323.835947,167.281067 L192,299.66912 L112.916693,220.585813 L143.083307,190.4192 L192,239.335893 L293.669333,137.114453 Z" id="Shape"></path></svg>
                                @else
                                    @switch($step['label'])
                                        @case($labels['pending'])
                                            <svg width="48px" height="48px" viewBox="0 0 430 430" class=" fill-green-600"><path d="M213.333333,3.55271368e-14 C95.51296,3.55271368e-14 3.55271368e-14,95.51296 3.55271368e-14,213.333333 C3.55271368e-14,331.153707 95.51296,426.666667 213.333333,426.666667 C331.153707,426.666667 426.666667,331.153707 426.666667,213.333333 C426.666667,95.51296 331.153707,3.55271368e-14 213.333333,3.55271368e-14 Z M293.669333,137.114453 L323.835947,167.281067 L192,299.66912 L112.916693,220.585813 L143.083307,190.4192 L192,239.335893 L293.669333,137.114453 Z" id="Shape"></path></svg>
                                            @break
                                        @case($labels['prepairing'])
                                            <img width="48" height="48" src="https://img.icons8.com/color/48/cooking.png" alt="cooking"/>
                                            @break
                                        @case($labels['ready'])
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48" id="Truck--Streamline-Kameleon" height="48" width="48">
                                                <path fill="#" d="M24.0006 48.0012c13.2553 0 24.0006 -10.7453 24.0006 -24.0006C48.0012 10.7453 37.2559 0 24.0006 0 10.7453 0 0 10.7453 0 24.0006c0 13.2553 10.7453 24.0006 24.0006 24.0006Z" stroke-width="1"></path>
                                                <path fill="#222299" d="M18.7649 29.2374v-7.8133c0 -0.2409 -0.1955 -0.4778 -0.4364 -0.4778h-2.1709c-1.0321 0 -1.9319 0.744 -2.1823 1.7455l-1.3196 3.0546s-1.7455 1.4911 -1.7455 2.2849v3.8244h26.1824v-2.6183H18.7649Z" stroke-width="1"></path>
                                                <path fill="#000000" d="M37.0914 32.2928c0 0.3472 -0.138 0.6802 -0.3835 0.9257 -0.2455 0.2455 -0.5785 0.3834 -0.9257 0.3834H10.9089c-0.2315 0 -0.4535 -0.0919 -0.6171 -0.2556 -0.1637 -0.1636 -0.2557 -0.3856 -0.2557 -0.6171 0 -0.2315 0.092 -0.4535 0.2557 -0.6171 0.1636 -0.1637 0.3856 -0.2557 0.6171 -0.2557h26.1825v0.4364Z" stroke-width="1"></path>
                                                <path fill="#ffffff" d="M12.6552 31.8554h-1.745v-2.6176h0.8725c0.2314 0 0.4533 0.0919 0.617 0.2556 0.1636 0.1636 0.2555 0.3855 0.2555 0.6169v1.7451Z" stroke-width="1"></path>
                                                <path fill="#ffffff" d="M33.165 36.2196c0.8101 0 1.5871 -0.3218 2.1599 -0.8947 0.5729 -0.5728 0.8947 -1.3498 0.8947 -2.1599 0 -0.8102 -0.3218 -1.5871 -0.8947 -2.16 -0.5728 -0.5728 -1.3498 -0.8946 -2.1599 -0.8946 -0.8102 0 -1.5871 0.3218 -2.16 0.8946 -0.5728 0.5729 -0.8946 1.3498 -0.8946 2.16 0 0.8101 0.3218 1.5871 0.8946 2.1599 0.5729 0.5729 1.3498 0.8947 2.16 0.8947Z" stroke-width="1"></path>
                                                <path fill="#000000" d="M33.1639 34.3869c0.1604 0 0.3193 -0.0316 0.4675 -0.0929 0.1482 -0.0614 0.2829 -0.1514 0.3963 -0.2648 0.1134 -0.1135 0.2034 -0.2481 0.2648 -0.3963 0.0614 -0.1482 0.093 -0.3071 0.093 -0.4675 0 -0.1604 -0.0316 -0.3193 -0.093 -0.4675 -0.0614 -0.1482 -0.1514 -0.2828 -0.2648 -0.3963 -0.1134 -0.1134 -0.2481 -0.2034 -0.3963 -0.2648 -0.1482 -0.0614 -0.3071 -0.093 -0.4675 -0.093 -0.3239 0 -0.6346 0.1287 -0.8637 0.3578 -0.2291 0.2291 -0.3578 0.5398 -0.3578 0.8638 0 0.324 0.1287 0.6347 0.3578 0.8638 0.2291 0.229 0.5398 0.3577 0.8637 0.3577Z" stroke-width="1"></path>
                                                <path fill="#ffffff" d="m34.4741 25.7466 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455v1.7455h19.2005v-3.491l-1.7455 1.7455 -1.7455 -1.7455Z" stroke-width="1"></path>
                                                <path fill="#889988" d="M19.6374 14.8379h17.455c0.2315 0 0.4534 0.0919 0.6171 0.2556 0.1637 0.1637 0.2556 0.3857 0.2556 0.6171v10.0367l-1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455 -1.7455 -1.7455 -1.7455 1.7455V15.7106c0 -0.2314 0.092 -0.4534 0.2557 -0.6171 0.1636 -0.1637 0.3856 -0.2556 0.6171 -0.2556Z" stroke-width="1"></path>
                                                <path fill="#ffffff" d="M15.2734 36.2196c0.8101 0 1.5871 -0.3218 2.1599 -0.8947 0.5729 -0.5728 0.8947 -1.3498 0.8947 -2.1599 0 -0.8102 -0.3218 -1.5871 -0.8947 -2.16 -0.5728 -0.5728 -1.3498 -0.8946 -2.1599 -0.8946 -0.8102 0 -1.5871 0.3218 -2.16 0.8946 -0.5728 0.5729 -0.8946 1.3498 -0.8946 2.16 0 0.8101 0.3218 1.5871 0.8946 2.1599 0.5729 0.5729 1.3498 0.8947 2.16 0.8947Z" stroke-width="1"></path>
                                                <path fill="#000000" d="M15.2723 34.3869c0.1604 0 0.3193 -0.0316 0.4675 -0.0929 0.1482 -0.0614 0.2829 -0.1514 0.3963 -0.2648 0.1134 -0.1135 0.2034 -0.2481 0.2648 -0.3963 0.0614 -0.1482 0.093 -0.3071 0.093 -0.4675 0 -0.1604 -0.0316 -0.3193 -0.093 -0.4675 -0.0614 -0.1482 -0.1514 -0.2828 -0.2648 -0.3963 -0.1134 -0.1134 -0.2481 -0.2034 -0.3963 -0.2648 -0.1482 -0.0614 -0.3071 -0.093 -0.4675 -0.093 -0.3239 0 -0.6347 0.1287 -0.8637 0.3578 -0.2291 0.2291 -0.3578 0.5398 -0.3578 0.8638 0 0.324 0.1287 0.6347 0.3578 0.8638 0.229 0.229 0.5398 0.3577 0.8637 0.3577Z" stroke-width="1"></path>
                                                <path fill="#ffffff" d="M13.5273 25.7467h4.3638v-3.9274h-1.9598c-0.6585 0 -0.9879 0.4979 -1.0948 0.8728l-1.3092 3.0546Z" stroke-width="1"></path>
                                            </svg>
                                            @break
                                        @case($labels['served'])
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48" id="Service-Bell--Streamline-Kameleon" height="48" width="48">
                                                <path fill="#" d="M24.0006 48.0012c13.2553 0 24.0006 -10.7453 24.0006 -24.0006C48.0012 10.7453 37.2559 0 24.0006 0 10.7453 0 0 10.7453 0 24.0006c0 13.2553 10.7453 24.0006 24.0006 24.0006Z" stroke-width="1"></path>
                                                <path fill="#aaaa00" d="M25.745 15.2739h-3.4901v2.1814h3.4901v-2.1814Z" stroke-width="1"></path>
                                                <path fill="#ffffff" d="M24.8738 13.9648h-1.7459v1.3095h1.7459v-1.3095Z" stroke-width="1"></path>
                                                <path fill="#ffaa00" d="M37.9641 34.4746h-27.928v1.7455h27.928v-1.7455Z" stroke-width="1"></path>
                                                <path fill="#ffffff" d="M10.0361 34.4739c1.7455 -0.8727 2.1819 -1.7455 2.1819 -3.491h23.5643c0 1.7455 0.8727 2.6183 2.1818 3.491h-27.928Z" stroke-width="1"></path>
                                                <path fill="#ffaa00" d="M11.8873 30.5235c-0.0031 0.0593 0.0059 0.1185 0.0264 0.1741 0.0205 0.0557 0.0521 0.1066 0.093 0.1496 0.0408 0.043 0.09 0.0772 0.1445 0.1006 0.0545 0.0233 0.1132 0.0353 0.1725 0.0352h23.5328c0.0593 0 0.1179 -0.0121 0.1724 -0.0355 0.0544 -0.0234 0.1036 -0.0576 0.1444 -0.1006s0.0724 -0.0938 0.093 -0.1494c0.0206 -0.0556 0.0296 -0.1148 0.0266 -0.174 -0.1292 -2.4127 -1.313 -13.5045 -12.2028 -13.5045 -10.8897 0 -12.074 11.0918 -12.2028 13.5045Z" stroke-width="1"></path>
                                                <path fill="#ffaa00" d="M21.3425 13.3331c-0.0366 0.0642 -0.0557 0.137 -0.0554 0.2109 0.0003 0.074 0.0201 0.1466 0.0573 0.2105 0.0372 0.0639 0.0906 0.1169 0.1547 0.1537 0.0642 0.0368 0.1369 0.0561 0.2108 0.0559h4.5567c0.0765 -0.0003 0.1516 -0.0206 0.2177 -0.059 0.0662 -0.0383 0.1212 -0.0934 0.1594 -0.1596 0.0383 -0.0663 0.0585 -0.1414 0.0586 -0.2179 0.0001 -0.0765 -0.0198 -0.1517 -0.0578 -0.2181 -0.2678 -0.4644 -0.6532 -0.8501 -1.1175 -1.1182 -0.4642 -0.2681 -0.9909 -0.4092 -1.527 -0.4091 -0.5406 -0.0001 -1.0716 0.1434 -1.5385 0.4159 -0.467 0.2725 -0.8531 0.6642 -1.119 1.135Z" stroke-width="1"></path>
                                            </svg>
                                            @break
                                        @case($labels['paid'])
                                            <svg height="48px" viewBox="0 -960 960 960" width="48px" fill="#e3e3e3"><path d="M324-111.5Q251-143 197-197t-85.5-127Q80-397 80-480t31.5-156Q143-709 197-763t127-85.5Q397-880 480-880t156 31.5Q709-817 763-763t85.5 127Q880-563 880-480t-31.5 156Q817-251 763-197t-127 85.5Q563-80 480-80t-156-31.5ZM707-253q93-93 93-227H480v-320q-134 0-227 93t-93 227q0 134 93 227t227 93q134 0 227-93Z"/></svg>
                                            @break
                                        @default
                                    @endswitch
                                @endif
                            </div>

                            <!-- Label text -->
                            <p class="{{ $step['status'] === 'completed' ? 'text-gray-800 font-medium' : 'text-gray-500' }}">
                                {{ $step['label'] }}
                            </p>
                        </div>
                    @endforeach
                @endif

                @if ($viewData['order']->status == 'cancelled')
                    <div class=" flex flex-col justify-evenly flex-nowrap px-5 shrink-0 w-full gap-10">
                        <div class="relative flex items-center gap-10">
                            <div class="absolute left-6 top-12 bottom-0 w-0.5 h-full bg-rose-500"></div>
                            
                            <div class="z-0 bg-white w-12 h-12 flex items-center justify-center rounded-full border-2 border-green-600">
                                <svg width="38px" height="38px" viewBox="0 0 430 430" class=" fill-green-600"><path d="M213.333333,3.55271368e-14 C95.51296,3.55271368e-14 3.55271368e-14,95.51296 3.55271368e-14,213.333333 C3.55271368e-14,331.153707 95.51296,426.666667 213.333333,426.666667 C331.153707,426.666667 426.666667,331.153707 426.666667,213.333333 C426.666667,95.51296 331.153707,3.55271368e-14 213.333333,3.55271368e-14 Z M293.669333,137.114453 L323.835947,167.281067 L192,299.66912 L112.916693,220.585813 L143.083307,190.4192 L192,239.335893 L293.669333,137.114453 Z" id="Shape"></path></svg>
                            </div>
                            <p class=" text-gray-800 font-medium ">Order Placed</p>
                        </div>
                        <div class="relative flex items-center gap-10">
                            <div class="z-0 bg-white w-12 h-12 flex items-center justify-center rounded-full border-2 border-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#f44336" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"/><path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z"/><path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z"/></svg>
                            </div>
                            <p class=" text-gray-800 font-medium ">Order Cancelled</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Ordered Items -->
            <div id="order-items" class="snap-center flex flex-col shrink-0 w-full gap-4 overflow-hidden p-4">
                
                @foreach ($viewData['items'] as $item)
                    <div class="w-full h-28 rounded-md shadow-md grid grid-cols-[68px_auto] gap-4 px-4 items-center">
                        <img src="{{ $item->image}}" alt="">
                        <div class=" inter">
                            <h3 class=" text-sm font-medium">{{ $item->item_name}}</h3>
                            <p class=" text-sm text-gray-700">Quantity : {{ $item->pivot->quantity}}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection