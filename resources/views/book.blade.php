<form action="/book" method="POST">
@csrf
<a href="#">Close</a>
<h3>Master Maintenance Book</h3>
    <input name="search" type="submit" value="Search">
    <label for="book_id">Book ID:</label><br/>
        <input type="text" id="bookid" name="book_id" maxlength="4" value="{{ old('book_id', $book_id ?? '') }}" placeholder="Book ID.."><br/>
    <label for="book_title">Book Title:</label><br/>
        <input type="text" id="booktitle" name="book_title" size="80" maxlength="40" value="{{ $book_title ?? '' }}" placeholder="Book title.."><br/>
    <label for="author_name">Author Name:</label><br/>
        <input type="text" id="authorname" name="author_name" size="80" maxlength="40" value="{{ $author_name ?? '' }}" placeholder="Author name.."><br/>
    <label for="publisher">Publisher:</label><br/>
        <input type="text" id="publisher" name="publisher" size="80" maxlength="40" value="{{ $publisher ?? '' }}" placeholder="Publisher.."><br/>
    <label for="publication_day">Publication Day:</label><br/>
    <label for="year">Year</label>
        <input type="text" id="year" name="year" value="{{ $year ?? '' }}" size="5" maxlength="4"  placeholder="Year..">
    <label for="day">Month</label>
        <input type="text" id="month" name="month" value="{{ $month ?? '' }}" size="2" maxlength="2" placeholder="Month..">
    <label for="day">Day</label>
        <input type="text" id="day" name="day" value="{{ $day ?? '' }}" size="2" maxlength="2" placeholder="Day.."><br/><br/><br/>

    <input name="clear"  type="reset" value="Clear">
    <input name="delete" type="submit" value="Delete">
    <input name="update" type="submit" value="Update">
    <input name="add" type="submit" value="Add">
</form>