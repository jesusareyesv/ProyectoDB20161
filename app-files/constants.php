<?php
  //Credenciales
  define("DB", "//localhost/XE");
  define("DB_USER", "PROYECTODB20161");
  define("DB_PASS", "123");
  define("DB_CHAR", "AL32UTF8");

  //SQL
  define("LISTA_EMPLEADOS_SQL",
  "select * from empleado",
  true);

  define("LISTA_ESPECIALIZACIONES_SQL",
  "select * from especializacion",
  true);

  define("LISTA_INVENTARIO_SQL",
  "select * from implemento",
  true);

  define("LISTA_NOMBRES_DOCTORES_SQL",
  'SELECT NUM_COLEGIO || \'       -       \' || NOMBRE AS NOMBRE FROM MEDICO ORDER BY NUM_COLEGIO',
  true);

  define("LISTA_NOMBRES_PACIENTES_SQL",
  'SELECT CI || \'       -       \' || NOMBRE AS NOMBRE FROM PACIENTE ORDER BY CI ASC',
  true);
  
  define("LISTA_ATRIBUTOS_CITA_SQL",
  'SELECT p.CI || \'       -        \' || p.NOMBRE AS PACIENTE,
       m.NUM_COLEGIO || '       -       ' || m.NOMBRE AS DOCTOR,
       TO_CHAR(c.FECHA,\'DD/MM/YYYY\') AS FECHA,
       c.URL_IMAGEN_ODONTOGRAMA AS ODONTOGRAMA,
       c.COSTO AS PRESUPUESTO
  FROM CITA c
  JOIN MEDICO m ON c.CI_MEDICO = m.CI
  JOIN PACIENTE p ON c.CI_PACIENTE = p.CI
  WHERE c.ID = ',
  true);

  define("HISTORIAL_CITAS_SQL",
  "SELECT NOMBRE, FECHA, MOTIVO FROM CITA JOIN PACIENTE ON(CI=CITA.CI_PACIENTE)
  WHERE CI_PACIENTE='&CIPACIENTE' ORDER BY FECHA",
  true);

  define("HISTORIAL_TRATAMIENTOS_SQL",
  "SELECT NOMBRE, CT.FECHA, CASE WHEN ABONADO<CT.COSTO THEN 'INSOLVENTE' ELSE 'SOLVENTE' END
  FROM CITA_TRATAMIENTO CT JOIN CITA C ON(ID=CITA_ID) JOIN PACIENTE P ON(P.CI=C.CI_PACIENTE)
  WHERE C.CI_PACIENTE=&CIPACIENTE ORDER BY CT.FECHA",
  true);

  define("MOROSOS_SQL",
  "SELECT NOMBRE, CT.FECHA FECHA, CASE WHEN SYSDATE-CT.FECHA>=30 THEN 'PLAZO TERMINADO' ELSE 'QUEDAN'||TO_CHAR(SYSDATE-CT.FECHA,'99')||'DIA(S)' END PLAZO
  FROM CITA_TRATAMIENTO CT JOIN CITA C ON(ID=CITA_ID)
  JOIN PACIENTE P ON(P.CI=C.CI_PACIENTE) WHERE ABONADO<CT.COSTO",
  true);

  define("EL_DERROCHADOR_SQL",
  "SELECT M.NOMBRE Medico, SUM(TI.CANTIDAD) Cantidad FROM CITA_TRATAMIENTO CT JOIN
  TRATAMIENTO_IMPLEMENTO TI ON(CT.CITA_ID=TI.CITA_ID AND CT.TRATAMIENTO_ID=TI.TRATAMIENTO_ID)
  JOIN MEDICO M ON(M.CI=CT.CI_MEDICO)
  JOIN IMPLEMENTO I ON(I.ID=TI.IMPLEMENTO_ID)
  GROUP BY I.ID, M.NOMBRE HAVING (I.ID=&IDIMPLEMENTO) ORDER BY 2",
  true);

  //Las super consultas
  const CONSULTAS = array(
    "Tratamientos realizados" => "t-realizados",
    "Horarios disponibles" => "h-disponibles",
    "Citas disponibles" => "c-disponibles",
    "Ganancias generales" => "g-generales",
    "Ganancias por mes" => "g-por-mes",
    "El doctor derrochador" => "d-derrochador",
    "Morosos" => "morosos",
    "Historial de citas" => "c-historial",
    "Historial de tratamientos" => "t-historial"
  );

 ?>
