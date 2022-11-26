var map;
var marker;

//adding map on page
function initMap() {
    var myLatlng = new google.maps.LatLng(50.4021702,30.3926087);
    var mapOptions = {
        zoom: 5,
        center: myLatlng
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    setMarker();
}

//adding marker on page, when lat and lng inputs is not null
function setMarker(){
    if(marker != null){
        marker.setMap(null);
    }
    if (document.getElementById("latitude").value !== "" && document.getElementById("longitude").value !== ""){
        let lat = Number(document.getElementById("latitude").value);
        let lng = Number(document.getElementById("longitude").value);
        let pos = {lat, lng};

        marker = new google.maps.Marker({
            position: pos,
            draggable: true
        });

        marker.setMap(map);

        marker.addListener("dragend", () => {
            document.getElementById("latitude").value = marker.position.lat()
            document.getElementById("longitude").value = marker.position.lng()
        })
    }
}

//inputting only nums and - on date input
const dateHandler = e =>{
    e.value = '';
}

//inputting only nums and . on lat/lng input
const numHandler = e => {
    const value = e.value
    e.value = value.replace(/[^0-9.]/g, "");
}