
class Map{
    constructor(){
        
    }

    mapaDinamico(){       
        var middle = {lat: 0, lng: 0};
        var mapaOviedo = new google.maps.Map(document.getElementById('mapa'),{zoom: 1,center:middle});
        var marcador = new google.maps.Marker({position:oviedo,map:mapaOviedo});
        
    }     
}

var mapa=new Map();
mapa.mapaDinamico() = mapaDinamico();