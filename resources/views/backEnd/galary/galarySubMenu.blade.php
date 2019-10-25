@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Galary Sub Menu</div>
                    <div class="col-6 text-right">                        
                        <a href="{{url('galary/sub-menu/create')}}" class="btn btn-primary btn-sm ajax-click-page">Create sUB-Menu</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Menu Name</th>
                            <th>Sub Menu</th>
                            <th>position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var table;
    $(function() {        
        // Load Data via datatable
        table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! URL::current() !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'menuName', name: 'menuName' },
                { data: 'subMenuName', name: 'subMenuName' },
                { data: 'position', name: 'position' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 3, "ASC" ]] 
        });
    });    
</script>
@endsection

