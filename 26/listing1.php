<?php
   class Radio
   {
      private $powered;   // true or false
      private $volume;    // 0 - 10
      private $channel;   // 535kHz - 1700kHz, 87.5MHz - 108MHz

      // Getters
      public function getPowered()
      {
         return $this->powered;
      }
        
      public function getVolume()
      {
         return $this->volume;
      }
        
      public function getChannel()
      {
         return $this->channel;
      }
   }