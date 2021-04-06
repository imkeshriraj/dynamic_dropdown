@extends('layout')


@section('content')

<h1 class="text-center text-success">Dynamic Dropdown</h1>

<div class="container">

    <form method="POST" action="save">
        @csrf
        <div class="forn-group mb-5">
            <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="state">
                <option value="">Select Country</option>
                @foreach($country_list as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>





        <div class="forn-group mb-5">
            <select name="state" id="state" class="form-control input-lg dynamic">
                <option value="">select State</option>
            </select>

        </div>



        <div class="forn-group mb-5">
            <select name="city" id="city" class="form-control input-lg">
                <option value="">select city</option>
            </select>
        </div>

        <p>Please select your gender:</p>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>

     <p>Please select your Hobby:</p>
        <br>
        <input type="checkbox" id="hobby1" name="hobby[]" value="Photography">
        <label for="vehicle1">Photography</label><br>
        <input type="checkbox" id="hobby2" name="hobby[]" value="Cricket">
        <label for="vehicle2">Cricket</label><br>
        <input type="checkbox" id="hobby3" name="hobby[]" value="Designing">
        <label for="vehicle3">Designing</label>


        
        <button type="submit" class="btn btn-outline-success" style="width:100%;">Show Data</button>
    </form>

</div>


@endsection