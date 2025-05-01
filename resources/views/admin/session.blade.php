@extends('admin.layout.main')

@Section('main-container')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Academic Sessions</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}" style="color: #00a8ff;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Sessions</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto"></div>
            <div class="btn-group">
                <a href="{{ route('admin.sessions.add') }}" class="btn btn-primary btn-sm">Add Session</a>
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
                                        <th>Session Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2023-2024</td>
                                        <td>Current academic year</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td>
                                            <div>
                                                <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSessionModal1"><i class="bi bi-pencil"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('This is a frontend demo')"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2022-2023</td>
                                        <td>Previous academic year</td>
                                        <td><span class="badge bg-danger">Inactive</span></td>
                                        <td>
                                            <div>
                                                <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSessionModal2"><i class="bi bi-pencil"></i> Edit</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);" onclick="alert('This is a frontend demo')"><i class="bi bi-trash3"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>2024-2025</td>
                                        <td>Upcoming academic year</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td>
                                            <div>
                                                <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editSessionModal3"><i class="bi bi-pencil"></i> Edit</a></li>
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

<!-- Edit Session Modals -->
<div class="modal fade" id="editSessionModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="session-form">
                    <div class="mb-3">
                        <label class="form-label">Session Name</label>
                        <input type="text" class="form-control" value="2023-2024">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="3">Current academic year</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="alert('This is a frontend demo'); $('#editSessionModal1').modal('hide');">Update Session</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Just for demo purposes
    function confirmDelete() {
        alert('This is a frontend demo. No data will be deleted.');
        return false;
    }
</script>
@endsection 