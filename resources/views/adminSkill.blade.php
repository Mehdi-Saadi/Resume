@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card px-0">
                <div class="card-header align-items-center">Skills</div>

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

                                <h3 class="mx-5 mt-5">Add new skill</h3>

                                <!-- add new skill -->
                                <form action="{{ route('skillStore') }}" method="post">
                                    @csrf
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <label for="skill" class="form-label">New Skill:</label>
                                            <input type="text" name="skill" id="skill" class="form-control" autocomplete="off">
                                        </div>

                                        <div class="row mb-4">
                                            <label for="percent" class="form-label">Percent:</label>
                                            <input type="number" name="percent" id="percent" min="0" max="100" class="form-control" autocomplete="off">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm p-4">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary">Save New Skill</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <hr class="mb-5">

                                <h3 class="mx-5">Edit skill</h3>

                                <form action="{{ route('skillUpdate') }}" method="post">
                                    @csrf
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <select class="form-select" name="skill_id">
                                                <option disabled selected>Select a Skill for Update...</option>
                                                @foreach($skills as $number => $skill)
                                                    <option value="{{ $skill->id }}">{{ ++$number . ': ' . $skill->skill_name . ' - ' . $skill->percent . '%' }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="skill" class="form-label">New Name:</label>
                                            <input type="text" name="skill" id="skill" class="form-control" autocomplete="off">
                                        </div>

                                        <div class="row mb-4">
                                            <label for="percent" class="form-label">New Percent:</label>
                                            <input type="number" name="percent" id="percent" min="0" max="100" class="form-control" autocomplete="off">
                                        </div>

                                        <div class="row">
                                            <div class="col-sm p-4">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-warning">Edit Skill</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <hr class="mb-5">

                                <h3 class="mx-5">Delete skill</h3>

                                <form action="{{ route('skillDelete') }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="mt-4 mb-2 mx-5">
                                        <div class="row mb-4">
                                            <select class="form-select" name="skill_id">
                                                <option disabled selected>Select a Skill for Delete...</option>
                                                @foreach($skills as $number => $skill)
                                                    <option value="{{ $skill->id }}">{{ ++$number . ': ' . $skill->skill_name . ' - ' . $skill->percent . '%' }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm p-4">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-danger">Delete Skill</button>
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
