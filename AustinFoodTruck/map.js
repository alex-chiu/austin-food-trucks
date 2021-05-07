
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: { lat: 30.26715 , lng: -97.74306 },
  });


  
  // Set LatLng and title text for the markers. 
  var truckdata = data;
  // console.log(truckdata);
  // Create an info window to share between markers.
  const infoWindow = new google.maps.InfoWindow();
  // Create the markers.
  var markers = [];
  var count = 0;
  for(var i  = 0; i < truckdata.length; i++){
  	count++;
  	// var latitudeLongitutde = { truckdata[i][0]["lat"], truckdata[i][0]["lng"] }
  	// console.log(latitudeLongitutde);
    var latLng = new google.maps.LatLng( truckdata[i][0]["lat"], truckdata[i][0]["lng"] );
    // var latLng = new google.maps.LatLng(latitudeLongitutde);
    
    const marker = new google.maps.Marker({
      position: latLng,
      map,
      title: `<h3>${i + 1}.${truckdata[i][1]}</h3><p>${truckdata[i][2]}<p> <p><a href="${truckdata[i][3]}">${truckdata[i][3]}</a></p>`,
      label: `${i + 1}`,
      optimized: false,
    });
    marker.addListener("click", () => {
      infoWindow.close();
      infoWindow.setContent(marker.getTitle());
      infoWindow.open(marker.getMap(), marker);
    });
    markers.push(marker);
  };
  console.log(count);
  var markerCluster = new MarkerClusterer(map, markers, {
    imagePath:
      "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
  });
  


  // truckdata.forEach( ( [position, title, description, website], i) => {
  //   console.log(position);
  //   var latLng = new google.maps.LatLng(position["lat"], position["lng"]);
  //   // console.log(latLng)
  //   const marker = new google.maps.Marker({
  //     position: latLng,
  //     map,
  //     title: `<h3>${i + 1}.${title}</h3><p>${description}<p> <p><a href="${website}">${website}</a></p>`,
  //     label: `${i + 1}`,
  //     optimized: false,
  //   });
  //   // Add a click listener for each marker, and set up the info window.
  //   marker.addListener("click", () => {
  //     infoWindow.close();
  //     infoWindow.setContent(marker.getTitle());
  //     infoWindow.open(marker.getMap(), marker);
  //   });
  //   markers.push(marker);
  // });
  // var markerCluster = new MarkerClusterer(map, markers, {
  //       imagePath:
  //         "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
  //     });
}