<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

  <main class="container-fluid">
    <br>
    <!--https://getbootstrap.com/docs/5.0/forms/form-control/-->
    <div class="mb-3">
      <label for="formFile" class="form-label">Default file input example</label>
      <input class="form-control" type="file" id="formFile">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <!--https://getbootstrap.com/docs/4.0/components/buttons/-->
    <button type="button" class="btn btn-primary">Submit Assignment</button>
  </main>
  <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>
  
</body>
</html>