@if(Auth::user()->type=="employee")
@include('employee.home')
@else
@include('admin.index')
@endif