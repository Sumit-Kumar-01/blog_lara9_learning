<h1>update member</h1>
<form action="/edit" method="post">
@csrf
<input type="hidden" name="id"  value={{$data->id}}>
 <input type="text" name="name" value="{{$data->name}}"> <br><br>
 <input type="text" name="address" value="{{$data->address}}"> <br><br>
 <input type="text" name="email" value="{{$data->email}}"> <br><br>
 <button type="submit">Update</button>
</form>