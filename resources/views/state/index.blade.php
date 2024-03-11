<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>state list</title>
</head>
<body>
    <h1>state list</h1>
    <a href="{{route('state.create')}}">+state</a>
    {{session()->get('success')}}
    <table border="1" cellspacing="0">
        <tr>
            <th>sr.no</th>
            <th>country_id</th>
            <th>state</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        @php
            $i=1;
        @endphp
        @foreach ($stats as $_state )
        <tr>
            <td>{{$i++}}</td>
            <td>{{$_state->country->name}}</td>
            <td>{{$_state->state_name}}</td>
            <td>{{($_state->state_status=="1")?"enable":"disable"}}</td>
            <td>
                <a href="{{route('state.edit',$_state->id)}}">edit</a>
                <form action="{{route('state.destroy',$_state->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="delete" value="delete">
                </form>    
            </td>    
        </tr>            
        @endforeach
    </table>
</body>
</html>