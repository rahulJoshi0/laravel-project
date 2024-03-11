<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StudentIndex</title>
    <style>
        form{
            background-color: #98AFC7;    
        }
        .error{
            color:darkred;
        }
    </style>
</head> 

<body>
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" value="{{old('first_name')}}">
                @error('first_name')
                    <span class="error">{{$message}}</span>        
                @enderror
                </td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" value="{{old('last_name')}}">
                @error('last_name')
                <span class="error">{{$message}}</span>
                    
                @enderror</td>
            </tr>
            <tr>
                <td>Email Id:</td>
                <td><input type="taxt" name="email_id" value="{{old('email_id')}}">
                @error('email_id')
                    <span class="error">{{$message}}</span>
                @enderror</td>
            </tr>
            <tr>
                <td>Dob</td>
                <td><input type="date" name="dob" value="{{old('dob')}}">
                    @error('dob')
                    <span class="error">{{$message}}</span>                    
                @enderror</td>
            </tr>
            <tr>
                <td>mobile:</td>
                <td><input type="tel" name="mobile" value="{{old('mobile')}}">
                @error('mobile')
                    <span class="error">{{$message}}</span>
                @enderror</td>
            </tr>
            <tr>
                <td>gender:</td>
                <td><input type="radio" name="gender" value="m"{{(old('gender')=="m")?"checked":""}}>male
                    <input type="radio" name="gender" value="f"{{(old('gender')=="f")?"checked":""}}>female
                @error('gender')
                    <span class="error">{{$message}}</span>                    
                @enderror
                
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>
                    <textarea name="address" id="" cols="25" rows="5" >{{old('address')}}</textarea>
                    @error('address')
                    <span class="error">{{$message}}</span>                    
                @enderror
                </td>
            </tr>
            <tr>
                <td>city:</td>
                <td><input type="text" name="city" value="{{old('city')}}">
                @error('gender')
                    <span class="error">{{$message}}</span>                    
                @enderror</td>
            </tr>
            <tr>
                <td>PinCode:</td>
                <td><input type="number" name="pin_code" value="{{old('pin_code')}}">
                @error('pin_code')
                    <span class="error">{{$message}}</span>                    
                @enderror</td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="state" value="{{old('state')}}">
                @error('state')
                    <span class="error">{{$message}}</span>                    
                @enderror</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input type="text" name="country" value="{{old('country')}}">
                @error('country')
                    <span class="error">{{$message}}</span>                    
                @enderror</td>
            </tr>
            <tr>
                <td>Hobbies:</td>
                @php
                    $hobbies = old('hobbies')??[];
                @endphp
                <td><input type="checkbox" name="hobbies[]" id="" value="drawing"{{in_array("drawing",old('hobbies')??[])?"checked":""}}>Drawing
                    <input type="checkbox" name="hobbies[]" id="" value="singing"{{in_array("singing",$hobbies)?"checked":""}}>Singing
                    <input type="checkbox" name="hobbies[]" id="" value="dancing"{{in_array("dancing",$hobbies)?"checked":""}}>Dancing
                    <input type="checkbox" name="hobbies[]" id="" value="sketching"{{in_array("sketching",$hobbies)?"checked":""}}>Sketching
                    <input type="checkbox" name="hobbies[]" id="" value="other_hobbies"{{in_array("other_hobbies",$hobbies)?"checked":""}}>other
                    <input type="text" name="other_hobbies">
                    @error('hobbies')
                        <span class="error">{{$message}}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>qualification:</td>
                <td>
                    <table>
                        <tr>
                            <td></td>
                            <td>Sl.No</td>
                            <td>Examination</td>
                            <td>Board</td>
                            <td>Percentage</td>
                            <td>Passing Of Year</td>
                        </tr>
                        <tr>

                            <td></td>
                            <td>1</td>
                            <td><input type="text" name="examination[]" value="class-X" readonly></td>
                            <td><input type="text" name="board[]" value="{{old('board.0')}}"></td>
                            <td><input type="number" name="percentage[]" value="{{old('percentage.0')}}" size="6"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{old('passing_of_year.0')}}"></td>
                        </tr>
                        <tr>

                            <td></td>
                            <td>2</td>
                            <td><input type="text" name="examination[]" value="class-XII" readonly></td>
                            <td><input type="text" name="board[]" value="{{old('board.1')}}"></td>
                            <td><input type="number" name="percentage[]" value="{{old('percentage.1')}}"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{old('passing_of_year.1')}}"></td>
                        </tr>
                        <tr>

                            <td></td>
                            <td>3</td>
                            <td><input type="text" name="examination[]" value="gradution" readonly></td>
                            <td><input type="text" name="board[]" value="{{old('board.2')}}"></td>
                            <td><input type="number" name="percentage[]" value="{{old('percentage.2')}}"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{old('passing_of_year.2')}}"></td>
                        </tr>
                        <tr>

                            <td></td>
                            <td>4</td>
                            <td><input type="text" name="examination[]" value="masters" readonly></td>
                            <td><input type="text" name="board[]" value="{{old('board.3')}}"></td>
                            <td><input type="number" name="percentage[]" value="{{old('percentage.3')}}"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{old('passing_of_year.3')}}"></td>
                        </tr>
                        
                    </table>
                </td>
            </tr>

            <tr>
                <td>Coureses
                    Applied:
                </td>
                <td><input type="radio" name="courses" value="bca"{{(old('courses')=="bca")?"checked":""}}>Bca
                    <input type="radio" name="courses" value="b.com"{{(old('courses')=="b.com")?"checked":""}}>B.com
                    <input type="radio" name="courses" value="b.sc"{{(old('courses')=="b.sc")?"checked":""}}>B.sc
                    <input type="radio" name="courses" value="b.a"{{(old('courses')=="b.a")?"checked":""}}>B.a
                    @error('courses')
                    <span class="error">{{$message}}</span>                    
                @enderror
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="reset" value="Reset">
                    <input type="submit" value="Submit">
                </td>
            </tr>

        </table>
    </form>

</body>

</html>
