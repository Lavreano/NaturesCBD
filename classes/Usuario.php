<?php

class Usuario
{
    protected int $usuario_id;
    protected int $rol_fk;
    protected string $email;
    protected string $password;
    protected ?string $nombre;
    protected ?string $apellido;

    public function porId(string $id): ?self
    {
        $db = (new DbConexion())->getDB();
        $query = "SELECT * FROM usuarios
                WHERE usuario_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        /** @var self|bool $usuario */
        $usuario = $stmt->fetch();

        if(!$usuario) return null;

        return $usuario;
    }

    public function porEmail(string $email): ?self
    {
        $db = (new DbConexion())->getDB();
        $query = "SELECT * FROM usuarios
                WHERE email = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        /** @var self|bool $usuario */
        $usuario = $stmt->fetch();

        if(!$usuario) return null;

        return $usuario;
    }

    public function getUsuarioId(): int
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(int $usuario_id): void
    {
        $this->usuario_id = $usuario_id;
    }

    public function getRolFk(): int
    {
        return $this->rol_fk;
    }

    public function setRolFk(int $rol_fk): void
    {
        $this->rol_fk = $rol_fk;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }
}