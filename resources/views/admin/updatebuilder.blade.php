<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">"
    @include("admin.admincss")
  </head>
  <body>
    
  <div class="container-scroller">
    @include("admin.navbar")

    <form action="{{url('/updatepcbuilder',$data->id)}}" method="Post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Chef's Name</label>
            <input style="color:blue;" type="text" name="name" value="{{$data->name}}">
        </div>
        <div>
            <label>Specialty</label>
            <input style="color:blue;" type="text" name="specialty" value="{{$data->specialty}}">
        </div>
        <div>
            <label>Old Image</label>
            <img height="150px" width="150px" src="/builderimage/{{$data->image}}">
        </div>
            <label>New Image</label>
            <input style="color:grey;" type="file" name="image" required>
        <div>
            <input style="color:white" type="submit" value="Save">
        </div>
    </form>

    </div>
    @include("admin.adminjscript")
   
  </body>
</html>