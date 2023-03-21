<?php
    class Radio
    {
        const   MIN_VOLUME = 0;
        const   MAX_VOLUME = 10;
          
        const   MIN_AM_FREQ = 535;
        const   MAX_AM_FREQ = 1700;
          
        const   MIN_FM_FREQ = 87.5;
        const   MAX_FM_FREQ = 108;
          
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
            
        // Setters
        public function setPowered($powered)
        {
            $this->powered = $powered;
        }
            
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
           
        public function setChannel($channel)
        {
            if ($channel < self::MIN_FM_FREQ)
            {
                $channel = self::MIN_FM_FREQ;
            }
            else if ($channel > self::MAX_FM_FREQ && $channel < self::MIN_AM_FREQ
                    && $channel < (self::MIN_AM_FREQ - self::MAX_FM_FREQ))
            {
                $channel = self::MAX_FM_FREQ;
            }
            else if ($channel > self::MAX_FM_FREQ && $channel < self::MIN_AM_FREQ
                    && $channel >= (self::MIN_AM_FREQ - self::MAX_FM_FREQ))
            {
                $channel = self::MIN_AM_FREQ;
            }
            else if ($channel > self::MAX_AM_FREQ)
            {
                $channel = self::MAX_AM_FREQ;
            }
              
            $this->channel = $channel;
        }
    }
?>