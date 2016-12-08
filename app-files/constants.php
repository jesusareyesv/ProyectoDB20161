<?php
  //Credenciales
  define("DB", "//localhost/XE");
  define("DB_USER", "PROYECTODB20161");
  define("DB_PASS", "123");
  define("DB_CHAR", "AL32UTF8");

  //Rutas
  define("RUTA_EMPLEADOS", "empleados");
  define("RUTA_PACIENTES", "pacientes");
  define("RUTA_INVENTARIO", "inventario");
  define("RUTA_HORARIOS", "horarios");
  define("RUTA_DOCTORES", "doctores");

  //Indicadores
  define("LISTA_EMPLEADOS", "solicitudListaEmpleados");
  define("LISTA_ESPECIALIZACIONES", "solicitudListaEspecializaciones");
  define("LISTA_PACIENTES", "solicitudListaPacientes");
  define("LISTA_INVENTARIO", "solicitudListaInventario");
  define("LISTA_DOCTORES", "solicitudListaDoctores");

  //Estas son dinamicas por ende no tienen su respectivo SQL
  define("HORARIO_DOCTOR_FECHA", "solicitudHorarioDoctorRangoDeFechas");
  define("HORARIO_DOCTOR_DIA", "solicitudHorarioDoctorDia");

  //SQL
  define("LISTA_EMPLEADOS_SQL",
  " select * from tablita "
  , true);
  define("LISTA_ESPECIALIZACIONES_SQL",
   " select * from tablita "
  , true);
  define("LISTA_PACIENTES_SQL",
  " select * from tablita "
  , true);
  define("LISTA_INVENTARIO_SQL",
  " select * from tablita "
  , true);
  define("LISTA_DOCTORES_SQL",
  " select * from tablita "
  , true
  );
 ?>
