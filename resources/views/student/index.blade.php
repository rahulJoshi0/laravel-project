<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student
        
    </title>
</head>
<body>
      <h1>student List</h1>
      <a href="{{ route('student.create')}}">+ Add Student</a>
      {{ session()->get('success')}}
      <table border="1" cellspacing="0">
        <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>dob</th>
            <th>email_id</th>
            <th>mobile</th>
            <th>gender</th>
            <th>address</th>
            <th>city</th>
            <th>pin_code</th>
            <th>state</th>
            <th>country</th>
            <th>hobbies</th>
            <th>courses</th>
        </tr>

        @foreach($students as $_student)
        
        <tr>
            <td>{{ $_student->first_name }}</td>
            <td>{{ $_student->last_name }}</td>
            <td>{{ $_student->dob }}</td>
            <td>{{ $_student->email_id }}</td>
            <td>{{ $_student->mobile }}</td>                                                                
            <td>{{($_student->gender=='m')?'male':'female'}}</td>
            <td>{{ $_student->address }}</td>
            <td>{{ $_student->city }}</td>
            <td>{{ $_student->pin_code }}</td>
            <td>{{ $_student->state }}</td>
            <td>{{ $_student->country }}</td>
            <td>{{ $_student->hobbies }}</td>
            <td>{{ $_student->courses }}</td>
            <td>
                <a href="{{route('student.edit',$_student->id)}}">Edit</a>
                <form action="{{route('student.destroy',$_student->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="delete" value="DELETE">
                </form>
            </td>
        </tr>
        @endforeach
      </table> 
      {{$students->links() }} 
</body>
</html>