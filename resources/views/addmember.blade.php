<h1>Add Members to DB</h1>
<form action="" method="post">
 @csrf
  <input type="text" name="name" placeholder="name"><br><br>
  <input type="email" name="email" placeholder="email"><br><br>
  <input type="text" name="address" placeholder="address"><br><br>
  <button type="submit">Submit</button>
</form>