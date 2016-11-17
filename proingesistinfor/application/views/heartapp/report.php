<?php 
  function getAddress($lat, $lng){
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if ($status=="OK") { 
      $text = $data->results[0]->formatted_address;
      list($street, $city, $country) = explode(',', $text);
      $aux = array('city' => $city, 'street' => $street);
      return $aux;
    } else {
      return false;
    }
  }
?>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <h4 class="title">Reporte de pulso cardiaco</h4>
        <p class="category">Se registran siempre que este el bluetooth conectado.</p>
      </div>
      <div class="content table-responsive table-full-width">
        <table class="table table-striped">
          <thead>
            <th>Pulso cardiaco</th>
            <th>Ciudad</th>
            <th>Calle</th>
            <th>Hora</th>
            <th>Fecha</th>
          </thead>
          <tbody>
            <?php 
              if ($report) {
                foreach ($report as $report) {
                  $id = $report->id;
                  $id_user = $report->id_user;
                  $latitude = $report->latitude;
                  $longitude = $report->longitude;
                  $pulse = $report->pulse;
                  $date = new DateTime($report->date);
                  $hour = $date->format('H:i:s');
                  $date = $date->format('d/m/Y');
                  $address = getAddress($latitude, $longitude);
                  $city = $address['city']; 
                  $street = $address['street'];
                  echo '
                  <tr>
                    <td>'.$pulse.' (BTM) </td>
                    <td>'.$city.'</td>
                    <td>'.$street.'</td>
                    <td>'.$hour.'</td>
                    <td>'.$date.'</td>
                  </tr>';
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="text-center">
      <?php echo $this->pagination->create_links() ?>
    </div>
  </div>
</div>