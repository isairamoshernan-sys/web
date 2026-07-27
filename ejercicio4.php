<?php
session_start();

if(!isset($_SESSION["inventario"])){
 $_SESSION["inventario"]=[
    1 => ["nombre"=>"Memoria USB 16GB","precio"=> 250.00,"existencia"=>10],
    2=> ["nombre"=> "Teclado","precio"=> 120,""=> 120.00, "existencia"=> 5],
    3=> ["nombre"=> "Mouse Pad","precio"=> 35.00, "existencia"=>25],
    4=> ["nombre"=> "Router", "Router Mercury","precio"=> 420.00,"existencia"=>12]
 ];
}
$mensaje="";
$tipo_mensaje="";

if ($_SERVER['REQUEST_METHOD']=="POST"){
     $id_producto = intval($_POST["producto"]);
      $cantidad=intval($_POST["cantidad"]);
    
      if (isset($_SESSION["inventario"][$id_producto])){
        $producto_seleccionado=$_SESSION["inventario"][$id_producto];

        if ($cantidad<=0) {
            $mensaje="Error , la cantidad debeser mayor o igual a 1";
            $tipo_mensaje= "error";
        }elseif ($producto_seleccionado["existencia"]>=$cantidad){
            $total = $cantidad *$producto_seleccionado["precio"];
            $_SESSION["inventario"][$id_producto]["existencia"]-=$cantidad;
            $mensaje= "Venta Exitosa compra:".$cantidad ."X" .$producto_seleccionado["nombre"].".Total a pagar: L.".number_format($total,2);
            $tipo_mensaje= "exito";
        }else{
            $mensaje= "ERROR: no hay suficiente producto.solo quedan ".$producto_seleccionado["existencia"]. "unidades de ".$producto_seleccionado["nombre"].".";
            $tipo_mensaje= "error";
         }

    }

} 

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charse="UTF-8">
        <title>Inventario Escolar - 12vo -2 Informatica</title>
        <style>
     *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body{
    background:linear-gradient(135deg,#4facfe,#00f2fe);
    min-height:100vh;
    padding:40px;
}

h2,h3{
    text-align:center;
    color:#1f2937;
    margin-bottom:20px;
}

table{
    width:90%;
    margin:25px auto;
    border-collapse:collapse;
    background:#fff;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

thead{
    background:#2563eb;
    color:white;
}

th{
    padding:15px;
    font-size:16px;
}

td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tbody tr:nth-child(even){
    background:#f8fafc;
}

tbody tr:hover{
    background:#dbeafe;
    transition:.3s;
}

form{
    width:500px;
    margin:30px auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

.campo{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
    color:#374151;
}

select,
input{
    width:100%;
    padding:12px;
    border:1px solid #cbd5e1;
    border-radius:8px;
    font-size:15px;
    outline:none;
    transition:.3s;
}

select:focus,
input:focus{
    border-color:#2563eb;
    box-shadow:0 0 8px rgba(37,99,235,.3);
}

button{
    width:100%;
    padding:14px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:17px;
    font-weight:bold;
    transition:.3s;
}

button:hover{
    background:#1d4ed8;
    transform:scale(1.03);
}

.mensaje{
    width:90%;
    margin:20px auto;
    padding:15px;
    text-align:center;
    border-radius:8px;
    font-size:17px;
    font-weight:bold;
}

.exito{
    background:#d1fae5;
    color:#065f46;
    border:2px solid #10b981;
}

.error{
    background:#fee2e2;
    color:#991b1b;
    border:2px solid #ef4444;
}

@media(max-width:700px){

    body{
        padding:15px;
    }

    table{
        width:100%;
        font-size:14px;
    }

    form{
        width:100%;
    }

    h2{
        font-size:24px;
    }

}
        </style>

    </head>
    <body>
        <h2>Inventario de la tienda Escolar BTP Informatica</h2>
        <?php if ($mensaje !=""): ?>
            <div class="mensaje <?php echo $tipo_mensaje; ?>"> 
              <?php echo $mensaje; ?>
        </div>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Existencia</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION["inventario"] as $id=>$info):?>php
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $info["nombre"];?></td>
                        <td><?php echo number_format ($info["precio"],2);?></td>
                        <td><?php echo $info["existencia"];?></td>

                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Registrar Nueva Venta </h3>
   <form method="POST" action ="">
<div class="campo">
 <label for="producto">Seleccione el Producto</label>
<select name="producto" id="producto" required>
    <?php foreach ($_SESSION["inventario"] as $id=>$info):?>
        <option value="<?php echo $id; ?>">
         <?php echo $info["nombre"];?> ($<?php echo $info ["precio"];?>)

        </option>
        <?php endforeach; ?>
</select>
</div>
<div class="campo">
<label for="cantidad">Cantidad a Comprar</label>
<input type="number" name="cantidad" id="cantidad" min="1" required>
</div>
<button type="submit">Procesar Compra</button>
</form>
    </body>
    </html>