const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.styles(    [
    'resources/css/conjunto/estilos(index).css ',
    'resources/css/conjunto/estiloslogin.css ',
    // 'resources/css/conjunto/estilosindex(funcionario).css ',
    // 'resources/css/conjunto/listadofuncionarios.css ',
    // 'resources/css/conjunto/listadoreservas(admin).css ',
    // 'resources/css/conjunto/listaempreado(admin).css ',
    // 'resources/css/conjunto/listapagos(residente).css ',
    // 'resources/css/conjunto/crearanuncio(admin).css ',
    // 'resources/css/conjunto/crearanuncio(funcionario).css ',
    // 'resources/css/conjunto/editarregistrarfuncionarios(admin).css ',
    // 'resources/css/conjunto/entregable.css ',
    // 'resources/css/conjunto/perfil(funcionario).css ',
    // 'resources/css/conjunto/perfil.css ',
    // 'resources/css/conjunto/registrarautos(funcionario).css ',
    // 'resources/css/conjunto/registrarresidentes.css ',
    // 'resources/css/conjunto/registrovisitante(funcionario).css ',
    // 'resources/css/conjunto/reportardaño(funcionario).css ',
    // 'resources/css/conjunto/reportepagos(admin).css ',
    // 'resources/css/conjunto/reservarSalon(Residente).css ',
    // 'resources/css/conjunto/modifperfil(funcionario).css ',
    // 'resources/css/conjunto/modifperfil.css',
    ],'public/css/app.css')
    .scripts(   [
        'resources/js/conjunto/arriba.js ',
        'resources/js/conjunto/jquery-3.3.1.min.js ',
        'resources/js/conjunto/popper.min.js ',
        'resources/js/conjunto/bootstrap.min.js ',
        'resources/js/conjunto/jquery-3.3.1.min.js ',
    ],'public/js/app.js')
    .scripts(   [
        'resources/js/conjunto/404error.js ',
    ],'public/js/appError.js')
    .styles([
        'resources/css/conjunto/estilos-menu.css ',
        'resources/css/conjunto/index.css ',
        'resources/css/conjunto/estilo-principal.css',

    ],'public/css/indexa.css')
    .styles([
        'resources/css/conjunto/crearanuncio(admin).css ',
        'resources/css/conjunto/estilos-menu.css ',
        'resources/css/conjunto/estilo-principal.css',
    ],'public/css/anuncio.css')
    .styles([
        'resources/css/conjunto/listaempreado(admin).css ',
        'resources/css/conjunto/estilos-menu.css ',
        'resources/css/conjunto/estilo-principal.css',
    ],'public/css/funcionarios.css')
    .styles([
        'resources/css/conjunto/listadoresidentes.css ',
        'resources/css/conjunto/estilos-menu.css ',
        'resources/css/conjunto/estilo-principal.css',
    ],'public/css/residentes.css')
    .styles([
        'resources/css/conjunto//guestLoginStyles.css',
    ],'public/css/guestLoginStyles.css')

