@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Dashboard</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md mb-3">
                            <div class="card">
                                <a href="{{ route('resumePage') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-text">Resume</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="card">
                                <a href="{{ route('skillPage') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-text">Skills</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="card">
                                <a href="{{ route('samplePage') }}" class="btn">
                                    <div class="card-body">
                                        <h5 class="card-text">Samples</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
