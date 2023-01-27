

<h1>User blade template</h1>

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



 @include('inner')


