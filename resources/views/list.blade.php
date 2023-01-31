<h1>Members List from database</h1>
@include('cdn')
<div>
<table class="table table-bordered">
 <tr>
    <th>#</th>
    <th>Name</th>
    <th>email</th>
    <th>address</th>
    <th>ID</th>
    <th>Action</th>
 </tr>

 @foreach($members as $item)
     <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item['address']}}</td>
      <td>{{$item->id}}</td>
      <td>
        <a href={{"delete/".$item['id']}}><button class="fa fa-trash-o btn btn-outline-danger btn-sm"></button></a>
    
        <a href={{"edit/".$item['id']}}><button class="fa fa-edit btn btn-outline-warning btn-sm"></button></a>
      </td>
</tr>

 @endforeach
</table>
</div>

<div>
    {{$members->links()}}
</div>

<style>
     .w-5{
        display:none;
        
     }
</style>