@extends('layouts.app-layout')

@section('page-title')
    {{ "Waiting for approval"}}
@endsection

@push('page-scripts')
    <script defer>
        // polling 
        const menuUrlTemplate = "{{ route('getMenu', ['TABLE', 'TOKEN']) }}";

        setInterval(async () => {
            const res = await fetch(`{{ route('tableRequesStatusCheck', $reqId) }}`);
            const data = await res.json();

            if (data.status === 'approved') {

                const url = menuUrlTemplate
                    .replace('TABLE', data.table_number)
                    .replace('TOKEN', data.session_token);

                window.location.href = url;
            }

            if (data.status === 'rejected') {
                alert("Request rejected");
                window.location.href = `{{ route('HomePage')}}`;
            }

        }, 3000); // every 3 sec
    </script>
@endpush

@section('app-content')
    <div class="w-screen h-[calc(100vh-60px)] bg-gray-900 flex justify-center items-center">
        <h2 class="text-gray-800 font-bold text-3xl inter">Waiting for approval</h2>
    </div>
@endsection