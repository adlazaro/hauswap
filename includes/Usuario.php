<?php
require_once 'Aplicacion.php';

class Usuario
{

    public const ADMIN_ROLE = 1;

    public const USER_ROLE = 2;

    public static function login($correo, $contraseña)
    {
        $usuario = self::buscaUsuario($correo, $contraseña);
        /* if ($usuario && $usuario->compruebacontraseña($contraseña)) {
            //return self::cargaRoles($usuario);
            return $usuario;
        }
        return false; */

        return $usuario;
    }
    
    public static function crea($correo, $contraseña, $nombre) //$rol
    {
        $user = new Usuario($correo, self::hashcontraseña($contraseña), $nombre);
        //$user->añadeRol($rol);
        return $user->guarda();
    }

    public static function buscaUsuario($correo, $contraseña)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM usuarios U WHERE U.correo='%s'", $conn->real_escape_string($correo));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            $fila = $rs->fetch_assoc();
            if ($fila && ($fila['contraseña'] == $contraseña)) {
                $result = new Usuario($fila['correo'], $fila['contraseña'], $fila['nombre']);
            }
            $rs->free();
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }

    public static function buscaPorId($idUsuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM usuarios WHERE id=%d", $idUsuario);
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            $fila = $rs->fetch_assoc();
            if ($fila) {
                $result = new Usuario($fila['correo'], $fila['contraseña'], $fila['nombre']);
            }
            $rs->free();
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }
    
    private static function hashcontraseña($contraseña)
    {
        return contraseña_hash($contraseña, contraseña_DEFAULT);
    }

    private static function cargaRoles($usuario)
    {
        $roles=[];
            
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT RU.rol FROM RolesUsuario RU WHERE RU.usuario=%d"
            , $usuario->id
        );
        $rs = $conn->query($query);
        if ($rs) {
            $roles = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();

            $usuario->roles = [];
            foreach($roles as $rol) {
                $usuario->roles[] = $rol['rol'];
            }
            return $usuario;

        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return false;
    }
   
    private static function inserta($usuario)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO usuarios(correo, nombre, contraseña) VALUES ('%s', '%s', '%s')"
            , $conn->real_escape_string($usuario->correo)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->contraseña)
        );
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
            $result = self::insertaRoles($usuario);
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }
   
    private static function insertaRoles($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        foreach($usuario->roles as $rol) {
            $query = sprintf("INSERT INTO RolesUsuario(usuario, rol) VALUES (%d, %d)"
                , $usuario->id
                , $rol
            );
            if ( ! $conn->query($query) ) {
                error_log("Error BD ({$conn->errno}): {$conn->error}");
                return false;
            }
        }
        return $usuario;
    }
    
    private static function actualiza($usuario)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("UPDATE usuarios U SET correo = '%s', nombre='%s', contraseña='%s' WHERE U.id=%d"
            , $conn->real_escape_string($usuario->correo)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->contraseña)
            , $usuario->id
        );
        if ( $conn->query($query) ) {
            $result = self::borraRoles($usuario);
            if ($result) {
                $result = self::insertaRoles($usuario);
            }
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        
        return $result;
    }
   
    private static function borraRoles($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM RolesUsuario RU WHERE RU.usuario = %d"
            , $usuario->id
        );
        if ( ! $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return $usuario;
    }
    
    private static function borra($usuario)
    {
        return self::borraPorId($usuario->id);
    }
    
    private static function borraPorId($idUsuario)
    {
        if (!$idUsuario) {
            return false;
        } 
        /* Los roles se borran en cascada por la FK
         * $result = self::borraRoles($usuario) !== false;
         */
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM usuarios U WHERE U.id = %d"
            , $idUsuario
        );
        if ( ! $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }

    private $id;

    private $correo;

    private $contraseña;

    private $nombre;

    private $roles;

    private function __construct($correo, $contraseña, $nombre, $id = null) //,$roles = []
    {
        $this->id = $id;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        $this->nombre = $nombre;
        //$this->roles = $roles;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getcorreo()
    {
        return $this->correo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function añadeRol($role)
    {
        $this->roles[] = $role;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function tieneRol($role)
    {
        if ($this->roles == null) {
            self::cargaRoles($this);
        }
        return array_search($role, $this->roles) !== false;
    }

    public function compruebacontraseña($contraseña)
    {
        return password_verify($contraseña, $this->contraseña);
    }

    public function cambiacontraseña($nuevocontraseña)
    {
        $this->contraseña = self::hashcontraseña($nuevocontraseña);
    }
    
    public function guarda()
    {
        if ($this->id !== null) {
            return self::actualiza($this);
        }
        return self::inserta($this);
    }
    
    public function borrate()
    {
        if ($this->id !== null) {
            return self::borra($this);
        }
        return false;
    }
}
