@extends('admin.layout.main')

@Section('main-container')


        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Users</p>
                                        <h4 class="my-1">{{$user}}</h4>
                                    </div>
                                    <div class="text-primary ms-auto font-35"><i class="bi bi-person-check-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Mentees</p>
                                        <h4 class="my-1">{{$mentee}}</h4>
                                    </div>
                                    <div class="text-danger ms-auto font-35"><i class="bi bi-people-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Mentoring Data (Pending)</p>
                                        <h4 class="my-1">68</h4>
                                    </div>
                                    <div class="text-warning ms-auto font-35"><i class="bi bi-info-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Mentorless</p>
                                        <h4 class="my-1">85</h4>
                                    </div>
                                    <div class="text-success ms-auto font-35"><i class="bi bi-people-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->

                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">

                                </div>
                                <!-- <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>Downloads</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-danger"></i>Earnings</span>
							</div> -->
                                <!-- <div class="chart-container-1">
								<canvas id="chart5"></canvas>
							  </div>
						  </div> -->
                                <!-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-0 row-group text-center border-top">
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">$168</h4>
								<small class="mb-0">Today's Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">$856</h4>
								<small class="mb-0">This Week Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h4 class="mb-0">$2400</h4>
								<small class="mb-0">This Month Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
							  </div>
							</div>
							<div class="col">
								<div class="p-3">
								  <h4 class="mb-0">$4,562</h4>
								  <small class="mb-0">This Year Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.62%</span></small>
								</div>
							  </div>
						  </div>
					  </div>
				   </div> -->
                                <!-- </div>end row -->

                                <!-- <div class="row">
					<div class="col-12 col-lg-6">
						<div class="card radius-10">
							<div class="card-body">
							 <div class="d-flex align-items-center">
								 <div>
									 <h6 class="mb-0">Top Categories</h6>
								 </div>
								 <div class="dropdown ms-auto">
									 <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									 </a>
									 <ul class="dropdown-menu">
										 <li><a class="dropdown-item" href="javascript:;">Action</a>
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Another action</a>
										 </li>
										 <li>
											 <hr class="dropdown-divider">
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Something else here</a>
										 </li>
									 </ul>
								 </div>
							 </div>
							 <div class="chart-container-1 mt-4">
								 <canvas id="chart6"></canvas>
							   </div>
							</div>
						</div>
					</div> -->
                                <!-- <div class="col-12 col-lg-6">
						<div class="card radius-10">
							<div class="card-body">
							 <div class="d-flex align-items-center">
								 <div>
									 <h6 class="mb-0">Product Views</h6>
								 </div>
								 <div class="dropdown ms-auto">
									 <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									 </a>
									 <ul class="dropdown-menu">
										 <li><a class="dropdown-item" href="javascript:;">Action</a>
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Another action</a>
										 </li>
										 <li>
											 <hr class="dropdown-divider">
										 </li>
										 <li><a class="dropdown-item" href="javascript:;">Something else here</a>
										 </li>
									 </ul>
								 </div>
							 </div> -->
                                <!-- <div class="chart-container-1 mt-4">
								 <canvas id="chart7"></canvas>
							   </div>
							</div>
						</div>
					</div> -->
                                <!-- </div>end row -->

                                <!-- <div class="card radius-10">
                         <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Recent Orders</h6>
								</div>
								<div class="dropdown ms-auto">
									<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										<li><a class="dropdown-item" href="javascript:;">Another action</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="javascript:;">Something else here</a>
										</li>
									</ul>
								</div> -->
                                <!-- </div> -->
                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 text-center">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Contact</th>

                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Demo Demo</td>
                                                <td><img src="{{url('admin-assets/images/products/image1.png')}}" class="product-img-2" alt="product img"></td>
                                                <td>demo@gmail.com</td>

                                                <td>+90 1111111111</td>
                                                <td>03 Feb 2020</td>
                                                <td><a href=""><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Approved</span></a></td>
                                                <!-- <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
								  </div></td> -->
                                                <td>
                                                    <div>
                                                        <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i>
									</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                                <a class="dropdown-item" href="javascript:;"><i class="bi bi-pencil-square"></i> Modify</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-info-square"></i> Info</a>
                                                            </li>

                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-trash3"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Souvik Mukherjee</td>
                                                <td><img src="{{url('admin-assets/images/products/image3.png')}}" class="product-img-2" alt="product img"></td>
                                                <td>souvik@gmail.com</td>

                                                <td>+91 1212121212</td>
                                                <td>05 Feb 2020</td>
                                                <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                                                <td>
                                                    <div>
                                                        <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i>
									</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                                <a class="dropdown-item" href="javascript:;"><i class="bi bi-pencil-square"></i> Modify</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-info-square"></i> Info</a>
                                                            </li>

                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-trash3"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <!-- <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
								  </div></td> -->
                                            </tr>

                                            <tr>
                                                <td>Souvik Souvik</td>
                                                <td><img src="{{url('admin-assets/images/products/image2.png')}}" class="product-img-2" alt="product img"></td>
                                                <td>souvik1@gmail.com</td>

                                                <td>+91 0000000000</td>
                                                <td>06 Feb 2020</td>
                                                <td><a href=""><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Approved</span></a></td>
                                                <td>
                                                    <div>
                                                        <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i>
									</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                                <a class="dropdown-item" href="javascript:;"><i class="bi bi-pencil-square"></i> Modify</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-info-square"></i> Info</a>
                                                            </li>

                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-trash3"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <!-- <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 70%"></div>
								  </div></td> -->
                                            </tr>

                                            <tr>
                                                <td>Mukherjee Souvik</td>
                                                <td><img src="{{url('admin-assets/images/products/image4.png')}}" class="product-img-2" alt="product img"></td>
                                                <td>mukherjee@gmail.com</td>

                                                <td>+91 1111111111</td>
                                                <td>14 Feb 2020</td>
                                                <td><a href=""><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Approved</span></a></td>
                                                <td>
                                                    <div>
                                                        <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i>
									</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                                <a class="dropdown-item" href="javascript:;"><i class="bi bi-pencil-square"></i> Modify</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-info-square"></i> Info</a>
                                                            </li>

                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-trash3"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </td>
                                                <!-- <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
								  </div></td> -->
                                            </tr>
                                            <tr>
                                                <td>Eminent BCA</td>
                                                <td><img src="{{url('admin-assets/images/products/image3.png')}}" class="product-img-2" alt="product img"></td>
                                                <td>eminentbca@gmail.com</td>

                                                <td>+91 1234567890</td>
                                                <td>18 Feb 2020</td>
                                                <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                                                <td>
                                                    <div>
                                                        <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i>
									</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                                <a class="dropdown-item" href="javascript:;"><i class="bi bi-pencil-square"></i> Modify</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-info-square"></i> Info</a>
                                                            </li>

                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-trash3"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <!-- <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
								  </div></td> -->
                                            </tr>
                                            <tr>
                                                <td>Swapnil Dewanjee</td>
                                                <td><img src="{{url('admin-assets/images/products/image1.png')}}" class="product-img-2" alt="product img"></td>
                                                <td>swapnil@gmil.com</td>

                                                <td>+91 1236547890</td>
                                                <td>21 Feb 2020</td>
                                                <td><a href=""><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Approved</span></a></td>
                                                <td>
                                                    <div>
                                                        <a class="dropdown-toggle dropdown-toggle-nocaret btn btn-light btn-sm" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i>
									</a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <!-- <i class="fa-solid fa-info"></i> -->
                                                                <a class="dropdown-item" href="javascript:;"><i class="bi bi-pencil-square"></i> Modify</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-info-square"></i> Info</a>
                                                            </li>

                                                            <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-trash3"></i> Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </td>
                                                <!-- <td><div class="progress" style="height: 5px;">
									<div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 40%"></div>
								  </div></td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="vm">
                                    <button class="btn btn-outline-primary btn-sm">View More</button>
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

@endsection
