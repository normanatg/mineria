var opcion = 0;
$(document).ready(function () {
    $('#chooseTable').click(function () {
        var opUser = document.getElementById('chooseTable');
        if(opUser.value == 0) { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        if (opUser.selectedIndex == "1") { 
            document.getElementById("listaErrores").style.visibility = "visible";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "relative";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "2") { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "visible";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "relative";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "3") { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "visible";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "relative";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "4") { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "visible";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "relative";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "5") {
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "visible";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "relative";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "6") { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "visible";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "relative";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "7") { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "visible";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "relative";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "8") { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "visible";
            document.getElementById("mediaAbsoluta").style.visibility = "hidden";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "relative";
            document.getElementById("mediaAbsoluta").style.position = "absolute";
        }
        else if(opUser.selectedIndex == "9") { 
            document.getElementById("listaErrores").style.visibility = "hidden";
            document.getElementById("registrosVacios").style.visibility = "hidden";
            document.getElementById("tablaFrecuencia").style.visibility = "hidden";
            document.getElementById("datosEstadisticos").style.visibility = "hidden";
            document.getElementById("tablaCorrelacion").style.visibility = "hidden";
            document.getElementById("distanciaLevenshtein").style.visibility = "hidden";
            document.getElementById("normalizacion").style.visibility = "hidden";
            document.getElementById("estandar").style.visibility = "hidden";
            document.getElementById("mediaAbsoluta").style.visibility = "visible";
            document.getElementById("listaErrores").style.position = "absolute";
            document.getElementById("registrosVacios").style.position = "absolute";
            document.getElementById("tablaFrecuencia").style.position = "absolute";
            document.getElementById("datosEstadisticos").style.position = "absolute";
            document.getElementById("tablaCorrelacion").style.position = "absolute";
            document.getElementById("distanciaLevenshtein").style.position = "absolute";
            document.getElementById("normalizacion").style.position = "absolute";
            document.getElementById("estandar").style.position = "absolute";
            document.getElementById("mediaAbsoluta").style.position = "relative";
        }
    });
});