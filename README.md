# 🚀 Proyecto Laravel + Docker

Este proyecto está configurado para ejecutarse automáticamente utilizando Docker y un script de instalación.

El objetivo es que cualquier persona pueda clonar el repositorio y ponerlo a correr en su computadora en pocos pasos, sin necesidad de instalar PHP, Composer o MySQL manualmente.

---

# 📋 Requisitos

Antes de comenzar asegúrate de tener instalado:

- ✅ Docker Desktop (Windows / Mac / Linux)
- ✅ Docker Compose (incluido en Docker Desktop)
- ✅ Git

Verifica que Docker esté corriendo antes de continuar.

---

# 📥 1️⃣ Clonar el repositorio

```bash
git clone <URL_DEL_REPO>
cd <NOMBRE_DEL_PROYECTO>
```

---

# ⚙️ 2️⃣ Ejecutar el script de instalación

Dar permisos al script (solo Linux / Mac / Git Bash):

```bash
chmod +x setup.sh
```

Ejecutarlo:

```bash
./setup.sh
```

---

# 🛠 ¿Qué hace automáticamente el script?

El script realiza lo siguiente:

1. 📄 Crea el archivo `.env` a partir de `.env.example`
2. 🐳 Levanta los contenedores Docker
3. 📦 Ejecuta `composer install`
4. 🔑 Genera la `APP_KEY`
5. 🔐 Genera el `JWT_SECRET`
6. 🗄 Ejecuta migraciones y seeders (`--force` para evitar confirmaciones)

No necesitas responder "yes", todo se ejecuta automáticamente.

---

# 🌐 Acceder al proyecto

Una vez finalizado el script, el proyecto estará disponible en:

```
http://localhost
```

Si el puerto fue configurado diferente en `docker-compose.yml`, revisa ahí el puerto asignado.

---

# 🐳 Comandos útiles

### 🔹 Detener contenedores

```bash
docker compose down
```

### 🔹 Levantar contenedores nuevamente

```bash
docker compose up -d
```

### 🔹 Ver logs

```bash
docker compose logs -f
```

### 🔹 Entrar al contenedor de la aplicación

```bash
docker compose exec app bash
```

---

# 🧹 Reiniciar completamente el proyecto

Si ocurre algún error y necesitas reiniciar todo:

```bash
docker compose down -v
docker compose up -d --build
./setup.sh
```

---

# 🗄 Limpiar base de datos

```bash
docker compose exec app php artisan migrate:fresh --seed --force
```

---

# 📦 Tecnologías utilizadas

- Laravel
- MySQL
- Nginx
- JWT Authentication
- Docker

Todo corre dentro de contenedores Docker.

---

# ⚠️ Notas importantes

- Si el archivo `.env` ya existe, el script no lo sobrescribe.
- Si modificas variables del `.env`, debes reiniciar los contenedores.
- Docker debe estar ejecutándose antes de correr el script.

---

# ✅ Instalación rápida (Resumen)

```bash
git clone <URL_DEL_REPO>
cd <NOMBRE_DEL_PROYECTO>
chmod +x setup.sh
./setup.sh
```

Y el proyecto quedará completamente funcional en tu máquina.
