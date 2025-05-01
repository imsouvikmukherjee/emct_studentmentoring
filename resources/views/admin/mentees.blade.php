@extends('admin.layout.main')

@Section('main-container')

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <!-- <div class="breadcrumb-title pe-3">Semister Subjects</div> -->
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Mentees</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}" style="color: #00a8ff;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Mentees</li>

                            </ol>
                        </nav>
                    </div>

                    <div class="ms-auto"></div>
                    <div class="btn-group">
                        <a href="{{route('add_mentee')}}" class="btn btn-primary btn-sm">Add Mentees</a>

                    </div>


                </div>
                <!--end breadcrumb-->

                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="card radius-10">
                            <div class="card-body">



                                @if (session('success'))
                                <div class="alert alert-success text-center border-0 alert-dismissible fade show">
                                    {!! session('success') !!}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form id="bulk-delete-form" method="POST" action="{{ route('mentees.bulk-delete') }}">
                                @csrf

                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="select-all">

                                                      </div>
                                                </th>
                                                <th>SL No.</th>
                                                <th>Department</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($mentees as $key => $item)

                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input item-checkbox" name="selected_ids[]" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault">

                                                      </div>
                                                </td>
                                                <td>{{$key+1}}</td>
                                                <td>{{$item->department_name}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->contact}}</td>

                                                <td>
                                                    <div>
                                                        <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i>
									</a>
                                                        <ul class="dropdown-menu">

                                                            <li><a class="dropdown-item" href="{{url('/admin/mentee-info')}}/{{encrypt($item->id)}}"><i class="bi bi-info-square"></i> Info</a>
                                                            </li>
                                                            <li>
                                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                                <a class="dropdown-item" href="{{url('/admin/mentee-modify')}}/{{encrypt($item->id)}}"><i class="bi bi-pencil-square"></i> Modify Mentee</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="confirmDelete('{{url('/admin/mentee-delete')}}/{{encrypt($item->id)}}')"><i class="bi bi-trash3"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach


                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>SL No.</th>
                                                <th>Department</th>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>

                                                <th>Action</th>
                                            </tr>
                                        </tfoot> --}}
                                    </table>
                                </div>
                                {{-- <a href="#" class="btn btn-danger text-white btn-sm mb-3" id="delete-selected" disabled>Delete All</a> --}}
                                <a href="javascript:void(0);" class="btn btn-light btn-sm my-3 disabled-link" id="delete-selected"><i class="fadeIn animated bx bx-trash"></i>Delete All</a>

                                <a href="#" class="btn btn-light  btn-sm my-3"><i class="fadeIn animated bx bx-printer"></i>Print</a>
                                <a href="#" class="btn btn-light  btn-sm my-3"><i class='bx bx-download'></i>Download PDF</a>
                            </form>
                            </div>
                        </div>
                    </div>

                    <!--end page wrapper -->
                    <!--start overlay-->
                    <div class="overlay toggle-icon"></div>
                    <!--end overlay-->
                    <!--Start Back To Top Button--><a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
                    <!--End Back To Top Button-->
                    <footer class="page-footer">
                        <p class="mb-0">Copyright © 2024. All right reserved.</p>
                    </footer>
                </div>


                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const selectAllCheckbox = document.getElementById('select-all');
                        const itemCheckboxes = document.querySelectorAll('.item-checkbox');
                        const deleteButton = document.getElementById('delete-selected');
                        const bulkDeleteForm = document.getElementById('bulk-delete-form');

                        // Toggle all checkboxes when 'select-all' is clicked
                        selectAllCheckbox.addEventListener('change', function () {
                            itemCheckboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
                            toggleDeleteButton();
                        });

                        // Enable or disable delete button based on checkbox selection
                        itemCheckboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', toggleDeleteButton);
                        });

                        function toggleDeleteButton() {
                            const anyChecked = Array.from(itemCheckboxes).some(cb => cb.checked);
                            deleteButton.classList.toggle('disabled-link', !anyChecked);
                        }

                        // Handle delete button click
                        deleteButton.addEventListener('click', function () {
                            if (!deleteButton.classList.contains('disabled-link') && confirm('Are you sure you want to delete the selected items?')) {
                                bulkDeleteForm.submit();
                            }
                        });
                    });
                </script>

<style>
    .disabled-link {
        pointer-events: none;
        opacity: 0.5;
    }
</style>

                <script>
                    function confirmDelete(url){
                        if(confirm('Are you sure')){
                            window.location.href = url;
                        }
                    }
                 </script>
             @endsection



