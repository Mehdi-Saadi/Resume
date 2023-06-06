@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Sample Projects</div>

                <div class="card-body">
                    <div>
                        <div class="d-flex justify-content-center" >
                            <div class="col" style="max-width: 760px">
                                <div class="d-flex justify-content-center">
                                    @if($errors->any())
                                        <div class="alert alert-danger m-1 pb-0 d-flex justify-content-center" style="max-width: 300px">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <h3 class="mx-5 mt-5">Add new Sample</h3>

                                <form action="{{ route('sampleStore') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <label for="title" class="form-label">Title:</label>
                                            <input type="text" name="title" id="title" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="main_img" class="form-label">Background Image:</label>
                                            <input type="file" name="main_img" id="main_img" class="form-control">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_client" class="form-label">Details Client Name: (can be empty)</label>
                                            <input type="text" name="details_client" id="details_client" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_date" class="form-label">Details Date: (can be empty)</label>
                                            <input type="text" name="details_date" id="details_date" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_url" class="form-label">Details URL: (can be empty)</label>
                                            <input type="text" name="details_url" id="details_url" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_title" class="form-label">Details Title: (can be empty)</label>
                                            <input type="text" name="details_title" id="details_title" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_txt" class="form-label">Details Text: (can be empty)</label>
                                            <textarea name="details_txt" id="details_txt" class="form-control"></textarea>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="img1" class="form-label">First Image: (can be empty)</label>
                                            <input type="file" name="img1" id="img1" class="form-control">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="img2" class="form-label">Second Image: (can be empty)</label>
                                            <input type="file" name="img2" id="img2" class="form-control">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="img3" class="form-label">Third Image: (can be empty)</label>
                                            <input type="file" name="img3" id="img3" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm p-4">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Save New Sample</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <hr class="mb-5">

                                <h3 class="mx-5">Edit Sample</h3>

                                <form action="{{ route('sampleUpdate') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <select class="form-select" name="sample_id">
                                                <option disabled selected>Select a Sample for Edit...</option>
                                                @foreach($sample_projects as $number => $sample_project)
                                                    <option value="{{ $sample_project->id }}">{{ ++$number . ': ' . $sample_project->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="title" class="form-label">New Title:</label>
                                            <input type="text" name="title" id="title" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="main_img" class="form-label">New Background Image: (can be empty)</label>
                                            <input type="file" name="main_img" id="main_img" class="form-control">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_client" class="form-label">New Details Client Name: (can be empty)</label>
                                            <input type="text" name="details_client" id="details_client" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_date" class="form-label">New Details Date: (can be empty)</label>
                                            <input type="text" name="details_date" id="details_date" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_url" class="form-label">New Details URL: (can be empty)</label>
                                            <input type="text" name="details_url" id="details_url" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_title" class="form-label">New Details Title: (can be empty)</label>
                                            <input type="text" name="details_title" id="details_title" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="row mb-4">
                                            <label for="details_txt" class="form-label">New Details Text: (can be empty)</label>
                                            <textarea name="details_txt" id="details_txt" class="form-control"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm p-4">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-warning">Edit Sample</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <hr class="mb-5">

                                <h3 class="mx-5">Delete Sample</h3>

                                <form action="{{ route('sampleDelete') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <select class="form-select" name="sample_id">
                                                <option disabled selected>Select a Sample for Delete...</option>
                                                @foreach($sample_projects as $number => $sample_project)
                                                    <option value="{{ $sample_project->id }}">{{ ++$number . ': ' . $sample_project->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm p-4">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-danger">Delete Sample</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
