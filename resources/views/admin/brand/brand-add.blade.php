@extends("admin.master")
@section("title")
{{ 'New Brand-infinity.com' }}
@endsection
@section("headline")
{{ "New Brand" }}
@endsection
@section("body")
<h3 class="text-success">{{ Session::get("msg") }}</h3>
<div class="form-group border" style="width: 30%;">
	
     {{ Form::open(['route'=> '/brand_add','class' => 'form-horizontal']) }}
     {{ Form::label('brand_name', 'Brand Name') }}
     {{ Form::text('brand_name','',['class' => 'form-control']) }}
     <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first("brand_name") : '' }}</span>
     <br>
     {{ Form::label('brand_descript', 'Brand Description') }}
     {{ Form::textarea('brand_descript','',['class' => 'form-control','id' => 'editor1']) }}
     <span class="text-danger">{{ $errors->has('brand_descript') ? $errors->first("brand_descript") : '' }}</span>
     <br>
     {{ Form::radio('publication_status', '1',true,['id' => 'published']) }}   
     {{ Form::label('published','Published') }}  

     {{ Form::radio('publication_status', '2',true,['id' => 'un-published']) }}
     {{ Form::label('un-published','Un-Published') }}
     <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first("publication_status") : '' }}</span>
     
     <br>
     {{ Form::submit('Save',['class' => 'btn btn-info btn-sm','name' => 'brand_sub']) }}

     {{ Form::close() }}
</div>
@endsection
