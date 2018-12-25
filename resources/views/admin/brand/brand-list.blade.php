<style>
    tr td,tr th{text-align: center;}
    thead th{background: #aeaeb7;color: #fff;border: 1px solid #555;}
    tbody tr td{border: 1px solid #555;}
</style>
@extends("admin.master")
@section("title")
{{ 'Brands List - infinity.com' }}
@endsection
@section("headline")
{{ "Brands List" }}
@endsection
@section("body")
<div class="form-group border">
    @if(Session::get('msg'))
     <h4 class="alert alert-success">{{ Session::get("msg") }} </h4>
    @endif   
    @if(Session::get('danger_msg'))
	 <h4 class="alert alert-danger">{{ Session::get("danger_msg") }} </h4>
    @endif
    <table class="table" class="table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Brand Name</th>
                <th>Publication Stutus</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($i=1)
            @foreach($brands as $value)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $value->brand_name }}</td>
                <td>
                    {{ $value->publication_status == 1 ? 'Published' : 'Un-published'}}
                </td>
                <td>
                    @if($value->publication_status == 1)
                    <a href="{{ route('/brand-unpublished',['brand_id' => $value->id]) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                    @else
                    <a href="{{ route('/brand-published',['brand_id' => $value->id]) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-eye-close"></span></a>
                    @endif

                    <a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>

                    <a href="{{ route('/brand-delete',['brand_id' => $value->id]) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>
@endsection
