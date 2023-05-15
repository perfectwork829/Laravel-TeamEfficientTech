@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.userDashboard.title') }}
                </div>
                <div class="panel-body">
                    <h3>
                        Welcome to Team Efficient Tech!
</h3></br>
<h4>
                        What would you like to do today?
</h4>
<table border="1" cellpadding="1" cellspacing="1" style="width:500px">
	<tbody>
		<tr>
			<td><a href="https://app.teamefficienttech.com/admin/time-entries/create">Log My Timesheet</a></td>
			<td><a href="https://app.teamefficienttech.com/admin/messenger/create">Send a Message</a></td>
			<td><a href="https://app.teamefficienttech.com/admin/check-ins/create">Check into a Job Site</a></td>
		</tr>
		<tr>
			<td><a href="https://app.teamefficienttech.com/admin/expenses/create">Log Expenses</a></td>
			<td><a href="https://app.teamefficienttech.com/admin/tasks">View My Schedule</a></td>
			<td><a href="https://app.teamefficienttech.com/admin/expenses/create">Log Miles</a></td>
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>


                </div>
            </div>



        </div>
    </div>
</div>
@endsection