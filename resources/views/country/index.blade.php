<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>country list</title>
</head>
<body>
    <h1>country list</h1>
    <a href="{{route('country.create')}}">+country</a>
    <table border="1" cellspacing="0">
        <tr>
            <th>sr.no</th>
            <th>country name</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        @php
            $i=1;
        @endphp
        @foreach($countries as $_country)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$_country->name}}</td>
            <td>{{($_country->status=="1")?"enable":"disable"}}</td>
            <td><a href="{{route('country.edit',$_country->id)}}">Edit</a>
            <form action="{{route('country.destroy',$_country->id)}}" method="POST">

                @csrf
                @method('DELETE')
                {{-- <input type="submit" name="delete" value="delete"> --}}
                {{-- <button type="submit" name="delete">dlt</button> --}}
                <button type="delete" name="delete">dlt</button>

            </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>