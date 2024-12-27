<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="./assets/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: var(--DarkGrey); color: white;">
  <header>
    <h1>Contacts Management</h1>
    <div class="buttons" style="display: flex; width: 50%; column-gap: 50px;">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter Un Nouveau Contact</button>
      <input type="text" class="form-control" placeholder="Username" id="inputSearch" style="width: 50%">
    </div>


    <!-- ============== Modal =============== -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau Contact</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="./Backend/Actions/add.php">
              <div class="mb-3">
                <label for="name" class="col-form-label">Name :</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <div class="mb-3">
                <label for="prenom" class="col-form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
              </div>

              <div class="mb-3">
                <label for="email" class="col-form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="mb-3">
                <label for="phone" class="col-form-label">Number Phone :</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">add new contact</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- ==================================== -->

    <!-- ============== Modal2 =============== -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editModalLabel">Modify Contact</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="./Backend/Actions/modify.php">
              <div class="mb-3">
                <label for="name" class="col-form-label">Name :</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>

              <div class="mb-3">
                <label for="prenom" class="col-form-label">Prenom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
              </div>

              <div class="mb-3">
                <label for="email" class="col-form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>

              <div class="mb-3">
                <label for="phone" class="col-form-label">Number Phone :</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submitEdit" class="btn btn-primary">Modify Contact</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- ==================================== -->
  </header>

  <main>
    <table class="table caption-top">
      <caption>List of users</caption>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Email</th>
          <th scope="col">Telephone</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php
        require_once("./Backend/connection.php");

        $database = new Connection();
        $connection = $database->getConnection();

        $query = "SELECT * FROM Contacts";
        foreach ($connection->query($query) as $row) { ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['prenom'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td>
              <a class="btn btn-success" href="./Backend/Actions/modify.php?id=<?php echo $row['id'] ?>" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $row['id'] ?>">Edit</a>
              <a class="btn btn-danger" href="./Backend/Actions/delete.php?id=<?php echo $row['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>

    </table>
  </main>

  <script src="./assets/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>



<!-- =========================== Modify Section With Modal =========================== -->
