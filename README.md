# PROYECTO NAVIDAD MINI-FB
[![Build Status](https://travis-ci.org/kadnan/DockerPHPTutorial.svg?branch=master)](https://travis-ci.org/kadnan/DockerPHPTutorial)

- [x] Completar el esquema de inicio de sesión con acceso a BD (la del minifb) y con cookies.


- [x] App muro público. En la versión básica tendrá lo siguiente:
- [x] Inicio de sesión contra BD y con cookies (reciclar lo de la práctica anterior)
- [x] Un PHP ver-muro.php para visualizar el muro público de mensajes. Los mensajes consistirán solo de un usuario, una fecha de publicación y un texto (contenido del mensaje) y se presentarán en una tabla o mediante divs.
- [x] Otros dos PHPs para redactar mensajes: nuevo-mensaje-formulario.php y nuevo-mensaje-guardar.php

Opcionales:
- [x] Mensajes destacados: al crearlos se puede elegir (checkbox) si se quiere que sea destacado. Los destacados se ven en negrita.
- [x] Mensajes pinchados: al crearlos se puede elegir (checkbox) si se quiere que sea pinchado. Los pinchados salen todos juntos al inicio, y, tras ellos, ya el resto de mensajes no pinchados.
- [x] Dos iconos para los usuarios: los usuarios con menos de 3 mensajes (novato) y el resto (veterano). OJO, no implica nuevo campo en la BD: es un COUNT. En el muro de mensajes, junto al usuario que publica cada mensaje saldrá un icono para los newbies y otro distinto para los veteranos.
- [ ] Mensajes con caducidad: al publicar un mensaje puedo poner cuál quiero que sea su caducidad y será eliminado automáticamente tras los minutos indicados (en la BD guardar nuevo campo fechaCaducidad = [NOW+10 minutos]). ¿Cómo conseguir esto? Comprobar y eliminar mensajes cada vez que se visualice el listado, haciendo un delete adecuado justo antes de la select. Si un mensaje tiene 10 minutos de caducidad y pasan 60 sin que nadie pida el listado el mensaje estará todavía en la BD pero no pasa nada porque antes de visualizar el próximo listado será eliminado y el usuario puede vivir feliz en la idea de que se eliminó a los 10 minutos.
- [ ] Eliminación de mensajes si no han trascurrido aún 2 minutos: solo presento botón si el mensaje es mío y <2 min, y el borrado solo se ejecuta si el mensaje es mío y todavía <2 min (volver a comprobar todo).
- [ ] Modificación de mensajes si no han trascurrido aún 10 minutos desde su última publicación O modificación: solo presento botón si <10 min, y la modificación solo se ejecuta si todavía <10 min. Y todo ello, solo con mis mensajes.
- [x] Dos tipos de usuarios: administradores y normales. Los administradores siempre pueden eliminar o modificar mensajes. Los normales, solo sus mensajes y solo dentro del plazo habitual.
- [x] Respuestas a los mensajes: se puede responder a un mensaje con otros mensajes (a las respuestas no se puede responder: la estructura tiene solo dos niveles, mensaje principal+posibles respuestas).
- [ ] Paginación del muro: cada 20 mensajes, nueva página. Botones de siguiente página, etc.

---
## Despliegue
Desplegar en docker con 
```aidl
docker-compose up -d
```
---
## Capturas

![screenshot](https://raw.github.com/jvegaf/MiniFB/master/screenshots/screenshot1.png)
![screenshot](https://raw.github.com/jvegaf/MiniFB/master/screenshots/screenshot2.png)
![screenshot](https://raw.github.com/jvegaf/MiniFB/master/screenshots/screenshot3.png)


