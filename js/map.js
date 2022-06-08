class Map{
    constructor(){
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.verErrores.bind(this));
    }

    mapaDinamico(){       
        mapboxgl.accessToken = this.apiKey;
        let map = new mapboxgl.Map({
          container: this.container,
          style: this.mapStyle,
          center: this.oviedo,
          zoom: this.zoom
        });
        let marker1 = new mapboxgl.Marker()
            .setLngLat(this.oviedo)
            .addTo(map);
    }     
}

var mapa=new Map();