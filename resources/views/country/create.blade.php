<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create country</title>
</head>
<body>
    <h1>create country</h1>
    <form action="{{route('country.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>country</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>status</td>
               <td> <select name="status" id="">
                    <option value="1">enable</option>
                    <option value="2">disable</option>
                </select></td>
            </tr>
          <table id="tableData">
            <tr>
                <td>state</td>
                <th>state name</th>
                <th>status</th>
                <th><button type="button" class="add_more">+</button></th>
            </tr>
            <tr>
                <td></td>
                <td><input type="text" name="state_name[]"></td>
                <td><select name="state_status[]" id="">
                    <option value="1">enable</option>
                    <option value="2">disable</option>
                </select></td>
                <td><button type="button" class="remove">X</button></td>
            </tr>
          </table>
            <tr>
                <td><button type="save" value="submit">submit</button></td>
            </tr>
        </table>
    </form>
    <script>
        $(document).ready(function(){
            $(".add_more").click(function(){
                tableRow = `<tr>
                <td></td>
                <td><input type="text" name="state_name[]"></td>
                <td><select name="state_status[R]" id="">
                    <option value="1">enable</option>
                    <option value="2">disable</option>
                </select></td>
                <td><button type="button" class="remove">X</button></td>
            </tr>
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