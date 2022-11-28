<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Lista de empresas</h1>

<table class="table table-striped table-hover">
  <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Direccion</th>
    <th>Telefono</th>
    <th></th>
  </tr>

  <?php 
    require "../models/conctac.php";
    $contacs = contact::all_empresas();
  foreach ($contacts as $key => $contact) { ?>
    <tr>
    <td><?php echo $contact->nombre ?></td>
    <td><?php echo $contact->direccion ?></td>
    <td><?php echo $contact->telefono ?></td>
    <td><?php echo $contact->email ?></td>
    <td>
    </td>
    </tr>
  <?php } ?>
</table>
</body>
</html>