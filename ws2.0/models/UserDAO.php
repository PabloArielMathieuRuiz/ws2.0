<?php

//  aqui gestionamos todas las consultas para poder facilitarnos el codigo y la limpiezo 
// en vez de crear un a funcion en alguna clase cuando toca ponenos todas las funciones
// que atacan la base de datos en una clase aparte 

require_once __DIR__ . '/../Conexiones.php';
require_once __DIR__ . '/User.php';

class UserDAO extends Conexion
{
    public function __construct()
    {
        // Llamamos al constructor del padre (Conexion) para abrir la conexión con la BD
        parent::__construct();
    }

    /**
     * Obtiene todos los alumnos de la base de datos y los devuelve como un array de objetos User.
     */
    public function getAll()
    {
        $sql = 'SELECT * FROM alumno';
        $stmt = $this->conexionDb->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        // Convertimos cada fila de la BD en una instancia de la clase User
        foreach ($rows as $row) {
            $users[] = $this->mapRowToUser($row);
        }

        return $users;
    }

    /**
     * Busca un alumno por su id. Devuelve un objeto User o null si no existe.
     */
    public function getById($id)
    {
        // Usamos consultas preparadas (:id) para evitar inyección SQL
        $sql = 'SELECT * FROM alumno WHERE id = :id';
        $stmt = $this->conexionDb->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return $this->mapRowToUser($row);
    }

    /**
     * Inserta un nuevo alumno en la base de datos y devuelve el objeto User con su id generado.
     */
    public function create(User $user)
    {
        $sql = 'INSERT INTO alumno (nombre, apellidos, password, telefono, email, sexo, fecha_nacimiento)
                VALUES (:nombre, :apellidos, :password, :telefono, :email, :sexo, :fecha_nacimiento)';

        $stmt = $this->conexionDb->prepare($sql);
        $stmt->execute([
            ':nombre' => $user->getName(),
            ':apellidos' => $user->getSurname(),
            ':password' => $user->getPassword(),
            ':telefono' => $user->getTelefono(),
            ':email' => $user->getEmail(),
            ':sexo' => $user->getSex(),
            ':fecha_nacimiento' => $user->getFechaNacimiento(),
        ]);

        // Recuperamos el id autoincremental que acaba de asignar MySQL y se lo guardamos al objeto
        $user->setId((int) $this->conexionDb->lastInsertId());

        return $user;
    }

    /**
     * Actualiza los datos de un alumno existente en la base de datos.
     */
    public function update(User $user)
    {
        $sql = 'UPDATE alumno
                SET nombre = :nombre,
                    apellidos = :apellidos,
                    password = :password,
                    telefono = :telefono,
                    email = :email,
                    sexo = :sexo,
                    fecha_nacimiento = :fecha_nacimiento
                WHERE id = :id';

        $stmt = $this->conexionDb->prepare($sql);
        $stmt->execute([
            ':nombre' => $user->getName(),
            ':apellidos' => $user->getSurname(),
            ':password' => $user->getPassword(),
            ':telefono' => $user->getTelefono(),
            ':email' => $user->getEmail(),
            ':sexo' => $user->getSex(),
            ':fecha_nacimiento' => $user->getFechaNacimiento(),
            ':id' => $user->getId(),
        ]);

        return $user;
    }

    /**
     * Elimina un alumno por su id. Primero lo busca para poder devolver sus datos tras borrarlo.
     */
    public function delete($id)
    {
        // Comprobamos si existe antes de borrar
        $user = $this->getById($id);
        if ($user === null) {
            return null;
        }

        $sql = 'DELETE FROM alumno WHERE id = :id';
        $stmt = $this->conexionDb->prepare($sql);
        $stmt->execute([':id' => $id]);

        // Devolvemos la instancia del usuario que acabamos de eliminar
        return $user;
    }

    /**
     * Método auxiliar privado que transforma un array asociativo de la BD en un objeto User.
     */
    private function mapRowToUser(array $row)
    {
        return new User(
            $row['nombre'],
            $row['apellidos'],
            $row['password'],
            $row['telefono'],
            $row['email'],
            $row['sexo'],
            $row['fecha_nacimiento'],
            (int) $row['id']
        );
    }
}