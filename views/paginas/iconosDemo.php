<?php 
$addOnsDisp = '';

switch($demo) {
    case ($demo->pagosDirectos === 'Si' && $demo->geoLoc === 'Si'):
        $addOnsDisp = 'Si';
        break;
    case ($demo->pagosDirectos === 'No' && $demo->geoLoc === 'No'):
        $addOnsDisp = 'No';
        break;  
    case ($demo->pagosDirectos === 'Si' && $demo->geoLoc === 'No'):
        $addOnsDisp = '1';
        break;
    default:
        $addOnsDisp = '1';
        break;
}

?>

<li>
    <div>
        <img class="icono" loading="lazy" src="build/img/iconIdioma.svg" alt="icono idiomas">
        <p><?php echo $demo->cantIdiomas?></p>
    </div>
    
</li>
<li>
    <div>                            
        <img class="icono" loading="lazy" src="build/img/iconChnl.svg" alt="icono canales">
        <p><?php echo $demo->cantCanales?></p>
    </div>

</li>
<li>
    <div>
        <img class="icono" loading="lazy" src="build/img/iconAddon.svg" alt="icono canales">
        <p><?php echo $addOnsDisp?></p>
    </div>
</li>
</ul>