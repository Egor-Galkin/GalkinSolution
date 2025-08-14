// Переменные для выбора
let selectedTopicId = 1;
let selectedSubtopicId = 11;

// Элементы списка по id
const topicsListEl = document.getElementById('topics-list');
const subtopicsListEl = document.getElementById('subtopics-list');
const contentAreaEl = document.getElementById('content-area');

// Обновляет список тем на странице
function renderTopics() {
    topicsListEl.innerHTML = '';
    data.forEach(topic => {
        const li = document.createElement('li');
        li.textContent = topic.title;
        li.dataset.topicId = topic.id;
        if (topic.id === selectedTopicId) {
            li.classList.add('selected');
        }
        li.addEventListener('click', () => {
            if (selectedTopicId !== topic.id) {
                selectedTopicId = topic.id;
                // При смене темы выбирается первая подтема из новой темы
                selectedSubtopicId = topic.subtopics[0].id;
                renderAll();
            }
        });
        topicsListEl.appendChild(li);
    });
}

// Обновляет список подтем с учетом выбранной темы
function renderSubtopics() {
    subtopicsListEl.innerHTML = '';
    const topic = data.find(t => t.id === selectedTopicId);
    if (!topic) return;
    topic.subtopics.forEach(subtopic => {
        const li = document.createElement('li');
        li.textContent = subtopic.title;
        li.dataset.subtopicId = subtopic.id;
        if (subtopic.id === selectedSubtopicId) {
            li.classList.add('selected');
        }
        li.addEventListener('click', () => {
            if (selectedSubtopicId !== subtopic.id) {
                selectedSubtopicId = subtopic.id;
                renderContent();
                renderSubtopics();
            }
        });
        subtopicsListEl.appendChild(li);
    });
}

// Показывает текст содержимого выбранной подтемы
function renderContent() {
    let content = '';
    const topic = data.find(t => t.id === selectedTopicId);
    if (!topic) return;
    const subtopic = topic.subtopics.find(st => st.id === selectedSubtopicId);
    if (subtopic) {
        content = subtopic.content;
    }
    contentAreaEl.textContent = content;
}

// Полное обновление интерфейса
function renderAll() {
    renderTopics();
    renderSubtopics();
    renderContent();
}

// Инициализация страницы
renderAll();