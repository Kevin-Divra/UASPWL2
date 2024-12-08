
@extends('layouts.app-public')
@section('title', 'Shop')
@section('content')
    <!-- Product Area Start -->
    <div class="product-wrapper section-space--ptb_90 border-bottom pb-5 mb-5">
        <div class="container">

            <div class="row">
                

                    <div>
                        <div class="row" id="product-list"></div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="page-pagination text-center mt-40" 
                                id="product-list-pagination"></ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Product Area End -->
</div>
@endsection
@section('addition_css')
@endsection
@section('addition_script')
    <script src="{{asset('pages/js/plp.js')}}"></script>
@endsection
