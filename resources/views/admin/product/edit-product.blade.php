@extends("admin.master")
@section("title")
{{ 'Manage Product-infinity.com' }}
@endsection
@section("headline")
{{ "Manage Product" }}
@endsection
@section("body")
@if(Session::get("msg"))
<span class="alert alert-success">{{ Session::get("msg") }}</span>
@endif
@if(Session::get("danger_msg"))
<span class="alert alert-danger">{{ Session::get("danger_msg") }}</span>
@endif
 <style>
   input[type='file']{
    display: none;
  }
   #imgOneUpdate:hover{
    opacity: 0.5;
  }  
   img{
    width: 100%;
    height:auto;
   }
  .img-div{
    width: 100px;
    height: 150px;
    position: relative;
  }
   .change{
    position: absolute;
    font-size: 40px;
    font-weight: bold;
    color: #fff;
    background: #27242436;
    padding: 12px;
    cursor: pointer;
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 48px;
    padding-bottom: 40px;
    bottom: 6px;
    border: 1px solid #999;
   }
 </style>
<div style="width: 700px;margin:0 auto;padding:10px;">

   <table class='table' style="border:0px;">
       <form action="{{ route("/update-product") }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
               <label>
                   <tr>
                       <td>
                           Select Catagory
                       </td>
                       <td>
                           <select name="catagory_id" class="form-control" id="">
                               @foreach($editProduct as $value)
                               <option value="{{ $value->catagory_id }}">{{ $value->cat_name }}</option>
                               @endforeach
                               @foreach($catagory as $value)
                               <option value="{{ $value->id }}">{{ $value->cat_name }}</option>
                               @endforeach
                           </select>
                       </td>
                   </tr>
               </label>
           {{-- </div>           --}}
            {{-- <div class="form-group"> --}}
               <label>
                   <tr>
                       <td>
                           Select Brand
                       </td>
                       <td>
                           <select name="brand_id" class="form-control" id="">
                               @foreach($editProduct as $value)
                               <option value="{{ $value->brand_id }}">{{ $value->brand_name }}</option>
                               @endforeach
                               @foreach($brand as $value)
                               <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                               @endforeach
                           </select>
                       </td>
                   </tr>
               </label>
               @foreach($editProduct as $value)
               <label>
                   <tr>
                       <td>Product Name</td>
                       <td>
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            <input type="text" name="product_name" value="{{ $value->product_name }}" class="form-control">
                       </td>
                   </tr>
               </label>            
                 <label>
                   <tr>
                       <td>Product Price</td>
                       <td>
                            <input type="text" name="product_price"  value="{{ $value->product_price }}" class="form-control">
                       </td>
                   </tr>
               </label>            
                 <label>
                   <tr>
                       <td>Product Quantity</td>
                       <td>
                            <input type="number" min="1" name="product_quantity"  value="{{ $value->product_quantity }}" class="form-control">
                       </td>
                   </tr>
               </label>             
                 <label>
                   <tr>
                       <td>Product Description</td>
                       <td>
                        <textarea name="product_description" id="editor1" cols="50" class="form-control" rows="3">{{ $value->product_description }}</textarea>
                       </td>
                   </tr>
               </label>
               <label>
                   <tr>
                       <td>First Product Images</td>
                       <td>
                        <div class="img-div">
                        <label>
                           <input type="file" name="product_img" class="form-control" accept="image/*" onchange="loadFileOneUpdate(event)">
                            <img id="ImgOneOutputUpdate" onmouseover="eventImgOneIn()"/>
                            <img src="{{ asset($value->img) }}" id="imgOneUpdate" onmouseover="eventImgOneIn()" alt="">
                            <span onmouseout="imgOneOut()" id="changeOne" class="change glyphicon glyphicon-camera"></span>
                        </label>
                      </div>
                       </td>
                   </tr>
               </label>  
               
                <label>
                    <tr>
                       <td>Second Product Images</td>
                       <td>
                        <div class="img-div">
                        <label>
                           <input type="file" name="second_img" class="form-control" accept="image/*" onchange="loadFiletwoUpdate(event)">
                           <img id="ImgTwoOutputUpdate" onmouseover='eventImgTwoIn()' width="100px""/>
                           <img src="{{ asset($value->secondImg) }}" id="imgTwoUpdate" onmouseover='eventImgTwoIn()' width='100px' alt="">
                           <span onmouseout="imgTwoOut()" id="changeTwo" class="change glyphicon glyphicon-camera"></span>
                         </label>
                         </div>
                       </td>
                   </tr>
               </label>
               <label>
                   <tr>
                       <td>Publication Status</td>
                       <td>
                           <label><input type="radio" {{ $value->publication_status == 1 ? 'checked' : '' }} value="1" name="publication_status"> Published</label>
                           <label><input type="radio" value="2" {{ $value->publication_status == 2 ? 'checked' : '' }} name="publication_status"> Un-published</label>
                       </td>
                   </tr>
               </label>
               <label>
                   <tr>
                       <td></td>
                       <td>
                          <input type="submit" name="submit" value="Change" class="btn btn-info">
                          <img id="ImgOneOutputUpdate" width="100px""/>
                       </td>
                   </tr>
               </label>
            @endforeach
       </form>
   </table>
</div>
<script>
  document.getElementById("ImgOneOutputUpdate").style.display = "none"; 
  var loadFileOneUpdate = function(event) {
  var ImgOneOutputUpdate = document.getElementById('ImgOneOutputUpdate');
  ImgOneOutputUpdate.src = URL.createObjectURL(event.target.files[0]);
  document.getElementById("ImgOneOutputUpdate").style.display = "block"; 
  document.getElementById("imgOneUpdate").style.display = "none";
};

document.getElementById("ImgTwoOutputUpdate").style.display = "none"; 
  var loadFiletwoUpdate = function(event) {
  var ImgTwoOutputUpdate = document.getElementById('ImgTwoOutputUpdate');
  ImgTwoOutputUpdate.src = URL.createObjectURL(event.target.files[0]);
  document.getElementById("ImgTwoOutputUpdate").style.display = "block"; 
  document.getElementById("imgTwoUpdate").style.display = "none";
};

document.getElementById("changeOne").style.display = "none";
function eventImgOneIn(){
  document.getElementById("changeOne").style.display = "block";
}
function imgOneOut(){
  document.getElementById("changeOne").style.display = "none";
}


document.getElementById("changeTwo").style.display = "none";
function eventImgTwoIn(){
  document.getElementById("changeTwo").style.display = "block";
}

function imgTwoOut(){
  document.getElementById("changeTwo").style.display = "none";
}

</script>
@endsection
