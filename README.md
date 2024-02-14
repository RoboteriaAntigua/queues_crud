# Uso de Colas y Jobs en Laravel (Queues)
    Sobre un crud basico que permite gestionar incidencias/ tickets de trabajo/ Ordenes de servicio.

# Crear un job:
    (Un job para guardar informacion en la medida que van pasando cosas)
    php artisan make:job Informacion
    

# Despachar un job con parametros:
    Informacion::dispatch( par1 );
    xej:    Informacion::dispatch( Productos::all() );

# Despachar el job, despues de la respuesta, ver el controlador
    Informacion::dispatchAfterResponse( Incidencias::all());

# En app\Jobs vemos nuestro job: Informacion.php
    public function handle(): void
    {
        //
            sleep(2);
            echo "Job depachado";    
    }
    Al iniciar la app, en el indice vemos que se muestra el index, y 2 segundos despues el mensaje "Job despachado"
    Ideal para tareas largas, como mandar un mail, o actualizar el cache con muchos registros.

# Hasta aqui hemos trabajado con el driver por default "sync", para que se ejecute en segundo plano (asyncronico )
# hay varias opciones:
    "database", "beanstalkd", "sqs", "redis", "null"

# Asincronicamente

# database:
    -> 1 Migrar, crea la tabla de jobs.
        php artisan queue:table

    ->2 Informacion::dispatch()->onConnection('database');  // De esta forma cada job puede ir a una distinta cola.
    ->2 Alternativa: en el .env le decimos que la database es la conexion por defecto;
        QUEUE_CONNECTION=database

# conecciones: 
    son los drivers.
    Una coneccion puede tener muchas colas
# queues:
    Son las colas de trabajos. 
    Una cola puede tener muchos jobs.
    Puede haber muchas colas.

# Workers (se pueden dejar varios workers en proceso)
    Los workers pueden escuchar a cierta cola con cierta coneccion.

    php artisan queue:listen (para desarrollo porque consume muchos recursos)
    php artisan queue:work  (procesa los jobs default unicamente)
    php artisan queue:work database (procesa los jobs que salen por base de datos unicamente)
    php artisan queue:work --queue=secondary

# a mejorar:
    Log::info("trabajandooo..."); deberia imprimir los jobs que van saliendo y no funciona.