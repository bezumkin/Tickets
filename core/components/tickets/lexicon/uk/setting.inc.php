<?php
/**
 * Settings Russian Lexicon Entries
 */

$_lang['area_tickets.main'] = 'Основные';
$_lang['area_tickets.ticket'] = 'Тикет';
$_lang['area_tickets.comment'] = 'Комментарий';

$_lang['setting_tickets.frontend_css'] = 'Стили фронтенда';
$_lang['setting_tickets.frontend_css_desc'] = 'Путь к файлу со стилями магазина. Если вы хотите использовать собственные стили - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.';
$_lang['setting_tickets.frontend_js'] = 'Скрипты фронтенда';
$_lang['setting_tickets.frontend_js_desc'] = 'Путь к файлу со скриптами магазина. Если вы хотите использовать собственные скрипты - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.';

$_lang['setting_tickets.default_template'] = 'Шаблон для новых тикетов';
$_lang['setting_tickets.default_template_desc'] = 'Шаблон "по умолчанию" для новых тикетов. Используется и в административной части, и при создании тикета на фронтенде.';

$_lang['setting_tickets.enable_editor'] = 'Редактор "markItUp"';
$_lang['setting_tickets.enable_editor_desc'] = 'Эта настройка активирует редактор "markItUp" на фронтенде, для удобной работы с тикетами и комментариями.';
$_lang['setting_tickets.editor_config.ticket'] = 'Настройки редактора тикетов';
$_lang['setting_tickets.editor_config.ticket_desc'] = 'Массив, закодированный в JSON для передачи в "markItUp". Подробности тут - http://markitup.jaysalvat.com/documentation/';
$_lang['setting_tickets.editor_config.comment'] = 'Настройки редактора комментариев';
$_lang['setting_tickets.editor_config.comment_desc'] = 'Массив, закодированный в JSON для передачи в "markItUp". Подробности тут - http://markitup.jaysalvat.com/documentation/';

$_lang['setting_tickets.disable_jevix_default'] = 'Отключать Jevix по умолчанию';
$_lang['setting_tickets.disable_jevix_default_desc'] = 'Эта настройка включает или отключает параметр "Отключить Jevix" по умолчанию у новых тикетов.';
$_lang['setting_tickets.process_tags_default'] = 'Выполнять теги по умолчанию';
$_lang['setting_tickets.process_tags_default_desc'] = 'Эта настройка включает или отключает параметр "Выполнять теги MODX" по умолчанию у новых тикетов.';
$_lang['setting_tickets.private_ticket_page'] = 'Редирект с приватных тикетов';
$_lang['setting_tickets.private_ticket_page_desc'] = 'Id существующего ресурса MODX, на который отправлять пользователя, если у него недостаточно прав для просмотра приватного тикета.';

$_lang['setting_tickets.snippet_prepare_comment'] = 'Сниппет обработки комментария';
$_lang['setting_tickets.snippet_prepare_comment_desc'] = 'Специальный сниппет, который будет обрабатывать комментарий. Перекрывает обработку по умолчанию и вызывается прямо в классе "Tickets", соответственно, ему доступны все методы и переменные этого класса.';
$_lang['setting_tickets.comment_edit_time'] = 'Время редактирования';
$_lang['setting_tickets.comment_edit_time_desc'] = 'Время в секундах, в течении которого можно редактировать свой комментарий.';
$_lang['setting_tickets.clear_cache_on_comment_save'] = 'Очищать кэш при комментировании';
$_lang['setting_tickets.clear_cache_on_comment_save_desc'] = 'Эта настройка включает очистку кэша тикета при действии с комментариями (создание\редактирование\удалении). Нужна только если вы вызываете сниппет "TicketComments" кэширвоанным.';