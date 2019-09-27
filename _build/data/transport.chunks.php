<?php

$chunks = array();

$tmp = array(
    'tpl.Tickets.form.create' => 'form_create',
    'tpl.Tickets.form.update' => 'form_update',
    'tpl.Tickets.form.preview' => 'form_preview',
    'tpl.Tickets.form.files' => 'form_files',
    'tpl.Tickets.form.file' => 'form_file',
    'tpl.Tickets.form.image' => 'form_image',
    'tpl.Tickets.comment.form.files' => 'comment_form_files',

    'tpl.Tickets.ticket.latest' => 'ticket_latest',
    'tpl.Tickets.ticket.email.bcc' => 'ticket_email_bcc',
    'tpl.Tickets.ticket.email.subscription' => 'ticket_email_subscription',

    'tpl.Tickets.comment.form' => 'comment_form',
    'tpl.Tickets.comment.form.guest' => 'comment_form_guest',
    'tpl.Tickets.comment.one.auth' => 'comment_one_auth',
    'tpl.Tickets.comment.one.guest' => 'comment_one_guest',
    'tpl.Tickets.comment.one.deleted' => 'comment_one_deleted',
    'tpl.Tickets.comment.wrapper' => 'comment_wrapper',
    'tpl.Tickets.comment.login' => 'comment_login',
    'tpl.Tickets.comment.latest' => 'comment_latest',
    'tpl.Tickets.comment.email.owner' => 'comment_email_owner',
    'tpl.Tickets.comment.email.reply' => 'comment_email_reply',
    'tpl.Tickets.comment.email.subscription' => 'comment_email_subscription',
    'tpl.Tickets.comment.email.bcc' => 'comment_email_bcc',
    'tpl.Tickets.comment.email.unpublished' => 'comment_email_unpublished',
    'tpl.Tickets.comment.list.row' => 'comment_list_row',

    'tpl.Tickets.list.row' => 'ticket_list_row',
    'tpl.Tickets.sections.row' => 'ticket_sections_row',
    'tpl.Tickets.sections.wrapper' => 'ticket_sections_wrapper',
    'tpl.Tickets.meta' => 'ticket_meta',
    'tpl.Tickets.meta.file' => 'ticket_meta_file',

    'tpl.Tickets.author.subscribe' => 'ticket_author_subscribe',
    'tpl.Tickets.author.email.subscription' => 'author_email_subscription',
);

/** @var modx $modx */
/** @var array $sources */
$BUILD_CHUNKS = array();
foreach ($tmp as $k => $v) {
    /** @var modChunk $chunk */
    $chunk = $modx->newObject('modChunk');
    $chunk->fromArray(array(
        'name' => $k,
        'description' => '',
        'snippet' => file_get_contents($sources['source_core'] . '/elements/chunks/chunk.' . $v . '.tpl'),
        'static' => BUILD_CHUNK_STATIC,
        'source' => 1,
        'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/chunks/chunk.' . $v . '.tpl',
    ), '', true, true);
    $chunks[] = $chunk;

    $BUILD_CHUNKS[$k] = file_get_contents($sources['source_core'] . '/elements/chunks/chunk.' . $v . '.tpl');
}
ksort($BUILD_CHUNKS);

return $chunks;