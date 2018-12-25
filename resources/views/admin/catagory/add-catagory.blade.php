@extends("admin.master")
@section("title")
{{ 'New Catagory-infinity.com' }}
@endsection
@section("headline")
{{ "New Catagory Add" }}
@endsection
@section("body")
<div class="form-group border">
	<h3 class="text-success">{{ Session::get("msg") }}</h3>
    <form action="{{ route('/add_cat') }}" method="post">
    	{{ csrf_field() }}
    	<label>Catagory Name <input type="text" name="cat_name" class="form-control"></label><br><br>
    	<label>Catalogy Description <textarea name="cat_descript" id="editor1" cols="22" rows="" class="form-control"></textarea></label>
    	<br><br>
    	<label>
    		<p>Publication Stutus </p>
    		<label><input type="radio" value="1" checked name="publication_status"> Published</label>
    		<label><input type="radio" value="2" name="publication_status"> Un-published</label>
    	</label>
    	<br>
    	<input type="submit" name="cat_add" value="Save" class="btn btn-primary">
    </form>
</div>
@endsection
