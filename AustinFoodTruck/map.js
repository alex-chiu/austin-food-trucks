// Initialize and add the map
function initMap() {
  
  // The location of Austin
  const center = { lat: 30.26715 , lng: -97.74306 };
  // The map, centered at Austin
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: center,
  });
//   The marker, positioned at Uluru
//   const marker = new google.maps.Marker({
//     position: center,
//     map: map,
//   });
  const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  const markers = locations.map((location, i) => {
    return new google.maps.Marker({
      position: location,
      label: labels[i % labels.length],
    });
  });
  new MarkerClusterer(map, markers, {
    imagePath:
      "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
  });
}
const locations = [
    { lat: 30.263531, lng: -97.762917 },
    { lat: 30.259390, lng: -97.738838 },
    { lat: 30.206210, lng: -97.774730 },
    { lat: 30.263531, lng: -97.762917 },
    { lat: 30.450730, lng: -97.785000 },
    { lat: 30.2496659, lng: -97.7523408}
  ];