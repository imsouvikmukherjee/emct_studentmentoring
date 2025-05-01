@extends('admin.layout.main')

@section('main-container')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add Semester</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}" style="color: #00a8ff;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('admin.semesters')}}">Semesters</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Semester</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="semester-form">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="semester_session_id" class="form-label">Session</label>
                                <select class="form-select" id="semester_session_id" required>
                                    <option value="">Select Session</option>
                                    <option value="1">2023-2024</option>
                                    <option value="2">2024-2025</option>
                                    <option value="3">2025-2026</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="semester_department_id" class="form-label">Department</label>
                                <select class="form-select" id="semester_department_id" name="department_id" required>
                                    <option value="">Select Department</option>
                                    <option value="1" data-session="1">Computer Science</option>
                                    <option value="2" data-session="1">Information Technology</option>
                                    <option value="3" data-session="2">Electrical Engineering</option>
                                    <option value="4" data-session="2">Civil Engineering</option>
                                    <option value="5" data-session="3">Mechanical Engineering</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Semester Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="even_semester" value="even" required>
                                    <label class="form-check-label" for="even_semester">
                                        Even Semester
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" id="odd_semester" value="odd">
                                    <label class="form-check-label" for="odd_semester">
                                        Odd Semester
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Select Months</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="jan" value="January">
                                            <label class="form-check-label" for="jan">January</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="feb" value="February">
                                            <label class="form-check-label" for="feb">February</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="mar" value="March">
                                            <label class="form-check-label" for="mar">March</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="apr" value="April">
                                            <label class="form-check-label" for="apr">April</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="may" value="May">
                                            <label class="form-check-label" for="may">May</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="jun" value="June">
                                            <label class="form-check-label" for="jun">June</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="jul" value="July">
                                            <label class="form-check-label" for="jul">July</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="aug" value="August">
                                            <label class="form-check-label" for="aug">August</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="sep" value="September">
                                            <label class="form-check-label" for="sep">September</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="oct" value="October">
                                            <label class="form-check-label" for="oct">October</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="nov" value="November">
                                            <label class="form-check-label" for="nov">November</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="months[]" id="dec" value="December">
                                            <label class="form-check-label" for="dec">December</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" id="add-semester-btn">Add Semester</button>
                                <a href="{{ route('admin.semesters') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection 