<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>city list</title>
</head>
<body>
    <h1>city list</h1>
    <a href="{{route('city.create')}}">AddCreate</a>
    {{session()->get('success')}}
    <table border="1" cellspacing="0">
        <tr>
            <th>sr.no,</th>
            <th>country-id</th>
            <th>state-id</th>
            <th>city</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        @php
            $i=1;
        @endphp
        @foreach ($city as $_city)
        <tr>
            <td>{{$i++}}</td>
            <td> {{$_city->country->name}}</td>
            <td> {{$_city->state->state_name}}</td>
            <td> {{$_city->city_name}}</td>
            <td> {{($_city->city_status=="1")?"enable":"disable"}}</td>
            <td>
                <a href="{{route('city.edit',$_city->id)}}">Edit</a>
                <form action="{{route('city.destroy',$_city->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" name="delete">DLT</button>
                </form>
            </td>
        </tr>
            
        @endforeach
    </table>
</body>
</html>