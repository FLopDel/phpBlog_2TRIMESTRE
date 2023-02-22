<?php
    namespace Models;
    use Lib\BaseDatos;
    use repositories\UsuarioRepository;
    use PDO;
    use PDOException;
    use PHPMailer\PHPMailer\PHPMailer;

    class Usuario extends BaseDatos{
        private int $id;
        private string $nombre;
        private string $usuario;
        private int $email;
        private int $password;
        private int $rol;
        private int $fecha;
        private BaseDatos $db;

        public function __construct(){
            parent::__construct();
        }
    
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->codigo = $id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre(string $nombre){
            $this->nombre = $nombre;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function setUsuario(string $usuario){
            $this->usuario = $usuario;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail(int $email){
            $this->email = $email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword(int $password){
            $this->password = $password;
        }

        public function getRol(){
            return $this->rol;
        }

        public function setRol(int $rol){
            $this->rol = $rol;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha(int $fecha){
            $this->fecha = $fecha;
        }

        public static function fromArray(array $data): Usuarios{
            return new Usuarios(
                $data['id'],
                $data['nombre'],
                $data['usuario'],
                $data['email'],
                $data['password'],
                $data['rol'],
                $data['fecha'],
            );
        }

        public function getUser($usuar){
            $usuarios = "SELECT * FROM usuarios WHERE usuario = :usuario";
            $result = $this->prepara($usuarios);
            $result->bindParam(":id",$id,PDO::PARAM_STR);
    
            $usuario = $usuar;
            try{
                $result->execute();
                return $result->fetch(PDO::FETCH_OBJ);
            }catch(PDOException $err){
                $result = false;
            }
            return $result;
        }

        public static function enviarEmail(){
            $mail = new PHPMailer(true);
            $nombre = $_POST['nombre'];
            $Nomusuario = $_POST['usuario'];
            $email = $_POST['email'];
            $fecha = $_POST['fecha'];
            

            

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '9776acb76d85c1';
                $mail->Password = '457e0b365892e7';//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('fran123@gmail.com', 'Fran');
                $mail->addAddress('dellafuente002@gmail.com');     //Add a recipient
    
    
    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body .= '<p>Nombre:  '.$nombre.'</p>';
                $mail->Body .= '<p>Nombre de usuario en la web:  '.$Nomusuario.'</p>';
                $mail->Body .= '<p>Correo electronico introducido al registrarse:  '.$email.'</p>';
                $mail->Body .= '<p>La fecha de registro:  '.$fecha.'</p>';
                $mail->Body .= "<p>Te has registrado en un blog de noticias.</p>";
                $mail->Body .= "<p>Gracias por su confianza.</p>";

                
    
    
                $mail->send();
                //echo 'El correo ha sido enviado exitosamente';
            } catch (Exception $e) {
                //echo "No se pudo enviar el correo. Mailer Error: {$mail->ErrorInfo}";
            }
        }

    }

?>