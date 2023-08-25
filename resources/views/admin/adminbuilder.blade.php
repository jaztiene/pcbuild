<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    
  <div class="container-scroller">
    @include("admin.navbar")
   
    <form action="{{url('/uploadbuilder')}}" method="Post" enctype="multipart/form-data">

        @csrf
        <div>
            <label>Name</label>
            <input style="color: blue" type="text" name="name" required="" placeholder="Enter name">
        </div>
        <div>
            <label>Specialty</label>
            <input style="color: blue" type="text" name="specialty" required="" placeholder="Enter specialty">
        </div>
        <div>
            <input type="file" name="image" required="">
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>
        <table bgcolor="black">
            <tr>
                <th style="padding:30px;">Chef's Name</th>
                <th style="padding:30px;">Specialty</th>
                <th style="padding:30px;">Image</th>
                <th style="padding:30px;">Action</th>
                <th style="padding:30px;">Action2</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->specialty}}</td>
                <td><img height="350" width="350" src="/builderimage/{{$data->image}}"></td>
                <td><a href="{{url('/updatebuilder', $data->id)}}">Update</a></td>
                <td><a href="{{url('/deletebuilder', $data->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    
    @include("admin.adminjscript")
   
  </body>
</html>