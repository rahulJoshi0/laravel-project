<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit city</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h1>Edit City</h1>
    <form action="{{ route('city.update', $city->id) }}" method="POST">
        @csrf
        @method('Put')
        <table>
            {{-- <tr>
                <td>country_id</td>
                <td>
                    <select name="country_id" id="">
                        <option value="">select country</option>
                        @foreach ($countryData as $_countryData )
                        <option value="{{$_countryData->id}}"{{($city->country_id == $_countryData->id)?'selected':''}}>{{$_countryData->name}}</option>
                            
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>state_id</td>
                <td>
                    <select name="state_id" id="">
                    <option value="">select state</option>
                    @foreach ($stateData as $_stateData)
                        <option value="{{ $_stateData->id }}"{{ ($city->state_id == $_stateData->id) ? 'selected' : '' }}>
                            {{ $_stateData->state_name }}</option>
                    @endforeach
                    </select>
                </td>
            </tr> --}}
            <tr>
                <td>country_id</td>
                <td>
                    <select name="country_id" id="country_id">
                        <option value="">select country</option>
                        @foreach ($countryData as $_countryData )
                            
                        <option value="{{$_countryData->id}}"{{($city->country_id == $_countryData->id)?'selected':''}}>{{$_countryData->name}}</option>
                        @endforeach

                    </select>
                </td>
            </tr>
            <tr>
                <td>state_id</td>
                <td>
                <select name="state_id" id="state_id">
                    <option value="">select country</option>
               
                </select>
                </td>
            </tr>
            <tr>
                <td>city</td>
                <td><input type="text" name="city_name" value="{{ $city->city_name }}"></td>
            </tr>
            <tr>
                <td>status</td>
                <td>
                    <select name="city_status" id="">
                        <option value="1"{{ $city->city_status == '1' ? 'selected' : '' }}>enable</option>
                        <option value="2"{{ $city->city_status == '2' ? 'selected' : '' }}>disable</option>
                    </select>
                </td>
            </tr>
            {{-- <table id="tableData">
                <tr>
                    <td>state</td>
                    <th>city name</th>
                    <th>status</th>
                    <th><button type="button" class="add_more">+</button></th>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" name="city"></td>
                    <td><select name="status" id="">
                        <option value="1">enable</option>
                        <option value="2">disable</option>
                    </select></td>
                    <td><button type="button" class="remove">X</button></td>
                </tr>
              </table>
            <tr> --}}
            <td><button type="submit" value="save">update</button></td>
            </tr>
        </table>
    </form>
    <script>
        $(document).ready(function(){
          $('#country_id').change(function(){
          // console.log("country data");
              var ctId = $(this).val();
          // console.log("country data"+ctId);
          $.ajax({
              url: "{{route('counState')}}",
              type: 'GET',
              data: {'couId':ctId},
              success: function(data) {
                  // console.log(data);
                  $('#state_id').html(data);
              },
              error: function(er) {
                  alert(er);
              }
          });
  
          });
        });
      </script>

</body>

</html>
