<?php

class Autenticacion
{
    protected ?Usuario $usuario = null;

    public function iniciarSesion(string $email, string $password): bool
    {
        /** @var Usuario $usuario */
        $this->usuario = (new Usuario())->porEmail($email);
        if(!$this->usuario) {
        return false;
        }

        // Verificamos la contraseña
        if(!(new Cifrado())->verificar($password, $this->usuario->getPassword())) {
        return false;
        }

        $_SESSION['usuario_id'] = $this->usuario->getUsuarioId();
        return true;
    }

    public function cerrarSesion(): void
    {
    unset($_SESSION['usuario_id']);
    }

    public function estaAutenticado(): bool
    {
    return isset($_SESSION['usuario_id']);
    }

 /**
 * @return int|null
 */

    public function getId(): ?int
    {
    return $this->estaAutenticado() ? $_SESSION['usuario_id'] : null;
    }

    public function getUsuario(): ?Usuario
    {
    if(!$this->estaAutenticado()) return null;
    if(!$this->usuario) {
        $this->usuario = (new Usuario())->porId($this->getId());
        }
    return $this->usuario;
    }
}