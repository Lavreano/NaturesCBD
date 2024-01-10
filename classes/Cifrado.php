<?php

class Cifrado
{ 
    public function verificar(string $value, string $hash): bool
    { 
        return password_verify($value, $hash); 
    }
}
