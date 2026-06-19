<div>
    @if ($totalBill > 0)
        <div class="w-87 border border-gray-200 rubik text-sm py-3 px-6 mx-auto mt-16">
            <p class=" flex items-center justify-between ">Sub total: <span>₹{{$totalBill}}</span></p><br>
            <h4 class=" flex items-center justify-between border-t-2 border-gray-200 pt-2">Total: <span>₹{{$totalBill}}</span></h4>
        </div>
    @endif
</div>
