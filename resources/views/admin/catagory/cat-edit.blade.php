@extends("admin.master")
@section("title")
{{ 'Edit Catagory-infinity.com' }}
@endsection
@section("headline")
{{ "Catagory Change" }}
@endsection
@section("body")
<div class="form-group border">
	<h3 class="text-success">{{ Session::get("msg") }}</h3>
    <form action="{{ route('/edit_cat_tab') }}" method="post">
    	{{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $editable_cat->id }}">
    	<label>Catagory Name <input type="text" name="cat_name" 
            value='{{ $editable_cat->cat_name }}' 
            class="form-control"></label><br><br>
    	<label>Catalogy Description <textarea name="cat_descript" id="" cols="22" rows="" class="form-control">{{ $editable_cat->cat_descript }}</textarea></label>
    	<br><br>
    	<label>
    		<p>Publication Stutus </p>
    		<label><input type="radio" value="1" {{ $editable_cat->publication_status == 1 ? 'checked' : '' }} name="publication_status"> Published</label>
    		<label><input type="radio" value="2"  {{ $editable_cat->publication_status == 2 ? 'checked' : '' }} name="publication_status"> Un-published</label>
    	</label>
    	<br>
    	<input type="submit" name="cat_add" value="Save" class="btn btn-primary">
    </form>
</div>
@endsection
