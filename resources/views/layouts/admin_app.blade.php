@extends('layouts.app')

@section('content')

    <div id="wrapper">
        @include('shared.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('shared.navbar')
                <!-- Begin Page Content -->


                <div class="container-fluid">

                    @yield('page_content')

                    
                </div>
                <!-- /.container-fluid -->

            </div>
            @include('shared.footer')
        </div>
    </div>

   
@endsection