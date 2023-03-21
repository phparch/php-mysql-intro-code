<?php
   class Radio
   {
      private $powered;   // true or false
      private $volume;    // 0 - 10
      private $channel;   // 535kHz - 1700kHz, 87.5MHz - 108MHz
        
      // ...
        
      // Setters
      public function setPowered($powered)
      {
         $this->powered = $powered;
      }
        
      public function setVolume($volume)
      {
         $this->volume = $volume;
      }
        
      public function setChannel($channel)
      {
         $this->channel = $channel;
      }
   }