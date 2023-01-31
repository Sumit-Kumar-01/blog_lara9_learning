<h1></h1>
<table>
 @foreach($data as $i)
     <tr>
        <td>{{$i->id}}</td>
        <td>{{$i->name}}</td>
        <td>{{$i->email}}</td>
        <td>{{$i->address}}</td>
     </tr>
 @endforeach
</table>