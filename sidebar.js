$("#contact").click(() => $("#contact-info").toggleClass("showing"));

async function initMap() {
  const address = encodeURI($("#map").attr("data-address"));
  const response = await $.get(
    `https://maps.googleapis.com/maps/api/geocode/json?address=${address}&key=AIzaSyB1BXqRzi7eMm_MyX864abW74dCbkZNCl0`
  );

  const { lat, lng } = response.results[0].geometry.location;

  const { formatted_address } = response.results[0];

  const map = await new google.maps.Map(document.getElementById("map"), {
    center: {
      lat,
      lng
    },
    zoom: 15
  });
  const marker = new google.maps.Marker({
    position: {
      lat,
      lng
    },
    animation: google.maps.Animation.DROP,
    title: formatted_address
  });

  marker.setMap(map);
}
