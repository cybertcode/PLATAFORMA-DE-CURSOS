<div align="center">

<h1> SISTEMA PLATAFORMA DE CURSOS EN LINEA CON LARAVEL  </h1>

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Issues](https://img.shields.io/github/issues/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/issues)
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/pulls)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

## :point_right: Descripción del proyecto <a name="point_right-descripción-del-proyecto-"></a>

<p>"Este repositorio contiene una plataforma de cursos en línea construida con STACK TALL (Tailwind CSS, Alpine.js, Livewire y Laravel). La plataforma ofrece una amplia gama de características para la creación, gestión y venta de cursos en línea, incluyendo la autenticación de usuarios, la creación y edición de perfiles de usuario, la creación y gestión de cursos, la venta de cursos a través de PayPal, y la visualización de estadísticas de curso. Esta plataforma es una solución completa y moderna para la creación, gestión y venta de cursos en línea, y es fácilmente personalizable y escalable."

## 🥇 DEMO 🥇 <a name="-demo--"></a>

</p>
</div>

<div align="center">
<p align="center">
  <a href="" rel="noopener">
 <img width=900px  src="./demo-plataforma-de-cursos.gif" alt="Project logo"></a>
</p>
</div>

---

<h2> 📝 Tabla de contenido </h2>

- [:point\_right: Descripción del proyecto ](#point_right-descripción-del-proyecto-)
- [🥇 DEMO 🥇 ](#-demo--)
- [🏁 Primeros pasos ](#-primeros-pasos-)
  - [:dart: Prerrequisitos ](#dart-prerrequisitos-)
  - [🚀 Instalar ](#-instalar-)
  - [🎈 Uso ](#-uso-)
- [👨‍💻 Desarrollador](#-desarrollador)

## 🏁 Primeros pasos <a name="-primeros-pasos-"></a>

Seguir los sucesivamente para levantar el proyecto en su servidor local.

### :dart: Prerrequisitos <a name="dart-prerrequisitos-"></a>

-   Es necesario conocer del stack TALL en nivel básico
-   Editor de código
-   Muchas ganas de seguir aprendiendo 👍

### 🚀 Instalar <a name="-instalar-"></a>

Seguir los siquientes pasos consecutivos - utiliza uno de ellos

```
git@github.com:cybertcode/PLATAFORMA-DE-CURSOS.git

ó

https://github.com/cybertcode/PLATAFORMA-DE-CURSOS.git

```

### 🎈 Uso <a name="-uso-"></a>

-   En el terminal

    ```
    composer install
    cp .env.example .env
    php artisan key:generate
    ```

-   Crear tu base de datos
-   Cambiar los datos de usuario

    ```
    DB_DATABASE=plataformacursos
    DB_USERNAME=root
    DB_PASSWORD=
    ```

-   Cambiar el driver de local a public

    ```
    # FILESYSTEM_DISK=public
    ```

-   En el terminal

    ```
    php artisan migrate
    php artisan db:seed
    php artisan serve
    npm run dev
    ```

-   Integración PayPal configurar en el .env

    > Es necesario tener una cuenta en PayPal y sacar los datos del modo sandbox

    ```
    PAYPAL_CLIENT_ID=ingrese el tuyo
    PAYPAL_CLIENT_SECRET=ingrese el tuyo
    PAYPAL_SANDBOX_CLIENT_ID=ingrese el tuyo
    PAYPAL_SANDBOX_CLIENT_SECRET=ingrese el tuyo
    PAYPAL_MODE=sandbox
    #Paypal sandbox credential
    PAYPAL_SANDBOX_CLIENT_ID=Ingrese el tuyo
    PAYPAL_SANDBOX_CLIENT_SECRET=Ingrese el tuyo
    ```

-   Configurar el correo

    > Es necesario tener una cuenta en mailtrap - copiar la información para implementación con laravel

    ```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME= Tu usuario
    MAIL_PASSWORD=Tu contraseña
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="Tu correo"
    MAIL_FROM_NAME="MI CORREO"

    ```

-   En el terminal
    ```
      php artisan storage:link
    ```
-   Configurar correctamente su ruta según sea tu caso

    ```
    APP_URL=http://127.0.0.1:8000
    ```

-   Datos de acceso
    -   Correo: **admin@admin.com**
    -   Contraseña: **admin123**

## 👨‍💻 Desarrollador<a name="desarrollador"></a>

<div  align="center">

[![MKevyn](https://readme-typing-svg.demolab.com?font=Fira+Code&weight=500&size=18&pause=1&multiline=true&width=435&lines=Ing.+MKevyn+%7C+BackEnd+developer;+%7B%7B+Codeo+y+luego+existo+%7D%7D)](https://github.com/cybertcode)

[![cuenta](https://github-widgetbox.vercel.app/api/profile?username=cybertcode&data=followers,repositories,stars,commits&theme=nautilus)](https://github.com/cybertcode)

<p align="center">
  <img src="https://raw.githubusercontent.com/MartinHeinz/MartinHeinz/master/wave.gif" width="20px"> Mis redes sociales :<br/><br/>
    <a href="https://www.linkedin.com/in/marvyn-kevyn-huanca-hilario-a12699b7/"><img src="https://img.shields.io/badge/linkedin-0077B5.svg?style=for-the-badge&logo=linkedin&logoColor=white"/></a>
    <a href="https://www.facebook.com/profile.php?id=100047330599374"><img src="https://img.shields.io/badge/facebook-1D4292.svg?style=for-the-badge&logo=facebook&logoColor=white"/></a>
    <a href="https://gitlab.com/cybert22"><img src="https://img.shields.io/badge/gitlab-1D4292.svg?style=for-the-badge&logo=gitlab"/></a>
    <a href="https://www.instagram.com/mkevynhh"><img src="https://img.shields.io/badge/instagram-E4405F.svg?style=for-the-badge&logo=instagram&logoColor=white"/></a>
    <a href="https://www.twitch.tv/cybert22"><img src="https://img.shields.io/badge/twitch-9146FF.svg?style=for-the-badge&logo=twitch&logoColor=white"/></a>
    <a href="https://twitter.com/Kevyn94"><img src="https://img.shields.io/badge/twitter-1DA1F2.svg?style=for-the-badge&logo=twitter&logoColor=white"/></a>
</p>

</div>

---

</br>
<div align="center">
<p align="center"> © 2023 Cybertcode, todos los derechos Reservados. Hecho con mucho ❤️ . </p>
<p align="center">
https://www.cybertcode.com
</p>
</div>
````
