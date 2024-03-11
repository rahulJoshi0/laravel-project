<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit country</title>
</head>
<body>
    <h1>edit country</h1>
    {{-- {{$country->id}} --}}
    <form action="{{route('country.update',$countryData->id)}}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <td>country</td>
                <td><input type="text" name="name" value="{{$countryData->name}}"></td>
            </tr>
            <tr>
                <td>status</td>
               <td> <select name="status" id="">
                    <option value="1"{{($countryData ->status=="1")?"selected":""}}>enable</option>
                    <option value="2"{{($countryData ->status=="2")?"selected":""}}>disable</option>
                </select></td>
            </tr>
          <table id="tableData">
            <tr>
                <td>state</td>
                <th>state name</th>
                <th>status</th>
                <th><button type="button" class="add_more">+</button></th>
            </tr>
            @foreach($countryData->states as $_state)
            <tr>
                <input type="hidden" name="sid[]" value="{{$_state->id}}">
                <td></td>
                <td><input type="text" name="state_name[]" value="{{$_state->state_name}}"></td>
                <td><select name="state_status[]" id="">
                    <option value="1"{{($_state->state_status==1)?"selected":""}}>enable</option>
                    <option value="2"{{($_state->state_status==2)?"selected":""}}>disable</option>
                </select></td>
                <td><button type="button" class="remove">X</button></td>
            </tr>
            @endforeach
          </table>
            <tr>
                <td><button type="save" value="submit">Update</button></td>
            </tr>
        </table>
    </form>
    <script>
    $(document).ready(function(){
        $(".add_more").click(function(){
            tableRow = `<tr>
            <td></td>
            <td><input type="text" name="state_name[]"></td>
            <td><select name="state_status[]" id="">
                <option value="1">enable</option>
                <option value="2">disable</option>
            </select></td>
            <td><button type="button" class="remove">X</button></td>
                </tr>`;
                $("#tableData").append(tableRow);
        });
        $("#tableData").delegate(".remove","click",function(){
            $(this).closest("tr").remove();
        });
    });
</script>

</body>
</html>