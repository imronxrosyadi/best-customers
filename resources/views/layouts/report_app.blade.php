@extends('layouts.app')

@section('content')

    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Begin Page Content -->


                <div class="container-fluid">

                    @yield('page_content')

                    
                </div>
                <!-- /.container-fluid -->

            </div>
        </div>
    </div>

   
@endsection