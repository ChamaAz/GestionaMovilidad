# 🚗 Aplicación de Gestión de Movilidad en Área Restringida

Aplicación web desarrollada en **PHP** para gestionar la solicitud de permisos de acceso a una zona céntrica restringida durante el período navideño y obtener listados de infractores.

Permite que los residentes y huéspedes de hoteles soliciten permisos, mientras que el sistema verifica automáticamente qué vehículos han incumplido las normas de circulación.

---

## 🎯 Objetivos del proyecto

- Permitir a residentes y huéspedes de hoteles solicitar permisos para circular en el área restringida.
- Generar automáticamente listados de infractores, es decir, vehículos que han circulado sin autorización.
- Aplicar reglas especiales según el tipo de vehículo:
  - **Vehículos de logística**: circulación solo entre 6:00 y 11:00.
  - **Vehículos eléctricos**: sin restricciones.
  - **Vehículos de servicios públicos**: sin restricciones.
- Gestionar los permisos de manera segura, incluyendo adjuntar justificantes en PDF y crear cookies para evitar solicitudes repetidas.
- Practicar lectura de ficheros, manejo de fechas y horarios, PHP y control de usuarios registrados.

---

## 💻 Ficheros de datos

La aplicación trabaja con varios ficheros que contienen información sobre vehículos:

- `vehiculos.txt` → Matrículas detectadas por cámaras de vigilancia
- `vehiculosEMT.txt` → Vehículos de la EMT: matrícula y plaza asignada
- `taxis.txt` → Información de taxis autorizados
- `servicios.txt` → Vehículos de servicios públicos
- `residentesYHoteles.txt` → Vehículos de residentes y huéspedes (permiso semanal, justificante PDF)
- `logistica.txt` → Vehículos de logística y abastecimiento, con horario limitado (6:00–11:00)

---

## 🛠 Funcionalidades de la aplicación

### 1️⃣ Solicitud de permisos (residente o hotel)

- Formulario web con campos:
  - Matrícula del vehículo
  - Dirección de residencia
  - Fecha de inicio y fecha de fin del permiso
  - Adjuntar justificante PDF
- Confirmación de los datos antes de guardarlos en `residentesYHoteles.txt`.
- Generación de cookie para evitar solicitudes duplicadas.

### 2️⃣ Listado de infractores

- Solo accesible por usuarios registrados.
- Permite seleccionar un rango de fechas.
- Identifica vehículos que circularon sin permiso teniendo en cuenta:
  - Vehículos de logística fuera del horario permitido (6:00–11:00).
  - Vehículos eléctricos y de servicios sin restricciones.
- Muestra listado de infractores con matrícula, propietario, fecha y hora de la infracción.

### 3️⃣ Interfaz principal (`movilidad.php`)

- Menú de navegación con enlaces a:
  - Solicitud de permisos
  - Listado de infractores
  - Gestión de usuarios registrados
- Todos los scripts están enlazados entre sí para una navegación ágil.

---

## ⚡ Tecnologías usadas

**Backend:** PHP  
**Frontend:** HTML5, CSS3  
**Gestión de ficheros:** Lectura/escritura de `.txt`  
**Cookies y control de sesiones** para usuarios registrados  
**Servidor local:** XAMPP  
**Control de versiones:** Git, GitHub

---

## 🚀 Cómo ejecutar la aplicación

1. Clonar el repositorio:

```bash
git clone https://github.com/ChamaAz/GestionaMovilidad.git
