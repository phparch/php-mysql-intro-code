<?php
    require_once('Radio_v2.php');
      
    $car_radio = new Radio();
    $boat_radio = new Radio();
      
    $car_radio->setPowered(true);
    $car_radio->setVolume(4);
    $car_radio->setChannel(88.6);
      
    $boat_radio->setPowered(true);
    $boat_radio->setVolume(11);
    $boat_radio->setChannel(430);
      
    echo 'My car radio is ';
      
    if ($car_radio->getPowered())
    {
        echo 'turned on';
    }
    else
    {
        echo 'turned off';
    }
      
    echo ' with the volume set to ' . $car_radio->getVolume() . ', ';
      
    echo ' and the channel set to ' . $car_radio->getChannel() . '.<br /><br />';
      
    echo 'My boat radio is ';
      
    if ($boat_radio->getPowered())
    {
        echo 'turned on';
    }
    else
    {
        echo 'turned off';
    }
      
    echo ' with the volume set to ' . $boat_radio->getVolume() . ', ';
      
    echo ' and the channel set to ' . $boat_radio->getChannel() . '.';
?>