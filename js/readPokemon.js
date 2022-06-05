class ReadXML{
    constructor(){
        var parser = new DOMParser();
        var stringDatos;
        var xmlhttp;
        var xmlDoc;
    }

    readFile(xmlFile){
        var doc;
        if(typeof window.DOMParser != "undefined") {
            this.xmlhttp=new XMLHttpRequest();
            this.xmlhttp.open("GET",'./pokedex.xml',true);
            this.xmlhttp.onload = function(){
                this.xmlDoc = this.responseXML;
            }
            if (this.xmlhttp.overrideMimeType){
                this.xmlhttp.overrideMimeType('text/xml');
            }
            this.xmlDoc=this.xmlhttp.responseXML;
        }
        else{
            this.xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
            this.xmlDoc.async="false";
            this.xmlDoc.load(xmlFile);
        }
    }

    crearElemento(tipoElemento, texto, insertarAntesDe){
        // Crea un nuevo elemento modificando el árbol DOM
        // El elemnto creado es de 'tipoElemento' con un 'texto' 
        // El elemnto se coloca antes del elemnto 'insertarAntesDe'
        var elemento = document.createElement(tipoElemento); 
        elemento.innerHTML = texto;
        $(insertarAntesDe).before(elemento);
    }

    showAlgo(){
        $.get('pokedex.xml', function(data){
            document.getElementById("texto").innerText = this.xmlDoc.getElementById("nombre");
        })
        
    }
}

var reader = new ReadXML();
var a = reader.readFile("pokedex.xml");