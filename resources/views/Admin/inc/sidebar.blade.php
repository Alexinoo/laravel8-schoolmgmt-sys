  @php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
  @endphp

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar-->
      <section class="sidebar">

          <div class="user-profile">
              <div class="ulogo">
                  <a href="index.html">
                      <!-- logo for regular state and mobile devices -->
                      <div class="d-flex align-items-center justify-content-center">
                          <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                          <h3><b>Sunny</b> Admin</h3>
                      </div>
                  </a>
              </div>
          </div>

          <!-- sidebar menu-->
          <ul class="sidebar-menu" data-widget="tree">

              <li class="{{ ($route == 'dashboard') ? 'active': ''}}">
                  <a href="{{route('dashboard')}}">
                      <i data-feather="pie-chart"></i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart">
                          <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                          <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                      </svg>

                      <span>Dashboard</span>
                  </a>
              </li>

              @if(Auth::user()->role == 'Admin')
              <li class="treeview {{ ($prefix == '/users') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="message-circle"></i>

                      <span>Manage Users</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class=" {{ ($route == 'view.users') ? 'active': ''}}"><a href="{{ route('view.users')}}"><i class="ti-more"></i> Users</a></li>
                      <li class=" {{ ($route == 'add.user') ? 'active': ''}}"><a href="{{route('add.user')}}"><i class="ti-more"></i>Add User</a></li>
                  </ul>
              </li>
              @endif


              <li class="treeview {{ ($prefix == '/profile') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="mail"></i> <span>Manage Profile</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class=" {{ ($route == 'view.profile') ? 'active': ''}}"><a href="{{ route('view.profile') }}"><i class="ti-more"></i>Your Profile</a></li>


                      <li class=" {{ ($route == 'view.password') ? 'active': ''}}"><a href="{{ route('view.password') }}"><i class="ti-more"></i>Change Password</a></li>


                  </ul>
              </li>


              <li class="treeview {{ ($prefix == '/setups') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="mail"></i> <span>Setup Management</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class=" {{ ($route == 'student_class.index') ? 'active': ''}}"><a href="{{ route('student_class.index') }}"><i class="ti-more"></i>Student class</a></li>


                      <li class=" {{ ($route == 'student_year.index') ? 'active': ''}}"><a href="{{ route('student_year.index') }}"><i class="ti-more"></i>Student year</a></li>


                      <li class=" {{ ($route == 'student_group.index') ? 'active': ''}}"><a href="{{ route('student_group.index') }}"><i class="ti-more"></i>Student group</a></li>


                      <li class=" {{ ($route == 'student_shift.index') ? 'active': ''}}"><a href="{{ route('student_shift.index') }}"><i class="ti-more"></i>Student shift</a></li>


                      <li class=" {{ ($route == 'fee_category.index') ? 'active': ''}}"><a href="{{ route('fee_category.index') }}"><i class="ti-more"></i>Fee Category</a></li>


                      <li class=" {{ ($route == 'fee_category_amount.index') ? 'active': ''}}"><a href="{{ route('fee_category_amount.index') }}"><i class="ti-more"></i>Fee Category Amount</a></li>


                      <li class=" {{ ($route == 'exam_type.index') ? 'active': ''}}"><a href="{{ route('exam_type.index') }}"><i class="ti-more"></i>Exam type</a></li>


                      <li class=" {{ ($route == 'school_subject.index') ? 'active': ''}}"><a href="{{ route('school_subject.index') }}"><i class="ti-more"></i>School Subject</a></li>


                      <li class=" {{ ($route == 'assign_subject.index') ? 'active': ''}}"><a href="{{ route('assign_subject.index') }}"><i class="ti-more"></i>Assign Subject</a></li>


                      <li class=" {{ ($route == 'designation.index') ? 'active': ''}}"><a href="{{ route('designation.index') }}"><i class="ti-more"></i>Designation</a></li>



                  </ul>
              </li>


              <li class="treeview {{ ($prefix == '/students') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="mail"></i> <span>Student Management</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">

                      <li class=" {{ ($route == 'student_registration.index') ? 'active': ''}}"><a href="{{ route('student_registration.index') }}"><i class="ti-more"></i>Student Registration</a></li>


                      <li class=" {{ ($route == 'generate_roll.index') ? 'active': ''}}"><a href="{{ route('generate_roll.index') }}"><i class="ti-more"></i>Roll Generate</a></li>

                      <li class=" {{ ($route == 'registration_fee.index') ? 'active': ''}}"><a href="{{ route('registration_fee.index') }}"><i class="ti-more"></i>Registration Fee</a></li>

                      <li class=" {{ ($route == 'monthly_fee.index') ? 'active': ''}}"><a href="{{ route('monthly_fee.index') }}"><i class="ti-more"></i>Monthly Fee</a></li>

                      <li class=" {{ ($route == 'exam_fee.index') ? 'active': ''}}"><a href="{{ route('exam_fee.index') }}"><i class="ti-more"></i>Exam Fee</a></li>

                  </ul>
              </li>


              <li class="treeview {{ ($prefix == '/employees') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="mail"></i> <span>Employee Management</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class=" {{ ($route == 'employee_registration.index') ? 'active': ''}}"><a href="{{ route('employee_registration.index') }}"><i class="ti-more"></i>Employee Registration</a></li>

                      <li class=" {{ ($route == 'employee_salary.index') ? 'active': ''}}"><a href="{{ route('employee_salary.index') }}"><i class="ti-more"></i>Employee Salary</a></li>

                      <li class=" {{ ($route == 'employee_leave.index') ? 'active': ''}}"><a href="{{ route('employee_leave.index') }}"><i class="ti-more"></i>Employee Leave</a></li>

                      <li class=" {{ ($route == 'employee_attendance.index') ? 'active': ''}}"><a href="{{ route('employee_attendance.index') }}"><i class="ti-more"></i>Employee Attendance</a></li>

                      <li class=" {{ ($route == 'monthly_salary.index') ? 'active': ''}}"><a href="{{ route('monthly_salary.index') }}"><i class="ti-more"></i>Monthly Salary</a></li>

                  </ul>
              </li>

              <li class="treeview {{ ($prefix == '/marks') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="mail"></i> <span>Marks Management</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class=" {{ ($route == 'marks_entry.entries') ? 'active': ''}}"><a href="{{ route('marks_entry.entries') }}"><i class="ti-more"></i>Marks Entry</a></li>

                      <li class=" {{ ($route == 'marks_entry.edit') ? 'active': ''}}"><a href="{{ route('marks_entry.edit') }}"><i class="ti-more"></i>Update Entries</a></li>


                      <li class=" {{ ($route == 'marks_grade.index') ? 'active': ''}}"><a href="{{ route('marks_grade.index') }}"><i class="ti-more"></i>Marks Grade</a></li>

                  </ul>
              </li>

              <li class="treeview {{ ($prefix == '/accounts') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="mail"></i> <span>Accounts Management</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class=" {{ ($route == 'student_fee.index') ? 'active': ''}}"><a href="{{ route('student_fee.index') }}"><i class="ti-more"></i>Student Fee</a></li>

                      <li class=" {{ ($route == 'salaries.index') ? 'active': ''}}"><a href="{{ route('salaries.index') }}"><i class="ti-more"></i>Employee Salaries</a></li>

                      <li class=" {{ ($route == 'other_cost.index') ? 'active': ''}}"><a href="{{ route('other_cost.index') }}"><i class="ti-more"></i>Other Costs</a></li>

                  </ul>
              </li>

              <li class="header nav-small-cap">Report Interface</li>

              <li class="treeview {{ ($prefix == '/reports') ? 'active': ''}}">
                  <a href="#">
                      <i data-feather="server"></i> <span>Reports Management</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class=" {{ ($route == 'monthly-profit.index') ? 'active': ''}}"><a href="{{ route('monthly-profit.index') }}"><i class="ti-more"></i>Monthly / Yearly Profit</a></li>

                      <li class=" {{ ($route == 'generate_marksheet.index') ? 'active': ''}}"><a href="{{ route('generate_marksheet.index') }}"><i class="ti-more"></i>Generate Marksheet</a></li>

                      <li class=" {{ ($route == 'attendance_report.index') ? 'active': ''}}"><a href="{{ route('attendance_report.index') }}"><i class="ti-more"></i>Attendance </a></li>

                      <li class=" {{ ($route == 'student_perfomance.index') ? 'active': ''}}"><a href="{{ route('student_perfomance.index') }}"><i class="ti-more"></i>Students Perfomance </a></li>

                      <li class=" {{ ($route == 'student_ID.index') ? 'active': ''}}"><a href="{{ route('student_ID.index') }}"><i class="ti-more"></i>Student ID Card </a></li>


                  </ul>
              </li>



          </ul>
      </section>

  </aside>
