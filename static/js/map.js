function initMap() {
    const myschool = {lat: 10.880466, lng: 106.805095};
    const map = new google.maps.Map(
        document.getElementById('map'), {zoom: 50, center: myschool});
    const marker = new google.maps.Marker({position: myschool, map: map});
}