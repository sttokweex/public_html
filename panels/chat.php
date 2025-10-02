<?php
function renderChatComponent($userName, $messages, $translations)
{
    // Определение SVG-иконок как переменных
    $languageIcon = '<svg fill="none" viewBox="0 0 96 96" class="svg-icon"><path fill="#399BED" d="M88 48c0 6.85-1.75 13.3-4.75 18.9C76.5 79.45 63.25 88 48 88h-.6c-4.15-.05-8.2-.75-11.95-2C19.5 80.75 8 65.7 8 48c0-1.25.05-2.5.2-3.75 1-11.35 6.8-21.3 15.3-27.85 1.85-1.45 3.85-2.75 6-3.85C35 9.65 41.3 8 48 8c8.85 0 17.05 2.9 23.7 7.8"></path><path fill="#69C531" d="M53.45 79.45c-.7.3-2.15 1.55-2.4 4.2-.2 2-1.9 3.4-3.65 4.35-4.15-.05-8.2-.75-11.95-2 .05-1.6.2-3.1.4-4.3.25-1.6-.15-5.55-4.2-8.7-5.05-3.9-4.2-6.7-2.7-8.7 1.5-1.95 0-3.05-1.5-5.05-1.15-1.55-5.85-4.55-8.05-5.9-8.1 0-9.15-3.7-8.65-5.6-2.15 0-2.3-2.25-2.1-3.35l-.45-.15c1-11.35 6.8-21.3 15.3-27.85l.4.5c4.45 3.35 8.95 1.7 10.15.85.9-.65 2.3-1.4 3.3-1.25.35 0 .65.1.85.4 1.65 2.3-.1 3.2-1.95 3.8h-.05c-.8.25-1.6.45-2.15.7-1.45.65-.6 2.5 0 3.35 2.3 1.4 5.25-.15 6.85-1.45.25-.15.45-.35.6-.5.65-.35 1.95-.8 3.05-.55.4.05.8.25 1.1.55 1.5 1.4 3 2.5 5.4 4.2s0 4.75-2.4 2.8c-1.9-1.55-2.8-.65-3 0 2.1 3.35-2.95 3.1-5.95 3.65s-5.35 4.75-6.85 5.6-1.5 6.2-3.9 6.75c-1.9.45-1.8-.75-1.5-1.4 0-5.35-11.3-2.8-11.3 1.4s4.15 3.9 6.55 3.9c1.9 0 1.6 1.5 1.2 2.25.6 0 1.8.45 1.8 2.25s2.15 2.65 3.25 2.8c2.4-1.3 5.4-1.95 6.9-1.95 8.35.55 17.6 10.1 21.15 16.55 2.9 5.15-1.2 7.4-3.55 7.85m19-48.3c-.25-1.4-.2-4.1 2-4.1s3.15-1.65 3.3-2.45l.95-2.2c4.35 5.2 7.4 11.5 8.65 18.4-.15-.15-.35-.3-.5-.4-.3 0-1.45-.6-3.3-3-2.25-3-4.55 0-4.55.85 0 .8-1.25 2.15-4.55 2.15-2.6 0-1.6-2-.75-3 2.25.45 3.65-1.1 4.05-1.9-2.85-1.3-2.55-3.45-2-4.35-1.65 1.5-2.9.6-3.3 0"></path><path fill="#69C531" d="M88 48c0 6.85-1.75 13.3-4.75 18.9-.45-.7-.7-1.6-.7-2.75 0-4.1-3.05-3-4.8-2.45-5.45 2.8-8.2-.65-8.85-2.75-.7-1.55-1.65-5.55 0-9.25 1.6-3.75 3.85-5.55 4.8-6 .95 0 3.4-.45 5.8-2.2 2.45-1.75 3.75-.35 4.05.55.35.65 1.5 1.7 3.3.8.35-.15.6-.35.75-.5.25 1.85.4 3.75.4 5.65M71.7 15.8l-.6 1.05c-.1 1.5-2.6 4.55-11.75 4.55-.85 1.6-3.25 4.65-6.05 4-.75-.15-2.1-1.2-1.6-4 .65-1.55 1.25-4.55-1.55-4.55s-5.2-.5-6.05-.75c-1.05-.45-3.25-.85-3.5.75s.75 2.2 1.25 2.25c1.4.55 3.35 1.75 2.7 3.15-.2.45-.65.95-1.4 1.4-.4.3-1.25.4-2.25-.35-.6-.45-1.25-1.2-1.9-2.4-.75.1-1.85.1-2.75-.2h-.05c-.75-.3-1.3-.75-1.3-1.6 0-1.05 1.4-1.85 2.45-2.6 1.3-.95 2.2-1.85-.25-2.95-.75-.65-3.3-1.8-7.6-1C35 9.65 41.3 8 48 8c8.85 0 17.05 2.9 23.7 7.8"></path></svg>';
    $popoutIcon = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon"><path d="M24.059 3.766v7.058H10.824v42.352h42.352V39.94h7.058v20.293H3.766V3.766zm36.18 0V24.94h-7.06v-9.12l-25.3 25.296-4.992-4.996 25.297-25.297h-9.125V3.766z"></path></svg>';
    $closeIcon = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon"><path d="M56 15.374 48.626 8 32 24.626 15.374 8 8 15.374 24.626 32 8 48.626 15.374 56 32 39.374 48.626 56 56 48.626 39.374 32z"></path></svg>';
    $chevronDownIcon = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon"><path d="M32.274 49.762 9.204 26.69l6.928-6.93 16.145 16.145L48.42 19.762l6.93 6.929-23.072 23.07z"></path></svg>';
    $blueStarIcon = '<svg fill="none" viewBox="0 0 96 96" class="svg-icon"><path fill="#6FDDE7" d="M45.237 83.04 23.797 93.4c-3.76 1.8-8-1.28-7.44-5.4l3.28-24.12c.2-1.56-.32-3.16-1.4-4.32L1.437 42c-2.88-3-1.24-8 2.84-8.72l23.96-4.32a5.28 5.28 0 0 0 3.68-2.68l11.52-21.44c1.96-3.64 7.2-3.64 9.16 0l11.52 21.44c.76 1.4 2.12 2.4 3.68 2.68l23.96 4.32c4.08.72 5.72 5.72 2.84 8.72l-16.84 17.56a5.33 5.33 0 0 0-1.4 4.32L79.637 88c.56 4.12-3.68 7.2-7.44 5.4L50.763 83.04a5.28 5.28 0 0 0-5.526 0z"></path></svg>';
    $actionIcon = '<svg fill="currentColor" viewBox="0 0 64 64" class="svg-icon"><path d="M59.574 8.547c0 .028.028.055.028.055h-.016a6.75 6.75 0 0 0-6.387 6.586v33.039l.012.425a6.799 6.799 0 1 1-13.586-.426v-3.093H16V15.348a6.8 6.8 0 0 1 6.8-6.801zm-22.773 39.71c0 3.76 1.33 6.796 4.023 6.798H6.801A6.8 6.8 0 0 1 0 48.258zM21.973 31.802v4.64h15.492v-4.64zm0-12.399v4.637h24.8v-4.637zm38.054-8.933A3.973 3.973 0 0 1 64 14.44v6.426h-8V14.44a3.973 3.973 0 0 1 3.973-3.972z"></path></svg>';

?>

    <div class="chat-container closed">

        <div class="chat-header">
            <span class="chat-language-icon"> <?php echo $languageIcon; ?> </span>
            <span class="chat-username"> <?php echo htmlspecialchars($userName); ?> </span>
            <span class="chat-popout-icon"> <?php echo $popoutIcon; ?> </span>
            <span class="chat-close-icon"> <?php echo $closeIcon; ?> </span>
        </div>

        <div class="chat-messages">
            <div class="message-content scrollY">
                <?php if (empty($messages)) { ?>
                    <p class="no-messages"><?php echo htmlspecialchars($translations['no_messages']); ?></p>
                <?php } else { ?>
                    <?php foreach ($messages as $message) { ?>
                        <div class="chat-wrap">
                            <div class="chat-content">
                                <p>
                                    <span class="chat-content-wrap">
                                        <span class="chat-user-tag">
                                            <span></span>
                                            <button> <?php echo htmlspecialchars($message['sender']); ?>:&nbsp; </button>
                                        </span>
                                    </span>

                                    <?php echo htmlspecialchars($message['text']); ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

        <div class="chat-footer">
            <div class="chat-input">
                <label>
                    <div class="chat-text-area">
                        <pre aria-hidden="true" style="min-height: 2.8em; max-height: 6.4em;"></pre>
                        <textarea class="scrollY  " placeholder="<?php echo htmlspecialchars($translations['input_placeholder']); ?>"></textarea>
                        <div class="chat-input-button-wrap"><button type="button" tabindex="0" class="chat-button">😀</button></div>
                    </div>
                </label>
            </div>
            <span class="chat-online">
                <span class="scale-up "></span>
                <span class="chat-online-wrap" style="">
                    <span><?php echo htmlspecialchars($translations['online_label']); ?>: </span>
                    <span class="" style="">14,590</span>
                </span>
            </span>
            <div class="actions">
                <span class="action-counter">160</span>
                <button type="button" class="action-button"> <?php echo $actionIcon; ?> </button>
                <button type="button" class="send-button"><?php echo htmlspecialchars($translations['send_button']); ?></button>
            </div>

        </div>

    </div>

    <style>

    </style>

<?php


}
?>