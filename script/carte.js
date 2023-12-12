var map = L.map('map').setView([49.3278069, 6.122827], 10);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([49.3278069, 6.122827]).addTo(map)
    .bindPopup("ZenDog")
    .openPopup();