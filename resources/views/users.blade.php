

{{-- <h1>User blade template</h1>

{{20+30}}

{{$name}}

@if($name=='sumit')
<h1>The Name is currect</h1>
@else
<h1>Nmae is incurrect</h1>
@endif


@for($i=0;$i<5;$i++)
 <h1>{{$i}}</h1>
 @endfor



 @include('inner') --}}


<h1>WElcome To our website user list is here and Login</h1>

{{-- <form action="users" method="post">
 @csrf
   <input type="text" name="username" placeholder="enter user id">
   <br><br>
   <input type="password" name="passord" placeholder="enter your password">
   <br><br>
   <button type="submit">Login</button>
</form> --}}

{{-- <table border="1">
    <tr>

      <td>ID</td>
      <td>Name</td>
      <td>Email</td>
      <td>Profile Photo</td>
    </tr>

    @foreach($collection as $item)
    <tr>

      <td>{{$item['id']}}</td>
      <td>{{$item['first_name']}}</td>
      <td>{{$item['email']}}</td>
      <td><img src={{$item['avatar']}} alt=""></td>
    </tr>

    @endforeach

</table> --}}

<form action="users" method="post">
  @csrf
  {{@method_field('PUT')}}
  <input type="text" name="user" placeholder="Enter name"/><br><br>
  <input type="password" name="password" placeholder="Enter password"/><br><br>
  <button type="submit">Login</button>
</form>












