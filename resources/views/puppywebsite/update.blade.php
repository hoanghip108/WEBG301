@extends('PuppyWebsiteMaster.PuppyMaster')
@section('main')
    <form action="{{route('puppy.store')}}" method="post">
        @csrf
@foreach($pets as $pet)
        <div class="form-group">
            <label for="simpleinput">Name</label>
            <input type="text" id="simpleinput" class="form-control" name="name" value="{{$pet->name}}">
        </div>
        <div class="form-group">
            <label for="simpleinput">Area</label>
            <input type="text" id="simpleinput" class="form-control" name="area" value="{{$pet->area}}">
        </div>
        <div class="form-group">
            <label for="example-select">Breed</label>
            <select class="form-control" id="example-select" name="Breed">
                @foreach($breed as $each)
                    <option value=" {{ $each->id}}">{{$each->bread}}</option>
                @endforeach
            </select>
            <div>
                {{--                {{dd($breed)}}--}}
            </div>
        </div>
        <div class="form-group">
            <label for="example-select">Gender</label>
            <select name="gender" id="example-select" class="form-control" name="gender">
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="simpleinput">image</label>
            <input type="text" id="simpleinput" class="form-control" name="image" value="{{$pet->image}}">
        </div>
        <div class="form-group">
            <label for="simpleinput">Color</label>
            <input type="text" id="simpleinput" class="form-control" name="color" value="{{$pet->color}}">
        </div>
        <div class="form-group">
            <label for="simpleinput">Detail</label>
            <input type="text" id="simpleinput" class="form-control" name="detail" value="{{$pet->Detail}}">
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
