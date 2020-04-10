<?php $this->start('css'); ?>

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100vh;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

<?php $this->end(); ?>

        <div class="map-container">
            <!-- <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3651.907089608435!2d90.38869234899903!3d23.750692388021104!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bcd681372b%3A0x5c2b8755e4327004!2sBashundhara+City+Shopping+Complex!5e0!3m2!1sen!2sbd!4v1520412556419" frameborder="0" style="border:0; width: 100%; height: 78.125vh;" allowfullscreen="false"></iframe> -->

            <div id="map"></div>
            <!-- Replace the value of the key parameter with your own API key. -->
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 stores">
                        <div class="map-search">
                            <form class="form-horizontal" action="javascript:;">
                              <div class="form-group">
                                <div class="col-md-3 col-md-offset-4">
                                    <input type="text" class="form-control" placeholder="Enter City name">
                                </div>
                                <button type="submit" class="btn btn-warning col-md-1">Search</button>
                              </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-center text-bold">Basundhara City</h4>
                            <p class="text-center text-bold">Level-7, block-A Panthapath, Dhaka-1215. Hotline- +8801755625026</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-center text-bold">Dora Complex</h4>
                            <p class="text-center text-bold">14 Ranking Street Wari, Dhaka-1215.    <br> Hotline- +8801755625027</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-center text-bold">Jamuna Future Park</h4>
                            <p class="text-center text-bold">Ground Floor, West Court, Dhaka-1215. Hotline- +8801755625028</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-center text-bold">RP Tower</h4>
                            <p class="text-center text-bold">Chiriyakhana Road Mirpur, Dhaka-1215. Hotline- +8801755625029</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php $this->start('script'); ?>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPZkCoYVjvIwOQzbyhhJC_NhHN9X5ij5I&callback=initMap">
    </script>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: new google.maps.LatLng(23.7692394, 90.3719231),
          mapTypeId: 'roadmap'
        });

        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        var icons = {
          parking: {
            icon: iconBase + 'parking_lot_maps.png'
          },
          library: {
            icon: iconBase + 'library_maps.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          },
          default: {
            icon: iconBase + 'default-marker.png'
          }
        };

        var features = [
          {
            position: new google.maps.LatLng(23.7511289, 90.3886628),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(23.7158738, 90.4159566),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(23.8135673, 90.4221515),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(23.8012839, 90.3526541),
            type: 'default'
          }
        ];

        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            animation: google.maps.Animation.DROP,
            map: map
          });
        });
      }
    </script>

<?php $this->end(); ?>