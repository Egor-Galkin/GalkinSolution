<?php
// Исходные данные: темы, подтемы и текст, связанный с подтемами
$topics = [
    [
        'id' => 1,
        'title' => 'Программирование',
        'subtopics' => [
            ['id' => 11, 'title' => 'Языки программирования', 'content' => 'Языки программирования позволяют разработчикам создавать программы и приложения. Существуют компилируемые и интерпретируемые языки.'],
            ['id' => 12, 'title' => 'Парадигмы', 'content' => 'Парадигмы программирования — это набор философий и подходов, например: процедурное, объектно-ориентированное, функциональное программирование.'],
        ]
    ],
    [
        'id' => 2,
        'title' => 'Веб-разработка',
        'subtopics' => [
            ['id' => 21, 'title' => 'Фронтенд', 'content' => 'Фронтенд — это часть веб-сайта, которую видит пользователь. Основные технологии: HTML, CSS, JavaScript.'],
            ['id' => 22, 'title' => 'Бэкенд', 'content' => 'Бэкенд отвечает за логику, работу с базами данных и серверную часть. Языки: PHP, Python, Node.js.'],
            ['id' => 23, 'title' => 'API', 'content' => 'API — интерфейс для взаимодействия между разными системами и сервисами в Интернете.']
        ]
    ]
];

// Передача данных в JSON, чтобы управлять выбором на JS стороне
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>База знаний IT</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <div class="container">
        <h1>База знаний IT</h1>
        <div class="knowledge-base">

            <div class="panel topics-panel">
                <h2>Темы</h2>
                <ul id="topics-list">
                    <!-- Темы подгрузятся через JS -->
                </ul>
            </div>

            <div class="panel subtopics-panel">
                <h2>Подтемы</h2>
                <ul id="subtopics-list">
                    <!-- Подтемы подгрузятся через JS -->
                </ul>
            </div>

            <div class="panel content-panel">
                <h2>Содержание</h2>
                <div id="content-area">
                    <!-- Содержание выбранной подтемы -->
                </div>
            </div>

        </div>
    </div>

    <script>
        // Передача PHP-массива в JS
        const data = <?php echo json_encode($topics, JSON_UNESCAPED_UNICODE); ?>;
    </script>
    <script src="assets/js/script.js"></script>
</body>
</html>