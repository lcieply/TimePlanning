<form action="{{route('newEvent.store')}}" method="post">
    <label for="name">Title</label>
    <input type="text" name="title" value="{{ old('title') }}">
    <br>
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    <br>
    <label for="name">Start date</label>
    <input type="date" name="start_date" value="{{ old('start_date') }}">
    <br>
    <label for="name">Start time</label>
    <input type="time" name="start_time" value="{{ old('start_time') }}">
    <br>
    <label for="name">End date</label>
    <input type="date" name="end_date" value="{{ old('end_date') }}">
    <br>
    <label for="name">End time</label>
    <input type="time" name="end_time" value="{{ old('end_time') }}">
    <br>
    <input type="text" name="start" value="" hidden>
    <input type="text" name="end" value="" hidden>
    <input type="submit" value="Create">
    {{csrf_field()}}
</form>

<div>
    @foreach ($errors->all() as $message)
        <p class="alert alert-warning">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message }}
        </p>
    @endforeach
</div>