@extends('student.layout.main')

@section('main-container')
<style>
    .mentoring-card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-bottom: 1.5rem;
        border-radius: 0.5rem;
    }
    .info-section {
        background-color: #f8f9fa;
        border-radius: 0.5rem;
        padding: 1.25rem;
        margin-bottom: 1rem;
    }
    .info-title {
        color: #344767;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    .info-title i {
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }
    .detail-row {
        display: flex;
        margin-bottom: 0.75rem;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 0.75rem;
    }
    .detail-label {
        width: 35%;
        color: #596780;
        font-weight: 500;
    }
    .detail-value {
        width: 65%;
        color: #344767;
    }
    .edit-button {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        background-color: #0d6efd;
        color: white;
        border: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }
    .edit-button:hover {
        background-color: #0b5ed7;
        transform: translateY(-1px);
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
    .badge-yes {
        background-color: #dcfce7;
        color: #166534;
    }
    .badge-no {
        background-color: #fee2e2;
        color: #991b1b;
    }
    .comm-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        margin-right: 5px;
        font-size: 0.8rem;
    }
    .badge-fluent {
        background-color: #dcfce7;
        color: #166534;
    }
    .badge-stemmering {
        background-color: #fef3c7;
        color: #92400e;
    }
    .badge-fumbles {
        background-color: #fee2e2;
        color: #991b1b;
    }
    .table th {
        font-weight: 600;
        color: #344767;
    }
    .attendance-table td, .attendance-table th {
        text-align: center;
    }
    .attendance-badge {
        width: 100%;
        display: inline-block;
        padding: 3px;
        border-radius: 4px;
        font-size: 0.85rem;
    }
    .attendance-good {
        background-color: #dcfce7;
        color: #166534;
    }
    .attendance-average {
        background-color: #fef3c7;
        color: #92400e;
    }
    .attendance-poor {
        background-color: #fee2e2;
        color: #991b1b;
    }
    .academic-table th, .academic-table td {
        vertical-align: middle;
    }
    .small-badge {
        font-size: 0.75rem;
        padding: 2px 5px;
        border-radius: 3px;
    }
</style>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Mentoring Information</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Mentoring Details</li>
            </ol>
        </nav>
    </div>
</div>

@if(session('success') || session('error') || session('info'))
    @include('components.alerts')
@endif

<div class="card mentoring-card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Student Mentoring Information</h4>
                <p class="text-muted mb-0">Comprehensive information about your academic journey</p>
            </div>
            <a href="{{ route('user.mentoring.edit') }}" class="edit-button" id="mainEditButton">
                <i class="bi bi-pencil-square"></i>
                Edit Information
            </a>
        </div>

        @if(!isset($student) || !$student)
            <div class="alert alert-warning">
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <div>
                        <h6 class="mb-0">Profile Not Available</h6>
                        <div>Your profile information is not available. Please contact the administrator.</div>
                    </div>
                </div>
            </div>
        @else
            <!-- Main Tabs Navigation -->
            <ul class="nav nav-tabs mb-0" id="mainTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="sem1-tab" data-bs-toggle="tab" data-bs-target="#sem1" type="button" role="tab">
                        <i class="bi bi-1-circle me-1"></i> Semester 1
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sem2-tab" data-bs-toggle="tab" data-bs-target="#sem2" type="button" role="tab">
                        <i class="bi bi-2-circle me-1"></i> Semester 2
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sem3-tab" data-bs-toggle="tab" data-bs-target="#sem3" type="button" role="tab">
                        <i class="bi bi-3-circle me-1"></i> Semester 3
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sem4-tab" data-bs-toggle="tab" data-bs-target="#sem4" type="button" role="tab">
                        <i class="bi bi-4-circle me-1"></i> Semester 4
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sem5-tab" data-bs-toggle="tab" data-bs-target="#sem5" type="button" role="tab">
                        <i class="bi bi-5-circle me-1"></i> Semester 5
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sem6-tab" data-bs-toggle="tab" data-bs-target="#sem6" type="button" role="tab">
                        <i class="bi bi-6-circle me-1"></i> Semester 6
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sem7-tab" data-bs-toggle="tab" data-bs-target="#sem7" type="button" role="tab">
                        <i class="bi bi-7-circle me-1"></i> Semester 7
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sem8-tab" data-bs-toggle="tab" data-bs-target="#sem8" type="button" role="tab">
                        <i class="bi bi-8-circle me-1"></i> Semester 8
                    </button>
                </li>
            </ul>

            <div class="main-tab-content">
                

                <div class="tab-content" id="mainTabsContent">
                    <!-- Semester 1 Tab Content -->
                    <div class="tab-pane fade show active" id="sem1" role="tabpanel">
                        <!-- Academic Development Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-journal-check me-2"></i>Academic Development</h5>
                            </div>
                            <div class="card-body">
                                <!-- Theory Exams Section -->
                                <div class="mb-4">
                                    <h6 class="border-bottom pb-2 mb-3">Theory Exams</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered academic-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Paper Code</th>
                                                    <th>CA1 (20)</th>
                                                    <th>CA2 (20)</th>
                                                    <th>CA3 (20)</th>
                                                    <th>CA4 (20)</th>
                                                    <th>Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Semester 1 Theory Subjects -->
                                                <tr>
                                                    <td>Basic Electronics</td>
                                                    <td>BEC101</td>
                                                    <td>18</td>
                                                    <td>16</td>
                                                    <td>19</td>
                                                    <td>17</td>
                                                    <td><strong>17.5</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Programming Fundamentals</td>
                                                    <td>CSC101</td>
                                                    <td>15</td>
                                                    <td>17</td>
                                                    <td>14</td>
                                                    <td>16</td>
                                                    <td><strong>15.5</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Mathematics I</td>
                                                    <td>MAT101</td>
                                                    <td>19</td>
                                                    <td>18</td>
                                                    <td>17</td>
                                                    <td>19</td>
                                                    <td><strong>18.25</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Practical Exams Section -->
                                <div class="mb-4">
                                    <h6 class="border-bottom pb-2 mb-3">Practical Exams</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered academic-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Practical</th>
                                                    <th>Paper Code</th>
                                                    <th>PCA1 (50)</th>
                                                    <th>PCA2 (50)</th>
                                                    <th>Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Semester 1 Practical Subjects -->
                                                <tr>
                                                    <td>Basic Electronics Lab</td>
                                                    <td>BECP101</td>
                                                    <td>42</td>
                                                    <td>45</td>
                                                    <td><strong>43.5</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Programming Lab</td>
                                                    <td>CSCP101</td>
                                                    <td>38</td>
                                                    <td>44</td>
                                                    <td><strong>41</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Semester Marks Table -->
                                <div class="table-responsive mt-4">
                                    <h6 class="border-bottom pb-2 mb-3">Semester Marks</h6>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 120px;">Subject Code</th>
                                                <th>Subjects Offered</th>
                                                <th style="width: 100px;">Letter Grade</th>
                                                <th style="width: 80px;">Points</th>
                                                <th style="width: 80px;">Credit</th>
                                                <th style="width: 100px;">Credit Points</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>BCAC501</td>
                                                <td>Internet Technology</td>
                                                <td>B</td>
                                                <td>7</td>
                                                <td>4.0</td>
                                                <td>28</td>
                                            </tr>
                                            <tr>
                                                <td>BCAC591</td>
                                                <td>Internet Technology Lab</td>
                                                <td>O</td>
                                                <td>10</td>
                                                <td>2.0</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>BCAC502</td>
                                                <td>Computer Networking</td>
                                                <td>A</td>
                                                <td>8</td>
                                                <td>4.0</td>
                                                <td>32</td>
                                            </tr>
                                            <tr>
                                                <td>BCAC592</td>
                                                <td>Computer Networking Lab</td>
                                                <td>O</td>
                                                <td>10</td>
                                                <td>2.0</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>BCAD501A</td>
                                                <td>Cloud Computing</td>
                                                <td>E</td>
                                                <td>9</td>
                                                <td>6.0</td>
                                                <td>54</td>
                                            </tr>
                                            <tr>
                                                <td>BCAD581</td>
                                                <td>Industrial Training & Minor Project</td>
                                                <td>O</td>
                                                <td>10</td>
                                                <td>6.0</td>
                                                <td>60</td>
                                            </tr>
                                            <tr class="fw-bold">
                                                <td colspan="4" class="text-end">Total</td>
                                                <td>24</td>
                                                <td>214</td>
                                            </tr>
                                            <tr class="table-light">
                                                <td colspan="5" class="text-end fw-bold">SGPA</td>
                                                <td class="fw-bold">8.92</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Attendance Record Section (Odd Semester) -->
                                <div>
                                    <h6 class="border-bottom pb-2 mb-3">Attendance Record (Jul-Nov)</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered attendance-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>July</th>
                                                    <th>August</th>
                                                    <th>September</th>
                                                    <th>October</th>
                                                    <th>November</th>
                                                    <th>Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Semester 1 Attendance -->
                                                <tr>
                                                    <td>Basic Electronics (BEC101)</td>
                                                    <td>88%</td>
                                                    <td>90%</td>
                                                    <td>86%</td>
                                                    <td>84%</td>
                                                    <td>89%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-average">87%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Programming Fundamentals (CSC101)</td>
                                                    <td>92%</td>
                                                    <td>90%</td>
                                                    <td>88%</td>
                                                    <td>94%</td>
                                                    <td>90%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">91%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mathematics I (MAT101)</td>
                                                    <td>96%</td>
                                                    <td>94%</td>
                                                    <td>92%</td>
                                                    <td>90%</td>
                                                    <td>95%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">93%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Basic Electronics Lab (BECP101)</td>
                                                    <td>90%</td>
                                                    <td>88%</td>
                                                    <td>92%</td>
                                                    <td>94%</td>
                                                    <td>90%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">91%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Programming Lab (CSCP101)</td>
                                                    <td>100%</td>
                                                    <td>96%</td>
                                                    <td>94%</td>
                                                    <td>98%</td>
                                                    <td>96%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">97%</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="table-light">
                                                <tr>
                                                    <th>Overall Attendance</th>
                                                    <th>93%</th>
                                                    <th>92%</th>
                                                    <th>90%</th>
                                                    <th>92%</th>
                                                    <th>92%</th>
                                                    <th>
                                                        <span class="attendance-badge attendance-good">92%</span>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Career Development Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-briefcase me-2"></i>Career Development</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h6 class="border-bottom pb-2 mb-3">NPTEL/MOOC Certifications</h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Certificate Name</th>
                                                        <th>Completion Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Semester 1 Certificates -->
                                                    <tr>
                                                        <td>Introduction to Programming</td>
                                                        <td>15-Sep-2023</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basic Electronics Fundamentals</td>
                                                        <td>28-Oct-2023</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="border-bottom pb-2 mb-3">Skill Development</h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Skill</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Semester 1 Skills -->
                                                    <tr>
                                                        <td>C Programming</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Electronic Circuit Analysis</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Communication Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-chat-dots me-2"></i>Communication Pattern</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Language Proficiency</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Language</th>
                                                        <th>Fluent</th>
                                                        <th>Stemmering</th>
                                                        <th>Fumbles</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>English</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hindi</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bengali</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Body Language</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Characteristic</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Free while speaking</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stiff</td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sweating</td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activities Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-controller me-2"></i>Extra Curricular Activities</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Indoor Games</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Carrom</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Chess</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Ludo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Outdoor Games</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Cricket</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Football</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Badminton</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Outreach Section -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-people me-2"></i>Outreach Programs</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Health & Awareness Programs</h6>
                                        <div class="detail-row">
                                            <div class="detail-label">Activities</div>
                                            <div class="detail-value">
                                                <ul class="list-unstyled">
                                                    <li class="mb-2">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Blood Donation Camp</span>
                                                    </li>
                                                    <li class="mb-2">
                                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                        <span>Dengue Awareness</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Science & Environment Activities</h6>
                                        <div class="detail-row">
                                            <div class="detail-label">Activities</div>
                                            <div class="detail-value">
                                                Tree Plantation Drive in College Campus
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Semester 2 Tab Content -->
                    <div class="tab-pane fade" id="sem2" role="tabpanel">
                        <!-- Academic Development Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-journal-check me-2"></i>Academic Development</h5>
                            </div>
                            <div class="card-body">
                                <!-- Theory Exams Section -->
                                <div class="mb-4">
                                    <h6 class="border-bottom pb-2 mb-3">Theory Exams</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered academic-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Paper Code</th>
                                                    <th>CA1 (20)</th>
                                                    <th>CA2 (20)</th>
                                                    <th>CA3 (20)</th>
                                                    <th>CA4 (20)</th>
                                                    <th>Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Semester 2 Theory Subjects -->
                                                <tr>
                                                    <td>Data Structures</td>
                                                    <td>CSC201</td>
                                                    <td>18</td>
                                                    <td>16</td>
                                                    <td>19</td>
                                                    <td>17</td>
                                                    <td><strong>17.5</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Digital Electronics</td>
                                                    <td>BEC201</td>
                                                    <td>15</td>
                                                    <td>17</td>
                                                    <td>14</td>
                                                    <td>16</td>
                                                    <td><strong>15.5</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Mathematics II</td>
                                                    <td>MAT201</td>
                                                    <td>19</td>
                                                    <td>18</td>
                                                    <td>17</td>
                                                    <td>19</td>
                                                    <td><strong>18.25</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Practical Exams Section -->
                                <div class="mb-4">
                                    <h6 class="border-bottom pb-2 mb-3">Practical Exams</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered academic-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Practical</th>
                                                    <th>Paper Code</th>
                                                    <th>PCA1 (50)</th>
                                                    <th>PCA2 (50)</th>
                                                    <th>Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Semester 2 Practical Subjects -->
                                                <tr>
                                                    <td>Data Structures Lab</td>
                                                    <td>CSCP201</td>
                                                    <td>42</td>
                                                    <td>45</td>
                                                    <td><strong>43.5</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Digital Electronics Lab</td>
                                                    <td>BECP201</td>
                                                    <td>38</td>
                                                    <td>44</td>
                                                    <td><strong>41</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Semester Marks Table -->
                                <div class="table-responsive mt-4">
                                    <h6 class="border-bottom pb-2 mb-3">Semester Marks</h6>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 120px;">Subject Code</th>
                                                <th>Subjects Offered</th>
                                                <th style="width: 100px;">Letter Grade</th>
                                                <th style="width: 80px;">Points</th>
                                                <th style="width: 80px;">Credit</th>
                                                <th style="width: 100px;">Credit Points</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>BCAC501</td>
                                                <td>Internet Technology</td>
                                                <td>B</td>
                                                <td>7</td>
                                                <td>4.0</td>
                                                <td>28</td>
                                            </tr>
                                            <tr>
                                                <td>BCAC591</td>
                                                <td>Internet Technology Lab</td>
                                                <td>O</td>
                                                <td>10</td>
                                                <td>2.0</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>BCAC502</td>
                                                <td>Computer Networking</td>
                                                <td>A</td>
                                                <td>8</td>
                                                <td>4.0</td>
                                                <td>32</td>
                                            </tr>
                                            <tr>
                                                <td>BCAC592</td>
                                                <td>Computer Networking Lab</td>
                                                <td>O</td>
                                                <td>10</td>
                                                <td>2.0</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>BCAD501A</td>
                                                <td>Cloud Computing</td>
                                                <td>E</td>
                                                <td>9</td>
                                                <td>6.0</td>
                                                <td>54</td>
                                            </tr>
                                            <tr>
                                                <td>BCAD581</td>
                                                <td>Industrial Training & Minor Project</td>
                                                <td>O</td>
                                                <td>10</td>
                                                <td>6.0</td>
                                                <td>60</td>
                                            </tr>
                                            <tr class="fw-bold">
                                                <td colspan="4" class="text-end">Total</td>
                                                <td>24</td>
                                                <td>214</td>
                                            </tr>
                                            <tr class="table-light">
                                                <td colspan="5" class="text-end fw-bold">SGPA</td>
                                                <td class="fw-bold">8.92</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Attendance Record Section (Even Semester) -->
                                <div>
                                    <h6 class="border-bottom pb-2 mb-3">Attendance Record (Jan-May)</h6>
                                    <div class="table-responsive">
                                        <table class="table table-bordered attendance-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>January</th>
                                                    <th>February</th>
                                                    <th>March</th>
                                                    <th>April</th>
                                                    <th>May</th>
                                                    <th>Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Semester 2 Attendance -->
                                                <tr>
                                                    <td>Data Structures (CSC201)</td>
                                                    <td>92%</td>
                                                    <td>88%</td>
                                                    <td>90%</td>
                                                    <td>86%</td>
                                                    <td>94%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">90%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Digital Electronics (BEC201)</td>
                                                    <td>85%</td>
                                                    <td>82%</td>
                                                    <td>80%</td>
                                                    <td>78%</td>
                                                    <td>84%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-average">82%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mathematics II (MAT201)</td>
                                                    <td>95%</td>
                                                    <td>92%</td>
                                                    <td>90%</td>
                                                    <td>94%</td>
                                                    <td>93%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">93%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Data Structures Lab (CSCP201)</td>
                                                    <td>90%</td>
                                                    <td>92%</td>
                                                    <td>88%</td>
                                                    <td>86%</td>
                                                    <td>90%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">89%</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Digital Electronics Lab (BECP201)</td>
                                                    <td>94%</td>
                                                    <td>90%</td>
                                                    <td>92%</td>
                                                    <td>88%</td>
                                                    <td>92%</td>
                                                    <td>
                                                        <span class="attendance-badge attendance-good">91%</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="table-light">
                                                <tr>
                                                    <th>Overall Attendance</th>
                                                    <th>91%</th>
                                                    <th>89%</th>
                                                    <th>88%</th>
                                                    <th>86%</th>
                                                    <th>91%</th>
                                                    <th>
                                                        <span class="attendance-badge attendance-good">89%</span>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Communication Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-chat-dots me-2"></i>Communication Pattern</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Language Proficiency</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Language</th>
                                                        <th>Fluent</th>
                                                        <th>Stemmering</th>
                                                        <th>Fumbles</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>English</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hindi</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bengali</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Body Language</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Characteristic</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Free while speaking</td>
                                                        <td>
                                                            <span class="comm-badge badge-fluent">Yes</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stiff</td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sweating</td>
                                                        <td>
                                                            <span class="comm-badge badge-no">No</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Career Development Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-briefcase me-2"></i>Career Development</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h6 class="border-bottom pb-2 mb-3">NPTEL/MOOC Certifications</h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Certificate Name</th>
                                                        <th>Completion Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Semester 2 Certificates -->
                                                    <tr>
                                                        <td>Data Structures and Algorithms</td>
                                                        <td>15-Mar-2024</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Digital System Design</td>
                                                        <td>28-Apr-2024</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="border-bottom pb-2 mb-3">Skill Development</h6>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Skill</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Semester 2 Skills -->
                                                    <tr>
                                                        <td>Java Programming</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Data Structures</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activities Section -->
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-controller me-2"></i>Extra Curricular Activities</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Indoor Games</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Chess</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Cards</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Outdoor Games</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Cricket</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-circle-fill me-2 text-success small"></i>
                                                    <span>Badminton</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 g-4">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Music & Dance</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-music-note me-2 text-primary"></i>
                                                    <span>Guitar</span>
                                                </div>
                                            </li>
                                            <li class="mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-music-note-beamed me-2 text-primary"></i>
                                                    <span>Vocal Music</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Other Cultural Activities</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-camera me-2 text-primary"></i>
                                                    <span>Photography</span>
                                                </div>
                                            </li>
                                            <li class="mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-mic me-2 text-primary"></i>
                                                    <span>Debate</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Outreach Section -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="bi bi-people me-2"></i>Outreach Programs</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Health & Awareness Programs</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>Health Awareness Campaign</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Industry & Workshop Visits</h6>
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span>Local Software Company Visit</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Semester 3 Tab Content -->
                    <div class="tab-pane fade" id="sem3" role="tabpanel">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Semester 3 information will be available when you progress to this semester.
                        </div>
                    </div>
                    
                    <!-- Semester 4 Tab Content -->
                    <div class="tab-pane fade" id="sem4" role="tabpanel">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Semester 4 information will be available when you progress to this semester.
                        </div>
                    </div>
                    
                    <!-- Semester 5 Tab Content -->
                    <div class="tab-pane fade" id="sem5" role="tabpanel">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Semester 5 information will be available when you progress to this semester.
                        </div>
                    </div>
                    
                    <!-- Semester 6 Tab Content -->
                    <div class="tab-pane fade" id="sem6" role="tabpanel">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Semester 6 information will be available when you progress to this semester.
                        </div>
                    </div>
                    
                    <!-- Semester 7 Tab Content -->
                    <div class="tab-pane fade" id="sem7" role="tabpanel">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Semester 7 information will be available when you progress to this semester.
                        </div>
                    </div>
                    
                    <!-- Semester 8 Tab Content -->
                    <div class="tab-pane fade" id="sem8" role="tabpanel">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Semester 8 information will be available when you progress to this semester.
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
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