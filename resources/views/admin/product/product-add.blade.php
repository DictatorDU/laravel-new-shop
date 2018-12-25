@extends("admin.master")
@section("title")
{{ 'New Product-infinity.com' }}
@endsection
@section("headline")
{{ "New Product" }}
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
   #imgOneUpload:hover{
    opacity: 0.5;
  }  
   img{
    width: 100%;
    height:100%;
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
       <form action="{{ route('/new_product') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
               <label>
                   <tr>
                       <td>
                           Select Catagory
                       </td>
                       <td>
                           <select name="catagory_id" class="form-control" id="">
                               <option value="">--Select Catagory--</option>
                               @foreach($catagories as $value)
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
                               <option value="">--Select Brand--</option>
                               @foreach($brands as $value)
                               <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                               @endforeach
                           </select>
                       </td>
                   </tr>
               </label>

               <label>
                   <tr>
                       <td>Product Name</td>
                       <td>
                            <input type="text" name="product_name" class="form-control">
                       </td>
                   </tr>
               </label>            
                 <label>
                   <tr>
                       <td>Product Price</td>
                       <td>
                            <input type="text" name="product_price" class="form-control">
                       </td>
                   </tr>
               </label>            
                 <label>
                   <tr>
                       <td>Product Quantity</td>
                       <td>
                            <input type="text" name="product_quantity" class="form-control">
                       </td>
                   </tr>
               </label>             
                 <label>
                   <tr>
                       <td>Product Description</td>
                       <td>
                        <textarea name="product_description" id="editor1" cols="50" class="form-control" rows="3"></textarea>
                       </td>
                   </tr>
               </label>

               <label>
                   <tr>
                       <td>First Product Images</td>
                       <td>
                       <div class="img-div">
                        <label>
                           <input type="file" name="product_img" class="form-control" accept="image/*" onchange="loadFileOneUpload(event)">
                           <img id="ImgOneOutputUpload" onmouseover="eventImgOneIn()"/>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Circle-icons-dolly.svg/2000px-Circle-icons-dolly.svg.png" id="imgOneUpload" onmouseover="eventImgOneIn()" alt="">
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
                           <input type="file" name="second_img" class="form-control" accept="image/*" onchange="loadFiletwoUpload(event)">
                           <img id="ImgTwoOutputUpload" onmouseover='eventImgTwoIn()' width="100px""/>
                           <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Circle-icons-dolly.svg/2000px-Circle-icons-dolly.svg.png" id="imgTwoUpload" onmouseover='eventImgTwoIn()' width='100px' alt="">
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
                           <label><input type="radio" value="1" name="publication_status"> Published</label>
                           <label><input type="radio" value="2" name="publication_status"> Un-published</label>
                       </td>
                   </tr>
               </label>
               <label>
                   <tr>
                       <td></td>
                       <td>
                           <input type="submit" name="submit" value="Save" class="btn btn-info">
                       </td>
                   </tr>
               </label>

       </form>
   </table>
</div>
<script>
  document.getElementById("ImgOneOutputUpload").style.display = "none"; 
  var loadFileOneUpload = function(event) {
  var ImgOneOutputUpload = document.getElementById('ImgOneOutputUpload');
  ImgOneOutputUpload.src = URL.createObjectURL(event.target.files[0]);
  document.getElementById("ImgOneOutputUpload").style.display = "block"; 
  document.getElementById("imgOneUpload").style.display = "none";
};

document.getElementById("changeOne").style.display = "none";
function eventImgOneIn(){
  document.getElementById("changeOne").style.display = "block";
}
function imgOneOut(){
  document.getElementById("changeOne").style.display = "none";
}


document.getElementById("ImgTwoOutputUpload").style.display = "none"; 
  var loadFiletwoUpload = function(event) {
  var ImgTwoOutputUpload = document.getElementById('ImgTwoOutputUpload');
  ImgTwoOutputUpload.src = URL.createObjectURL(event.target.files[0]);
  document.getElementById("ImgTwoOutputUpload").style.display = "block"; 
  document.getElementById("imgTwoUpload").style.display = "none";
};

document.getElementById("changeTwo").style.display = "none";
function eventImgTwoIn(){
  document.getElementById("changeTwo").style.display = "block";
}

function imgTwoOut(){
  document.getElementById("changeTwo").style.display = "none";
}

</script>
@endsection
