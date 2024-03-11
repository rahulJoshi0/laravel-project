<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>state edit</title>
</head>
<body>
    <h1>edit State</h1>
    <form action="{{route('state.update',$state->id)}}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>country_id</td>
                <td>
                    <select name="country_id" id="">
                        <option value="">select country</option>
                        @foreach ($countryData as $_countryData )
                            <option value="{{$_countryData->id}}" {{($state->country_id==$_countryData->id) ? 'selected':''}}>{{$_countryData->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>state</td>
                <td><input type="text" name="state_name" value="{{$state->state_name}}"></td>
            </tr>
            <tr>   
                <td>status</td>
                <td>
                    <select name="state_status" id="">
                        <option value="1"{{($state->state_status=="1")?"selected":""}}>enable</option>
                        <option value="2"{{($state->state_status=="2")?"selected":""}}>disable</option>
                    </select>
                </td>
            </tr>
            <table id="tableData">
                <tr>
                    <td>city</td>
                    <th>city name</th>
                    <th>status</th>
                    <th><button type="button" class="add_more">+</button></th>
                </tr>
                @foreach ($state->cityes as $_city)
                    
                <tr>
                    <input type="hidden" name="Cid[]" value="{{$_city->id}}">
                    <td></td>
                    <td><input type="text" name="city_name[]" value="{{$_city->city_name}}"></td>
                    <td><select name="city_status[]" id="">
                        <option value="1"{{($_city->city_status=="1")?"selected":""}}>enable</option>
                        <option value="2"{{($_city->city_status=="2")?"selected":""}}>disable</option>
                    </select></td>
                    <td><button type="button" class="remove">X</button></td>
                </tr>
                @endforeach
              </table>

            <tr>
                <td><button type="submit" value="save">submit</button></td>
            </tr>
            
        </table>
    </form>
    <script>
        $("document").ready(function(){
            $(".add_more").click(function(){
                tableRow = `<tr>
                <td></td>
                <td><input type="text" name="city_name[]"></td>
                <td><select name="city_status[]" id="">
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