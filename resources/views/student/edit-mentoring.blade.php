@extends('student.layout.main')

@section('main-container')
<style>
    .mentoring-card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-bottom: 1.5rem;
        border-radius: 0.5rem;
    }
    .nav-tabs .nav-link {
        border: none;
        color: #495057;
        margin-right: 5px;
        font-weight: 500;
        padding: 10px 20px;
    }
    .nav-tabs .nav-link.active {
        color: #0d6efd;
        background-color: #fff;
        border-bottom: 2px solid #0d6efd;
    }
    .main-tab-content {
        background-color: #fff;
        border-radius: 0 0 0.5rem 0.5rem;
        padding: 1.5rem;
    }
    .form-label {
        font-weight: 500;
        color: #344767;
    }
    .table th {
        font-weight: 600;
        color: #344767;
    }
    .add-row-btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .remove-row-btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        color: #dc3545;
        background: none;
        border: none;
    }
    .remove-row-btn:hover {
        color: #bd2130;
    }
    .section-title {
        color: #344767;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #e9ecef;
    }
    .table-input {
        min-width: 80px;
    }
</style>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit Mentoring Information</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.mentoring') }}">Mentoring Details</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Information</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mentoring-card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Edit Mentoring Information</h4>
                <p class="text-muted mb-0">Update your academic journey information</p>
            </div>
        </div>

        <form action="{{ route('user.mentoring.update') }}" method="POST">
            @csrf
            <!-- Main Tabs Navigation -->
            <ul class="nav nav-tabs mb-0" id="mainTabs" role="tablist">
                @for($i = 1; $i <= 8; $i++)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $i == 1 ? 'active' : '' }}" id="sem{{ $i }}-tab" data-bs-toggle="tab" 
                                data-bs-target="#sem{{ $i }}" type="button" role="tab">
                            <i class="bi bi-{{ $i }}-circle me-1"></i> Semester {{ $i }}
                        </button>
                    </li>
                @endfor
            </ul>

            <div class="main-tab-content">
                <div class="tab-content" id="mainTabsContent">
                    @for($i = 1; $i <= 8; $i++)
                        <div class="tab-pane fade {{ $i == 1 ? 'show active' : '' }}" id="sem{{ $i }}" role="tabpanel">
                            <!-- Academic Development Section -->
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0"><i class="bi bi-journal-check me-2"></i>Academic Development</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Theory Exams Section -->
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="section-title mb-0">Theory Exams</h6>
                                            <button type="button" class="btn btn-primary btn-sm add-row-btn" 
                                                    onclick="addTheoryRow({{ $i }})">
                                                <i class="bi bi-plus-circle me-1"></i>Add Subject
                                            </button>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered" id="theory-table-{{ $i }}">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Paper Code</th>
                                                        <th>CA1 (20)</th>
                                                        <th>CA2 (20)</th>
                                                        <th>CA3 (20)</th>
                                                        <th>CA4 (20)</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="theory[{{ $i }}][subject][]"></td>
                                                        <td><input type="text" class="form-control" name="theory[{{ $i }}][code][]"></td>
                                                        <td><input type="number" class="form-control table-input" name="theory[{{ $i }}][ca1][]" min="0" max="20"></td>
                                                        <td><input type="number" class="form-control table-input" name="theory[{{ $i }}][ca2][]" min="0" max="20"></td>
                                                        <td><input type="number" class="form-control table-input" name="theory[{{ $i }}][ca3][]" min="0" max="20"></td>
                                                        <td><input type="number" class="form-control table-input" name="theory[{{ $i }}][ca4][]" min="0" max="20"></td>
                                                        <td>
                                                            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
        </div>
    </div>

                                    <!-- Practical Exams Section -->
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="section-title mb-0">Practical Exams</h6>
                                            <button type="button" class="btn btn-primary btn-sm add-row-btn" 
                                                    onclick="addPracticalRow({{ $i }})">
                                                <i class="bi bi-plus-circle me-1"></i>Add Practical
            </button>
        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered" id="practical-table-{{ $i }}">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Practical</th>
                                                        <th>Paper Code</th>
                                                        <th>PCA1 (50)</th>
                                                        <th>PCA2 (50)</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="practical[{{ $i }}][subject][]"></td>
                                                        <td><input type="text" class="form-control" name="practical[{{ $i }}][code][]"></td>
                                                        <td><input type="number" class="form-control table-input" name="practical[{{ $i }}][pca1][]" min="0" max="50"></td>
                                                        <td><input type="number" class="form-control table-input" name="practical[{{ $i }}][pca2][]" min="0" max="50"></td>
                                                        <td>
                                                            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                            </div>
                        </div>

                                    <!-- Semester Marks Section -->
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="section-title mb-0">Semester Marks</h6>
                                            <button type="button" class="btn btn-primary btn-sm add-row-btn" 
                                                    onclick="addSemesterRow({{ $i }})">
                                                <i class="bi bi-plus-circle me-1"></i>Add Subject
            </button>
        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered" id="semester-table-{{ $i }}">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Subject Code</th>
                                                        <th>Subjects Offered</th>
                                                        <th>Letter Grade</th>
                                                        <th>Points</th>
                                                        <th>Credit</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="semester[{{ $i }}][code][]"></td>
                                                        <td><input type="text" class="form-control" name="semester[{{ $i }}][subject][]"></td>
                                                        <td>
                                                            <select class="form-select" name="semester[{{ $i }}][grade][]">
                                                                <option value="">Select Grade</option>
                                                                <option value="O">O</option>
                                                                <option value="E">E</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="C">C</option>
                                                                <option value="D">D</option>
                                                                <option value="F">F</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="number" class="form-control table-input" name="semester[{{ $i }}][points][]" min="0" max="10"></td>
                                                        <td><input type="number" class="form-control table-input" name="semester[{{ $i }}][credit][]" step="0.5" min="0"></td>
                                                        <td>
                                                            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                            </div>
                        </div>

                                    <!-- Attendance Record Section -->
                                    <div class="mb-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="section-title mb-0">Attendance Record</h6>
                                            <button type="button" class="btn btn-primary btn-sm add-row-btn" 
                                                    onclick="addAttendanceRow({{ $i }})">
                                                <i class="bi bi-plus-circle me-1"></i>Add Subject
            </button>
        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered" id="attendance-table-{{ $i }}">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Month 1</th>
                                                        <th>Month 2</th>
                                                        <th>Month 3</th>
                                                        <th>Month 4</th>
                                                        <th>Month 5</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="attendance[{{ $i }}][subject][]"></td>
                                                        <td><input type="number" class="form-control table-input" name="attendance[{{ $i }}][month1][]" min="0" max="100"></td>
                                                        <td><input type="number" class="form-control table-input" name="attendance[{{ $i }}][month2][]" min="0" max="100"></td>
                                                        <td><input type="number" class="form-control table-input" name="attendance[{{ $i }}][month3][]" min="0" max="100"></td>
                                                        <td><input type="number" class="form-control table-input" name="attendance[{{ $i }}][month4][]" min="0" max="100"></td>
                                                        <td><input type="number" class="form-control table-input" name="attendance[{{ $i }}][month5][]" min="0" max="100"></td>
                                                        <td>
                                                            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                        </div>
                    </div>
                </div>
                            </div>

                            <!-- Save Changes Button -->
                            <div class="text-end mt-4">
                                <a href="{{ route('user.mentoring') }}" class="btn btn-secondary me-2">
                                    <i class="bi bi-x-circle me-1"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>Save Changes
                                </button>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function addTheoryRow(semester) {
    const tbody = document.querySelector(`#theory-table-${semester} tbody`);
    const newRow = tbody.insertRow();
    newRow.innerHTML = `
        <td><input type="text" class="form-control" name="theory[${semester}][subject][]"></td>
        <td><input type="text" class="form-control" name="theory[${semester}][code][]"></td>
        <td><input type="number" class="form-control table-input" name="theory[${semester}][ca1][]" min="0" max="20"></td>
        <td><input type="number" class="form-control table-input" name="theory[${semester}][ca2][]" min="0" max="20"></td>
        <td><input type="number" class="form-control table-input" name="theory[${semester}][ca3][]" min="0" max="20"></td>
        <td><input type="number" class="form-control table-input" name="theory[${semester}][ca4][]" min="0" max="20"></td>
        <td>
            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                <i class="bi bi-trash"></i>
            </button>
        </td>
    `;
}

function addPracticalRow(semester) {
    const tbody = document.querySelector(`#practical-table-${semester} tbody`);
    const newRow = tbody.insertRow();
    newRow.innerHTML = `
        <td><input type="text" class="form-control" name="practical[${semester}][subject][]"></td>
        <td><input type="text" class="form-control" name="practical[${semester}][code][]"></td>
        <td><input type="number" class="form-control table-input" name="practical[${semester}][pca1][]" min="0" max="50"></td>
        <td><input type="number" class="form-control table-input" name="practical[${semester}][pca2][]" min="0" max="50"></td>
        <td>
            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                <i class="bi bi-trash"></i>
            </button>
        </td>
        `;
}

function addSemesterRow(semester) {
    const tbody = document.querySelector(`#semester-table-${semester} tbody`);
    const newRow = tbody.insertRow();
    newRow.innerHTML = `
        <td><input type="text" class="form-control" name="semester[${semester}][code][]"></td>
        <td><input type="text" class="form-control" name="semester[${semester}][subject][]"></td>
        <td>
            <select class="form-select" name="semester[${semester}][grade][]">
                <option value="">Select Grade</option>
                                <option value="O">O</option>
                                <option value="E">E</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="F">F</option>
                            </select>
        </td>
        <td><input type="number" class="form-control table-input" name="semester[${semester}][points][]" min="0" max="10"></td>
        <td><input type="number" class="form-control table-input" name="semester[${semester}][credit][]" step="0.5" min="0"></td>
        <td>
            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                <i class="bi bi-trash"></i>
            </button>
        </td>
        `;
    }

function addAttendanceRow(semester) {
    const tbody = document.querySelector(`#attendance-table-${semester} tbody`);
    const newRow = tbody.insertRow();
    newRow.innerHTML = `
        <td><input type="text" class="form-control" name="attendance[${semester}][subject][]"></td>
        <td><input type="number" class="form-control table-input" name="attendance[${semester}][month1][]" min="0" max="100"></td>
        <td><input type="number" class="form-control table-input" name="attendance[${semester}][month2][]" min="0" max="100"></td>
        <td><input type="number" class="form-control table-input" name="attendance[${semester}][month3][]" min="0" max="100"></td>
        <td><input type="number" class="form-control table-input" name="attendance[${semester}][month4][]" min="0" max="100"></td>
        <td><input type="number" class="form-control table-input" name="attendance[${semester}][month5][]" min="0" max="100"></td>
        <td>
            <button type="button" class="remove-row-btn" onclick="removeRow(this)">
                <i class="bi bi-trash"></i>
            </button>
        </td>
    `;
}

function removeRow(button) {
    const row = button.closest('tr');
    row.remove();
    }

$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
</script>
@endpush
@endsection 