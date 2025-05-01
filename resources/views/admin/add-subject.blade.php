@extends('admin.layout.main')

@Section('main-container')

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <!-- <div class="breadcrumb-title pe-3">Semister Subjects</div> -->
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Add Subject</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item text-primary"><a href="{{route('admin_dashboard')}}"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <!-- <li class="breadcrumb-item " aria-current="page" style="color: #00a8ff; text-decoration: none;"><a href="subjects.html">Semister Subjects</a></li> -->

                                <li class="breadcrumb-item text-primary"><a href="{{route('subject')}}">Subjects</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Subject</li>

                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->

                <div class="row mt-4">
                    <!-- <div class="col-12 col-lg-12">
                        <div class="card radius-10">
                            <div class="card-body">


                            </div>
                        </div>
                    </div> -->


                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                {{-- <div class="card-title d-flex align-items-center">

                                    <h5 class="mb-0 text-primary">Add Subjects</h5>
                                </div>
                                <hr/> --}}

                                @if ($errors->any())
                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-white">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                                <form action="{{route('add_subject_store')}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="department" class="col-sm-3 col-form-label">Department<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-select mb-3" aria-label="Department select" name="department" id="department" required>
                                                <option selected disabled value="">Choose Department</option>
                                                @foreach($departments as $key => $item)
                                                <option value="{{$item->id}}" {{old('department') == $item->id?'selected':''}}>{{$item->department_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Subject Name<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Enter subject name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="code" class="col-sm-3 col-form-label">Subject Code<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="code" value="{{old('code')}}" name="code" placeholder="e.g. CS101" oninput="this.value = this.value.toUpperCase();" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="semester" class="col-sm-3 col-form-label">Semester<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="semester" name="semester" required>
                                                <option selected disabled value="">Choose Semester</option>
                                                @for($i = 1; $i <= 8; $i++)
                                                <option value="{{$i}}" {{old('semester') == $i ? 'selected' : ''}}>Semester {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="session" class="col-sm-3 col-form-label">Session<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="session" value="{{old('session')}}" name="session" placeholder="e.g. 2023-2024" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="subject_type" class="col-sm-3 col-form-label">Subject Type<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="type_theory" value="theory" {{old('type') == 'theory' ? 'checked' : ''}} checked>
                                                <label class="form-check-label" for="type_theory">Theory (CA1-CA4)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="type_practical" value="practical" {{old('type') == 'practical' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="type_practical">Practical (PCA1-PCA2)</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="type" id="type_other" value="other" {{old('type') == 'other' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="type_other">Other</label>
                                            </div>
                                            
                                            <div id="other_description_container" class="mt-2" style="display: none;">
                                                <textarea class="form-control" name="other_description" id="other_description" placeholder="Please specify the subject type and assessment method">{{old('other_description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="description" name="description" placeholder="Optional subject description">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="credits" class="col-sm-3 col-form-label">Credits<span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="credits" name="credits" value="{{old('credits', 3)}}" min="1" max="10" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-4 mt-4 text-white">Save Subject</button>
                                        </div>
                                    </div>
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
                <!--end wrapper-->
                <!--start switcher-->
                <!-- <div class="switcher-wrapper">
                    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
                    </div>
                    <div class="switcher-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
                        </div>
                        <hr/>
                        <h6 class="mb-0">Theme Styles</h6>
                        <hr/>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                                <label class="form-check-label" for="lightmode">Light</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                                <label class="form-check-label" for="darkmode">Dark</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                                <label class="form-check-label" for="semidark">Semi Dark</label>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                            <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
                        </div>
                        <hr/>
                        <h6 class="mb-0">Header Colors</h6>
                        <hr/>
                        <div class="header-colors-indigators">
                            <div class="row row-cols-auto g-3">
                                <div class="col">
                                    <div class="indigator headercolor1" id="headercolor1"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator headercolor2" id="headercolor2"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator headercolor3" id="headercolor3"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator headercolor4" id="headercolor4"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator headercolor5" id="headercolor5"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator headercolor6" id="headercolor6"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator headercolor7" id="headercolor7"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator headercolor8" id="headercolor8"></div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <h6 class="mb-0">Sidebar Colors</h6>
                        <hr/>
                        <div class="header-colors-indigators">
                            <div class="row row-cols-auto g-3">
                                <div class="col">
                                    <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                                </div>
                                <div class="col">
                                    <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--end switcher-->
                <!-- Bootstrap JS -->
            </div>
        </div>

        @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Show/hide other description based on selection
                const typeRadios = document.querySelectorAll('input[name="type"]');
                const otherContainer = document.getElementById('other_description_container');
                const otherDescription = document.getElementById('other_description');
                
                function toggleOtherDescription() {
                    const selectedType = document.querySelector('input[name="type"]:checked').value;
                    otherContainer.style.display = selectedType === 'other' ? 'block' : 'none';
                    otherDescription.required = selectedType === 'other';
                }
                
                // Initial check
                toggleOtherDescription();
                
                // Add event listeners to all radio buttons
                typeRadios.forEach(radio => {
                    radio.addEventListener('change', toggleOtherDescription);
                });
            });
        </script>
        @endsection
@endsection
