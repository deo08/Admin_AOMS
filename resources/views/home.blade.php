@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'customer'
])

@section('content')



@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush
