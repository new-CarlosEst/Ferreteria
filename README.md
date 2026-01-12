# Aplicacion web para gestionar una ferreteria

- Estructura del proyecto 

``` text
ferreteria/
├── .git                                # 📂 Carpeta de versionado de Git.
├── .vscode
├── class                               # ... Clases relacionadas con las tablas de la DB.
├── controller                          # ... Controladores de la clase DAO.
├── model                               # ... Clases DAO (clase contendora) + conexion.php (conexión a la DB).
├── view/
│   ├── includes                        # Elementos que se incluyen en todas las páginas.
│   └── (vistas con el html)            # Vistas principales (con el HTML).
├── public/
│   ├── .js                             # ... Funciones JS.
│   ├── css                             # ... Estilos de las páginas de view.
│   ├── db                              # Script.sql.
│   ├── resources/
│   │   ├── icons                       # ... Iconos usados en mi PHP.
│   │   ├── img                         # ... Imágenes usadas en mi PHP.
│   │   └── servidor                    # ... .yml para montar el contenedor con apachephp + mysql + phpmyadmin en caso de no tener uno.
├── util                                # ... .php para comprobar, cerrar y abrir la session.
├── vendor                              # Gestión de librerías instaladas por Composer.
├── .env                                # Variables de entorno para conectarse a la DB.
├── .gitignore                          # Archivos y carpetas que no subir a Git.
├── composer.json                       # Gestión de librerías instaladas (Composer).
├── composer.lock                       # Bloqueo de versiones de librerías (Composer).
├── index.php                           # Donde se llamarán a todas las páginas.
└── README.md                           # Info del proyecto.
```

- Aplicacion hecha con php vanila usando MVC

## Montaje del entorno para que la aplicacion sea funcional
- En public, dentro de servidor habra un .yml. Teniendo docker instalado en tu maquina habra que hacer un docker compose up --d para montar el entorno.
- Este contendra un servidor apache-php, un servidor mySql y un servidor de apache phpmyadmin para gestionar la base de datos. 
