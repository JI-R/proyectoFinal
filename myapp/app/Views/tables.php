<h2 class="my-4 text-center">Registros</h2>
<div class="table-responsive col-10 offset-1 bg-white rounded border shadow-sm p-4">
  <table class="table table-striped my-3 py-3 display" id="tabla">
  <thead class="table-secondary">
      <tr>
          <th class="text-center">Id</th>
          <th class="text-center">Temperatura</th>
          <th class="text-center">Humedad</th>
          <th class="text-center">Indice</th>
          <th class="text-center">Fecha</th>
      </tr>
  </thead>
  <tbody class="text-center">
      <?php foreach ($medidas as $row): ?>
          <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['temperatura'] ?></td>
              <td><?= $row['humedad'] ?></td>
              <td><?= $row['indice'] ?></td>
              <td><?= $row['fecha'] ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
  </table>
</div>

<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
   <link href="/assets/js/DataTables/datatables.min.css" rel="stylesheet"/> 
   <script src="/assets/js/DataTables/datatables.min.js"></script>
   <script>
   $(document).ready( function () {
       $('#tabla').DataTable( {
           lengthMenu: [
               [ 15, 30, 50, 100, 200, 300, -1 ],
               [ '15', '30', '50','100','200','300', 'Mostrar Todo' ]],
               responsive:true,
               language: {
                   "lengthMenu": "Mostrar _MENU_ registros",
                   "zeroRecords": "No se encontraron resultados",
                   "info": "Registros del _START_ al _END_ de un total de _TOTAL_",
                   "infoEmpty": "Registros del 0 al 0 de un total de 0",
                   "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                   "sSearch": "Buscar:",
                   "oPaginate": {
               "sFirst": "Primero",
               "sLast":"Último",
               "sNext":"Siguiente",
               "sPrevious": "Anterior"
           },
   	     "sProcessing":"Procesando...",
           },
       });
   } );
</script>