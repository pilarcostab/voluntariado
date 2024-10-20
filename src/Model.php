<?php
class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO(
        "mysql:host=".MYSQL_HOST .
        ";dbname=".MYSQL_DB.";charset=utf8", 
        MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }   

    private function deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
            CREATE TABLE `sede` (
                `id_sede` int(45) NOT NULL AUTO_INCREMENT,
                `pais` varchar(45) NOT NULL,
                `ciudad` varchar(45) NOT NULL,
                PRIMARY KEY (`id_sede`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

            CREATE TABLE `voluntario` (
                `id_voluntario` int(45) NOT NULL AUTO_INCREMENT,
                `nombre` varchar(45) NOT NULL,
                `apellido` varchar(45) NOT NULL,
                `documento` varchar(45) NOT NULL,
                `id_sede` int(11) NOT NULL,
                PRIMARY KEY (`id_voluntario`),
                KEY `sede` (`id_sede`),
                CONSTRAINT `voluntario_ibfk_1` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

            INSERT INTO `voluntario` (nombre, apellido, documento, id_sede) VALUES ('Pilar', 'Costa', '45.783.190', 1);
            INSERT INTO `voluntario` (nombre, apellido, documento, id_sede) VALUES ('Abril', 'Troncoso', '47.064.619', 1);

            INSERT INTO `sede` (pais, ciudad) VALUES ('Australia', 'Siney');
            INSERT INTO `sede` (pais, ciudad) VALUES ('Argentina', 'Bariloche');
            END;
            
            $this->db->exec($sql);
        }
    }
}
