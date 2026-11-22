<?php

require_once __DIR__ . '/../Interfaces/IToJson.php';

class User implements IToJson
{
    // ==============
    // 1. PROPIEDADES
    // ==============
    private $id;
    private $name;
    private $surname;
    private $password;
    private $telefono;
    private $email;
    private $sex;
    private $fechaNacimiento;

    public function __construct(
        // parametros
        $name,
        $surname,
        $password,
        $telefono,
        $email,
        $sex,
        $fechaNacimiento,
        $id = null
    ) {
        // de los parametros a los objetos
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->sex = $sex;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    // ====================
    // 2. GETTERS Y SETTERS
    // =====================

    // id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // name
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    // surname
    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    // password
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    // telefono
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    // email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // sex
    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    // fechaNacimiento
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    // =================================================================
    // 3. IMPLEMENTACIÓN DEL MÉTODO toJson() DE LA INTERFAZ IToJson
    // =================================================================

    /**
     * Convierte las propiedades privadas del objeto en un array asociativo.
     *
     * ¿Por qué es necesario este método?
     * 1. Si pasamos el objeto $user directamente a json_encode(), PHP no puede
     *    acceder a sus propiedades privadas y devuelve un objeto vacío: "data": {}.
     * 2. Si pasamos $user->toJson() dentro de otro json_encode(), el texto se
     *    codifica dos veces y aparece lleno de barras invertidas: "data": "{\"nombre\":\"Pepe\"}".
     *
     * Con toArray() podemos incluir la instancia de User dentro del array de respuesta
     * {success, message, data} y generar un único JSON limpio al final.
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'nombre' => $this->name,
            'apellidos' => $this->surname,
            'password' => $this->password,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'sexo' => $this->sex,
            'fecha_nacimiento' => $this->fechaNacimiento,
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);

        /**
         * La constante JSON_UNESCAPED_UNICODE en la función json_encode() de PHP evita que los
         * caracteres especiales o multibyte (como eñes, vocales con tilde, emojis o caracteres de otros
         * alfabetos) se conviertan en secuencias de escape Unicode (como \u00f1).
         *
         * Al usar esta constante, el JSON resultante mantiene los caracteres en su formato original UTF-8.
         * Esto hace que el código sea mucho más legible para los humanos y reduce ligeramente el
         * tamaño de la cadena (peso del archivo).
         */
    }
}