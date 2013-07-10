<?php 
/** 
 * @author krystian@hexmedia.pl
 *
 * Sieve of Atkin 
 */ 
class Atkin { 

    private $primes; 
    private $limit; 

    public function __construct($limit) { 
        $this->limit = $limit; 
        $this->primes = array(); 
    } 

    public function FindPrimes() { 
        $sqrt = sqrt($this->limit); 
        $isPrime = array_fill(0, $this->limit + 1, false); 

        for ($i = 1; $i <= $sqrt; $i++) { 
            for ($j = 1 ; $j <= $sqrt; $j++) { 
                $n = 4 * pow($i, 2) + pow($j, 2); 

                if ($n <= $this->limit && ($n % 12 == 1 || $n % 12 == 5)) { 
                    $isPrime[$n] ^= true; 
                } 

                $n = 3 * pow($i, 2) + pow($j, 2); 

                if ($n <= $this->limit && $n % 12 == 7) { 
                    $isPrime[$n] ^= true; 
                } 
                 
                $n = 3 * pow($i, 2) - pow($j, 2); 
                 
                if ($i > $j && $n <= $this->limit && $n % 12 == 11) { 
                    $isPrime[$n] ^= true; 
                } 
            } 
        } 

        for ($n = 5 ; $n <= $sqrt ; $n++) { 
            if ($isPrime[$n]) { 
                $s = pow($n, 2); 
                 
                for ($k = $s; $k <= $this->limit; $k += $s) { 
                    $isPrime[$k] = false; 
                } 
            } 
        } 

        $this->primes[] = 2; 
        $this->primes[] = 3; 

        for ( $i = 0 ; $i < $this->limit ; $i++) { 
            if ($isPrime[$i]) { 
                $this->primes[] = $i; 
            } 
        } 

        return $this->primes; 
    } 

    public function isPrime($number) { 
        for ($i = 2 ; $i <= $number / 2 ; $i++) { 
            if ($number % $i == 0 ) { 
                return false; 
            } 
        } 
         
        return true; 
    } 
} 

?>
