@extends('layouts.app')

@section('template_title')
    Update Buzon
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Buzon</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('buzons.update', $buzon->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('buzon.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
