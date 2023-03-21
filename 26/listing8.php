<?php
   class Radio
   {
      const MIN_VOLUME = 0;
      const MAX_VOLUME = 10;
      // ...
        
      public function setVolume($volume)
      {
         if ($volume < self::MIN_VOLUME)
         {
            $volume = self::MIN_VOLUME;
         }
         else if ($volume > self::MAX_VOLUME)
         {
            $volume = self::MAX_VOLUME;
         }
           
         $this->volume = $volume;
      }
        
      // ...
   }