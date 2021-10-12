
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Gen Jyuu GothicX Medium,Arial;}

input[type=text], select, textarea {
   
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
 
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {

float: right;
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 2px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

a{
float:right;
padding-top:0px;
}

input[type=reset] {

float: right;
    background-color: #b3d9ff;
    color: white;
    padding: 12px 12px;
    border: none;
    border-radius: 2px;
    cursor: pointer;
}

input[type=reset]:hover {
    background-color: #0066cc;
}




.container {
    border-radius: 8px;
    background-color: #f2f2f2;
    padding: 30px;
    width:600px;
    height: 580px;
}
</style>
</head>
<body>
<div class="container">
  <form action="/action_page.php">
  <a href="#">Close</a>
  <h3>Master Maintenance Book</h3>
 
  <input name="search" type="submit" value="Search">
      <label for="book_id">Book ID:</label> <br/>
    <input type="text" id="bookid" name="book_id" maxlength="4" value="<c:out value='${book.book_id}'/>" placeholder="Book ID..">
<br/>
    <label for="book_title">Book Title:</label><br/>
    <input type="text" id="booktitle" name="book_title" size="80" maxlength="40" value="<c:out value='${book.book_title}'/>" placeholder="Book title..">
<br/>
    <label for="author_name">Author Name:</label><br/>
    <input type="text" id="authorname" name="author_name" size="80" maxlength="40" value="<c:out value='${book.author_name}'/>" placeholder="Author name..">
    <br/>
    <label for="publisher">Publisher:</label><br/>
    <input type="text" id="publisher" name="publisher" size="80" maxlength="40" value="<c:out value='${book.publisher}'/>" placeholder="Publisher..">
    <br/>
    <label for="publication_day">Publication Day:</label><br/>
    <input type="text" id="pubday" name="publication_day" size="20" maxlength="40" value="<c:out value='${book.publication_day}'/>" placeholder="Publication day..">
 
 <label for="year">Year</label>
    <input type="text" id="bookid" name="year" size="5" maxlength="4"  placeholder="Year..">
   
  <label for="day">Month</label>
    <input type="text" id="bookid" name="month" size="5" maxlength="2" placeholder="Month..">

  <label for="day">Day</label>
    <input type="text" id="bookid" name="day" size="5" maxlength="2" placeholder="Day..">


<br/><br/><br/>

<input name="clear"  type="reset" value="Clear">
<input name="delete" type="submit" value="Delete">
<input name="update" type="submit" value="Update">
<input name="add" type="submit" value="Add">
   
  </form>
</div>

</body>
</html>