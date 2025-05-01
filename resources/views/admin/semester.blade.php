@extends('admin.layout.main')

@Section('main-container')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Academic Semesters</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}" style="color: #00a8ff;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Semesters</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto"></div>
            <div class="btn-group">
                <a href="{{ route('admin.semesters.add') }}" class="btn btn-primary btn-sm">Add Semester</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="table-responsive mt-4">
                            <table class="table align-middle mb-0 text-center table-striped table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Department</th>
                                        <th>Session</th>
                                        <th>Type</th>
                                        <th>Months</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Computer Science</td>
                                        <td>2023-2024</td>
                                        <td><span class="badge bg-success">Even</span></td>
                                        <td>January, February, March, April</td>
                                        <td>
                                            <div>
                                                <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSemesterModal1"><i class="bi bi-pencil"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('This is a frontend demo')"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Information Technology</td>
                                        <td>2023-2024</td>
                                        <td><span class="badge bg-danger">Odd</span></td>
                                        <td>July, August, September, October</td>
                                        <td>
                                            <div>
                                                <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSemesterModal2"><i class="bi bi-pencil"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('This is a frontend demo')"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Electronics & Communication</td>
                                        <td>2022-2023</td>
                                        <td><span class="badge bg-success">Even</span></td>
                                        <td>February, March, April, May</td>
                                        <td>
                                            <div>
                                                <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSemesterModal3"><i class="bi bi-pencil"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('This is a frontend demo')"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mechanical Engineering</td>
                                        <td>2024-2025</td>
                                        <td><span class="badge bg-danger">Odd</span></td>
                                        <td>August, September, October, November</td>
                                        <td>
                                            <div>
                                                <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSemesterModal4"><i class="bi bi-pencil"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('This is a frontend demo')"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Semester Modal -->
<div class="modal fade" id="editSemesterModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="semester-form">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Session</label>
                            <select class="form-select">
                                <option value="1" selected>2023-2024</option>
                                <option value="2">2022-2023</option>
                                <option value="3">2024-2025</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="1" selected>Computer Science</option>
                                <option value="2">Information Technology</option>
                                <option value="3">Electronics & Communication</option>
                                <option value="4">Mechanical Engineering</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Semester Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="edit_even_semester1" value="even" checked>
                                <label class="form-check-label" for="edit_even_semester1">
                                    Even Semester
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="edit_odd_semester1" value="odd">
                                <label class="form-check-label" for="edit_odd_semester1">
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
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_jan1" value="January" checked>
                                        <label class="form-check-label" for="edit_jan1">January</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_feb1" value="February" checked>
                                        <label class="form-check-label" for="edit_feb1">February</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_mar1" value="March" checked>
                                        <label class="form-check-label" for="edit_mar1">March</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_apr1" value="April" checked>
                                        <label class="form-check-label" for="edit_apr1">April</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_may1" value="May">
                                        <label class="form-check-label" for="edit_may1">May</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_jun1" value="June">
                                        <label class="form-check-label" for="edit_jun1">June</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_jul1" value="July">
                                        <label class="form-check-label" for="edit_jul1">July</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_aug1" value="August">
                                        <label class="form-check-label" for="edit_aug1">August</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_sep1" value="September">
                                        <label class="form-check-label" for="edit_sep1">September</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_oct1" value="October">
                                        <label class="form-check-label" for="edit_oct1">October</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_nov1" value="November">
                                        <label class="form-check-label" for="edit_nov1">November</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="months[]" id="edit_dec1" value="December">
                                        <label class="form-check-label" for="edit_dec1">December</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="alert('This is a frontend demo'); $('#editSemesterModal1').modal('hide');">Update Semester</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        alert('This is a frontend demo. No data will be deleted.');
        return false;
    }
</script>
@endsection 