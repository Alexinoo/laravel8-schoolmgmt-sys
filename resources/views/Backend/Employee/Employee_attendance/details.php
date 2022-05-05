  <table id="example1" class="table table-bordered table-striped">
      <thead>
          <tr>
              <th>ID</th>
              <th>Emp No</th>
              <th>Name</th>
              <th>Date</th>
              <th>Attendance Status</th>
              <th class="text-center">Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach($model as $key => $attendance)

          <tr>
              <td>{{$key+1}}</td>
              <td>{{ $attendance->user->id_no}}</td>
              <td>{{ $attendance->user->name}}</td>
              <td>{{ date('d-m-Y',strtotime($attendance->date))}}</td>
              <td>{{ $attendance->attendance_status}}</td>
              <td>
                  <div class="text-center">
                      <a href="{{route('employee_attendance.edit',$attendance->id)}}" class="btn btn-circle btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                      <a href="{{ route('employee_attendance.delete',$attendance->id) }}" class="btn btn-circle btn-danger btn-xs ml-3" id="delete"><i class="fa fa-trash"></i></a>
                  </div>
              </td>

          </tr>

          @endforeach

      </tbody>
  </table>