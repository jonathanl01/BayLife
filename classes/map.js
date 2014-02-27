var myCenter = new google.maps.LatLng(37.72337671393543, -122.47899770736694);
var markers = new Array();
var map_markers = new Array();
var map;
function initialize(){
    var mapOptions = {
        center: myCenter,
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ Options needed to load and track location

//Create map object
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

}

function draw_markers(markers_array) {
    var map_center = new google.maps.LatLng(markers_array[0].lat,
            markers_array[0].lng);
    map.setCenter(map_center);
    for (var i = 0; i < markers_array.length; i++) {
        var marker_pos = new google.maps.LatLng(markers_array[i].lat,
                markers_array[i].lng);
        var title = markers_array[i].name;
        map_markers[i] = add_marker(marker_pos, title);
    }
}

function add_marker(marker_pos, title) {
    var markerOptn = {
        position: marker_pos,
        map: map,
        title: title
    };

    var marker = new google.maps.Marker(markerOptn);
    
    return marker;
}