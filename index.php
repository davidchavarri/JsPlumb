<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>JSPlumb</title>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jsPlumb/1.4.1/jquery.jsPlumb-1.4.1-all-min.js"></script>

</head>
<body>


<script>
    jsPlumb.ready(function() {

    	//Este arreglo configura todas las propiedades que tienen 
    	//los nodos en común
        var common = {
            connector: ["Straight"], //Una linea recta entre nodo y nodo
            anchor: ["Left", "Right"], //Sentido de las conexiones. De izquierda a derecha.
            //La forma que tienen los puntos de conexión al rededor de los nodos, 
            //puede ser un cuadrado, un ciruclo o una imágen.
            endpoint:"Dot", 
            //Estilos de las linea de conexión
            paintStyle:{ strokeStyle:"#007486", lineWidth:3 },
            //Estilo del final de la linea de conexión. En este caso el estilo de la flecha.
            endpointStyle:{ fillStyle:"#007486" }, 
            //El estilo del final de la linea de conexión. En este caso una flecha.
            overlays:[ 
                ["Arrow" , { width:12, length:12, location:0.85 }]
            ]                             

        };

        // Estilo para la linea de conexión que salta a la siguiente
        // linea de nodos
        var common2 = {
            connector: ["Flowchart"], //Conector en forma de cañería
            endpoint:"Dot",//Los puntos de conexión de los nodos tienen forma de punto
            paintStyle:{ strokeStyle:"#007486", lineWidth:3 },
            endpointStyle:{ fillStyle:"#007486" }, 
            overlays:[ 
                ["Arrow" , { width:12, length:12, location:0.98 }]
            ]                             

        };                        

        //Se configura cada punto de conexión del flujo
        jsPlumb.connect({
            source:"item_01",
            target:"item_02",
        }, common);

        jsPlumb.connect({
            source:"item_02",
            target:"item_03",
        }, common);
        
        jsPlumb.connect({
            source:"item_03",
            target:"item_04",
            //Indica que la conexión se realiza de la parte baja de del nodo 3
            //a la parte superior del nodo 4
            anchors:["Bottom", "Top"],
        }, common2);

        jsPlumb.connect({
            source:"item_04",
            target:"item_05",
        }, common);

        jsPlumb.connect({
            source:"item_05",
            target:"item_06",
        }, common);

    });

</script>                 

<style>
	#diagrama{
		width: 800px;
	}

	.item{
		display: inline-block;
		*display: inline;
		*zoom: 1;
		width: 200px;
		background-color: #ccc;
		height: 150px;
		margin: 1.8rem 2rem;
		text-align: center;
		vertical-align: middle;
	}

</style>

<div id="diagrama">

    <div id="item_01" class="item">
		ITEM 01
    </div>
    <div id="item_02" class="item">
		ITEM 02
    </div>
    <div id="item_03" class="item">
		ITEM 03
    </div>
    <div id="item_04" class="item">
		ITEM 04
    </div>
    <div id="item_05" class="item">
		ITEM 05
    </div>

    <div id="item_06" class="item">
		ITEM 06
    </div>

</div>                

</body>
</html>