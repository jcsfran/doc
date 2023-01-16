<html>

<head>
    <title>{{ config('app.name') }} | Api Documentation</title>
    <link href="../assets/style.css" rel="stylesheet">
    <link href="../assets/patch-notes.css" rel="stylesheet">
    </script>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#swagger-ui">Swagger</a></li>
                <li><a href="#patch-notes">Patch Notes</a></li>
            </ul>
        </nav>
    </header>
    <div id="swagger-ui"></div>
    <script src="../utils/jquery-2.1.4.min.js"></script>
    <script src="../utils/swagger-bundle.js"></script>
    <script type="application/javascript">
        const ui = SwaggerUIBundle({
            url: "../swagger/index.yaml",
            dom_id: '#swagger-ui',
            deepLinking: true,
        });
    </script>

    @inject('patchNotes', 'App\Services\DocumentationService')

    <h2 id="patch-notes">Patch Notes</h2>

    @forelse ($patchNotes->getPatchNotes() as $patch)
        <x-patch-note.div-patch-note :value="$patch" />
    @empty
        <p>Sem notas de atualização</p>
    @endforelse

    <footer>
        <div>
            <p>
                <span>LABI9</span> Tecnologia da Informação ©
                2022 - Todos os direitos reservados.
            </p>
        </div>
    </footer>
</body>

</html>
