 $(document).ready( function () {
        $('#myTable').DataTable();
        CKEDITOR.replace( 'editor1' );
        $("#msg").fadein();
 });

$(document).on("click","#deleteCon",function(e){
  e.preventDefault();
  var link = $(this).attr('href');
  bootbox.confirm('Are you sure to delete Data ??',function(confirmed){
	if(confirmed){
		window.location.href = link;
	}
  });
});
