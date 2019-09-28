@extends('backEnd.masterPage')
@section('mainPart')
<div class="page-body">
    <div class="card">
        <div class="card-header">
            <h5>User List</h5>
        </div>
        <div class="card-body">
            <div class="dt-plugin-buttons"></div>
                <div class="dt-responsive table-responsive">
                    <table id="table" class="table table-striped table-bordered nowrap">
                        <thead class="bg-success">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Phone No</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
</div>
                                                  
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ URL::current() }}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'city', name: 'city' },
                { data: 'state', name: 'state' },
                { data: 'country', name: 'country' },
                { data: 'phoneNo', name: 'phoneNo' },
                { data: 'role', name: 'role' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 0, "desc" ]] 
        });
    });
</script>
@endsection

