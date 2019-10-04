@extends('backEnd.masterPage')
@section('mainPart')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-default">
                <div class="row">
                    <div class="col-6">Category List</div>
                    <div class="col-6 text-right">  
                    <a  href="{{url('category/create')}}" class="btn btn-sm btn-primary ajax-click-page" >Add New Category</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="category-table" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Meta Tag</th>
                            <th>Position</th>
                            <th>Sub Category</th>
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
        table = $('#category-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! URL::current() !!}',
            columns: [
                { data: 'index', name: 'index' },
                { data: 'categoryImage', name: 'categoryImage' },
                { data: 'categoryName', name: 'categoryName' },
                { data: 'pageTitle', name: 'pageTitle' },
                { data: 'metaTag', name: 'metaTag' },
                { data: 'position', name: 'position' },
                { data: 'haveSubCategory', name: 'haveSubCategory' },
                { data: 'publicationStatus', name: 'publicationStatus' },
                { data: 'action', name: 'action' }
            ],
            "lengthMenu": [[25, 50, 100, 500,1000, -1], [25, 50, 100, 500,1000, "All"]],
            "order": [[ 5, "ASC" ]] 
        });   
        
    });    
</script>
@endsection

