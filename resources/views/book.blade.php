<form action="/book" method="POST">
@csrf
<a href="#">Close</a>
@if (isset($message) || isset($error_system))
    <span class = "help-block">{{ isset($message) ? $message : $error_system}}</span><br>
@endif
<h3>Master Maintenance Book</h3>
    <input name="search" type="submit" value="search">
    <label for="book_id">Book ID:</label><br/>
        @if ($errors->has('book_id') || isset($error_book_id))
            <span class = "help-block">{{ $errors->first('book_id') ? $errors->first('book_id') : $error_book_id}}</span><br>
        @endif
        <input type="text" id="bookid" name="book_id" value="{{ old('book_id', $book_id ?? '') }}" placeholder="Book ID.."><br/>
    <label for="book_title">Book Title:</label><br/>
        @if ($errors->has('book_title'))
            <span class = "help-block">{{ $errors->first('book_title')}}</span><br>
        @endif
        <input type="text" id="booktitle" name="book_title" size="80" value="{{ old('book_title', $book_title ?? '') }}" placeholder="Book title.."><br/>
    <label for="author_name">Author Name:</label><br/>
        @if ($errors->has('author_name'))
            <span class = "help-block">{{ $errors->first('author_name')}}</span><br>
        @endif
        <input type="text" id="authorname" name="author_name" size="80" value="{{ old('author_name', $author_name ?? '') }}" placeholder="Author name.."><br/>
    <label for="publisher">Publisher:</label><br/>
        @if ($errors->has('publisher'))
            <span class = "help-block">{{ $errors->first('publisher')}}</span><br>
        @endif
        <input type="text" id="publisher" name="publisher" size="80" value="{{ old('publisher', $publisher ?? '') }}" placeholder="Publisher.."><br/>
    <label for="publication_day">Publication Day:</label><br/>
    @if ($errors->has('year') || $errors->has('year') || $errors->has('year'))
    <span class = "help-block">{{ $errors->first('year')}}</span><br>
    @endif
    @if ($errors->has('month') || $errors->has('month') || $errors->has('month'))
    <span class = "help-block">{{ $errors->first('month')}}</span><br>
    @endif
    @if ($errors->has('day') || $errors->has('day') || $errors->has('day'))
    <span class = "help-block">{{ $errors->first('day')}}</span><br>
    @endif
    <label for="year">Year</label>
        <input type="text" id="year" name="year" value="{{ old('year', $year ?? '') }}" size="4"   placeholder="Year..">
    <label for="day">Month</label>
        <input type="text" id="month" name="month" value="{{ old('month', $month ?? '') }}" size="2" placeholder="Month..">
    <label for="day">Day</label>
        <input type="text" id="day" name="day" value="{{ old('day', $day ?? '') }}" size="2" maxlength="2" placeholder="Day.."><br/><br/><br/>

    <input name="clear"  type="reset" value="clear">
    <input name="delete" type="submit" value="delete">
    <input name="update" type="submit" value="update">
    <input name="add" type="submit" value="add">
</form>