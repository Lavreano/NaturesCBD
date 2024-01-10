<?php

class Producto
{
    protected int $producto_id = 0;
    protected int $usuario_fk = 0;
    protected string $titulo = "";
    protected string $descripcion = "";
    protected string $precio = "";
    protected ?string $imagen = "";
    protected ?string $imagen_descripcion = "";

     /**
     * @return array|self[]
     */

    public function todas(): array
    {
        /*$rutaAlArchivo = __DIR__ . '/../js/productos.json';
        $registros = json_decode(file_get_contents($rutaAlArchivo), true);

        $salida = [];

        foreach($registros as $registro) {
            $producto = new Producto;

            $producto->setProductoId($registro['producto_id']);
            $producto->setTitulo($registro['titulo']);
            $producto->setDescripcion($registro['descripcion']);
            $producto->setImagen($registro['imagen']);
            $producto->setPrecio($registro['precio']);
            $producto->setImagenDescripcion($registro['imagen_descripcion']);

            $salida[] = $producto;
        }*/

        $db = (new DbConexion())->getDB();
        $query = "SELECT * FROM productos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     * @return self|null
     */

    public function porId(int $id): ?self
    {
        
        $db = (New DbConexion())->getDB();

        $query = "SELECT * FROM productos
                  WHERE producto_id = :id";
        $smtm = $db->prepare($query);
        $smtm->execute(['id' => $id]);
        $smtm->setFetchMode(PDO::FETCH_CLASS, self::class);

        $producto = $smtm->fetch();

        if(!$producto) return null;

        return $producto;
    }


    public function crear(array $data): void
    {
        $db = (new DbConexion())->getDB();
        $query = "INSERT INTO productos (usuario_fk, titulo, descripcion, precio, imagen, imagen_descripcion)
                VALUES (:usuario_fk, :titulo, :descripcion, :precio, :imagen, :imagen_descripcion)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'usuario_fk'            => $data['usuario_fk'],
            'titulo'                => $data['titulo'],
            'descripcion'           => $data['descripcion'],
            'precio'                => $data['precio'],
            'imagen'                => $data['imagen'],
            'imagen_descripcion'    => $data['imagen_descripcion'],
        ]);
    }

    public function editar(int $id, array $data): void
    {
        $db = (new DbConexion())->getDB();
        $query = "UPDATE productos
                SET titulo              = :titulo,
                    descripcion         = :descripcion,
                    precio              = :precio,
                    imagen              = :imagen,
                    imagen_descripcion  = :imagen_descripcion
                WHERE producto_id = :producto_id";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'titulo'                => $data['titulo'],
            'descripcion'           => $data['descripcion'],
            'precio'                => $data['precio'],
            'imagen'                => $data['imagen'],
            'imagen_descripcion'    => $data['imagen_descripcion'],
            'producto_id'           => $id,
        ]);
    }

    public function eliminar(int $id): void
    {
        $db = (new DbConexion())->getDB();
        $query = "DELETE FROM productos
                WHERE producto_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
    }

    public function getProductoId(): int
    {
        return $this->producto_id;
    }

    public function setProductoId(int $producto_id): void
    {
        $this->producto_id = $producto_id;
    }

    public function getUsuarioFk(): int
    {
        return $this->usuario_fk;
    }

    public function setUsuarioFk(int $usuario_fk): void
    {
        $this->usuario_fk = $usuario_fk;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descipcion): void
    {
        $this->descripcion = $descipcion;
    }

    public function getPrecio(): int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): void
    {
    $this->precio = $precio;

    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): void
    {
        $this->imagen = $imagen;
    }

    public function getImagenDescripcion(): ?string
    {
        return $this->imagen_descripcion;
    }

    public function setImagenDescripcion(?string $imagen_descripcion): void
    {
        $this->imagen_descripcion = $imagen_descripcion;
    }
}
