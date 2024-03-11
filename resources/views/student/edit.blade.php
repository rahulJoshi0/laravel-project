<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Edit</title>
    <style>
        form{
            background-color: #98AFC7;
        }
    </style>
</head>

<body>
    <h3>edit list</h3>
    <form action="{{ route('student.update',$student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" id="firstname" value="{{ $student->first_name }}">
                @error('first_name')
                    {{$message}}
                @enderror</td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" value="{{ $student->last_name }}"></td>
            </tr>
            <tr>
                <td>Email Id:</td>
                <td><input type="email" name="email_id" value="{{ $student->email_id }}"></td>
            </tr>
            <tr>
                <td>Dob</td>
                <td><input type="date" name="dob" value="{{ $student->dob }}"></td>
            </tr>
            <tr>
                <td>mobile:</td>
                <td><input type="tel" name="mobile" value="{{ $student->mobile }}"></td>
            </tr>
            <tr>
                <td>gender:</td>
                <td><input type="radio" name="gender" value="m"{{ ($student->gender=='m')?'checked':''}}>male
                    <input type="radio" name="gender" value="f"{{ ($student->gender=='f')?'checked':''}}>female
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>
                    <textarea name="address" id="" cols="25" rows="5" >{{ $student->address }}</textarea>
                </td>
            </tr>
            <tr>
                <td>city:</td>
                <td><input type="text" name="city" value="{{ $student->city }}"></td>
            </tr>
            <tr>
                <td>PinCode:</td>
                <td><input type="digit" name="pin_code" value="{{ $student->pin_code }}"></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="state" value="{{ $student->state }}"></td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input type="text" name="country" value="{{ $student->country }}"></td>
            </tr>
            <tr>
                <td>Hobbies:</td>
                <?php
                    $_explodeHobb = explode(',', $student->hobbies);
                ?>
                <td><input type="checkbox" name="hobbies[]" id="" value="drawing"{{ in_array('drawing',$_explodeHobb)?'checked':''}}>Drawing
                    <input type="checkbox" name="hobbies[]" id="" value="singing"{{ in_array('singing',$_explodeHobb)?'checked':''}}>Singing
                    <input type="checkbox" name="hobbies[]" id="" value="dancing"{{ in_array('dancing',$_explodeHobb)?'checked':''}}>Dancing
                    <input type="checkbox" name="hobbies[]" id="" value="sketching"{{ in_array('sketching',$_explodeHobb)?'checked':''}}>Sketching
                    <input type="checkbox" name="hobbies[]" id="" value="other_hobbies"{{ in_array('other_hobbies',$_explodeHobb)?'checked':''}}>other
                    {{-- <input type="text" name="other_hobbies"> --}}
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
                        @foreach ($student->stuQualifications as $_stul )
                            
                        
                        <tr>

                            {{-- <td></td> --}}
                            <td><input type="hidden" name="stuId[]" value="{{$_stul->id}}"></td>
                            <td>1</td>
                            <td><input type="text" name="examination[]" value="{{$_stul->examination}}" readonly></td>
                            <td><input type="text" name="board[]" value="{{$_stul->board}}"></td>
                            <td><input type="number" name="percentage[]" value="{{$_stul->percentage}}" size="6"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{$_stul->passing_of_year}}"></td>
                        </tr>
                        @endforeach
                        {{-- <tr>

                            <td></td>
                            <td>2</td>
                            <td><input type="text" name="examination[]" value="class-XII" readonly></td>
                            <td><input type="text" name="board[]" value="{{old('board[]')}}"></td>
                            <td><input type="number" name="percentage[]" value="{{old('percentage[]')}}"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{old('passing_of_year[]')}}"></td>
                        </tr>
                        <tr>

                            <td></td>
                            <td>3</td>
                            <td><input type="text" name="examination[]" value="gradution" readonly></td>
                            <td><input type="text" name="board[]" value="{{old('board[]')}}"></td>
                            <td><input type="number" name="percentage[]" value="{{old('percentage[]')}}"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{old('passing_of_year[]')}}"></td>
                        </tr>
                        <tr>

                            <td></td>
                            <td>4</td>
                            <td><input type="text" name="examination[]" value="masters" readonly></td>
                            <td><input type="text" name="board[]" value="{{old('board[]')}}"></td>
                            <td><input type="number" name="percentage[]" value="{{old('percentage[]')}}"></td>
                            <td><input type="text" name="passing_of_year[]" value="{{old('passing_of_year[]')}}"></td>
                        </tr> --}}
                        
                    </table>
                </td>
            </tr>

            <tr>
                <td>Coureses
                    Applied:
                </td>
                <td><input type="radio" name="courses" value="bca"{{ ($student->courses=='bca')?'checked':''}}>Bca
                    <input type="radio" name="courses" value="b.com"{{ ($student->courses=='b.com')?'checked':''}}>B.com
                    <input type="radio" name="courses" value="b.sc"{{ ($student->courses=='b.sc')?'checked':''}}>B.sc
                    <input type="radio" name="courses" value="b.a"{{ ($student->courses=='b.a')?'checked':''}}>B.a
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
